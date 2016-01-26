<?php
include '../header.php';
    // include '../nav-jo.php';
    

    // Access Validation
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}


    	// select latest job order
		$sqlmaxjoid = "SELECT joborderid from joborders order by datebrought desc, joborderid desc limit 1";
        $r = $conn->query($sqlmaxjoid);
        $rr = $r->fetch_assoc(); 
        $maxjoid = $rr['joborderid'];

        // delete servicelogs
        $sqldelservicelogs = "DELETE from servicelogs where joborderid = '$maxjoid' ";
        $stmtdelservicelogs = $conn->prepare($sqldelservicelogs);
        $stmtdelservicelogs->execute();

        // update employees 
        $sqlemp = "UPDATE employees SET noofjobs = (noofjobs-1) where employeeid IN (SELECT employeeid from joemployees where joborderid = '$maxjoid');";
        $stmtemp = $conn->prepare($sqlemp);
        $stmtemp->execute(); 

        // delete joemployees
        $sqldeljoemployees = "DELETE from joemployees where joborderid = '$maxjoid' ";
        $stmtjoemployees = $conn->prepare($sqldeljoemployees);
        $stmtjoemployees->execute();

        // delete itemlogs
        $sqldelitemlogs = "DELETE from itemlogs where joborderid = '$maxjoid' ";
        $stmtitemlogs = $conn->prepare($sqldelitemlogs);
        $stmtitemlogs->execute();

        $sqldeljoborder = "DELETE from joborders where joborderid = '$maxjoid' ";
        $stmtjoborder = $conn->prepare($sqldeljoborder);
        $stmtjoborder->execute();

        header('location:../../job-order.php');

?>