<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['module_id']) && !empty($_POST['module_id'])) {
        $_SESSION['selected_module_id'] = $_POST['module_id'];
        echo "<script>window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Please select a module.'); window.location.href = 'select_module.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href = 'select_module.php';</script>";
}
?>
