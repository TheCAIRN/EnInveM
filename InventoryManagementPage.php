<?php
    require "header.php";
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

<body class="mb-3 overflow-lock" style="font-family: 'Oxygen', sans-serif;">
    <br>
    <br>
    <center>
        <h3 style="font-size:4rem;">Inventory Management</h3>
    </center>
    <br>
    <div class="container col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <hr>
        <br>
        <br>
        <button class="btn col-12" style="font-family: 'Open Sans', sans-serif;" type="button" name="button" data-toggle="collapse" data-target="#vendorAdd" aria-expanded="false" aria-controls="vendorAdd">
            <h2>
                <i style="color: #FFC222" class="fas fa-user-plus"></i> 
                &nbsp; Add a vendor
            </h2>
        </button>
    <div class="collapse" id="vendorAdd">
        <br>
        <form id="form-vendor-add"" class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <b><h5>Vendor Name: </h5></b>
            <input class="form-control mb-4" name="V_Name" placeholder="Enter Vendor Name" required="true"/>

            <b><h5>Vendor Number: <i><small style="font-size:0.75rem;"> (Format: 123-456-7890)</small></i></h5></b>
            <input class="form-control mb-4" name="V_Number" placeholder="Enter Vendor Phone Number" type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"/>

            <b><h5>Vendor Email: </h5></b><input class="form-control mb-4" name="V_Email" placeholder="Enter Vendor Phone Email" required="true" type="email"/>
            
            <div class="w-100 d-flex justify-content-end">
                <button name="vendor-submit" class="btn">Submit</button>
            </div>
        </form>

        <?php
            include "./includes/CTDB.inc.php";
            $query_processed = "";

            if (isset($_POST['vendor-submit'])) {
                $v_name = $_POST['V_Name']; 
                $v_number = $_POST['V_Number'];
                $v_email = $_POST['V_Email'];
                
                $stmt = mysqli_stmt_init($conn);
                $insert_vendor = "INSERT INTO `showcase_vendors`(`V_Name`, `V_Phone`, `V_Email`) VALUES (?, ?, ?);";

                mysqli_stmt_prepare($stmt, $insert_vendor);
                mysqli_stmt_bind_param($stmt, "sss", $p1, $p2, $p3);

                $p1 = $v_name;
                $p2 = $v_number;
                $p3 = $v_email;

                if (mysqli_stmt_execute($stmt)) {
                    $query_processed = "New Vendor Added Successfully";
                } else {
                    echo "Error: ".$insert_vendor."<br>".mysqli_error($conn);
                }
                mysqli_stmt_close($stmt);
            }
            mysqli_close($conn);
        ?>
    </div>
<br>
<br>

<button class="btn col-12" style="font-family: 'Open Sans', sans-serif;" type="button" name="button" data-toggle="collapse" data-target="#productAdd" aria-expanded="false" aria-controls="productAdd">
    <h2>
        <i style="color: #FFC222" class="fas fa-cart-plus"></i> 
        &nbsp; Add a Product
    </h2>
</button>

<div class="collapse" id="productAdd">
    <br>
    <form id="form-product-add" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group col-12">
            <!--<b><h5>Vendor ID: &nbsp</h5></b><input class="form-control mb-4" name="V_ID" placeholder="Enter Vendor ID"></input>-->
            <b><h5>Vendor Name: &nbsp</h5></b>
            <select id="form-product-add-select" class="form-control mb-4" name="V_Name" placeholder="Enter Vendor Name" required="true">
                <option value="">Select A Company</option>
                <?php
                    include './includes/CTDB.inc.php';
                    
                    $getCompanies = "SELECT V_ID, V_Name FROM showcase_vendors";
                    $companyNames = mysqli_query($conn, $getCompanies);

                    if (mysqli_num_rows($companyNames) > 0) {
                        while($row = mysqli_fetch_assoc($companyNames)) {
                            $option_id = $row["V_ID"];
                            echo "<option value='$option_id'>{$row["V_Name"]}</option>";
                        }
                    } else {    
                        echo "0 results";
                    }
                    mysqli_close($conn); 
                ?>
            </select>
            <!--<b><h5>Product ID: &nbsp</h5></b><input class="form-control mb-4" name="P_ID" placeholder="Enter Product ID"></input>-->

            <b><h5>Product Name: &nbsp;</h5></b>
            <input class="form-control mb-4" name="P_Name" placeholder="Enter Product Name" required="true"/>

            <b><h5>Product Description: &nbsp;</h5></b>
            <input class="form-control mb-4" name="P_Description" placeholder="Enter Product Type" required="true"/>

            <b><h5>Product Price: &nbsp;</h5></b>
            <input type="number" min="0" step='0.01' placeholder='0.00' class="form-control mb-4" name="P_Price" required="true"/>

            <b><h5>Product Quantity: &nbsp</h5></b>
            <input min="0" class="form-control mb-4" name="P_Quantity" placeholder="Enter Product Count" required="true" type="number"/>

            <b><h5>Addtional Information: <small style=" font-size:0.75rem; font-style:italic;">(Not Required)</small> &nbsp;</h5></b>
            <textarea rows="3" class="form-control mb-4" name="Add_Info" placeholder="Enter Additional Information"></textarea>

            <div class="w-100 d-flex justify-content-end">
                <button name="inventory-submit" class="btn">Submit</button>
            </div>
        </div>
    </form>

    <?php
        include "./includes/CTDB.inc.php";
        
        if (isset($_POST['inventory-submit'])) {
            $p_name = $_POST['P_Name']; 
            $p_description = $_POST['P_Description'];
            $p_price = $_POST['P_Price'];
            $p_quantity = $_POST['P_Quantity'];
            $p_info = $_POST['Add_Info'];
            $p_vendor = $_POST['V_Name'];

            $stmt = mysqli_stmt_init($conn);
            $insert_product = "INSERT INTO `showcase_inventory`(`P_Name`, `P_Description`, `P_Price`, `P_Quantity`, `Add_Info`, `V_ID`) VALUES (?, ?, ?, ?, ?, ?)";

            mysqli_stmt_prepare($stmt, $insert_product);
            mysqli_stmt_bind_param($stmt, "ssdisi", $p1, $p2, $p3, $p4, $p5, $p6);

            $p1 = $p_name;
            $p2 = $p_description;
            $p3 = $p_price;
            $p4 = $p_quantity;
            $p5 = $p_info;
            $p6 = $p_vendor;

            if (mysqli_stmt_execute($stmt)) {
                $query_processed = "New Item Added Successfully";
            } else {
                echo "Error: ".$insert_product."<br>".mysqli_error($conn);
            }
            mysqli_stmt_close($stmt);
        }
        mysqli_close($conn);
    ?>

    
</div>


<?php 
    if ($query_processed !== "") {
        echo "<br/></br><center>$query_processed</center>";
    }
?>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<style>
    .btn {
        background-color: #606060;
        color: white;
    } 

    .overflow-lock {
        overflow-y:scroll;
    }
</style>
</body>
</html>
