<?php
	include '../header.php';

    if(!isset($_SESSION["username"])){
    	header('Location: ../../index.php?loggedout=true');}

    // Define Variables
	$lastname = $_POST["clientln"];
	$firstname = $_POST["clientfn"];
	$middleinitial = $_POST["clientmi"];
	$gender = $_POST["clientgender"];
	$address = $_POST["clientadd"];
	$celno = $_POST["clientcp"];

	if(isset($_POST["savedata"])=="Save") {

		// ---------------------------------------INSERT----------------------------------------------
		// Prepare
		$sql = "INSERT INTO client (lastname, firstname, middleinitial, gender, address, celno) 
				VALUES (?, ?, ?, ?, ?, ?)";			
		$stmt = $conn->prepare($sql);
		// Bind
		$stmt->bind_param("sssssi", $lastname, $firstname, $middleinitial, $gender, $address, $celno);
		// Execute 
		$stmt->execute();
	  
		// Redirect
		header('location:../../clients.php');  

	}
	$conn->close();
?>