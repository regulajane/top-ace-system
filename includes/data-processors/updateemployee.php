<?php
    include '../header.php';
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}
    if(isset($_POST["submit"])=="submit") {
        // Define Variables
        $empNum = $_SESSION['empNumber'];
        $emplastname= $_POST["emplastname"];
        $empfirstname= $_POST["empfirstname"];
        $empmiddlename= $_POST["empmiddlename"];
        $empgender= $_POST["empgender"];
        $empcelno= $_POST["empcelno"];
        $empaddress= $_POST["empaddress"];
        $empemailad= $_POST["empemailad"];
        $empstatus= $_POST["empstatus"];
        $noofjobs= $_POST["noofjobs"];
        $emptype= $_POST["emptype"];
        

        //-----------------------------UPDATE------------------------------------
        // Prepare
        $sql = "UPDATE employees
                SET emplastname='$emplastname',
                    empfirstname='$empfirstname',
                    empmiddlename='$empmiddlename',
                    empgender='$empgender',
                    empcelno='$empcelno',
                    empaddress='$empaddress',
                    empemailad='$empemailad',
                    empstatus='$empstatus',
                    noofjobs='$noofjobs',
                    emptype='$emptype'
                WHERE employeeid= '$empNum'";
        $stmt = $conn->prepare($sql);     
        $stmt->execute();         
        // Redirect
        header('location:../../employees.php');                        
    }
    $conn->close();
?>