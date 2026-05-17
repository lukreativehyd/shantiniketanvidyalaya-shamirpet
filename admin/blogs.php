<?php
// Enable error logging
error_reporting(E_ALL);
ini_set('display_errors', 0); // Don't display errors to user
ini_set('log_errors', 1); // Log errors
ini_set('error_log', __DIR__ . '/error.log'); // Log to file

require 'db-config.php';
check_admin_login();
require_capability('blogs');

$action = $_GET['action'] ?? null;
$blog_id = $_GET['id'] ?? null;
$form_error = '';
$form_success = '';

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post_action = $_POST['action'] ?? null;
    $form_error = '';
    $form_success = '';
    
    error_log('Blog form submitted. Action: ' . $post_action);
    
    if ($post_action === 'create' || $post_action === 'update') {
            $title = sanitize($_POST['title'] ?? '');
            $excerpt = sanitize($_POST['excerpt'] ?? '');
            $content = $_POST['content'] ?? ''; // Don't sanitize - allow HTML from editor
            $status = sanitize($_POST['status'] ?? 'draft');
            $slug = sanitize(strtolower(str_replace(' ', '-', $title)));
            
            error_log('Blog data - Title: ' . $title . ', Status: ' . $status);
            
            // Validate required fields
            if (empty($title)) {
                $form_error = 'Blog title is required';
            } elseif (empty($excerpt)) {
                $form_error = 'Blog excerpt is required';
            } elseif (empty($content) || trim(strip_tags($content)) === '') {
                $form_error = 'Blog content is required - please add content in the editor';
                error_log('Content validation failed. Raw content: ' . var_export($content, true));
            } else {
                // Handle image upload
                $featured_image = '';
                if (!empty($_FILES['featured_image']['name'])) {
                    $featured_image = upload_image($_FILES['featured_image'], __DIR__ . '/uploads/blogs/');
                    if ($featured_image === false) {
                        $form_error = 'Featured image upload failed. Maximum size is 5MB. Only JPG, PNG, WebP, and GIF are allowed.';
                    }
                }
                
                // Only proceed if no image upload error
                if (empty($form_error)) {
                    if ($post_action === 'create') {
                        error_log('Creating new blog...');
                        // Use appropriate datetime function for SQLite vs MySQL
                        $now = (defined('DB_TYPE') && DB_TYPE === 'sqlite') ? "datetime('now')" : "NOW()";
                        
                        // Properly escape all values
                        global $conn;
                        if (defined('DB_TYPE') && DB_TYPE === 'sqlite') {
                            // For SQLite (PDO)
                            $title_esc = $title;
                            $slug_esc = $slug;
                            $excerpt_esc = $excerpt;
                            $content_esc = $content;
                            $featured_esc = $featured_image ?: '';
                            $admin_id = $_SESSION['admin_id'] ?? 1;
                            
                            $query = "INSERT INTO blogs (title, slug, excerpt, content, featured_image, author_id, status, created_at, updated_at) 
                                     VALUES (?, ?, ?, ?, ?, ?, ?, " . $now . ", " . $now . ")";
                            
                            error_log('SQLite query: ' . $query);
                            
                            try {
                                $stmt = $conn->prepare($query);
                                $stmt->execute([$title_esc, $slug_esc, $excerpt_esc, $content_esc, $featured_esc, $admin_id, $status]);
                                $result = true;
                            } catch (Exception $e) {
                                error_log('SQLite insert error: ' . $e->getMessage());
                                $result = false;
                                $db_error = $e->getMessage();
                            }
                        } else {
                            // For MySQL (mysqli)
                            $title_esc = $conn->real_escape_string($title);
                            $slug_esc = $conn->real_escape_string($slug);
                            $excerpt_esc = $conn->real_escape_string($excerpt);
                            $content_esc = $conn->real_escape_string($content);
                            $featured_esc = $conn->real_escape_string($featured_image ?: '');
                            $admin_id = $_SESSION['admin_id'] ?? 1;
                            
                            $query = "INSERT INTO blogs (title, slug, excerpt, content, featured_image, author_id, status, created_at, updated_at) 
                                     VALUES ('$title_esc', '$slug_esc', '$excerpt_esc', '$content_esc', '$featured_esc', '$admin_id', '$status', $now, $now)";
                            
                            error_log('MySQL query: ' . $query);
                            
                            $result = $conn->query($query);
                            if (!$result) {
                                $db_error = $conn->error;
                                error_log('MySQL insert error: ' . $db_error);
                            }
                        }
                        
                        if ($result) {
                            log_action($_SESSION['admin_id'] ?? 1, 'create_blog', "Created blog: $title");
                            $_SESSION['success'] = 'Blog created successfully!';
                            header("Location: blogs.php");
                            exit;
                        } else {
                            $form_error = 'Error creating blog: ' . ($db_error ?? 'Database error');
                        }
            } else if ($post_action === 'update' && $blog_id) {
                // Use appropriate datetime function for SQLite vs MySQL
                $now = (defined('DB_TYPE') && DB_TYPE === 'sqlite') ? "datetime('now')" : "NOW()";
                
                // Properly escape all values
                global $conn;
                if (defined('DB_TYPE') && DB_TYPE === 'sqlite') {
                    // For SQLite (PDO)
                    $title_esc = $title;
                    $slug_esc = $slug;
                    $excerpt_esc = $excerpt;
                    $content_esc = $content;
                    $featured_esc = $featured_image ?: '';
                    
                    $query = "UPDATE blogs SET title = ?, slug = ?, excerpt = ?, content = ?, featured_image = ?, status = ?, updated_at = " . $now . " WHERE id = ?";
                    
                    try {
                        $stmt = $conn->prepare($query);
                        $params = [$title_esc, $slug_esc, $excerpt_esc, $content_esc, $featured_esc, $status, $blog_id];
                        $stmt->execute($params);
                        $result = true;
                    } catch (Exception $e) {
                        error_log('SQLite update error: ' . $e->getMessage());
                        $result = false;
                        $db_error = $e->getMessage();
                    }
                } else {
                    // For MySQL (mysqli)
                    $title_esc = $conn->real_escape_string($title);
                    $slug_esc = $conn->real_escape_string($slug);
                    $excerpt_esc = $conn->real_escape_string($excerpt);
                    $content_esc = $conn->real_escape_string($content);
                    $featured_esc = $conn->real_escape_string($featured_image ?: '');
                    
                    $query = "UPDATE blogs SET title = '$title_esc', slug = '$slug_esc', excerpt = '$excerpt_esc', content = '$content_esc', featured_image = '$featured_esc', status = '$status', updated_at = $now WHERE id = '$blog_id'";                    $result = $conn->query($query);
                    if (!$result) {
                        $db_error = $conn->error;
                        error_log('MySQL update error: ' . $db_error);
                    }
                }
                
                if ($result) {
                    log_action($_SESSION['admin_id'], 'update_blog', "Updated blog: $title");
                    $_SESSION['success'] = 'Blog updated successfully!';
                    header("Location: blogs.php");
                    exit;
                } else {
                    $form_error = 'Error updating blog: ' . ($db_error ?? 'Please try again');
                }
            } // close if ($post_action === 'update')
        } // close if (empty($form_error)) - after image upload
        } // close validation else
    } // close if ($post_action === 'create' || 'update')
} // close if POST

// Delete blog
if ($action === 'delete' && $blog_id) {
    $blogResult = execute_query("SELECT * FROM blogs WHERE id = '$blog_id'");
    $blog = fetch_one($blogResult);
    if ($blog) {
        // Delete featured image if exists
        if ($blog['featured_image'] && file_exists(__DIR__ . '/' . $blog['featured_image'])) {
            unlink(__DIR__ . '/' . $blog['featured_image']);
        }
        
        execute_query("DELETE FROM blogs WHERE id = '$blog_id'");
        log_action($_SESSION['admin_id'], 'delete_blog', "Deleted blog: {$blog['title']}");
        $_SESSION['success'] = 'Blog deleted successfully!';
        header("Location: blogs.php");
        exit;
    }
}


// Get blog details if editing
$blog = null;
if (($action === 'edit' || $action === 'view') && $blog_id) {
    $blogResult = execute_query("SELECT * FROM blogs WHERE id = '$blog_id'");
    $blog = fetch_one($blogResult);
    if (!$blog) {
        $_SESSION['error'] = 'Blog not found';
        header("Location: blogs.php");
        exit;
    }
}


// Get all blogs
$blogs = array();
if (!($action === 'new' || $action === 'edit' || $action === 'view')) {
    $blogsResult = execute_query("SELECT b.*, a.full_name FROM blogs b JOIN admin_users a ON b.author_id = a.id ORDER BY b.created_at DESC");
    $blogs = fetch_all($blogsResult);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($action === 'new' ? 'New Blog' : ($action === 'edit' ? 'Edit Blog' : 'Blogs')); ?> - Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="admin-sidebar.css?v=7.0">
    
    <!-- Quill Editor -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.0/dist/quill.snow.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.0/dist/quill.js"></script>
    
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
            flex: 1;
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
            margin: 0;
            color: #7f8c8d;
            font-size: 14px;
        }

        .btn {
            padding: 10px 18px;
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
            background-color: #1d3574;
        }

        .btn-secondary {
            background-color: #BF3149;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #a02840;
        }

        .message {
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
            color: #333;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #e8e9eb;
            border-radius: 6px;
            font-family: inherit;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #295192;
            box-shadow: 0 0 0 3px rgba(41, 81, 146, 0.1);
        }

        .form-group textarea {
            min-height: 100px;
            resize: vertical;
        }

        /* Quill Editor */
        .ql-toolbar {
            border: 1px solid #e8e9eb;
            border-radius: 6px 6px 0 0;
            background: #f9fafb;
        }

        .ql-container {
            border: 1px solid #e8e9eb;
            border-radius: 0 0 6px 6px;
            font-size: 14px;
        }

        .ql-editor {
            min-height: 300px;
        }

        /* Blog Table */
        .blogs-table {
            width: 100%;
            background: white;
            border-collapse: collapse;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .blogs-table th {
            background: #f5f7fa;
            padding: 15px;
            text-align: left;
            font-weight: 600;
            color: #666;
            font-size: 12px;
            text-transform: uppercase;
            border-bottom: 2px solid #e8e9eb;
        }

        .blogs-table td {
            padding: 15px;
            border-bottom: 1px solid #e8e9eb;
            font-size: 14px;
        }

        .blogs-table tbody tr:hover {
            background: #f9fafb;
        }

        .blogs-table tbody tr:last-child td {
            border-bottom: none;
        }

        .status-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-draft {
            background: #fff3cd;
            color: #856404;
        }

        .status-published {
            background: #d4edda;
            color: #155724;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .action-btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            font-size: 12px;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .action-btn-edit {
            background: #e8f0fe;
            color: #295192;
        }

        .action-btn-edit:hover {
            background: #d4e0f8;
        }

        .action-btn-delete {
            background: #fee;
            color: #c33;
        }

        .action-btn-delete:hover {
            background: #fdd;
        }

        .action-btn-view {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .action-btn-view:hover {
            background: #c8e6c9;
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
            }

            .header h1 {
                font-size: 24px;
            }

            .ql-editor {
                min-height: 200px;
            }
        }

        .sidebar-nav a {
            display: flex;
            align-items: center;
            gap: 12px;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            padding: 12px 16px;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 600;
            font-size: 14px;
        }
        
        .sidebar-nav a:hover,
        .sidebar-nav a.active {
            background-color: rgba(255,255,255,0.15);
            color: white;
        }
        
        
        
        
        
        .main-content {
            margin-left: 260px;
            padding: 30px;
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
            background-color: #a02840;
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
        
        .form-card {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.08);
            max-width: 900px;
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
        
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #e8e9eb;
            border-radius: 6px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #295192;
            box-shadow: 0 0 0 3px rgba(41, 81, 146, 0.1);
        }
        
        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        .image-preview {
            width: 150px;
            height: 150px;
            background-color: #f0f1f3;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
        }
        
        .image-preview img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 6px;
        }
        
        .table-container {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.08);
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th {
            background-color: #f9f9f9;
            padding: 15px 20px;
            text-align: left;
            font-weight: 700;
            color: #666;
            font-size: 12px;
            text-transform: uppercase;
            border-bottom: 1px solid #e8e9eb;
        }
        
        td {
            padding: 15px 20px;
            border-bottom: 1px solid #e8e9eb;
        }
        
        tr:hover {
            background-color: #fafafa;
        }
        
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
        }
        
        .status-published {
            background-color: #d4edda;
            color: #155724;
        }
        
        .status-draft {
            background-color: #e8e9eb;
            color: #666;
        }
        
        .status-archived {
            background-color: #f8d7da;
            color: #721c24;
        }
        
        .action-links {
            display: flex;
            gap: 8px;
        }
        
        .action-links a,
        .action-links button {
            padding: 6px 12px;
            background-color: #295192;
            color: white;
            border-radius: 4px;
            font-size: 12px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .action-links a:hover,
        .action-links button:hover {
            background-color: #1F3B6B;
        }
        
        .action-links .delete {
            background-color: #BF3149;
        }
        
        .action-links .delete:hover {
            background-color: #a02840;
        }
        
        /* Quill Editor Styles */
        .ql-container {
            font-family: 'Manrope', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            font-size: 14px;
            border: 1px solid #e8e9eb;
            border-top: none;
            border-radius: 0 0 6px 6px;
            min-height: 400px;
        }
        
        .ql-editor {
            padding: 15px;
            min-height: 400px;
            max-height: 600px;
            overflow-y: auto;
        }
        
        .ql-toolbar {
            background-color: #f9f9f9 !important;
            border: 1px solid #e8e9eb !important;
            border-radius: 6px 6px 0 0;
        }
        
        .ql-toolbar.ql-snow .ql-stroke {
            stroke: #666 !important;
        }
        
        .ql-toolbar.ql-snow .ql-fill {
            fill: #666 !important;
        }
        
        .ql-toolbar.ql-snow .ql-picker-label {
            color: #666 !important;
        }
        
        .ql-toolbar.ql-snow button:hover,
        .ql-toolbar.ql-snow button.ql-active,
        .ql-toolbar.ql-snow.ql-focus button:hover,
        .ql-toolbar.ql-snow.ql-focus button.ql-active {
            color: #295192 !important;
        }
        
        .ql-toolbar.ql-snow button:hover .ql-stroke,
        .ql-toolbar.ql-snow button.ql-active .ql-stroke,
        .ql-toolbar.ql-snow.ql-focus button:hover .ql-stroke,
        .ql-toolbar.ql-snow.ql-focus button.ql-active .ql-stroke {
            stroke: #295192 !important;
        }
        
        .ql-toolbar.ql-snow button:hover .ql-fill,
        .ql-toolbar.ql-snow button.ql-active .ql-fill {
            fill: #295192 !important;
        }
        
        .ql-editor.ql-blank::before {
            color: #aaa;
            font-style: italic;
        }
        
        .ql-editor img {
            max-width: 100%;
            height: auto;
        }
        
        @media (max-width: 768px) {
            
            
            
            
            
            
            
            
            .main-content {
                margin-left: 0;
                padding: 15px;
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .table-container {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
            
            table {
                font-size: 12px;
                min-width: 500px;
            }
            
            th, td {
                padding: 10px 8px;
                white-space: nowrap;
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
                <li><a href="blogs" class="active"><i class="fas fa-blog"></i> Blogs</a></li>
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
        
        <div class="main-content">
            <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
            </div>
            <?php endif; ?>
            
            <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i>
                <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
            <?php endif; ?>
            
            <?php if (!empty($form_error)): ?>
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i>
                <?php echo $form_error; ?>
            </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i>
                <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
            <?php endif; ?>
            
            <?php if ($action === 'new' || $action === 'edit'): ?>
                <!-- Blog Form -->
                <div class="header">
                    <h1><?php echo ($action === 'new' ? 'Create New Blog' : 'Edit Blog'); ?></h1>
                    <a href="blogs.php" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
                
                <form method="POST" enctype="multipart/form-data" class="form-card">
                    <input type="hidden" name="action" value="<?php echo ($action === 'new' ? 'create' : 'update'); ?>">
                    
                    <div class="form-group">
                        <label for="title">Blog Title *</label>
                        <input 
                            type="text" 
                            id="title" 
                            name="title" 
                            value="<?php echo htmlspecialchars($blog['title'] ?? ''); ?>"
                            placeholder="Enter blog title"
                            required>
                    </div>
                    
                    <div class="form-group">
                        <label for="excerpt">Excerpt *</label>
                        <textarea 
                            id="excerpt" 
                            name="excerpt" 
                            placeholder="Brief description of the blog post"
                            required><?php echo htmlspecialchars($blog['excerpt'] ?? ''); ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="featured_image">Featured Image</label>
                        <input 
                            type="file" 
                            id="featured_image" 
                            name="featured_image" 
                            accept="image/*">
                        <?php if ($action === 'edit' && $blog['featured_image']): ?>
                        <div class="image-preview">
                            <img src="<?php echo htmlspecialchars($blog['featured_image']); ?>" alt="Featured Image">
                        </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="editor">Blog Content *</label>
                        <div id="editor" style="background: white;"><?php echo $blog['content'] ?? ''; ?></div>
                        <textarea id="content" name="content" style="display: none;"><?php echo htmlspecialchars($blog['content'] ?? ''); ?></textarea>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status">
                                <option value="draft" <?php echo ($blog['status'] ?? 'draft') === 'draft' ? 'selected' : ''; ?>>Draft</option>
                                <option value="published" <?php echo ($blog['status'] ?? '') === 'published' ? 'selected' : ''; ?>>Published</option>
                                <option value="archived" <?php echo ($blog['status'] ?? '') === 'archived' ? 'selected' : ''; ?>>Archived</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" style="width: auto;">
                            <i class="fas fa-save"></i> <?php echo ($action === 'new' ? 'Create Blog' : 'Update Blog'); ?>
                        </button>
                    </div>
                </form>
            
            <?php else: ?>
                <!-- Blogs List -->
                <div class="header">
                    <h1>Blog Posts</h1>
                    <a href="blogs.php?action=new" class="btn btn-secondary">
                        <i class="fas fa-plus"></i> New Blog
                    </a>
                </div>
                
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th>Views</th>
                                <th>Published</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($blogs as $post): ?>
                            <tr>
                                <td><strong><?php echo htmlspecialchars($post['title']); ?></strong></td>
                                <td><?php echo htmlspecialchars($post['full_name']); ?></td>
                                <td>
                                    <span class="status-badge status-<?php echo $post['status']; ?>">
                                        <?php echo ucfirst($post['status']); ?>
                                    </span>
                                </td>
                                <td><?php echo isset($post['views']) ? $post['views'] : '0'; ?></td>
                                <td><?php echo isset($post['published_at']) && $post['published_at'] ? date('M d, Y', strtotime($post['published_at'])) : '-'; ?></td>
                                <td>
                                    <div class="action-links">
                                        <a href="blogs.php?action=edit&id=<?php echo $post['id']; ?>">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form method="GET" style="display: inline;">
                                            <input type="hidden" name="action" value="delete">
                                            <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
                                            <button type="submit" class="delete" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <!-- Mobile Footer Menu -->
    <div class="mobile-footer-menu">
        <a href="dashboard"><i class="fas fa-home"></i><span>Home</span></a>
        <a href="enquiries"><i class="fas fa-envelope"></i><span>Enquiries</span></a>
        <a href="abandoned-entries"><i class="fas fa-hourglass-half"></i><span>Abandoned</span></a>
        <a href="blogs" class="active"><i class="fas fa-blog"></i><span>Blogs</span></a>
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
        // Initialize Quill Editor only if editor element exists
        const editorElement = document.getElementById('editor');
        let quill = null;
        
        if (editorElement) {
            quill = new Quill('#editor', {
                theme: 'snow',
                placeholder: 'Write your blog content here...',
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline', 'strike'],
                        ['blockquote', 'code-block'],
                        [{ 'header': 1 }, { 'header': 2 }],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        [{ 'align': [] }],
                        ['link', 'image'],
                        [{ 'script': 'sub'}, { 'script': 'super' }],
                        ['clean']
                    ]
                }
            });
        }
        
        // Quill-dependent code (only run if editor exists)
        if (quill) {
            // Custom image upload handler
            const imageHandler = () => {
                const input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.click();
                
                input.onchange = () => {
                    const file = input.files[0];
                    if (!file) return;
                    
                    // Show loading state
                    const range = quill.getSelection();
                    if (range) {
                        quill.insertText(range.index, 'Uploading image...');
                    }
                    
                    // Upload image
                    const formData = new FormData();
                    formData.append('file', file);
                    
                    fetch('upload-image.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Remove loading text
                            quill.deleteText(range.index, 16);
                            // Insert image
                            quill.insertEmbed(range.index, 'image', data.url);
                            quill.setSelection(range.index + 1);
                        } else {
                            alert('Image upload failed: ' + (data.error || 'Unknown error'));
                            quill.deleteText(range.index, 16);
                        }
                    })
                    .catch(error => {
                        console.error('Upload error:', error);
                        alert('Image upload failed: ' + error.message);
                        quill.deleteText(range.index, 16);
                    });
                };
            };
            
            // Replace default image handler
            quill.getModule('toolbar').addHandler('image', imageHandler);
            
            // Handle form submission - robust content capture
            function handleFormSubmit(e) {
                const contentTextarea = document.getElementById('content');
                
                // Get Quill content
                const quillContent = quill.root.innerHTML;
                
                // Debug: Show what we're getting
                console.log('Quill content:', quillContent);
                console.log('Content length:', quillContent ? quillContent.length : 0);
                
                // Check if content is empty (multiple detection methods)
                const isEmpty = !quillContent || 
                               quillContent.trim() === '' ||
                               quillContent === '<p><br></p>' ||
                               quillContent === '<p></p>' ||
                               quillContent.replace(/<[^>]*>/g, '').trim() === '';
                
                if (isEmpty) {
                    e.preventDefault();
                    alert('Please add content in the editor');
                    console.log('Form submission blocked - empty content');
                    return false;
                }
                
                // Set the hidden textarea value
                contentTextarea.value = quillContent;
                console.log('Form valid - content saved to textarea');
                return true;
            }
            
            // Attach form submission handler
            document.querySelectorAll('form').forEach(form => {
                form.addEventListener('submit', handleFormSubmit);
            });
        }
        
        // Hamburger menu functionality
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
