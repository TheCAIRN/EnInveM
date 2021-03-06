<html>
    <head>
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    </head>
    <body>
        <nav style="background-color:#606060" class="navbar navbar-expand-md navbar-dark mb-3 fixed-top" id="navbar-layout">
            <div class="container-fluid">
                <a class="navbar-brand" href="InventoryTrackerPage.php">
                    <img style="height: 180%; width: auto;" id="enactus" src="img/enactus_logo(C).png">
                </a>
                <button style="background-color: black;" type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ml-auto text-right">
                        <a style="color:white;" href="InventoryTrackerPage.php" class="nav-item nav-link">Inventory Tracking</a>
                        <a style="color:white;" href="InventoryManagementPage.php" class="nav-item nav-link">Inventory Management</a>
                        <a style="color:white;" href="InventoryReportPage.php" class="nav-item nav-link">Inventory Report</a>
                        <form action="includes/logout.inc.php" method="post">
                            <button type="submit" class="btn btn-outline-dark" name="logout-submit">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
        <br><br><br><br><br>
    </body>
</html>
