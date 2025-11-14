<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $aadhr_numer = $_POST['aadhr_numer'];
    $otp = $_POST['otp'];

    if ($otp == $_SESSION['otp'] && $aadhr_numer == $_SESSION['aadhr_numer']) {
        echo "<script>window.location.href = 'https://myvita.in/myvita3/change_password.html';</script>";
    } else {
        echo "<script>alert('Invalid OTP. Please try again.'); window.location.href = 'https://myvita.in/myvita3/otp_confirmation.html';</script>";
    }
}
?>
