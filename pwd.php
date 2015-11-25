<!DOCTYPE html>
<html lang="en">
<head>
    <?php   include 'includes/header.php';
            include 'includes/head-elements.php'; ?>   
    <script src="js/users-script.js"></script>
    <title>Password Change</title>
</head>
<body>
    <?php include 'includes/nav.php'; ?>
        <div class="pagecontainer">
        <br>
            <div id="password">
                <div class="container">  
                <h4>Change Password</h4>
                <div class="actionBtns" style="position: relative; float:right; ">
                    <div style="position: relative; margin-top: -40px;">
                        <a type="button" class="btn btn-primary" href="home.php" title="Home">
                            <i class="fa fa-home fa-fw"></i> Home</a>
                    </div>
                </div>
                <hr>
                <div class="well">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-8">
                            <form class="form-horizontal" method="post" 
                                action="includes/data-processors/changepwd.php" id="pwdForm">
                                <div class="control-group col-md-12">
                                    <div class="form-group" style="display: none;">
                                        <label class="control-label col-md-4">User ID:</label>
                                        <?php 
                                            echo '<div class="col-md-7">
                                            <input type="text" class="form-control"  placeholder="User ID"
                                                id="userid" name="userid" value =' .$_SESSION['userid'].'>
                                        </div>' ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Old password:</label>
                                        <div class="col-md-7">
                                            <input type="password" class="form-control"  placeholder="Old password"
                                                id="oldpwd" name="oldpwd" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">New password:</label>
                                        <div class="col-md-7">
                                            <input type="password" class="form-control"  placeholder="New password"
                                                id="newpwd" name="newpwd" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Re-enter new password:</label>
                                        <div class="col-md-7">
                                            <input type="password" class="form-control"  placeholder="Re-enter new password"
                                                id="renewpwd" name="renewpwd" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4"></label>
                                        <div class="col-md-7">
                                             <?php

                        if (isset($_GET["incorrectoldpassword"]) && $_GET["incorrectoldpassword"]==true){
                            echo 
                                '<div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" 
                                        aria-hidden="true">×</button>
                                    <strong>Warning!</strong> Incorrect old password.
                                </div>';
                        } elseif (isset($_GET["passwordnotchanged"]) && $_GET["passwordnotchanged"]==true){
                            echo 
                                '<div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" 
                                        aria-hidden="true">×</button>
                                    <strong>Error!</strong> Password not changed. 
                                    <br>You entered the same old password as your new password.
                                </div>';
                        } elseif (isset($_GET["sameusernameandpassword"]) && $_GET["sameusernameandpassword"]==true){
                            echo 
                                '<div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" 
                                        aria-hidden="true">×</button>
                                    <strong>Warning!</strong> Your password cannot be the same 
                                    <br>as your username.
                                </div>';
                        } elseif (isset($_GET["failed"]) && $_GET["failed"]==true){
                            echo 
                                '<div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" 
                                        aria-hidden="true">×</button>
                                    <strong>Error!</strong> Your password confirmation 
                                    <br>did not match.
                                </div>';
                        }

                        if(isset($_GET["success"]) && $_GET["success"]==true){
                            echo 
                                '<div class="alert alert-success" role="alert">
                                <strong>Success!</strong> Your password has been changed.
                                <br /> <strong>Note:</strong> You are only allowed to change your password again the next time you login.
                                </div>';
                        }

                    ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" name="changepwd" class="btn btn-success" form="pwdForm" value="Change Password">
                                            <span class="glyphicon glyphicon-ok-sign"></span> Change Password </button>    
                                        </div> 
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php include 'includes/footer.php'; ?>
                </div>
            </div>
        </div>
    </body>
</html>