<?php
session_start();
include 'php/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $aadhr_numer = $_SESSION['aadhr_numer'];
    $new_password = $_POST['new_password'];
// Hash the new password
    $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
    $sql = "UPDATE users SET password = '$hashed_password' WHERE aadhr_numer = '$aadhr_numer'";

    if ($conn->query($sql) === TRUE) {
        session_destroy();
        echo "<script>alert('Password changed successfully.'); window.location.href = 'https://myvita.in/myvita3/login.html';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Change Password</h2>
        <form action="change_password.php" method="post">
            <input type="text" name="aadhr_numer" value="<?php echo $_SESSION['aadhr_numer']; ?>" hidden>
            <input type="password" name="new_password" placeholder="New Password" required>
            <input type="submit" value="Change Password">
        </form>
    </div>
</body>
</html>
