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

// Fetch the last PDF file from the upload_file table
$sql = "SELECT file_name FROM upload_file WHERE file_type = 'pdf' ORDER BY upload_file_id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $file = $result->fetch_assoc();
    $file_path = 'uploads/' . $file['file_name'];
} else {
    echo "No PDF files found.";
    exit();
}

// Email details
$from_email = 'no-reply@myvita.in';
$subject = 'Your Magical Email Attachment';
$message = 'Please find the attached Magical Email PDF file.\n This one has capability of changing your life, use it wisely.';
$headers = "From: $from_email";

// Boundary for email
$boundary = md5(time());

// Headers for attachment
$headers .= "\r\nMIME-Version: 1.0\r\n" .
            "Content-Type: multipart/mixed; boundary=\"{$boundary}\"";

// Message content
$body = "--{$boundary}\r\n" .
        "Content-Type: text/plain; charset=ISO-8859-1\r\n" .
        "Content-Transfer-Encoding: 7bit\r\n" .
        "\r\n" .
        $message . "\r\n";

// Attachment content
if (file_exists($file_path)) {
    $file_content = chunk_split(base64_encode(file_get_contents($file_path)));
    $body .= "--{$boundary}\r\n" .
             "Content-Type: application/pdf; name=\"" . basename($file_path) . "\"\r\n" .
             "Content-Disposition: attachment; filename=\"" . basename($file_path) . "\"\r\n" .
             "Content-Transfer-Encoding: base64\r\n" .
             "\r\n" .
             $file_content . "\r\n";
}

// Final boundary
$body .= "--{$boundary}--";

// Send email
if (mail($to_email, $subject, $body, $headers)) {
    echo "Email sent successfully.";
} else {
    echo "Failed to send email.";
}

$conn->close();
?>
