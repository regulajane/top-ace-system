<?php
    include '../header.php';
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}

    

    
    if(isset($_POST["submit"])=="submit") {
        $receiptNo = $_POST['receiptNo'];
        $faborderstatus = $_POST['faborderstatus'];
        $fabricationsordered = $_POST['fabricationsordered'];
        $payment = $_POST['paymentfab'];

        // echo $receiptNo;
        for($i=0 ;$i < count($_POST['fabricationsordered']); $i++) {
            $sqlfabid = "SELECT fabricationid from fabrications where fabricationdesc = '$fabricationsordered[$i]' ";
            $result = $conn->query($sqlfabid); 

            while($resultRow = $result->fetch_assoc()){
                $fid = $resultRow['fabricationid'];

                $sql = "UPDATE fabrications SET fabricationstatus = ? where joborderid = $receiptNo and fabricationid = '$fid' ";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $faborderstatus[$i]  );
                $stmt->execute();
            }
            
        }

        // Check if any of the fabrication is started
        $sqlpstarted = "SELECT fabricationstatus from fabrications where fabricationstatus  = 'Started' and joborderid = '$receiptNo' ";
        $resultstarted = $conn->query($sqlpstarted);
        while($resultRowStarted = $resultstarted->fetch_assoc()){
            $started = $resultRowStarted['fabricationstatus'];
        }

        // check if the date started has value
        $sqldstarted= "SELECT datestarted from joborders where joborderid = '$receiptNo' ";
        $resultdstarted = $conn->query($sqldstarted);
        while($resultRowdStarted = $resultdstarted->fetch_assoc()){
            $dstarted = $resultRowdStarted['datestarted'];
        }
     
        // update date started
        if($started == "Started" AND empty($dstarted) ){
            $sqldatestarted = "UPDATE joborders set datestarted = CURDATE(), jostatus = 'Ongoing' where joborderid = '$receiptNo' ";
            $stmtstarted = $conn->prepare($sqldatestarted);
            $stmtstarted->execute();

            // $sqlinvtyid = "SELECT inventoryid,itemquantity from itemlogs where joborderid = '$receiptNo' ";
            // $resultinvtyid= $conn->query($sqlinvtyid);
            // while($resultRowinvty = $resultinvtyid->fetch_assoc()){
            //     $invtyid = $resultRowinvty['inventoryid'];
            //     $invtyqty = $resultRowinvty['itemquantity'];

            //     $sqlinvty = "UPDATE inventory SET inventoryquantity = (inventoryquantity - '$invtyqty' ) where inventoryid = '$invtyid'; ";
            //     $stmtinvty = $conn->prepare($sqlinvty);
            //     $stmtinvty->execute();
            // }

            
            
        }

        // count fabrication ordered where status is done
        $sqlasdone = "SELECT COUNT(fabricationstatus) AS countasdone from fabrications where fabricationstatus  = 'Done' and joborderid = '$receiptNo' ";
        $resultasdone= $conn->query($sqlasdone);
        while($resultRowSaDone = $resultasdone->fetch_assoc()){
            $fabdone = $resultRowSaDone['countasdone'];
        }

        // count fabrication ordered
        $sqlfo = "SELECT COUNT(fabricationstatus) AS countfab from fabrications where joborderid = '$receiptNo' ";
        $resultfab= $conn->query($sqlfo);
        while($resultRowSa = $resultfab->fetch_assoc()){
            $fo = $resultRowSa['countfab'];
        }

        // update date finished and job order status
        if($fabdone == $fo){

            $sqlstat = "SELECT jostatus from joborders  where joborderid = '$receiptNo' ";
            $resultstat= $conn->query($sqlstat);
            $resultRowStat = $resultstat->fetch_assoc();
            $stat = $resultRowStat['jostatus'];

            // check status if Done to prevent negative number in active jobs
            if($stat == "Done"){

            }else{
                $sqlemp = "UPDATE employees SET noofjobs = (noofjobs-1) where employeeid IN (SELECT employeeid from joemployees where joborderid = '$receiptNo');";
                $stmtemp = $conn->prepare($sqlemp);
                $stmtemp->execute();  
            }
            
            $sqldatefinished = "UPDATE joborders set datefinished = CURDATE(), jostatus = 'Done' where joborderid = '$receiptNo' ";
            $stmtfinished = $conn->prepare($sqldatefinished);
            $stmtfinished->execute();

        }

        // select balance
        $sqlbal = "SELECT balance from joborders where joborderid = '$receiptNo' ";
        $resultbal= $conn->query($sqlbal);
        $resultRowSBal = $resultbal->fetch_assoc();
        $bal = $resultRowSBal['balance'];

        $tempbal = $bal-$payment;

        // update payment
        $sqlpayment = "UPDATE joborders SET balance = '$tempbal' where joborderid = '$receiptNo' ";
        $stmtpayment = $conn->prepare($sqlpayment);
        $stmtpayment->execute();

        // update no of jobs

        header('location:../../job-order.php');                        
    }
    $conn->close();
?>