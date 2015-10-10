<?php
    include '../header.php';
    // Access Validation
    if(!isset($_SESSION["username"])){
    header('Location: ../index.php?loggedout=true');}
    // Job Order Data
	$_SESSION['joNumber'] = $_POST['selectedID'];
	$num = $_SESSION['joNumber'];
	// $sql = "SELECT * FROM joborders join clients using (clientid)
	// 		    where joborderid='$num'
	// 		    limit 1;";

    $sql = "SELECT * from servicelogs join services using (serviceid) join joborders using (joborderid) join clients using (clientid) where joborderid = '$num' limit 10;";
    $rs = $conn->query($sql);
    $row = $rs->fetch_assoc();
    echo json_encode($row);

?>