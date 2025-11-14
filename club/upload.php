<?php
include 'include/db.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_FILES['file'])) {
        http_response_code(400);
        echo "No file uploaded.";
        exit;
    }

    $file = $_FILES['file'];
    $fileName = $file['name'] ?? '';
    $fileTmpName = $file['tmp_name'] ?? '';
    $fileSize = $file['size'] ?? 0;
    $fileError = $file['error'] ?? UPLOAD_ERR_NO_FILE;

    // Allow-list extensions and MIME types
    $allowedExt = ['pdf', 'mp4'];
    $allowedMime = ['application/pdf', 'video/mp4'];

    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if (!in_array($fileExt, $allowedExt, true)) {
        http_response_code(400);
        echo "You can only upload PDF or MP4 files.";
        exit;
    }

    if ($fileError !== UPLOAD_ERR_OK) {
        http_response_code(400);
        echo "There was an error uploading your file (code: {$fileError}).";
        exit;
    }

    if ($fileSize <= 0 || $fileSize > 50 * 1024 * 1024) { // 50MB limit
        http_response_code(400);
        echo "File is too large.";
        exit;
    }

    // Verify MIME type using finfo
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($fileTmpName);
    if ($mime === false || !in_array($mime, $allowedMime, true)) {
        http_response_code(400);
        echo "Invalid file type.";
        exit;
    }

    // Generate a new unique name
    $newFileName = bin2hex(random_bytes(8)) . "." . $fileExt;
    $destDir = __DIR__ . DIRECTORY_SEPARATOR . 'uploads';
    if (!is_dir($destDir)) {
        mkdir($destDir, 0755, true);
    }
    $fileDestination = $destDir . DIRECTORY_SEPARATOR . $newFileName;

    if (!move_uploaded_file($fileTmpName, $fileDestination)) {
        http_response_code(500);
        echo "Error moving the uploaded file.";
        exit;
    }

    // Store relative name to DB, use prepared statements
    $fileType = $fileExt;
    $uploadingDate = date("Y-m-d");
    $stmt = $conn->prepare("INSERT INTO upload_file (file_type, uploading_date, file_name) VALUES (?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param('sss', $fileType, $uploadingDate, $newFileName);
        if ($stmt->execute()) {
            echo "File uploaded successfully!";
        } else {
            http_response_code(500);
            echo "Failed to save upload metadata.";
        }
        $stmt->close();
    } else {
        http_response_code(500);
        echo "Failed to prepare database statement.";
    }

    $conn->close();
}
?>
