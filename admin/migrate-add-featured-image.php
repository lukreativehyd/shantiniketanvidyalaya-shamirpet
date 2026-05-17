<?php
// Migration script to add featured_image column to blogs table
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'db-config.php';

try {
    global $conn;
    
    if (defined('DB_TYPE') && DB_TYPE === 'sqlite') {
        // SQLite migration
        $query = "ALTER TABLE blogs ADD COLUMN featured_image TEXT";
        $result = $conn->exec($query);
        if ($result) {
            echo "✅ SQLite: featured_image column added successfully!";
        } else {
            echo "❌ SQLite Error: " . $conn->lastErrorMsg();
        }
    } else {
        // MySQL migration - check if column exists first
        $check_query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'blogs' AND COLUMN_NAME = 'featured_image'";
        $result = $conn->query($check_query);
        
        if ($result && $result->num_rows > 0) {
            echo "ℹ️ MySQL: featured_image column already exists!";
        } else {
            // Add the column
            $query = "ALTER TABLE blogs ADD COLUMN featured_image VARCHAR(500) AFTER content";
            if ($conn->query($query)) {
                echo "✅ MySQL: featured_image column added successfully!";
            } else {
                echo "❌ MySQL Error: " . $conn->error;
            }
        }
    }
} catch (Exception $e) {
    echo "❌ Exception: " . $e->getMessage();
}
?>
