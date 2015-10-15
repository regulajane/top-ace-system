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
    <br />
<!-- Page Content -->
    <div class="container">
        <div class="jumbotron" style="height: 100px;">
            <h2 style="margin-top: -15px; margin-left: -60px; text-align: center;">Services</h2>
        </div>
        <!-- Service Buttons -->
        <div class="actionBtns">
            <button type="button" id="newservicebtn" class="btn btn-info" data-toggle="modal" 
                href="#addServiceModal"><i class="fa fa-plus fa-fw"></i> New Service </button>
            <button type="button" id="editservicebtn" class="btn btn-info" data-toggle="modal">
                <i class="fa fa-pencil-square-o fa-fw"></i> Edit/Update </button>
            <button type="button" id="deleteservicebtn" class="btn btn-info" data-toggle="modal">
                <span class="glyphicon glyphicon-remove-sign"></span> </button>
        </div>
        <!-- Service Table -->
        <table  id="serviceTable" class="table table-condensed table-hover">
            <thead>
                <tr>
                    <th data-column-id="serviceid" data-visible="false" data-identifier="true">
                        Service ID</th>
                    <th data-column-id="servicename">
                        Service name</th>
                    <th data-column-id="serviceprice">
                        Price</th>
                </tr>
            </thead>  
        </table>
        <hr>
        <?php include 'includes/footer.php'; ?>
    </div>
    <!-- Job Order Modals -->
    <?php 
        include 'includes/modals/modal-services.php';
    ?>   
</body>
</html>