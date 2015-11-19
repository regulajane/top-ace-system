<?php
    include '../header.php';
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}

    

    
    if(isset($_POST["submit"])=="submit") {
        $receiptNo = $_POST['receiptNo'];
        $faborderstatus = $_POST['faborderstatus'];
        $fabricationsordered = $_POST['fabricationsordered'];

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

        // Check if any of the services is started
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

        // ipdate date started
        if($started == "Started" AND empty($dstarted) ){
            $sqldatestarted = "UPDATE joborders set datestarted = CURDATE() where joborderid = '$receiptNo' ";
            $stmtstarted = $conn->prepare($sqldatestarted);
            $stmtstarted->execute();
        }

        header('location:../../job-order.php');                        
    }
    $conn->close();
?>