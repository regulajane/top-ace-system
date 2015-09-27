<!DOCTYPE html>
<html lang="en">
<head>
    <?php   include 'includes/header.php';
            include 'includes/head-elements.php'; ?>
    
    
    <script src="js/jo-script.js"></script>

    <title>Job Order</title>
</head>
<body>
    <?php include 'includes/nav.php'; ?>
    <br />
<!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- <div class="col-lg-12">
                <h2 class="page-header">Services</h2>
            </div> -->
            <div class="col-lg-12">
                    <ul id="myTab" class="nav nav-tabs nav-justified">
                        <li class="active large-nav"><a href="#joTab" data-toggle="tab"><i class="fa fa-bus"></i> Engineer reconditioning</a>
                        </li>
                        <li class="large-nav"><a href="#vrTab" data-toggle="tab"><i class="fa fa-bus"></i> Fabrication</a>
                        </li>
                        
                        <li class="large-nav"><a href="#sTab" data-toggle="tab"><i class="fa fa-money"></i> Sales</a>
                    </ul>
            </div>
        </div>
        <div id="myTabContent" class="tab-content">
            <div class="row tab-pane fade active in" id="joTab">
                <div class="col-lg-12">
                    <br>
                </div>
                <div class="col-md-12">
                    <div class="container">          
                        <!-- Job Order Buttons -->
                        <div class="actionBtns">
                            <button type="button" id="newjoborderbtn" class="btn btn-primary" data-toggle="modal" 
                                href="#joModal"><i class="fa fa-plus fa-fw"></i> New Job Order </button>
                            <button type="button" id="editbtn" class="btn btn-primary" data-toggle="modal">
                                <i class="fa fa-pencil-square-o fa-fw"></i> Edit </button>
                            <button type="button" id="updatebtn" class="btn btn-primary" data-toggle="modal">
                                <i class="fa fa-pencil-square-o fa-fw"></i> Update </button>
                            <div class="btn-group">
                                <a class="btn btn-primary"><i class="fa fa-print fa-fw"></i> Print </a>
                                <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                                <span class="fa fa-caret-down"></span></a>
                                <ul class="dropdown-menu joborder">
                                    <li><button type="button" id="preEvalbtn" class="btn btn-primary" data-toggle="modal" 
                                        href="#joPreFormModal" style="text-align:left;  margin: 0px 5px 5px 5px; width: 94%;">
                                        <i class="fa fa-file fa-fw"></i> Pre-Inspection</button></li>
                                    <li><button type="button" id="postEvalbtn" class="btn btn-primary" data-toggle="modal" 
                                        href="#joPostFormModal" style="text-align:left;  margin: 0px 5px 0px 5px; width: 94%;">
                                        <i class="fa fa-file fa-fw"></i> Post-Inspection</button></li>
                                </ul>
                            </div>
                        </div>
                        <hr>
                        <!-- Job Order Table -->
                        <table  id="jobOrderTable" class="table table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th data-column-id="joborderid" data-visible="true" data-identifier="true">
                                        Receipt number</th>
                                    <th data-column-id="datebrought">
                                        Date Brought</th>
                                    <th data-column-id="clientname">
                                        Client name</th>
                                    <th data-column-id="downpayment">
                                        Downpayment</th>
                                    <th data-column-id="price">
                                        Grand Total</th>
                                    <th data-column-id="status">
                                        Status</th>
                                </tr>
                            </thead>  
                        </table>
                        <hr>
                    </div>
                    
                </div>
            </div>
        
            <div class="row tab-pane fade" id="vrTab">
                <div class="col-lg-12">
                    <br>
                </div>
                  <div class="col-md-12">
                    <div class="container">          
                        <!-- Fabrication Buttons -->
                        <div class="actionBtns">
                            <button type="button" id="newjoborderbtn" class="btn btn-primary" data-toggle="modal" 
                                href="#fabModal"><i class="fa fa-plus fa-fw"></i> New Order </button>
                            <button type="button" id="editbtn" class="btn btn-primary" data-toggle="modal">
                                <i class="fa fa-pencil-square-o fa-fw"></i> Edit </button>
                            <button type="button" id="updatebtn" class="btn btn-primary" data-toggle="modal">
                                <i class="fa fa-pencil-square-o fa-fw"></i> Update </button>
                            <div class="btn-group">
                                <a class="btn btn-primary"><i class="fa fa-print fa-fw"></i> Print </a>
                                <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                                <span class="fa fa-caret-down"></span></a>
                                <ul class="dropdown-menu joborder">
                                    <li><button type="button" id="preEvalbtn" class="btn btn-primary" data-toggle="modal" 
                                        href="#joPreFormModal" style="text-align:left;  margin: 0px 5px 5px 5px; width: 94%;">
                                        <i class="fa fa-file fa-fw"></i> Pre-Inspection</button></li>
                                    <li><button type="button" id="postEvalbtn" class="btn btn-primary" data-toggle="modal" 
                                        href="#joPostFormModal" style="text-align:left;  margin: 0px 5px 0px 5px; width: 94%;">
                                        <i class="fa fa-file fa-fw"></i> Post-Inspection</button></li>
                                </ul>
                            </div>
                        </div>
                        <hr>
                        <!-- Fabrication -->
                        <table  id="fabricationTable" class="table table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th data-column-id="fabricationid" data-visible="true" data-identifier="true">
                                        Fabrication ID</th>
                                    <th data-column-id="fabricationdesc">
                                        Item Name</th>
                                    <th data-column-id="fabricationquantity">
                                        Quantity</th>
                                    <th data-column-id="dateordered">
                                        Date Ordered</th>
                                    <th data-column-id="clientname">
                                        Client</th>

                                </tr>
                            </thead>  
                        </table>
                        <hr>
                    </div>
                    
                </div>
                <div class="col-md-12">
                    

                </div>
            </div>
            <div class="row tab-pane fade" id="sTab">
                <div class="col-lg-12">
                    <h2 class="page-header">Purchases</h2>
                </div>
                <div class="col-md-12">
                    

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
        
        // include 'includes/modals/modal-servicesbreakdown.php';
    ?>   
</body>
</html>