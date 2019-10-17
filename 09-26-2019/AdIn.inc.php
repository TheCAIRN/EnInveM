<?php
require_once "header.php";
//DO this once button is pushed....
if (isset($_POST['inventory-submit'])) {

    require 'CTDB.inc.php';
    $Product_Name = $_POST['P_Name']
    $Product_Description = $_POST['P_Description'];
    $Product_Price = $_POST['P_Price'];
    $Product_Quantity = $_POST['P_Quantity'];
    $Vendor_ID = $_POST['V_ID'];
    $Vendor_Name = $_POST['Vendor_Name'];
    $Additional_Information = $_POST['Add_Info'];


// DO I need to include inserts into an Autoincriment colum?
        $sql = "INSERT INTO `Showcase_Inventory` (P_Name, P_Description, P_Price, P_Quantity, Vendor_Name, Add_Info) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../AddIn.php?error=sqlerror");
          exit ();
        }
        else {

          mysqli_stmt_bind_param($stmt, "ssssss", $p1, $p2, $p3, $p4, $p5, $p6);
          $p1=$Product_Name;
          $p2=$Product_Description;
           $p3=$Product_Price;
            $p4=$Product_Quantity;
             $p5=$Vendor_Name;
             $p6=$Additional_Information;


          mysqli_stmt_execute($stmt);
          header("Location: ../putrightpagehere.php");//Need correct page here...
          exit ();
        }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    //DO this once button is pushed for vendor addition....
    if (isset($_POST['vendor-submit'])) {

        require 'CTDB.inc.php';
        $Vendor_ID = $_POST['V_ID']
        $Vendor_Name = $_POST['V_Name'];
        $Vendor_Phone = $_POST['V_Phone'];
        $Vendor_Email = $_POST['V_Email'];

  //What about V_ID? I am not understanding the logic behind this....? its auto - inc but does that make sense???
  //What about the same vendor with multiple products. how would the user know the V_ID#????
            $sql = "INSERT INTO `Showcase_Vendors` (V_Name, V_Phone, V_Email) VALUES (?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              header("Location: ../AddIn.php?error=sqlerror");
              exit ();
            }
            else {

              mysqli_stmt_bind_param($stmt, "ssss", $p1, $p2, $p3);

              $p1=$Vendor_Name;
              $p2=$Vendor_Phone;
              $p3=$Vendor_Email;

              mysqli_stmt_execute($stmt);
              header("Location: ../putrightpagehere.php");//Need correct page here...
              exit ();
            }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
