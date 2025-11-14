<?php
session_start();
if (isset($_SESSION["wid"])) {

    include('include/connect.php');

    $id = $_SESSION["wid"];
    //echo $id;

    mysqli_set_charset('utf8');


    $date = date("Y-m-d");
    $query = mysqli_query("select * from writer inner join topicassign on(writer.cityid=topicassign.cityid)where topicassign.date='$date' and writer.wid=$id ");
    if ($q = mysqli_fetch_array($query)) {
        $topic = $q['topic'];
        $taid = $q['taid'];
    }



    if (isset($_REQUEST['name'])) {

        $name = mysqli_real_escape_string( $_REQUEST["name"]);
        $article = mysqli_real_escape_string( $_REQUEST["article"]);

        $date = date("Y-m-d");


        $sql = "insert into warticle(headline,content,date,views,wid,taid)values('$name','$article','$date','0','$id',$taid)";
       // echo $sql;
        if (mysqli_query($sql)) {
            ?>
            <script>alert("Article Submitted...");
                window.location.href = "index.php";
            </script>
            <?php
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
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
    <?php if (isset($taid)) {
; ?>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <h2 class="heading">Write On Following Topic :</h2>
                                                    <button class="btn btn-danger"><?php echo $topic; ?></button>
                                                </div>
                                            </div>
                                        <?php }; ?>
                                        <div class="x_content">
                                            <br />
                                            <form id="demo-form2" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Headline<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <textarea type="text" id="name" name="name"  class="form-control col-md-7 col-xs-12"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Article<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <textarea type="text" id="contact" name="article"  class="form-control col-md-7 col-xs-12"></textarea>
                                                    </div>
                                                </div>







                                                <div class="ln_solid"></div>
                                                <?php if (isset($taid)) {
; ?>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                            <button class="btn btn-primary" type="button">Cancel</button>
                                                            <button class="btn btn-primary" type="reset">Reset</button>
                                                            <input value="Submit" type="submit" class="btn btn-success" />
                                                        </div>
                                                    </div>
                                                <?php }; ?>

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
                <!-- TinyMCE  -->


                <script type="text/javascript" src="tinymce/js/tinymce/tinymce.min.js"></script>
                <script type="text/javascript" src="tinymce/js/tinymce/themes/modern/theme.min.js"></script>
                <script type="text/javascript" src="tinymce/js/tinymce/plugins/table/plugin.min.js"></script>


                <!--script>tinymce.init({ selector:'textarea' });</script-->
                <script>tinymce.init({
            selector: 'textarea',
            height: 100,
            theme: 'modern',
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools'
            ],
            toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons',
            image_advtab: true,
            templates: [
                {title: 'Test template 1', content: 'Test 1'},
                {title: 'Test template 2', content: 'Test 2'}
            ],
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css'
            ]
        });

                </script>
                <script type="text/javascript" src="tinymce/js/tiny_mce.js"></script>
                <script type="text/javascript">
        tinyMCE.init({
            // General options
            mode: "textareas",
            theme: "simple",
        });
                </script>
        </body>
    </html>
<?php
} else {

    header("location:login.php");
};
?>

