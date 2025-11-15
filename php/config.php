<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'include' . DIRECTORY_SEPARATOR . 'env.php';
load_env(dirname(__DIR__) . DIRECTORY_SEPARATOR . '.env');

$dbHost = env_value('DB_HOST', 'localhost');
$dbUser = env_value('DB_USER', 'root');
$dbPass = env_value('DB_PASS', '');
$dbName = env_value('DB_NAME', 'twta');

$connection = @new mysqli($dbHost, $dbUser, $dbPass, $dbName);
if ($connection->connect_error) {
    die('Database connection failed: ' . $connection->connect_error);
}

$connection->set_charset('utf8mb4');