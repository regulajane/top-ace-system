<?php
    include '../header.php';
    // Access Validation
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}
    if(isset($_POST["addsrv"])=="addservice") {
        // Define Variables
        $servicename= $_POST["servicename"];
        $serviceprice= $_POST["serviceprice"];
        $servicedesc= $_POST["servicedesc"];
        $servicedatemod= $_POST["srvdatemod"];
        
        // Prepare
        $sql = "INSERT INTO services (servicename, serviceprice, servicedesc, servicedatemod) VALUES ('$servicename','$serviceprice', '$servicedesc', '$servicedatemod')";
        $stmt = $conn->prepare($sql);     
        
        // Bind
        $stmt->bind_param("ssss", $servicename, $serviceprice, $servicedesc, $servicedatemod);

        // Execute
        $stmt->execute();
         
        // Redirect
        header('location:../../services.php');                        
    }

    $conn->close();
?>