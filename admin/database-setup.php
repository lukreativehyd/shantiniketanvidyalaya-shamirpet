<?php
/**
 * Database Setup Script
 * Run this once to create all required tables
 */

$servername = "localhost";
$username = "your_mysql_username";        // Change this
$password = "your_mysql_password";        // Change this
$dbname = "your_database_name";          // Change this

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set charset
$conn->set_charset("utf8mb4");

// 1. Create admin users table
$sql_admin = "CREATE TABLE IF NOT EXISTS admin_users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(100) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(150),
    role ENUM('admin', 'editor') DEFAULT 'editor',
    is_active BOOLEAN DEFAULT true,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    last_login DATETIME
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";

if ($conn->query($sql_admin) === TRUE) {
    echo "✓ admin_users table created successfully<br>";
} else {
    echo "✗ Error creating admin_users table: " . $conn->error . "<br>";
}

// 2. Create enquiries table
$sql_enquiries = "CREATE TABLE IF NOT EXISTS enquiries (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(150) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    subject VARCHAR(200),
    message LONGTEXT NOT NULL,
    source ENUM('home', 'contact') DEFAULT 'contact',
    status ENUM('new', 'read', 'replied', 'archived') DEFAULT 'new',
    notes LONGTEXT,
    shared_to_whatsapp BOOLEAN DEFAULT false,
    shared_at DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_status (status),
    INDEX idx_created_at (created_at),
    INDEX idx_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";

if ($conn->query($sql_enquiries) === TRUE) {
    echo "✓ enquiries table created successfully<br>";
} else {
    echo "✗ Error creating enquiries table: " . $conn->error . "<br>";
}

// 3. Create blogs table
$sql_blogs = "CREATE TABLE IF NOT EXISTS blogs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    slug VARCHAR(255) UNIQUE NOT NULL,
    title VARCHAR(255) NOT NULL,
    excerpt LONGTEXT,
    content LONGTEXT NOT NULL,
    featured_image VARCHAR(255),
    author_id INT,
    status ENUM('draft', 'published', 'archived') DEFAULT 'draft',
    views INT DEFAULT 0,
    published_at DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (author_id) REFERENCES admin_users(id),
    INDEX idx_status (status),
    INDEX idx_published_at (published_at),
    INDEX idx_slug (slug)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";

if ($conn->query($sql_blogs) === TRUE) {
    echo "✓ blogs table created successfully<br>";
} else {
    echo "✗ Error creating blogs table: " . $conn->error . "<br>";
}

// 4. Create admin logs table
$sql_logs = "CREATE TABLE IF NOT EXISTS admin_logs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    admin_id INT,
    action VARCHAR(100),
    details LONGTEXT,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (admin_id) REFERENCES admin_users(id),
    INDEX idx_timestamp (timestamp)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";

if ($conn->query($sql_logs) === TRUE) {
    echo "✓ admin_logs table created successfully<br>";
} else {
    echo "✗ Error creating admin_logs table: " . $conn->error . "<br>";
}

// 5. Create default admin user (username: admin, password: admin123)
$default_admin_pass = password_hash('admin123', PASSWORD_DEFAULT);
$sql_default_admin = "INSERT IGNORE INTO admin_users (username, email, password, full_name, role) 
                      VALUES ('admin', 'admin@shamirpet.edu', '$default_admin_pass', 'Administrator', 'admin')";

if ($conn->query($sql_default_admin) === TRUE) {
    echo "✓ Default admin user created (username: admin, password: admin123)<br>";
} else {
    echo "✗ Error creating default admin: " . $conn->error . "<br>";
}

echo "<br><strong>⚠️ IMPORTANT: Change the default admin password immediately after first login!</strong><br>";
echo "<strong>⚠️ Remember to update db-config.php with your actual database credentials!</strong>";

$conn->close();
?>
