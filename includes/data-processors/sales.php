<?php
	include '../header.php';

    if(!isset($_SESSION["username"])){
    	header('Location: ../../index.php?loggedout=true');}

    // Define Variables
	$modelno = $_POST["salemodel"];
	$itemname = $_POST["salename"];
	$itemsize = $_POST["salesize"];
	$noofitems = $_POST["saleqty"];
	// $saleprice = $_POST["saleprice"];
	$saledate = $_POST["saledate"];

	if(isset($_POST["savedata"])=="Save") {

		$count="SELECT count(*) AS count from inventory JOIN models where 
						modelno='$modelno'
		 				&& inventoryname='$itemname' 
		 				&& inventorysize='$itemsize'";
		$rslt = $conn->query($count);
    	$nRows = $rslt->fetch_assoc();

		if ($nRows['count'] > 0) {
			// ---------------------------------------INSERT----------------------------------------------
			// Prepare
			$sql = "INSERT INTO sales (saledate, noofitems, saleprice, itemsize, itemname, total, modelno) 
					VALUES (?, ?, ?, ?, ?, ?, ?)";			
			$stmt = $conn->prepare($sql);
			// Bind
			$stmt->bind_param("sisisss", $saledate, $noofitems, $saleprice, $itemsize, $itemname, $saleprice, $modelno);
			// Execute 
			$stmt->execute();
			// Redirect
			header('location:../../sales.php');  

		} else {
			echo '<script type="text/javascript">'; 
			echo 'alert("Error: Product not available");'; 
			echo 'window.location.href = "../../inventory.php";';
			echo '</script>';
		}



	}

?>