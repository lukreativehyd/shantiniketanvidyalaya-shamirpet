<?php
/**
 * Add Missing Columns to admin_users Table
 * Run this to add password reset and capabilities features
 */

require 'db-config.php';

$columns_added = 0;
$errors = [];

try {
    // Check and add reset_token column
    try {
        $conn->query("ALTER TABLE admin_users ADD COLUMN reset_token VARCHAR(255) DEFAULT NULL");
        $columns_added++;
        echo "✓ Added reset_token column<br>";
    } catch (PDOException $e) {
        if (strpos($e->getMessage(), 'Duplicate') !== false) {
            echo "✓ reset_token column already exists<br>";
        } else {
            $errors[] = "Error adding reset_token: " . $e->getMessage();
        }
    }

    // Check and add reset_expires column
    try {
        $conn->query("ALTER TABLE admin_users ADD COLUMN reset_expires DATETIME DEFAULT NULL");
        $columns_added++;
        echo "✓ Added reset_expires column<br>";
    } catch (PDOException $e) {
        if (strpos($e->getMessage(), 'Duplicate') !== false) {
            echo "✓ reset_expires column already exists<br>";
        } else {
            $errors[] = "Error adding reset_expires: " . $e->getMessage();
        }
    }

    // Check and add capabilities column
    try {
        $conn->query("ALTER TABLE admin_users ADD COLUMN capabilities JSON DEFAULT '[]'");
        $columns_added++;
        echo "✓ Added capabilities column<br>";
    } catch (PDOException $e) {
        if (strpos($e->getMessage(), 'Duplicate') !== false) {
            echo "✓ capabilities column already exists<br>";
        } else {
            // Try TEXT as fallback if JSON not supported
            try {
                $conn->query("ALTER TABLE admin_users ADD COLUMN capabilities TEXT DEFAULT '[]'");
                $columns_added++;
                echo "✓ Added capabilities column (as TEXT)<br>";
            } catch (PDOException $e2) {
                $errors[] = "Error adding capabilities: " . $e2->getMessage();
            }
        }
    }

    // Check and ensure email column exists
    try {
        $result = $conn->query("SELECT email FROM admin_users LIMIT 1");
        echo "✓ email column exists<br>";
    } catch (PDOException $e) {
        try {
            $conn->query("ALTER TABLE admin_users ADD COLUMN email VARCHAR(100) UNIQUE");
            echo "✓ Added email column<br>";
        } catch (PDOException $e2) {
            $errors[] = "Error adding email: " . $e2->getMessage();
        }
    }

    echo "<br>";
    if (empty($errors)) {
        echo "<strong>✓ Migration completed successfully! All required columns are in place.</strong><br>";
        echo "You can now use:<br>";
        echo "- Password reset feature: /admin/reset-password.php<br>";
        echo "- User management: /admin/manage-users.php<br>";
    } else {
        echo "<strong>⚠ Migration completed with warnings:</strong><br>";
        foreach ($errors as $error) {
            echo "- $error<br>";
        }
    }

} catch (Exception $e) {
    die("Fatal error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Migration</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        strong { color: #295192; }
    </style>
</head>
<body>
    <h2>Admin Database Migration</h2>
    <p>This script adds necessary columns to support password reset and user capabilities.</p>
    <div id="log" style="background: #f5f5f5; padding: 15px; border-radius: 5px; margin-top: 10px;"></div>
</body>
</html>
