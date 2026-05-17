<?php
/*
 * Process Enquiry Form Submission
 * Centralized form processor for lead collection
 * 
 * Saves to:
 * 1. Local SQLite database (for admin management)
 * 2. Google Sheets (via Apps Script webhook) - if configured
 * 
 * Expected POST parameters:
 * - parentName (required)
 * - mobileNumber (required)
 * - email (required)
 * - childName (required)
 * - age (required)
 * - grade (required)
 * - userMessage (optional)
 * - formSource (optional - to track which page the form was submitted from)
 * - agree (checkbox)
 */

header('Content-Type: application/json');

// Set error handling to avoid blank responses on errors
ini_set('display_errors', 0);
error_reporting(E_ALL);

// Log all errors to file
$log_file = __DIR__ . '/admin/form-submissions.log';
ini_set('error_log', $log_file);

try {
    require __DIR__ . '/admin/db-config.php';
} catch (Exception $e) {
    http_response_code(500);
    error_log("DATABASE CONFIGURATION ERROR: " . $e->getMessage());
    echo json_encode(['status' => 'error', 'error' => 'Database connection failed', 'debug' => $e->getMessage()]);
    exit;
}

// Configuration: Google Apps Script web app URL for Google Sheets integration
// This URL sends form submissions to Google Sheets automatically
define('GOOGLE_SHEET_WEBHOOK_URL', 'https://script.google.com/macros/s/AKfycbykivhVf-9uBeSEzWfJ8_DrVlDTfMfaLnp5p5nytgMw5sO_JiYSXVRPQmlf4m8JpP-UlQ/exec');

// Function to check for duplicate submissions within 120 seconds
function check_duplicate_submission($email, $mobileNumber) {
    global $conn;
    
    // TEMPORARILY DISABLED - email+phone combination is already unique
    // This check was too aggressive and blocking legitimate submissions
    // Re-enable if double-submit issues occur
    error_log("📋 [DUPLICATE CHECK] Disabled - checking email: $email, phone: $mobileNumber");
    return false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    try {
        // Sanitize input
        $parentName = sanitize($_POST['parentName'] ?? '');
        $mobileNumber = sanitize($_POST['mobileNumber'] ?? '');
        $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
        $childName = sanitize($_POST['childName'] ?? '');
        $age = sanitize($_POST['age'] ?? '');
        $grade = sanitize($_POST['grade'] ?? '');
        $userMessage = sanitize($_POST['userMessage'] ?? '');
        $formSource = sanitize($_POST['formSource'] ?? 'unknown');
        
        // ========== VALIDATION ==========
        
        // Check required fields
        if (empty($parentName)) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'error' => 'Parent/Guardian name is required']);
            exit;
        }
        
        if (empty($mobileNumber)) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'error' => 'Mobile number is required']);
            exit;
        }
        
        if (empty($email)) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'error' => 'Email address is required']);
            exit;
        }
        
        if (empty($childName)) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'error' => 'Student name is required']);
            exit;
        }
        
        if (empty($age)) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'error' => 'Student age is required']);
            exit;
        }
        
        if (empty($grade)) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'error' => 'Grade is required']);
            exit;
        }
        
        // Validate phone format
        if (!preg_match('/^[0-9\s\-\+\(\)]{7,}$/', $mobileNumber)) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'error' => 'Invalid phone number format']);
            exit;
        }
        
        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'error' => 'Invalid email address']);
            exit;
        }
        
        // Validate age
        if (!is_numeric($age) || $age < 3 || $age > 25) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'error' => 'Invalid age (must be between 3 and 25)']);
            exit;
        }
        
        // Check for duplicate submissions (prevent accidental double-submit from network delays)
        if (check_duplicate_submission($email, $mobileNumber)) {
            http_response_code(409);
            echo json_encode(['status' => 'error', 'error' => 'This enquiry was just submitted. Please wait a moment before submitting again.']);
            exit;
        }
        
        // ========== SAVE TO LOCAL DATABASE ==========
        
        $enquiry_id = generate_id('ENQ');
        $timestamp = date('Y-m-d H:i:s');
        
        // Store only the user's actual message (other data is in separate database columns)
        $message = !empty($userMessage) ? $userMessage : "";
        
        $db_success = false;
        
        if (DB_TYPE === 'sqlite') {
            try {
                // Try to insert with all columns
                $stmt = $conn->prepare("INSERT INTO enquiries (
                    reference_id, parent_name, email, mobile_number, child_name, age, grade, message, source, status, created_at
                ) VALUES (
                    :reference_id, :parent_name, :email, :mobile_number, :child_name, :age, :grade, :message, :source, :status, :created_at
                )");
                
                $db_success = $stmt->execute([
                    ':reference_id' => $enquiry_id,
                    ':parent_name' => $parentName,
                    ':email' => $email,
                    ':mobile_number' => $mobileNumber,
                    ':child_name' => $childName,
                    ':age' => $age,
                    ':grade' => $grade,
                    ':message' => $message,
                    ':source' => $formSource,
                    ':status' => 'new',
                    ':created_at' => $timestamp
                ]);
                error_log("✅ [ENQUIRY] SQLite insert successful with reference: $enquiry_id");
            } catch (PDOException $e) {
                error_log("❌ [ENQUIRY] SQLite Insert Error: " . $e->getMessage());
                $db_success = false;
            }
        } else {
            // MySQL - use correct column names
            $parentName_esc = $conn->real_escape_string($parentName);
            $email_esc = $conn->real_escape_string($email);
            $mobileNumber_esc = $conn->real_escape_string($mobileNumber);
            $childName_esc = $conn->real_escape_string($childName);
            $age_esc = $conn->real_escape_string($age);
            $grade_esc = $conn->real_escape_string($grade);
            $message_esc = $conn->real_escape_string($message);
            $formSource_esc = $conn->real_escape_string($formSource);
            
            $query = "INSERT INTO enquiries (
                reference_id, parent_name, email, mobile_number, child_name, age, grade, message, source, status, created_at
            ) VALUES (
                '$enquiry_id', '$parentName_esc', '$email_esc', '$mobileNumber_esc', '$childName_esc', '$age_esc', '$grade_esc', '$message_esc', '$formSource_esc', 'new', '$timestamp'
            )";
            
            $result = @$conn->query($query);
            $db_success = ($result !== false);
            
            if ($result !== false) {
                error_log("✅ [ENQUIRY] MySQL insert successful with ID: $enquiry_id");
            } else {
                error_log("❌ [ENQUIRY] MySQL insert failed: " . $conn->error);
            }
        }
        
        if ($db_success === false) {
            http_response_code(500);
            error_log("Failed to save enquiry to database");
            echo json_encode(['status' => 'error', 'error' => 'Error saving your enquiry. Please try again.']);
            exit;
        }
        
        // ========== SEND TO GOOGLE SHEETS (OPTIONAL - NON-BLOCKING) ==========
        // Wrapped in separate try-catch so it doesn't break the main form submission
        try {
            if (!empty(GOOGLE_SHEET_WEBHOOK_URL)) {
                error_log("📊 [ENQUIRY] Sending to Google Sheets: Email=$email");
                
                // Use exact same approach as working implementation on old website
                $postData = [
                    'parentName' => $parentName,
                    'mobileNumber' => $mobileNumber,
                    'email' => $email,
                    'childName' => $childName,
                    'age' => $age,
                    'grade' => $grade,
                    'timestamp' => $timestamp
                ];
                
                $ch = curl_init(GOOGLE_SHEET_WEBHOOK_URL);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
                curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                curl_setopt($ch, CURLOPT_HEADER, false);
                $response = curl_exec($ch);
                $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                $curl_error = curl_error($ch);
                curl_close($ch);
                
                // Accept 200-299 (success), 300-399 (redirect - Google's webhook redirects), or "Success" response
                if (($http_code >= 200 && $http_code < 400) || stripos($response, 'Success') !== false) {
                    error_log("✅ [ENQUIRY] Google Sheets request successful (HTTP $http_code)");
                } else {
                    error_log("⚠️ [ENQUIRY] Google Sheets HTTP $http_code. Response: " . substr($response, 0, 200));
                    if ($curl_error) {
                        error_log("⚠️ [ENQUIRY] cURL Error: $curl_error");
                    }
                }
            }
        } catch (Exception $sheets_exception) {
            // Google Sheets error - log it but don't block the form submission
            error_log("⚠️ [ENQUIRY] Google Sheets exception (form still succeeded): " . $sheets_exception->getMessage());
        }
        
        // ========== SEND EMAIL NOTIFICATION ==========
        
        $to = 'snis.shamirpet@gmail.com';
        $email_subject = "New Admission Enquiry from " . $parentName;
        
        $email_body = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; }
                .container { max-width: 600px; margin: 0 auto; }
                .header { background: linear-gradient(135deg, #1e3a5f 0%, #2c5aa0 100%); color: white; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
                .content { background: #f8f9fa; padding: 30px; }
                .form-group { margin-bottom: 20px; border-bottom: 1px solid #ddd; padding-bottom: 15px; }
                .form-group:last-child { border-bottom: none; }
                .label { font-weight: 600; color: #1e3a5f; }
                .value { color: #333; margin-top: 5px; }
                .ref { background: #ffffff; padding: 10px; border-left: 4px solid #2c5aa0; margin: 15px 0; }
                .ref-label { font-weight: 600; color: #1e3a5f; font-size: 12px; }
                .ref-value { color: #2c5aa0; font-weight: 700; font-size: 16px; }
                .footer { background: #1e3a5f; color: white; padding: 15px; text-align: center; border-radius: 0 0 8px 8px; font-size: 12px; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h2>New Admission Enquiry</h2>
                </div>
                <div class='content'>
                    <div class='ref'>
                        <div class='ref-label'>Enquiry Reference:</div>
                        <div class='ref-value'>$enquiry_id</div>
                    </div>
                    <div class='form-group'>
                        <div class='label'>Parent/Guardian Name:</div>
                        <div class='value'>$parentName</div>
                    </div>
                    <div class='form-group'>
                        <div class='label'>Mobile Number:</div>
                        <div class='value'>$mobileNumber</div>
                    </div>
                    <div class='form-group'>
                        <div class='label'>Email Address:</div>
                        <div class='value'>$email</div>
                    </div>
                    <div class='form-group'>
                        <div class='label'>Student Name:</div>
                        <div class='value'>$childName</div>
                    </div>
                    <div class='form-group'>
                        <div class='label'>Age:</div>
                        <div class='value'>$age years</div>
                    </div>
                    <div class='form-group'>
                        <div class='label'>Grade:</div>
                        <div class='value'>$grade</div>
                    </div>
                    " . (!empty($userMessage) ? "
                    <div class='form-group'>
                        <div class='label'>Additional Message:</div>
                        <div class='value'>" . nl2br(htmlspecialchars($userMessage)) . "</div>
                    </div>
                    " : "") . "
                </div>
                <div class='footer'>
                    <p>This is an automated email. Please do not reply to this email.</p>
                    <p>Shantiniketan Vidyalaya &copy; " . date('Y') . "</p>
                </div>
            </div>
        </body>
        </html>
        ";
        
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        
        $mail_sent = @mail($to, $email_subject, $email_body, $headers);
        error_log("📧 [ENQUIRY] Email sent to $to: " . ($mail_sent ? "SUCCESS" : "FAILED"));
        
        // ========== RETURN SUCCESS ==========
        
        error_log("✅ [ENQUIRY] COMPLETE - ID: $enquiry_id, Email: $email, Source: $formSource");
        
        http_response_code(200);
        echo json_encode([
            'status' => 'success',
            'message' => 'Thank you for your enquiry! We will contact you soon.',
            'enquiry_id' => $enquiry_id
        ]);
        
    } catch (Exception $e) {
        http_response_code(500);
        error_log("Enquiry processing error: " . $e->getMessage() . " | Trace: " . $e->getTraceAsString());
        echo json_encode(['status' => 'error', 'error' => 'An error occurred. Please try again later.']);
    }
    
} else {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'error' => 'Method not allowed']);
}

// Catch any uncaught exceptions
register_shutdown_function(function() {
    $error = error_get_last();
    if ($error !== null && in_array($error['type'], [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR])) {
        http_response_code(500);
        header('Content-Type: application/json');
        echo json_encode(['status' => 'error', 'error' => 'Server error occurred. Please try again.']);
        error_log("Fatal PHP Error: " . $error['message'] . " in " . $error['file'] . " on line " . $error['line']);
    }
});

?>
