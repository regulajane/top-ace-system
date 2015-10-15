<?php
    include '../header.php';

    if(!isset($_SESSION["username"])){
    header('Location: ../index.php?loggedout=true');}

	$_SESSION['servNumber'] = $_POST['selectedID'];
	$servNum = $_SESSION['servNumber'];

	$sql = "SELECT * FROM services WHERE serviceid ='$servNum'";

    $rs = $conn->query($sql);
    $row = $rs->fetch_assoc();

    echo json_encode($row);
?>