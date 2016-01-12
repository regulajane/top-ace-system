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
		$modelNo =  $_POST["modelNum"];
		$reason = $_POST["textArea"];

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
 		

		//time
		$total = $inventPrice*$quantity;
		//$saledate = date("Y-m-d");

/*		if($_POST["choice"]=="Sales"){
			$sql = "INSERT INTO sales (invoiceno, saledate, noofitems, saleprice, itemsize, itemname, total, modelno) 
					VALUES (?, ?, ?, ?, ?, ?, ?, ?)";			
			$stmt = $conn->prepare($sql);
			// Bind
			$stmt->bind_param("ssisssss", $invoiceno, $saledate, $quantity, $inventPrice, $inventSize, $inventName, $total, $modelNo);
			// Execute 
			$stmt->execute();
		}*/



		if ($quantity > $resultRow['inventoryquantity']) { 
			echo '<script type="text/javascript">'; 
			echo 'alert("Error: You are trying to procure more than the available items.");'; 
			echo 'window.location.href = "../../inventory.php";';
			echo '</script>';

		}  else {
			if($cq <= $rr) {
					//echo '<script>alert("HEHE");</script>'; 
					$nDetails = "below reorder level";
					$nDate = date("Y-m-d");
					$nTime = date("H:i:s");

					//check duplicates
					//echo "<script>alert('$inventName , $inventSize , $modelNo');</script>"; 
					$sqlcheckduplicates = "SELECT * from notification 
                                    WHERE inventoryname LIKE '$inventName' AND inventorysize LIKE '$inventSize' AND modelno LIKE '$modelNo' ";
                    $qq = $conn->query($sqlcheckduplicates);
                    $qqq = $qq->fetch_assoc();


					if($qqq==null){
						//echo "<script>alert('DITO');</script>"; 
					$sql3 = "INSERT INTO notification (inventoryname, inventorysize, modelno ,notificationdetails, ndate, time) 
								VALUES (?, ?, ?, ?, ?, ?)";

					$stmt3 = $conn->prepare($sql3);

					// Bind
					$stmt3->bind_param("ssssss", $inventName, $inventSize ,$modelNo,$nDetails, $nDate, $nTime);
					// Execute

					$stmt3->execute();
					}
			}

			
			//-----------------------------CREATE procureSupply TRIGGER------------------------------------
			$sql = 	"UPDATE inventory
					SET inventoryquantity = inventoryquantity - '$quantity'
					WHERE inventoryid = '$inventID'";
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			
			
			//-----------------------------INSERT INTO OUTGOINGSUPPLIES------------------------------------
			$sql2 = "INSERT INTO outgoingitems (isdate, time, quantity, enteredby, inventoryid, reason) 
						VALUES (?, ?, ?, ?, ?, ?)";

			$stmt2 = $conn->prepare($sql2);

			// Bind
			$stmt2->bind_param("ssssss", $otDate, $otTime, $otQty, $procuredBy, $inventID, $reason);
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