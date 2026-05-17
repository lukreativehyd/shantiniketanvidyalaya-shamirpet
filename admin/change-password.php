<?php
require 'db-config.php';
check_admin_login();

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $current_password = $_POST['current_password'] ?? '';
    $new_password = $_POST['new_password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    
    if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
        $error = 'All fields are required';
    } else if ($new_password !== $confirm_password) {
        $error = 'New passwords do not match';
    } else if (strlen($new_password) < 6) {
        $error = 'Password must be at least 6 characters long';
    } else {
        // Get current password
        $admin = $conn->query("SELECT password FROM admin_users WHERE id = '{$_SESSION['admin_id']}'")->fetch_assoc();
        
        if (!password_verify($current_password, $admin['password'])) {
            $error = 'Current password is incorrect';
        } else {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $conn->query("UPDATE admin_users SET password = '$hashed_password', updated_at = NOW() WHERE id = '{$_SESSION['admin_id']}'");
            log_action($_SESSION['admin_id'], 'change_password', 'Changed own password');
            $success = 'Password changed successfully!';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password - Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="admin-sidebar.css?v=7.0">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }

        .main-content {
            margin-left: 260px;
            padding: 30px;
        }
        
        .header h1 {
            font-size: 32px;
            color: #295192;
            font-weight: 900;
            margin-bottom: 30px;
        }
        
        .card {
            background: white;
            border-radius: 12px;
            padding: 30px;
            max-width: 500px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.08);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
        }
        
        .form-group input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #e8e9eb;
            border-radius: 6px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        
        .form-group input:focus {
            outline: none;
            border-color: #295192;
            box-shadow: 0 0 0 3px rgba(41, 81, 146, 0.1);
        }
        
        .btn {
            padding: 12px 24px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .btn-primary {
            background-color: #295192;
            color: white;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            color: white;
        }
        
        .alert {
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        

        
        @media (max-width: 768px) {
            
            
            
            
            
            
            
            
            .main-content {
                margin-left: 0;
                padding: 15px;
            }
            
            .form-container {
                max-width: 100%;
                padding: 20px;
            }
            
            .form-container h1 {
                font-size: 24px;
                margin-bottom: 20px;
            }
            
            .form-group {
                margin-bottom: 18px;
            }
            
            .form-group label {
                font-size: 13px;
                margin-bottom: 6px;
            }
            
            .form-group input {
                padding: 10px 12px;
                font-size: 16px; /* Prevents zoom on iOS */
            }
            
            .button-group {
                flex-direction: column;
            }
            
            .button-group button,
            .button-group a {
                width: 100%;
            }
            
            body.sidebar-open {
                overflow: hidden;
            }
        }
    </style>
</head>
<body>
    <div class="admin-wrapper">
        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <img class="sidebar-logo" src="../assets/images/Logo symbol.jpg" alt="School Logo">
            </div>
            
            <ul class="sidebar-nav">
                <li><a href="dashboard"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="enquiries"><i class="fas fa-envelope"></i> Enquiries</a></li>
                <li><a href="abandoned-entries"><i class="fas fa-hourglass-half"></i> Abandoned Entries</a></li>
                <li><a href="blogs"><i class="fas fa-blog"></i> Blogs</a></li>
                <?php if ($_SESSION['admin_role'] === 'admin'): ?>
                <li><a href="manage-users"><i class="fas fa-users"></i> Manage Users</a></li>
                <?php endif; ?>
                <li><a href="change-password" class="active"><i class="fas fa-key"></i> Change Password</a></li>
            </ul>
            
            <div class="sidebar-footer">
                <div class="user-info">
                    <strong><?php echo $_SESSION['admin_name']; ?></strong>
                    <p>Logged in</p>
                </div>
                <a href="logout" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
        
        <div class="main-content">
            <h1>Change Password</h1>
            
            <div class="card">
                <?php if ($error): ?>
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <?php echo $error; ?>
                </div>
                <?php endif; ?>
                
                <?php if ($success): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <?php echo $success; ?>
                </div>
                <?php endif; ?>
                
                <form method="POST">
                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input 
                            type="password" 
                            id="current_password" 
                            name="current_password" 
                            placeholder="Enter your current password"
                            required>
                    </div>
                    
                    <div class="form-group">
                        <label for="new_password">New Password</label>
                        <input 
                            type="password" 
                            id="new_password" 
                            name="new_password" 
                            placeholder="Enter new password (min 6 characters)"
                            required>
                    </div>
                    
                    <div class="form-group">
                        <label for="confirm_password">Confirm New Password</label>
                        <input 
                            type="password" 
                            id="confirm_password" 
                            name="confirm_password" 
                            placeholder="Confirm new password"
                            required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Mobile Footer Menu -->
    <div class="mobile-footer-menu">
        <a href="dashboard"><i class="fas fa-home"></i><span>Home</span></a>
        <a href="enquiries"><i class="fas fa-envelope"></i><span>Enquiries</span></a>
        <a href="abandoned-entries"><i class="fas fa-hourglass-half"></i><span>Abandoned</span></a>
        <a href="blogs"><i class="fas fa-blog"></i><span>Blogs</span></a>
        <button id="settingsBtn"><i class="fas fa-cog"></i><span>Settings</span></button>
    </div>
    
    <!-- Settings Submenu -->
    <div class="settings-submenu" id="settingsSubmenu">
        <?php if ($_SESSION['admin_role'] === 'admin'): ?>
        <a href="manage-users"><i class="fas fa-users"></i> Manage Users</a>
        <?php endif; ?>
        <a href="change-password" class="active"><i class="fas fa-key"></i> Change Password</a>
        <a href="logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
    
    <script>
        const settingsBtn = document.getElementById('settingsBtn');
        const settingsSubmenu = document.getElementById('settingsSubmenu');
        
        settingsBtn.addEventListener('click', function(e) {
            e.preventDefault();
            settingsSubmenu.classList.toggle('show');
        });
        
        // Close submenu when clicking a link
        document.querySelectorAll('.settings-submenu a').forEach(link => {
            link.addEventListener('click', function() {
                settingsSubmenu.classList.remove('show');
            });
        });
        
        // Close submenu when clicking other menu items
        document.querySelectorAll('.mobile-footer-menu a').forEach(link => {
            link.addEventListener('click', function() {
                settingsSubmenu.classList.remove('show');
            });
        });
    </script>
    
    <script>
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        
        function toggleSidebar() {
            hamburgerBtn.classList.toggle('active');
            sidebar.classList.toggle('show');
            overlay.classList.toggle('show');
        }
        
        function closeSidebar() {
            hamburgerBtn.classList.remove('active');
            sidebar.classList.remove('show');
            overlay.classList.remove('show');
        }
        
        hamburgerBtn.addEventListener('click', toggleSidebar);
        
        // Close sidebar when clicking overlay
        overlay.addEventListener('click', closeSidebar);
        
        // Close sidebar when clicking on a link
        document.querySelectorAll('.sidebar-nav a').forEach(link => {
            link.addEventListener('click', closeSidebar);
        });
        
        // Close sidebar when clicking outside
        document.addEventListener('click', function(event) {
            if (!sidebar.contains(event.target) && !hamburgerBtn.contains(event.target)) {
                closeSidebar();
            }
        });
    </script>
</body>
</html>
