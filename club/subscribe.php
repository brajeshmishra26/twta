<?php
session_start();
if (isset($_SESSION["user_id"])) {

    include('include/connect.php');

    $id = $_SESSION["user_id"];

    // Check if the user has a subscription with 'paid_flag' = 0 and delete it
    $check_paid_flag_sql = "SELECT * FROM subscription WHERE user_id = '$id'";
    $check_paid_flag_result = mysqli_query($link, $check_paid_flag_sql);

    if (mysqli_num_rows($check_paid_flag_result) > 0) {
        $delete_sql = "DELETE FROM subscription WHERE user_id = '$id'";
        mysqli_query($link, $delete_sql);
    }

    if (isset($_REQUEST["referral_id"])) {

        $referral_id = $_REQUEST["referral_id"];
        $module_id = $_REQUEST["module"];
        $user_id = $_SESSION["user_id"];

        // Check if the user already has a subscription for the selected module
        $check_sql = "SELECT * FROM subscription WHERE user_id = '$user_id' AND module_id = '$module_id'";
        $check_result = mysqli_query($link, $check_sql);

        // Determine the target table based on module_id
        switch ($module_id) {
            case 1:
                $target_table = "demo_module";
                break;
            case 2:
                $target_table = "whatsapp_module";
                break;
            case 3:
                $target_table = "youtube_module";
                break;
            case 4:
                $target_table = "insta_module";
                break;
            case 5:
                $target_table = "facebook_module";
                break;
            case 6:
                $target_table = "email_module";
                break;
            case 7:
                $target_table = "demowhatsapp_module";
                break;
            case 8:
                $target_table = "website_module";
                break;
            default:
                echo "<script type='text/javascript'>alert(\"Invalid module_id.\");</script>";
                exit();
        }

        // Check if the user already has a subscription for the selected module in the respective module table
        $check_module_sql = "SELECT * FROM $target_table WHERE user_id = '$user_id'";
        $check_module_result = mysqli_query($link, $check_module_sql);

        if (mysqli_num_rows($check_result) > 0) {
            // Redirect to the payment page based on the module_id
            switch ($module_id) {
                case 1:
                    echo "<script type='text/javascript'>window.location.href = 'https://rzp.io/l/digiclubdemo';</script>";
                    break;
                case 2:
                    echo "<script type='text/javascript'>window.location.href = 'https://rzp.io/l/whatsapp-module';</script>";
                    break;
                case 3:
                    echo "<script type='text/javascript'>window.location.href = 'https://rzp.io/l/youtube-module';</script>";
                    break;
                case 4:
                    echo "<script type='text/javascript'>window.location.href = 'https://rzp.io/l/insta-module';</script>";
                    break;
                case 5:
                    echo "<script type='text/javascript'>window.location.href = 'https://rzp.io/l/facebook-module';</script>";
                    break;
                case 6:
                    echo "<script type='text/javascript'>window.location.href = 'https://rzp.io/l/email-module';</script>";
                    break;
                case 7:
                    echo "<script type='text/javascript'>window.location.href = 'https://rzp.io/l/whatsappdemo';</script>";
                    break;
                case 8:
                    echo "<script type='text/javascript'>window.location.href = 'https://rzp.io/l/website-module';</script>";
                    break;
                default:
                    echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
                    break;
            }
        } elseif (mysqli_num_rows($check_module_result) > 0) {
            echo "<script type='text/javascript'>alert(\"You already have a subscription for this module.\");</script>";
            echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
        } else {
            $sql = "INSERT INTO subscription (user_id, module_id, referral_id) VALUES ('$user_id', '$module_id', '$referral_id')";

            if (mysqli_query($link, $sql)) {
                echo "<script type='text/javascript'>alert(\"Subscription added successfully.\");</script>";

                // Redirect to the payment page based on the module_id
                switch ($module_id) {
                    case 1:
                        echo "<script type='text/javascript'>window.location.href = 'https://rzp.io/l/digiclubdemo';</script>";
                        break;
                    case 2:
                        echo "<script type='text/javascript'>window.location.href = 'https://rzp.io/l/whatsapp-module';</script>";
                        break;
                    case 3:
                        echo "<script type='text/javascript'>window.location.href = 'https://rzp.io/l/youtube-module';</script>";
                        break;
                    case 4:
                        echo "<script type='text/javascript'>window.location.href = 'https://rzp.io/l/insta-module';</script>";
                        break;
                    case 5:
                        echo "<script type='text/javascript'>window.location.href = 'https://rzp.io/l/facebook-module';</script>";
                        break;
                    case 6:
                        echo "<script type='text/javascript'>window.location.href = 'https://rzp.io/l/email-module';</script>";
                        break;
                    case 7:
                        echo "<script type='text/javascript'>window.location.href = 'https://rzp.io/l/whatsappdemo';</script>";
                        break;
                    case 8:
                        echo "<script type='text/javascript'>window.location.href = 'https://rzp.io/l/website-module';</script>";
                        break;
                    default:
                        echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
                        break;
                }
            } else {
                echo "<script type='text/javascript'>alert(\"Error: " . mysqli_error($link) . "\");</script>";
            }
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
                                    <h2>Subscribe</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">my</a></li>
                                                <li><a href="#">Vita</a></li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form id="demo-form2" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="module-name">Select Module <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="module" id="module" class="form-control">
                                                    <option value="">Select</option>
                                                    <?php 
                                                    $query = mysqli_query($link, "SELECT * FROM module");
                                                    while ($row = mysqli_fetch_array($query)) { 
                                                    ?>
                                                        <option value="<?php echo $row['module_id']; ?>"><?php echo $row['module_name']; ?>&nbsp;-&nbsp;<?php echo $row['fees']; ?></option>
                                                    <?php 
                                                    } 
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="referral_id">Referral ID <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="referral_id" name="referral_id" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
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
    header("location:https://myvita.in/myvita3/login.html");
}
?>
