<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Writer's Club</title>

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
		
		if(isset($_REQUEST["luser"])){
			
			$user = $_REQUEST["luser"];
			$pass = mysqli_real_escape_string($_REQUEST["lpass"]);			
			
			$sql = "select * from admin where username = '$user' and password='$pass' ";
			$a = mysqli_query($sql);
			if($aa = mysqli_fetch_array($a)){
				$_SESSION['username'] = $aa["name"];
				$_SESSION['id'] = $aa["id"];
		?>
					<script>window.location.href="index.php"; </script>
		<?php		
		
				//header("location:index.php");
			}else{
				
				?>
					<script>alert("Invalid username or password")</script>
		<?php
			}
		}
		
  ?>
		
  
  
  
  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post">
              <h1>Login Form</h1>
              <div>
                <input type="text" name="luser" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" name="lpass" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <input type="submit" value="Log in" name="login" class="btn btn-default submit" />
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
               
                <div>
                    <a href="../home.php"><h1><i class="fa fa-pencil"></i> Writer's Club</h1></a>
                  <p>©2017 All Rights Reserved. Designed & Developed by ITSA</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        
		
      </div>
    </div>
  </body>
</html>
