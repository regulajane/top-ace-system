<!DOCTYPE html>
<html lang="en">
<head>
    <?php   
        include 'includes/header.php';
        include 'includes/head-elements.php';   
        if(!isset($_SESSION["username"])) {
            header('Location: index.php?loggedout=true');}
    ?>
    <script src=""></script>
    <title>Sales</title>
</head>
<body>
    <?php include 'includes/nav.php'; ?>
    <div class="container">       
        <!-- Job Order Buttons -->
        <div class="actionBtns">
            <button type="button" id="newjoborderbtn" class="btn btn-info" data-toggle="modal" 
                href="#newSaleModal"><i class="fa fa-plus fa-fw"></i> New Sale </button>
            <button type="button" id="updateemployeebtn" class="btn btn-info" data-toggle="modal">
                <i class="fa fa-print fa-fw"></i> Print </button>
        </div>
        <!-- Job Order Table -->
        <table  id="saleTable" class="table table-condensed table-hover">
            <thead>
                <tr>
                    <th data-column-id="saleid" data-visible="false" data-identifier="true">
                        Sale ID</th>
                    <th data-column-id="saledate">
                        Date</th>
                    <th data-column-id="noofitems">
                        No. of Items</th>
                    <th data-column-id="saleprice">
                        Total Price</th>
                </tr>
            </thead>  
        </table>
        <hr>
        <?php include 'includes/footer.php'; ?>
    </div>

    <!-- Employee Modals -->
    <?php 
        include 'includes/modals/modal-employee.php';
    ?>   
</body>
</html>