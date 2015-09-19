<?php
    include '../header.php';

    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}

    if(isset($_POST["submit"])=="submit") {

        // Define Variables
        $lastname= $_POST["lastname"];
        $firstname= $_POST["firstname"];
        $gender= $_POST["gender"];
        $celno= $_POST["celno"];
        $address= $_POST["address"];
        $emailad= $_POST["emailad"];


        // Prepare
        $sql = "INSERT INTO employee (lastname, firstname, gender, celno, address, emailad, status, backjob) VALUES (?, ?, ?, ?, ?, ?, 'Active', 0)";
        $stmt = $conn->prepare($sql);     
        
        // Bind
        $stmt->bind_param("ssssss", $lastname, $firstname, $gender, $celno, $address, $emailad);

        // Execute
        $stmt->execute();
         
        // Redirect
        header('location:../../employees.php');                        
    }

    $conn->close();
?>