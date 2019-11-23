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
                        <tbody id="cart-body">
                            
                        </tbody>
                    </table>
                    <h3>Grand Total: $<span id="grand-total">2,400.00</span></h3>
                </div>
                <div class="modal-footer">
                    <button onclick="cancelOrder();" type="button" class="btn btn-danger">Cancel Order</button>
                    <button onclick="purchase();" type="button" class="btn btn-success">Purchase</button>
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
                <button id="button-cart" onclick="getCart();" class="btn btn-dark" data-toggle="modal" data-target="#ShoppingCart">
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
        include './includes/CTDB.inc.php';

        if (isset($_POST["searchInventory"])) {
            $query = "%" . $_POST['search'] . "%"; 	// Stores Query
            $min_length = 3; 			            // Restrict Query Size
        
            if ((strlen($query) - 2) >= $min_length) {
                $stmt = mysqli_stmt_init($conn);

                $query_db = "SELECT P_ID, P_Quantity, P_Name, P_Description, P_Price, Add_Info FROM showcase_vendors AS sv INNER JOIN showcase_inventory AS si ON sv.V_ID = si.V_ID WHERE (P_Name LIKE ? OR P_Description LIKE ? OR Add_Info LIKE ? OR V_Name LIKE ?);";

                mysqli_stmt_prepare($stmt, $query_db);

                mysqli_stmt_bind_param($stmt, "ssss", $query, $query, $query, $query);

                mysqli_stmt_execute($stmt);

                mysqli_stmt_store_result($stmt);

                mysqli_stmt_bind_result($stmt, $P_ID, $P_Quantity, $P_Name, $P_Description, $P_Price, $Add_Info);
                
                if (mysqli_stmt_num_rows($stmt) > 0) {
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
    
                    while (mysqli_stmt_fetch($stmt)) {
                        echo "<tr><td class='text-center'>$P_Name</td>";
                        echo "<td class='text-center'>$P_Description</td>";
                        echo "<td class='text-center'>$P_Price</td>";
                        echo "<td class='text-center'>$P_Quantity</td>";
                        echo "<td class='text-center'>$Add_Info</td>";
                        echo "<td class='text-center'><input min='0' max='$P_Quantity' id='$P_ID'' class='form-control col-12' type='number' style='min-width:50px;'></input></td>";
                        echo "<td class='text-center'><button onclick='addToCart($P_ID);' class='btn btn-primary col-12'><i class='fas fa-cart-plus'></i></button></td></tr>";
                    }
                    echo '</tbody></table>';
                } else {
                echo "No results";
                }
            } else {
                echo "Minimum length is ".$min_length;
            }
            mysqli_stmt_close($stmt);
        }
        mysqli_close($conn);
    ?>

    <p id="message-box"></p>
   
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

    #button-cart {
        position: absolute;
        top: 0;
        right: 10;
        z-index: 10;
    }
</style>
<script src="./js/app.js"></script>
</html>