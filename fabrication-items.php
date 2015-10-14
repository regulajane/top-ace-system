<!DOCTYPE html>
<html lang="en">
	<head>
		<?php   include 'includes/header.php';
				include 'includes/head-elements.php'; ?>
		<script src="js/fabr-page-script.js"></script>
		<title>Inventory</title>
	</head>
	<body>
		<?php include 'includes/nav.php'; ?>
		<br />
		<div class="container">
			<div class="jumbotron" style="height: 100px;">
            	<h2 style="margin-top: -15px; margin-left: -60px; text-align: center;">Fabrication Items</h2>
        	</div>

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