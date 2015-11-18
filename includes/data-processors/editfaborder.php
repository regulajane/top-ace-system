<?php
    include '../header.php';
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}
    if(isset($_POST["submit"])=="submit") {

        // Update JO Variables
        $num = $_POST['receiptNo'];
        $item= $_POST["item"];
        $price= $_POST["price"];
        $length= $_POST["length"];
        $machinist = $_POST["machinist"];
        $totalprice = 0;
        //-----------------------------UPDATE------------------------------------
        // Prepare 
        $sql = "DELETE from fabrications where joborderid = '$num'";
        $stmt = $conn->prepare($sql);  
        $stmt->execute();   
        

        for($i=0 ;$i < count($_POST['price']); $i++) {        
            $totalprice = $totalprice + $price[$i];
        }   

        for($i=0 ;$i < count($_POST['item']); $i++) {
               // Prepare
            $sql2 = "INSERT INTO fabrications (fabricationdesc,fabricationquantity, fabricationprice, joborderid) VALUES (?, ?, ?, ?)";
            $stmt2 = $conn->prepare($sql2); 
        // Bind
            $stmt2->bind_param("ssss", $item[$i], $length[$i], $price[$i], $num);
        // Execute
            $stmt2->execute();
        }

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