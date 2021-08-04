<?php require_once("../dbconnect.php") ?>
<?php require_once("../function.php") ?>
<?php 
	$country_id=$_POST['c'];
	$list_State = listStateByCountry($country_id);
?>
	<option value="">Select State</option>
<?php	
	foreach($list_State as $state)
	{
	?>
	<option value="<?php echo $state['state_id'];?>"><?php echo $state['state_name'];?></option>
	<?php
	}
?>