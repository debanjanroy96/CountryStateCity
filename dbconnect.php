<?php

$dbuser="root";
$dbpass="";
$dbname="geodata";
$con = mysqli_connect("localhost",$dbuser,$dbpass,$dbname) or die(mysqli_error($con));
if($con)
{
	$GLOBALS['con']=$con;
}

?>