<?php
session_start();

// If already logged in, redirect to dashboard
if (isset($_SESSION['admin_id'])) {
    header("Location: dashboard.php");
    exit;
}

require 'db-config.php';

$error_message = '';
$success_message = '';
$step = 'request'; // request or reset

// Check if we have a token in URL
if (isset($_GET['token'])) {
    $step = 'reset';
    $token = sanitize($_GET['token']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'request') {
        // Step 1: Request password reset
        $email = sanitize($_POST['email'] ?? '');
        
        if (empty($email)) {
            $error_message = 'Email is required';
        } else {
            try {
                // Check if user exists with this email
                $sql = "SELECT id, username, full_name FROM admin_users WHERE email = '$email' AND is_active = true";
                $result = $conn->query($sql);
                $user = $result ? $result->fetch_assoc() : null;
                
                if ($user) {
                    // Generate reset token
                    $token = bin2hex(random_bytes(32));
                    $expires = date('Y-m-d H:i:s', time() + 3600); // 1 hour
                    
                    // Save token to database
                    $sql = "UPDATE admin_users SET reset_token = '$token', reset_expires = '$expires' WHERE id = " . $user['id'];
                    $conn->query($sql);
                    
                    // In production, send email. For now, show token (development only)
                    $success_message = 'If the email exists in our system, you will receive a password reset link.';
                    $step = 'request';
                    
                    // For testing: show the link
                    if ($_SERVER['SERVER_NAME'] === 'localhost' || strpos($_SERVER['SERVER_NAME'], '192.168') === 0) {
                        $success_message .= '<br><br><strong>Dev Mode:</strong> <a href="reset-password.php?token=' . $token . '">Click here to reset</a>';
                    }
                } else {
                    // Don't reveal if email exists or not
                    $success_message = 'If the email exists in our system, you will receive a password reset link.';
                }
            } catch (Exception $e) {
                $error_message = 'An error occurred. Please try again later.';
            }
        }
    } elseif (isset($_POST['action']) && $_POST['action'] === 'reset') {
        // Step 2: Reset password with token
        $token = sanitize($_POST['token'] ?? '');
        $password = $_POST['password'] ?? '';
        $password_confirm = $_POST['password_confirm'] ?? '';
        
        if (empty($token) || empty($password) || empty($password_confirm)) {
            $error_message = 'All fields are required';
        } elseif ($password !== $password_confirm) {
            $error_message = 'Passwords do not match';
        } elseif (strlen($password) < 6) {
            $error_message = 'Password must be at least 6 characters';
        } else {
            try {
                // Verify token
                $now = date('Y-m-d H:i:s');
                $sql = "SELECT id FROM admin_users WHERE reset_token = '$token' AND reset_expires > '$now'";
                $result = $conn->query($sql);
                $user = $result ? $result->fetch_assoc() : null;
                
                if ($user) {
                    // Update password and clear token
                    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                    $sql = "UPDATE admin_users SET password = '$hashed_password', reset_token = NULL, reset_expires = NULL WHERE id = " . $user['id'];
                    $conn->query($sql);
                    
                    $success_message = 'Password reset successfully! <a href="login.php">Login now</a>';
                    $step = 'request';
                } else {
                    $error_message = 'Invalid or expired reset token';
                }
            } catch (Exception $e) {
                $error_message = 'An error occurred. Please try again.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Admin Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #295192 0%, #BF3149 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }

        .reset-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 420px;
            padding: 40px;
        }

        .reset-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .reset-logo {
            margin-bottom: 16px;
        }

        .reset-logo img {
            width: 60px;
            height: 60px;
            object-fit: contain;
        }

        .reset-header h1 {
            font-size: 24px;
            font-weight: 700;
            color: #295192;
            margin-bottom: 4px;
        }

        .reset-header p {
            font-size: 14px;
            color: #666;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
            font-size: 13px;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            font-family: inherit;
        }

        input:focus {
            outline: none;
            border-color: #295192;
            box-shadow: 0 0 0 3px rgba(41, 81, 146, 0.1);
        }

        .reset-button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #295192 0%, #1d3574 100%);
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .reset-button:hover {
            box-shadow: 0 4px 12px rgba(41, 81, 146, 0.3);
            transform: translateY(-2px);
        }

        .reset-footer {
            margin-top: 18px;
            padding-top: 18px;
            border-top: 1px solid #eee;
            text-align: center;
            font-size: 12px;
            color: #666;
        }

        .reset-footer a {
            color: #295192;
            text-decoration: none;
            font-weight: 600;
        }

        .error-message,
        .success-message {
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .error-message {
            background: #fee;
            color: #c33;
            border: 1px solid #fcc;
        }

        .success-message {
            background: #efe;
            color: #3c3;
            border: 1px solid #cfc;
        }

        .success-message a {
            color: #295192;
            font-weight: 600;
        }

        @media (max-width: 480px) {
            .reset-container {
                padding: 24px;
            }

            .reset-header h1 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="reset-container">
        <div class="reset-header">
            <div class="reset-logo">
                <img src="../assets/images/shantilogo48-1.png" alt="School Logo">
            </div>
            <h1>Reset Password</h1>
            <p>Shantiniketan Vidyalaya Admin Portal</p>
        </div>
        
        <?php if ($error_message): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
        
        <?php if ($success_message): ?>
            <div class="success-message"><?php echo $success_message; ?></div>
        <?php endif; ?>

        <?php if ($step === 'request'): ?>
            <form method="POST">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <input type="hidden" name="action" value="request">
                <button type="submit" class="reset-button">Send Reset Link</button>
            </form>
        <?php else: ?>
            <form method="POST">
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter new password" required>
                </div>
                <div class="form-group">
                    <label for="password_confirm">Confirm Password</label>
                    <input type="password" id="password_confirm" name="password_confirm" placeholder="Confirm password" required>
                </div>
                <input type="hidden" name="action" value="reset">
                <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
                <button type="submit" class="reset-button">Reset Password</button>
            </form>
        <?php endif; ?>

        <div class="reset-footer">
            <p>Remember your password? <a href="login.php">Login here</a></p>
        </div>
    </div>
</body>
</html>
