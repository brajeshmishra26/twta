<?php
include('include/header.php');
include('include/connect.php');

?>
<!--Govt Order-->
<br><br>
                                        
                                        <div >
<h3 align="center">Order List</h3>
       <br><br>                                     
    <?php
    mysqli_set_charset('utf8');
    if(isset($_GET['cid1'])){
				
				$cid1=$_GET['cid1'];
				
				}
    $i = 0;
    $b = mysqli_query("SELECT * from topicassign where cityid = $cid1 order by taid desc");
    while ($bb = mysqli_fetch_array($b)) {
        ?>

       <li><?php echo ++$i; ?> &emsp;  <a href="admin/topicimg/<?php echo $bb["image"] ?>" > <?php echo $bb["topic"] ?> </a> &nbsp; :-दिनांक : <?php echo $bb["date"] ?></li><br>
                    <?php } ?>	

                                              

   
                                        </div>
<br><br><br><br>

<!--//Govt Order-->

    <?php
include('include/footer.php');
?>
