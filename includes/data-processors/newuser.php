<?php
	include '../header.php';
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}
	if(isset($_POST["newuser"])=="New User") {
		// Define Variables
		$userlastname = $_POST["userln"];
		$userfirstname = $_POST["userfn"];
		$username = $_POST["username"];
		$usermidinitial = $_POST["usermi"];
		$usertype = $_POST["usertype"];

		//-----------------------------INSERT INTO ADMIN------------------------------------
		// Prepare
		$sql = "INSERT INTO users (username, userlastname, userfirstname, 
					usermidinitial, userpassword, usertype) VALUES (?, ?, ?, ?, ?, ?)";			
		$stmt = $conn->prepare($sql);
		// Bind
		$stmt->bind_param("ssssss", $username, $userlastname, $userfirstname, 
					$usermidinitial, $username, $usertype);
		// Execute 
		$stmt->execute();
	     
		// Redirect
		header('location:../../system-users.php');           			   
	}
	$conn->close();
?>