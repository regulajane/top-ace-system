<?php
	include '../header.php';

    if(!isset($_SESSION["username"])){
    	header('Location: ../../index.php?loggedout=true');}

    // Define Variables
    $invoiceno = $_POST["saleci"];
	//$modelno = $_POST["salemodel"];
	$itemnamefull = $_POST["saleitem"];
	//$itemsize = $_POST["salesize"];
	$noofitems = $_POST["saleqty"];
	// $saleprice = $_POST["saleprice"];
	$saledate = $_POST["saledate"];


	


	if(isset($_POST["savedata"])=="Save") {

			$split = explode(":", $itemnamefull);

	$modelno  = $split[0];
	$itemname = $split[1];
 		if($split[2] == 'No Size'){
 			$count="SELECT count(*) AS count from inventory JOIN models USING(modelid) where 
						modelno LIKE '$modelno'
		 				&& inventoryname LIKE '$itemname'
		 				&& inventorysize is null";
			$rslt = $conn->query($count);
	    	$nRows = $rslt->fetch_assoc();

	    	$sql="SELECT * from inventory JOIN models USING(modelid) where 
							modelno LIKE '$modelno'
			 				&& inventoryname LIKE '$itemname'
			 				&& inventorysize is null";
			$result = $conn->query($sql);
	    	$noRows = $result->fetch_assoc();
	    	$itemsize = null;
 		}else{
 			$itemsize = $split[2];
 			$count="SELECT count(*) AS count from inventory JOIN models USING(modelid) where 
								modelno LIKE '$modelno'
				 				&& inventoryname LIKE '$itemname'
				 				&& inventorysize LIKE '$itemsize'";
			$rslt = $conn->query($count);
		    $nRows = $rslt->fetch_assoc();

		    $sql="SELECT * from inventory JOIN models USING(modelid) where 
								modelno LIKE '$modelno'
				 				&& inventoryname LIKE '$itemname'
				 				&& inventorysize LIKE '$itemsize'";
			$result = $conn->query($sql);
		    $noRows = $result->fetch_assoc();
 		}	

    	$price = $noRows['inventoryprice'];
    	$inventID = $noRows['inventoryid'];

    	$total = $noofitems*$price;

		if ($nRows['count'] > 0) {
			
			$sqlqty = "SELECT inventoryquantity, reorderlevel FROM inventory WHERE inventoryid = '" .$inventID. "'";
			$result = $conn->query($sqlqty);
			$resultRow = $result->fetch_assoc();

			$cq = $resultRow['inventoryquantity'] - $noofitems;
			$rr = $resultRow['reorderlevel'];
	 		

			//time
			$saledate = date("Y-m-d");

			if ($noofitems > $resultRow['inventoryquantity']) { 
			echo '<script type="text/javascript">'; 
			echo 'alert("Error: You are trying to procure more than the available supply.");'; 
			echo 'window.location.href = "../../sales.php";';
			echo '</script>';

			}  else {
				// ---------------------------------------INSERT----------------------------------------------
				// Prepare
				$sql = "INSERT INTO sales (invoiceno, saledate, noofitems, saleprice, itemsize, itemname, total, modelno) 
						VALUES (?, ?, ?, ?, ?, ?, ?, ?)";			
				$stmt = $conn->prepare($sql);
				// Bind
				$stmt->bind_param("ssisssss", $invoiceno, $saledate, $noofitems, $price, $itemsize, $itemname, $total, $modelno);
				// Execute 
				$stmt->execute();

				//outgoing
				ini_set('date.timezone', 'Asia/Manila');
				$otDate = date("Y-m-d"); 
				$otTime = date("H:i:s");
				$otQty = $noofitems;
				$procuredBy = $_SESSION["username"];
				
				if($cq <= $rr) {
					//echo '<script>alert("HEHE");</script>'; 
					$nDetails = "below reorder level";
					$nDate = date("Y-m-d");
					$nTime = date("H:i:s");

					$sql3 = "INSERT INTO notification (inventoryname, inventorysize, modelno ,notificationdetails, ndate, time) 
								VALUES (?, ?, ?, ?, ?, ?)";

					$stmt3 = $conn->prepare($sql3);

					// Bind
					$stmt3->bind_param("ssssss", $itemname, $itemsize ,$modelno, $nDetails, $nDate, $nTime);
					// Execute

					$stmt3->execute(); 

					/*$result = $conn->query("SELECT count(*) from notification");
					$nCount = 0;

		            while ($row=mysqli_fetch_row($result))
		                 {
		                   $nCount = $row[0];
		                 }

		            $result = $conn->query("SELECT notificationdetails from notification");
					$nDetails = 0;

		            while ($row=mysqli_fetch_row($result))
		                 {
		                   $nDetails = $row[0];
		                 }*/


		            
					/*echo "<script>
								  localStorage['notif']='$nCount'
								  localStorage['nDetails']='$nDetails'
						  </script>";*/

				//echo '<script type="text/javascript">'; 
				//echo 'var notif_count = parseInt(localStorage["notif"]);';
				//echo 'var counter = notif_count + 1;';
				//echo 'localStorage["notif"] = counter;';
				//echo ' window.location = "../../inventory.php";';
				//echo '</script>';

			}
			$sql = 	"UPDATE inventory
					SET inventoryquantity = inventoryquantity - '$noofitems'
					WHERE inventoryid = '$inventID'";
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			
			$reason = "Sales";
			
			$sql2 = "INSERT INTO outgoingitems (isdate, time, quantity, enteredby, inventoryid, reason) 
						VALUES (?, ?, ?, ?, ?, ?)";

			$stmt2 = $conn->prepare($sql2);

			// Bind
			$stmt2->bind_param("ssssss", $otDate, $otTime, $otQty, $procuredBy, $inventID, $reason);
			// Execute

			$stmt2->execute(); 

			
					// Redirect
			header('location:../../sales.php');
		}  

		} else {
			echo '<script type="text/javascript">'; 
			echo 'alert("Error: Product not available");'; 
			echo 'window.location.href = "../../sales.php";';
			echo '</script>';
		}

			

	}

?>