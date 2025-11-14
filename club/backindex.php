<?php
session_start();
if (isset($_SESSION["user_id"])) {

    $id = $_SESSION["user_id"];
    include('include/connect.php');

    $w = mysqli_query($link,"select count(*) as cnt from writer where refid = $id and flag =1 and cityid > 0");
    $ww = mysqli_fetch_array($w);
    
    
                                    
            $sql="select * from writer where wid = $id and flag = 1 and cityid>0; ";
//           print_r($sql);
           $result=  mysqli_query($link,$sql);
           $row=  mysqli_fetch_array($result);
           $n=$row['wid'];
//           echo $n ."<br />";
           $nex=(2 * $n);
//           echo $nex ."<br />";
           $x=array();
           $y=array();
           $z=array();
           $w=array();
           $q=array();
         $x[2];$y[4];$z[8];$w[16];$q[32];
           
           $k=0;$l=0;$m=0;$nn=0;$f=0;
           for($newa=0;$newa<2;$newa++)
           {
            $x[$newa] =$nex;
          // echo $x[$newa];//234
           
             $nex1=(2 * $nex); 

                for($b=0;$b<2;$b++)
                {
                 $y[$k]=$nex1;//1
//                echo $y[$k];
                 $k++;
                 $nex2=(2*$nex1);
                    for($c=0;$c<2;$c++)
                    {
                        $z[$l]=$nex2;
//                        echo $z[$l];
                        $l++;
                        $nex3=(2 * $nex2);
                            for($d=0;$d<2;$d++)
                            {
                                $w[$m]=$nex3;//2
//                                echo $w[$m];
                                $m++;
                                $nex4=(2 * $nex3);
                                
                                // echo"</br>";
                                for($e=0;$e<2;$e++)
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
           
           
           
                     for($a=0;$a<2;$a++)
          {
            
              $sql="select * from writer where wid=$x[$a] and flag=1 and cityid>0 and payflag=1";
//              echo $sql;
              $r=mysqli_query($link,$sql);
             $row=mysqli_fetch_array($r);
             
             if($row!='')
             {
                 $f=$f+1;
              //echo $f;
               
             }
              
          }
           $i=$f;
           for($a=0;$a<4;$a++)
           {
            
              $sql1="select * from writer where wid=$y[$a] and flag=1 and cityid>0 and payflag=1";  
              $r1=mysqli_query($link,$sql1);
              $row1=mysqli_fetch_array($r1);
             
              //echo $i;
              if($row1!='')
             {
               $i=$i+1;
              //echo $i;
             }
             
           }
           $j=$i;
           for($a=0;$a<8;$a++)
           {
             
              $sql2="select * from writer where wid= $z[$a] and flag=1 and cityid>0 and payflag=1"; 
              $r2=mysqli_query($link,$sql2);
            $row2=mysqli_fetch_array($r2);
             
            if($row2!='')
             {
              $j=$j+1;
              // echo $j;  
               
             }
           }
           $k=$j;
           for($a=0;$a<16;$a++)
           {
            
              $sql3="select * from writer where wid=$w[$a] and flag=1 and cityid>0 and payflag=1";
            
              $r3=mysqli_query($link,$sql3);
            $row3=mysqli_fetch_array($r3);
             
            if($row3!='')
             {
               $k=$k+1;
              // echo $k; 
               
             }
           }
         $kk=$k;
           for($a=0;$a<32;$a++)
           {
            
              $sql4="select * from writer where wid=$q[$a] and flag=1 and cityid>0 and payflag=1";
            
              $r4=mysqli_query($link,$sql4);
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
    $r = mysqli_query($link,$sql);
    $rr = mysqli_fetch_array($r);
    
    $c = mysqli_query($link,"select count(*) as cnt from warticle where wid = $id");
    $cc = mysqli_fetch_array($c);

    $dirv = mysqli_query($link,"select count(*) as cnt from writer where refid = $id and payflag=1");
    $dirvv = mysqli_fetch_array($dirv);
    
    $dirv1 = mysqli_query($link,"select count(*) as cnt1 from writer where ref1 = $id");
    $dirvv1 = mysqli_fetch_array($dirv1);
    
    $dirv2 = mysqli_query($link,"select count(*) as cnt2 from writer where ref2 = $id");
    $dirvv2 = mysqli_fetch_array($dirv2);
?>
<!--Code for Virtual Earning-->

          
<!--                                    //End of New Code-->
<?php
    $vsql = "select count(*) as cnts from writer where wid > $id ";
    $vr = mysqli_query($link,$vsql);
    $vrr = mysqli_fetch_array($vr);
    
    $vc = mysqli_query($link,"select count(*) as cnt from warticle where wid = $id");
    $vcc = mysqli_fetch_array($vc);

    
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
                $dispvsql = "select * from writer where wid= $id ";
    $dispvr = mysqli_query($link,$dispvsql);
    $dispvrr = mysqli_fetch_array($dispvr);
                        if($dispvrr["flag"]==0){
                        ?>
                        <div class="row tile_count">
                            <a href="vwriters.php">    <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                                <span class="count_top"><i class="fa fa-user"></i> Direct</span>
                                <div class="count" title="Click To See Detail"><?php echo $vww["vcnt"]; ?></div>

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
                                <div class="count"><?php echo ($vkk*1)+($vww["vcnt"]*1); ?></div>


                            </div>
                        </div>
<?php
    
}elseif($dispvrr["flag"]==1){
    ?>
<div class="row tile_count">
    <a href="direct.php">    <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                                <span class="count_top"><i class="fa fa-user"></i> Direct</span>
                                <div class="count" title="Click To See Detail"><?php echo $dirvv["cnt"]; ?></div>

                                </div></a>
                            <a href="level1.php">    <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                                <span class="count_top"><i class="fa fa-clock-o"></i> Level1</span>
                                <div class="count"><?php echo $f; ?></div>

                                </div></a>
                            <a href="level2.php"><div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                                <span class="count_top"><i class="fa fa-user"></i> Level2</span>
                               <div class="count"><?php echo $i-$f; ?></div>

                                </div></a>
<a href="level3.php"><div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                                <span class="count_top"><i class="fa fa-user"></i> Level3</span>
                               <div class="count"><?php echo $j-$i; ?></div>

                                </div></a>
                               <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                                <span class="count_top"><i class="fa fa-user"></i> Total AP</span>
                                <div class="count"><?php echo ((($dirvv["cnt"])*2)+($i-$f)+(($j-$i)*5)) ?></div>


                            </div>
                        </div>
<?php
    
}else{}
?>
<!--Bonus code-->

 <?php
                        
                        if ($cc["cnt"] == 0) {
                        
                       
                            ?>
                            <div class="row">
                                <div class="col-lg-6 col-lg-offset-3">    
                                    <div class="alert alert-success alert-dismissible fade in" style="text-align:center;font-size:15px;color:white" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
<?php if($dispvrr["level1"]==1)
{    ?>                                    
<strong style="font-size:15px"><b><a href="../sharmaDepartmental.php">Your Reward is Ready</a></b></strong>
<?php
} else {
?>
<strong style="font-size:15px"><b>Congratulation And Welcome To myVita </b></strong>
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
                        $s = mysqli_query($link,"select * from warticle where date='$date' and wid=$id");
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
        $query = mysqli_query($link,"select * from writer inner join topicassign on(writer.cityid=topicassign.cityid)where topicassign.date='$date' and writer.wid=$id ");
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

