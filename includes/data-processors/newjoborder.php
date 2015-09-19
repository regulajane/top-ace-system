<?php
    include '../header.php';
    // Access Validation
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}
    if(isset($_POST["submit"])=="submit") {
        // Define Variables
        $vehicleNo= $_POST["description"];
        $defects= $_POST["defects"];
        $natureOfWorksToBeDone= $_POST["natureOfWorksToBeDone"];
        $dateOfPrerepairRequest= $_POST["dateOfPrerepairRequest"];
        $partsToBeProcured= $_POST["partsToBeProcured"];
        $requestedBy= $_POST["requestedBy"];
        // Prepare
        $sql = "INSERT INTO joborder (vehicleNo, defects, natureOfWorksToBeDone, dateOfPrerepairRequest, 
                    partsToBeProcured, requestedBy) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);     
        // Bind
        $stmt->bind_param("isssss", $vehicleNo, $defects, $natureOfWorksToBeDone, $dateOfPrerepairRequest, 
                    $partsToBeProcured, $requestedBy);
        // Execute
        $stmt->execute();
        
        //-----------------------------INSERT SESSIONLOGS------------------------------------
        $sqljoNum = "SELECT joNo FROM joborder";
        $result = $conn->query($sqljoNum);
        $resultRow = $result->fetch_assoc();
        ini_set('date.timezone', 'Asia/Manila');
        $timestamp = date("D M j G:i:s T Y");
        $username = $_SESSION["username"];
        $num = $resultRow['joNo'] + 1;
        $create = "created JONumber " .$num;

        // Prepare
        $sql = "INSERT INTO sessionlogs (username, timestamp, activity) VALUES (?, ?, ?)";          
        $stmt = $conn->prepare($sql);
        // Bind
        $stmt->bind_param("sss", $username, $timestamp, $create);
        // Execute 
        $stmt->execute();
        // Redirect
        header('location:../../job-order.php');                        
    }
    $conn->close();
?>