<?php
session_start();
if (isset($_SESSION["wid"])){

    include('include/connect.php');

    $id = $_SESSION["wid"];
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
                                                        <th>City</th>
                                                       

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
//                                                    <!--new code-->
                                                                                        
            $sql="select * from writer where wid = $id and flag = 1 and cityid>0; ";
//           print_r($sql);
           $result=  mysqli_query($sql);
           $row=  mysqli_fetch_array($result);
           $n=$row['wid'];
//           echo $n ."<br />";
           $nex=((3 * $n)-1);
//           echo $nex ."<br />";
           $x=array();
           $y=array();
           $z=array();
           $w=array();
           $q=array();
         $x[3];$y[9];$z[27];$w[81];$q[243];
           
           $k=0;$l=0;$m=0;$nn=0;
           for($newa=0;$newa<3;$newa++)
           {
            $x[$newa] =$nex;
//           echo $x[$newa];//234
           
             $nex1=((3 * $nex)-1); 

                for($b=0;$b<3;$b++)
                {
                 $y[$k]=$nex1;//1
//                echo $y[$k];
                 $k++;
                 $nex2=((3*$nex1)-1);
                    for($c=0;$c<3;$c++)
                    {
                        $z[$l]=$nex2;
//                        echo $z[$l];
                        $l++;
                        $nex3=((3 * $nex2)-1);
                            for($d=0;$d<3;$d++)
                            {
                                $w[$m]=$nex3;//2
//                                echo $w[$m];
                                $m++;
                                $nex4=((3 * $nex3)-1);
                                
                                // echo"</br>";
                                for($e=0;$e<3;$e++)
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
           
           
           
                     for($a=0;$a<3;$a++)
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
           for($a=0;$a<9;$a++)
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
           for($a=0;$a<27;$a++)
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
           for($a=0;$a<81;$a++)
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
           for($a=0;$a<243;$a++)
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
                  
                                                                                $sn=0;
										for($a=0;$a<3;$a++)
          {
            
              $sql="select writer.name, city.city from writer inner join city on (writer.cityid = city.cid) where wid=$x[$a] and flag=1 and cityid>0";
              //echo $sql;
              $r=mysqli_query($sql);
             $row=mysqli_fetch_array($r);
             
             if($row!='')
              {
               $sn=$sn+1;
               
             $name=$row['name']; 
             $jdate=$row['city'];
             
             
             ?>

             <tr class="odd gradeX">
                 <td><?php echo $sn;?></td>
		<td><?php echo $name;?></td>
		<td><?php echo $jdate;?></td>
		
               

	</tr>


           <?php   
          }}
          $i=$f;
           for($a=0;$a<9;$a++)
           {
            
              $sql1="select writer.name, city.city from writer inner join city on (writer.cityid = city.cid) where wid=$y[$a] and flag=1 and cityid>0";  
              $r1=mysqli_query($sql1);
              $row1=mysqli_fetch_array($r1);
              
              if($row1!='')
              {
                  $sn=$sn+1;
              $name=$row1['name']; 
             $jdate=$row1['city'];
            
              
             ?>
            <tr class="odd gradeX">
                 <td><?php echo $sn;?></td>
		<td><?php echo $name;?></td>
		<td><?php echo $jdate;?></td>
		
	</tr>
          <?php
           }}
             $j=$i;
           for($a=0;$a<27;$a++)
           {
             
              $sql2="select writer.name, city.city from writer inner join city on (writer.cityid = city.cid) where wid=$z[$a] and flag=1 and cityid>0"; 
              $r2=mysqli_query($sql2);
            $row2=mysqli_fetch_array($r2);
             if($row2!='')
              {
                 $sn=$sn+1;
            $name=$row2['name']; 
             $jdate=$row2['city'];
             
           
             ?>
            <tr class="odd gradeX">
                 <td><?php echo $sn;?></td>
		<td><?php echo $name;?></td>
		<td><?php echo $jdate;?></td>
		
	</tr>
           <?php
             }   }
             $f=$j;
           for($a=0;$a<81;$a++)
           {
            
              $sql3="select writer.name, city.city from writer inner join city on (writer.cityid = city.cid) where wid=$w[$a] and flag=1 and cityid>0";
            
              $r3=mysqli_query($sql3);
            $row3=mysqli_fetch_array($r3);
             if($row3!='')
              {
                 $sn=$sn+1;
             $name=$row3['name']; 
             $jdate=$row3['city'];
             
              
             ?>
            <tr class="odd gradeX">
                 <td><?php echo $sn;?></td>
		<td><?php echo $name;?></td>
		<td><?php echo $jdate;?></td>
		
	</tr>
          <?php
           }}
         
         
           for($a=0;$a<243;$a++)
           {
            
              $sql4="select writer.name, city.city from writer inner join city on (writer.cityid = city.cid) where wid=$q[$a] and flag=1 and cityid>0";
            
              $r4=mysqli_query($sql4);
            $row4=mysqli_fetch_array($r4);
             if($row4!='')
              {
                 $sn=$sn+1;
             $name=$row4['name']; 
             $jdate=$row4['city'];
                          
             ?>
            <tr class="odd gradeX">
                 <td><?php echo $sn;?></td>
		<td><?php echo $name;?></td>
		<td><?php echo $jdate;?></td>
		
	</tr>
          <?php
           }}
         ?>
                                                                              
                                                
                                                
                                                <!--end of new code-->
                                                
                                                </tbody>
                                            </table>

                                                   
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

