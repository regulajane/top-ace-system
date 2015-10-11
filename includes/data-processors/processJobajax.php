<?php
    include '../header.php';

    if(!isset($_SESSION["username"])){
    header('Location: ../index.php?loggedout=true');}

	$_SESSION['serviceNumber'] = $_POST['selectedItem'];
	$serNum = $_SESSION['serviceNumber'];

	$sql = "SELECT * FROM services WHERE serviceid ='$serNum'";

    $rs = $conn->query($sql);
    $row = $rs->fetch_assoc();

    echo json_encode($row);
?>