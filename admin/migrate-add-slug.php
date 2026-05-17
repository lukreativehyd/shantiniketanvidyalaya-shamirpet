<?php
// Migration script to add slug column to blogs table
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'db-config.php';

try {
    global $conn;
    
    if (defined('DB_TYPE') && DB_TYPE === 'sqlite') {
        // SQLite migration
        $query = "ALTER TABLE blogs ADD COLUMN slug TEXT UNIQUE";
        $result = $conn->exec($query);
        if ($result !== false) {
            echo "✅ SQLite: slug column added successfully!";
        } else {
            echo "ℹ️ SQLite: " . $conn->lastErrorMsg();
        }
    } else {
        // MySQL migration - check if column exists first
        $check_query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'blogs' AND COLUMN_NAME = 'slug'";
        $result = $conn->query($check_query);
        
        if ($result && $result->num_rows > 0) {
            echo "ℹ️ MySQL: slug column already exists!";
        } else {
            // Add the column
            $query = "ALTER TABLE blogs ADD COLUMN slug VARCHAR(255) UNIQUE AFTER title";
            if ($conn->query($query)) {
                echo "✅ MySQL: slug column added successfully!";
            } else {
                echo "❌ MySQL Error: " . $conn->error;
            }
        }
    }
} catch (Exception $e) {
    echo "❌ Exception: " . $e->getMessage();
}
?>
