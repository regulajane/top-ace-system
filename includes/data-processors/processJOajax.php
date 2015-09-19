<?php
    include '../header.php';
    // Access Validation
    if(!isset($_SESSION["username"])){
    header('Location: ../index.php?loggedout=true');}
    // Job Order Data
	$_SESSION['joNumber'] = $_POST['selectedID'];
	$num = $_SESSION['joNumber'];
	$sql = "SELECT * FROM ((vehicle left outer join joborder using (vehicleNo)) 
				left outer join maintenancedetails using (vehicleNo))
				left outer join vehicleparts using (vehiclePartNo)
			    where joNo='$num'
			    order by date desc
			    limit 1;";
    $rs = $conn->query($sql);
    $row = $rs->fetch_assoc();
    echo json_encode($row);
?>