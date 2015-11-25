<?php
	include '../header.php';
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}

	if(isset($_POST["resetuser"])=="User Reset") {
		// Define Variables
		$resetuserid = $_POST['resetuserid'];
        $resetusername= $_POST['resetusername'];
        $_SESSION['user'] = $_POST['resetusername'];
		//-----------------------------UPDATE------------------------------------
        // Prepare
        $sql = "UPDATE users
                SET userpassword='$resetusername'
                WHERE userid= '$resetuserid'";
        $stmt = $conn->prepare($sql);     
        $stmt->execute();
	     
		// Redirect
		header('location: ../../system-users.php?reset=true');           			   
	}
	$conn->close();
?>