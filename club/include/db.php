<?php
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "myvita";

$servername = "142.93.65.58";
$username = "kgrufzsskd";
$password = "5cdQmg5SCt";
$dbname = "kgrufzsskd";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//$link = mysqli_connect("142.93.65.58", "kgrufzsskd", "5cdQmg5SCt");
//if (!$link) {
//    die("Connection failed: " . mysqli_connect_error());
//}
//
//mysqli_select_db($link, "kgrufzsskd");
//mysqli_set_charset($link, 'utf8mb4'); // Support for Hindi/Unicode characters

?>
