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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = sanitize($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if (empty($username) || empty($password)) {
        $error_message = 'Username and password are required';
    } else {
        try {
            // Query database for user (works with both SQLite and MySQL)
            if (DB_TYPE === 'sqlite') {
                // SQLite query
                $stmt = $conn->prepare("SELECT id, username, password, full_name, role FROM admin_users WHERE username = ? AND is_active = 1");
                $stmt->execute([$username]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                // MySQL query
                $sql = "SELECT id, username, password, full_name, role FROM admin_users WHERE username = '$username' AND is_active = true";
                $result = $conn->query($sql);
                $user = $result ? $result->fetch_assoc() : null;
            }
            
            if ($user) {
                // Verify password
                if (password_verify($password, $user['password'])) {
                    // Set session variables
                    $_SESSION['admin_id'] = $user['id'];
                    $_SESSION['admin_username'] = $user['username'];
                    $_SESSION['admin_name'] = $user['full_name'];
                    $_SESSION['admin_role'] = $user['role'];
                    $_SESSION['admin_capabilities'] = $user['capabilities'] ?? '[]';
                    
                    // Update last login
                    $now = date('Y-m-d H:i:s');
                    if (DB_TYPE === 'sqlite') {
                        $stmt = $conn->prepare("UPDATE admin_users SET last_login = ? WHERE id = ?");
                        $stmt->execute([$now, $user['id']]);
                    } else {
                        $conn->query("UPDATE admin_users SET last_login = '$now' WHERE id = '{$user['id']}'");
                    }
                    
                    // Log action
                    log_action($user['id'], 'LOGIN', 'Admin logged in');
                    
                    header("Location: dashboard.php");
                    exit;
                } else {
                    $error_message = 'Invalid username or password';
                }
            } else {
                $error_message = 'Invalid username or password';
            }
        } catch (Exception $e) {
            $error_message = 'Login error: ' . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Shantiniketan Vidyalaya</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #295192 0%, #BF3149 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .login-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            padding: 60px 40px;
            overflow: hidden;
        }
        
        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #295192 0%, #BF3149 100%);
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .login-logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, #295192 0%, #BF3149 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 40px;
        }
        
        .login-header h1 {
            font-size: 28px;
            color: #295192;
            margin-bottom: 8px;
            font-weight: 900;
        }
        
        .login-header p {
            color: #666666;
            font-size: 14px;
        }
        
        .form-group {
            margin-bottom: 24px;
        }
        
        label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #333333;
            margin-bottom: 8px;
        }
        
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #e8e9eb;
            border-radius: 8px;
            font-size: 14px;
            font-family: inherit;
            transition: all 0.3s ease;
        }
        
        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #295192;
            box-shadow: 0 0 0 3px rgba(41, 81, 146, 0.1);
        }
        
        .error-message {
            background: #fee;
            border: 1px solid #fcc;
            color: #c33;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 24px;
            font-size: 14px;
            display: none;
        }
        
        .error-message.show {
            display: block;
        }
        
        .login-button {
            width: 100%;
            padding: 14px 24px;
            background: linear-gradient(135deg, #295192 0%, #1F3B6B 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 16px;
        }
        
        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(41, 81, 146, 0.3);
        }
        
        .login-button:active {
            transform: translateY(0);
        }
        
        .login-footer {
            text-align: center;
            margin-top: 24px;
            padding-top: 24px;
            border-top: 1px solid #e8e9eb;
            font-size: 12px;
            color: #999999;
        }
        
        .success-message {
            background: #efe;
            border: 1px solid #cfc;
            color: #3c3;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 24px;
            font-size: 14px;
            display: none;
        }
        
        .success-message.show {
            display: block;
        }
        
        @media (max-width: 768px) {
            .login-container {
                padding: 30px 20px;
                max-width: 100%;
                margin: 0 10px;
            }
            
            .login-header {
                margin-bottom: 30px;
            }
            
            .login-logo {
                width: 60px;
                height: 60px;
                font-size: 30px;
                margin: 0 auto 15px;
            }
            
            .login-header h1 {
                font-size: 22px;
                margin-bottom: 6px;
            }
            
            .login-header p {
                font-size: 12px;
            }
            
            .form-group {
                margin-bottom: 18px;
            }
            
            label {
                font-size: 13px;
                margin-bottom: 6px;
            }
            
            input[type="text"],
            input[type="password"] {
                padding: 10px 12px;
                font-size: 16px; /* Prevents zoom on iOS */
            }
            
            .login-button {
                padding: 12px 20px;
                font-size: 14px;
                margin-top: 12px;
            }
            
            .login-footer {
                margin-top: 18px;
                padding-top: 18px;
                font-size: 11px;
            }
            
            .error-message,
            .success-message {
                padding: 10px 12px;
                font-size: 12px;
                margin-bottom: 18px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <div class="login-logo">
                <img src="../assets/images/Logo symbol.jpg" alt="School Logo" style="width: 80px; height: 80px; object-fit: contain; background: white; padding: 8px; border-radius: 8px;">
            </div>
            <h1>Admin Portal</h1>
            <p>Shantiniketan Vidyalaya</p>
        </div>
        
        <?php if ($error_message): ?>
            <div class="error-message show"><?php echo $error_message; ?></div>
        <?php endif; ?>
        
        <?php if ($success_message): ?>
            <div class="success-message show"><?php echo $success_message; ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            
            <button type="submit" class="login-button">Login</button>
        </form>
        
        <div style="text-align: center; margin-top: 12px;">
            <a href="reset-password.php" style="font-size: 13px; color: #295192; text-decoration: none;">Forgot Password?</a>
        </div>
        
        <div class="login-footer">
            <p>© 2026 Shantiniketan Vidyalaya. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
