<!DOCTYPE html>
<html lang="en">
<head>
    <?php   
        include 'includes/header.php';
        include 'includes/head-elements.php';   
        if(!isset($_SESSION["username"])) {
            header('Location: index.php?loggedout=true');}
    ?>
    <script src="js/jo-script.js"></script>
    <title>Job Order</title>
</head>
<body>
    <?php include 'includes/nav.php'; ?>
    <br />
<!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="jumbotron" style="height: 100px;">
                <h2 style="margin-top: -15px; margin-left: -60px; text-align: center;">Job Orders</h2>
            </div>
            <div class="col-md-12">
                <ul id="myTab" class="nav nav-tabs nav-justified">
                    <li class="active tab-nav"><a href="#joTab" data-toggle="tab">
                        <i class="fa fa-bus"></i> Engineer Reconditioning</a></li>
                    <li class="tab-nav"><a href="#vrTab" data-toggle="tab">
                        <i class="fa fa-bus"></i> Fabrication</a></li>
                    <li class="tab-nav"><a href="#sTab" data-toggle="tab">
                        <i class="fa fa-bus"></i> Engineer Reconditioning with Fabrication</a></li>
                </ul>
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
                                href="#joModal"><i class="fa fa-plus fa-fw"></i> New Job Order </button>
                            <button type="button" id="editbtn" class="btn btn-info" data-toggle="modal">
                                <i class="fa fa-pencil-square-o fa-fw"></i> Edit </button>
                            <!-- <button type="button" id="updatebtn" class="btn btn-info" data-toggle="modal">
                                <i class="fa fa-pencil-square-o fa-fw"></i> Update </button> -->
                            <div class="btn-group">
                                <a class="btn btn-info" id="preEvalbtn" data-toggle="modal" 
                                    href="#joPreFormModal"><i class="fa fa-print fa-fw"></i> Print </a>
                            </div>
                        </div>
                        <!-- Job Order Table -->
                        <table  id="jobOrderTable" class="table table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th data-column-id="joborderid" data-visible="true" data-identifier="true">
                                        Receipt number</th>
                                    <th data-column-id="datebrought" data-visible="true">
                                        Date Received</th>
                                    <th data-column-id="dateStarted" data-visible="false">
                                        Date Started</th>
                                    <th data-column-id="dateFinished" data-visible="false">
                                        Date Finished</th>
                                    <th data-column-id="clientname" data-visible="true">
                                        Client name</th>
                                    <th data-column-id="joprice" data-visible="true">
                                        Grand Total</th>
                                    <th data-column-id="downpayment" data-visible="true">
                                        Downpayment</th>
                                    <th data-column-id="balance" data-visible="true">
                                        Balance</th>
                                    <th data-column-id="jostatus" data-visible="true">
                                        Status</th>
                                    <th data-column-id="preparedby" data-visible="false">
                                        Received by</th>
                                    <th data-column-id="supervisor" data-visible="false">
                                        Confirmed by</th>
                                    
                                    


                                </tr>
                            </thead>  
                        </table>
                        <hr>
                    
                </div>
            </div>
        
            <div class="row tab-pane fade" id="vrTab">
                <div class="col-lg-12">
                    <br>
                </div>
                  <div class="col-md-12">
    
                        <!-- Fabrication Buttons -->
                        <div class="actionBtns">
                            <button type="button" id="newjoborderbtn" class="btn btn-info" data-toggle="modal" 
                                href="#fabModal"><i class="fa fa-plus fa-fw"></i> New Job Order </button>
                            <button type="button" id="editfabbtn" class="btn btn-info" data-toggle="modal">
                                <i class="fa fa-pencil-square-o fa-fw"></i> Edit </button>
                            <button type="button" id="updatebtn" class="btn btn-info" data-toggle="modal">
                                <i class="fa fa-pencil-square-o fa-fw"></i> Update </button>
                            <div class="btn-group">
                                <a class="btn btn-info" id="preEvalbtn" data-toggle="modal" 
                                    href="#"><i class="fa fa-print fa-fw"></i> Print </a>
                            </div>
                        </div>
                        <!-- Fabrication -->
                        <table  id="fabricationTable" class="table table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th data-column-id="joborderid" data-visible="true" data-identifier="true">
                                        Receipt number</th>
                                    <th data-column-id="datestarted">
                                        Date Started</th>
                                    <th data-column-id="clientname">
                                        Client name</th>
                                    <th data-column-id="downpayment">
                                        Downpayment</th>
                                    <th data-column-id="joprice">
                                        Grand Total</th>
                                    <th data-column-id="jostatus">
                                        Status</th>

                                </tr>
                            </thead>  
                        </table>
                        <hr>
                    
                </div>
                <div class="col-md-12">
                    

                </div>
            </div>
            <div class="row tab-pane fade" id="sTab">
                <div class="col-lg-12">
                    <h2 class="page-header"></h2>
                </div>
                <div class="col-md-12">
                    

                </div>
            </div>
        </div>
        
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
        
    ?>   
</body>
</html>