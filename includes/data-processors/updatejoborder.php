<?php
    include '../header.php';
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}
    // Update Job Order
    $presql = "SELECT remarkNo FROM remarks order by remarkNo desc limit 1;";
            $rs = $conn->query($presql);
            $resultRow = $rs->fetch_assoc();
    $remarkNo = $resultRow['remarkNo'] + 1;
    if(isset($_POST["submit"])=="submit") {
        // Update JO Variables
        $num = $_SESSION['joNumber'];
        $dateOfPostrepairRequest= $_POST["dateOfPostrepairRequest"];
        $contractNo= $_POST["contractNo"];
        $amount= $_POST["amount"];
        $accountOf= $_POST["accountOf"];
        $deliveredAt= $_POST["deliveredAt"];
        $dateDelivered= $_POST["dateDelivered"];
        $contractor= $_POST["contractor"];
        $invoiceReceiptNo= $_POST["invoiceReceiptNo"];
        // MD Variables
        $vehicleNo= $_POST["vehicleNo"];
        $vehiclePartNo = $_POST["vehiclePartNo"];
        $notes = $_POST["notes"];
        $date = $_POST["dateOfPostrepairRequest"];
        // Remarks Variable
        $remark= $_POST["remark"];
        $remarkID= date("YmdHis");
        //-----------------------------UPDATE------------------------------------
        // Prepare
        $sql = "UPDATE joborder
                SET dateOfPostrepairRequest='$dateOfPostrepairRequest',
                    contractNo='$contractNo',
                    amount='$amount',
                    accountOf='$accountOf',
                    deliveredAt='$deliveredAt',
                    dateDelivered='$dateDelivered',
                    contractor='$contractor',
                    invoiceReceiptNo='$invoiceReceiptNo',
                    joStatus='Done'
                WHERE joNo= '$num'";
        $stmt = $conn->prepare($sql);     
        $stmt->execute();
        //-----------------------------INSERT------------------------------------
        for($i=0 ;$i < count($_POST['vehiclePartNo']); $i++) {
            if ($_POST['remark'][$i] != '') {
                // Prepare
                $sql3 = "INSERT INTO remarks (remarkNo, remark) VALUES (?, ?)";
                // Prepare
                $sql2 = "INSERT INTO maintenancedetails (vehicleNo, vehiclePartNo, notes, date, remarkNo) VALUES (?, ?, ?, ?, ?)";
                $stmt3 = $conn->prepare($sql3);     
                $stmt2 = $conn->prepare($sql2);     
                // Bind
                $stmt3->bind_param("is", $remarkNo, $remark[$i]);
                // Bind
                $stmt2->bind_param("iissi", $vehicleNo, $vehiclePartNo[$i], $notes[$i], $date, $remarkNo);
                // Execute
                $stmt3->execute();
                // Execute
                $stmt2->execute();
                // Increment remarkNo
                $remarkNo = $remarkNo + 1;
            } else {
                // Prepare
                $sql2 = "INSERT INTO maintenancedetails (vehicleNo, vehiclePartNo, notes, date) VALUES (?, ?, ?, ?)";
                $stmt2 = $conn->prepare($sql2);     
                // Bind
                $stmt2->bind_param("iiss", $vehicleNo, $vehiclePartNo[$i], $notes[$i], $date);
                // Execute
                $stmt2->execute();
            }
        }
        //-----------------------------INSERT SESSIONLOGS------------------------------------
        ini_set('date.timezone', 'Asia/Manila');
        $timestamp = date("D M j G:i:s T Y");
        $username = $_SESSION["username"];
        $edit = "updated JONumber " .$num;
        // Prepare
        $sql = "INSERT INTO sessionlogs (username, timestamp, activity) VALUES (?, ?, ?)";          
        $stmt = $conn->prepare($sql);
        // Bind
        $stmt->bind_param("sss", $username, $timestamp, $edit);
        // Execute 
        $stmt->execute();
        // Redirect
        header('location:../../job-order.php');                        
    }
    $conn->close();
?>