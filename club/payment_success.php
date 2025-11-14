<?php
session_start();
include('include/connect.php'); // Include your database connection file

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "User not logged in.";
    exit();
}

// Get user_id from session
$id = $_SESSION['user_id'];

// SQL query to update the flag field to 1
$sql = "UPDATE membership SET flag = 1 WHERE id = $id";

// Assuming you have a connection to the database already established
if (mysqli_query($link, $sql)) {
    echo "<script>
            alert('Flag updated successfully.');
            window.location.href = 'index.php';
          </script>";
} else {
    echo "Error updating flag: " . mysqli_error($link);
}
?>
