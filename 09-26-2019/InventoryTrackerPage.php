<html>



<head>
	<link href="css/style.css" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Oxygen|PT+Sans|Ubuntu&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>

<center><body style="font-family: 'Oxygen', sans-serif;">

	<?php

		require "NavigationBar.php";

	?>
	<br>
	<div class="container col-12 col-sm-12 col-md-10 col-lg-10 col-xl-6">

		<br>
		<h3 style="font-size:4rem;">Inventory Tracking</h3>
		<h4>Point of Sales</h4>
		<br>

		<hr>
		<br>
		<div class="col-12">
			<div class="row">
				<b><h5>Search Item Name:</h5></b>
				<div class="input-group">
				  <input type="text" class="form-control" placeholder="Search" aria-label="SearchInput" aria-describedby="SearchButton" id="SearchInput">
				  <div class="input-group-append">
				    <button class="input-group-text btn btn-dark" id="SearchButton"><i style="color:#FFC222"; class="fas fa-search"></i>&nbsp Search</button>
				  </div>
				</div>
			</div>
		</div>
<br><br>

<div id="OrSection" class="col-12">
	<h5><span>OR</span></h5>
</div>
<br>
		<div>
			<b><h5>Company: </h5></b>
			<select name="selectCompany" class="col-12 col-md-6 form-control mb-4">
			<option></option>
			<option>This will be generated by php</option>
			</select>
		</div>

		<button class="btn" name="submit" id="submitButton"><i style="color: #FFC222" class="far fa-check-square"></i>&nbsp Submit</button>

	</div>

</body></center>

<style>

#submitButton {
    position: fixed-bottom;

}

.btn {
	background-color: #606060;
	color: white;
}

</style>


	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
</html>