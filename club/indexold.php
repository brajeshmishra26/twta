<?php
session_start();
//error_reporting(0);
if (isset($_SESSION['aadhr_numer'])) {

    $id = $_SESSION['user_id'];
    include('include/connect.php');

    
    
    $w1 = mysqli_query($link, "select count(*) as cnt1 from students where refid= $id and paymentID IS NULL" );
    $ww1 = mysqli_fetch_array($w1);
    $pw = mysqli_query($link, "select count(*) as paidcnt from students where  paymentID IS NOT NULL and refid=$id ");
    $pww = mysqli_fetch_array($pw);
    
    ?>

    <!-- End of Virtual Code-->

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
                        <?php
                        $dispvsql = "select * from profile where affiliate_ID= $id ";
                        $dispvr = mysqli_query($link, $dispvsql);
                        $dispvrr = mysqli_fetch_array($dispvr);
                        if ($dispvrr["flag"] == 0) {
                            ?>
                            <div class="row tile_count">
                                <a href="vreaders.php">    <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                                        <span class="count_top"><i class="fa fa-user"></i> Direct</span>
                                        <div class="count" title="Click To See Detail"><?php echo Student; ?></div>

                                    </div></a>
                                <a href="vreaders.php">    <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                                        <span class="count_top"><i class="fa fa-clock-o"></i> Level1</span>
                                        <div class="count"><?php echo $f; ?></div>

                                    </div></a>
                                <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                                    <span class="count_top"><i class="fa fa-user"></i> Level2</span>
                                    <div class="count"><?php echo $i; ?></div>

                                </div>
                                <a href="vreaders.php">    <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                                        <span class="count_top"><i class="fa fa-clock-o"></i> Level3</span>
                                        <div class="count"><?php echo $j; ?></div>

                                    </div></a>

                                <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                                    <span class="count_top"><i class="fa fa-user"></i> Virtual Earning(Rs)</span>
                                    <div class="count"><?php echo ($vkk * 1) + ($vww["vcnt"] * 1); ?></div>


                                </div>
                            </div>
                            <?php
                        } elseif ($dispvrr["flag"] == 1) {
                            ?>
                            <div class="row tile_count">
                                <!--<a href="#">    <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                                        <span class="count_top"><i class="fa fa-user"></i> Balance</span>
                                        <div class="count" title="Click To See Detail"><?php echo "$dispvrr[reward]"; ?></div>

                                    </div></a>-->
                                <a href="#">    <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                                        <span class="count_top"><i class="fa fa-clock-o"></i> Date of Joining</span>
                                        <div class="count"><?php echo "$dispvrr[jdate]"; ?></div>

                                    </div></a>
                                <a href="level21.php"><div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                                        <span class="count_top"><i class="fa fa-user"></i> contribution</span>
                                        <!--<div class="count"><?php echo ("$pww[paidcnt]")*55; ?></div>-->

                                    </div></a>
                                <!--<a href="level3.php"><div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                                                                <span class="count_top"><i class="fa fa-user"></i> Level3</span>
                                                               <div class="count"><?php echo $j - $i; ?></div>
                                
                                                                </div></a>
                                <a href="#"><div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                                        <span class="count_top"><i class="fa fa-user"></i> Balance</span>
                                        <div class="count"><?php echo ("$pww[paidcnt]")*0; ?></div>


                                    </div></a>-->
                            </div>
                            <?php
                        } else {
                            
                        }
                        ?>
                        <?php
                        $date = date("Y-m-d");
                        $s = mysqli_query($link, "select * from warticle where date='$date' and wid=$id");
                        if ($r = mysqli_fetch_array($s)) {
                            ?>
                            <div class="row">
                                <div class="col-lg-6 col-lg-offset-3">    
                                    <div class="alert alert-success alert-dismissible fade in" style="text-align:center;font-size:15px;color:white" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
                                        <strong style="font-size:15px"><b>Today's Topic Is Successfully Submitted</b></strong>
                                    </div>
                                </div>
                            </div>
                            <?php
                        } else {
                            
                        }
                        ?>


                        <div class="row">

                                            <!--<center>	<img style="width:700px; height:400px;" class="img-responsive" src="images/#"  /> </centeR>-->
                        </div>




                        <!-- /top tiles -->



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

