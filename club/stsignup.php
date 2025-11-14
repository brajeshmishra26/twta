<?php session_start(); 
if (isset($_SESSION["wid"])) {

    $id = $_SESSION["wid"];
    echo $id;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>myVita :: Login</title>
<!--otp modal-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
</script>
<!--//otp modal-->
    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head> 

		<?php 
  
		include('include/connect.php');	
		
		if(isset($_REQUEST["reg"])){
			
            $name = $_REQUEST["name"];
			$email = $_REQUEST["remail"];
			$pass = $_REQUEST["rpass"];
			$mobile = $_REQUEST["rmobile"];
			
                        $otp = rand(100000, 999999);
                        
              

//end of new ID code
			$sql = "select * from students where mobile = '$mobile'";
                        $a = mysqli_query($link,$sql);
			if($aa = mysqli_fetch_array($a)){
					echo "<script type='text/javascript'>alert(\"User Already Existed... \");window.location.href = 'login.php';</script>";
			}else{
                     $sqlaf = "select * from affiliate where affiliate_ID = '$id'";
                        $af = mysqli_query($link,$sqlaf);
                        if($afr = mysqli_fetch_array($af)){
                            $refpaymentID=$afr['paymentID'];
                        }
                                $date = date("Y-m-d");
                                $aa = "insert into students ( name, email, mobile, password, jdate, otp, refid, refpaymentID) values ( '$name', '$email', '$mobile', '$pass','$date','$otp', '$id', '$refpaymentID')";
                               
                               if(mysqli_query($link,$aa))
                               
                               {
				echo "<script type='text/javascript'>alert(\"Registered Successfully... \");</script>";		

                                  //Sending OTP

                                

// Replace with your username
$user = "myVita";

// Replace with your API KEY (We have sent API KEY on activation email, also available on panel)
$apikey = "LYyvE6OyWKfGLRx7DRbm"; 

// Replace if you have your own Sender ID, else donot change
$senderid  =  "myVita"; 

// Replace with the destination mobile Number to which you want to send sms
$mobile  =  $mobile; 

// Replace with your Message content
$message   =  "OTP for myVita is " .$otp. " valid for 15 minutes.

Regards,
myVita Team"; 
$message = urlencode($message);

$tid = "1207161699637078124";
// For Plain Text, use "txt" ; for Unicode symbols or regional Languages like hindi/tamil/kannada use "uni"
$type   =  "txt";

$ch = curl_init("http://smshorizon.co.in/api/sendsms.php?user=".$user."&apikey=".$apikey."&mobile=".$mobile."&senderid=".$senderid."&message=".$message."&type=".$type."&tid=".$tid.""); 
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);      
    curl_close($ch); 

// Display MSGID of the successful sms push
echo $output;




                                
                               

//End of Sendinf OTP

                                   ?>
<!--//sending email-->
      <?php
         $to = $email;
         $subject = "myVita Verification";
         
         $message = "<b>Your Verification code is . </b>";
         $message .= $otp;
         
         $header = "From:care@myvita.in \r\n";
         
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
      ?>
      <!--//end of email sending-->

                                  
                                  
                                   ?>
  
 <!--<script>window.location.href="otp?mobile=<?php echo $mobile; ?>"; </script>-->
  <script>window.location.href="stsignup.php"; </script>
<?php
 //echo "<script type='text/javascript'>alert(\"Registered Successfully...Your ID is :  \");window.location.href='../profile.php';</script>";
						
				}
			}
				
		}elseif(isset($_REQUEST["login"])){
			
			$user = $_REQUEST["luser"];
			$pass = $_REQUEST["lpass"];			
			
			$sql = "select * from students where mobile = '$user' and password='$pass' ";
			
                        $a = mysqli_query($link,$sql);
			if($aa = mysqli_fetch_array($a)){
				if($aa["flag"]==0){
				$_SESSION['username'] = $aa["name"];
				$_SESSION['wid'] = $aa["sid"];
                                $_SESSION['contact'] = $aa["mobile"];
                                $dbfotp=$aa["otp"];
                                $mobil=$aa["mobile"];
                                //Sending OTP
                                $username ='8088728306';
$message = 'Your Mobile Verification Code is'.$dbfotp; 
$sendername = 'myVita'; 
$smstype = 'TRANS'; 
$numbers = $mobil; 
$apikey = 'e1469174-431f-4c0c-9232-3b9c79e5d65d';
$url="http://login.aquasms.com/sendSMS?username=$username&message=".urlencode($message)."&sendername=$sendername&smstype=$smstype&numbers=$numbers&apikey=$apikey";
$ret = file_get_contents($url); 
 echo $ret;
//End of Sendinf OTP
				//echo "<script type='text/javascript'>alert(\"Approval Pending... \");window.location.href = '../paynow.php';</script>";
				?>
  <script>window.location.href="otp/stotp.php"; </script>
<?php					
				}else{
				
				$_SESSION['username'] = $aa["name"];
				$_SESSION['wid'] = $aa["students_ID"];
                                $_SESSION['contact'] = $aa["contact"];
				
                                
  if($aa["cityid"]==0){
					?>
					<script>window.location.href="https://student.myvita.in/"; </script>
                                <?php
					//header('location:change_pw.php');
				
				}else{
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
						$_SESSION['username'] = $aa["name"];
				$_SESSION['wid'] = $aa["students_ID"];
                                $_SESSION['contact'] = $aa["contact"];
						?>
						<script>window.location.href="index.php"; </script>
						<?php
					}
		echo "Invlaid Request";
				//header("location:index.php");
				}}
                        }}
			else{
				?>
				
				
				
				<script>
				alert("Invalid Username Or Password");
				</script>
				<?php
		}}
			
  ?>
		
  
  
  
  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post">
              <h1>Student Login Form</h1>
              <div>
                <input type="text" name="luser" class="form-control" placeholder="Student Mobile Number" required="" />
              </div>
              <br>
              <div>
                <input type="password" name="lpass" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <input type="submit" value="Log in" name="login" class="btn btn-default submit" />
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div>
                    <!--<marquee>सहायता के लिये अपने रजिस�?टर�?ड मोबाइल नंबर से 9424569259 पर whatsapp कीजिये </marquee>-->
                </div>
                <div class="clearfix"></div>
                <br />

                <div>
                   <a href="../index.php"><h1><i class="fa fa-pencil"></i> myVita</h1></a>
                  <p>©2020 All Rights Reserved. Designed & Developed by myVita</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form method="post">
              <h1>Create Student Account</h1>
              <div>
                <input type="text" name="name" class="form-control" placeholder="Student Name" required="" />
              </div>
              <div>
                <input type="text" name="rmobile" class="form-control" placeholder="Mobile No." required="" />
              </div>
              <div>
                <input type="email" name="remail" class="form-control" placeholder="Email"  />
              </div>
              <div>
                <input type="password" name="rpass" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <!--<input type="text" name="rrefid" class="form-control" placeholder="Referral ID" required="" />-->
              </div>
<!--<div>
    <marquee>यदि रेफरल आई डी नहीं है तब 3 का उपयोग करें </marquee>
</div> -->
              <div>
                <input type="submit" value="Submit" name="reg" class="btn btn-default submit" />
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                    <a href="../index.php"><h1><i class="fa fa-tent"></i> myVita</h1></a>
                  <p>©2020 All Rights Reserved. Designed & Developed by myVita</p>
                </div>
              </div>
            </form>
          </section>
       
		
		
  
		 </div>
		
      </div>
    </div>
  </body>
</html>
<?php
} else {

    header("location:login.php");
}
?>