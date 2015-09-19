<?php
    include '../header.php';
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}
    if(isset($_POST["submit"])=="submit") {
        // Update JO Variables
        $num = $_SESSION['joNumber'];
        $defects= $_POST["defects"];
        $natureOfWorksToBeDone= $_POST["natureOfWorksToBeDone"];
        $partsToBeProcured= $_POST["partsToBeProcured"];
        $requestedBy= $_POST["requestedBy"];
        //-----------------------------UPDATE------------------------------------
        // Prepare
        $sql = "UPDATE joborder
                SET defects='$defects',
                    natureOfWorksToBeDone='$natureOfWorksToBeDone',
                    partsToBeProcured='$partsToBeProcured',
                    requestedBy='$requestedBy'
                WHERE joNo= '$num'";
        $stmt = $conn->prepare($sql);     
        $stmt->execute();    
        //-----------------------------INSERT SESSIONLOGS------------------------------------
        ini_set('date.timezone', 'Asia/Manila');
        $timestamp = date("D M j G:i:s T Y");
        $username = $_SESSION["username"];
        $edit = "edited JONumber " .$num;
        // Prepare
        $sql = "INSERT INTO sessionlogs (username, timestamp, activity) VALUES (?, ?, ?)";          
        $stmt = $conn->prepare($sql);
        // Bind
        $stmt->bind_param("sss", $username, $timestamp, $edit);
        // Execute 
        $stmt->execute();
        // Redirect
        header('location:../../job-order.php');                    
    }
    $conn->close();
?>