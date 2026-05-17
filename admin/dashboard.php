<?php
require 'db-config.php';
check_admin_login();

// Get statistics
$enquiries_count = fetch_value("SELECT COUNT(*) FROM enquiries") ?? 0;
$enquiries_new = fetch_value("SELECT COUNT(*) FROM enquiries WHERE status = 'new'") ?? 0;
$blogs_count = fetch_value("SELECT COUNT(*) FROM blogs") ?? 0;
$blogs_published = fetch_value("SELECT COUNT(*) FROM blogs WHERE status = 'published'") ?? 0;
$abandoned_count = fetch_value("SELECT COUNT(*) FROM abandoned_entries") ?? 0;

// Get recent enquiries
$recent_enquiries = execute_query("SELECT * FROM enquiries ORDER BY created_at DESC LIMIT 5");

// Get recent blogs
$recent_blogs = execute_query("SELECT * FROM blogs ORDER BY created_at DESC LIMIT 5");

// Get recent abandoned entries
$recent_abandoned = execute_query("SELECT * FROM abandoned_entries ORDER BY abandoned_at DESC LIMIT 5");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin Panel</title>
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
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .header h1 {
            font-size: 32px;
            color: #295192;
            font-weight: 900;
        }
        
        .header-actions {
            display: flex;
            gap: 12px;
        }
        
        .btn {
            padding: 10px 20px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
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
            color: white;
        }
        
        /* Statistics Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }
        
        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.12);
        }
        
        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 12px;
        }
        
        .stat-icon.blue {
            background-color: rgba(41, 81, 146, 0.1);
            color: #295192;
        }
        
        .stat-icon.red {
            background-color: rgba(191, 49, 73, 0.1);
            color: #BF3149;
        }
        
        .stat-label {
            font-size: 12px;
            color: #999;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }
        
        .stat-value {
            font-size: 32px;
            font-weight: 900;
            color: #333;
        }
        
        .stat-subtext {
            font-size: 12px;
            color: #BF3149;
            margin-top: 8px;
        }
        
        /* Recent Items Section */
        .recent-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }
        
        .recent-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.08);
            overflow: hidden;
        }
        
        .recent-header {
            padding: 20px;
            border-bottom: 1px solid #e8e9eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .recent-header h3 {
            font-size: 18px;
            color: #295192;
            font-weight: 900;
        }
        
        .recent-content {
            padding: 0;
        }
        
        .recent-item {
            padding: 16px 20px;
            border-bottom: 1px solid #e8e9eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .recent-item:last-child {
            border-bottom: none;
        }
        
        .recent-item-text h4 {
            font-size: 14px;
            color: #333;
            margin-bottom: 4px;
            font-weight: 700;
        }
        
        .recent-item-text p {
            font-size: 12px;
            color: #999;
        }
        
        .status-badge {
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
        
        .status-published {
            background-color: #d4edda;
            color: #155724;
        }
        
        .status-draft {
            background-color: #e8e9eb;
            color: #666;
        }
        
        .stat-icon.orange {
            background-color: #ffc107;
            color: white;
        }
        
        @media (max-width: 1200px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        /* Hamburger Toggle */
        .hamburger-menu {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1001;
            background: #295192;
            border: none;
            color: white;
            padding: 10px 14px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 20px;
            width: 44px;
            height: 44px;
            align-items: center;
            justify-content: center;
        }
        
        @media (max-width: 768px) {
            .hamburger-menu {
                display: flex;
            }
            
            .sidebar {
                position: fixed;
                top: 0;
                left: -260px;
                width: 260px;
                height: 100vh;
                overflow-y: auto;
                transition: left 0.3s ease;
                z-index: 1000;
                padding-top: 80px;
            }
            
            .sidebar.active {
                left: 0;
            }
            
            .sidebar-footer {
                position: relative;
                bottom: auto;
                left: auto;
                width: 100%;
                margin-top: 20px;
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .recent-section {
                grid-template-columns: 1fr;
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
                <li><a href="dashboard" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="enquiries"><i class="fas fa-envelope"></i> Enquiries</a></li>
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
                <div>
                    <h1>Dashboard</h1>
                </div>
                <div class="header-actions">
                    <a href="enquiries" class="btn btn-primary">
                        <i class="fas fa-envelope"></i> View Enquiries
                    </a>
                    <a href="blogs?action=new" class="btn btn-secondary">
                        <i class="fas fa-plus"></i> New Blog
                    </a>
                </div>
            </div>
            
            <!-- Statistics -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon blue">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="stat-label">Total Enquiries</div>
                    <div class="stat-value"><?php echo $enquiries_count; ?></div>
                    <div class="stat-subtext"><?php echo $enquiries_new; ?> new</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon red">
                        <i class="fas fa-comment-dots"></i>
                    </div>
                    <div class="stat-label">Total Blogs</div>
                    <div class="stat-value"><?php echo $blogs_count; ?></div>
                    <div class="stat-subtext"><?php echo $blogs_published; ?> published</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon orange">
                        <i class="fas fa-hourglass-half"></i>
                    </div>
                    <div class="stat-label">Abandoned Entries</div>
                    <div class="stat-value"><?php echo $abandoned_count; ?></div>
                    <div class="stat-subtext">pending follow-up</div>
                </div>
            </div>
            
            <!-- Recent Items -->
            <div class="recent-section">
                <!-- Recent Enquiries -->
                <div class="recent-card">
                    <div class="recent-header">
                        <h3>Recent Enquiries</h3>
                        <a href="enquiries" style="color: #295192; text-decoration: none; font-size: 12px; font-weight: 700;">View All →</a>
                    </div>
                    <div class="recent-content">
                        <?php foreach (fetch_all($recent_enquiries) as $enquiry): ?>
                            <div class="recent-item">
                                <div class="recent-item-text">
                                    <h4><?php echo htmlspecialchars($enquiry['name']); ?></h4>
                                    <p><?php echo htmlspecialchars(substr($enquiry['message'], 0, 50)); ?>...</p>
                                </div>
                                <span class="status-badge status-<?php echo $enquiry['status']; ?>">
                                    <?php echo ucfirst($enquiry['status']); ?>
                                </span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <!-- Recent Blogs -->
                <div class="recent-card">
                    <div class="recent-header">
                        <h3>Recent Blogs</h3>
                        <a href="blogs" style="color: #295192; text-decoration: none; font-size: 12px; font-weight: 700;">View All →</a>
                    </div>
                    <div class="recent-content">
                        <?php foreach (fetch_all($recent_blogs) as $blog): ?>
                            <div class="recent-item">
                                <div class="recent-item-text">
                                    <h4><?php echo htmlspecialchars($blog['title']); ?></h4>
                                    <p><?php echo date('M d, Y', strtotime($blog['created_at'])); ?></p>
                                </div>
                                <span class="status-badge status-<?php echo $blog['status']; ?>">
                                    <?php echo ucfirst($blog['status']); ?>
                                </span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <!-- Recent Abandoned Entries -->
                <div class="recent-card">
                    <div class="recent-header">
                        <h3>Recent Abandoned Entries</h3>
                        <a href="abandoned-entries" style="color: #295192; text-decoration: none; font-size: 12px; font-weight: 700;">View All →</a>
                    </div>
                    <div class="recent-content">
                        <?php foreach (fetch_all($recent_abandoned) as $entry): ?>
                            <div class="recent-item">
                                <div class="recent-item-text">
                                    <h4><?php echo htmlspecialchars($entry['parent_name']); ?></h4>
                                    <p><?php echo htmlspecialchars($entry['student_name']); ?> - Grade <?php echo htmlspecialchars($entry['grade']); ?></p>
                                </div>
                                <span class="status-badge status-draft">
                                    <?php echo ucfirst($entry['status']); ?>
                                </span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Mobile Footer Menu -->
    <div class="mobile-footer-menu">
        <a href="dashboard" class="active"><i class="fas fa-home"></i><span>Home</span></a>
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
            }
        });
    </script>
</body>
</html>
