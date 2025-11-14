<?php
session_start();
if (isset($_SESSION["user_id"])) {

    include('include/connect.php');

    $id = $_SESSION["user_id"];
    //echo $id;
    

    if (isset($_REQUEST["gender"], $_REQUEST["address"], $_REQUEST["city"])) {

        $gender = $_REQUEST["gender"];
        $email = $_REQUEST["email"];
        $name = $_REQUEST["name"];
        $address = $_REQUEST["address"];
        $city = $_REQUEST["city"];

        if (isset($_FILES['photo']) && is_uploaded_file($_FILES['photo']['tmp_name'])) {
            if (!is_dir('docs')) { @mkdir('docs', 0755, true); }
            $maxSize = 10 * 1024 * 1024; // 10MB
            $allowedExt = ['jpg','jpeg','png','gif','webp'];
            $allowedMime = ['image/jpeg','image/png','image/gif','image/webp'];

            $tmp = $_FILES['photo']['tmp_name'];
            $origName = $_FILES['photo']['name'];
            $size = (int)$_FILES['photo']['size'];
            $ext = strtolower(pathinfo($origName, PATHINFO_EXTENSION));

            if ($size > 0 && $size <= $maxSize && in_array($ext, $allowedExt, true)) {
                $finfo = new finfo(FILEINFO_MIME_TYPE);
                $mime = $finfo->file($tmp);
                if (in_array($mime, $allowedMime, true)) {
                    $safeName = bin2hex(random_bytes(8)) . '.' . $ext;
                    if (move_uploaded_file($tmp, 'docs/' . $safeName)) {
                        $stmt = mysqli_prepare($link, "UPDATE profile SET photo = ? WHERE affiliate_ID = ?");
                        if ($stmt) {
                            mysqli_stmt_bind_param($stmt, 'si', $safeName, $id);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_close($stmt);
                            echo "<script type='text/javascript'>alert('Photo Uploaded...');</script>";
                        }
                    }
                }
            }
        }

        $stmt2 = mysqli_prepare($link, "UPDATE profile SET name = ?, email = ?, address = ?, cityid = ?, gender = ? WHERE affiliate_ID = ?");
        if ($stmt2) {
            mysqli_stmt_bind_param($stmt2, 'sssssi', $name, $email, $address, $city, $gender, $id);
            if (mysqli_stmt_execute($stmt2)) {
                echo "<script type='text/javascript'>alert('Profile Updated...');window.location.href='index.php';</script>";
            } else {
                echo "<script type='text/javascript'>alert('Failed to update profile.');</script>";
            }
            mysqli_stmt_close($stmt2);
        } else {
            echo "<script type='text/javascript'>alert('Failed to prepare update.');</script>";
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <!-- Meta, title, CSS, favicons, etc. -->
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>myVita - Profile </title>

            <!-- Bootstrap -->
            <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
            <!-- Font Awesome -->
            <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
            <!-- NProgress -->
            <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
            <!-- iCheck -->
            <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">

            <!-- bootstrap-progressbar -->
            <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
            <!-- JQVMap -->
            <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
            <!-- bootstrap-daterangepicker -->
            <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

            <!-- Custom Theme Style -->
            <link href="build/css/custom.min.css" rel="stylesheet">
            <!-- Start Countries-States-Cities -->
            <script src="jquery.min.js"></script>
   <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">-->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!--Country State City -->  
 <script>
function getstate(val) {
	//alert(val);
	$.ajax({
	type: "POST",
	url: "get_state.php",
	data:'coutrycode='+val,
	success: function(data){
		$("#statelist").html(data);
	}
	});
}

function getcity(val) {
	//alert(val);
	$.ajax({
	type: "POST",
	url: "get_city.php",
	data:'statecode='+val,
	success: function(data){
		$("#city").html(data);
	}
	});
}

</script>	
<!-- End Countries- States -Cities-->
        </head>

        <body class="nav-md">
            <div class="container body">
                <div class="main_container">

                    <!-- Left View -->
    <?php include('include/leftview.php'); ?>
                    <!-- Left View -->


                    <!-- top navigation -->
    <?php include('include/top.php'); ?>
                    <!-- /top navigation -->

                    <!-- page content -->
                    <div class="right_col" role="main">
                        <!-- top tiles -->
                        <div class="row tile_count">
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>My Profile</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="#">W</a>
                                                        </li>
                                                        <li><a href="#">C</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <br />
                                            <form id="demo-form2" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="name" name="name" value="<?php echo $bb["name"]; ?>"  required="required" class="form-control col-md-7 col-xs-12" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Contact <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="number" id="contact" name="contact" value="<?php echo $bb["mobile"]; ?>" required="required" class="form-control col-md-7 col-xs-12" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input id="email" name="email" value="<?php echo $bb["email"]; ?>" class="form-control col-md-7 col-xs-12"  type="text" name="email">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div id="gender" class="btn-group" data-toggle="buttons">
                                                            <input type="radio" class="flat" <?php if ($bb["gender"] == "Male") { ?> checked="checked" <?php } ?> name="gender" id="genderM" value="Male" checked="" required /> Male
                                                            <input type="radio" class="flat" <?php if ($bb["gender"] == "Female") { ?> checked="checked" <?php } ?>  name="gender" id="genderF" value="Female" /> Female
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Address <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <textarea name="address" class="form-control" rows="3"><?php echo $bb["address"]; ?></textarea>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country-name">Country <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <select onChange="getstate(this.value);"  name="country" id="country" class="form-control" >
                                                                <option value="">Select</option>
                                                                <?php $query =mysqli_query($link,"SELECT * FROM country");
while($row=mysqli_fetch_array($query))
{ ?>
<option value="<?php echo $row['country_id'];?>"><?php echo $row['country_name'];?></option>
<?php
}
?>
                                                                
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="state-name">State <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <select onChange="getcity(this.value);" name="statelist" id="statelist" class="form-control">
    
                                                                <option value="">Select</option>
                                                                
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">District<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <select name="city" id="city" class="form-control">
    
                                                            <option  value=""> Select City</option>
                                                               
                                                        </select>
                                                    </div>
                                                </div> 
                                               
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Photo 
                                                       <!--<span class="required">*</span>-->
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="file" onchange="onFileSelected1(event)" name="photo" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>
  <!--Current Photo-->                                             
                                               <center>
    <!--<img class="img-responsive" src="docs/<?php echo $bb["photo"];?>"  style="float:left; width:150px; height:150px">-->
  
  
 <img class="img-responsive" id="myimage1" style="float:none; width:150px;height:150px">
  </center>
                                               
                                                
                                                
                                               <br/>
                                                <!--<div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Aadhar Card <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="file" onchange="onFileSelected2(event)" name="aadhar" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>
                                                <center><img class="img-responsive" id="myimage2" style="width:200px;height:150px"></center>-->
                                                <div class="ln_solid"></div>
                                                <div class="form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                        <button class="btn btn-primary" type="button">Cancel</button>
                                                        <button class="btn btn-primary" type="reset">Reset</button>
                                                        <button type="submit" class="btn btn-success">Submit</button>
                                                    </div>
                                                </div>
                                                <script>
                                                    function onFileSelected1(event) {
                                                        var selectedFile = event.target.files[0];
                                                        var reader = new FileReader();

                                                        var imgtag = document.getElementById("myimage1");
                                                        imgtag.title = selectedFile.name;

                                                        reader.onload = function(event) {
                                                            imgtag.src = event.target.result;
                                                        };

                                                        reader.readAsDataURL(selectedFile);
                                                    }
                                                    function onFileSelected2(event) {
                                                        var selectedFile = event.target.files[0];
                                                        var reader = new FileReader();

                                                        var imgtag = document.getElementById("myimage2");
                                                        imgtag.title = selectedFile.name;

                                                        reader.onload = function(event) {
                                                            imgtag.src = event.target.result;
                                                        };

                                                        reader.readAsDataURL(selectedFile);
                                                    }
                                                </script>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /page content -->


                    </div>
                </div>

                <!-- jQuery -->
                <script src="vendors/jquery/dist/jquery.min.js"></script>
                <!-- Bootstrap -->
                <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                <!-- FastClick -->
                <script src="vendors/fastclick/lib/fastclick.js"></script>
                <!-- NProgress -->
                <script src="vendors/nprogress/nprogress.js"></script>
                <!-- Chart.js -->
                <script src="vendors/Chart.js/dist/Chart.min.js"></script>
                <!-- gauge.js -->
                <script src="vendors/gauge.js/dist/gauge.min.js"></script>
                <!-- bootstrap-progressbar -->
                <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
                <!-- iCheck -->
                <script src="vendors/iCheck/icheck.min.js"></script>
                <!-- Skycons -->
                <script src="vendors/skycons/skycons.js"></script>
                <!-- Flot -->
                <script src="vendors/Flot/jquery.flot.js"></script>
                <script src="vendors/Flot/jquery.flot.pie.js"></script>
                <script src="vendors/Flot/jquery.flot.time.js"></script>
                <script src="vendors/Flot/jquery.flot.stack.js"></script>
                <script src="vendors/Flot/jquery.flot.resize.js"></script>
                <!-- Flot plugins -->
                <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
                <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
                <script src="vendors/flot.curvedlines/curvedLines.js"></script>
                <!-- DateJS -->
                <script src="vendors/DateJS/build/date.js"></script>
                <!-- JQVMap -->
                <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
                <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
                <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
                <!-- bootstrap-daterangepicker -->
                <script src="vendors/moment/min/moment.min.js"></script>
                <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

                <!-- Custom Theme Scripts -->
                <script src="build/js/custom.min.js"></script>

        </body>
    </html>
    <?php
} else {

    header("location:login.php");
}
?>

