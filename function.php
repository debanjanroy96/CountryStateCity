<?php
function listCountry()
{
	$con = $GLOBALS['con'];
	$arr=array();
	$sql="select * from country";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	if(mysqli_num_rows($res)>0)
	{
		while($row=mysqli_fetch_assoc($res))
		{
			$arr[$row['country_id']]=$row;		
		}
	}
	return $arr;
}
function listStateByCountry($country_id=0)
{
	$con = $GLOBALS['con'];
	$arr=array();
	$sql="select * from state where country_id='".$country_id."'";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	if(mysqli_num_rows($res)>0)
	{
		while($row=mysqli_fetch_assoc($res))
		{
			$arr[$row['state_id']]=$row;		
		}
	}
	return $arr;
}
function listCityByState($state_id=0)
{
	$con = $GLOBALS['con'];
	$arr=array();
	$sql="select * from city where state_id='".$state_id."'";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	if(mysqli_num_rows($res)>0)
	{
		while($row=mysqli_fetch_assoc($res))
		{
			$arr[$row['city_id']]=$row;		
		}
	}
	return $arr;
}

function getCountry($country_id=0)
{
	$con = $GLOBALS['con'];
	$sql="select * from country where country_id='".$country_id."'";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	if(mysqli_num_rows($res)>0)
	{
		$row=mysqli_fetch_assoc($res);
	}
	return $row;
}
function getState($state_id=0)
{
	$con = $GLOBALS['con'];
	$sql="select * from state where state_id='".$state_id."'";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	if(mysqli_num_rows($res)>0)
	{
		$row=mysqli_fetch_assoc($res);
	}
	return $row;
}
function getCity($city_id=0)
{
	$con = $GLOBALS['con'];
	$sql="select * from city where city_id='".$city_id."'";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	if(mysqli_num_rows($res)>0)
	{
		$row=mysqli_fetch_assoc($res);
	}
	return $row;
}
?>