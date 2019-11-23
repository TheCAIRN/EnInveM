<?php
    session_start();

    require "../includes/CTDB.inc.php";

    // If the user has no cart_id, assign one based on insert id
    if (!(isset($_SESSION["Cart_ID"]))) {
        $create_cart = "INSERT INTO `showcase_cart_header`(`Cart_Status`) VALUES ('A');"; 

        mysqli_query($conn, $create_cart);

        $cart_id = mysqli_insert_id($conn);

        $_SESSION["Cart_ID"] =  $cart_id;
    }

    $C_ID = $_SESSION["Cart_ID"];

    $getCart = "SELECT SCH.Cart_ID, Cart_Status, P_Name, SUM(Quantity) AS QTY, P_Price, ((SUM(Quantity)) * P_Price) AS Total FROM showcase_cart_header AS SCH INNER JOIN showcase_cart_details AS SCD ON SCD.Cart_ID = SCH.Cart_ID INNER JOIN showcase_inventory AS SInventory ON SInventory.P_ID = SCD.Product_ID WHERE SCH.Cart_ID = $C_ID AND SCH.Cart_Status = 'A' GROUP BY Cart_ID, Product_ID;";

    $items = mysqli_query($conn, $getCart);
  
    $results = array();
    $total = 0;
    while ($row = mysqli_fetch_assoc($items)) {
        $total += $row["Total"]; // Create Total Value For Cart
        $results[] = $row;
    }

    $results[] = $total;

    echo json_encode($results);
    mysqli_close($conn);   
?>