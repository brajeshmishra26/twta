<?php
include('include/header.php');
include('include/connect.php');
?>
<!--/what-->
	<div class="works" id="services">
		<div class="container">
			<h3 class="tittle_w3_agileinfo cen">Photo Gallery</h3>
			<div class="inner_sec_info_w3layouts">
				<div class="ser-first">
				<?php
    // Ensure connection uses UTF-8 and run the query using the $link handle
    if (isset($link) && $link) {
        mysqli_set_charset($link, 'utf8');
    }
    $i = 0;
    $b = mysqli_query($link, "SELECT * from uparticle where cid=1");
    if ($b) while ($bb = mysqli_fetch_array($b)) {

        // Normalize and resolve image path
        $img = isset($bb['image']) ? trim($bb['image']) : '';
        $img = str_replace('\\\\', '/', ltrim($img, './\\\\'));
        $image_url = resource_url([
            'admin/fbimg/' . $img,
            'admin/topicimg/' . $img,
            'fbimg/' . $img,
            'topicimg/' . $img,
        ], 'images/no-image.jpg');

        $headlineEsc = htmlspecialchars(isset($bb['headline']) ? $bb['headline'] : '', ENT_QUOTES, 'UTF-8');
        ?>

    
                    	
	
                                    <div class="col-md-3 ser-first-grid text-center">
                                        <span aria-hidden="true">
                                            <a class="image-zoom" href="<?php echo $image_url; ?>">
                                                <img src="<?php echo $image_url; ?>" height="220" width="200" alt="<?php echo $headlineEsc; ?>" onerror="this.src='<?php echo site_url('images/no-image.jpg'); ?>'; this.onerror=null;">
                                            </a>
                                        </span>
                                        <p><?php echo $headlineEsc; ?></p>
					</div>
					
					<?php } ?>
					
					
                                </div>
                                    
                        </div>
                        
                </div>
            <div class="clearfix"></div>
        </div>
<?php
include('include/footer.php');
?>