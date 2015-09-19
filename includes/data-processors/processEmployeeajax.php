<?php
    include '../header.php';
    // Access Validation
    if(!isset($_SESSION["username"])){
    header('Location: ../index.php?loggedout=true');}
    // Employees Data
	$_SESSION['empNumber'] = $_POST['selectedID'];
	$empNum = $_SESSION['empNumber'];
	$sql = "SELECT * FROM employee
			    where employeeid='$empNum'";
    $rs = $conn->query($sql);
    $row = $rs->fetch_assoc();
    echo json_encode($row);
?>