<?php
//if session id does not match then sends back to login page?
  require 'header.php';
  if (!isset($_SESSION['uid']))
      header("Location: T_login.php?error=SessionMissing");

?>

<html>
	<head>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans|Oxygen|PT+Sans|Ubuntu&display=swap" rel="stylesheet">

	</head>

  <?php
    require 'NavigationBar.php';
  ?>

	<body class="mb-3" style="font-family: 'Oxygen', sans-serif;">
	</br><br>
		<center><h3 style="font-size:4rem;">Content Management Page</h3></center>
		</br>
		<div class="container col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
			<hr>
			<br><br>
			<button class="btn col-12" style="font-family: 'Open Sans', sans-serif;" type="button" name="button" data-toggle="collapse" data-target="#vendorAdd" aria-expanded="false" aria-controls="vendorAdd"><h2><i style="color: #FFC222" class="fas fa-user-plus"></i> &nbsp Add a vendor</h2></button>
			<div class="collapse" id="vendorAdd">
				<br>

        <?php
        if (isset($_GET['error'])) {
          if ($_GET['error']== "emptyfields") {
            echo '<p>Fill in all fields!</p>';
          }
        }
        else if (isset($_GET['']) && $_GET['']== "success") {
          echo '<p> Addition success!</p>';
        }
     ?>

				<form class="" action="Includes/AdIn.inc.php" method="post">
          <b><h5>Vendor Name: &nbsp</h5></b>
					<?php
          echo '<input class="form-control mb-4" name="V_Name" placeholder="Enter Vendor Name" ></input>';
          ?>
          <b><h5>Vendor Phone: &nbsp</h5></b>
          <?php
          echo '<input class="form-control mb-4" name="V_Phone" placeholder="Enter Vendor Phone" ></input>';
          ?>

          <b><h5>Vendor Email: &nbsp</h5></b>
          <?php
          echo '<input class="form-control mb-4" name="V_Email" placeholder="Enter Vendor Email" ></input>';
          ?>

          <div class="w-100 d-flex justify-content-end">
            <?php
						echo '<button name="vendor-submit" class="btn">Submit</button>';
            ?>
          </div>
				</form>
			</div>
			<br><br>
			<button class="btn col-12" style="font-family: 'Open Sans', sans-serif;" type="button" name="button" data-toggle="collapse" data-target="#productAdd" aria-expanded="false" aria-controls="productAdd"><h2><i style="color: #FFC222" class="fas fa-cart-plus"></i> &nbsp Add a Product</h2></button>
			<div class="collapse" id="productAdd">
				<br>
        <form class="" action="Includes/AdIn.inc.php" method="post"><!--Do I need this here???-->
					<div class="form-group col-12">

            <b><h5>Vendor Name: &nbsp</h5></b>
            <?php
                require 'Includes/CTDB.inc.php';
            echo '<select class="form-control mb-4" name="V_Name" placeholder="Enter Vendor Name" >';

            $sql = mysqli_query($conn, "SELECT V_ID,V_Name FROM Showcase_Vendors");
            while ($row = $sql->fetch_assoc()){
              echo "<option value= \"{$row['V_ID']}\">";
              echo $row['V_Name'];
              echo"</option>";
            }
            echo'</select>'
            ?>

            <b><h5>Product ID: &nbsp</h5></b>
            <?php
            echo '<input class="form-control mb-4" name="P_ID" placeholder="Enter Product ID"></input>';
            ?>

            <b><h5>Product Name: &nbsp</h5></b>
            <?php
            echo '<input class="form-control mb-4" name="P_Name" placeholder="Enter Product Name" required="true"></input>';
            ?>

            <b><h5>Product Description: &nbsp</h5></b>
            <?php
            echo '<input class="form-control mb-4" name="P_Description" placeholder="Enter Product Type"></input>';
            ?>

            <b><h5>Product Price: &nbsp</h5></b>
            <?php
            echo '<input class="form-control mb-4" name="P_Price" placeholder="Enter Product Price"></input>';
            ?>

            <b><h5>Product Quantity: &nbsp</h5></b>
            <?php
            echo '<input class="form-control mb-4" name="P_Quantity" placeholder="Enter Product Count"></input>';
            ?>

            <b><h5>Addtional Information: <small style=" font-size:0.75rem; font-style:italic;">(Not Required)</small> &nbsp</h5></b>
            <?php
            echo '<input class="form-control mb-4" name="Add_Info" placeholder="Enter Additional Information"></input>';
            ?>

						<div class="w-100 d-flex justify-content-end">
              <?php
							echo '<button name="inventory-submit" class="btn">Submit</button>';
              ?>
						</div>
					</div>
				</form>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>

	<style>
		.btn {
			background-color: #606060;
			color: white;
		}
	</style>

</html>
