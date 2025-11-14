<?php
include('include/connect.php');
if(!empty($_POST["statecode"])) 
{
$statecode=$_POST["statecode"];
$query1 =mysqli_query($link,"SELECT city.city_id as city_id,city.city_name FROM city 
	join state on state.state_id=city.state_id 
	 
	WHERE city.state_id = '$statecode'");
?>
<option value="">Select City</option>
<?php
while($row1=mysqli_fetch_array($query1))  
{
?>
<option value="<?php echo $row1["city_id"]; ?>"><?php echo $row1["city_name"]; ?></option>
<?php
}
}
?>
<!--join country on country.id=city.countryid-->