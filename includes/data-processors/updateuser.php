<?php
	include '../header.php';
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}
	if(isset($_POST["edituser"])=="User Update") {
		// Define Variables
		$userNum = $_SESSION['userNumber'];
		$name = $_POST["name"];
		$username = $_POST["username"];
		$password = $_POST["userpassword"];
		$authlevel = $_POST["userlevel"];
		//-----------------------------UPDATE------------------------------------
        // Prepare
        $sql = "UPDATE admin
                SET name='$name',
                    username='$username',
                    password='$password',
                    authlevel='$authlevel'
                WHERE adminNo= '$userNum'";
        $stmt = $conn->prepare($sql);     
        $stmt->execute();
        //-----------------------------INSERT SESSIONLOGS------------------------------------
        ini_set('date.timezone', 'Asia/Manila');
        $timestamp = date("D M j G:i:s T Y");
        $username = $_SESSION["username"];
        $edit = "edited user " .$userNum;
        // Prepare
        $sql = "INSERT INTO sessionlogs (username, timestamp, activity) VALUES (?, ?, ?)";          
        $stmt = $conn->prepare($sql);
        // Bind
        $stmt->bind_param("sss", $username, $timestamp, $edit);
        // Execute 
        $stmt->execute();
	     
		// Redirect
		header('location:../../systemusers.php');           			   
	}
	$conn->close();
?>