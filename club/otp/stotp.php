<?php session_start(); 
if (isset($_SESSION["wid"])) {

    $id = $_SESSION["wid"];
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>myVita - OTP Verification</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'><link rel="stylesheet" href="./style.css">

</head>
<?php
include('../include/connect.php');
mysqli_set_charset($link,'utf8');
    
                                  if(isset($_REQUEST["verify"])){
                                      
                                      $votp = $_REQUEST["rotp"];
                                      
                                   $sqlotp="SELECT * FROM students WHERE sid=$id";
					$yw1=mysqli_query($link,$sqlotp);
						$yyw1=mysqli_fetch_array($yw1);
						$otp1=$yyw1["otp"];
                                                if($votp==$otp1)
                                                    
      {
                                                    $sqlflag = "update students set flag = 1 where sid = $id";
                    if (mysqli_query($link,$sqlflag)) {
                        
                                                echo "<script type='text/javascript'>alert(\"Mobile Number Verified... \");window.location.href = 'https://student.myvita.in/';</script>";
                        
                    }
      
      }
                                  }
?>

                                                
                                 


<body>
<!-- partial:index.partial.html -->
<body class="main-bg">
        <div class="login-container text-c animated flipInX">
                <div>
                    <h1 class="logo-badge text-whitesmoke"><span class="fa fa-mobile"></span></h1>
                </div>
                    <h3 class="text-whitesmoke">Mobile Verification</h3>
                    <p class="text-whitesmoke">Enter OTP</p>
                <div class="container-content">
                    <form class="margin-t">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="OTP" required="" name="rotp">
                        </div>
                        <input type="submit" value="verify" name="verify" class="form-button button-l margin-b" >Verify</button>
        
                        <!--<a class="text-darkyellow" href="https://myvita.in/digital/club/otp/stotp.php"><small>Resend OTP</small></a>
                        <p class="text-whitesmoke text-center"><small>Do not have an account?</small></p>-->
                        <!--<a class="text-darkyellow" href="#"><small>Sign Up</small></a>-->
                    </form>
                    <p class="margin-t text-whitesmoke"><small> myVita &copy; 2023</small> </p>
                </div>
            </div>
</body>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
</body>
</html>
 <?php
} else {

    header("location:login.php");
}
?>


