<?php
    include '../header.php';
    // Access Validation
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}
    if(isset($_POST["submit"])=="submit") {
        // Define Variables
        $item= $_POST["item"];
        $price= $_POST["price"];
        $dateOrdered= $_POST["dateOrdered"];
        $client= $_POST["client"];
        $downpayment = $_POST["downpayment"];
        $machinist = $_POST["machinist"];
        $totalprice = 0;
        $pending = "pending";
        $fabrication = "Fabrication";
        $preparedby = $_POST['salesperson'];
        $supervisor = $_POST['supervisor'];
        $metal = $_POST['metal'];
        $metaldiameter = $_POST['metaldiameter'];
        $metallength = ($_POST['metallength']);
        $metallengthul = $_POST['metallengthul'];
        $counter = 0;
        
         $sqljoNum = "SELECT clientid FROM clients where clientid = '$client' ";
         $result = $conn->query($sqljoNum);
         $resultRow = $result->fetch_assoc();
         $clientid = $resultRow['clientid'];

        for($k=0 ;$k < count($_POST['price']); $k++) {        
             
            if(intval($price[$k]) < 0){
                echo    "<script>alert('Error! Invalid Price value. Please enter a value greater than 0.');
                        window.history.back();
                        </script>";
                $counter = 1;
                break;
            }
        }
        if($counter == 0){
            for($i=0 ;$i < count($_POST['price']); $i++) {        
                $totalprice = $totalprice + $price[$i];
            }
            $sqlcountjo = "SELECT COUNT(*)+1 AS countall, case when DAY(curdate()) < 10 THEN CONCAT(YEAR(curdate()),MONTH(curdate()),CONCAT(0, DAY(curdate()))) ELSE concat(YEAR(curdate()),MONTH(curdate()),DAY(curdate())) END AS curdate from joborders;";
            $s = $conn->query($sqlcountjo);
            $ss = $s->fetch_assoc(); 
            $countjo = $ss['curdate'].$ss['countall'];

            $balance = $totalprice - $downpayment;

            $sql1 = "INSERT INTO joborders (joborderid, datebrought, downpayment, joprice, jostatus, preparedby, supervisor, jotype, clientid, balance) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt1 = $conn->prepare($sql1);     
            // Bind
            $stmt1->bind_param("ssssssssss", $countjo, $dateOrdered, $downpayment, $totalprice, $pending, $preparedby, $supervisor, $fabrication, $clientid, $balance);
            // Execute
            $stmt1->execute();

            $sqljoNum = "SELECT max(joborderid) as latestjoborder FROM joborders";
             $result = $conn->query($sqljoNum);
             $resultRow = $result->fetch_assoc();
             $latestjoborderid = $resultRow['latestjoborder'];

            for($i=0 ;$i < count($_POST['item']); $i++) {
                if ($_POST['item'][$i] != ''){
                     // Prepare
                    $sqldiamul = "SELECT precutitemdiamul FROM precutmetal where precutmetalid = '$metal[$i]';";
                    $result = $conn->query($sqldiamul);
                    $resultRow = $result->fetch_assoc();
                    $diameterul = $resultRow['precutitemdiamul'];

                    $sqlmetalname = "SELECT * FROM inventoryfabrication where itemid = '$metal[$i]';";
                    $result = $conn->query($sqlmetalname);
                    $resultRow = $result->fetch_assoc();
                    $metalname = $resultRow['itemid'];


                    $sqldiamconverted = "SELECT precutitemdiamconverted FROM precutmetal where precutmetalid = '$metaldiameter[$i]';";
                    $result = $conn->query($sqldiamconverted);
                    $resultRow = $result->fetch_assoc();
                    $diamconverted = $resultRow['precutitemdiamconverted'];

                    $sqllengthul = "SELECT precutitemlengthul FROM precutmetal where precutmetalid = '$metallengthul[$i]';";
                    $result = $conn->query($sqllengthul);
                    $resultRow = $result->fetch_assoc();
                    $lengthul = $resultRow['precutitemlengthul'];

                    $sql2 = "INSERT INTO fabrications (fabricationdesc, fabricationmetal, fabricationmetaldiameter, fabricationmetaldiameterul, fabricationmetallength, fabricationmetallengthul, fabricationprice, joborderid) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt2 = $conn->prepare($sql2); 
                // Bind
                    $stmt2->bind_param("ssssssss", $item[$i], $metalname, $diamconverted, $diameterul, $metallength[$i], $lengthul, $price[$i], $latestjoborderid);
                // Execute
                    $stmt2->execute();
                   
                }
            }

            for($i=0 ;$i < count($_POST['machinist']); $i++) {
            // Prepare
                
                $sql3 = "INSERT INTO joemployees (joborderid, employeeid) VALUES (?, ?)";
                $stmt3 = $conn->prepare($sql3); 
            // Bind
                $stmt3->bind_param("ss", $latestjoborderid, $machinist[$i]);
            // Execute
                $stmt3->execute();

                $sql = "UPDATE employees SET noofjobs = (noofjobs + 1) WHERE employeeid = '$machinist[$i]'";
                $stmt = $conn->prepare($sql);     
                $stmt->execute(); 
            }
            header('location:../../job-order.php');    
        }

        
    } 
    $conn->close();
?>