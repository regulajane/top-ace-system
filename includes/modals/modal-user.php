<!-- Access validation -->
<?php
    if(!isset($_SESSION["username"])){
    header('Location: ../index.php?loggedout=true');}
?>

<!-- Modal New User -->
<div class="modal fade" id="newUsersModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">New System User</h4>
            </div>
            <div class="modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="post" 
                                action="includes/data-processors/newuser.php" id="userForm" novalidate>
                                <div class="control-group form-group">
                                    <div class="controls col-md-12">
                                        <label>Name:</label>
                                        <input type="text" class="form-control" id="newUserName" name="newUserName"
                                            required placeholder="Personnel Name"/>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <div class="controls col-md-12">
                                        <label>Username:</label>
                                        <input type="text" class="form-control" name="username" 
                                            id="username" required placeholder="Username"/>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <div class="controls col-md-12">
                                        <label>Password:</label>
                                        <input type="text" class="form-control" name="userpassword" id="userpassword"
                                            required placeholder="Password"/>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <div class="controls col-md-6">
                                        <label>Auth. Level:</label>
                                        <select class="form-control" name="userlevel" id="userlevel" required>
                                            <option value="" disabled selected>Select Authorization Level</option>
                                            <option value="1">Admin User</option>
                                            <option value="2">User</option>
                                        </select>                    
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="newuser" class="btn btn-primary" form="userForm" value="New User">
                    <span class="glyphicon glyphicon-ok-sign"></span> SAVE </button>  
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove-sign"></span> Cancel </button>
            </div>
        </div>
    </div>
</div> <!-- /.modal -->
<!-- Modal User Password -->
<div class="modal fade" id="usersModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit User Details</h4>
            </div>
            <div class="userData modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="post" 
                                action="includes/data-processors/updateuser.php" id="updateUserForm" novalidate>
                                <div class="control-group form-group">
                                    <div class="controls col-md-12" style="display: none">
                                        <label>User ID:</label>
                                        <input readonly type="text" class="form-control" id="userID" name="userID"/>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <div class="controls col-md-12">
                                        <label>Name:</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            required placeholder="Personnel Name"/>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <div class="controls col-md-12">
                                        <label>Username:</label>
                                        <input type="text" class="form-control" name="username" 
                                            id="username" required placeholder="Username"/>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <div class="controls col-md-12">
                                        <label>Password:</label>
                                        <input type="text" class="form-control" name="userpassword" id="userpassword"
                                            required placeholder="Password"/>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <div class="controls col-md-6">
                                        <label>Auth. Level:</label>
                                        <select class="form-control" name="userlevel" id="userlevel" required>
                                            <option value="" disabled selected>Select Authorization Level</option>
                                            <option value="1">Admin User</option>
                                            <option value="2">User</option>
                                        </select>                
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="edituser" class="btn btn-primary" form="updateUserForm" value="User Update">
                    <span class="glyphicon glyphicon-ok-sign"></span> SAVE </button>  
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove-sign"></span> Cancel </button>
            </div>
        </div>
    </div>
</div> <!-- /.modal -->