<?php
// Quick debug script to check image paths and database connections
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('include/connect.php');

echo "<h1>Image Path Debugging</h1>";

// Check if we can connect to the database
if (!$link) {
    echo "<p>Database connection failed: " . mysqli_connect_error() . "</p>";
    exit;
}
echo "<p>Database connection successful.</p>";

// Try to get images from the associate table
$query = mysqli_query($link, "SELECT * FROM associate LIMIT 5");
if (!$query) {
    echo "<p>Query failed: " . mysqli_error($link) . "</p>";
    exit;
}

$count = mysqli_num_rows($query);
echo "<p>Found $count associate records.</p>";

// Show the raw image data from the database
echo "<h2>Raw Image Data</h2>";
echo "<ul>";
while ($row = mysqli_fetch_assoc($query)) {
    $assname = isset($row['assname']) ? $row['assname'] : 'No Name';
    $image = isset($row['image']) ? $row['image'] : 'No Image';
    $assdesig = isset($row['assdesig']) ? $row['assdesig'] : 'No Designation';
    
    echo "<li>
        <strong>Name:</strong> $assname<br>
        <strong>Image:</strong> $image<br>
        <strong>Designation:</strong> $assdesig<br>
    </li>";
}
echo "</ul>";

// Check if the image directory exists
$image_dir = __DIR__ . '/admin/topicimg';
echo "<h2>Image Directory</h2>";
echo "<p>Checking if directory exists: $image_dir</p>";
if (is_dir($image_dir)) {
    echo "<p>Directory exists. Contents:</p>";
    $files = scandir($image_dir);
    echo "<ul>";
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            echo "<li>$file</li>";
        }
    }
    echo "</ul>";
} else {
    echo "<p>Directory does not exist!</p>";
}

// Test image URLs
echo "<h2>Testing Image URLs</h2>";
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'];

// Define the root URL of your site
$ROOT_URL = $protocol . $host;

// Handle both localhost and live server paths
if (strpos($host, 'localhost') !== false) {
    // For localhost, we need to include the project folder in the path
    $ROOT_URL .= '/twta';
}

echo "<p>Root URL: $ROOT_URL</p>";

// Reset the query
mysqli_data_seek($query, 0);
echo "<h2>Image Preview</h2>";
while ($row = mysqli_fetch_assoc($query)) {
    $assname = isset($row['assname']) ? $row['assname'] : 'No Name';
    $image = isset($row['image']) ? $row['image'] : '';
    
    if ($image) {
        $image_url = $ROOT_URL . "/admin/topicimg/" . $image;
        echo "<div style='margin-bottom: 20px;'>
            <p><strong>$assname</strong></p>
            <p>Image URL: $image_url</p>
            <img src='$image_url' style='max-width: 200px; border: 1px solid #ccc;' alt='$assname'>
        </div>";
    }
}
?>