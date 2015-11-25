<?php
	include '../header.php';
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}

	if(isset($_POST["edituser"])=="User Update") {
		// Define Variables
		$userid = $_POST['userid'];
		$username = $_POST["username"];
        $userlastname = $_POST["userln"];
        $userfirstname = $_POST["userfn"];
        $usermidinitial = $_POST["usermi"];
		$usertype = $_POST["usertype"];
		//-----------------------------UPDATE------------------------------------
        // Prepare
        $sql = "UPDATE users
                SET username='$username',
                    userlastname='$userlastname',
                    userfirstname= '$userfirstname',
                    usermidinitial='$usermidinitial',
                    usertype='$usertype'
                WHERE userid= '$userid'";
        $stmt = $conn->prepare($sql);     
        $stmt->execute();
	     
		// Redirect
		header('location:../../system-users.php');           			   
	}
	$conn->close();
?>