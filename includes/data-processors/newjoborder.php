
<?php
    include '../header.php';
    // include '../nav-jo.php';
    

    // Access Validation
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}
    if(isset($_POST["submit"])=="submit") {
        
        // Define Variables
        $clientid = $_POST['clientid'];
        $dateBrought = $_POST['dateBrought'];
        $modelid = $_POST['modelid'];
        $engnumber = $_POST['engnumber'];
        $problem = $_POST['problem'];
        $employeeid = $_POST['employeeid'];
        $pending = 'Pending';
        $serviceid = $_POST['serviceid'];
        $preparedby = $_POST['salesperson'];
        $supervisor = $_POST['supervisor'];
        $engRecon = 'EngRecon';     
        $itemid = $_POST['itemid'];
        $itemsize = $_POST['itemsize'];
        $qty = $_POST['qty'];


        //-----------------------------COUNT and CREATE JOB ORDER ID------------------------------------
        // $sqlcountjo = "SELECT concat(YEAR(curdate()),MONTH(curdate()),DAY(curdate())) AS curdate ,COUNT(*)+1 AS countall from joborders";
        $sqlcountjo = "SELECT COUNT(*)+1 AS countall, case when DAY(curdate()) < 10 THEN CONCAT(YEAR(curdate()), MONTH(curdate()), CONCAT(0, DAY(curdate()))) ELSE concat(YEAR(curdate()), MONTH(curdate()), DAY(curdate())) END AS curdate from joborders;";
        $s = $conn->query($sqlcountjo);
        $ss = $s->fetch_assoc(); 
        $countjo = $ss['curdate'].$ss['countall'];


        
        //-----------------------------INSERT joborder TABLE------------------------------------
        $sql = "INSERT INTO joborders (joborderid, problem, engineno, datebrought, jostatus, clientid, modelno, preparedby, supervisor, jotype) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);     
        $stmt->bind_param("sssssissss",$countjo, $problem, $engnumber, $dateBrought, $pending, $clientid, $modelid, $preparedby, $supervisor, $engRecon) or mysql_error();
        $stmt->execute();

        //-----------------------------SELECT JOB ORDER ID------------------------------------
        $sqlmaxjoid = "SELECT joborderid from joborders order by joborderid desc limit 1";
        $r = $conn->query($sqlmaxjoid);
        $rr = $r->fetch_assoc(); 
        $maxjoid = $rr['joborderid'];

        //-----------------------------INSERT joemployee TABLE------------------------------------
        for($i=0 ;$i < count($_POST['employeeid']); $i++) {
            $sql3 = "INSERT INTO joemployees ( joborderid, employeeid) VALUES ( ?, ?)";
            $stmt3 = $conn->prepare($sql3);     
            $stmt3->bind_param("si", $maxjoid, $employeeid[$i]) or mysql_error();
            $stmt3->execute();   
        }

        //-----------------------------UPDATE employees TABLE------------------------------------
        for($i=0 ;$i < count($_POST['employeeid']); $i++) {
            $sql4 = "UPDATE employees SET noofjobs = (noofjobs + 1) where employeeid = ? ";
            $stmt4 = $conn->prepare($sql4);     
            $stmt4->bind_param("i", $employeeid[$i]) or mysql_error();
            $stmt4->execute();
            
        }

     


        // -----------------------------INSERT sessionlogs TABLE------------------------------------
        for($i=0 ;$i < count($_POST['serviceid']); $i++) {
            $sql2 = "INSERT INTO servicelogs ( joborderid, serviceid) VALUES ( ?, ?)";
            $stmt2 = $conn->prepare($sql2);     
            $stmt2->bind_param("si", $maxjoid, $serviceid[$i]) or mysql_error();
            $stmt2->execute();
            
        }


        // -----------------------------INSERT itemlogs TABLE------------------------------------
        for($i=0 ;$i < count($_POST['itemid']); $i++) {
                    if ($_POST['itemsize'][$i] != '') {
                        $sqlinvtyid = "SELECT inventoryid,inventoryprice from inventory join models using (modelid) 
                                             where inventoryname = '$itemid[$i]'
                                             and inventorysize = '$itemsize[$i]'
                                             and modelno = '$modelid'; ";
                        $result = $conn->query($sqlinvtyid);    
                    }else{
                        $sqlinvtyid = "SELECT inventoryid,inventoryprice from inventory join models using (modelid) 
                                         where inventoryname = '$itemid[$i]'                                         
                                         and modelno = '$modelid'; ";
                        $result = $conn->query($sqlinvtyid);
                    }
   
                        // output data of each row             
                        while($resultRow = $result->fetch_assoc()){
                            $a = $resultRow['inventoryid'];
                            $p = $resultRow['inventoryprice'];

                            // echo "<script> alert($a); </script>";
       
                            $sqlitemlogs = "INSERT INTO itemlogs ( itemprice, itemquantity, joborderid, inventoryid ) VALUES ( ?, ?, ?, ? )";
                            $stmt5 = $conn->prepare($sqlitemlogs);     
                            $stmt5->bind_param("iisi", $p, $qty[$i],  $maxjoid, $a) or mysql_error();
                            $stmt5->execute();

                        }

        }
        

        //-----------------------------SELECT Total Service/s Availed------------------------------------
        // $sqlprice = "SELECT SUM(services.serviceprice) AS totalPrice  from servicelogs join services using (serviceid) where joborderid = '$maxjoid' ";
        // $rprice = $conn->query($sqlprice);
        // $rrprice = $rprice->fetch_assoc(); 
        // $totalprice = $rrprice['totalPrice'];

        //-----------------------------UPDATE totalprice into joborder table------------------------
        // $sqlupdateprice = "UPDATE joborders SET joborders.joprice = '$totalprice' where joborderid  = '$maxjoid' ";
        // $stmtprice = $conn->prepare($sqlupdateprice);
        // $stmtprice->execute(); 
       
        include '../modals/modal-servicesbreakdown.php';
        include '../head-elements-jo.php';

        
        
         
    }
    $conn->close();
    // include '../footer.php';
?>


