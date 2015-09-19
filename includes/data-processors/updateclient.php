<?php
	include '../header.php';

    if(!isset($_SESSION["username"])){
    	header('Location: ../../index.php?loggedout=true');}

    // Define Variables
    $clientid = $_POST["clientid"];
	$lastname = $_POST["clientln"];
	$firstname = $_POST["clientfn"];
	$middleinitial = $_POST["clientmi"];
	$gender = $_POST["clientgender"];
	$address = $_POST["clientadd"];
	$celno = $_POST["clientcp"];

	if (isset($_POST["updatedata"])=="Update") {
		// ---------------------------------------UPDATE----------------------------------------------
		// Prepare
		$sql = "UPDATE client
      				SET lastname = '$lastname', 
      					firstname = '$firstname', 
      					middleinitial = '$middleinitial', 
      					gender = '$gender', 
      					address = '$address', 
      					celno = '$celno'
                	WHERE clientid= '$clientid'";
        $stmt = $conn->prepare($sql);
        // Execute     
        $stmt->execute();    
	  
		// Redirect
		header('location:../../clients.php');           			   
	}
	$conn->close();
?>