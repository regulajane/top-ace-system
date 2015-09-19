<?php
    include '../header.php';

    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}

    if(isset($_POST["submit"])=="submit") {

        // Define Variables
        $vn = $_SESSION['vehicle'];

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
        $sql = "UPDATE vehicle
                SET name='$name',
                    engineNo='$engineNo',
                    chassisNo='$chassisNo',
                    status='$status',
                    driver='$driver',
                    acquisitionDate='$acquisitionDate',
                    brand='$brand',
                    model='$model',
                    mtdbody='$mtdbody',
                    description='$description',
                    plateNo='$plateNo',
                    articleNomenclature='$articleNomenclature',
                    endItem='$endItem',
                    acquisitionCost=$acquisitionCost,
                    location='$location'
                WHERE vehicleNo= '$vn'";
        $stmt = $conn->prepare($sql);     
        
        $stmt->execute();
         
        // Redirect
        header('location:../../vehicle-records.php');                        
    
    }

    $conn->close();
?>