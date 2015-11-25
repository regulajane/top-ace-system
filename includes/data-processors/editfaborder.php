<?php
    include '../header.php';
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}
    if(isset($_POST["submit"])=="submit") {

        // Update Fabrication Variables
        $num = $_POST['receiptNo'];
        $item= $_POST["item"];
        $price= $_POST["price"];
        $length= $_POST["length"];
        $machinist = $_POST["machinist"];
        $totalprice = 0;
        $metal = $_POST['metal'];
        $metaldiameter = $_POST['metaldiameter'];
        $metallength = $_POST['metallength'];
        $metallengthul = $_POST['metallengthul'];
        //-----------------------------UPDATE------------------------------------
        // Prepare 
        $sql = "DELETE from fabrications where joborderid = '$num'";
        $stmt = $conn->prepare($sql);  
        $stmt->execute();   
        
        $sqlemp = "UPDATE employees SET noofjobs = (noofjobs-1) where employeeid IN (SELECT employeeid from joemployees where joborderid = '$num');";
        $stmtemp = $conn->prepare($sqlemp);
        $stmtemp->execute();


        for($i=0 ;$i < count($_POST['price']); $i++) {        
            $totalprice = $totalprice + $price[$i];
        }   

        for($i=0 ;$i < count($_POST['item']); $i++) {
            $sqldiamul = "SELECT distinct qresult.precutitemdiamconverted, qresult.precutitemdiamul, qresult.aa from (SELECT precutitemdiamconverted, precutitemdiamul, CONCAT(precutitemdiamconverted, ' ', precutitemdiamul) as aa FROM top_ace_db.precutmetal) as qresult where aa = '$metaldiameter';";
            $result = $conn->query($sqldiamul);
            $resultRow = $result->fetch_assoc();
            $diameterul = $resultRow['precutitemdiamul'];


            $sqlmetalname = "SELECT * FROM inventoryfabrication where itemid = '$metal[$i]';";
            $result = $conn->query($sqlmetalname);
            $resultRow = $result->fetch_assoc();
            $metalname = $resultRow['itemid'];


            $sqldiamconverted = "SELECT distinct qresult.precutitemdiamconverted, qresult.precutitemdiamul, qresult.aa from (SELECT precutitemdiamconverted, precutitemdiamul, CONCAT(precutitemdiamconverted, ' ', precutitemdiamul) as aa FROM top_ace_db.precutmetal) as qresult where aa = '$metaldiameter';";
            $result = $conn->query($sqldiamconverted);
            $resultRow = $result->fetch_assoc();
            $diamconverted = $resultRow['precutitemdiamconverted'];

            $sqllengthul = "SELECT distinct precutitemlengthul FROM precutmetal where precutitemlengthul = '$metallengthul[$i]';";
            $result = $conn->query($sqllengthul);
            $resultRow = $result->fetch_assoc();
            $lengthul = $resultRow['precutitemlengthul'];

            // Prepare
            $sql2 = "INSERT INTO fabrications (fabricationdesc, fabricationmetal, fabricationmetaldiameter, fabricationmetaldiameterul, fabricationmetallength, fabricationmetallengthul, fabricationprice, joborderid) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt2 = $conn->prepare($sql2); 
        // Bind
            $stmt2->bind_param("ssssssss", $item[$i], $metalname, $diamconverted, $diameterul, $metallength[$i], $lengthul, $price[$i], $num);
        // Execute
            $stmt2->execute();
        }

        // $sqljoNum = "SELECT emplastname, empfirstname, noofjobs from joemployees join employees using (employeeid) where joborderid = 201511181;";
        // $result = $conn->query($sqljoNum);
        // $resultRow = $result->fetch_assoc();
        // $latestjoborderid = $resultRow['latestjoborder'];


        $sql = "DELETE from joemployees where joborderid = '$num'";
        $stmt = $conn->prepare($sql);  
        $stmt->execute();

        for($i=0 ;$i < count($_POST['machinist']); $i++) {
               // Prepare
            $sql3 = "INSERT INTO joemployees (joborderid, employeeid) VALUES (?, ?)";
            $stmt3 = $conn->prepare($sql3); 
        // Bind
            $stmt3->bind_param("ss", $num, $machinist[$i]);
        // Execute
            $stmt3->execute();
             $sql = "UPDATE employees SET noofjobs = (noofjobs + 1) WHERE employeeid = '$machinist[$i]'";
            $stmt = $conn->prepare($sql);     
            $stmt->execute();
        
        }


         
        $sql = "UPDATE joborders 
                SET joprice = '$totalprice'
                WHERE joborderid = '$num'";
        $stmt = $conn->prepare($sql);     
        $stmt->execute();      
        //-----------------------------INSERT SESSIONLOGS------------------------------------
        // ini_set('date.timezone', 'Asia/Manila');
        // $timestamp = date("D M j G:i:s T Y");
        // $username = $_SESSION["username"];
        // $edit = "edited JONumber " .$num;
        // // Prepare
        // $sql = "INSERT INTO sessionlogs (username, timestamp, activity) VALUES (?, ?, ?)";          
        // $stmt = $conn->prepare($sql);
        // // Bind
        // $stmt->bind_param("sss", $username, $timestamp, $edit);
        // // Execute 
        // $stmt->execute();
        // Redirect
        header('location:../../job-order.php');                    
    }
    $conn->close();
?>