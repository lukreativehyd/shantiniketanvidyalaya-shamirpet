<?php
$page_title = "Manage Users - Admin Dashboard";
require_once 'db-config.php';
check_admin_login();

// Check if user is admin
if ($_SESSION['admin_role'] !== 'admin') {
    die('Access denied. Only admins can manage users.');
}

$error_message = '';
$success_message = '';
$users = [];

// Get all users
$sql = "SELECT id, username, full_name, email, role, capabilities, is_active FROM admin_users ORDER BY id DESC";
if (DB_TYPE === 'sqlite') {
    $result = $conn->query($sql);
    $users = $result ? $result->fetchAll(PDO::FETCH_ASSOC) : [];
} else {
    // MySQLi
    $result = $conn->query($sql);
    $users = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
}

// Handle user creation/update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = sanitize($_POST['action'] ?? '');
    
    if ($action === 'create') {
        $username = sanitize($_POST['username'] ?? '');
        $full_name = sanitize($_POST['full_name'] ?? '');
        $email = sanitize($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $role = sanitize($_POST['role'] ?? 'user');
        
        // Handle capabilities - normalize to array first
        $caps_input = $_POST['capabilities'] ?? [];
        // If it's a string (single checkbox), convert to array
        if (is_string($caps_input)) {
            $caps_input = [$caps_input];
        }
        
        $caps_array = [];
        $allowed_caps = ['enquiries', 'abandoned_entries', 'blogs'];
        
        if (is_array($caps_input)) {
            foreach ($caps_input as $cap) {
                $cap = sanitize($cap);
                // Only add if it's one of our allowed capabilities
                if (in_array($cap, $allowed_caps)) {
                    $caps_array[] = $cap;
                }
            }
        }
        $capabilities = json_encode($caps_array);
        
        if (empty($username) || empty($password) || empty($email)) {
            $error_message = 'Username, email, and password are required';
        } elseif (strlen($password) < 6) {
            $error_message = 'Password must be at least 6 characters';
        } else {
            try {
                // Check if username already exists
                $sql = "SELECT id FROM admin_users WHERE username = '$username'";
                if (DB_TYPE === 'sqlite') {
                    $result = $conn->query($sql);
                    $existing = $result ? $result->fetch(PDO::FETCH_ASSOC) : null;
                } else {
                    $result = $conn->query($sql);
                    $existing = $result ? $result->fetch_assoc() : null;
                }
                
                if ($existing) {
                    $error_message = 'Username already exists';
                } else {
                    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                    $sql = "INSERT INTO admin_users (username, password, full_name, email, role, capabilities, is_active) 
                             VALUES ('$username', '$hashed_password', '$full_name', '$email', '$role', '$capabilities', 1)";
                    
                    if (DB_TYPE === 'sqlite') {
                        $conn->exec($sql);
                    } else {
                        $conn->query($sql);
                    }
                    
                    $success_message = 'User created successfully!';
                    
                    // Refresh user list
                    $sql_refresh = "SELECT id, username, full_name, email, role, capabilities, is_active FROM admin_users ORDER BY id DESC";
                    if (DB_TYPE === 'sqlite') {
                        $result = $conn->query($sql_refresh);
                        $users = $result ? $result->fetchAll(PDO::FETCH_ASSOC) : [];
                    } else {
                        $result = $conn->query($sql_refresh);
                        $users = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
                    }
                }
            } catch (Exception $e) {
                $error_message = 'Error creating user: ' . $e->getMessage();
            }
        }
    } elseif ($action === 'update') {
        $user_id = (int)($_POST['user_id'] ?? 0);
        $full_name = sanitize($_POST['full_name'] ?? '');
        $email = sanitize($_POST['email'] ?? '');
        $role = sanitize($_POST['role'] ?? 'user');
        
        // Handle capabilities - normalize to array first
        $caps_input = $_POST['capabilities'] ?? [];
        // If it's a string (single checkbox), convert to array
        if (is_string($caps_input)) {
            $caps_input = [$caps_input];
        }
        
        $caps_array = [];
        $allowed_caps = ['enquiries', 'abandoned_entries', 'blogs'];
        
        if (is_array($caps_input)) {
            foreach ($caps_input as $cap) {
                $cap = sanitize($cap);
                // Only add if it's one of our allowed capabilities
                if (in_array($cap, $allowed_caps)) {
                    $caps_array[] = $cap;
                }
            }
        }
        $capabilities = json_encode($caps_array);
        $is_active = isset($_POST['is_active']) ? 1 : 0;
        
        if (empty($full_name) || empty($email)) {
            $error_message = 'Full name and email are required';
        } else {
            try {
                $sql = "UPDATE admin_users SET full_name = '$full_name', email = '$email', role = '$role', capabilities = '$capabilities', is_active = $is_active WHERE id = $user_id";
                
                if (DB_TYPE === 'sqlite') {
                    $conn->exec($sql);
                } else {
                    $conn->query($sql);
                }
                
                $success_message = 'User updated successfully!';
                
                // Refresh user list
                $sql_refresh = "SELECT id, username, full_name, email, role, capabilities, is_active FROM admin_users ORDER BY id DESC";
                if (DB_TYPE === 'sqlite') {
                    $result = $conn->query($sql_refresh);
                    $users = $result ? $result->fetchAll(PDO::FETCH_ASSOC) : [];
                } else {
                    $result = $conn->query($sql_refresh);
                    $users = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
                }
            } catch (Exception $e) {
                $error_message = 'Error updating user: ' . $e->getMessage();
            }
        }
    } elseif ($action === 'delete') {
        $user_id = (int)($_POST['user_id'] ?? 0);
        
        if ($user_id == $_SESSION['admin_id']) {
            $error_message = 'You cannot delete yourself';
        } else {
            try {
                $sql = "DELETE FROM admin_users WHERE id = $user_id";
                
                if (DB_TYPE === 'sqlite') {
                    $conn->exec($sql);
                } else {
                    $conn->query($sql);
                }
                
                $success_message = 'User deleted successfully!';
                
                // Refresh user list
                $sql_refresh = "SELECT id, username, full_name, email, role, capabilities, is_active FROM admin_users ORDER BY id DESC";
                if (DB_TYPE === 'sqlite') {
                    $result = $conn->query($sql_refresh);
                    $users = $result ? $result->fetchAll(PDO::FETCH_ASSOC) : [];
                } else {
                    $result = $conn->query($sql_refresh);
                    $users = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
                }
            } catch (Exception $e) {
                $error_message = 'Error deleting user: ' . $e->getMessage();
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
    <title>Manage Users - Admin Panel</title>
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
            background: #f5f7fa;
            color: #333;
        }

        .main-content {
            margin-left: 260px;
            padding: 30px;
            flex: 1;
        }

        .header {
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 28px;
            color: #295192;
            margin-bottom: 8px;
            font-weight: 700;
        }

        .header p {
            color: #666;
            font-size: 14px;
        }

        .header-actions {
            display: flex;
            gap: 12px;
            margin-top: 20px;
        }

        .btn {
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            font-family: inherit;
            font-size: 13px;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: #295192;
            color: white;
        }

        .btn-primary:hover {
            background: #1d3574;
        }

        .btn-danger {
            background: #d9534f;
            color: white;
        }

        .btn-danger:hover {
            background: #ac2925;
        }

        .message {
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
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

        .users-table {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f5f7fa;
            padding: 12px;
            text-align: left;
            font-weight: 600;
            font-size: 12px;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #eee;
            font-size: 13px;
        }

        tr:hover {
            background: #f9fafb;
        }

        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 600;
        }

        .badge-admin {
            background: #e8f0fe;
            color: #295192;
        }

        .badge-user {
            background: #f0e8fe;
            color: #6a4c93;
        }

        .badge-active {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .badge-inactive {
            background: #ffebee;
            color: #c62828;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        .modal.show {
            display: flex;
        }

        .modal-content {
            background: white;
            padding: 28px;
            border-radius: 8px;
            max-width: 500px;
            width: 90%;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }

        .modal-header h3 {
            font-size: 18px;
            color: #295192;
        }

        .close-btn {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #999;
        }

        .form-group {
            margin-bottom: 12px;
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: 600;
            margin-bottom: 6px;
            font-size: 13px;
            color: #555;
        }

        input, select {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-family: inherit;
            font-size: 13px;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #295192;
            box-shadow: 0 0 0 3px rgba(41, 81, 146, 0.1);
        }

        .capabilities-group {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 12px;
            margin-top: 8px;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: normal;
            margin: 0;
        }

        .checkbox-label input[type="checkbox"] {
            width: auto;
            margin: 0;
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding: 15px;
            }

            .header h1 {
                font-size: 24px;
            }

            

            .hamburger-menu:hover {
                background: #1d3574;
            }

            table {
                font-size: 12px;
            }

            td, th {
                padding: 8px;
            }
        }

        @media (min-width: 769px) {
            
        }
    </style>
</head>
<body>
    <div class="admin-wrapper">
        <!-- Sidebar -->
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
                <li><a href="manage-users" class="active"><i class="fas fa-users"></i> Manage Users</a></li>
                <?php endif; ?>
                <li><a href="change-password"><i class="fas fa-key"></i> Change Password</a></li>
            </ul>

            <div class="sidebar-footer">
                <div class="user-info">
                    <strong><?php echo $_SESSION['admin_name']; ?></strong>
                    <p>Logged in</p>
                </div>
                <a href="logout" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <h1>Manage Users</h1>
                <p>Create, edit, and manage admin users and their permissions</p>
            </div>

            <div class="header-actions">
                <button class="btn btn-primary" onclick="showCreateModal()">+ Add New User</button>
            </div>

            <?php if ($error_message): ?>
                <div class="message error-message"><?php echo htmlspecialchars($error_message); ?></div>
            <?php endif; ?>

            <?php if ($success_message): ?>
                <div class="message success-message"><?php echo htmlspecialchars($success_message); ?></div>
            <?php endif; ?>

            <div class="users-table">
                <table>
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Capabilities</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): 
                            $caps = json_decode($user['capabilities'], true) ?: [];
                        ?>
                        <tr>
                            <td><strong><?php echo htmlspecialchars($user['username']); ?></strong></td>
                            <td><?php echo htmlspecialchars($user['full_name']); ?></td>
                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                            <td><span class="badge badge-<?php echo $user['role']; ?>"><?php echo ucfirst($user['role']); ?></span></td>
                            <td>
                                <?php if (!empty($caps)): ?>
                                    <?php foreach ($caps as $cap): ?>
                                        <span class="badge" style="background: #e3f2fd; color: #1565c0; margin: 2px; display: inline-block;"><?php echo ucfirst(str_replace('_', ' ', $cap)); ?></span>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <span style="color: #999; font-size: 12px;">None assigned</span>
                                <?php endif; ?>
                            </td>
                            <td><span class="badge badge-<?php echo $user['is_active'] ? 'active' : 'inactive'; ?>"><?php echo $user['is_active'] ? 'Active' : 'Inactive'; ?></span></td>
                            <td>
                                <div class="actions">
                                    <button class="btn btn-primary" onclick="showEditModal(<?php echo htmlspecialchars(json_encode($user)); ?>)">Edit</button>
                                    <?php if ($user['id'] !== $_SESSION['admin_id']): ?>
                                        <button class="btn btn-danger" onclick="deleteUser(<?php echo $user['id']; ?>)">Delete</button>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Create User Modal -->
    <div id="createModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Add New User</h3>
                <button class="close-btn" onclick="closeCreateModal()">&times;</button>
            </div>
            <form method="POST">
                <div class="form-group" style="margin-bottom: 12px;">
                    <label>Username</label>
                    <input type="text" name="username" required>
                </div>
                <div class="form-group" style="margin-bottom: 12px;">
                    <label>Full Name</label>
                    <input type="text" name="full_name" required>
                </div>
                <div class="form-group" style="margin-bottom: 12px;">
                    <label>Email</label>
                    <input type="email" name="email" required>
                </div>
                <div class="form-group" style="margin-bottom: 12px;">
                    <label>Password</label>
                    <input type="password" name="password" required>
                </div>
                <div class="form-group" style="margin-bottom: 12px;">
                    <label>Role</label>
                    <select name="role" required>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="form-group" style="margin-bottom: 18px;">
                    <label>Capabilities (What can this user access?)</label>
                    <div class="capabilities-group">
                        <label class="checkbox-label">
                            <input type="checkbox" name="capabilities" value="enquiries"> Enquiries
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="capabilities" value="abandoned_entries"> Abandoned Entries
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="capabilities" value="blogs"> Blogs
                        </label>
                    </div>
                </div>
                <input type="hidden" name="action" value="create">
                <button type="submit" class="btn btn-primary" style="width: 100%;">Create User</button>
            </form>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Edit User</h3>
                <button class="close-btn" onclick="closeEditModal()">&times;</button>
            </div>
            <form method="POST" id="editForm">
                <div class="form-group" style="margin-bottom: 12px;">
                    <label>Full Name</label>
                    <input type="text" id="editFullName" name="full_name" required>
                </div>
                <div class="form-group" style="margin-bottom: 12px;">
                    <label>Email</label>
                    <input type="email" id="editEmail" name="email" required>
                </div>
                <div class="form-group" style="margin-bottom: 12px;">
                    <label>Role</label>
                    <select id="editRole" name="role" required>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="form-group" style="margin-bottom: 12px;">
                    <label>
                        <input type="checkbox" id="editIsActive" name="is_active"> Active
                    </label>
                </div>
                <div class="form-group" style="margin-bottom: 18px;">
                    <label>Capabilities</label>
                    <div class="capabilities-group">
                        <label class="checkbox-label">
                            <input type="checkbox" id="capEnquiries" name="capabilities" value="enquiries"> Enquiries
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" id="capAbandoned" name="capabilities" value="abandoned_entries"> Abandoned Entries
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" id="capBlogs" name="capabilities" value="blogs"> Blogs
                        </label>
                    </div>
                </div>
                <input type="hidden" name="action" value="update">
                <input type="hidden" id="editUserId" name="user_id">
                <button type="submit" class="btn btn-primary" style="width: 100%;">Update User</button>
            </form>
        </div>
    </div>

    <script>
        // Hamburger menu toggle
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

        function showCreateModal() {
            // Reset the form using native reset method
            const form = document.querySelector('#createModal form');
            if (form) {
                form.reset();
            }
            // Extra safety: explicitly clear checkboxes
            document.querySelectorAll('#createModal input[type="checkbox"]').forEach(el => {
                el.checked = false;
            });
            document.getElementById('createModal').classList.add('show');
        }

        function closeCreateModal() {
            document.getElementById('createModal').classList.remove('show');
            // Reset form on close as well
            const form = document.querySelector('#createModal form');
            if (form) {
                form.reset();
            }
        }

        function showEditModal(user) {
            document.getElementById('editUserId').value = user.id;
            document.getElementById('editFullName').value = user.full_name;
            document.getElementById('editEmail').value = user.email;
            document.getElementById('editRole').value = user.role;
            document.getElementById('editIsActive').checked = user.is_active ? true : false;

            // First, clear all capability checkboxes
            document.getElementById('capEnquiries').checked = false;
            document.getElementById('capAbandoned').checked = false;
            document.getElementById('capBlogs').checked = false;

            // Then set the capabilities from database
            try {
                const caps = JSON.parse(user.capabilities || '[]');
                console.log('Loaded capabilities:', caps);
                if (Array.isArray(caps)) {
                    if (caps.includes('enquiries')) document.getElementById('capEnquiries').checked = true;
                    if (caps.includes('abandoned_entries')) document.getElementById('capAbandoned').checked = true;
                    if (caps.includes('blogs')) document.getElementById('capBlogs').checked = true;
                }
            } catch (e) {
                console.log('Error parsing capabilities:', e);
            }

            document.getElementById('editModal').classList.add('show');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.remove('show');
            // Reset edit form on close
            const form = document.getElementById('editForm');
            if (form) {
                form.reset();
            }
        }

        function deleteUser(userId) {
            if (confirm('Are you sure you want to delete this user? This action cannot be undone.')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.innerHTML = '<input type="hidden" name="action" value="delete"><input type="hidden" name="user_id" value="' + userId + '">';
                document.body.appendChild(form);
                form.submit();
            }
        }

        // Close modals and reset forms when clicking outside
        window.onclick = function(event) {
            const createModal = document.getElementById('createModal');
            const editModal = document.getElementById('editModal');
            if (event.target === createModal) {
                closeCreateModal();
            }
            if (event.target === editModal) {
                closeEditModal();
            }
        }
        
        // Auto-close and reset modal on form submit
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(e) {
                if (this.closest('#createModal')) {
                    // Will close after page refresh
                } else if (this.closest('#editModal')) {
                    // Will close after page refresh
                }
            });
        });
    </script>
    
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
        <a href="manage-users" class="active"><i class="fas fa-users"></i> Manage Users</a>
        <?php endif; ?>
        <a href="change-password"><i class="fas fa-key"></i> Change Password</a>
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
</body>
</html>
