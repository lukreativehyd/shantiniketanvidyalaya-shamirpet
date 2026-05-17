<?php
/**
 * Script to update admin user email
 * Run this once to set the admin email to snis.shamirpet@gmail.com
 */

require 'db-config.php';
check_admin_login();

// Only allow admin to access this
if ($_SESSION['admin_role'] !== 'admin') {
    header('HTTP/1.0 403 Forbidden');
    die('Access denied. Only admin users can update email addresses.');
}

$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = intval($_POST['user_id'] ?? 0);
    $new_email = trim($_POST['email'] ?? '');
    
    if (!$user_id || !$new_email) {
        $error = 'Please provide both user ID and email';
    } else {
        try {
            if (DB_TYPE === 'sqlite') {
                $stmt = $conn->prepare("UPDATE admin_users SET email = ? WHERE id = ?");
                $stmt->execute([$new_email, $user_id]);
            } else {
                $sql = "UPDATE admin_users SET email = '$new_email' WHERE id = $user_id";
                $conn->query($sql);
            }
            $message = "✓ Admin email updated successfully to: $new_email";
        } catch (Exception $e) {
            $error = 'Error updating email: ' . $e->getMessage();
        }
    }
}

// Get all admin users
try {
    if (DB_TYPE === 'sqlite') {
        $stmt = $conn->prepare("SELECT id, username, full_name, email FROM admin_users WHERE role = 'admin' ORDER BY created_at ASC");
        $stmt->execute();
        $admins = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $result = $conn->query("SELECT id, username, full_name, email FROM admin_users WHERE role = 'admin' ORDER BY created_at ASC");
        $admins = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }
} catch (Exception $e) {
    $admins = [];
    $error = 'Error fetching admins: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Admin Email</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #f5f5f5;
            padding: 20px;
            margin-top: 60px;
        }
        
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            padding: 30px;
        }
        
        h1 {
            color: #295192;
            margin-bottom: 20px;
            font-size: 28px;
        }
        
        .message {
            background: #d4edda;
            color: #155724;
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
        }
        
        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
        }
        
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        label {
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }
        
        select, input {
            padding: 10px 12px;
            border: 2px solid #e0e0e0;
            border-radius: 6px;
            font-size: 14px;
            font-family: inherit;
            transition: all 0.3s ease;
        }
        
        select:focus, input:focus {
            outline: none;
            border-color: #295192;
            box-shadow: 0 0 0 3px rgba(41, 81, 146, 0.1);
        }
        
        button {
            padding: 12px 20px;
            background: linear-gradient(135deg, #295192, #1F3B6B);
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        button:hover {
            box-shadow: 0 4px 12px rgba(41, 81, 146, 0.3);
            transform: translateY(-2px);
        }
        
        button:active {
            transform: translateY(0);
        }
        
        .table {
            margin-top: 30px;
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            overflow: hidden;
        }
        
        .table thead {
            background: #f5f5f5;
        }
        
        .table th, .table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
            font-size: 13px;
        }
        
        .table th {
            font-weight: 700;
            color: #295192;
        }
        
        .back-link {
            margin-bottom: 20px;
        }
        
        .back-link a {
            color: #295192;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        
        .back-link a:hover {
            text-decoration: underline;
        }
        
        .quick-set {
            background: #e7f3ff;
            border: 2px solid #b3d9ff;
            padding: 15px;
            border-radius: 6px;
            margin-top: 15px;
        }
        
        .quick-set p {
            font-size: 13px;
            color: #055160;
            margin-bottom: 10px;
        }
        
        .quick-set button {
            background: #0d6efd;
            font-size: 13px;
            padding: 8px 14px;
        }
        
        .quick-set button:hover {
            background: #0b5ed7;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="back-link">
            <a href="dashboard.php">← Back to Dashboard</a>
        </div>
        
        <h1>Update Admin Email Address</h1>
        
        <?php if ($message): ?>
            <div class="message"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>
        
        <?php if ($error): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <div>
                <label for="user_id">Select Admin User</label>
                <select name="user_id" id="user_id" required>
                    <option value="">-- Choose an admin --</option>
                    <?php foreach ($admins as $admin): ?>
                        <option value="<?php echo $admin['id']; ?>">
                            <?php echo htmlspecialchars($admin['full_name'] . ' (' . $admin['username'] . ')'); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div>
                <label for="email">New Email Address</label>
                <input type="email" name="email" id="email" placeholder="snis.shamirpet@gmail.com" required>
            </div>
            
            <button type="submit">Update Email Address</button>
            
            <div class="quick-set">
                <p><strong>Quick Setup:</strong> Click to set first admin email to snis.shamirpet@gmail.com</p>
                <button type="button" onclick="document.getElementById('user_id').value = '<?php echo $admins[0]['id'] ?? ''; ?>'; document.getElementById('email').value = 'snis.shamirpet@gmail.com'; if('<?php echo $admins[0]['id'] ?? ''; ?>' !== '') { document.forms[0].submit(); }">
                    Set to Default Email
                </button>
            </div>
        </form>
        
        <?php if (!empty($admins)): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Full Name</th>
                        <th>Current Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($admins as $admin): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($admin['username']); ?></td>
                            <td><?php echo htmlspecialchars($admin['full_name']); ?></td>
                            <td><code style="background: #f5f5f5; padding: 4px 8px; border-radius: 4px; font-size: 12px;"><?php echo htmlspecialchars($admin['email'] ?? 'Not set'); ?></code></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p style="color: #666; font-size: 14px;">No admin users found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
