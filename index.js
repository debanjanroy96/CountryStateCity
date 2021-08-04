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