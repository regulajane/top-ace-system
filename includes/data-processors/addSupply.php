<?php
	include '../header.php';
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}
	if(isset($_POST["inoutsupply"])=="Add Supply") {
		// Define Variables

		$inventID = $_POST["inventID"];
		$modelNumber = $_POST["modelNumber"];
		$inventName = $_POST["inventoryName"];
		$inventSize = $_POST["inventorySize"];
		$inventPrice = $_POST["inventoryPrice"];
		$quantity = $_POST["inventoryQtyAdded"];

		//Ingoing
		ini_set('date.timezone', 'Asia/Manila');
		$isDate = date("Y-m-d"); 
		$isTime = date("H:i:s");
		$isQty = $quantity;
		$enteredBy = $_SESSION["username"];

		//-----------------------------UPDATE INVENTORY------------------------------------
		$sql = 	"UPDATE inventory
					SET quantity = quantity + '$quantity'
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