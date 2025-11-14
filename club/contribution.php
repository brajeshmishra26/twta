<!DOCTYPE html>
<html>
<body>
<?php
session_start();
include('include/connect.php');

// Assuming $id and $module_id are already set in the session
$id = $_SESSION['user_id'];
if (isset($_SESSION['selected_module_id'])) {
        
$module_id = $_SESSION['selected_module_id'];

// Determine the target table based on module_id
switch ($module_id) {
    case 1:
        $target_table = "demo_module";
        break;
    case 2:
        $target_table = "whatsapp_module";
        break;
    case 3:
        $target_table = "youtube_module";
        break;
    case 4:
        $target_table = "insta_module";
        break;
    case 5:
        $target_table = "facebook_module";
        break;
    case 6:
        $target_table = "email_module";
        break;
    case 7:
        $target_table = "demowhatsapp_module";
        break;
    case 8:
        $target_table = "website_module";
        break;
    default:
        echo "Invalid module_id.";
        exit();
}
$n=16;
$originaln=$n;
for($i=0;$i<7;)
{
    $n1=($n+5);
    $n2=$n1/7;
    
    $n=intval($n2);
    
    if(intval($n)==0)
    {
        $i=7;
        
    }  else {
    $i=$i+1;    
    }
$date = date("Y-m-d");
                                $aa = "insert into virtual_member (user_id, virtual_id, module_id) values ('$n', '$originaln', '$module_id')";
                               
                               if(mysqli_query($link,$aa))
                               
                               {
                               echo "<script type='text/javascript'>alert(\"Registered Successfully... \");</script>";	}
   echo $n;
?>
<br>
<?php
}}
?>  

</body>
</html>
