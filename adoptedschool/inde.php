
<!DOCTYPE html>
<?php
//include('include/header.php');
include('../include/connect.php');
session_start();
$cmid=$_SESSION['mobile'];
?>
<?php
mysqli_set_charset('utf8');

if(isset($_REQUEST["submit"])){
$school = $_REQUEST["school"];
$work = $_REQUEST["work"];
$sqlup = "update membership set adoptedschool = '$school',  workprofile = '$work', adopt = 1 where tmobile=$cmid";
			if($aup = mysqli_query($sqlup))
                        {
			 
                            
                            ?>	
<script>alert("Information Updated...");</script>
<script>window.location.href="../admin/adoptedschoollist.php"; </script>
								<?php
							}
							
						}
					
					?>


<html>
<head>
<title>Adopted School Detail Entry Form:: TWTAMP</title>
<!-- metatags-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="modern appointment form a Flat Responsive Widget,Login form widgets, Sign up Web 	forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="css/jquery-ui.css"/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/><!--stylesheet-css-->
<link href="//fonts.googleapis.com/css?family=Poppins" rel="stylesheet"><!--online-fonts-->
<link href="//fonts.googleapis.com/css?family=Raleway" rel="stylesheet"><!--online-fonts-->
<!-- //css files -->
</head>
<body>
	<h1>Ad<span class="title">o</span>pted <span class="title">s</span>chool E<span class="title">n</span>try</h1>
<div class="w3l-main">
	<div class="w3l-from">
		<form action="#" method="post">	
                    <?php 
                    $sql = "select * from membership where tmobile=$cmid";
			$a = mysqli_query($sql);
			if($aa = mysqli_fetch_array($a)){
				
			$name= $aa["tname"];
                        }
                                ?>
                   
			<div class="w3l-user">
				<label class="head">नाम <span class="w3l-star"> * </span></label>
                                <input  type="text" name="Username" value="<?php echo $aa["tname"];?>" placeholder="patient name" readonly="readonly">
			</div>
			<div class="w3l-mail">
				<label class="head">ईमेल <span class="w3l-star"> * </span></label>
				<input type="email" name="name" placeholder="enter your e-mail" value="<?php echo $aa["temail"];?>" readonly="readonly">
			</div>
			<div class="clear"></div>
			<div class="w3l-details1">
				<div class="w3l-num">
					<label class="head">पद <span class="w3l-star"> * </span></label>
					<input type="text"  name="phone number" placeholder="Phone Number" value="<?php echo $aa["tdesig"];?>" readonly="readonly" >
				</div>
                            <div class="w3l-sym">
					<label class="head">पदस्थ संस्था <span class="w3l-star"> * </span></label>
					<input type="text" name="details" value="<?php echo $aa["tappointplace"];?>" readonly="readonly" >
			</div>

                            
			<div class="clear"></div>
		
			<div class="w3l-num">
					<label class="head">ब्लाक <span class="w3l-star"> * </span></label>
					<input type="text"  name="phone number" placeholder="Phone Number" value="<?php echo $aa["tvikaskhand"];?>" readonly="readonly" >
				</div>
                            
			<div class="w3l-sym">
					<label class="head">जिला <span class="w3l-star"> * </span></label>
					<input type="text" name="details" value="<?php echo $aa["tdist"];?>" readonly="readonly" >
			</div>
			</div>
                        <div class="clear"></div>
			<div class="w3l-user">
				<label class="head">गोद ली गई शाला का नाम <span class="w3l-star"> * </span></label>
                                <input  type="text" name="school" placeholder="गोद ली गई शाला का नाम" required="" value="<?php echo $aa["adoptedschool"];?>">
			</div>
                        <div class="w3l-rem">
				<div class="w3l-right">
					<label class="w3l-set2">कार्य विवरण <span class="w3l-star"> * </span></label>
                                        <textarea name="work" placeholder="कार्य विवरण" required="" value="<?php echo $aa["workprofile"];?>"></textarea>
				</div>
                            
				<div class="btn">
					<input type="submit" name="submit" value="Submit"/>
				</div>
			</div>
			<div class="clear"></div>
		</form>
	</div>
</div>
	<footer>&copy; 2020 TWTA
	</footer>
	<!-- Default-JavaScript --> <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

<!-- Calendar -->
<script src="js/jquery-ui.js"></script>
	<script>
		$(function() {
		$( "#datepicker,#datepicker1" ).datepicker();
		});
	</script>
<!-- //Calendar -->

</body>
</html>