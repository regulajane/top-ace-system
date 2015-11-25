<?php
    if(!isset($_SESSION["username"])){
    header('Location: ../index.php?loggedout=true');}
?>

<!-- Modal New User -->
<div class="modal fade" id="newUsersModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">New User</h4>
            </div>
            <div class="modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="post" 
                                action="includes/data-processors/newuser.php" id="userForm">
                                <div class="control-group col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Last Name:</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control"  placeholder="Last Name"
                                                id="userln" name="userln" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">First Name:</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control"  placeholder="First Name"
                                                id="userfn" name="userfn" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Middle Initial:</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control"  placeholder="Middle Initial"
                                                id="usermi" name="usermi" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">User Type:</label>
                                        <div class="controls col-md-7">
                                            <select class="form-control" name="usertype" id="usertype" required>
                                                <option value="" disabled selected>Select User Type</option>
                                                <option value="admin">Admin</option>
                                                <option value="frontdesk">Frontdesk</option>
                                            </select>                    
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Username:</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control"  placeholder="Username"
                                                id="username" name="username" required>
                                        </div>
                                    </div>
<!--                                     <div class="form-group">
                                        <label class="control-label col-md-4">Password:</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control"  placeholder="Password"
                                                id="password" name="password" required>
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">
                                            <span class="glyphicon glyphicon-remove-sign"></span> Cancel </button>
                                        <button type="submit" name="newuser" class="btn btn-success" form="userForm" value="New User">
                                            <span class="glyphicon glyphicon-ok-sign"></span> Save </button>    
                                        </div> 
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div> <!-- /.modal -->

<!-- Modal User Password -->
<div class="modal fade" id="usersModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit User</h4>
            </div>
            <div class="userData modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="post" 
                                action="includes/data-processors/updateuser.php" id="updateUserForm" >
                                <div class="control-group col-md-12">
                                    <div class="form-group" style="display: none;">
                                        <label class="control-label col-md-4">User ID:</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control"  placeholder="User ID"
                                                id="userid" name="userid" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Last Name:</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control"  placeholder="Last Name"
                                                id="userln" name="userln" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">First Name:</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control"  placeholder="First Name"
                                                id="userfn" name="userfn" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Middle Initial:</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control"  placeholder="Middle Initial"
                                                id="usermi" name="usermi" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">User Type:</label>
                                        <div class="controls col-md-7">
                                            <select class="form-control" name="usertype" id="usertype" required>
                                                <option value="" disabled selected>Select User Type</option>
                                                <option value="admin">Admin</option>
                                                <option value="frontdesk">Frontdesk</option>
                                            </select>                    
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Username:</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control"  placeholder="Username"
                                                id="username" name="username" required>
                                        </div>
                                    </div>
<!--                                     <div class="form-group">
                                        <label class="control-label col-md-4">Password:</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control"  placeholder="Password"
                                                id="password" name="password" required>
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">
                                            <span class="glyphicon glyphicon-remove-sign"></span> Cancel </button>
                                        <button type="submit" name="edituser" class="btn btn-success" form="updateUserForm" value="User Update">
                                            <span class="glyphicon glyphicon-ok-sign"></span> Save </button>    
                                        </div> 
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div> <!-- /.modal

<!-- Modal User Password -->
<div class="modal fade" id="usersResetModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel" style="color: red">Are you sure?</h4>
            </div>
            <div class="userReset modal-body">
                <!-- <div class="well"> -->
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="post" 
                                action="includes/data-processors/resetuser.php" id="resetUserForm" novalidate>
                                <div class="control-group col-md-12">
                                    <div class="form-group" style="display: none;">
                                        <label class="control-label col-md-2">User ID:</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control"  placeholder="UserID"
                                                id="resetuserid" name="resetuserid" required>
                                        </div>
                                    </div>
                                    <div class="form-group" style="display: none;">
                                        <label class="control-label col-md-2">Username:</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control"  placeholder="Username"
                                                id="resetusername" name="resetusername" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">User:</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control"  placeholder="Name"
                                                id="userCN" name="userCN" required readonly>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <!-- </div> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove-sign"></span> Cancel </button>
                <button type="submit" name="resetuser" class="btn btn-success" form="resetUserForm" value="User Reset">
                    <span class="glyphicon glyphicon-ok-sign"></span> Yes </button>
            </div>
        </div>
    </div>
</div> <!-- /.modal