<?php
/**
 * Database Migration - Update Enquiries Table for New Form
 * This script updates the enquiries table to support the new student enquiry form
 */

require __DIR__ . '/db-config.php';

echo "<h2>Migrating Enquiries Table...</h2>";

try {
    if (DB_TYPE === 'sqlite') {
        // SQLite migration
        echo "<p>Detected SQLite database...</p>";
        
        // Check if new columns exist, if not add them
        $tables = $conn->query("PRAGMA table_info(enquiries)");
        $columns = [];
        while ($row = $tables->fetch(PDO::FETCH_ASSOC)) {
            $columns[] = $row['name'];
        }
        
        $alterations = [];
        
        if (!in_array('parent_name', $columns)) {
            $conn->exec("ALTER TABLE enquiries ADD COLUMN parent_name TEXT");
            $alterations[] = "✓ Added parent_name column";
        }
        
        if (!in_array('mobile_number', $columns)) {
            $conn->exec("ALTER TABLE enquiries ADD COLUMN mobile_number TEXT");
            $alterations[] = "✓ Added mobile_number column";
        }
        
        if (!in_array('child_name', $columns)) {
            $conn->exec("ALTER TABLE enquiries ADD COLUMN child_name TEXT");
            $alterations[] = "✓ Added child_name column";
        }
        
        if (!in_array('age', $columns)) {
            $conn->exec("ALTER TABLE enquiries ADD COLUMN age INTEGER");
            $alterations[] = "✓ Added age column";
        }
        
        if (!in_array('grade', $columns)) {
            $conn->exec("ALTER TABLE enquiries ADD COLUMN grade TEXT");
            $alterations[] = "✓ Added grade column";
        }
        
        if (!in_array('source', $columns)) {
            $conn->exec("ALTER TABLE enquiries ADD COLUMN source TEXT DEFAULT 'home'");
            $alterations[] = "✓ Added source column";
        }
        
        if (empty($alterations)) {
            echo "<p style='color: green;'>✓ SQLite table already has all required columns!</p>";
        } else {
            foreach ($alterations as $alt) {
                echo "<p style='color: green;'>$alt</p>";
            }
        }
        
    } else {
        // MySQL migration
        echo "<p>Detected MySQL database...</p>";
        
        // Check table structure
        $result = $conn->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'enquiries' AND TABLE_SCHEMA = '" . DB_NAME . "'");
        $columns = [];
        while ($row = $result->fetch_assoc()) {
            $columns[] = $row['COLUMN_NAME'];
        }
        
        $alterations = [];
        
        if (!in_array('parent_name', $columns)) {
            $conn->query("ALTER TABLE enquiries ADD COLUMN parent_name VARCHAR(150)");
            $alterations[] = "✓ Added parent_name column";
        }
        
        if (!in_array('mobile_number', $columns)) {
            $conn->query("ALTER TABLE enquiries ADD COLUMN mobile_number VARCHAR(20)");
            $alterations[] = "✓ Added mobile_number column";
        }
        
        if (!in_array('child_name', $columns)) {
            $conn->query("ALTER TABLE enquiries ADD COLUMN child_name VARCHAR(150)");
            $alterations[] = "✓ Added child_name column";
        }
        
        if (!in_array('age', $columns)) {
            $conn->query("ALTER TABLE enquiries ADD COLUMN age INT");
            $alterations[] = "✓ Added age column";
        }
        
        if (!in_array('grade', $columns)) {
            $conn->query("ALTER TABLE enquiries ADD COLUMN grade VARCHAR(50)");
            $alterations[] = "✓ Added grade column";
        }
        
        if (!in_array('source', $columns)) {
            $conn->query("ALTER TABLE enquiries ADD COLUMN source VARCHAR(100) DEFAULT 'home'");
            $alterations[] = "✓ Added source column";
        }
        
        if (empty($alterations)) {
            echo "<p style='color: green;'>✓ MySQL table already has all required columns!</p>";
        } else {
            foreach ($alterations as $alt) {
                echo "<p style='color: green;'>$alt</p>";
            }
        }
    }
    
    echo "<p style='color: green; font-weight: bold;'>✅ Migration completed successfully!</p>";
    echo "<p><a href='dashboard.php'>Return to Admin Dashboard</a></p>";
    
} catch (Exception $e) {
    echo "<p style='color: red;'><strong>Error during migration:</strong> " . $e->getMessage() . "</p>";
    echo "<p><a href='dashboard.php'>Return to Admin Dashboard</a></p>";
}
?>