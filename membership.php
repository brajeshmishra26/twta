<?php session_start(); ?>
<?php
	include('include/header.php');
        ?>
<div class="inner-banner">
</div>
<!--membership -->
<?php 
  
		include('include/connect.php');	
		
		if(isset($_REQUEST["reg"])){
			
            
//            echo"<script type='text/javascript'>alert('Go Away');	</script>";
				
            
			mysqli_set_charset($link,'utf8');
			$name = $_REQUEST["rname"];
                        $email = $_REQUEST["remail"];
			$mobile = $_REQUEST["rmobile"];
                        $desig = $_REQUEST["rdesig"];
                        $uniquecode = $_REQUEST["runiquecode"];
                        $firstappointdate = date("Y-m-d");
                        $appointplace = $_REQUEST["rappointplace"];
                        $disecode = $_REQUEST["rdisecode"];
                        $vikaskhand = $_REQUEST["rvikaskhand"];
                        $dist = $_REQUEST["rdist"];
                        $paytype = $_REQUEST["rpaytype"];
                        
                        
                        
			
                        $sql = "select * from membership where temail = '$email' or  tmobile= '$mobile'";
                        $a = mysqli_query($link,$sql);
			if($aa = mysqli_fetch_array($a)){
                            $_SESSION['username'] = $aa["tname"];
				$_SESSION['wid'] = $aa["tmobile"];
                                $wid=$_SESSION['wid'];
                            echo"<script type='text/javascript'>alert(' $wid Member Already Existed');	</script>";
                            
//					echo "<center><label style='color:red'><b>Member Already Existed</b></label></center>";
                            ?>
			<script>window.location.href="pay.php?pay=<?php echo $mobile; ?>"; </script>

<?php
                        }else{
                                $aa = "insert into membership (tname, temail, tmobile, tdesig, tuniquecode, tfirstappointdate, tappointplace, tdisecode, tvikaskhand, tdist, tpaytype) values ('$name', '$email', '$mobile', '$desig', '$uniquecode', '$firstappointdate', '$appointplace', '$disecode', '$vikaskhand', '$dist', '$paytype')";
                               if(mysqli_query($link,$aa)){
                                   $_SESSION['username'] = $name;
				$_SESSION['wid'] = $mobile;
                                $wid=$_SESSION['wid'];
//						echo "<center><b>Registered Successfully</b></center>";
				echo"<script type='text/javascript'>alert('$wid Registered successfully');	</script>";
                                ?>  
<script>window.location.href="pay.php?pay=<?php echo $wid; ?>"; </script>
                               <?php                 
                               }
			}
				
		}elseif(isset($_REQUEST["login"])){
			
			$user = $_REQUEST["luser"];
			$pass = $_REQUEST["lpass"];			
			
			$sql = "select * from writer where email = '$user' and password='$pass' ";
			
                        $a = mysqli_query($link,$sql);
			if($aa = mysqli_fetch_array($a)){
				if($aa["flag"]==0){
				?>	<script>
				alert("Approval Pending");
				</script>
			<?php		
				}else{
				
				$_SESSION['username'] = $aa["name"];
				$_SESSION['wid'] = $aa["wid"];
				if($pass==$aa["contact"]){
					?>
					<script>window.location.href="change_pw.php"; </script>
		<?php
					//header('location:change_pw.php');
				
				}else{
					if($aa["cityid"]==0){
					
					
		?>
					<script>window.location.href="profile.php"; </script>
		<?php		
					}else{
						
						?>
						<script>window.location.href="index.php"; </script>
						<?php
					}
		echo "Invlaid Request";
				//header("location:index.php");
				}}
			}else{
				?>
				
				
				
				<script>
				alert("Invalid Username Or Password");
				</script>
				<?php
		}
		}	
  ?>
	

<!-- /contact-form -->
	<section class="w3l-contact-11">
		<div class="form-41-mian py-5">
			<div class="container py-lg-4">
			  <div class="row align-form-map">
<!--				<div class="col-lg-6 contact-left pr-lg-4">
					<div class="partners">
					  <div class="cont-details">
						<div class="title-content text-left">
							<h6 class="sub-title">Contact Us</h6>
							<h3 class="hny-title">Get In Touch</h3>
						</div>
						<p class="mt-3 mb-4 pr-lg-5">Hi there, We are available 24/7 by fax, e-mail or by phone. Drop us line so we can talk
						  futher about that.</p>
						<h6 class="mb-4"> For more info or inquiry about our products project, and pricing please feel free to get in touch with us.</h6>
					  </div>
					  <div class="hours">
						<h6 class="mt-4">Email:</h6>
						<p> <a href="mailto:info@example.com">
							info@example.com</a></p>
						<h6 class="mt-4">Address:</h6>
						<p> 436 New York St, Suite 300 Honey Street, CA 49436, USA</p>
						<h6 class="mt-4">Contact:</h6>
						<p class="margin-top"><a href="tel:+(21) 255 999 8899">+(21)
							255 999 8899</a></p>
					  </div>
					</div>
				  </div>-->
				<div class="col-lg-6 form-inner-cont">
					<div class="title-content text-left">
						<h3 class="hny-title mb-lg-5 mb-4">पंजीयन फॉर्म</h3>
					</div>
				  <form action="#" method="post" class="signin-form">
					<div class="form-input">
					  <input type="text" name="rname" placeholder="नाम" required="" oninvalid="this.setCustomValidity('Please Enter valid email')"
 oninput="setCustomValidity('')">
											<input type="email" name="remail" placeholder="ईमेल" required="">

                                                                                        <input type="text" name="rmobile" placeholder="मोबाइल नंबर" required="">
											<input type="text" name="rdesig" placeholder="पदनाम" required="">
                                                                                        <!--<input type="text" name="Subject" placeholder="जन्मतिथि" required="">-->
                                                                                        <input type="text" name="runiquecode" placeholder="यूनिक कोड" required="">
                                                                                        <input type="hidden" name="rfirstappointdate" placeholder="प्रथम नियुक्ति दिनांक" required="प्रथम नियुक्ति दिनांक">
											<input type="text" name="rappointplace" placeholder="पदस्थ संस्था" required="">
                                                                                        <input type="hidden" name="rdisecode" placeholder="डायस कोड " value="0">
                                                                                        <input type="text" name="rvikaskhand" placeholder="विकासखंड का नाम" required="">
                                                                                        <div class="row con-two">
					<div class="col-lg-6 form-input">
                                                                                        <select name="rdist" >
    <?php
    $st = mysqli_query($link,"select * from city where sid = 1 order by cid DESC");
    while ($stt = mysqli_fetch_array($st)) {
        ?>
                                                            <option  value="<?php echo $stt["city"]; ?>"><?php echo $stt["city"]; ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                        </div>
                                                                                            <div class="col-lg-6 form-input">
                                                                                        <!--<input type="text" name="rdist" placeholder="जिला का नाम" required="">-->
                                                                                        <select id="rpaytype" name="rpaytype" >
      <option value="0">सदस्यता का प्रकार </option>
      <option value="1">वार्षिक (120 रूपये) </option>
      <option value="2">आजीवन (500 रूपये)</option>
    </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!--<textarea name="Message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>-->
											<!--<input type="submit" value="Submit" name="reg">-->
											<!--<input type="reset" value="Clear">-->
											<div class="clearfix"> </div>
					</div>
<!--					
					  <input type="email" name="w3lSender" id="w3lSender" placeholder="Email" required="" />
					</div>
					
						<input type="text" name="w3lSubect" placeholder="Subject" class="contact-input" />
					</div>
					</div>
					<div class="form-input">
					  <textarea placeholder="Message" name="w3lMessage" id="w3lMessage" required=""></textarea>
					</div>-->
					<div class="submit-button text-lg-right">
					   <button type="submit" value="Submit" name="reg" class="btn btn-style">Submit</button>
				    </div>
				  </form>
				</div>
			  </div>
			</div>
		  </div>
<!--		  <div class="map">
			<iframe
			  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001161.424489281!2d-78.01909140705047!3d42.72866436845163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sin!4v1570786994395!5m2!1sen!2sin"
			  frameborder="0" allowfullscreen=""></iframe>
		  </div>-->
	  </section>
	<!-- //contact-form -->

<?php
	include('include/footer.php');
        ?>
