<?php
	include '../header.php';

    if(!isset($_SESSION["username"])){
    	header('Location: ../../index.php?loggedout=true');}

    // Define Variables
    $servNum = $_SESSION['servNumber'];
    $servicename = $_POST["servicename"];
	$serviceprice = $_POST["serviceprice"];
	$servicedesc = $_POST["servicedesc"];
	$servicedatemod = $_POST["servicedatemod"];

	if (isset($_POST["updatesrv"])=="updateservice") {
		// ---------------------------------------UPDATE----------------------------------------------
		// Prepare
		$sql = "UPDATE services
      				SET servicename = '$servicename', 
      					serviceprice = '$serviceprice',
      					servicedesc = '$servicedesc',
      					servicedatemod = '$servicedatemod'
                	WHERE serviceid = '$servNum'";
        $stmt = $conn->prepare($sql);
        // Execute     
        $stmt->execute();    
	  
		// Redirect
		header('location:../../services.php');           			   
	}
	$conn->close();
?>