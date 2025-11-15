<?php 
require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'include' . DIRECTORY_SEPARATOR . 'env.php';
load_env(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . '.env');

$dbHost = env_value('DB_HOST', 'localhost');
$dbUser = env_value('DB_USER', 'root');
$dbPass = env_value('DB_PASS', '');
$dbName = env_value('DB_NAME', 'twta');

$link = mysqli_connect($dbHost, $dbUser, $dbPass);
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_select_db($link, $dbName);
mysqli_set_charset($link, 'utf8mb4');
?>