<?php
    include '../header.php';
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}
    $started = '';
    

    
    if(isset($_POST["submit"])=="submit") {
        $receiptNo = $_POST['receiptNo'];
        $servicesstatus = $_POST['servicesstatus'];
        $servicesavailed = $_POST['servicesavailed'];
        $payment = $_POST['payment'];
        $dateclaimed = $_POST['dateclaimed'];
        
        // echo $receiptNo;
        for($i=0 ;$i < count($_POST['servicesavailed']); $i++) {
            $sqlsrvid = "SELECT serviceid from services where servicename = '$servicesavailed[$i]' ";
            $result = $conn->query($sqlsrvid); 

            while($resultRow = $result->fetch_assoc()){
                $sid = $resultRow['serviceid'];

                $sql = "UPDATE servicelogs SET servicesstatus = ? where joborderid = $receiptNo and serviceid = '$sid' ";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $servicesstatus[$i]  );
                $stmt->execute();
            }
            
        }

        // check if the date started has value
        $sqldc= "SELECT dateclaimed from joborders where joborderid = '$receiptNo' ";
        $resultdc = $conn->query($sqldc);
        while($resultRowdc = $resultdc->fetch_assoc()){
            $dc = $resultRowdc['dateclaimed'];
        }

        if(empty($dc)){
            $sqlupdatedc = "UPDATE joborders set dateclaimed = CURDATE() where joborderid = '$receiptNo' ";
            $stmtupdatedc = $conn->prepare($sqlupdatedc);
            $stmtupdatedc->execute();
        }



        // Check if any of the services is started
        $sqlpstarted = "SELECT servicesstatus from servicelogs where servicesstatus  = 'Started' and joborderid = '$receiptNo' ";
        $resultstarted = $conn->query($sqlpstarted);
        while($resultRowStarted = $resultstarted->fetch_assoc()){
            $started = $resultRowStarted['servicesstatus'];
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
        $sqlsadone = "SELECT COUNT(servicesstatus) AS countsadone from servicelogs where servicesstatus  = 'Done' and joborderid = '$receiptNo' ";
        $resultsadone= $conn->query($sqlsadone);
        while($resultRowSaDone = $resultsadone->fetch_assoc()){
            $sadone = $resultRowSaDone['countsadone'];
        }

        // count services availed
        $sqlsa = "SELECT COUNT(servicesstatus) AS countsa from servicelogs where joborderid = '$receiptNo' ";
        $resultsa= $conn->query($sqlsa);
        while($resultRowSa = $resultsa->fetch_assoc()){
            $sa = $resultRowSa['countsa'];
        }

        // update date finished and job order status
        if($sadone == $sa){


            $sqlstat = "SELECT jostatus from joborders  where joborderid = '$receiptNo' ";
            $resultstat= $conn->query($sqlstat);
            $resultRowStat = $resultstat->fetch_assoc();
            $stat = $resultRowStat['jostatus'];

            // check status if Done
            if($stat == "Done"){

            }else{
                //update no of jobs of employees
                $sqlemp = "UPDATE employees SET noofjobs = (noofjobs-1) where employeeid IN (SELECT employeeid from joemployees where joborderid = '$receiptNo');";
                $stmtemp = $conn->prepare($sqlemp);
                $stmtemp->execute(); 

                // remove items
                $sqlinvtyid = "SELECT inventoryid,itemquantity from itemlogs where joborderid = '$receiptNo' ";
                $resultinvtyid= $conn->query($sqlinvtyid);
                while($resultRowinvty = $resultinvtyid->fetch_assoc()){
                    $invtyid = $resultRowinvty['inventoryid'];
                    $invtyqty = $resultRowinvty['itemquantity'];

                    $sqlqty = "SELECT inventoryquantity FROM inventory WHERE inventoryid = '" .$invtyid. "'";
                    $result = $conn->query($sqlqty);
                    $resultRow = $result->fetch_assoc();

                    $inventQty = $resultRow['inventoryquantity'];

                    $product = $inventQty-$invtyqty;

                    //echo "<script>alert('$product')</script>";

                    if($product < 0){

                        $sqldatefinished = "UPDATE servicelogs set servicesstatus = 'Started' where joborderid = '$receiptNo' ";
                        $stmtfinished = $conn->prepare($sqldatefinished);
                        $stmtfinished->execute();

                        echo "<script>alert('ERROR: Inventory Quantity is lower than item qty')</script>";


                        break;

                    }else{
                        //echo "<script>alert('set job order to done')</script>";


                        $sqlinvty = "UPDATE inventory SET inventoryquantity = (inventoryquantity - '$invtyqty' ) where inventoryid = '$invtyid'; ";
                        $stmtinvty = $conn->prepare($sqlinvty);
                        $stmtinvty->execute();

                        $sqldatefinished = "UPDATE joborders set datefinished = CURDATE(), jostatus = 'Done' where joborderid = '$receiptNo' ";
                        $stmtfinished = $conn->prepare($sqldatefinished);
                        $stmtfinished->execute();

                        $sqlqty = "SELECT * FROM inventory WHERE inventoryid = '" .$invtyid. "'";
                        $result = $conn->query($sqlqty);
                        $resultRow = $result->fetch_assoc();

                        $cq = $resultRow['inventoryquantity'] - $invtyqty;
                        $rr = $resultRow['reorderlevel'];
                        $inventName = $resultRow['inventoryname'];
                        $inventSize = $resultRow['inventorysize'];
                        $imodelid = $resultRow['modelid'];

                        if($inventSize = ''){
                            $inventSize = null;
                        }

                        if($cq <= $rr) {
                            //echo '<script>alert("HEHE");</script>'; 
                            $nDetails = "below reorder level";
                            $nDate = date("Y-m-d");
                            $nTime = date("H:i:s");

                            //check duplicates
                            //echo "<script>alert('$inventName , $inventSize , $modelNo');</script>"; 
                            $sqlcheckduplicates = "SELECT * from notification 
                                            WHERE inventoryname LIKE '$inventName' AND inventorysize LIKE '$inventSize'";
                            $qq = $conn->query($sqlcheckduplicates);
                            $qqq = $qq->fetch_assoc();


                            $modelNum = 0;

                            $modelNum=$conn->real_escape_string($modelNum);

                            $resultModelNum = $conn->query("SELECT modelno from models where modelid = '$imodelid'");

                                  while ($row=mysqli_fetch_row($resultModelNum))
                                      {
                                          $modelNum = $row[0];
                                      }

                            if($qqq==null){
                                echo "<script>alert('$inventName, $inventSize, $nDetails, $nDate, $nTime');</script>"; 
                            $sqlnotif = "INSERT INTO notification (inventoryname, inventorysize, modelno, notificationdetails, ndate, time) 
                                        VALUES (?, ?, ?, ?, ?, ?)";

                            $stmtnotif = $conn->prepare($sqlnotif) or mysql_error();

                            // Bind
                            $stmtnotif->bind_param("ssssss", $inventName, $inventSize, $modelNum ,$nDetails, $nDate, $nTime) or mysql_error();
                            // Execute

                            $stmtnotif->execute() or mysql_error();
                            }
                        }
                    }
                }
                    
            }



   
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

        echo '<script type="text/javascript">'; 
        echo ' window.location = "../../job-order.php";'; 
        echo '</script>';                        
    }
    $conn->close();
?>