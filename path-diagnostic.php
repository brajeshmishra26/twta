<?php
// Include configuration
include('include/config.php');
include('include/header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Path Configuration Diagnostic</h2>
            <p>This page helps diagnose path issues in both localhost and server environments.</p>
            
            <h3>Current Environment</h3>
            <table class="table table-bordered">
                <tr>
                    <th>Server Name</th>
                    <td><?php echo $_SERVER['SERVER_NAME']; ?></td>
                </tr>
                <tr>
                    <th>HTTP Host</th>
                    <td><?php echo $_SERVER['HTTP_HOST']; ?></td>
                </tr>
                <tr>
                    <th>Request URI</th>
                    <td><?php echo $_SERVER['REQUEST_URI']; ?></td>
                </tr>
                <tr>
                    <th>Document Root</th>
                    <td><?php echo $_SERVER['DOCUMENT_ROOT']; ?></td>
                </tr>
                <tr>
                    <th>Script Name</th>
                    <td><?php echo $_SERVER['SCRIPT_NAME']; ?></td>
                </tr>
                <tr>
                    <th>PHP_SELF</th>
                    <td><?php echo $_SERVER['PHP_SELF']; ?></td>
                </tr>
                <tr>
                    <th>Is Localhost?</th>
                    <td><?php echo $is_localhost ? 'Yes' : 'No'; ?></td>
                </tr>
            </table>
            
            <h3>Path Configuration</h3>
            <table class="table table-bordered">
                <?php foreach($config as $key => $value): ?>
                <tr>
                    <th><?php echo $key; ?></th>
                    <td><?php echo $value; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
            
            <h3>Test Image URLs</h3>
            <p>Testing image path resolution:</p>
            
            <?php
            // Test some image paths
            $test_images = array(
                'admin/topicimg/test.jpg',
                'images/no-image.jpg',
                'images/banner1.jpg'
            );
            ?>
            
            <table class="table table-bordered">
                <tr>
                    <th>Original Path</th>
                    <th>Resolved URL</th>
                    <th>File Exists?</th>
                    <th>Preview</th>
                </tr>
                <?php foreach($test_images as $img): ?>
                <tr>
                    <td><?php echo $img; ?></td>
                    <td><?php echo site_url($img); ?></td>
                    <td><?php echo file_exists($_SERVER['DOCUMENT_ROOT'] . '/' . ltrim(parse_url($config['base_path'] . $img, PHP_URL_PATH), '/')) ? 'Yes' : 'No'; ?></td>
                    <td><img src="<?php echo site_url($img); ?>" style="max-height: 50px;" /></td>
                </tr>
                <?php endforeach; ?>
            </table>
            
            <h3>Database Images Test</h3>
            <p>Testing actual image paths from database:</p>
            
            <?php
            // Query some images from the database
            $query = "SELECT id, assname, image, mobile, assdesig FROM associate WHERE stcode='MP' LIMIT 5";
            $result = mysqli_query($con, $query);
            ?>
            
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image Path</th>
                    <th>Resolved URL</th>
                    <th>Preview</th>
                </tr>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                <?php 
                    $image = $row['image'];
                    $image_path = "admin/topicimg/" . $image;
                    $image_url = image_url($image_path);
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['assname']; ?></td>
                    <td><?php echo $image_path; ?></td>
                    <td><?php echo $image_url; ?></td>
                    <td><img src="<?php echo $image_url; ?>" style="max-height: 50px;" onerror="this.src='<?php echo site_url('images/no-image.jpg'); ?>'; this.onerror=null;" /></td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
</div>

<?php
include('include/footer.php');
?>