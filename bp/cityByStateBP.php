<?php require_once("../dbconnect.php") ?>
<?php require_once("../function.php") ?>
<?php 
	$state_id=$_POST['s'];
	$list_city = listCityByState($state_id);
?>
	<option value="">Select City</option>
<?php	

	foreach($list_city as $city)
	{
	?>
	<option value="<?php echo $city['city_id'];?>"><?php echo $city['city_name'];?></option>
	<?php
	}
?>