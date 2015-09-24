items<!DOCTYPE html>
<html lang="en">
<head>
    <?php   include 'includes/header.php';
            include 'includes/head-elements.php';   ?>
    <title>Ingoing Supplies</title>
</head>
<body>
    <?php include 'includes/nav.php'; ?>
    <div class="container">        
        <h3>Ingoing Supplies</h3>
        <!-- Ingoing Supplies Buttons -->
        <div class="actionBtns" style="position: relative; float:right;">
            <div style="position: relative; margin-top: -40px;">
                <a type="button" class="btn btn-primary" href="supplies.php" title="Supplies">
                    <i class="fa fa-arrow-left fa-fw"></i> Back</a>
                <a type="button" class="btn btn-primary" href="includes/printIngoingSupplies.php" title="Print Ingoing Supplies" 
                    target="_blank"><i class="fa fa-print fa-fw"></i> Print</a>
            </div>
        </div>
        <hr>
        <!-- Ingoing Supplies Table -->
        <table  id="inSuppliesTable" class="table table-condensed table-hover">
            <thead>
                <tr>
                    <th data-column-id="" data-identifier="true" > Information coming soon </th>
                    <th data-column-id="" > Information coming soon </th>
                    <th data-column-id="" > Information coming soon </th>
                    <th data-column-id="" > Information coming soon </th>
                    <th data-column-id="" > Information coming soon </th>
                    <th data-column-id="">  Information coming soon </th>
                </tr>
            </thead>  
        </table>
        <hr>
        <?php include 'includes/footer.php'; ?>
    </div>
</body>
</html>
