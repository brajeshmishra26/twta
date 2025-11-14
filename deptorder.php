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
    mysqli_set_charset($link,'utf8');
    if(isset($_GET['subid'])){
				
				$subid1=$_GET['subid'];
				
				}
    $i = 0;
    if($subid1==16){
        $b = mysqli_query($link,"SELECT * from topicassign where cityid =1 order by taid desc");
    }elseif ($subid1==17) {
        
    $b = mysqli_query($link,"SELECT * from topicassign where cityid = 5 order by taid desc");
}  else {
    $b = mysqli_query($link,"SELECT * from topicassign where subid = $subid1 order by taid desc");
}
    
    while ($bb = mysqli_fetch_array($b)) {
        ?>

    <li><?php echo ++$i; ?> &emsp;  <a href="admin/topicimg/<?php echo $bb["image"] ?>" > <?php echo $bb["topic"] ?></a>&nbsp; :-दिनांक : <?php echo $bb["date"] ?></li><br>
                    <?php } ?>	

                                              

   
                                        </div>
<br><br><br><br>

<!--//Govt Order-->

    <?php
include('include/footer.php');
?>
