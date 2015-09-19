<?php
	include 'header.php';

	ini_set('date.timezone', 'Asia/Manila');
	$timestamp = date("D M j G:i:s T Y");
	$username = $_SESSION["username"];
	$loggedout = "logged out";

	//-----------------------------INSERT SESSIONLOGS------------------------------------
	// Prepare
	$sql = "INSERT INTO sessionlogs (username, timestamp, activity) VALUES (?, ?, ?)";          
	$stmt = $conn->prepare($sql);

	// Bind
	// $stmt->bind_param("sss", $username, $timestamp, $loggedout);

	// Execute 
	// $stmt->execute();
	
	// remove all session variables
	session_unset(); 

	// destroy the session 
	session_destroy(); 

	//redirect to index page
	header('Location: ../index.php');
?>