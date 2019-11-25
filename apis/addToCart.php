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

    // Getting raw data from post
    $json = file_get_contents("php://input");
    $postObj = json_decode($json);

    $Product_ID = $postObj -> Product_ID;
    $Cart_ID = $_SESSION["Cart_ID"];
    $Quantity = $postObj -> Quantity;
    
    $stmt = mysqli_stmt_init($conn);
    $insert_cart_details = "INSERT INTO `showcase_cart_details`(`Product_ID`, `Cart_ID`, `Quantity`) VALUES (?, ?, ?);";

    mysqli_stmt_prepare($stmt, $insert_cart_details);
    mysqli_stmt_bind_param($stmt, "iii", $p1, $p2, $p3);

    $p1 = $Product_ID;
    $p2 = $Cart_ID;
    $p3 = $Quantity;

    if (mysqli_stmt_execute($stmt)) {
        $success = array("Success" => "Item successfully added to cart");
        $responseJSON = json_encode($success);
        echo $responseJSON;
    } else {
        //echo print_r(array($Product_ID, $Cart_ID, $Quantity));
        // echo "Error: ".$insert_vendor."<br>".mysqli_error($conn);
        $success = array("Success" => false);
        $responseJSON = json_encode($success);
        echo $responseJSON;
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>