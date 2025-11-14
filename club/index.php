<?php
session_start();
//error_reporting(0);
if (isset($_SESSION['user_id'])) {

    $id = $_SESSION['user_id'];
    $ref=$_SESSION['aadhr_numer'];
    include('include/connect.php');
    
    $w = mysqli_query($link, "select * from membership where id = $id");
    $ww = mysqli_fetch_array($w);
    
    if ($ww["flag"]> 0) {
       
    ?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <!-- Meta, title, CSS, favicons, etc. -->
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>TWTAMP - Profile </title>

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
            <br>
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
                                <a href="direct.php">    <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                                        <span class="count_top"><i class="fa fa-user"></i> Subscriber</span>
                                        <div class="count" title="Click To See Detail"><?php echo $ww["cnt"]; ?></div>

                                    </div></a>
     <a href="withdrawal.php">    <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                                        <span class="count_top"><i class="fa fa-clock-o"></i> Amount</span>
                                        <div class="count" title="Withdrawal Amount"><?php echo $amount; ?></div>

                                    </div></a>
<!--                                <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
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


                                </div>-->
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
}else {
    header("location:https://rzp.io/l/paytwta5");
}}
else{
    header("location:https://twtamp.co.in/login.html");
}
?>