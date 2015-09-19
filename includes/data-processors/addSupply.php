<?php
	include '../header.php';
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}
	if(isset($_POST["inoutsupply"])=="Add Supply") {
		// Define Variables
		$item = $_POST["supplyName"];
		$description = $_POST["supdescription"];
		$quantity = $_POST["supquantity"];
		$supplyID = $_POST["supID"];
		//Ingoing
		ini_set('date.timezone', 'Asia/Manila');
		$isDate = date("Y-m-d"); 
		$isTime = date("H:i:s");
		$isQty = $quantity;
		$enteredBy = $_SESSION["username"];
		//-----------------------------CREATE addSupply TRIGGER------------------------------------
		$sqlTrigger = "CREATE TRIGGER addSupply
					AFTER INSERT ON ingoingsupplies
					FOR EACH ROW
					UPDATE supplies
					SET quantity = quantity + NEW.isQty
					WHERE supplyID = NEW.supplyID";
		mysqli_query($conn,$sqlTrigger);
		//-----------------------------INSERT INTO INGOINGSUPPLIES------------------------------------
		$sql2 = "INSERT INTO ingoingsupplies (isDate, isTime, isQty, enteredBy, supplyID) 
					VALUES (?, ?, ?, ?, ?)";
		$stmt2 = $conn->prepare($sql2);
		// Bind
		$stmt2->bind_param("ssiss", $isDate, $isTime, $isQty, $enteredBy, $supplyID);
		// Execute
		$stmt2->execute();
		//-----------------------------DROP addSupply TRIGGER------------------------------------
		$sqlDropTrigger = "DROP TRIGGER addSupply";
		mysqli_query($conn,$sqlDropTrigger);
		
		// Redirect
		header('location:../../supplies.php');           			   
	}
	$conn->close();
?>