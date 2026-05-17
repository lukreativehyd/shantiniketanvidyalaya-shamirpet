<?php
$page_title = "Abandoned Entry Details - Admin Dashboard";
require_once 'db-config.php';
check_admin_login();
require_capability('abandoned_entries');

// Get entry ID from URL
$id = isset($_GET['id']) ? sanitize($_GET['id']) : null;

if (!$id) {
    header('Location: abandoned-entries.php');
    exit;
}

// Handle combined remarks and status update
$changes_made = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_POST['remarks']) || isset($_POST['status']))) {
    $updates = [];
    $params = [];
    
    if (isset($_POST['remarks'])) {
        $remarks = sanitize($_POST['remarks']);
        if (DB_TYPE === 'sqlite') {
            $updates[] = "notes = ?";
            $params[] = $remarks;
        } else {
            $updates[] = "notes = '$remarks'";
        }
        $changes_made[] = "Notes updated";
    }
    
    if (isset($_POST['status'])) {
        $new_status = sanitize($_POST['status']);
        if (DB_TYPE === 'sqlite') {
            $updates[] = "status = ?";
            $params[] = $new_status;
        } else {
            $updates[] = "status = '$new_status'";
        }
        $changes_made[] = "Status changed to " . ucfirst($new_status);
    }
    
    if (!empty($updates)) {
        if (DB_TYPE === 'sqlite') {
            $params[] = date('Y-m-d H:i:s');
            $params[] = $id;
            $update_query = "UPDATE abandoned_entries SET " . implode(", ", $updates) . ", updated_at = ? WHERE id = ?";
            $stmt = $conn->prepare($update_query);
            $stmt->execute($params);
        } else {
            execute_query("UPDATE abandoned_entries SET " . implode(", ", $updates) . ", updated_at = NOW() WHERE id = '$id'");
        }
        
        // Update entry array
        if (isset($_POST['remarks'])) {
            $entry['notes'] = $remarks;
        }
        if (isset($_POST['status'])) {
            $entry['status'] = $new_status;
        }
    }
}

// Handle delete
if (isset($_POST['delete'])) {
    if (DB_TYPE === 'sqlite') {
        $stmt = $conn->prepare("DELETE FROM abandoned_entries WHERE id = ?");
        $stmt->execute([$id]);
    } else {
        execute_query("DELETE FROM abandoned_entries WHERE id = '$id'");
    }
    
    header('Location: abandoned-entries.php');
    exit;
}

// Fetch entry from database
if (DB_TYPE === 'sqlite') {
    $stmt = $conn->prepare("SELECT * FROM abandoned_entries WHERE id = ?");
    $stmt->execute([$id]);
    $entry = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    $result = execute_query("SELECT * FROM abandoned_entries WHERE id = '$id'");
    $entry = fetch_one($result);
}

if (!$entry) {
    header('Location: abandoned-entries.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page_title); ?></title>
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
        
        /* Main content */
        .main-content {
            margin-left: 260px;
            padding: 30px;
            flex: 1;
        }
        
        .breadcrumb {
            margin-bottom: 20px;
            font-size: 14px;
        }
        
        .breadcrumb a {
            color: #295192;
            text-decoration: none;
            font-weight: 600;
        }
        
        .breadcrumb a:hover {
            text-decoration: underline;
        }
        
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 40px;
        }
        
        .header-left h1 {
            font-size: 36px;
            color: #295192;
            font-weight: 900;
            margin-bottom: 10px;
            letter-spacing: -0.5px;
        }
        
        .header-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .source-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            background: linear-gradient(135deg, #295192, #1f3b6b);
            color: white;
        }
        
        .action-buttons {
            display: flex;
            flex-direction: row;
            gap: 10px;
            flex-wrap: nowrap;
            align-items: center;
            width: auto;
        }
        
        .btn-sm {
            padding: 10px 14px;
            border: none;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            transition: all 0.3s ease;
            white-space: nowrap;
            flex-shrink: 0;
        }
        
        .btn-primary {
            background-color: #295192;
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #1f3b6b;
            transform: translateY(-2px);
        }
        
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
        
        .btn-danger:hover {
            background-color: #c82333;
            transform: translateY(-2px);
        }
        
        /* Detail sections */
        .detail-card {
            background: white;
            border-radius: 14px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            border: 1px solid rgba(41, 81, 146, 0.08);
            padding: 35px;
            margin-bottom: 25px;
        }
        
        .detail-card h3 {
            color: #295192;
            font-size: 22px;
            font-weight: 800;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
            letter-spacing: -0.3px;
        }
        
        .detail-card h3 i {
            color: #295192;
        }
        
        .detail-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            grid-auto-flow: dense;
        }
        
        .detail-item {
            display: flex;
            flex-direction: column;
            padding-bottom: 18px;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .detail-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }
        
        .detail-label {
            font-size: 12px;
            font-weight: 800;
            color: #7f8c8d;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 0;
        }
        
        .detail-value {
            font-size: 16px;
            color: #2c3e50;
            font-weight: 600;
            word-break: break-word;
            line-height: 1.5;
        }
        
        /* Status & Remarks Section */
        .status-timeline-wrapper {
            display: grid;
            grid-template-columns: 600px 1fr;
            gap: 25px;
            margin-bottom: 20px;
        }
        
        .status-remarks-section {
            background: white;
            border-radius: 14px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            border: 1px solid rgba(41, 81, 146, 0.08);
            padding: 35px;
            max-width: none;
        }
        
        .section-title {
            color: #295192;
            font-size: 20px;
            font-weight: 800;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
            letter-spacing: -0.3px;
        }
        
        .section-content {
            display: block;
        }
        
        .status-subsection {
            display: flex;
            flex-direction: column;
            margin-bottom: 25px;
        }
        
        .status-label {
            font-size: 12px;
            font-weight: 800;
            color: #295192;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 14px;
            display: block;
        }
        
        .remarks-subsection {
            margin-bottom: 25px;
        }
        
        .remarks-subsection textarea {
            width: 100%;
            padding: 14px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-family: inherit;
            font-size: 15px;
            resize: vertical;
            min-height: 120px;
            transition: all 0.3s ease;
        }
        
        .remarks-subsection textarea:focus {
            outline: none;
            border-color: #295192;
            background: white;
            box-shadow: 0 0 0 3px rgba(41, 81, 146, 0.1);
        }
        
        .status-subsection select {
            width: 100%;
            padding: 12px 14px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 15px;
            font-family: inherit;
            transition: all 0.3s ease;
            background: white;
        }
        
        .status-subsection select:focus {
            outline: none;
            border-color: #295192;
            box-shadow: 0 0 0 3px rgba(41, 81, 146, 0.1);
        }
        
        .status-remarks-section form > button {
            width: 100%;
            padding: 14px 16px;
            background: linear-gradient(135deg, #295192, #1f3b6b);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 700;
            font-size: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.3s ease;
        }
        
        .status-remarks-section form > button:hover {
            box-shadow: 0 4px 12px rgba(41, 81, 146, 0.3);
            transform: translateY(-2px);
        }
        
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            margin-top: 8px;
        }
        
        .status-new {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .status-contacted {
            background-color: #cfe2ff;
            color: #055160;
        }
        
        .status-closed {
            background-color: #d4edda;
            color: #155724;
        }
        
        /* Timeline */
        .timeline-card {
            background: white;
            border-radius: 14px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            border: 1px solid rgba(41, 81, 146, 0.08);
            padding: 35px;
            max-height: 500px;
            overflow-y: auto;
        }
        
        .timeline-card::-webkit-scrollbar {
            width: 6px;
        }
        
        .timeline-card::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        .timeline-card::-webkit-scrollbar-thumb {
            background: #295192;
            border-radius: 10px;
        }
        
        .timeline-card::-webkit-scrollbar-thumb:hover {
            background: #1f3b6b;
        }
        
        .timeline-card h3 {
            color: #295192;
            font-size: 20px;
            font-weight: 800;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
            letter-spacing: -0.3px;
        }
        
        .timeline-item {
            display: flex;
            gap: 18px;
            margin-bottom: 20px;
            align-items: flex-start;
        }
        
        .timeline-dot {
            min-width: 14px;
            width: 14px;
            height: 14px;
            background: linear-gradient(135deg, #295192, #1f3b6b);
            border-radius: 50%;
            margin-top: 3px;
            flex-shrink: 0;
        }
        
        .timeline-text {
            font-size: 14px;
            color: #555;
            line-height: 1.6;
        }
        
        .timeline-text strong {
            color: #2c3e50;
            font-weight: 700;
        }
        
        .timeline-text small {
            color: #999;
            font-size: 12px;
            display: block;
            margin-top: 4px;
        }
        
        @media (max-width: 768px) {
            
            
            
            
            
            
            .main-content {
                margin-left: 0;
                padding: 15px;
            }
            
            .page-header {
                flex-direction: column;
                gap: 15px;
            }
            
            .action-buttons {
                flex-direction: column;
                width: 100%;
            }
            
            .action-buttons .btn {
                width: 100%;
            }
            
            .status-timeline-wrapper {
                grid-template-columns: 1fr;
            }
            
            .timeline-card {
                max-height: 300px;
            }
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
                <li><a href="abandoned-entries" class="active"><i class="fas fa-hourglass-half"></i> Abandoned Entries</a></li>
                <li><a href="blogs"><i class="fas fa-blog"></i> Blogs</a></li>
                <?php if ($_SESSION['admin_role'] === 'admin'): ?>
                <li><a href="manage-users"><i class="fas fa-users"></i> Manage Users</a></li>
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
            <!-- Breadcrumb -->
            <div class="breadcrumb">
                <a href="abandoned-entries.php"><i class="fas fa-arrow-left"></i> Back to Abandoned Entries</a>
            </div>
            
            <!-- Page Header with Actions -->
            <div class="page-header">
                <div class="header-left">
                    <h1>Abandoned Entry Details</h1>
                    <div style="font-size: 13px; color: #666;">Entry ID: <strong><?php echo htmlspecialchars($entry['id']); ?></strong></div>
                </div>
                <div class="header-info">
                    <div class="source-badge">
                        <i class="fas fa-hourglass-half"></i>
                        <strong>Abandoned</strong>
                    </div>
                    <div class="action-buttons">
                        <button onclick="copyEntry()" class="btn-sm btn-primary" title="Copy details">
                            <i class="fas fa-copy"></i> Copy
                        </button>
                        <a href="mailto:<?php echo htmlspecialchars($entry['email']); ?>" class="btn-sm btn-primary" title="Send email">
                            <i class="fas fa-envelope"></i> Email
                        </a>
                        <button onclick="if(confirm('Delete this entry permanently?')) { document.getElementById('deleteForm').submit(); }" class="btn-sm btn-danger" title="Delete">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Abandoned Entry Details Card -->
            <div class="detail-card">
                <h3><i class="fas fa-file-invoice"></i> Entry Information</h3>
                <div class="detail-grid">
                    <div class="detail-item">
                        <div class="detail-label">Parent Name</div>
                        <div class="detail-value"><?php echo htmlspecialchars($entry['parent_name']); ?></div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Email</div>
                        <div class="detail-value"><?php echo htmlspecialchars($entry['email'] ?? 'Not provided'); ?></div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Phone</div>
                        <div class="detail-value"><?php echo htmlspecialchars($entry['phone'] ?? 'Not provided'); ?></div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Student Name</div>
                        <div class="detail-value"><?php echo htmlspecialchars($entry['student_name']); ?></div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Age</div>
                        <div class="detail-value"><?php echo htmlspecialchars($entry['age'] ?? 'Not provided'); ?></div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Grade</div>
                        <div class="detail-value"><?php echo htmlspecialchars($entry['grade'] ?? 'Not provided'); ?></div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Abandoned At</div>
                        <div class="detail-value"><?php echo date('M d, Y \a\t g:i A', strtotime($entry['abandoned_at'])); ?></div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Source</div>
                        <div class="detail-value"><?php echo htmlspecialchars($entry['source'] ?? 'unknown'); ?></div>
                    </div>
                </div>
                
                <!-- Message Section (Full Width) -->
                <div style="margin-top: 25px; padding-top: 25px; border-top: 2px solid #f0f0f0;">
                    <div class="detail-label">Message</div>
                    <div class="detail-value" style="border: 1px solid #f0f0f0; padding: 12px; border-radius: 6px; background: #f9f9f9; margin-top: 8px; line-height: 1.6; white-space: pre-wrap;">
                        <?php echo nl2br(htmlspecialchars($entry['message'] ?? 'No message provided')); ?>
                    </div>
                </div>
            </div>
            
            <!-- Status & Remarks + Timeline Wrapper -->
            <div class="status-timeline-wrapper">
                <!-- Status & Remarks Combined Section -->
                <div class="status-remarks-section">
                    <h3 class="section-title"><i class="fas fa-tasks"></i> Status & Notes</h3>
                    <div class="section-content">
                        <!-- Combined Form -->
                        <form method="POST">
                            <!-- Remarks Subsection -->
                            <div class="remarks-subsection">
                                <label class="status-label"><i class="fas fa-sticky-note"></i> Remarks & Notes</label>
                                <textarea name="remarks" placeholder="Add internal notes about this abandoned entry..."><?php echo htmlspecialchars($entry['notes'] ?? ''); ?></textarea>
                            </div>
                            
                            <!-- Status Subsection -->
                            <div class="status-subsection">
                                <label class="status-label"><i class="fas fa-sync-alt"></i> Status</label>
                                <select name="status">
                                    <option value="new" <?php echo ($entry['status'] ?? '') === 'new' ? 'selected' : ''; ?>>New</option>
                                    <option value="contacted" <?php echo ($entry['status'] ?? '') === 'contacted' ? 'selected' : ''; ?>>Contacted</option>
                                    <option value="closed" <?php echo ($entry['status'] ?? '') === 'closed' ? 'selected' : ''; ?>>Closed</option>
                                </select>
                            </div>
                            
                            <!-- Single Save Button -->
                            <button type="submit">
                                <i class="fas fa-save"></i> Save
                            </button>
                            
                            <!-- Current Status Badge -->
                            <div style="margin-top: 12px;">
                                <span class="status-badge status-<?php echo $entry['status'] ?? 'new'; ?>">
                                    <?php echo ucfirst($entry['status'] ?? 'new'); ?>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Timeline -->
                <div class="timeline-card">
                    <h3><i class="fas fa-history"></i> Activity Timeline</h3>
                    
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-text">
                            <strong>Entry Abandoned</strong>
                            <small><?php echo date('M d, Y \a\t g:i A', strtotime($entry['abandoned_at'])); ?></small>
                        </div>
                    </div>
                    
                    <?php if (!empty($entry['notes'])): ?>
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-text">
                            <strong>Notes Updated</strong>
                            <small><?php echo date('M d, Y \a\t g:i A', strtotime($entry['updated_at'] ?? date('Y-m-d H:i:s'))); ?></small>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-text">
                            <strong>Status: <?php echo ucfirst($entry['status'] ?? 'new'); ?></strong>
                            <small>Current status</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Mobile Footer Menu -->
    <div class="mobile-footer-menu">
        <a href="dashboard"><i class="fas fa-home"></i><span>Home</span></a>
        <a href="enquiries"><i class="fas fa-envelope"></i><span>Enquiries</span></a>
        <a href="abandoned-entries" class="active"><i class="fas fa-hourglass-half"></i><span>Abandoned</span></a>
        <a href="blogs"><i class="fas fa-blog"></i><span>Blogs</span></a>
        <button id="settingsBtn"><i class="fas fa-cog"></i><span>Settings</span></button>
    </div>
    
    <!-- Settings Submenu -->
    <div class="settings-submenu" id="settingsSubmenu">
        <?php if ($_SESSION['admin_role'] === 'admin'): ?>
        <a href="manage-users"><i class="fas fa-users"></i> Manage Users</a>
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
    
    <form id="deleteForm" method="POST" style="display:none;">
        <input type="hidden" name="delete" value="1">
    </form>
    
    <script>
        function copyEntry() {
            const text = `
Entry ID: <?php echo htmlspecialchars($entry['id']); ?>

Parent Name: <?php echo addslashes($entry['parent_name']); ?>
Email: <?php echo $entry['email'] ?? 'N/A'; ?>
Phone: <?php echo $entry['phone'] ?? 'N/A'; ?>

Student Name: <?php echo addslashes($entry['student_name']); ?>
Age: <?php echo $entry['age'] ?? 'N/A'; ?>
Grade: <?php echo addslashes($entry['grade'] ?? 'N/A'); ?>

Message:
<?php echo addslashes($entry['message']); ?>

Status: <?php echo ucfirst($entry['status'] ?? 'new'); ?>
Abandoned: <?php echo date('M d, Y H:i A', strtotime($entry['abandoned_at'])); ?>
            `.trim();
            
            navigator.clipboard.writeText(text).then(() => {
                alert('Entry details copied to clipboard!');
            }).catch(() => {
                alert('Failed to copy. Please try again.');
            });
        }

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
    </script>
</body>
</html>
