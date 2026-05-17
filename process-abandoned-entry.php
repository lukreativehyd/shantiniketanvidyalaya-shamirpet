<?php
/**
 * Process Abandoned Form Entry
 * Captures partially filled forms when user leaves without submission
 * Only saves if email OR mobile number is provided
 */

header('Content-Type: application/json');

// Log all errors to file
$log_file = __DIR__ . '/admin/form-submissions.log';
ini_set('error_log', $log_file);
error_reporting(E_ALL);

try {
    require __DIR__ . '/admin/db-config.php';
} catch (Exception $e) {
    http_response_code(500);
    error_log("ABANDONED ENTRY: DATABASE CONFIGURATION ERROR: " . $e->getMessage());
    echo json_encode(['status' => 'error', 'error' => 'Database connection failed']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Get form data - FormData from beforeunload sends these field names
    $parentName = sanitize($_POST['parentName'] ?? '');
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $phone = sanitize($_POST['mobileNumber'] ?? '');
    $studentName = sanitize($_POST['childName'] ?? '');
    $age = sanitize($_POST['age'] ?? '');
    $grade = sanitize($_POST['grade'] ?? '');
    $message = sanitize($_POST['userMessage'] ?? '');
    $formSource = sanitize($_POST['formSource'] ?? 'unknown');
    
    // Log received data for debugging
    error_log("======== ABANDONED ENTRY RECEIVED ========");
    error_log("Source: $formSource | Email: $email | Phone: $phone | Parent: $parentName");
    error_log("Data: " . json_encode($_POST));
    
    // IMPORTANT: Only save if email OR phone is filled
    if (empty($email) && empty($phone)) {
        http_response_code(400);
        echo json_encode(['status' => 'ignored', 'reason' => 'No contact information provided']);
        exit;
    }
    
    try {
        // Generate unique ID for abandoned entry
        $abandoned_id = 'ABD_' . date('YmdHis') . '_' . rand(10000, 99999);
        $timestamp = date('Y-m-d H:i:s');
        
        // Insert into abandoned_entries table
        if (DB_TYPE === 'sqlite') {
            try {
                $stmt = $conn->prepare("
                    INSERT INTO abandoned_entries 
                    (id, parent_name, email, phone, student_name, age, grade, message, source, status, abandoned_at)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'new', ?)
                ");
                
                $result = $stmt->execute([
                    $abandoned_id,
                    $parentName,
                    $email,
                    $phone,
                    $studentName,
                    $age,
                    $grade,
                    $message,
                    $formSource,
                    $timestamp
                ]);
                
                if ($result) {
                    error_log("✅ [ABANDONED] SQLite insert successful: $abandoned_id");
                    http_response_code(200);
                    echo json_encode(['status' => 'success', 'id' => $abandoned_id]);
                } else {
                    error_log("❌ [ABANDONED] Insert failed: " . implode(", ", $stmt->errorInfo()));
                    http_response_code(500);
                    echo json_encode(['status' => 'error', 'error' => 'Failed to save abandoned entry']);
                }
            } catch (PDOException $e) {
                error_log("❌ [ABANDONED] PDO Error: " . $e->getMessage());
                http_response_code(500);
                echo json_encode(['status' => 'error', 'error' => 'Database error']);
            }
        } else {
            // MySQL
            $query = "INSERT INTO abandoned_entries 
                    (id, parent_name, email, phone, student_name, age, grade, message, source, status, abandoned_at)
                    VALUES ('$abandoned_id', '$parentName', '$email', '$phone', '$studentName', '$age', '$grade', '$message', '$formSource', 'new', '$timestamp')";
            $result = execute_query($query);
            if ($result === false) {
                throw new Exception("Insert failed");
            }
            error_log("✅ [ABANDONED] MySQL insert successful: $abandoned_id");
        }
        
        http_response_code(200);
        echo json_encode([
            'status' => 'success',
            'message' => 'Abandoned entry saved',
            'entry_id' => $abandoned_id
        ]);
        
    } catch (Exception $e) {
        error_log("❌ [ABANDONED] Error: " . $e->getMessage());
        error_log("Stack trace: " . $e->getTraceAsString());
        http_response_code(500);
        echo json_encode(['status' => 'error', 'message' => 'Error saving abandoned entry: ' . $e->getMessage()]);
    }
    
} else {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
}

?>
