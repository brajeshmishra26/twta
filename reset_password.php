<?php
include 'php/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $aadhr_numer = $_POST['aadhr_numer'];

    $sql = "SELECT * FROM users WHERE aadhr_numer = '$aadhr_numer'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $email = $row['email'];
        $otp = rand(100000, 999999);

        // Save OTP to session
        session_start();
        $_SESSION['otp'] = $otp;
        $_SESSION['aadhr_numer'] = $aadhr_numer;

        // Send OTP via email
        $to = $email;
        $subject = 'OTP for Password Reset';
        $message = "Your OTP for password reset is: $otp";
        $headers = 'From: myVita <noreply@myvita.in>' . "\r\n" .
                   'Reply-To: noreply@myvita.in' . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();

        if (mail($to, $subject, $message, $headers)) {
            header("Location: otp_confirmation.php");
        } else {
            echo "<script>alert('Failed to send OTP.'); window.location.href = 'login.html';</script>";
        }
    } else {
        echo "<script>alert('No user found with this Aadhaar number.'); window.location.href = 'login.html';</script>";
    }

    $conn->close();
}
?>
