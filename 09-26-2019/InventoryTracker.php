<html>
<head>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Oxygen|PT+Sans|Ubuntu&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>

<center><body style="font-family: 'Oxygen', sans-serif;">

	<?php
	//	require "NavigationBar.php"
	?>
	<br>
	<div class="container col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
	
		<br><h3 style="font-size:4rem;">Inventory Track Page</h3><br>

		<hr><br>
		
		<div class="col-12">
		
			<div class="row">
				
				<form class="w-100" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<input class="col-10 form-control mb-4" placeholder="Search.." name="search"></input>
					&nbsp;
					<button style="max-height: 2.4rem;" class="btn" name="searchInventory" type="submit"><i style="color: #FFC222" class="fas fa-search"></i>&nbsp Search</button><br><br><br>
				</form>
			</div>
			<div class="row">
				<?php
					include_once 'connection.php';
					
					if (isset($_POST["searchInventory"])) {
						$query = $_POST['search']; 	// Stores Query
			 			$min_length = 3; 			// Restrict Query Size
						
						if (strlen($query) >= $min_length) {
							$query = htmlspecialchars($query); // Remove / Update Special Chars
							
							$query = mysqli_real_escape_string($conn, $query); 
							
							$db_query = "SELECT * FROM showcase_inventory WHERE (P_Name LIKE '%$query%' OR P_Description LIKE '%$query%' OR Add_Info LIKE '%$query%')";
							
							$raw_results = mysqli_query($conn, $db_query);
								
							if (mysqli_num_rows($raw_results) > 0) {
								while ($results = mysqli_fetch_array($raw_results)) {
									echo $results["P_Name"]."<br>";
									echo $results["P_Description"]."<br>";
									echo $results["P_Price"]."<br>";
									echo $results["P_Quantity"]."<br>";
									echo $results["Add_Info"]."<br><br>";
									
								}
							} else {
								echo "No results";
							}
						} else {
							echo "Minimum length is ".$min_length;
						}
					}
				?>
			</div>
		</div>
		
			<div class=""container>
			<b><h5>Company: </h5></b>
			<select name="selectCompany" class="col-6 form-control mb-4">
				<option>Company</option>
				<?php
				
				include_once 'connection.php';
				
				$getCompanies = "SELECT V_Name FROM showcase_vendors";
				$companyNames = mysqli_query($conn, $getCompanies);

				if (mysqli_num_rows($companyNames) > 0) {
					while($row = mysqli_fetch_assoc($companyNames)) {
						echo "<option>{$row["V_Name"]}</option>";
					}
				} else {
					echo "0 results";
				}
			
				?>
			</select>&nbsp

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
