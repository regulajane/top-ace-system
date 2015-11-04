<?php
    include '../header.php';

    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}

    if(isset($_POST["addemp"])=="addemployee") {

        // Define Variables
        $emplastname= $_POST["emplastname"];
        $empfirstname= $_POST["empfirstname"];
        $empmiddlename= $_POST["empmiddlename"];
        $empgender= $_POST["empgender"];
        $empcelno= $_POST["empcelno"];
        $empaddress= $_POST["empaddress"];
        $empemailad= $_POST["empemailad"];
        $emptype = $_POST["emptype"];


        // Prepare
        $sql = "INSERT INTO employees (emplastname, empfirstname, empmiddlename, empgender, empcelno, empaddress, empemailad, empstatus, noofjobs, emptype) VALUES (?, ?, ?, ?, ?, ?, ?, 'Active', 0,?)";
        $stmt = $conn->prepare($sql);     
        
        // Bind
        $stmt->bind_param("ssssssss", $emplastname, $empfirstname, $empmiddlename, $empgender, $empcelno, $empaddress, $empemailad, $emptype);

        // Execute
        $stmt->execute();
         
        // Redirect
        header('location:../../employees.php');                        
    }

    $conn->close();
?>