<?php
    include '../header.php';
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}
    if(isset($_POST["submit"])=="submit") {
        
        $receiptNo = $_POST['receiptNo'];
        $client = $_POST['client'];
        $engineno = $_POST['engineno'];
        $dateBrought = $_POST['dateBrought'];
        $problem = $_POST['problem'];
        $eserviceid = $_POST['eserviceid'];
        $eitemid = $_POST['eitemid'];
        $eqty = $_POST['eqty'];
        $eitemsize = $_POST['eitemsize'];
        $eadditionalitems = $_POST['eadditionalitems'];
        $eqtyAI = $_POST['eqtyAI'];

        //---------------------------------------------------------------------------------------------
        // echo $receiptNo . "<br>";
        // echo $client . "<br>";
        // echo $engineno . "<br>";
        // echo $dateBrought . "<br>";
        // echo $problem . "<br>";
        //---------------------------------------------------------------------------------------------

        // delete servicelogs
        $sqldelservicelogs = "DELETE from servicelogs where joborderid = '$receiptNo' ";
        $stmtdelservicelogs = $conn->prepare($sqldelservicelogs);
        $stmtdelservicelogs->execute();

        // delete itemlogs
        $sqldelitemlogs = "DELETE from itemlogs where joborderid = '$receiptNo' ";
        $stmtitemlogs = $conn->prepare($sqldelitemlogs);
        $stmtitemlogs->execute();

        // update problem
        $sqlupdateproblem = "UPDATE joborders SET problem = '$problem' where joborderid = '$receiptNo' ";
        $stmtupdateproblem = $conn->prepare($sqlupdateproblem);
        $stmtupdateproblem->execute();




        
        $countservices = count($eserviceid);

        if( empty($countservices) ) {
            // echo "Array is Empty";

        } else {
            // echo "Array is not Empty";
            for($i=0 ;$i < count($_POST['eserviceid']); $i++) {
                $sqlsrv = "INSERT INTO servicelogs ( joborderid, serviceid) VALUES ( ?, ?)";
                $stmtsrv = $conn->prepare($sqlsrv);     
                $stmtsrv->bind_param("si", $receiptNo, $eserviceid[$i]) or mysql_error();
                $stmtsrv->execute();
            }
        }

        

        for($i=0 ;$i < count($_POST['eitemid']); $i++) {
            
            $sqlnewitemlist = "SELECT inventoryid,inventoryprice from inventory where inventoryid = '$eitemid[$i]' ";
            $resultnewitemlist = $conn->query($sqlnewitemlist);
            while($resultRownewitemlist = $resultnewitemlist->fetch_assoc()){
                            $ea = $resultRownewitemlist['inventoryid'];
                            $ep = $resultRownewitemlist['inventoryprice'];
                            

                            $sqlnewitemlogs = "INSERT INTO itemlogs ( itemprice, itemquantity, joborderid, inventoryid ) VALUES ( ?, ?, ?, ? )";
                            $stmtnewitemlogs = $conn->prepare($sqlnewitemlogs);     
                            $stmtnewitemlogs->bind_param("iisi", $ep, $eqty[$i],  $receiptNo, $ea) or mysql_error();
                            $stmtnewitemlogs->execute();
            }
            
        }

       

        // -----------------------------INSERT new itemlogs TABLE------------------------------------
        for($i=0 ;$i < count($_POST['eitemid']); $i++) {
                    if ($_POST['eitemsize'][$i] != '') {
                        $sqlinvtyid = "SELECT inventoryid,inventoryprice from inventory join models using (modelid) 
                                             where inventoryname = '$eitemid[$i]'
                                             and inventorysize = '$eitemsize[$i]'
                                             and modelno = '$engineno'; ";
                        $resultinvty = $conn->query($sqlinvtyid);    
                    }else{
                        $sqlinvtyid = "SELECT inventoryid,inventoryprice from inventory join models using (modelid) 
                                         where inventoryname = '$eitemid[$i]'                                         
                                         and modelno = '$engineno'; ";
                        $resultinvty = $conn->query($sqlinvtyid);
                    }
   
                                 
                        while($resultRowinvty = $resultinvty->fetch_assoc()){
                            $a = $resultRowinvty['inventoryid'];
                            $p = $resultRowinvty['inventoryprice'];
                            
       
                            $sqlitemlogs = "INSERT INTO itemlogs ( itemprice, itemquantity, joborderid, inventoryid ) VALUES ( ?, ?, ?, ? )";
                            $stmt5 = $conn->prepare($sqlitemlogs);     
                            $stmt5->bind_param("iisi", $p, $eqty[$i],  $receiptNo, $a) or mysql_error();
                            $stmt5->execute();

                        }

        }

        

        // ----------------------------- New Additional Items ------------------------------------
        $Bearing = 'Bearing';
        $OilFilter = 'Oil';
        $FuelFilter = 'Fuel';

        if( empty($eadditionalitems[0]) ) {
            // Array is Empty

        } else {
            // Array is not Empty
            
        for($i=0 ;$i < count($_POST['eadditionalitems']); $i++) {
           if(strpos($eadditionalitems[$i],$Bearing)  !== false ){
                $eadditionalitems[$i] = str_replace("Bearing ","",$eadditionalitems[$i]);
                $sqladdlitem = "SELECT inventoryid,inventoryprice from inventory join models using (modelid) 
                                             where modelno = '$eadditionalitems[$i]' AND inventoryname = 'Bearing'; ";
                $resultaddlitem = $conn->query($sqladdlitem);
            
            }else if(strpos($eadditionalitems[$i],$OilFilter)  !== false ){
                $eadditionalitems[$i] = str_replace("Oil Filter ","",$eadditionalitems[$i]);
                $sqladdlitem = "SELECT inventoryid,inventoryprice from inventory join models using (modelid) 
                                             where modelno = '$additionalitems[$i]' AND inventoryname = 'Oil Filter'; ";
                $resultaddlitem = $conn->query($sqladdlitem);
              
            }else if(strpos($eadditionalitems[$i],$FuelFilter)  !== false ){
                $eadditionalitems[$i] = str_replace("Fuel Filter ","",$eadditionalitems[$i]);
                $sqladdlitem = "SELECT inventoryid,inventoryprice from inventory join models using (modelid) 
                                             where modelno = '$eadditionalitems[$i]' AND inventoryname = 'Fuel Filter'; ";
                $resultaddlitem = $conn->query($sqladdlitem);
            }
            while($resultRowaddlitem = $resultaddlitem->fetch_assoc()){
            
                            $aa = $resultRowaddlitem['inventoryid'];
                            $ap = $resultRowaddlitem['inventoryprice'];
                            
       
                            $sqleitemlogsaddlitem = "INSERT INTO itemlogs ( itemprice, itemquantity, joborderid, inventoryid ) VALUES ( ?, ?, ?, ? )";
                            $stmt7 = $conn->prepare($sqleitemlogsaddlitem);     
                            $stmt7->bind_param("iisi", $ap, $eqtyAI[$i],  $receiptNo, $aa) or mysql_error();
                            $stmt7->execute();

                }

            }
        }

        // sum services availed
        $sqlsumservices = "SELECT SUM(services.serviceprice) AS totalservicesavailed FROM servicelogs join services using (serviceid) where joborderid = '$receiptNo' ";
        $resultsumservices = $conn->query($sqlsumservices);
        $resultRowsumservices = $resultsumservices->fetch_assoc();
        $totalservicesavailed = $resultRowsumservices['totalservicesavailed'];

        // sum itemcost
        $sqlsumitems = "SELECT SUM(itemprice*itemquantity) AS totalitems FROM itemlogs where joborderid = '$receiptNo' ";
        $resultsumitems = $conn->query($sqlsumitems);
        $resultRowsumitems = $resultsumitems->fetch_assoc();
        $totalitems = $resultRowsumitems['totalitems'];

        // select adjustments
        // select balance
        // select downpayment
        $sqlmoney = "SELECT adjustments, balance, downpayment FROM joborders where joborderid = '$receiptNo' ";
        $resultsqlmoney = $conn->query($sqlmoney);
        $resultRowmoney = $resultsqlmoney->fetch_assoc();
        $joadjustments = $resultRowmoney['adjustments'];
        $jobalance = $resultRowmoney['balance'];
        $jodownpayment = $resultRowmoney['downpayment'];

       
       
       



        // update grand total
        $tempgt = $totalservicesavailed + $totalitems + $joadjustments;
        $sqltempgt = "UPDATE joborders SET joprice = '$tempgt' where joborderid = '$receiptNo' ";
        $stmttempgt = $conn->prepare($sqltempgt);
        $stmttempgt->execute();

        // update balance
        $tempbal = $tempgt - $jodownpayment;
        $sqlbal = "UPDATE joborders SET balance = '$tempbal' where joborderid = '$receiptNo' ";
        $stmtbal = $conn->prepare($sqlbal);
        $stmtbal->execute();





        


        // Redirect
        header('location:../../job-order.php');                    
    }
    $conn->close();
?>