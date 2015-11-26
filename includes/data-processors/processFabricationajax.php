<?php
    include '../header.php';

    if(!isset($_SESSION["username"])){
    header('Location: ../index.php?loggedout=true');}

	$_SESSION['itemid'] = $_POST['selectedItem'];
	$itemid = $_SESSION['itemid'];

	$sql = "SELECT * FROM inventoryfabrication WHERE itemid ='$itemid'";

    $rs = $conn->query($sql);
    $row = $rs->fetch_assoc();

    echo json_encode($row);
?>