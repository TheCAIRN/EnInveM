<?php
    require "header.php";
    require "NavigationBar.php";
?>

<h3 style="text-align: center; font-size: 3rem; margin-bottom: 0.5em;">Report Page</h3>

<?php
    include "./includes/CTDB.inc.php";

    $get_report = "SELECT V_Name, P_Name, P_Price, SUM(Quantity) AS QtySold, P_Quantity AS Inventory_Left, (SUM(Quantity) * P_Price) AS Total FROM showcase_cart_details AS SCD INNER JOIN showcase_cart_header AS SCH ON SCD.Cart_ID = SCH.Cart_ID INNER JOIN showcase_inventory AS SI ON SCD.Product_ID = SI.P_ID INNER JOIN showcase_vendors AS SV ON SI.V_ID = SV.V_ID WHERE Cart_Status = 'P' GROUP BY SCD.Product_ID;";

    $report = mysqli_query($conn, $get_report);

    $total = 0;

    echo "<table style='width: 95%; margin: 0 auto;' class='table table-dark text-center'>";
        echo "<thead class='text-center' style='color:#FFC222;'>";
            echo "<tr>";
                echo "<th>Vendor</th>";
                echo "<th>Product</th>";
                echo "<th>Price</th>";
                echo "<th>Qty Sold</th>";
                echo "<th>Inventory Left</th>";
                echo "<th>Total</th>";
            echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
    
        while ($row = mysqli_fetch_assoc($report)) {
            $total += $row["Total"];
            echo "<tr>";
                echo "<td>{$row["V_Name"]}</td>";
                echo "<td>{$row["P_Name"]}</td>";
                echo "<td>{$row["P_Price"]}</td>";
                echo "<td>{$row["QtySold"]}</td>";
                echo "<td>{$row["Inventory_Left"]}</td>";
                echo "<td>{$row["Total"]}</td>";
            echo "</tr>";
        }

        echo "</tbody>";
    echo "</table>";

    echo "<center style='margin-top: 1rem;'><h2>Grand Total: \${$total}</h2></center>";

    mysqli_close($conn);
?>