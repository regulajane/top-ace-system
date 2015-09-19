<?php
    include '../header.php';

    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}

    if(isset($_POST["submit"])=="submit") {

        // Define Variables
        $name= $_POST["name"];
        $engineNo= $_POST["engineNo"];
        $chassisNo= $_POST["chassisNo"];
        $status= $_POST["status"];
        $driver= $_POST["driver"];
        $acquisitionDate= $_POST["acquisitionDate"];
        $brand= $_POST["brand"];
        $model= $_POST["model"];
        $mtdbody= $_POST["mtdbody"];
        $description= $_POST["description"];
        $plateNo= $_POST["plateNo"];
        $articleNomenclature= $_POST["articleNomenclature"];
        $endItem= $_POST["endItem"];
        $acquisitionCost= $_POST["acquisitionCost"];
        $location= $_POST["location"];

        // Prepare
        $sql = "INSERT INTO vehicle (name, engineNo, chassisNo, status, driver, acquisitionDate, brand, model, mtdbody, 
                description, plateNo, articleNomenclature, endItem, acquisitionCost, location) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);     
        
        // Bind
        $stmt->bind_param("sssssssssssssss", $name, $engineNo, $chassisNo, $status, $driver, $acquisitionDate, $brand, $model, $mtdbody, 
                $description, $plateNo, $articleNomenclature, $endItem, $acquisitionCost, $location);

        // Execute
        $stmt->execute();
         
        // Redirect
        header('location:../../vehicle-records.php');                        
    }

    $conn->close();
?>