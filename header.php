<?php
    session_start();

    // Session not set...see you later.
    if (!(isset($_SESSION['uid']))) {
        header("Location: ./T_login.php");
        exit();
    }
?>