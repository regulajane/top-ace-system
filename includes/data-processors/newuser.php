<?php
	include '../header.php';
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}
	if(isset($_POST["newuser"])=="New User") {
		// Define Variables
		$name = $_POST["newUserName"];
		$username = $_POST["username"];
		$password = $_POST["userpassword"];
		$authlevel = $_POST["userlevel"];

		//-----------------------------INSERT INTO ADMIN------------------------------------
		// Prepare
		$sql = "INSERT INTO admin (name, username, password, authlevel) VALUES (?, ?, ?, ?)";			
		$stmt = $conn->prepare($sql);
		// Bind
		$stmt->bind_param("ssss", $name, $username, $password, $authlevel);
		// Execute 
		$stmt->execute();
	     
		// Redirect
		header('location:../../systemusers.php');           			   
	}
	$conn->close();
?>