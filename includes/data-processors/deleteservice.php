<?php
	include '../header.php';
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}

		// Define Variables

		$servNum = $_SESSION["servNumber"];

		//-----------------------------DELETE INVENTORY------------------------------------
		$sql = 	"DELETE FROM services WHERE serviceid = '$servNum'";
		$stmt = $conn->prepare($sql);
		$stmt->execute(); 

		header('location:../../services.php');           			   

	$conn->close();
?>