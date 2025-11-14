<?php session_start(); ?>
<?php
include('include/header.php');
        
        include('include/connect.php');
       
  ?>		
<?php
$wid=$_SESSION["wid"];        
echo "we are";
echo $wid;
    mysqli_set_charset('utf8');
    if(isset($_GET['pay'])){
				
				$paytype=$_GET['pay'];
				
				}
				
                                mysqli_set_charset('utf8');
					$query=mysqli_query("select * from membership where tmobile=$paytype");
					$a=mysqli_fetch_array($query);
                                        $name=$a['tname'];
                                        $flag=$a['flag'];
						
						$type=$a['tpaytype'];
						
                        
			
					
                                if($type==1 AND $flag==0){
                                ?>
                                
                                
<script>window.location.href="https://rzp.io/l/paytwta"; </script>
                                    <?php }elseif(($type==2 AND $flag==0)){ ?>    
<script>window.location.href="https://rzp.io/l/paytwta5"; </script>
<?php
}else{
    ?>
<script>window.location.href="https://rzp.io/l/paytwta0"; </script>
    <?php
                                     }
        include('include/footer.php');
       
        ?>		
                    