<?php
/**
 * Database Initialization
 * Creates all necessary tables for admin system
 */

require_once 'db-config.php';

$success = true;
$messages = [];

// ========================================
// TABLE CREATION FUNCTIONS
// ========================================

// Create admin_users table
function create_admin_users_table() {
    global $conn;
    
    if (DB_TYPE === 'sqlite') {
        $sql = "CREATE TABLE IF NOT EXISTS admin_users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            username TEXT UNIQUE NOT NULL,
            full_name TEXT NOT NULL,
            email TEXT UNIQUE NOT NULL,
            password TEXT NOT NULL,
            role TEXT DEFAULT 'admin',
            is_active INTEGER DEFAULT 1,
            last_login DATETIME,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )";
        try {
            $conn->exec($sql);
            return true;
        } catch (Exception $e) {
            return false;
        }
    } else {
        $sql = "CREATE TABLE IF NOT EXISTS admin_users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(255) UNIQUE NOT NULL,
            full_name VARCHAR(255) NOT NULL,
            email VARCHAR(255) UNIQUE NOT NULL,
            password VARCHAR(255) NOT NULL,
            role VARCHAR(50) DEFAULT 'admin',
            is_active BOOLEAN DEFAULT 1,
            last_login DATETIME,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            INDEX idx_username (username),
            INDEX idx_is_active (is_active)
        )";
        return $conn->query($sql) === TRUE;
    }
}

// Create enquiries table
function create_enquiries_table() {
    global $conn;
    
    if (DB_TYPE === 'sqlite') {
        $sql = "CREATE TABLE IF NOT EXISTS enquiries (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            parent_name TEXT NOT NULL,
            email TEXT NOT NULL,
            mobile_number TEXT NOT NULL,
            child_name TEXT NOT NULL,
            age INTEGER,
            grade TEXT,
            message TEXT,
            source TEXT DEFAULT 'home',
            status TEXT DEFAULT 'new',
            notes TEXT,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )";
        try {
            $conn->exec($sql);
            return true;
        } catch (Exception $e) {
            return false;
        }
    } else {
        $sql = "CREATE TABLE IF NOT EXISTS enquiries (
            id INT AUTO_INCREMENT PRIMARY KEY,
            parent_name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            mobile_number VARCHAR(20) NOT NULL,
            child_name VARCHAR(255) NOT NULL,
            age INT,
            grade VARCHAR(50),
            message LONGTEXT,
            source VARCHAR(50) DEFAULT 'home',
            status VARCHAR(50) DEFAULT 'new',
            notes LONGTEXT,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            INDEX idx_status (status),
            INDEX idx_created_at (created_at),
            INDEX idx_email (email)
        )";
        return $conn->query($sql) === TRUE;
    }
}

// Create abandoned_entries table
function create_abandoned_entries_table() {
    global $conn;
    
    if (DB_TYPE === 'sqlite') {
        $sql = "CREATE TABLE IF NOT EXISTS abandoned_entries (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            parent_name TEXT,
            email TEXT,
            phone TEXT,
            student_name TEXT,
            age TEXT,
            grade TEXT,
            message TEXT,
            form_source TEXT DEFAULT 'popup form',
            status TEXT DEFAULT 'new',
            notes TEXT,
            abandoned_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )";
        try {
            $conn->exec($sql);
            return true;
        } catch (Exception $e) {
            return false;
        }
    } else {
        $sql = "CREATE TABLE IF NOT EXISTS abandoned_entries (
            id INT AUTO_INCREMENT PRIMARY KEY,
            parent_name VARCHAR(255),
            email VARCHAR(255),
            phone VARCHAR(20),
            student_name VARCHAR(255),
            age INT,
            grade VARCHAR(50),
            message LONGTEXT,
            form_source VARCHAR(50) DEFAULT 'popup form',
            status VARCHAR(50) DEFAULT 'new',
            notes LONGTEXT,
            abandoned_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            INDEX idx_status (status),
            INDEX idx_abandoned_at (abandoned_at),
            INDEX idx_email (email)
        )";
        return $conn->query($sql) === TRUE;
    }
}

// Create blogs table
function create_blogs_table() {
    global $conn;
    
    if (DB_TYPE === 'sqlite') {
        $sql = "CREATE TABLE IF NOT EXISTS blogs (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            title TEXT NOT NULL,
            slug TEXT UNIQUE,
            excerpt TEXT,
            content LONGTEXT NOT NULL,
            featured_image TEXT,
            author_id INTEGER,
            status TEXT DEFAULT 'draft',
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )";
        try {
            $conn->exec($sql);
            return true;
        } catch (Exception $e) {
            return false;
        }
    } else {
        $sql = "CREATE TABLE IF NOT EXISTS blogs (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            slug VARCHAR(255) UNIQUE,
            excerpt TEXT,
            content LONGTEXT NOT NULL,
            featured_image VARCHAR(500),
            author_id INT,
            status VARCHAR(50) DEFAULT 'draft',
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            INDEX idx_status (status),
            INDEX idx_author (author_id),
            INDEX idx_slug (slug)
        )";
        return $conn->query($sql) === TRUE;
    }
}

// Create admin logs table
function create_admin_logs_table() {
    global $conn;
    
    if (DB_TYPE === 'sqlite') {
        $sql = "CREATE TABLE IF NOT EXISTS admin_logs (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            admin_id INTEGER,
            action TEXT,
            details TEXT,
            timestamp DATETIME DEFAULT CURRENT_TIMESTAMP
        )";
        try {
            $conn->exec($sql);
            return true;
        } catch (Exception $e) {
            return false;
        }
    } else {
        $sql = "CREATE TABLE IF NOT EXISTS admin_logs (
            id INT AUTO_INCREMENT PRIMARY KEY,
            admin_id INT,
            action VARCHAR(255),
            details LONGTEXT,
            timestamp DATETIME DEFAULT CURRENT_TIMESTAMP,
            INDEX idx_admin_id (admin_id),
            INDEX idx_timestamp (timestamp)
        )";
        return $conn->query($sql) === TRUE;
    }
}

// ========================================
// CREATE ALL TABLES
// ========================================

$tables = [
    'admin_users' => create_admin_users_table(),
    'enquiries' => create_enquiries_table(),
    'abandoned_entries' => create_abandoned_entries_table(),
    'blogs' => create_blogs_table(),
    'admin_logs' => create_admin_logs_table()
];

// Check results
$all_success = true;
foreach ($tables as $table_name => $result) {
    if ($result) {
        $messages[] = "✅ Table '$table_name' created/verified";
    } else {
        $messages[] = "⚠️ Issue with table '$table_name'";
        $all_success = false;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Initialization</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
        }
        .messages {
            list-style: none;
            padding: 0;
        }
        .messages li {
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }
        .messages li:last-child {
            border-bottom: none;
        }
        h1 {
            color: #333;
            margin-top: 0;
        }
        .note {
            background-color: #fff3cd;
            padding: 15px;
            border-radius: 4px;
            margin-top: 20px;
            border: 1px solid #ffeeba;
            color: #856404;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Database Initialization</h1>
        
        <?php if ($all_success): ?>
            <div class="success">
                <strong>✅ Database initialized successfully!</strong>
            </div>
        <?php endif; ?>
        
        <h3>Tables Created:</h3>
        <ul class="messages">
            <?php foreach ($messages as $msg): ?>
                <li><?php echo $msg; ?></li>
            <?php endforeach; ?>
        </ul>
        
        <div class="note">
            <strong>⚠️ IMPORTANT:</strong><br>
            Delete this file (init-database.php) for security!<br>
            <br>
            Use File Manager to delete: <code>admin/init-database.php</code>
        </div>
    </div>
</body>
</html>
