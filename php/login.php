<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $aadhr_numer = $_POST['aadhr_numer'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM membership WHERE aadhr_numer = '$aadhr_numer'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Start session and set session variables
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['aadhr_numer'] = $row['aadhr_numer'];
$_SESSION['user_name'] = $row['tname'];
            // Redirect to the desired page
            header("Location: https://twtamp.co.in/club");
            exit();
        } else {
            echo "Invalid Aadhaar number or password.";
        }
    } else {
        echo "No user found with this Aadhaar number.";
    }

    $conn->close();
}
?>

