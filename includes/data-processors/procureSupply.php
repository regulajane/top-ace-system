<?php
	include '../header.php';
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}
	if (isset($_POST["outsupply"])=="Procure Supply") {
		// Define Variables
		$item = $_POST["supplyName"];
		$description = $_POST["supdescription"];
		$quantity = $_POST["supquantity"];
		$supplyID = $_POST["supID"];
		//outgoing
		ini_set('date.timezone', 'Asia/Manila');
		$osDate = date("Y-m-d"); 
		$osTime = date("H:i:s");
		$osQty = $quantity;
		$procuredBy = $_SESSION["username"];
		$sqlqty = "SELECT quantity FROM supplies WHERE supplyID = '" .$supplyID. "'";
		$result = $conn->query($sqlqty);
		$resultRow = $result->fetch_assoc();
		if ($_POST["supquantity"] > $resultRow['quantity']) { 
			echo '<script type="text/javascript">'; 
			echo 'alert("Error: You are trying to procure more than the available supply.");'; 
			echo 'window.location.href = "../../supplies.php";';
			echo '</script>';
		} else {
			//-----------------------------CREATE procureSupply TRIGGER------------------------------------
			$sqlTrigger = "CREATE TRIGGER procureSupply
						AFTER INSERT ON outgoingsupplies
						FOR EACH ROW
						UPDATE supplies
						SET quantity = quantity - NEW.osQty
						WHERE supplyID = NEW.supplyID";
			mysqli_query($conn,$sqlTrigger);
			//-----------------------------INSERT INTO INGOINGSUPPLIES------------------------------------
			$sql2 = "INSERT INTO outgoingsupplies (osDate, osTime, osQty, procuredBy, supplyID) 
						VALUES (?, ?, ?, ?, ?)";
			$stmt2 = $conn->prepare($sql2);
			// Bind
			$stmt2->bind_param("ssiss", $osDate, $osTime, $osQty, $procuredBy, $supplyID);
			// Execute
			$stmt2->execute();
			//-----------------------------DROP procureSupply TRIGGER------------------------------------
			$sqlDropTrigger = "DROP TRIGGER procureSupply";
			mysqli_query($conn,$sqlDropTrigger);
			
			// Redirect
			header('location:../../supplies.php'); 
		}
	}
	$conn->close();
?>