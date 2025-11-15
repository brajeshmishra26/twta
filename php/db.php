<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'include' . DIRECTORY_SEPARATOR . 'env.php';
load_env(dirname(__DIR__) . DIRECTORY_SEPARATOR . '.env');

$dbHost = env_value('DB_HOST', 'localhost');
$dbUser = env_value('DB_USER', 'root');
$dbPass = env_value('DB_PASS', '');
$dbName = env_value('DB_NAME', 'twta');

// Create connection
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset('utf8mb4');
?>
