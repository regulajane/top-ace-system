<!DOCTYPE html>
<html lang="en">
<head>
    <?php   
        include 'includes/header.php';
        include 'includes/head-elements.php';   
        if(!isset($_SESSION["username"])) {
            header('Location: index.php?loggedout=true');}
    ?>
    <script src="js/service-script.js"></script>
    <title>Services</title>
</head>
<body>
    <?php include 'includes/nav.php'; ?>
    <div class="pagecontainer">
    <br>
    <div class="container">
        <!-- Service Buttons -->
        <div class="actionBtns">
            <button type="button" id="newservicebtn" class="btn btn-info" data-toggle="modal" 
                href="#addServiceModal"><i class="fa fa-plus fa-fw"></i> New Service </button>
            <button type="button" id="editservicebtn" class="btn btn-info" data-toggle="modal">
                <i class="fa fa-pencil-square-o fa-fw"></i> Edit/Update </button>
        </div>
        <!-- Service Table -->
        <table  id="serviceTable" class="table table-condensed table-hover">
            <thead>
                <tr>
                    <th data-column-id="serviceid" data-visible="false" data-identifier="true">
                        Service ID</th>
                    <th data-column-id="servicename" data-width="15%">
                        Service Name</th>
                    <th data-column-id="servicedesc" data-width="50%">
                        Description</th>
                    <th  class="price-value" data-column-id="serviceprice" data-align="right" data-width="8%">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Price</th>
                    <th data-column-id="servicedatemod" data-width="11%">
                        Date Modified</th>
                </tr>
            </thead>  
        </table>
        <hr>
        <?php include 'includes/footer.php'; ?>
    </div>
    </div>
    <!-- Job Order Modals -->
    <?php 
        include 'includes/modals/modal-services.php';
    ?>   
</body>
</html>