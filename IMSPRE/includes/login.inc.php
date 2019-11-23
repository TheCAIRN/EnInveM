<?php
    if (isset($_POST['login-submit'])) {
        require './CTDB.inc.php';
        
        $uid = $username = $_POST['uid'];
        $password = $_POST['pwd'];

        if (empty($username) || empty($password)) {
            header("Location: ../T_login.php?error=emptyvals"); // Send to error page
            exit();
        } else {
            $stmt = mysqli_stmt_init($conn);
            $sql = "SELECT pwdUsers FROM `Showcase_Users` WHERE uidUsers=?;";

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../T_login.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "s", $uid);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $pwdUsers);
                mysqli_stmt_store_result($stmt);
                mysqli_stmt_fetch($stmt);

                if (mysqli_stmt_num_rows($stmt) > 0 && strlen($pwdUsers) > 0) {
                    $pwdCheck = password_verify($password, $pwdUsers);

                    if ($pwdCheck == false) {
                        header("Location: ../T_login.php?error=wrongpwd");
                        exit();
                    } else if ($pwdCheck == true) {
                        session_start();                        
                        $_SESSION['uid'] = $uid;
                        // $_SESSION['userId'] = $row['idUsers'];
                        // $_SESSION['userUid'] = $row['uidUsers'];
                        header("Location: ../InventoryTrackerPage.php");
                        exit();
                     } else {
                        header("Location: ../T_login.php?error=wrongpwd2");
                        exit();
                    }
                } else {
                    header("Location: ../T_login.php?error=nouser");
                    exit(); 
                }
            }
        }
    } else {
        header("Location: ../T_login.php");
    }
?>
