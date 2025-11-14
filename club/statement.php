<?php
session_start();
if (isset($_SESSION["wid"])) {

    $id = $_SESSION["wid"];
    include('include/connect.php');

   
    $w = mysqli_query("select count(*) as cnt from writer where refid = $id and flag =1 and cityid > 0");
    $ww = mysqli_fetch_array($w);
    
    
                                    
            $sql="select * from writer where wid = $id and flag = 1 and cityid>0; ";
//           print_r($sql);
           $result=  mysqli_query($sql);
           $row=  mysqli_fetch_array($result);
           $n=$row['wid'];
//           echo $n ."<br />";
           $nex=((7 * $n)-5);
//           echo $nex ."<br />";
           $x=array();
           $y=array();
           $z=array();
           $w=array();
           $q=array();
         $x[7];$y[49];$z[343];$w[2401];$q[16807];
           
           $k=0;$l=0;$m=0;$nn=0;
           for($newa=0;$newa<7;$newa++)
           {
            $x[$newa] =$nex;
          // echo $x[$newa];//234
           
             $nex1=((7 * $nex)-5); 

                for($b=0;$b<7;$b++)
                {
                 $y[$k]=$nex1;//1
//                echo $y[$k];
                 $k++;
                 $nex2=((7*$nex1)-5);
                    for($c=0;$c<7;$c++)
                    {
                        $z[$l]=$nex2;
//                        echo $z[$l];
                        $l++;
                        $nex3=((7 * $nex2)-5);
                            for($d=0;$d<7;$d++)
                            {
                                $w[$m]=$nex3;//2
//                                echo $w[$m];
                                $m++;
                                $nex4=((7 * $nex3)-5);
                                
                                // echo"</br>";
                                for($e=0;$e<7;$e++)
                            {
                                $q[$nn]=$nex4;//2
//                                echo $q[$nn];
                                $nn++;
                                $nex4++;
                                
                                // echo"</br>";
                            }
                            $nex3++;
                            }
                        $nex2++;
                         //echo"</br>";
                    }
                    $nex1++;
                  //echo"</br>";
                }
                $nex++;
                //echo"</br>";
           }
           
           
           
                     for($a=0;$a<7;$a++)
          {
            
              $sql="select * from writer where wid=$x[$a] and flag=1 and cityid>0";
//              echo $sql;
              $r=mysqli_query($sql);
             $row=mysqli_fetch_array($r);
             
             if($row!='')
             {
                 $f=$f+1;
              //echo $f;
               
             }
              
          }
           $i=$f;
           for($a=0;$a<49;$a++)
           {
            
              $sql1="select * from writer where wid=$y[$a] and flag=1 and cityid>0";  
              $r1=mysqli_query($sql1);
              $row1=mysqli_fetch_array($r1);
             
              //echo $i;
              if($row1!='')
             {
               $i=$i+1;
              //echo $i;
             }
             
           }
           $j=$i;
           for($a=0;$a<343;$a++)
           {
             
              $sql2="select * from writer where wid= $z[$a] and flag=1 and cityid>0"; 
              $r2=mysqli_query($sql2);
            $row2=mysqli_fetch_array($r2);
             
            if($row2!='')
             {
              $j=$j+1;
              // echo $j;  
               
             }
           }
           $k=$j;
           for($a=0;$a<2401;$a++)
           {
            
              $sql3="select * from writer where wid=$w[$a] and flag=1 and cityid>0";
            
              $r3=mysqli_query($sql3);
            $row3=mysqli_fetch_array($r3);
             
            if($row3!='')
             {
               $k=$k+1;
              // echo $k; 
               
             }
           }
         $kk=$k;
           for($a=0;$a<16807;$a++)
           {
            
              $sql4="select * from writer where wid=$q[$a] and flag=1 and cityid>0";
            
              $r4=mysqli_query($sql4);
            $row4=mysqli_fetch_array($r4);
             
            if($row4!='')
             {
               $kk=$kk+1;
              // echo $k; 
               
             }
           }
                  ?>
          
          
          
<!--                                    //End of New Code-->
<?php
    $sql = "select count(*) as cnts from writer where wid > $id and flag =1 and cityid > 0";
    $r = mysqli_query($sql);
    $rr = mysqli_fetch_array($r);
    
    $c = mysqli_query("select count(*) as cnt from warticle where wid = $id");
    $cc = mysqli_fetch_array($c);

    
?>
<!--Code for Virtual Earning-->

          
<!--                                    //End of New Code-->
<?php
    $vsql = "select count(*) as cnts from writer where wid > $id ";
    $vr = mysqli_query($vsql);
    $vrr = mysqli_fetch_array($vr);
    
    $vc = mysqli_query("select count(*) as cnt from warticle where wid = $id");
    $vcc = mysqli_fetch_array($vc);

    
?>


<!-- End of Virtual Code-->
 <?php
 
 //Transaction Code Star
    $transsql = "select sum(wamt) as totaldebit from trans where trans.wid= $id ";
    $transqr = mysqli_query($transsql);
    $transfetch = mysqli_fetch_array($transqr);
    $totalearn=(($kk)+($ww["cnt"]*1)-($ww["cnt"]));
    $bal=$totalearn-($transfetch["totaldebit"]);
    
                            
if($bal>20){

    if (isset($_REQUEST["wamt"])) {

       $bank = $_REQUEST["bank"];
        
      $account = $_REQUEST["account"];
      $ifsc = $_REQUEST["ifsc"];
        $paymobile = $_REQUEST["mobile"];
        $wamt = $_REQUEST["wamt"];
        $bal=$bal-$wamt;
        $date = date("Y-m-d");
        $sql1 = "insert into trans(date,wamt,amt,bal,wid)values('$date','$wamt','$totalearn','$bal','$id')";
        mysqli_query($sql1);
         $sql = "update writer set bank = '$bank', account = '$account', wamt = '$wamt', paymobile = '$paymobile',ifsc='$ifsc' where wid = $id";
                    if (mysqli_query($sql)) {
                        
                                                echo "<script type='text/javascript'>alert(\"Thank You! Your Request Will Process Soon... \");window.location.href = 'index.php';</script>";
                        
                    }
         
    }
}else
{
    //window.location.href = 'statement.php';
    echo "<script type='text/javascript'>alert(\"Could Not Accept The Request! Balance is not sufficient! ... \");window.location.href = 'index.php';</script>";
}
//Transaction Code End
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
                        <?php
                $dispvsql = "select * from writer where wid= $id ";
    $dispvr = mysqli_query($dispvsql);
    $dispvrr = mysqli_fetch_array($dispvr);
                        if($dispvrr["flag"]==0){
                        ?>
                        <div class="row tile_count">
                            <a href="vwriters.php">    <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                                <span class="count_top"><i class="fa fa-user"></i> Writers</span>
                                <div class="count"><?php echo $vww["vcnt"]; ?></div>

                                </div></a>
                            <a href="vreaders.php">    <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                                <span class="count_top"><i class="fa fa-clock-o"></i> Readers</span>
                                <div class="count"><?php echo $vkk; ?></div>

                                </div></a>
                            <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                                <span class="count_top"><i class="fa fa-user"></i> Contents</span>
                               <div class="count"><?php echo $vcc["vcnt"]; ?></div>

                            </div>

                               <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                                <span class="count_top"><i class="fa fa-user"></i> Virtual Earning(Rs)</span>
                                <div class="count"><?php echo ($vkk*1)+($vww["vcnt"]*1); ?></div>


                            </div>
                        </div>
<?php
    
}elseif($dispvrr["flag"]==1){
    ?>
<div class="row tile_count">
                            <a href="vwriters.php">    <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                                <span class="count_top"><i class="fa fa-user"></i> Writers</span>
                                <div class="count"><?php echo $ww["cnt"]; ?></div>

                                </div></a>
                            <a href="vreaders.php">    <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                                <span class="count_top"><i class="fa fa-clock-o"></i> Readers</span>
                                <div class="count"><?php echo (($kk)-($ww["cnt"])); ?></div>

                                </div></a>
                            <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                                <span class="count_top"><i class="fa fa-user"></i> Contents</span>
                               <div class="count"><?php echo $cc["cnt"]; ?></div>

                            </div>

                               <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                                <span class="count_top"><i class="fa fa-user"></i> Actual Earning(Rs)</span>
                                <div class="count"><?php echo (($kk)+($ww["cnt"]*1)-($ww["cnt"])); ?></div>


                            </div>
                            
                            
                            <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                                <span class="count_top"><i class="fa fa-user"></i> Total Debit(s)(Rs)</span>
                                <div class="count"><?php echo ($transfetch["totaldebit"]); ?></div>


                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                                <span class="count_top"><i class="fa fa-user"></i> Current Bal(Rs)</span>
                                <div class="count"><?php echo  $bal;?></div>


                            </div>
                        </div>
                        
                        <section class="login_content">
            <!--form method="POST" action=''-->
            <form id="demo-form2" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
              <h1>Last Request Pay</h1>
                        <!--div class="col-md-6 col-sm-6 col-xs-12"-->
                        <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Bank Name <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" name="bank" value="<?php echo $bb["bank"]; ?>" class="form-control col-md-7 col-xs-12" placeholder="Bank Name">
                                                        </div>
                                                
                                                    </div>
                                                
                        <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Account Number <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" name="account" value="<?php echo $bb["account"]; ?>"class="form-control col-md-7 col-xs-12" placeholder="Account Number">
                                                        </div>
                                                        
                                                    </div>
                        <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">IFSC <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" name="ifsc" value="<?php echo $bb["ifsc"]; ?>"class="form-control col-md-7 col-xs-12" placeholder="IFSC">
                                                        </div>
                                                        
                                                    </div>
                        
                                    <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mobile <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" name="mobile" value="<?php echo $bb["paymobile"]; ?>" class="form-control col-md-7 col-xs-12" placeholder="PayTm Number">
                                                        </div>
                                                        
                                                    </div>
                                    
                                    <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Withdraw Amount <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" name="wamt" id="wamt" value="<?php echo $bb["wamt"]; ?>"class="form-control col-md-7 col-xs-12" placeholder="Amount">
                                                        </div>
                                                        
                                                    </div>
                                    
                                    
                                    
                                    
                                    <!--<input type="submit" name="pay" class="btn btn-default submit" value="Confirm"> -->
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    </form>
                                    </section>
                                    
<?php
    
}else{}
?>
<div class="row tile_count">
                            <div class="clearfix"></div>
                            <div class="row">


                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                        <h2>Debit Statement</h2>
                                        <hr/>
                                        <div class="x_content">
<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>S.N.</th>
                                                        <th>Date</th>
                                                        <th>Dabit</th>
                                                       <th>Status</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $i = 0;
                                                    $bt = mysqli_query("select * from trans where wid = $id");
                                                    while($bbt = mysqli_fetch_array($bt)) {
                                                        ?>

                                                        <tr>
                                                            <td><?php echo ++$i; ?></td>
                                                            <td><?php echo $bbt["date"] ?></td>
                                                            <td><?php echo $bbt["wamt"] ?></td>
                                                            <?php
                                                            if($bbt["flag"]>0){
                                                                
                                                            ?>
                                                            
                                                            <td>Successful</td>
                                                            <?php
                                                            }else{
                                                            ?>
                                                            <td>Pending</td>
                                                            <?php
                                                            }
                                                            ?>
                                                        </tr>

                                                            <?php } ?>	

                                                </tbody>
                                            </table>
                                            </div>
                                    </div>
                                </div>




                            </div>

                        </div>
<!--Bonus code-->

 <?php
                        
                        if ($ww["cnt"] == 0) {
                        
                       
                            ?>
                            <div class="row">
                                <div class="col-lg-6 col-lg-offset-3">    
                                    <div class="alert alert-success alert-dismissible fade in" style="text-align:center;font-size:15px;color:white" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
<?php if($id==1)
{    ?>                                    
<strong style="font-size:15px"><b>Congratulation Anjana </b></strong>
<?php
} else {
?>
<strong style="font-size:15px"><b>Congratulation And Welcome To Writers Club </b></strong>
<?php
}
?>
                                    </div>
                                </div>
                            </div>
        <?php
    } ?>
<!--End of Bonus code-->
                        <?php
                        $date = date("Y-m-d");
                        $s = mysqli_query("select * from warticle where date='$date' and wid=$id");
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
        $query = mysqli_query("select * from writer inner join topicassign on(writer.cityid=topicassign.cityid)where topicassign.date='$date' and writer.wid=$id ");
        if ($q = mysqli_fetch_array($query)) {
            $topic = $q['topic'];
            $taid = $q['taid'];
            ?>
                                <div class="row">
                                    <div class="col-lg-6 col-lg-offset-3">     
                                        <a href="new_article.php" style="color:white">
                                            <div class="alert alert-danger alert-dismissible fade in" style="text-align:center;font-size:15px;color:white" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                                </button>
                                                <strong style="font-size:15px"><b>Today's Topic is <?php echo $topic; ?></b></strong>
                                            </div>
                                        </a>
                                    </div>
                                </div>
            <?php
        }
    }
    ?>


                        <div class="row">

                            <!--<center>	<img style="width:700px; height:400px;" class="img-responsive" src="images/w3.png"  /> </centeR>-->
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

