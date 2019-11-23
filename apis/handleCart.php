<?php
    session_start();
    
    require "../includes/CTDB.inc.php";

    if ($_GET["handle"] === "purchase") {
        $curr_cart = $_SESSION["Cart_ID"];
        $handle_purchase = "CALL ProcessCart($curr_cart)";
        
        $query_result = mysqli_query($conn, $handle_purchase);

        if ($query_result !== false) {
            $success = array("Success" => true);
            unset ($_SESSION["Cart_ID"]);
        } else {
            $success = array("Success" => false);
        }
        
        $responseJSON = json_encode($success);
        echo $responseJSON;
    } else if ($_GET["handle"] === "cancel") {
        $curr_cart = $_SESSION["Cart_ID"];
        $clear_details = "DELETE FROM showcase_cart_details WHERE Cart_ID = $curr_cart;";
        
        $query_result = mysqli_query($conn, $clear_details);

        if ($query_result !== false) {
            $success = array("Success" => true);
        } else {
            $success = array("Success" => false);
        }

        $responseJSON = json_encode($success);
        echo $responseJSON;
    }
    mysqli_close($conn);    
?>

