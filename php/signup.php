<?php
include 'db.php';
include 'connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    mysqli_set_charset($link,'utf8');
    $user_name = $_POST['user_name'];
    $mobile = $_POST['mobile'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $aadhr_numer = $_POST['aadhr_numer'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $desig=$_POST['desig'];
$uniquecode=$_POST['uniquecode'];
$firstappointdate= date("Y-m-d");
$appointplace = $_REQUEST["appointplace"];
                        $disecode = $_REQUEST["disecode"];
                        $vikaskhand = $_REQUEST["vikaskhand"];
                       
                        

    // Generate a random six-digit OTP
    $otp = rand(100000, 999999);

    // Handle file upload safely
    $target_dir = __DIR__ . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR;
    if (!is_dir($target_dir)) { @mkdir($target_dir, 0755, true); }

    $photoPathForDb = null;
    $maxSize = 10 * 1024 * 1024; // 10MB
    $allowedExt = ['jpg','jpeg','png','gif','webp'];
    $allowedMime = ['image/jpeg','image/png','image/gif','image/webp'];

    // Check if user with the provided Aadhaar number already exists
    $check_stmt = $conn->prepare("SELECT 1 FROM membership WHERE aadhr_numer = ? LIMIT 1");
    $check_stmt->bind_param('s', $aadhr_numer);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        echo "User with this Aadhaar number already exists.";
        header("Refresh: 3; url=https://twtamp.co.in");
    } else {
        // Validate and move the uploaded file
        if (isset($_FILES['photo']) && is_uploaded_file($_FILES['photo']['tmp_name'])) {
            $tmp = $_FILES['photo']['tmp_name'];
            $orig = $_FILES['photo']['name'];
            $size = (int)$_FILES['photo']['size'];
            $ext = strtolower(pathinfo($orig, PATHINFO_EXTENSION));
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $mime = $finfo->file($tmp);
            if ($size > 0 && $size <= $maxSize && in_array($ext, $allowedExt, true) && in_array($mime, $allowedMime, true)) {
                $safeName = bin2hex(random_bytes(8)) . '.' . $ext;
                $dest = $target_dir . $safeName;
                if (move_uploaded_file($tmp, $dest)) {
                    // store relative path for the app (php/uploads/<file>)
                    $photoPathForDb = 'php/uploads/' . $safeName;
                } else {
                    echo "Error uploading photo.";
                    exit();
                }
            } else {
                echo "Invalid photo (type or size).";
                exit();
            }
        }

        if ($photoPathForDb !== null) {
            $sql = "INSERT INTO membership (tname, tmobile, password, aadhr_numer, temail, tdist, state, country, tdesig, tuniquecode, tfirstappointdate, tappointplace, tdisecode, tvikaskhand, tphoto, otp) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param(
                'ssssssssssssssss',
                $user_name, $mobile, $password, $aadhr_numer, $email, $city, $state, $country, $desig, $uniquecode, $firstappointdate, $appointplace, $disecode, $vikaskhand, $photoPathForDb, $otp
            );
            if ($stmt->execute()) {
                // Send confirmation email
                $to = $email;
                $subject = "Signup Confirmation and OTP";
                $message = "Hello $user_name,\n\nThank you for signing up.\n\nHere are your details:\n\n".
                            "Name: $user_name\nMobile: $mobile\nAadhaar Number: $aadhr_numer\nEmail: $email\n".
                            "Address: $address\nCity: $city\nState: $state\nCountry: $country\n\n".
                        "Your Referral ID is: $aadhr_numer\nUse this to invite your friends to subscribe.\n\n".
                            "Your OTP is: $otp\n\nPlease confirm your OTP to complete the registration process.\n\n".
                            "Best Regards,\nmyVita";
                $headers = "From: no-reply@twtamp.co.in";
                mail('upadhyay.org@gmail.com', $subject, $message, $headers);
                if (mail($to, $subject, $message, $headers)) {
                    // Redirect to OTP confirmation page
                    header("Location: ../otp_confirmation.html");
                    exit();
                } else {
                    echo "Error sending email.";
                }
            } else {
                echo "Error creating account.";
            }
        } else {
            echo "Photo is required.";
        }
    }
    if (isset($check_stmt)) { $check_stmt->close(); }
    $conn->close();
}
?>



