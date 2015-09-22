<?php
    include '../header.php';
    // Access Validation
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}
    if(isset($_POST["submit"])=="submit") {
        // Define Variables
        $item= $_POST["item"];
        $price= $_POST["price"];
        $quantity= $_POST["qty"];
        $dateOrdered= $_POST["purchaseDate"];
        $client= $_POST["client"];

        $sqljoNum = "SELECT clientid FROM client where firstname = '$client' ";
        $result = $conn->query($sqljoNum);
        $resultRow = $result->fetch_assoc();
        $clientid = $resultRow['clientid'];

        for($i=0 ;$i < count($_POST['item']); $i++) {
               // Prepare
            $sql1 = "INSERT INTO fabrications (itemname, fabricationprice, qty, dateor, clientid) VALUES (?, ?, ?, ?, ?)";
            $stmt1 = $conn->prepare($sql1);     
        // Bind
            $stmt1->bind_param("sssss", $item[$i], $price[$i], $quantity[$i], $dateOrdered, $clientid);
        // Execute
            $stmt1->execute();
//$stmt2->bind_param("iissi", $vehicleNo, $vehiclePartNo[$i], $notes[$i], $date, $remarkNo);
        }
        
        //-----------------------------INSERT SESSIONLOGS------------------------------------
        //$sqljoNum = "SELECT joNo FROM joborder";
        //$result = $conn->query($sqljoNum);
        //$resultRow = $result->fetch_assoc();
        //ini_set('date.timezone', 'Asia/Manila');
        //$timestamp = date("D M j G:i:s T Y");
        //$username = $_SESSION["username"];
        //$num = $resultRow['joNo'] + 1;
        //$create = "created JONumber " .$num;

        // Prepare
       // $sql = "INSERT INTO sessionlogs (username, timestamp, activity) VALUES (?, ?, ?)";          
       //$stmt = $conn->prepare($sql);
        // Bind
       // $stmt->bind_param("sss", $username, $timestamp, $create);
        // Execute 
       // $stmt->execute();
        // Redirect
        header('location:../../job-order.php');                        
    } 
    $conn->close();
?>