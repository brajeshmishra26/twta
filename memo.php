<?php
include('include/header.php');
include('include/connect.php');

?>
<!--Govt Order-->
<br><br>
                                        
                                        <div >
<h3 align="center">Memorandum</h3>
       <br><br>                                     
    <?php
    mysqli_set_charset('utf8');
    $i = 0;
    $b = mysqli_query("SELECT * from topicassign where cityid = 4 order by taid desc");
    while ($bb = mysqli_fetch_array($b)) {
        ?>

    <li><?php echo ++$i; ?> &emsp;  <a href="admin/topicimg/<?php echo $bb["image"] ?>" > <?php echo $bb["topic"] ?></a></li><br>
                    <?php } ?>	

                                              

   
                                        </div>
<br><br><br><br>

<!--//Govt Order-->

    <?php
include('include/footer.php');
?>
