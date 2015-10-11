<?php
	include '../header.php';
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}
	if(isset($_POST["inoutsupply"])=="Add Supply") {
		// Define Variables

		$inventID = $_POST["inventID"];
		$inventName = $_POST["inventName"];
		$inventSize = $_POST["inventSize"];
		$inventPrice = $_POST["inventPrice"];
		$quantity = $_POST["inventQtyAdded"];

		//Ingoing
		/*
		ini_set('date.timezone', 'Asia/Manila');
		$isDate = date("Y-m-d"); 
		$isTime = date("H:i:s");
		$isQty = $quantity;
		$enteredBy = $_SESSION["username"];
		*/
		//-----------------------------UPDATE INVENTORY------------------------------------
		$sql = 	"UPDATE inventory
					SET inventoryquantity = inventoryquantity + '$quantity'
					WHERE inventoryid = '$inventID'";
		$stmt = $conn->prepare($sql);
		$stmt->execute(); 
		//-----------------------------INSERT INTO INGOINGSUPPLIES------------------------------------
		/* $sql2 = "INSERT INTO ingoingsupplies (isDate, isTime, isQty, enteredBy, inventID) 
					VALUES (?, ?, ?, ?, ?)";
		$stmt2 = $conn->prepare($sql2);\

		// Bind
		$stmt2->bind_param("ssiss", $isDate, $isTime, $isQty, $enteredBy, $inventID);
		// Execute

		$stmt2->execute(); */
		//-----------------------------DROP addSupply TRIGGER------------------------------------
		/*$sqlDropTrigger = "DROP TRIGGER addSupply";
		mysqli_query($conn,$sqlDropTrigger);
		*/
		// Redirect
		header('location:../../inventory.php');           			   
	}
	$conn->close();
?>