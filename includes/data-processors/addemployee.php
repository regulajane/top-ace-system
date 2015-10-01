<?php
    include '../header.php';

    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}

    if(isset($_POST["submit"])=="submit") {

        // Define Variables
        $emplastname= $_POST["emplastname"];
        $empfirstname= $_POST["empfirstname"];
        $empmiddlename= $_POST["empmiddlename"];
        $empgender= $_POST["empgender"];
        $empcelno= $_POST["empcelno"];
        $empaddress= $_POST["empaddress"];
        $empemailad= $_POST["empemailad"];


        // Prepare
        $sql = "INSERT INTO employees (emplastname, empfirstname, empmiddlename, empgender, empcelno, empaddress, empemailad, empstatus, noofjobs) VALUES (?, ?, ?, ?, ?, ?, ?, 'Active', 0)";
        $stmt = $conn->prepare($sql);     
        
        // Bind
        $stmt->bind_param("sssssss", $emplastname, $empfirstname, $empmiddlename, $empgender, $empcelno, $empaddress, $empemailad);

        // Execute
        $stmt->execute();
         
        // Redirect
        header('location:../../employees.php');                        
    }

    $conn->close();
?>