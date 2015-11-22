<!DOCTYPE html>
<html lang="en">
<head>
    <?php   
        include 'includes/header.php';
        include 'includes/head-elements.php';   
        if(!isset($_SESSION["username"])) {
            header('Location: index.php?loggedout=true');}
    ?>
    <script src="js/sales-script.js"></script>
    <title>Sales</title>
</head>
<body>
    <?php include 'includes/nav.php'; ?>
    <div class="pagecontainer">
    <br>
    <div class="container" id="sales">          
        <div class="actionBtns">
            <button type="button" id="newsalebtn" class="btn btn-info" data-toggle="modal" 
                href="#salesModal"><i class="fa fa-plus fa-fw"></i> New Sale </button>
        </div>
        <!-- SalesTable -->
        <div>
            <table  id="salesTable" class="table table-condensed table-hover table-striped">
                <thead>
                    <tr>
                        <th data-column-id="saleid" data-visible="false" data-identifier="true">
                            Sale ID</th>
                        <th data-column-id="saledate">
                            Date</th>
                        <th data-column-id="invoiceno">
                            Invoice No</th>
                        <th data-column-id="modelno">
                            Model No</th>
                        <th data-column-id="itemname">
                            Name</th>   
                        <th data-column-id="itemsize">
                            Size</th>  
                        <th data-column-id="noofitems">
                            Quantity</th>
                        <th data-column-id="saleprice" data-align="right" data-header-align="right">
                            Price</th>
                        <th data-column-id="total">
                            Total</th>
                    </tr>
                </thead>  
            </table>
        </div>
   
        <?php include 'includes/modals/modal-sales.php'; ?>
        <?php include 'includes/footer.php'; ?>
         </div>
    </div>  
</body>
</html>