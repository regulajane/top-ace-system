<!DOCTYPE html>
<html lang="en">
<head>
    <?php   include 'includes/header.php';
            include 'includes/head-elements.php'; ?>
    
    <script src="js/script.js"></script>
    <title>Employees</title>
</head>
<body>
    <?php include 'includes/nav.php'; ?>
    <br />
    <div class="container">  
        <div class="jumbotron" style="height: 100px;">
            <h2 style="margin-top: -15px; margin-left: -60px; text-align: center;">Employees</h2>
        </div>        
        <!-- Job Order Buttons -->
        <div class="actionBtns">
            <button type="button" id="newjoborderbtn" class="btn btn-info" data-toggle="modal" 
                href="#addEmployeeModal"><i class="fa fa-plus fa-fw"></i> New Employee </button>
            <button type="button" id="updateemployeebtn" class="btn btn-info" data-toggle="modal">
                <i class="fa fa-pencil-square-o fa-fw"></i> Edit/Update </button>
        </div>
        <!-- Job Order Table -->
        <table  id="employeeTable" class="table table-condensed table-hover">
            <thead>
                <tr>
                    <th data-column-id="employeeid" data-visible="false" data-identifier="true">
                                       employee ID</th>
                    <th data-column-id="emplastname">
                       Last Name</th>
                    <th data-column-id="empfirstname">
                        First Name</th>
                    <th data-column-id="empmiddlename">
                        Middle Name</th>
                    <th data-column-id="empgender">
                        Gender</th>
                    <th data-column-id="empcelno">
                        Contact No.</th>
                    <th data-column-id="empaddress">
                        Address</th>
                    <th data-column-id="empemailad">
                        Email Address</th>
                    <th data-column-id="noofjobs">
                        No. of Jobs</th>
                    <th data-column-id="emptype" data-visible="false" data-identifier="true">
                        Role</th>
                    <th data-column-id="empstatus">
                        Status</th>
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