<?php
session_start();



if (isset($_SESSION["id"])) {

    include('include/connect.php');

    $id = $_SESSION["id"];
    //echo $id;
    ?>

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <!-- Meta, title, CSS, favicons, etc. -->
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title> Assign Order </title>

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



        </head>

        <?php
        $sql = "select writer.*, city.* from writer inner join city on (writer.cityid = city.cid)  where flag = 1";
        $date = date("Y-m-d");
        
        if (isset($_REQUEST["id"])) {
            $id = $_REQUEST["id"];
            if ($id != 0)
                $sql = $sql . " and writer.cityid = $id order by wid desc";
        }else {
            $sql = $sql . " order by wid desc";
            $id = 0;
        }
        ?>



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

                                    <!-- Form Assign Topic -->


                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Assign Topics</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <!--<li><a href="#">Settings 1</a>-->
                                                        <!--</li>-->
                                                        <!--<li><a href="#">Settings 2</a>-->
                                                        <!--</li>-->
                                                    </ul>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <script>
                                                function change() {
                                                    var id = document.getElementById("city").value;
                                                    window.location.href = "assign.php?id=" + id;
                                                }
                                        </script>

                                        <div class="x_content">
                                            <br />
                                            <form id="demo-form2" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Order Type<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <select name="city1" id="city1" class="form-control" onchange="change();">
                                                            <option value="0">Select</option>
                                                                <?php
                                                                $st = mysqli_query($link, "select * from city1 ");
                                                                while ($stt = mysqli_fetch_array($st)) {
                                                                    ?>
                                                                <option  <?php if ($id == $stt["cid1"]) { ?> selected="selected" <?php } ?> value="<?php echo $ex1=$stt["cid1"]; ?>"><?php echo $stt["city1"]; ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Order Sub Type<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <select name="subid" id="city1" class="form-control" onchange="change();">
                                                            <option value="0">Select</option>
                                                                <?php
                                                                $st1 = mysqli_query($link, "select * from ordersub ");
                                                                while ($stt1 = mysqli_fetch_array($st1)) {
                                                                    ?>
                                                                <option  <?php if ($id == $stt1["subid"]) { ?> selected="selected" <?php } ?> value="<?php echo $stt1["subid"]; ?>"><?php echo $stt1["ordersubmenu"]; ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Title of Order <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="topic" name="topic"  required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Date of Order <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="date" id="orderdate" name="orderdate"  required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">PDF File <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="file" onchange="onFileSelected1(event)" name="photo" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>
                                                <center><img class="img-responsive" id="myimage1" style="width:200px;height:150px"></center>
                                                <div class="ln_solid"></div>
        
                                                <?php 
                                                    $ch = mysqli_query($link, "select * from topicassign where cityid = $id and date = '$date'");
                                                    if ($chk = mysqli_fetch_array($ch)) { 
                                                        
                                                  ?>
                                                      <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                                        </button>
                                                        <strong>Today's Topic Already Assigned...!!!</strong>
                                                      </div>
                                                      <?php      
                                                    }else{    
                                                ?>
                                                
                                                <div class="form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                        <button class="btn btn-primary" type="button">Cancel</button>
                                                        <button class="btn btn-primary" type="reset">Reset</button>
                                                        <button type="submit" class="btn btn-success">Submit</button>
                                                    </div>
                                                </div>
                                                    <?php } ?>
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

                                                </script>
                                            </form>
                                        </div>
                                    </div>






                                    <div class="x_panel">
                                        <!--<h2>Pending Writer Request</h2>-->
                                        <hr/>
                                        <div class="x_content">
                                            <!--<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>S.N.</th>
                                                        <th>Name</th>
                                                        <th>Contact</th>
                                                        <th>Email</th>
                                                        <th>City</th>
                                                        <th>Gender</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

    <?php
    $i = 0;
    $b = mysqli_query($link, $sql);
    while ($bb = mysqli_fetch_array($b)) {
        ?>

                                                        <tr>
                                                            <td><?php echo ++$i; ?></td>
                                                            <td><?php echo $bb["name"] ?></td>
                                                            <td><?php echo $bb["contact"] ?></td>
                                                            <td><?php echo $bb["email"] ?></td>
                                                            <td><?php echo $bb["city"] ?></td>
                                                            <td><?php echo $bb["gender"] ?></td>

                                                        </tr>

    <?php } ?>	

                                                </tbody>
                                            </table>-->

    <?php
    if (isset($_REQUEST["city1"], $_REQUEST["subid"])) {
        mysqli_set_charset($link, 'utf8');
        $topic = $_REQUEST["topic"];
        $subid = $_REQUEST["subid"];
        $date = $_REQUEST["orderdate"];
        $city = $_REQUEST["city1"];

        if (!is_dir('topicimg')) { @mkdir('topicimg', 0755, true); }
        $uploaded = false;
        $safeName = null;
        if (isset($_FILES['photo']) && is_uploaded_file($_FILES['photo']['tmp_name'])) {
            $maxPdf = 25 * 1024 * 1024; // 25MB for PDF
            $ext = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
            $f = new finfo(FILEINFO_MIME_TYPE);
            $mime = $f->file($_FILES['photo']['tmp_name']);
            if ($ext === 'pdf' && $mime === 'application/pdf' && (int)$_FILES['photo']['size'] > 0 && (int)$_FILES['photo']['size'] <= $maxPdf) {
                $safeName = bin2hex(random_bytes(8)) . '.pdf';
                if (move_uploaded_file($_FILES['photo']['tmp_name'], 'topicimg/' . $safeName)) {
                    $uploaded = true;
                }
            }
        }

        if ($uploaded) {
            $stmt = mysqli_prepare($link, "INSERT INTO topicassign (cityid, subid, topic, date, image) VALUES (?, ?, ?, ?, ?)");
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, 'iisss', $city, $subid, $topic, $date, $safeName);
                if (mysqli_stmt_execute($stmt)) {
                    ?>
                                            <script type="text/javascript">
                                                alert("Title Assigned..");
                                                window.location.href = "assign.php";
                                            </script>
                    <?php
                }
                mysqli_stmt_close($stmt);
            }
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

