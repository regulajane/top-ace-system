<?php
    include '../header.php';

    if(!isset($_SESSION["username"])){
    header('Location: ../index.php?loggedout=true');}

	$_SESSION['clientID'] = $_POST['selectedID'];
	$clientID = $_SESSION['clientID'];

	$sql = "SELECT * FROM client WHERE clientID ='$clientID'";

    $rs = $conn->query($sql);
    $row = $rs->fetch_assoc();

    echo json_encode($row);
?>