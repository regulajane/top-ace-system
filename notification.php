<!DOCTYPE html>
<html lang="en">
	<head>
		<?php   
	        include 'includes/header.php';
	        include 'includes/head-elements.php';   
	        if(!isset($_SESSION["username"])) {
	            header('Location: index.php?loggedout=true');}
	    ?>
		<title>Notification</title>
	</head>
	<body>
		<?php include 'includes/nav.php'; ?>
		<div class="pagecontainer">
	    	<br>
			<div class="container">
				<h4>Notifications</h4>
				<hr style="margin-bottom: 70px">
				<!-- Inventory Buttons -->
	            <?php include 'includes/footer.php'; ?>
			</div> 	
		</div>
	</body>
</html>