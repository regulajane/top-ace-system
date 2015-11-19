<?php
    include '../header.php';
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}

    

    
    if(isset($_POST["submit"])=="submit") {
        $receiptNo = $_POST['receiptNo'];
        $servicestatus = $_POST['servicestatus'];
        $servicesavailed = $_POST['servicesavailed'];
        $payment = $_POST['payment'];

        // echo $receiptNo;
        for($i=0 ;$i < count($_POST['servicesavailed']); $i++) {
            $sqlsrvid = "SELECT serviceid from services where servicename = '$servicesavailed[$i]' ";
            $result = $conn->query($sqlsrvid); 

            while($resultRow = $result->fetch_assoc()){
                $sid = $resultRow['serviceid'];

                $sql = "UPDATE servicelogs SET servicestatus = ? where joborderid = $receiptNo and serviceid = '$sid' ";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $servicestatus[$i]  );
                $stmt->execute();
            }
            
        }

        // Check if any of the services is started
        $sqlpstarted = "SELECT servicestatus from servicelogs where servicestatus  = 'Started' and joborderid = '$receiptNo' ";
        $resultstarted = $conn->query($sqlpstarted);
        while($resultRowStarted = $resultstarted->fetch_assoc()){
            $started = $resultRowStarted['servicestatus'];
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
        }

        // count services availed where status is done
        $sqlsadone = "SELECT COUNT(servicestatus) AS countsadone from servicelogs where servicestatus  = 'Done' and joborderid = '$receiptNo' ";
        $resultsadone= $conn->query($sqlsadone);
        while($resultRowSaDone = $resultsadone->fetch_assoc()){
            $sadone = $resultRowSaDone['countsadone'];
        }

        // count services availed
        $sqlsa = "SELECT COUNT(servicestatus) AS countsa from servicelogs where joborderid = '$receiptNo' ";
        $resultsa= $conn->query($sqlsa);
        while($resultRowSa = $resultsa->fetch_assoc()){
            $sa = $resultRowSa['countsa'];
        }

        // update date finished and job order status
        if($sadone == $sa){
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




        header('location:../../job-order.php');                        
    }
    $conn->close();
?>