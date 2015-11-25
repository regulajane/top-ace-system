<?php
    include '../header.php';
    // include '../nav-jo.php';
    

    // Access Validation
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}
    
    if(isset($_POST["submit"])=="submit") {

    	$downpayment = $_POST['downpayment'];
        $markup = $_POST['markup'];
        $discount = $_POST['discount'];
        $sbsupervisor = $_POST['sbsupervisor'];
        $adjustments = $markup-$discount;

    	//-----------------------------SELECT JOB ORDER ID------------------------------------
    	$sqlmaxjoid = "SELECT joborderid from joborders order by joborderid desc limit 1";
        $r = $conn->query($sqlmaxjoid);
        $rr = $r->fetch_assoc(); 
        $maxjoid = $rr['joborderid'];

        //-----------------------------UPDATE DOWNPAYMENT------------------------------------
    	$sqldp = "UPDATE joborders SET downpayment = '$downpayment' where joborderid = ? ";
      	$stmt4 = $conn->prepare($sqldp);     
        $stmt4->bind_param("i", $maxjoid) or mysql_error();
        $stmt4->execute();

        //-----------------------------Insert adjustments------------------------------------
        $sqladjustments = "UPDATE joborders SET adjustments = '$adjustments' where joborderid = '$maxjoid' ";
        $stmtadjustments = $conn->prepare($sqladjustments);     
        $stmtadjustments->execute();

    	//-----------------------------UPDATE Service Breakdown supervisor------------------------------------
        $sqlsbs = "UPDATE joborders SET sbsupervisor = '$sbsupervisor' where joborderid = ? ";
        $stmtsbs = $conn->prepare($sqlsbs);     
        $stmtsbs->bind_param("i", $maxjoid) or mysql_error();
        $stmtsbs->execute();

    	//-----------------------------SELECT services availed total price------------------------------------
        $sqlprice = "SELECT SUM(services.serviceprice) AS totalPrice  from servicelogs join services using (serviceid) where joborderid = '$maxjoid' ";
        $rprice = $conn->query($sqlprice);
        $rrprice = $rprice->fetch_assoc(); 
        $totalprice = $rrprice['totalPrice'];

        //-----------------------------SELECT Item list total price------------------------------------
        $sqltotalitemprice = "SELECT SUM(itemprice*itemquantity) AS totalitemprice from itemlogs where joborderid = '$maxjoid' ";
        $iprice = $conn->query($sqltotalitemprice);
        $iiprice = $iprice->fetch_assoc(); 
        $totalitemprice = $iiprice['totalitemprice'];

        $tempgrandtotal = $totalprice + $totalitemprice + $markup - $discount;

        //-----------------------------UPDATE totalprice into joborder table------------------------
        $sqlupdateprice = "UPDATE joborders SET joborders.joprice = '$tempgrandtotal' where joborderid  = '$maxjoid' ";
        $stmtprice = $conn->prepare($sqlupdateprice);
        $stmtprice->execute(); 

        // update balance
        $bal = $tempgrandtotal - $downpayment;
        $sqlupdatebalance = "UPDATE joborders SET balance = $bal where joborderid = '$maxjoid' ";
        $stmtbal = $conn->prepare($sqlupdatebalance);
        $stmtbal->execute(); 

    	header('location:../../job-order.php');           			   
    }

?>