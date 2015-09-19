<?php
	include '../header.php';
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}
	if(isset($_POST["newsupply"])=="New Supply") {
		// Define Variables
		$item = $_POST["newSupplyName"];
		$description = $_POST["supdescription"];
		$quantity = $_POST["supquantity"];
		$supplyID = 'S' . date("YmdHis");
		//Ingoing
		ini_set('date.timezone', 'Asia/Manila');
		$isDate = date("Y-m-d"); 
		$isTime = date("H:i:s");
		$isQty = $quantity;
		$enteredBy = $_SESSION["username"];
		//-----------------------------INSERT INTO SUPPLIES------------------------------------
		// Prepare
		$sql = "INSERT INTO supplies (item, description, quantity, supplyID) VALUES (?, ?, ?, ?)";			
		$stmt = $conn->prepare($sql);
		// Bind
		$stmt->bind_param("ssis", $item, $description, $quantity, $supplyID);
		// Execute 
		$stmt->execute();
		//-----------------------------INSERT INTO INGOINGSUPPLIES------------------------------------
		$sql2 = "INSERT INTO ingoingsupplies (isDate, isTime, isQty, enteredBy, supplyID) VALUES (?, ?, ?, ?, ?)";
		$stmt2 = $conn->prepare($sql2);
		// Bind
		$stmt2->bind_param("ssiss", $isDate, $isTime, $isQty, $enteredBy, $supplyID);
		// Execute
		$stmt2->execute();
	     
		// Redirect
		header('location:../../supplies.php');           			   
	}
	$conn->close();
?>