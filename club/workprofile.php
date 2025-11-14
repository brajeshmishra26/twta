<?php
session_start();
if (isset($_SESSION["wid"])) {

    include('include/connect.php');

    $id = $_SESSION["wid"];
    //echo $id;
    

    if (isset($_REQUEST["work"], $_REQUEST["waddress"], $_REQUEST["whatsapp"])) {

        $work = $_REQUEST["work"];
        $workType = $_REQUEST["workType"];
        $wemail = $_REQUEST["wemail"];
        $waddress = $_REQUEST["waddress"];
        $workdesc = $_REQUEST["workdesc"];
        $whatsapp = $_REQUEST["whatsapp"];
        $website = $_REQUEST["website"];

        if (isset($_FILES['logo']) && is_uploaded_file($_FILES['logo']['tmp_name'])) {
            if (!is_dir('docs')) { @mkdir('docs', 0755, true); }
            $maxSize = 10 * 1024 * 1024; // 10MB
            $allowedExt = ['jpg','jpeg','png','gif','webp'];
            $allowedMime = ['image/jpeg','image/png','image/gif','image/webp'];

            $tmp = $_FILES['logo']['tmp_name'];
            $origName = $_FILES['logo']['name'];
            $size = (int)$_FILES['logo']['size'];
            $ext = strtolower(pathinfo($origName, PATHINFO_EXTENSION));

            if ($size > 0 && $size <= $maxSize && in_array($ext, $allowedExt, true)) {
                $finfo = new finfo(FILEINFO_MIME_TYPE);
                $mime = $finfo->file($tmp);
                if (in_array($mime, $allowedMime, true)) {
                    $safeName = bin2hex(random_bytes(8)) . '.' . $ext;
                    if (move_uploaded_file($tmp, 'docs/' . $safeName)) {
                        $stmt = mysqli_prepare($link, "UPDATE writer SET logo = ? WHERE wid = ?");
                        if ($stmt) {
                            mysqli_stmt_bind_param($stmt, 'si', $safeName, $id);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_close($stmt);
                            echo "<script type='text/javascript'>alert('Logo Uploaded...');</script>";
                        }
                    }
                }
            }
        }

        $stmt2 = mysqli_prepare($link, "UPDATE writer SET description = ?, whatsapp = ?, website = ?, workEmail = ?, workAddress = ?, workName = ?, workType = ? WHERE wid = ?");
        if ($stmt2) {
            mysqli_stmt_bind_param($stmt2, 'sssssssi', $workdesc, $whatsapp, $website, $wemail, $waddress, $work, $workType, $id);
            if (mysqli_stmt_execute($stmt2)) {
                echo "<script type='text/javascript'>alert('Work Profile Updated...');window.location.href='index.php';</script>";
            } else {
                echo "<script type='text/javascript'>alert('Failed to update Work Profile.');</script>";
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

            <title>myVita - Work Profile </title>

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
   <script>
       window.load=$( document ).ready(function() {
	
	 $.ajax({
                type:'POST',
                url:'countryAjaxData.php',
                success:function(html){
                    $('#country').html(html);
                
                                      }
                   }); 
				   
				    });  
					
					
				   $( document ).ready(function() {
					   
					   $('#country').on('change',function(){//change function on country to display all state 
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Select state first</option>'); 
                                      }
                   }); 
                      }else{
                           $('#state').html('<option value="">Select country first</option>');
                           $('#city').html('<option value="">Select state first</option>'); 
                           }
    });
    
    $('#state').on('change',function(){//change state to display all city
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                                      }
                   }); 
                    }else{
                          $('#city').html('<option value="">Select state first</option>'); 
                         }
    });
	
	});
	 
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
                                            <h2>Work Profile</h2>
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
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Work Title <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="work" name="work" value="<?php echo $bb["workName"]; ?>"  required="required" class="form-control col-md-7 col-xs-12" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Description <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <textarea name="workdesc" class="form-control" rows="3"><?php echo $bb["description"]; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Whatsapp <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="number" id="whatsapp" name="whatsapp" value="<?php echo $bb["whatsapp"]; ?>" required="required" class="form-control col-md-7 col-xs-12" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Work Email</label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input id="wemail" name="wemail" value="<?php echo $bb["workEmail"]; ?>" class="form-control col-md-7 col-xs-12"  type="text" name="email">
                                                    </div>
                                                </div>
                                                <!--<div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div id="gender" class="btn-group" data-toggle="buttons">
                                                            <input type="radio" class="flat" <?php if ($bb["gender"] == "Male") { ?> checked="checked" <?php } ?> name="gender" id="genderM" value="Male" checked="" required /> Male
                                                            <input type="radio" class="flat" <?php if ($bb["gender"] == "Female") { ?> checked="checked" <?php } ?>  name="gender" id="genderF" value="Female" /> Female
                                                        </div>
                                                    </div>
                                                </div>-->
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Work Address <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <textarea name="waddress" class="form-control" rows="3"><?php echo $bb["workAddress"]; ?></textarea>
                                                    </div>
                                                </div>
                                                <?php /*
    $ccc=$bb["cityid"];
    $citysql = mysqli_query("select * from cities where city_id=$ccc order by city_id");
    $stt = mysqli_fetch_array($citysql);
            $stateid=$stt["state_id"];
$statesql = mysqli_query("select * from states where state_id=$stateid order by state_id");
    $stateresult = mysqli_fetch_array($statesql);
$countryid=$stateresult["country_id"];
$countrysql = mysqli_query("select * from countries where country_id=$countryid order by country_id");
$countryresult = mysqli_fetch_array($countrysql);
            */ ?>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country-name">Country <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <select name="country" id="country" class="form-control">
                                                                <option value=""><?php echo $countryresult["country_name"]; ?></option>
                                                                
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="state-name">State <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <select name="state" id="state" class="form-control">
    
                                                                <option value="<?php echo $stateresult["state_id"]; ?>"><?php echo $stateresult["state_name"]; ?></option>
                                                                
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">District<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <select name="city" id="city" class="form-control">
    
                                                            <option <?php if($bb["cityid"] == $stt["cid_id"]){ ?> selected="selected" <?php } ?> value="<?php echo $stt["city_id"]; ?>"><?php echo $stt["city_name"]; ?></option>
                                                               
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Logo/Photo 
                                                       <!--<span class="required">*</span>-->
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="file" onchange="onFileSelected1(event)" name="logo" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>
  Current Logo/Photo                                             
                                               <center>
    <img class="img-responsive" src="docs/<?php echo $bb["logo"];?>"  style="float:left; width:150px;height:150px">
  
  
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

