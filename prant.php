<?php
// Include configuration first for path handling
include('include/config.php');
include('include/header.php');
include('include/connect.php');
$pagename = "Prant";
// Now we can use $config and helper functions for path handling
?>
<!--/gallery-->
	<div class="banner_bottom proj" id="gallery">
		<div class="wrap_view">
			<h3 class="tittle_w3_agileinfo">Associates</h3>
			<div class="inner_sec_info_w3layouts">
				<ul class="portfolio-area">

							
															<?php
				include('include/connect.php');
				$cid = isset($_GET['catid']) ? (int)$_GET['catid'] : 0;
				if ($cid > 0) {
					$sql = "select * from associate where catid=$cid";
					$query = mysqli_query($link, $sql);
				} else {
					$query = false;
				}
				if ($query) while($a = mysqli_fetch_assoc($query)){
					$assname    = isset($a['assname']) ? $a['assname'] : '';
					$assdesig   = isset($a['assdesig']) ? $a['assdesig'] : '';
					$mobile     = isset($a['mobile']) ? $a['mobile'] : '';
					$image      = isset($a['image']) ? trim($a['image']) : '';
					// Normalize stored filename
					$image = str_replace('\\', '/', ltrim($image, './\\'));
					// Try common upload locations
					$image_url = resource_url([
						'admin/topicimg/' . $image,
						'admin/fbimg/' . $image,
						'topicimg/' . $image,
					], 'images/no-image.jpg');
					
					// Debug to help troubleshoot (remove after fixing)
					//echo "<!-- Image path: " . $image_url . " -->";
					
					$assnameEsc = htmlspecialchars($assname, ENT_QUOTES, 'UTF-8');
					$assdesigEsc = htmlspecialchars($assdesig, ENT_QUOTES, 'UTF-8');
					$mobileEsc = htmlspecialchars($mobile, ENT_QUOTES, 'UTF-8');
				?>
					<li class="portfolio-item2" data-id="id-0" data-type="cat-item-1">
						<div>
					
                                    <span class="image-block img-hover">
										<a class="image-zoom" href="<?php echo $image_url; ?>" >
																<img src="<?php echo $image_url; ?>" class="img-responsive" height="200" width="180" alt="<?php echo $assnameEsc; ?>" onerror="this.src='<?php echo site_url('images/no-image.jpg'); ?>'; this.onerror=null;">
												<h5><?php echo $assnameEsc; ?></h5>
												<p><?php echo $mobileEsc; ?> </p>
						<p><?php echo $assdesigEsc; ?> </p>							</a>
							</span>
						</div>
					</li>
<?php } else { ?>
					<li class="portfolio-item2">
						<div><p>No associates found.</p></div>
					</li>
<?php } ?>

					

<!--pranteey-->					<div class="clearfix"> </div>
				</ul>
				<!--end portfolio-area -->
			</div>
		</div>
	</div>


	<!--//gallery-->
	
<?php
include('include/footer.php');
?>