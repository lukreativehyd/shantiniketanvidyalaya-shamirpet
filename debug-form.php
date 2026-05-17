<?php
/**
 * Debug file to test form submission
 * Shows exactly what's being received and sent
 */

header('Content-Type: application/json');
error_log("======== FORM SUBMISSION DEBUG ========");
error_log("TIME: " . date('Y-m-d H:i:s'));
error_log("METHOD: " . $_SERVER['REQUEST_METHOD']);
error_log("POST DATA: " . json_encode($_POST));
error_log("SERVER IP: " . ($_SERVER['REMOTE_ADDR'] ?? 'unknown'));

// Count submissions
$count_file = '/tmp/form_submission_count.txt';
$count = file_exists($count_file) ? (int)file_get_contents($count_file) : 0;
$count++;
file_put_contents($count_file, $count);

error_log("SUBMISSION COUNT IN THIS SESSION: $count");

// Return response
http_response_code(200);
echo json_encode([
    'status' => 'debug',
    'timestamp' => date('Y-m-d H:i:s'),
    'post_data_received' => $_POST,
    'submission_count' => $count,
    'message' => 'Check server error log for details'
]);
?>
