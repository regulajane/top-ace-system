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
		$modelNo = $_POST["modelNum"];
		$rl = $_POST["rl"];
		$inventQty = $_POST["inventQty"];

		//Ingoing
		ini_set('date.timezone', 'Asia/Manila');
		$isDate = date("Y-m-d"); 
		$isTime = date("H:i:s");
		$isQty = $quantity;
		$enteredBy = $_SESSION["username"];

		//echo "<script>alert('$isDate $isTime $isQty $enteredBy $inventID')</script>";

		$sqlchecknotif = "SELECT * from notification where inventoryname = '$inventName' 
							AND inventorysize = '$inventSize' AND modelno = '$modelNo'";
        $s = $conn->query($sqlchecknotif);
        $ss = $s->fetch_assoc(); 

        if($ss==null){

        }else{
        	if(($inventQty+$quantity)>$rl){
    			$sqlgetnotif = "DELETE from notification where inventoryname = '$inventName' 
						AND inventorysize = '$inventSize' AND modelno = '$modelNo'";
		        $s = $conn->prepare($sqlgetnotif);
		        $s->execute();
        	}
        }

		//-----------------------------UPDATE INVENTORY------------------------------------
		$sql = 	"UPDATE inventory
					SET inventoryquantity = inventoryquantity + '$quantity'
					WHERE inventoryid = '$inventID'";
		$stmt = $conn->prepare($sql);
		$stmt->execute(); 

		//-----------------------------INSERT INTO INGOING ITEMS------------------------------------
		$sql2 = "INSERT INTO ingoingitems (isdate, time, quantity, enteredby, inventoryid) 
					VALUES (?, ?, ?, ?, ?)";

		$stmt2 = $conn->prepare($sql2);

		// Bind
		$stmt2->bind_param("sssss", $isDate, $isTime, $isQty, $enteredBy, $inventID);
		// Execute

		$stmt2->execute(); 

		//-----------------------------DROP addSupply TRIGGER------------------------------------
		/*$sqlDropTrigger = "DROP TRIGGER addSupply";
		mysqli_query($conn,$sqlDropTrigger);
		*/

		// Redirect
		header('location:../../inventory.php');           			   
	}
	$conn->close();
?>