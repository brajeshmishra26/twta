<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $otp = $_POST['otp'];
    
    // Check if the entered OTP is valid
    $sql = "SELECT * FROM membership WHERE otp = '$otp'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // OTP is valid
         header("Location: ../login.html");
        // Optionally, you can update the user's status to "confirmed" in the database
    } else {
        // OTP is invalid
        echo "Invalid OTP. Please try again.";
    }

    $conn->close();
}
?>
