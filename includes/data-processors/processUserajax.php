<?php
    include '../header.php';

    if(!isset($_SESSION["username"])){
    header('Location: ../index.php?loggedout=true');}

	$_SESSION['userNumber'] = $_POST['selectedItem'];
	$userNum = $_SESSION['userNumber'];

	$sql = "SELECT * FROM admin WHERE adminNo ='$userNum'";

    $rs = $conn->query($sql);
    $row = $rs->fetch_assoc();

    echo json_encode($row);
?>