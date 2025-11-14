<?php
include 'db.php';

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

        // Prepare email
        $subject = 'OTP for Password Reset';
        $message = "Your OTP for password reset is: $otp";
        $headers = 'From: your_email@example.com' . "\r\n" .
                   'Reply-To: your_email@example.com' . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();

        // Send email
        if (mail($email, $subject, $message, $headers)) {
            echo "<script>alert('OTP sent to your email.'); window.location.href = 'https://myvita.in/myvita3/php/otp_confirmation.html';</script>";
        } else {
            echo "<script>alert('Failed to send OTP.'); window.location.href = 'https://myvita.in/myvita3/login.html';</script>";
        }
    } else {
        echo "<script>alert('No user found with this Aadhaar number.'); window.location.href = 'https://myvita.in/myvita3/login.html';</script>";
    }

    $conn->close();
}
?>
