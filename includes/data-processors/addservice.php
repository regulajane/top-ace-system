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
        $servicestatus= $_POST["servicestatus"];
        
        // Prepare
        $sql = "INSERT INTO services (servicename, serviceprice, servicedesc, servicedatemod, servicestatus) VALUES ('$servicename','$serviceprice', '$servicedesc', '$servicedatemod', 'Offered')";
        $stmt = $conn->prepare($sql);     
        
        // Bind
        $stmt->bind_param("sssss", $servicename, $serviceprice, $servicedesc, $servicedatemod, $servicestatus);

        // Execute
        $stmt->execute();
         
        // Redirect
        header('location:../../services.php');                        
    }

    $conn->close();
?>