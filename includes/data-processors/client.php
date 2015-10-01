<?php
	include '../header.php';

    if(!isset($_SESSION["username"])){
    	header('Location: ../../index.php?loggedout=true');}

    // Define Variables
	$cllastname = $_POST["clientln"];
	$clfirstname = $_POST["clientfn"];
	$clmidinitial = $_POST["clientmi"];
	$clgender = $_POST["clientgender"];
	$claddress = $_POST["clientadd"];
	$clcelno = $_POST["clientcp"];

	if(isset($_POST["savedata"])=="Save") {

		// ---------------------------------------INSERT----------------------------------------------
		// Prepare
		$sql = "INSERT INTO clients (cllastname, clfirstname, clmidinitial, clcelno, clgender, claddress) 
				VALUES (?, ?, ?, ?, ?, ?)";			
		$stmt = $conn->prepare($sql);
		// Bind
		$stmt->bind_param("ssssss", $cllastname, $clfirstname, $clmidinitial, $clcelno, $clgender, $claddress);
		// Execute 
		$stmt->execute();
	  
		// Redirect
		header('location:../../clients.php');  

	}
	$conn->close();
?>