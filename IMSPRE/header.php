<?php
    session_start();

    if (!(isset($_SESSION['uid']))) {
        header("Location: ./T_login.php");
        exit();
    }
?>