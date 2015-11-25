<?php
    include '../header.php';

    if(!isset($_SESSION["username"])){
    header('Location: ../index.php?loggedout=true');}

	$_SESSION['resetuserid'] = $_POST['selectedID'];
	$resetuserid = $_SESSION['resetuserid'];

	$sql = "SELECT * FROM users WHERE userid ='$resetuserid'";

    $rs = $conn->query($sql);
    $row = $rs->fetch_assoc();

    echo json_encode($row);
?>