<?php 
require_once __DIR__ . DIRECTORY_SEPARATOR . 'env.php';
load_env(dirname(__DIR__) . DIRECTORY_SEPARATOR . '.env');

$dbHost = getenv('DB_HOST') ?: 'localhost';
$dbUser = getenv('DB_USER') ?: 'root';
$dbPass = getenv('DB_PASS') ?: '';
$dbName = getenv('DB_NAME') ?: 'twta';

$link = mysqli_connect($dbHost, $dbUser, $dbPass);
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_select_db($link, $dbName);
mysqli_set_charset($link, 'utf8mb4');
?>