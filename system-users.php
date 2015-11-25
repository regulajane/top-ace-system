<!DOCTYPE html>
<html lang="en">
<head>
    <?php   include 'includes/header.php';
            include 'includes/head-elements.php'; ?>   
    <script src="js/users-script.js"></script>
    <title>System Users</title>
</head>
<body>
    <?php include 'includes/nav.php'; ?>
        <div class="pagecontainer">
        <br>
            <div id="users">
                <div class="container"> 
                <?php
                    if(isset($_GET["reset"]) && $_GET["reset"]==true){
                    echo '<div class="col-md-12 alert alert-success" role="alert">
                            <span class="glyphicon glyphicon-alert" aria-hidden="true"></span>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                <span class="glyphicon glyphicon-remove"></span></button>
                            <strong>Success!</strong> '. $_SESSION['user'] . '\'s password has been reset.
                        </div>';
                }         
                ?>    
                <h4>System Users</h4>
                <div class="actionBtns" style="position: relative; float:right; ">
                    <div style="position: relative; margin-top: -40px;">
                        <a type="button" class="btn btn-primary" href="home.php" title="Home">
                            <i class="fa fa-home fa-fw"></i> Home</a>
                    </div>
                </div>
                <hr>
                <div class="actionBtns">
                    <button type="button" id="newuserbtn" class="btn btn-info" data-toggle="modal" 
                        href="#newUsersModal"><i class="fa fa-plus fa-fw"></i> New User </button>
                    <button type="button" id="editbtn" class="btn btn-info" data-toggle="modal">
                        <i class="fa fa-edit fa-fw"></i> Edit </button>
                    <button type="button" id="resetbtn" class="btn btn-info" data-toggle="modal">
                        <i class="fa fa-edit fa-fw"></i> Reset Password </button>
                </div>
                
                <table  id="usersTable" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th data-column-id="userid" data-visible="false" data-identifier="true" > User ID </th>
                            <th data-column-id="userfirstname" > FirstName </th>
                            <th data-column-id="userlastname"  > LastName </th>
                            <th data-column-id="usermidinitial" > M.I. </th>
                            <th data-column-id="username" > Username </th>
                            <th data-column-id="usertype" > User Type</th>
                        </tr>
                    </thead>  
                </table>
                <?php include 'includes/modals/modal-user.php'; ?>
                <?php include 'includes/footer.php'; ?>
                </div>
            </div>
        </div>
    </body>
</html>