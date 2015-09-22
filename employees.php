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
        <!-- Job Order Buttons -->
        <div class="actionBtns">
            <button type="button" id="newjoborderbtn" class="btn btn-primary" data-toggle="modal" 
                href="#addEmployeeModal"><i class="fa fa-plus fa-fw"></i> New Employee </button>
            <button type="button" id="updateemployeebtn" class="btn btn-primary" data-toggle="modal">
                <i class="fa fa-pencil-square-o fa-fw"></i> Update Info </button>
        </div>
        <hr>
        <!-- Job Order Table -->
        <table  id="employeeTable" class="table table-condensed table-hover">
            <thead>
                <tr>
                    <th data-column-id="employeeid" data-visible="false" data-identifier="true">
                                       employee ID</th>
                    <th data-column-id="lastname">
                       Last Name</th>
                    <th data-column-id="firstname">
                        First Name</th>
                    <th data-column-id="gender">
                        Gender</th>
                    <th data-column-id="celno">
                        Celno</th>
                    <th data-column-id="address">
                        Address</th>
                    <th data-column-id="emailad">
                        Email Address</th>
                    <th data-column-id="numofjob">
                        Number of Jobs</th>
                    <th data-column-id="status">
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