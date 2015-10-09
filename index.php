<!DOCTYPE html>
<html lang="en">
<head>
    <?php   
		include 'includes/header.php';
        include 'includes/head-elements.php';
        if(isset($_SESSION['username'])){
        	header("location: home.php");
        }
    ?>
    <link href="css/css-index.css" rel="stylesheet">
    <title>Login : Top Ace</title>
</head>
<body data-spy="scroll" data-target="#navbar-scroll">
	<div class="container">
		<div class="parallax">
			<div class="overlay">
				<div class="container">
					<div class="row">

						<div class="col-md-7">
							<div class="logo wow fadeInDown"> <a href=""><img src="images/top-ace-logo.png" alt="logo"></a></div>
							<h1 class="wow fadeInLeft"> Job Order System with Inventory Management </h1>
						</div> 
						<div class="col-md-5">	
							<div class="signup-header wow fadeInUp" style="border:1px solid #dadada;">
								<h3 class="form-title text-center" style="color: #3eb0f7;">LOGIN</h3>
								<form class="form-header" action="includes/login.php" role="form" method="POST" id="#">
									<div class="form-group">
										<input class="form-control input-lg" name="username" id="username" type="text" 
											placeholder="Username" required autocomplete="off">
									</div>
									<div class="form-group">
										<input class="form-control input-lg" name="password" id="password" type="password" 
											placeholder="Password" required>
									</div>
									<div class="form-group last">
										<input type="submit" class="btn btn-primary btn-block btn-lg" value="LOGIN">
									</div>
								</form>
								<br>
							</div>	
							<?php 
								if(isset($_GET["loggedout"]) && $_GET["loggedout"]==true){
						            echo 
						                '<div class="alert alert-danger animated shake" role="alert">
						                   	<span class="glyphicon glyphicon-alert" aria-hidden="true"></span>
						                   	<span class="sr-only">Error:</span> 
						                   		&nbsp;You are not logged in.
						               	</div>';
						        }
								if(isset($_GET["failed"]) && $_GET["failed"]==true){
						            echo 
						                '<div class="alert alert-danger animated shake" role="alert">
						                   	<span class="glyphicon glyphicon-alert" aria-hidden="true"></span>
						                   	<span class="sr-only">Error:</span> 
						                   		&nbsp;Invalid username or password. Please try again.
						               	</div>';
						        } 
						    ?>			
						</div>
					</div>
				</div> 
			</div> 
		</div>
		<footer>
			<br><hr>
			<div class="col-sm-4 col-sm-offset-4">
				<div class="text-center wow fadeInUp" style="font-size: 14px;"> Copyright &copy Top Ace Motor Works Inc. 2015</div>
			</div>		
		</footer>
	</div>
	<script src="js/wow.min.js"></script>
	<script> new WOW().init(); </script>
</body>
</html>