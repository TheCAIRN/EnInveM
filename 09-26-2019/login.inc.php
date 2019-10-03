<?php
if (isset($_POST['login-submit'])) {
  //Connect to the Database
  require './CTDB.inc.php';
  //Username and Password _Post Methods
  $uid = $username = $_POST['uid'];
  $password = $_POST['pwd'];
//No fields are left blank by user, returns them to T_login.php
  if (empty($username) || empty($password)) {
    header("Location: ../T_login.php?error=emptyfields");
    exit();
  }
  //ask db if the user is correct and can log in....
  else {
    $sql = "SELECT pwdUsers FROM `Showcase_Users` WHERE uidUsers=?; ";
//initalliza a new statement...must refer to db connection above
    $stmt = mysqli_stmt_init($conn);
    //Run and check if these two conditions are meet and match the info in the db
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      //include an error message if an sql error occurs ( we messed up the sql...)
      header("Location: ../T_login.php?error=sqlerror");
      exit();
    }
    else {
      //now we want to pass through the input and check with the db
      //our statement, two strings, username, and password
      mysqli_stmt_bind_param($stmt, "s", $uid);
      mysqli_stmt_execute($stmt);
      // I want the results of statement into a variable
      //is it empty or not?
      mysqli_stmt_bind_result($stmt,$pwdUsers);
      mysqli_stmt_store_result($stmt);
      mysqli_stmt_fetch($stmt);
      //$result = mysqli_stmt_get_result($stmt);
      //fetch the result variable from the db and converts it into a form that php can use
      if (mysqli_stmt_num_rows($stmt)>0 && strlen($pwdUsers)>0) {
        //comparision of input password and the password in the db
        $pwdCheck = password_verify($password, $pwdUsers);
        //use a true or false stmt to get our result and login in user or not
        if ($pwdCheck == false) {
          header("Location: ../T_login.php?error=wrongpwd");
          exit();
        }
        else if ($pwdCheck == true) {
          //need one of these on each page, so include this in header...
          session_start();
          $_SESSION['userId'] = $row['idUsers'];
          $_SESSION['userUid'] = $row['uidUsers'];
          //need actual file for this message...
          header("Location:https://www.google.com");
          exit();
        }
        else {
          header("Location: ../T_login.php?error=wrongpwd");
          exit();
        }
      }
      else {
        header("Location: ../T_login.php?error=nouser&".$uid);
        exit();
      }
    }
  }

}
else {
    header("Location:https://www.google.com");
}
?>
