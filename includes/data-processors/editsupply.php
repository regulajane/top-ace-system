	<?php
	    include '../header.php';
	    if(!isset($_SESSION["username"])){
	    header('Location: ../../index.php?loggedout=true');}

	    if(isset($_POST["editsupply"])=="Edit Supply") {

		$inventID = $_POST["inventID"];
		$inventName=$_POST["inventName"];
		$inventSize = $_POST["inventSize"];
		$inventPrice = $_POST["inventPrice"];
		$inventRL= $_POST["inventRL"];

		//$modelno= $_POST['modelno'];

		$sql = "UPDATE inventory 
		        SET inventoryname 	= '$inventName', 
		        	inventorysize 	= '$inventSize',
		        	inventoryprice	= '$inventPrice',
		        	reorderlevel    = '$inventRL'
				WHERE inventoryid= '$inventID'";

		$stmt = $conn->prepare($sql);

		$stmt->execute(); 
	
	 header('location:../../inventory.php');  
	 }
	 $conn->close();
	?>