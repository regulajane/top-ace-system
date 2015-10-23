<!DOCTYPE html>
<html lang="en">
<head>
    <?php   
		include 'includes/header.php';
        include 'includes/head-elements.php';
        if(isset($_SESSION['username'])){
        	header("location: home.php");
        }

		if(isset($_GET["loggedout"]) && $_GET["loggedout"]==true){
            echo 
                '<div class="col-md-offset-4 col-md-4">
	                <div class="alert alert-danger animated shake" role="alert">
	                   	<span class="glyphicon glyphicon-alert" aria-hidden="true"></span>
	                   	<span class="sr-only">Error:</span> 
	                   		&nbsp;You are not logged in.
	               	</div>
	            </div>';
        }
		if(isset($_GET["failed"]) && $_GET["failed"]==true){
            echo 
                '<div class="col-md-offset-4 col-md-4">
	                <div class="alert alert-danger animated shake" role="alert">
	                   	<span class="glyphicon glyphicon-alert" aria-hidden="true"></span>
	                   	<span class="sr-only">Error:</span> 
	                   		&nbsp;Invalid username or password. Please try again.
	               	</div>
	            </div>';
        } 
    ?>
    <link href="css/bootstrap-login.css" rel="stylesheet" type="text/css">
    <title>Top Ace</title>
</head>
<body>
	<div class="container animated fadeInDown">
        <div class="row">
            <div class="col-md-offset-4 col-md-4">
                <div class="wrap">
                    <img src="images/top-ace-logo.png" class="img-responsive" alt="TOP ACE" width="250" height="250">
                    <p class="form-title">Auto Supply <br>and Motor Works</p>
                    <hr />
                    <p class="sign">Log In</p>
                    <form class="login" action="includes/login.php" method="POST">
                        <input type="text" placeholder="Username" name="username" />
                        <input type="password" placeholder="Password" name ="password"/>
                        <input type="submit" value="Sign In" class="btn btn-primary btn-sm" />
                    </form>
                </div>
            </div>
        </div>

		<footer>
			<br>
			<div class="col-sm-4 col-sm-offset-4">
				<div class="text-center fadeInUp" id="loginfooter"> Copyright &copy Top Ace Motor Works Inc. 2015</div>
			</div>		
		</footer>
    </div>
</body>
</html>