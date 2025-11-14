<?php
session_start();
include 'php/db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $aadhr_numer = $_POST['aadhr_numer'];
    $otp = $_POST['otp'];

    if ($_SESSION['otp'] == $otp && $_SESSION['aadhr_numer'] == $aadhr_numer) {
        header("Location: change_password.php");
    } else {
        echo "<script>alert('Invalid OTP. Please try again.'); window.location.href = 'otp_confirmation.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Confirmation</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>OTP Confirmation</h2>
        <form action="otp_confirmation.php" method="post">
            <input type="text" name="aadhr_numer" value="<?php echo $_SESSION['aadhr_numer']; ?>" hidden>
            <input type="text" name="otp" placeholder="Enter OTP" required>
            <input type="submit" value="Confirm OTP">
        </form>
    </div>
</body>
</html>
