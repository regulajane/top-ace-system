<?php
    include '../header.php';
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}
    if(isset($_POST["submit"])=="submit") {
        // Define Variables
        $empNum = $_SESSION['empNumber'];
        $lastname= $_POST["lastname"];
        $firstname= $_POST["firstname"];
        $gender= $_POST["gender"];
        $celno= $_POST["celno"];
        $address= $_POST["address"];
        $emailad= $_POST["emailad"];
        $status= $_POST["status"];
        $numofjob= $_POST["numofjob"];
        //-----------------------------UPDATE------------------------------------
        // Prepare
        $sql = "UPDATE employee
                SET lastname='$lastname',
                    firstname='$firstname',
                    gender='$gender',
                    celno='$celno',
                    address='$address',
                    emailad='$emailad',
                    status='$status',
                    numofjob='$numofjob'
                WHERE employeeid= '$empNum'";
        $stmt = $conn->prepare($sql);     
        $stmt->execute();         
        // Redirect
        header('location:../../employees.php');                        
    }
    $conn->close();
?>