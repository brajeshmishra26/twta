<?php
session_start();
include 'include/db.php'; // Include your database connection file

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "User not logged in.";
    exit();
}

// Get user email from session
$user_id = $_SESSION['user_id'];
$sql = "SELECT email FROM users WHERE user_id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $to_email = $user['email'];
} else {
    echo "User not found.";
    exit();
}

// Fetch the last MP4 file from the upload_file table
$sql = "SELECT file_name FROM upload_file WHERE file_type = 'mp4' ORDER BY upload_file_id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $file = $result->fetch_assoc();
    $file_path = 'uploads/' . $file['file_name'];

    // Check if the file exists
    if (file_exists($file_path)) {
        // Set headers to download the file
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_path));
        
        // Read the file from the server and send it to the browser
        readfile($file_path);
        exit();
    } else {
        echo "File does not exist.";
        exit();
    }
} else {
    echo "No MP4 files found.";
    exit();
}

$conn->close();
?>
