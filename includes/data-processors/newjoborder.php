<?php
    include '../header.php';
    // Access Validation
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}
    if(isset($_POST["submit"])=="submit") {
        
        // Define Variables
        $clientid = $_POST['clientid'];
        $dateBrought = $_POST['dateBrought'];
        $modelid = $_POST['modelid'];
        $engnumber = $_POST['engnumber'];
        $problem = $_POST['problem'];
        $downpayment = $_POST['downpayment'];
        $employeeid = $_POST['employeeid'];
        $pending = 'Pending';
        $serviceid = $_POST['serviceid'];
        $preparedby = $_POST['salesperson'];
        $supervisor = $_POST['supervisor'];


        
        //-----------------------------INSERT joborder TABLE------------------------------------
        $sql = "INSERT INTO joborders (problem, engineno, datebrought, downpayment, jostatus, clientid, modelno, preparedby, supervisor) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);     
        $stmt->bind_param("sisisiiii", $problem, $engnumber, $dateBrought, $downpayment, $pending, $clientid, $modelid, $preparedby, $supervisor) or mysql_error();
        $stmt->execute();

        //-----------------------------SELECT JOB ORDER ID------------------------------------
        $sqlmaxjoid = "SELECT joborderid from joborders order by joborderid desc limit 1";
        $r = $conn->query($sqlmaxjoid);
        $rr = $r->fetch_assoc(); 
        $maxjoid = $rr['joborderid'];

        //-----------------------------INSERT joemployee TABLE------------------------------------
        for($i=0 ;$i < count($_POST['employeeid']); $i++) {
            $sql3 = "INSERT INTO joemployees ( joborderid, employeeid) VALUES ( ?, ?)";
            $stmt3 = $conn->prepare($sql3);     
            $stmt3->bind_param("ii", $maxjoid, $employeeid[$i]) or mysql_error();
            $stmt3->execute();
            
        }


        // -----------------------------INSERT sessionlogs TABLE------------------------------------
        for($i=0 ;$i < count($_POST['serviceid']); $i++) {
            $sql2 = "INSERT INTO servicelogs ( joborderid, serviceid) VALUES ( ?, ?)";
            $stmt2 = $conn->prepare($sql2);     
            $stmt2->bind_param("ii", $maxjoid, $serviceid[$i]) or mysql_error();
            $stmt2->execute();
            
        }

        //-----------------------------SELECT totalprice------------------------------------
        $sqlprice = "SELECT SUM(services.serviceprice) AS totalPrice  from servicelogs join services using (serviceid) where joborderid = '$maxjoid' ";
        $rprice = $conn->query($sqlprice);
        $rrprice = $rprice->fetch_assoc(); 
        $totalprice = $rrprice['totalPrice'];

        //-----------------------------UPDATE totalprice into joborder table------------------------
        $sqlupdateprice = "UPDATE joborders SET joborders.joprice = '$totalprice' where joborderid  = '$maxjoid' ";
        $stmtprice = $conn->prepare($sqlupdateprice);
        $stmtprice->execute(); 
        

        
        
        header('location:../../job-order.php');                        
    }
    $conn->close();
?>