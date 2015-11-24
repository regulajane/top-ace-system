<!DOCTYPE html>
<html lang="en">
<head>
    <?php   
        include 'includes/header.php';
        include 'includes/head-elements.php';   
        if(isset($_SESSION["username"]) && ($_SESSION["usertype"] == "frontdesk")) {
                header('Location: index.php?loggedout=true');}
    ?>
    <script src="js/employee-script.js"></script>
    <title>Employees</title>
</head>
<body>
    <?php include 'includes/nav.php'; ?>
    <div class="pagecontainer">
    <br>
    <div class="container">        
        <!-- Job Order Buttons -->
        <div class="actionBtns">
            <button type="button" id="newjoborderbtn" class="btn btn-info" data-toggle="modal" 
                href="#addEmployeeModal"><i class="fa fa-plus fa-fw"></i> New Employee </button>
            <button type="button" id="updateemployeebtn" class="btn btn-info" data-toggle="modal">
                <i class="fa fa-pencil-square-o fa-fw"></i> Edit/Update </button>
        </div>
        <!-- Job Order Table -->
        <table  id="employeeTable" class="table table-condensed table-hover table-striped">
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
                    <th data-column-id="empgender" data-width="10%" >
                        Gender</th>
                    <th data-column-id="empcelno">
                        Contact No.</th>
                    <th data-column-id="empaddress" data-visible="false">
                        Address</th>
                    <th data-column-id="empemailad" data-visible="false">
                        Email Address</th>
                    <th data-column-id="noofjobs">
                        No. of Jobs</th>
                    <th data-column-id="emptype" data-width="10%" data-visible="false">
                        Role</th>
                    <th data-column-id="empstatus" data-width="10%" >
                        Status</th>
                </tr>
            </thead>  
        </table>
        <?php include 'includes/footer.php'; ?>
    </div>
    </div>

    <!-- Employee Modals -->
    <?php 
        include 'includes/modals/modal-employee.php';
    ?>   
</body>
</html>