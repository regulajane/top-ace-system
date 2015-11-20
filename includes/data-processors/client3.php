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
	$clsince = $_POST["clientsince"];

	if(isset($_POST["savedata"])=="Save") {

		// ---------------------------------------INSERT----------------------------------------------
		// Prepare
		$sql = "INSERT INTO clients (cllastname, clfirstname, clmidinitial, clcelno, clgender, claddress, clsince) 
				VALUES (?, ?, ?, ?, ?, ?, ?)";			
		$stmt = $conn->prepare($sql);
		// Bind
		$stmt->bind_param("sssssss", $cllastname, $clfirstname, $clmidinitial, $clcelno, $clgender, $claddress, $clsince);
		// Execute 
		$stmt->execute();
	  
		// Redirect
		header('location:../../clients3.php');  

	}
	$conn->close();
?>