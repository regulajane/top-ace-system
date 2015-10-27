<!DOCTYPE html>
<html lang="en">
	<head>
		<?php   
	        include 'includes/header.php';
	        include 'includes/head-elements.php';   
	        if(!isset($_SESSION["username"])) {
	            header('Location: index.php?loggedout=true');}
	    ?>		<script src="js/fabr-page-script.js"></script>
		<title>Inventory</title>
	</head>
	<body>
		<?php include 'includes/nav.php'; ?>
		<div class="container">
			<hr>
			<div class="progress">
			  <div class="progress-bar" role="progressbar" aria-valuenow="70"
			  aria-valuemin="0" aria-valuemax="100" style="width:70%">
			    Metal 1 = 10 Meters
			  </div>
			</div>

			<hr>

			<div class="progress">
			  <div class="progress-bar" role="progressbar" aria-valuenow="70"
			  aria-valuemin="0" aria-valuemax="100" style="width:70%">
			    Metal 2 = 20 Meters
			  </div>
			</div>

			<hr>

			<div class="progress">
			  <div class="progress-bar" role="progressbar" aria-valuenow="70"
			  aria-valuemin="0" aria-valuemax="100" style="width:70%">
			    Metal 3 = 20 Meters
			  </div>
			</div>

			<?php include 'includes/footer.php'; ?>
		</div>
		<!-- Job Order Modals -->
		<?php 
			include 'includes/modals/modal-addnewsupply.php';
			include 'includes/modals/modal-supplies.php';
		?>   
	</body>
</html>