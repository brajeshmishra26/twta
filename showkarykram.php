<?php session_start(); ?>
<?php
include('include/header.php');
include('include/connect.php');
mysqli_set_charset($link,'utf8');
?>
<!DOCTYPE html>
<html>
<title>आगामी कार्यक्रम </title>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

</head>
<body>
<br><br><br><br>
<h2 align=center>आगामी कार्यक्रम </h2>
<br><br>
<table>
  <tr>
    <th>क्र.</th>
    <th>दिनांक </th>
    <th>विषय </th>
    <th>स्थान </th>
    <th>संदर्भ </th>
    
  </tr>
  <?php
  $s = 0;	
$sqlk = mysqli_query($link,"select * from karykram order by kid desc");
while($bb = mysqli_fetch_array($sqlk)){	
                                                                    
   mysqli_set_charset($link,'utf8');
        $topic = $bb["topic"];
        $descr=$bb["descr"];
        $kdate=$bb["kdate"];
        $place = $bb["place"];
        $s++;
  ?>
 <tr>
    <td><?php echo $s ?></td>
    <td><?php echo $kdate ?></td>
    <td><?php echo $topic ?></td>
    <td><?php echo $place ?></td>
    <td><?php echo $descr ?></td>
  </tr>
 <?php                                                            
} 
?>
</table>

</body>
</html>


