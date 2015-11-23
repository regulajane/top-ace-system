<!DOCTYPE html>
<html lang="en">
	<head>
		<?php   
	        include 'includes/header.php';
	        include 'includes/head-elements.php';   
	        if(!isset($_SESSION["username"])) {
	            header('Location: index.php?loggedout=true');}
	    ?>
	    <script src="js/notification-script.js"></script>
		<title>Notification</title>
	</head>
	<body>
		<?php include 'includes/nav.php'; ?>
		<div class="pagecontainer">
	    	<br>
			<div class="container">

				<h4>Notifications</h4>
				<hr style="margin-bottom: 70px">
				<table  id="notificationTable" class="table table-condensed table-hover table-striped">
				<thead>
					<tr>
						<th data-column-id="inventoryname">Item Name</th>
						<th data-column-id="modelno" >Model No</th>
						<th data-column-id="inventorysize" >Size</th>
						<th data-column-id="notificationdetails">Reason</th>
					</tr>
					</thead>  
				</table>

	            <?php include 'includes/footer.php'; ?>
			</div> 	
		</div>
	</body>
</html>