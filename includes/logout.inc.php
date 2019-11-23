<?php
    require "../includes/CTDB.inc.php";
    session_start();

    // Change cart status to 'X' if it is open and nothing was processed. 
    if (isset($_SESSION["Cart_ID"])) {
        $check_query = "SELECT Cart_Status FROM showcase_cart_header WHERE Cart_ID = {$_SESSION["Cart_ID"]};";
        $query_fetch = mysqli_fetch_assoc(mysqli_query($conn, $check_query));
        $cart_letter = $query_fetch["Cart_Status"];
    
        if ($cart_letter == 'A') {
            $update_letter = "UPDATE showcase_cart_header SET Cart_Status = 'X' WHERE Cart_ID = {$_SESSION["Cart_ID"]};";
            mysqli_query($conn, $update_letter);
        }
    }

    mysqli_close($conn);
    session_unset();
    session_destroy();
    header("Location: ../T_Login.php");
?>