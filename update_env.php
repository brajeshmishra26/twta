<?php
echo '<h2>Environment Update Helper</h2>';

if ($_POST && isset($_POST['db_pass'])) {
    $envFile = __DIR__ . '/.env';
    $envContent = file_get_contents($envFile);
    
    $newContent = str_replace(
        'DB_PASS=tWtA_[generated_password]!2024',
        'DB_PASS=' . $_POST['db_pass'],
        $envContent
    );
    
    if (file_put_contents($envFile, $newContent)) {
        echo '<p style="color: green;">✓ .env file updated successfully!</p>';
        
        // Test the connection
        require __DIR__ . '/include/env.php';
        load_env($envFile);
        
        $host = getenv('DB_HOST');
        $username = getenv('DB_USER');
        $password = getenv('DB_PASS');
        $database = getenv('DB_NAME');
        
        $testCon = mysqli_connect($host, $username, $password, $database);
        if ($testCon) {
            echo '<p style="color: green;">✓ Database connection test successful!</p>';
            echo '<p><strong>Credential rotation complete!</strong></p>';
            mysqli_close($testCon);
            
            // Clean up setup files
            if (file_exists('setup_user.php')) unlink('setup_user.php');
            if (file_exists('setup_db_user.sql')) unlink('setup_db_user.sql');
            
            echo '<p>Setup files cleaned up. <a href="index.php">Go to main site</a></p>';
            
        } else {
            echo '<p style="color: red;">✗ Connection failed: ' . mysqli_connect_error() . '</p>';
        }
        
        // Self-destruct
        echo '<script>setTimeout(function() { 
            fetch("' . $_SERVER['REQUEST_URI'] . '?cleanup=1");
        }, 5000);</script>';
        
    } else {
        echo '<p style="color: red;">Failed to update .env file</p>';
    }
} else {
    echo '<form method="post">';
    echo '<p>Paste the generated password from the setup page:</p>';
    echo '<input type="text" name="db_pass" placeholder="tWtA_xxxxxxxx!2024" style="width: 300px; padding: 8px;" required>';
    echo '<br><br>';
    echo '<input type="submit" value="Update .env File" style="padding: 10px 20px;">';
    echo '</form>';
}

if (isset($_GET['cleanup'])) {
    unlink(__FILE__);
    exit('Update helper removed');
}
?>