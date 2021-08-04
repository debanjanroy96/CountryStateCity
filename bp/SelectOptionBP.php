<?php header('Content-type: application/json');  ?>
<?php require_once("../dbconnect.php") ?>
<?php require_once("../function.php") ?>
<?php 
	$country_id=$_POST['country'];
	$state_id=$_POST['state'];
	$city_id=$_POST['city'];
	$country = getCountry($country_id);
	$state = getState($state_id);
	$city = getCity($city_id);
	echo json_encode (array('counrty' => $country['country_name'], 'state' => $state['state_name'], 'city' => $city['city_name']));
?>