<?php
session_start();
if (isset($_SESSION["wid"])) {

    include('include/connect.php');

    $id = $_SESSION["wid"];
    $b = mysqli_query($link,"select * from writer where wid = $id");
$bb = mysqli_fetch_array($b);
    if (isset($_REQUEST["upload"])) {
        if (!isset($_FILES["photo"]) || !is_uploaded_file($_FILES["photo"]["tmp_name"])) {
            echo "<script type='text/javascript'>alert('No file selected.');</script>";
        } else {
            $maxSize = 10 * 1024 * 1024; // 10MB
            $allowedExt = ['jpg','jpeg','png','gif','webp'];
            $allowedMime = ['image/jpeg','image/png','image/gif','image/webp'];

            if (!is_dir('docs')) { @mkdir('docs', 0755, true); }

            $tmp = $_FILES['photo']['tmp_name'];
            $origName = $_FILES['photo']['name'];
            $size = (int)$_FILES['photo']['size'];
            $ext = strtolower(pathinfo($origName, PATHINFO_EXTENSION));

            if ($size <= 0 || $size > $maxSize) {
                echo "<script type='text/javascript'>alert('Invalid file size. Max 10MB.');</script>";
            } elseif (!in_array($ext, $allowedExt, true)) {
                echo "<script type='text/javascript'>alert('Invalid file type. Only images allowed.');</script>";
            } else {
                $finfo = new finfo(FILEINFO_MIME_TYPE);
                $mime = $finfo->file($tmp);
                if (!in_array($mime, $allowedMime, true)) {
                    echo "<script type='text/javascript'>alert('Invalid MIME type.');</script>";
                } else {
                    $safeName = bin2hex(random_bytes(8)) . '.' . $ext;
                    $dest = 'docs/' . $safeName;
                    if (move_uploaded_file($tmp, $dest)) {
                        $stmt = mysqli_prepare($link, "UPDATE writer SET photo = ? WHERE wid = ?");
                        if ($stmt) {
                            mysqli_stmt_bind_param($stmt, 'si', $safeName, $id);
                            if (mysqli_stmt_execute($stmt)) {
                                echo "<script type='text/javascript'>window.location.href = '../profile';</script>";
                            } else {
                                echo "<script type='text/javascript'>alert('Database update failed.');</script>";
                            }
                            mysqli_stmt_close($stmt);
                        } else {
                            echo "<script type='text/javascript'>alert('Failed to prepare query.');</script>";
                        }
                    } else {
                        echo "<script type='text/javascript'>alert('Failed to move uploaded file.');</script>";
                    }
                }
            }
        }
    }  else {
        if (isset($_REQUEST["cancel"])) {
            echo "<script type='text/javascript'>window.location.href = '../profile';</script>";
                        
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

            <title>Profile Photo</title>

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
   
        </head>

        <body class="nav-md">
            <div class="container body">
                <div class="main_container">

                   
                    <!-- page content -->
                    <div class="right_col" role="main">
                        <!-- top tiles -->
                        <div class="row tile_count">
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Upload Photo</h2>
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

                                                 photo size should be 200X200 px
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Photo 
                                                       <!--<span class="required">*</span>-->
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="file" onchange="onFileSelected1(event)" name="photo" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>
                                             
                                               <center>
    <!--<img class="img-responsive" src="docs/<?php echo $bb["photo"];?>"  style="float:left; width:150px;height:150px">-->
  
  
 <img class="img-responsive" id="myimage1" style="float:mome; width:150px;height:150px">
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
                                                        <button name="cancel" class="btn btn-primary" type="button">Cancel</button>
                                                        <button class="btn btn-primary" type="reset">Reset</button>
                                                        <button name="upload" type="submit" class="btn btn-success">Submit</button>
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

