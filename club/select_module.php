<?php
session_start();
include 'include/db.php'; // Include your database connection file

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('User not logged in.'); window.location.href = 'login.php';</script>";
    exit();
}

// Get user_id from session
$user_id = $_SESSION['user_id'];

// Fetch modules subscribed by the user
$sql = "SELECT ps.module_id, m.module_name FROM paid_subscription ps 
        JOIN module m ON ps.module_id = m.module_id 
        WHERE ps.user_id = '$user_id'";
$result = $conn->query($sql);

$modules = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $modules[] = $row;
    }
} else {
    echo "<script>alert('You have not subscribed to any module.'); window.location.href = 'index.php';</script>";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Module</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    width: 100%;
    max-width: 600px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

h2 {
    text-align: center;
    color: #333;
}

form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

label {
    font-weight: bold;
    margin-bottom: 10px;
}

select, input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    background-color: #28a745;
    color: white;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #218838;
}

    </style>
</head>
<body>
    <div class="container">
        <h2>Select Module</h2>
        <form id="module-form" action="process_module_selection.php" method="post">
            <label for="module">Select a Module:</label>
            <select name="module_id" id="module" required>
                <option value="">Select a Module</option>
                <?php foreach ($modules as $module): ?>
                    <option value="<?php echo $module['module_id']; ?>"><?php echo $module['module_name']; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
