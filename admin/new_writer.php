<?php
session_start();
if (isset($_SESSION["id"])) {

    include('include/connect.php');

    $id = $_SESSION["id"];
    //echo $id;
    
if(isset($_REQUEST["name"])){
    $name = $_REQUEST["name"];
    $contact = $_REQUEST["contact"];
    $email = $_REQUEST["email"];
    $gender = $_REQUEST["gender"];
    $address = $_REQUEST["address"];
    $city = $_REQUEST["city"];

    // Validate and handle file uploads
    if (!is_dir('../club/docs')) { @mkdir('../club/docs', 0755, true); }
    $maxImg = 10 * 1024 * 1024; // 10MB for images
    $maxPdf = 25 * 1024 * 1024; // 25MB for PDFs
    $imgExt = ['jpg','jpeg','png','gif','webp'];
    $imgMime = ['image/jpeg','image/png','image/gif','image/webp'];
    $pdfExt = ['pdf'];
    $pdfMime = ['application/pdf'];

    $photoName = null;
    if (isset($_FILES['photo']) && is_uploaded_file($_FILES['photo']['tmp_name'])) {
        $ptmp = $_FILES['photo']['tmp_name'];
        $porig = $_FILES['photo']['name'];
        $psize = (int)$_FILES['photo']['size'];
        $pext = strtolower(pathinfo($porig, PATHINFO_EXTENSION));
        if ($psize > 0 && $psize <= $maxImg && in_array($pext, $imgExt, true)) {
            $f = new finfo(FILEINFO_MIME_TYPE);
            $pmime = $f->file($ptmp);
            if (in_array($pmime, $imgMime, true)) {
                $photoName = bin2hex(random_bytes(8)) . '.' . $pext;
                if (!move_uploaded_file($ptmp, '../club/docs/' . $photoName)) { $photoName = null; }
            }
        }
    }

    $aadharName = null;
    if (isset($_FILES['aadhar']) && is_uploaded_file($_FILES['aadhar']['tmp_name'])) {
        $atmp = $_FILES['aadhar']['tmp_name'];
        $aorig = $_FILES['aadhar']['name'];
        $asize = (int)$_FILES['aadhar']['size'];
        $aext = strtolower(pathinfo($aorig, PATHINFO_EXTENSION));
        $f = new finfo(FILEINFO_MIME_TYPE);
        $amime = $f->file($atmp);
        $isImg = in_array($aext, $imgExt, true) && in_array($amime, $imgMime, true) && $asize > 0 && $asize <= $maxImg;
        $isPdf = in_array($aext, $pdfExt, true) && in_array($amime, $pdfMime, true) && $asize > 0 && $asize <= $maxPdf;
        if ($isImg || $isPdf) {
            $aadharName = bin2hex(random_bytes(8)) . '.' . $aext;
            if (!move_uploaded_file($atmp, '../club/docs/' . $aadharName)) { $aadharName = null; }
        }
    }

    $stmt = mysqli_prepare($link, "INSERT INTO writer (name, contact, email, password, address, cityid, photo, aadharcard, gender, refid) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 0)");
    if ($stmt) {
        $pwd = $contact; // existing behavior: password = contact
        mysqli_stmt_bind_param($stmt, 'ssssissss', $name, $contact, $email, $pwd, $address, $city, $photoName, $aadharName, $gender);
        if (mysqli_stmt_execute($stmt)) {
            echo '<script>alert("New Writer Added...");</script>';
        } else {
            echo '<script>alert("Failed to add writer.");</script>';
        }
        mysqli_stmt_close($stmt);
    } else {
        echo '<script>alert("Failed to prepare insert.");</script>';
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

            <title>Writer's Club - Profile </title>

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
                                                        <li><a href="#">Settings 1</a>
                                                        </li>
                                                        <li><a href="#">Settings 2</a>
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
                                                        <input type="text" id="name" name="name"  required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Contact <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="number" id="contact" name="contact" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input id="email" class="form-control col-md-7 col-xs-12" type="text" name="email">
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
                                                        <textarea name="address" class="form-control" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">State <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <select name="state" class="form-control">
    <?php
    $st = mysqli_query($link, "select * from state");
    while ($stt = mysqli_fetch_array($st)) {
        ?>
                                                                <option value="<?php echo $stt["sid"]; ?>"><?php echo $stt["state"]; ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">City<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <select name="city" class="form-control">
    <?php
    $st = mysqli_query($link, "select * from city where sid = 1 order by cid");
    while ($stt = mysqli_fetch_array($st)) {
        ?>
                                                            <option <?php if($bb["cityid"] == $stt["cid"]){ ?> selected="selected" <?php } ?> value="<?php echo $stt["cid"]; ?>"><?php echo $stt["city"]; ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div> 
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Photo <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="file" onchange="onFileSelected1(event)" name="photo" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>
                                                <center><img class="img-responsive" id="myimage1" style="width:200px;height:150px"></center>
                                               <br/>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Aadhar Card <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="file" onchange="onFileSelected2(event)" name="aadhar" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>
                                                <center><img class="img-responsive" id="myimage2" style="width:200px;height:150px"></center>
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

