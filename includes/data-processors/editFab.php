	<?php
	    include '../header.php';
	    if(!isset($_SESSION["username"])){
	    header('Location: ../../index.php?loggedout=true');}

	    if(isset($_POST["editfab"])=="Edit Fab") {

		$itemid = $_POST["itemid"];
        $itemname = $_POST["itemname"];
        $itemsizediam = $_POST["itemsizediam"];
        $itemsizelength = $_POST["itemsizelength"];

		$sql = "UPDATE inventoryfabrication 
		        SET itemname	= '$itemname', 
		        	itemsizediam	= '$itemsizediam',
		        	itemsizelength	= '$itemsizelength'
				WHERE itemid= '$itemid'";

		$stmt = $conn->prepare($sql);

		$stmt->execute(); 
	
      header('location:../../fabrication-items.php');    
	 }
	 $conn->close();
	?>