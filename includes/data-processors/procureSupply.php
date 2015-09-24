<?php
	include '../header.php';
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}
	if (isset($_POST["outsupply"])=="Procure Supply") {
		
		// Define Variables

		$inventID = $_POST["inventID"];
		$inventName = $_POST["inventName"];
		$inventType = $_POST["inventType"];
		$inventSize = $_POST["inventSize"];
		$inventPrice = $_POST["inventPrice"];
		$quantity = $_POST["inventQtyProcured"];

		//outgoing
		/*
		ini_set('date.timezone', 'Asia/Manila');
		$osDate = date("Y-m-d"); 
		$osTime = date("H:i:s");
		$osQty = $quantity;
		$procuredBy = $_SESSION["username"];
		*/
		$sqlqty = "SELECT quantity FROM inventory WHERE inventoryid = '" .$inventID. "'";
		$result = $conn->query($sqlqty);
		$resultRow = $result->fetch_assoc();
		


		if ($_POST["inventQty"] > $resultRow['quantity']) { 
			echo '<script type="text/javascript">'; 
			echo 'alert("Error: You are trying to procure more than the available supply.");'; 
			echo 'window.location.href = "../../inventory.php";';
			echo '</script>';
		} else {
			//-----------------------------CREATE procureSupply TRIGGER------------------------------------
			$sqlTrigger = "UPDATE inventory
						SET quantity = quantity - '$quantity'
						WHERE inventoryid = '$inventID'";
			mysqli_query($conn,$sqlTrigger);
			//-----------------------------INSERT INTO INGOINGSUPPLIES------------------------------------
			/*$sql2 = "INSERT INTO outgoingsupplies (osDate, osTime, osQty, procuredBy, supplyID) 
						VALUES (?, ?, ?, ?, ?)";
			$stmt2 = $conn->prepare($sql2);
			// Bind
			$stmt2->bind_param("ssiss", $osDate, $osTime, $osQty, $procuredBy, $supplyID);
			// Execute
			$stmt2->execute();*/
			//-----------------------------DROP procureSupply TRIGGER------------------------------------
			$sqlDropTrigger = "DROP TRIGGER procureSupply";
			mysqli_query($conn,$sqlDropTrigger);
			
			// Redirect
			header('location:../../inventory.php'); 
		}
	}
	$conn->close();
?>