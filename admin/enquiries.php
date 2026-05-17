<?php
$page_title = "Enquiries - Admin Dashboard";
require_once 'db-config.php';
check_admin_login();
require_capability('enquiries');

// Handle CSV download
if (isset($_GET['export']) && $_GET['export'] === 'csv') {
    $date_from = sanitize($_GET['date_from'] ?? '');
    $date_to = sanitize($_GET['date_to'] ?? '');
    $status_filter = sanitize($_GET['status'] ?? '');
    
    $where_clause = "1=1";
    if ($date_from) $where_clause .= " AND DATE(created_at) >= '$date_from'";
    if ($date_to) $where_clause .= " AND DATE(created_at) <= '$date_to'";
    if ($status_filter) $where_clause .= " AND status = '$status_filter'";
    
    if (DB_TYPE === 'sqlite') {
        $result = $conn->query("SELECT * FROM enquiries WHERE $where_clause ORDER BY created_at DESC");
        $entries = $result->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $result = execute_query("SELECT * FROM enquiries WHERE $where_clause ORDER BY created_at DESC");
        $entries = fetch_all($result);
    }
    
    // Generate CSV
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="enquiries_' . date('Y-m-d_His') . '.csv"');
    
    $output = fopen('php://output', 'w');
    fputcsv($output, ['ID', 'Parent Name', 'Email', 'Phone', 'Student Name', 'Grade', 'Status', 'Created At']);
    
    foreach ($entries as $entry) {
        fputcsv($output, [
            $entry['id'],
            $entry['parent_name'],
            $entry['email'],
            $entry['mobile_number'],
            $entry['child_name'],
            $entry['grade'],
            $entry['status'],
            $entry['created_at']
        ]);
    }
    
    fclose($output);
    exit;
}

// Get filters
$date_from = $_GET['date_from'] ?? date('Y-m-d', strtotime('-30 days'));
$date_to = $_GET['date_to'] ?? date('Y-m-d');
$status_filter = $_GET['status'] ?? '';

// Build query
$where_clause = "1=1";
if ($date_from) $where_clause .= " AND DATE(created_at) >= '$date_from'";
if ($date_to) $where_clause .= " AND DATE(created_at) <= '$date_to'";
if ($status_filter) $where_clause .= " AND status = '$status_filter'";

if (DB_TYPE === 'sqlite') {
    $result = $conn->query("SELECT * FROM enquiries WHERE $where_clause ORDER BY created_at DESC LIMIT 500");
    $entries = $result->fetchAll(PDO::FETCH_ASSOC);
} else {
    $result = execute_query("SELECT * FROM enquiries WHERE $where_clause ORDER BY created_at DESC LIMIT 500");
    $entries = fetch_all($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiries - Admin Dashboard</title>
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
        
        .header {
            margin-bottom: 30px;
        }
        
        .header h1 {
            font-size: 32px;
            color: #295192;
            font-weight: 900;
            margin-bottom: 8px;
        }
        
        .header p {
            color: #999;
            font-size: 14px;
        }
        
        /* Filters */
        .filter-section {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.08);
            margin-bottom: 20px;
        }
        
        .filter-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 15px;
        }
        
        .filter-group {
            display: flex;
            flex-direction: column;
        }
        
        .filter-group label {
            font-size: 12px;
            font-weight: 600;
            color: #666;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .filter-group input,
        .filter-group select {
            padding: 10px 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            font-family: inherit;
        }
        
        .filter-group input:focus,
        .filter-group select:focus {
            outline: none;
            border-color: #295192;
            box-shadow: 0 0 0 3px rgba(41, 81, 146, 0.1);
        }
        
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
        }
        
        .btn-primary {
            background-color: #295192;
            color: white;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            color: white;
        }
        
        .btn-secondary {
            background-color: #BF3149;
            color: white;
        }
        
        .btn-secondary:hover {
            transform: translateY(-2px);
            color: white;
        }
        
        .btn-sm {
            padding: 8px 14px;
            font-size: 12px;
        }
        
        /* Table */
        .table-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.08);
            overflow: hidden;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        thead {
            background-color: #f8f9fa;
            border-bottom: 2px solid #e8e9eb;
        }
        
        th {
            padding: 16px;
            text-align: left;
            font-weight: 700;
            color: #666;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        td {
            padding: 16px;
            border-bottom: 1px solid #e8e9eb;
            font-size: 14px;
        }
        
        tbody tr {
            cursor: pointer;
            transition: background 0.2s;
        }
        
        tbody tr:hover {
            background-color: #f9f9f9;
        }
        
        tbody tr:last-child td {
            border-bottom: none;
        }
        
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
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
        
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #999;
        }
        
        .empty-state i {
            font-size: 48px;
            color: #ddd;
            margin-bottom: 20px;
            display: block;
        }
        
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding: 15px;
                padding-top: 20px;
            }
            
            .filter-row {
                grid-template-columns: 1fr;
            }
            
            .table-container {
                border-radius: 8px;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
            
            table {
                font-size: 12px;
                min-width: 600px;
            }
            
            th, td {
                padding: 10px 8px;
                white-space: nowrap;
            }
            
            .header {
                margin-bottom: 20px;
                padding-left: 20px;
            }
            
            .header h1 {
                font-size: 24px;
            }
            
            .filter-section {
                padding: 15px;
                margin-bottom: 15px;
            }
            
            .btn-sm {
                padding: 6px 10px;
                font-size: 11px;
            }
            
            body.sidebar-open {
                overflow: hidden;
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
                <li><a href="enquiries" class="active"><i class="fas fa-envelope"></i> Enquiries</a></li>
                <li><a href="abandoned-entries"><i class="fas fa-hourglass-half"></i> Abandoned Entries</a></li>
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
            <div class="header">
                <h1>Enquiries</h1>
                <p>Manage incoming enquiries from parents</p>
            </div>
            
            <!-- Filters -->
            <div class="filter-section">
                <form method="GET" class="filter-row">
                    <div class="filter-group">
                        <label>From Date</label>
                        <input type="date" name="date_from" value="<?php echo htmlspecialchars($date_from); ?>">
                    </div>
                    <div class="filter-group">
                        <label>To Date</label>
                        <input type="date" name="date_to" value="<?php echo htmlspecialchars($date_to); ?>">
                    </div>
                    <div class="filter-group">
                        <label>Status</label>
                        <select name="status">
                            <option value="">All Statuses</option>
                            <option value="new" <?php echo $status_filter === 'new' ? 'selected' : ''; ?>>New</option>
                            <option value="contacted" <?php echo $status_filter === 'contacted' ? 'selected' : ''; ?>>Contacted</option>
                            <option value="closed" <?php echo $status_filter === 'closed' ? 'selected' : ''; ?>>Closed</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label>&nbsp;</label>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Filter</button>
                    </div>
                </form>
                <div style="margin-top: 15px;">
                    <a href="enquiries.php?export=csv&date_from=<?php echo urlencode($date_from); ?>&date_to=<?php echo urlencode($date_to); ?>&status=<?php echo urlencode($status_filter); ?>" class="btn btn-secondary btn-sm">
                        <i class="fas fa-download"></i> Download CSV
                    </a>
                </div>
            </div>
            
            <!-- Table -->
            <div class="table-container">
                <?php if (empty($entries)): ?>
                    <div class="empty-state">
                        <i class="fas fa-inbox"></i>
                        <h3>No enquiries found</h3>
                        <p>No enquiries match the selected filters</p>
                    </div>
                <?php else: ?>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($entries as $entry): ?>
                                <tr style="cursor: pointer;" onclick="window.location.href='enquiries-detail.php?id=<?php echo urlencode($entry['id'] ?? ''); ?>'">
                                    <td><strong><?php echo htmlspecialchars($entry['reference_id'] ?? $entry['id'] ?? 'N/A'); ?></strong></td>
                                    <td><?php echo htmlspecialchars($entry['parent_name'] ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($entry['email'] ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($entry['mobile_number'] ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars(strlen($entry['message'] ?? '') > 0 ? (substr($entry['message'], 0, 50) . (strlen($entry['message']) > 50 ? '...' : '')) : '(No message)'); ?></td>
                                    <td>
                                        <span class="status-badge status-<?php echo $entry['status']; ?>"><?php echo ucfirst($entry['status']); ?></span>
                                    </td>
                                    <td><?php echo date('M d, Y', strtotime($entry['created_at'] ?? 'now')); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <!-- Mobile Footer Menu -->
    <div class="mobile-footer-menu">
        <a href="dashboard"><i class="fas fa-home"></i><span>Home</span></a>
        <a href="enquiries" class="active"><i class="fas fa-envelope"></i><span>Enquiries</span></a>
        <a href="abandoned-entries"><i class="fas fa-hourglass-half"></i><span>Abandoned</span></a>
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
