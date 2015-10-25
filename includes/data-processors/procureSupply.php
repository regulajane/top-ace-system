<?php
	include '../header.php';
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}
	if (isset($_POST["outsupply"])=="Procure Supply") {
		
		// Define Variables
		$inventID = $_POST["inventID"];
		$inventName = $_POST["inventName"];
		$inventSize = $_POST["inventSize"];
		$inventPrice = $_POST["inventPrice"];
		$quantity = $_POST["inventQtyProcured"];

		//outgoing
		
		ini_set('date.timezone', 'Asia/Manila');
		$otDate = date("Y-m-d"); 
		$otTime = date("H:i:s");
		$otQty = $quantity;
		$procuredBy = $_SESSION["username"];
		
		$sqlqty = "SELECT inventoryquantity, reorderlevel FROM inventory WHERE inventoryid = '" .$inventID. "'";
		$result = $conn->query($sqlqty);
		$resultRow = $result->fetch_assoc();

		$cq = $resultRow['inventoryquantity'] - $quantity;
		$rr = $resultRow['reorderlevel'];
 		

		if ($quantity > $resultRow['inventoryquantity']) { 
			echo '<script type="text/javascript">'; 
			echo 'alert("Error: You are trying to procure more than the available supply.");'; 
			echo 'window.location.href = "../../inventory.php";';
			echo '</script>';

		}  else {
			if($cq < $rr) { 
			
				echo '<script type="text/javascript">'; 
				echo 'var notif_count = parseInt(localStorage["notif"]);';
				echo 'var counter = notif_count + 1;';
				echo 'localStorage["notif"] = counter;';
				echo ' window.location = "../../inventory.php";';
				echo '</script>';

			}
			//-----------------------------CREATE procureSupply TRIGGER------------------------------------
			$sql = 	"UPDATE inventory
					SET inventoryquantity = inventoryquantity - '$quantity'
					WHERE inventoryid = '$inventID'";
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			
			
			//-----------------------------INSERT INTO OUTGOINGSUPPLIES------------------------------------
		$sql2 = "INSERT INTO outgoingitems (isdate, time, quantity, enteredby, inventoryid) 
					VALUES (?, ?, ?, ?, ?)";

		$stmt2 = $conn->prepare($sql2);

		// Bind
		$stmt2->bind_param("sssss", $otDate, $otTime, $otQty, $procuredBy, $inventID);
		// Execute

		$stmt2->execute(); 

			
			// Redirect
			echo '<script type="text/javascript">'; 
			echo ' window.location = "../../inventory.php";'; 
			echo '</script>';
		}
	}
	$conn->close();
?>