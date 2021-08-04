<?php require_once("dbconnect.php") ?>
<?php require_once("function.php") ?>
<?php 
$list_country = listCountry();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>City Country State</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
	<div class="container">
		<div class="row">
			<from id="">
				<div class="form-group">
					<select class="custom-select" id="country">
					<option>Select Country</option>
					<?php
					foreach($list_country as $country)
					{
						echo $country;
					?>
						<option value="<?php echo $country["country_id"]; ?>"><?php echo $country["country_name"]; ?></option>	
					<?php
					}	
				    ?>	
					</select>
				</div>
				
				<div class="form-group">
					<select class="custom-select" id="state">
						<option value="">Select State</option>
					</select>
				</div>
				
				<div class="form-group">
					<select class="custom-select" id="city">
						<option value="">Select City</option>
					</select>
				</div>
			</from>
		</div>
	</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> 
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> 

<!--<script src="index.js"></script>-->
	<script>
	// JavaScript Document
$(document).ready(function() {
	$("#country").on("change",function() {
		var country = $("#country").val();
		if(country)
		{
			$.ajax({
				url:"bp/stateByCountryBP.php",
				data:{c:country},
				type:"POST",
				success:function(response) {
					$("#state").html(response);
					var state = $("#state").val();
					var city = $("#city").val();
					var output = {};
					if(country && state && city)
					{
						$.ajax({
							url:"bp/SelectOptionBP.php",
							data:{
								country:country,
								state:state,
								city:city
							},
							type:"POST",
							dataType:"JSON",
							success:function(respose) {
								console.log(respose)
							}
						})
					}
				}
			})
		}
	})
	$("#state").on("change",function() {
		var state = $("#state").val();
		if(state)
		{
			$.ajax({
				url:"bp/cityByStateBP.php",
				data:{s:state},
				type:"POST",
				success:function(response) {
					$("#city").html(response);
					var country = $("#country").val();
					var city = $("#city").val();
					if(country && state && city)
					{
						$.ajax({
							url:"bp/SelectOptionBP.php",
							data:{
								country:country,
								state:state,
								city:city
							},
							type:"POST",
							dataType:"JSON",
							success:function(respose) {
								console.log(respose)
							}
						})
					}
				}
			})
		}
	})
	$("#city").on("change",function() {
		var country = $("#country").val();
		var state = $("#state").val();
		var city = $("#city").val();
		if(country && state && city)
		{
			$.ajax({
				url:"bp/SelectOptionBP.php",
				data:{
					country:country,
					state:state,
					city:city
				},
				type:"POST",
				dataType:"JSON",
				success:function(respose) {
					console.log(respose)
				}
			})
		}
	})
})
	</script>
	
</body>
</html>