<!DOCTYPE html>
<html lang="en">
<head>
    <?php   
        include 'includes/header.php';
        include 'includes/head-elements.php';   
        if(!isset($_SESSION["username"])) {
            header('Location: index.php?loggedout=true');}
    ?>
    <script src="js/job-script.js"></script>
    <title>Job Order</title>
</head>
<body>
    <?php include 'includes/nav.php'; ?>
    <br />
<!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="jumbotron" style="height: 100px;">
                <h2 style="margin-top: -15px; margin-left: -60px; text-align: center;">Job</h2>
            </div>
            
        </div>
        <br>
        <div id="myTabContent" class="tab-content">
            <div class="row tab-pane fade active in" id="joTab">
                <div class="col-lg-12">
                    <br>
                </div>
                <div class="col-md-12">       
                        <!-- Job Order Buttons -->
                        <div class="actionBtns">
                            <button type="button" id="newjoborderbtn" class="btn btn-info" data-toggle="modal" 
                                href="#____________"><i class="fa fa-plus fa-fw"></i> New Job </button>
                            <button type="button" id="editbtn" class="btn btn-info" data-toggle="modal">
                                <i class="fa fa-pencil-square-o fa-fw"></i> Edit </button>
                            
                            
                        </div>
                        <!-- Job Order Table -->
                        <table  id="jobTable" class="table table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th data-column-id="servicename" data-visible="true" data-identifier="true">
                                        Service name</th>
                                    <th data-column-id="serviceprice">
                                        Price</th>
                                    
                                </tr>
                            </thead>  
                        </table>
                        <hr>
                    
                </div>
            </div>
        
            
        </div>
        <hr>
        <?php include 'includes/footer.php'; ?>
    </div>
    <!-- Job Order Modals -->
    <?php 
        include 'includes/modals/modal-joform-empty.php';
        include 'includes/modals/modal-editjoform.php';
        include 'includes/modals/modal-fabform-empty.php';
        include 'includes/modals/modal-updatejoform.php';
        include 'includes/modals/modal-jopreform.php';
        include 'includes/modals/modal-jopostform.php';
        include 'includes/modals/modal-editfabform.php';
        // include 'includes/modals/modal-servicesbreakdown.php';
    ?>   
</body>
</html>