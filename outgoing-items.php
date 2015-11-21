<!DOCTYPE html>
<html lang="en">
<head>
    <?php   include 'includes/header.php';
            include 'includes/head-elements.php';   
    if(!isset($_SESSION["username"])) {
                header('Location: index.php?loggedout=true');}
    ?>
    <script src="js/outgoingitems-script.js"></script>
    <title>Procured Items</title>
</head>
<body>
   <?php include 'includes/nav.php'; ?>
    <div class="pagecontainer">
    <br>
    <div class="container">        
        <h4>Procured Items</h4>

        <div class="actionBtns" style="position: relative; float:right; ">
            <div style="position: relative; margin-top: -40px;">
                <a type="button" class="btn btn-primary" href="inventory.php" title="Supplies">
                    <i class="fa fa-arrow-left fa-fw"></i> Back</a>
                <a type="button" class="btn btn-primary" href="includes/printIngoingSupplies.php" title="Print Ingoing Supplies" 
                    target="_blank"><i class="fa fa-print fa-fw"></i> Print</a>
            </div>
        </div>
        <hr style="margin-bottom: 70px">

        <table  id="outItemsTable" class="table table-condensed table-hover table-striped">
            <thead>
                <tr>
                    <th data-column-id="isdate">Date</th>
                    <th data-column-id="time">Time</th>
                    <th data-column-id="quantity">Quantity Procured</th>
                    <th data-column-id="enteredby">User</th>
                    <th data-column-id="inventoryname">Item Name</th>
                </tr>
            </thead>  
        </table>
        <hr>
        <?php include 'includes/footer.php'; ?>
    </div>
    </div>
</body>
</html>
