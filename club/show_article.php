<?php
session_start();
if (isset($_SESSION["wid"])){

    include('include/connect.php');

    $id = $_SESSION["wid"];
    //echo $id;

    $cid = $_REQUEST["cid"];
    ?>

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <!-- Meta, title, CSS, favicons, etc. -->
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>Writer's Club - Articles </title>

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
            <script>

                function abc() {

                    var a = $("#editor-one").html;
                    alert(a);

                    document.getElementById("bio").value = a;
                    return true;
                }

            </script>

            <!-- TinyMCE  -->


            <script type="text/javascript" src="tinymce/js/tinymce/tinymce.min.js"></script>
            <script type="text/javascript" src="tinymce/js/tinymce/themes/modern/theme.min.js"></script>
            <script type="text/javascript" src="tinymce/js/tinymce/plugins/table/plugin.min.js"></script>

            <!-- Custom Theme Style -->
            <link href="build/css/custom.min.css" rel="stylesheet">


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
                                        <h2>Submitted Article</h2>
                                        <hr/>
                                        <div class="x_content">
                                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>S.N.</th>
                                                        <th>Name</th>
                                                        <th>Contact</th>
                                                        <th>Headline</th>
                                                        <th>Content</th>
                                                       

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $i = 0;
                                                    $b = mysqli_query("select * from warticle inner join topicassign on(warticle.taid=topicassign.taid) where warticle.wid=$id");
                                                    while($bb = mysqli_fetch_array($b)) {
                                                        ?>

                                                        <tr>
                                                            <td><?php echo ++$i; ?></td>
                                                            <td><?php echo $bb["date"] ?></td>
                                                            <td><?php echo $bb["topic"] ?></td>
                                                            <td><?php echo $bb["headline"] ?></td>
                                                            <td><?php echo $bb["content"] ?></td>
                                                            
                                                        </tr>

                                                            <?php } ?>	

                                                </tbody>
                                            </table>

                                                    <?php
                                                    if (isset($_REQUEST["waid"])) {

                                                        $waid = $_REQUEST["waid"];
                                                        $cid = $_REQUEST["cid"];
                                                        
                                                        if (mysqli_query("insert into apparticle (waid) values ($waid)")) {
                                                            header("location:submittedtopics.php?cid=$cid");
                                                        }
                                                    }
                                                    ?>


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

                <!-- bootstrap-wysiwyg -->
                <script src="vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
                <script src="vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
                <script src="vendors/google-code-prettify/src/prettify.js"></script>
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
                <!-- Datatables -->
                <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
                <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
                <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
                <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
                <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
                <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
                <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
                <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
                <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
                <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
                <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
                <script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
                <script src="vendors/jszip/dist/jszip.min.js"></script>
                <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
                <script src="vendors/pdfmake/build/vfs_fonts.js"></script>

        </body>
    </html>
    <?php
} else {

    header("location:login.php");
}
?>

