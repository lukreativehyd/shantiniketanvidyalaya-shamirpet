<?php
require 'db-config.php';
check_admin_login();

header('Content-Type: application/json');

// Check if file was uploaded
if (!isset($_FILES['file'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'No file uploaded']);
    exit;
}

$file = $_FILES['file'];

// Validate file type
$allowed_types = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
if (!in_array($file['type'], $allowed_types)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'Invalid file type. Only JPEG, PNG, WebP, and GIF are allowed.']);
    exit;
}

// Validate file size (max 5MB)
$max_size = 5 * 1024 * 1024; // 5MB
if ($file['size'] > $max_size) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'File size too large. Maximum 5MB allowed.']);
    exit;
}

// Create uploads directory if it doesn't exist
$upload_dir = __DIR__ . '/uploads/blogs/';
if (!is_dir($upload_dir)) {
    if (!mkdir($upload_dir, 0755, true)) {
        http_response_code(500);
        echo json_encode(['success' => false, 'error' => 'Failed to create upload directory']);
        exit;
    }
}

// Generate unique filename
$timestamp = time();
$random = rand(1000, 9999);
$original_name = pathinfo($file['name'], PATHINFO_FILENAME);
$extension = pathinfo($file['name'], PATHINFO_EXTENSION);
$filename = $original_name . '-' . $timestamp . '-' . $random . '.' . $extension;
$filepath = $upload_dir . $filename;

// Move uploaded file
if (!move_uploaded_file($file['tmp_name'], $filepath)) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Failed to save file']);
    exit;
}

// Return success with image URL (relative to website root)
$url = '../uploads/blogs/' . $filename;
echo json_encode([
    'success' => true,
    'url' => $url,
    'filename' => $filename
]);
?>
