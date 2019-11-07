<?php
    require "header.php";
?>

<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Inventory Tracking</title>
        
        <link rel="shortcut icon" type="image/x-icon" href="img/enactus_logo(C).png">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oxygen|PT+Sans|Ubuntu&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    </head>
<center>
<body class="overflow-lock" style="font-family: 'Oxygen', sans-serif;">
    <!-- Modal -->
    <div class="modal fade" id="ShoppingCart" tabindex="-1" role="dialog" aria-labelledby="ShoppingCartLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">
                        <i style="color:#FFC222;" class="fas fa-shopping-cart"></i> 
                        Shopping Cart
                    </h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                </div>
                <div class="modal-body">
                    <table class="table table-dark">
                        <thead class=" text-center" style="color:#FFC222;">
                            <tr>
                                <th class="text-center" scope="col">Product</th>
                                <th class="text-center" scope="col">Price</th>
                                <th class="text-center" scope="col"> Qty. to Cart</th>
                                <th class="text-center" scope="col"> Totals</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">Shoe</td>
                                <td class="text-center">$100.00</td>
                                <td class="text-center">2</td>
                                <td class="text-center">$200</td>
                            </tr>
                            <tr>
                                <td class="text-center">Shoe</td>
                                <td class="text-center">$100.00</td>
                                <td class="text-center">2</td>
                                <td class="text-center">$200</td>
                            </tr>
                            <tr>
                                <td class="text-center">Shoe</td>
                                <td class="text-center">$100.00</td>
                                <td class="text-center">2</td>
                                <td class="text-center">$200</td>
                            </tr>
                            <tr>
                                <td class="text-center">Shoe</td>
                                <td class="text-center">$100.00</td>
                                <td class="text-center">2</td>
                                <td class="text-center">$200</td>
                            </tr>
                            <tr>
                                <td class="text-center">Shoe</td>
                                <td class="text-center">$100.00</td>
                                <td class="text-center">2</td>
                                <td class="text-center">$200</td>
                            </tr>
                            <tr>
                                <td class="text-center">Shoe</td>
                                <td class="text-center">$100.00</td>
                                <td class="text-center">2</td>
                                <td class="text-center">$200</td>
                            </tr>
                            <tr>
                                <td class="text-center">Shoe</td>
                                <td class="text-center">$100.00</td>
                                <td class="text-center">2</td>
                                <td class="text-center">$200</td>
                            </tr>
                            <tr>
                                <td class="text-center">Shoe</td>
                                <td class="text-center">$100.00</td>
                                <td class="text-center">2</td>
                                <td class="text-center">$200</td>
                            </tr>
                            <tr>
                                <td class="text-center">Shoe</td>
                                <td class="text-center">$100.00</td>
                                <td class="text-center">2</td>
                                <td class="text-center">$200</td>
                            </tr>
                            <tr>
                                <td class="text-center">Shoe</td>
                                <td class="text-center">$100.00</td>
                                <td class="text-center">2</td>
                                <td class="text-center">$200</td>
                            </tr>
                            <tr>
                                <td class="text-center">Shoe</td>
                                <td class="text-center">$100.00</td>
                                <td class="text-center">2</td>
                                <td class="text-center">$200</td>
                            </tr>
                            <tr>
                                <td class="text-center">Shoe</td>
                                <td class="text-center">$100.00</td>
                                <td class="text-center">2</td>
                                <td class="text-center">$200</td>
                            </tr>
                        </tbody>
                    </table>
                    <h3>Grand Total: $2,400.00</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger">Cancel Order</button>
                    <button type="button" class="btn btn-success">Purchase</button>
                </div>
            </div>
        </div>
    </div>

    <?php
        require "NavigationBar.php";
    ?>

    <div class="container container-fluid col-12">
        <div class="row float-right">
            <div class="col-12 float-right">
                <button class="btn btn-dark" data-toggle="modal" data-target="#ShoppingCart">
                    <i style="color:#FFC222;" class="fas fa-shopping-cart fa-2x"></i>
                </button>
            </div>
        </div>
    </div>
    <br>

    <div class="container col-12 col-sm-12 col-md-10 col-lg-10 col-xl-6">
        <div class="col-12 text-center">
            <h3 style="font-size:4rem;">Inventory Tracking</h3>
            <h4>Point of Sales</h4>
        </div>
        <hr>
        <br>

        <div class="col-12">
            <div class="row">
                <form class="w-100" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <b><h5>Key Word Search</h5></b>
                    <div class="input-group">
                        <input name="search" type="text" class="form-control" placeholder="Search" aria-label="SearchInput" aria-describedby="SearchButton" id="SearchInput">
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text btn btn-dark" id="SearchButton" name="searchInventory"><i style="color:#FFC222"; class="fas fa-search"></i>&nbsp; Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
    <br>

    <?php
        include_once './includes/CTDB.inc.php';

        //TODO: Need To Make This Prepared
        if (isset($_POST["searchInventory"])) {
            $query = $_POST['search']; 	// Stores Query
            $min_length = 3; 			// Restrict Query Size
        
            if (strlen($query) >= $min_length) {
                $query = htmlspecialchars($query); // Remove / Update Special Chars
            
                $query = mysqli_real_escape_string($conn, $query); 
            
                $db_query = "SELECT * FROM showcase_inventory WHERE (P_Name LIKE '%$query%' OR P_Description LIKE '%$query%' OR Add_Info LIKE '%$query%')";
            
                $raw_results = mysqli_query($conn, $db_query);
                
                if (mysqli_num_rows($raw_results) > 0) {
                    echo '
                        <table class="table table-dark">
                            <thead class=" text-center" style="color:#FFC222;">
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Qty. in Inventory</th>
                                    <th scope="col">Aditional information</th>
                                    <th scope="col"> Qty. to Cart</th>
                                    <th scope="col"> Add to Cart</th>
                                </tr>
                            </thead>
                            <tbody>';
    
                    while ($results = mysqli_fetch_array($raw_results)) {
                        echo '<tr><td class="text-center">'.$results["P_Name"]."</td>";
                        echo '<td class="text-center">'.$results["P_Description"]."</td>";
                        echo '<td class="text-center">$'.$results["P_Price"]."</td>";
                        echo '<td class="text-center">'.$results["P_Quantity"]."</td>";
                        echo '<td class="text-center">'.$results["Add_Info"]."</td>";
                        echo '<td class="text-center"> <input class="form-control col-12" type="number" style="min-width:50px;"></input></td>';
                        echo '<td class="text-center"> <button class="btn btn-primary col-12"><i class="fas fa-cart-plus"></i></button></td></tr>';
                    }
                    echo '</tbody></table>';
                } else {
                echo "No results";
                }
            } else {
            echo "Minimum length is ".$min_length;
            }
        }
    ?>

    <div id="OrSection" class="col-12">
        <h5><span>OR</span></h5>
    </div>
    <br>

    <div>
        <b><h5>Search Via Vendor Name: </h5></b>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <select name="selectCompany" class="col-12 col-md-6 form-control mb-4">
                <!-- <option value="disabled" selected disabled>Vendor</option> -->
                <?php
                    include_once './includes/CTDB.inc.php';
        
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
                ?>
            </select>
            <button class="btn btn-dark" name="submit" id="submitButton">
                <i style="color: #FFC222" class="far fa-check-square"></i>
                &nbsp; Submit
            </button>
        </form>
    </div>

    <!--//! REMOVE !// -->
    <button class="special-button" type="button" onclick="getData();">
        Test Ajax Call
    </button>
    
    <div>
        <?php

        include_once './includes/CTDB.inc.php';
        
        //TODO: Need To Make This Prepared
        if (isset($_POST["submit"])) {
            $vendor_id = $_POST['selectCompany']; 	// Stores Company

            $vendor_query = "SELECT * FROM showcase_inventory WHERE V_ID = $vendor_id";

            $raw_results = mysqli_query($conn, $vendor_query);

            if (!$raw_results) {
                echo mysqli_error($conn);		
            }
                
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
        }
        ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</center>

<style>
    #submitButton {
        position: fixed-bottom;
    }

    .btn {
        background-color: #606060;
        color: white;
    }

    .overflow-lock {
        overflow-y: scroll;
    }

    .special-button {
        position: absolute;
        bottom: 0;
        right: 5px;
    }
</style>
<script>
    function getData() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var responseObj = JSON.parse(this.responseText);
                console.log(responseObj);
                // document.getElementById("OrSection").innerHTML = responseObj.name;
            }
        };
        xmlhttp.open("GET", "apis/getCart.php", true);
        xmlhttp.send();
    }
</script>
</html>