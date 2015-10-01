<?php
	include '../header.php';

    if(!isset($_SESSION["username"])){
    	header('Location: ../../index.php?loggedout=true');}

    // Define Variables
    $clientid = $_POST["clientid"];
	$cllastname = $_POST["clientln"];
	$clfirstname = $_POST["clientfn"];
	$clmidinitial = $_POST["clientmi"];
	$clgender = $_POST["clientgender"];
	$claddress = $_POST["clientadd"];
	$clcelno = $_POST["clientcp"];

	if (isset($_POST["updatedata"])=="Update") {
		// ---------------------------------------UPDATE----------------------------------------------
		// Prepare
		$sql = "UPDATE clients
      				SET cllastname = '$cllastname', 
      					clfirstname = '$clfirstname', 
      					clmidinitial = '$clmidinitial', 
      					clgender = '$clgender', 
      					claddress = '$claddress', 
      					clcelno = '$clcelno'
                	WHERE clientid = '$clientid'";
        $stmt = $conn->prepare($sql);
        // Execute     
        $stmt->execute();    
	  
		// Redirect
		header('location:../../clients.php');           			   
	}
	$conn->close();
?>