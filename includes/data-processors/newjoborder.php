
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
        // $downpayment = $_POST['downpayment'];
        $employeeid = $_POST['employeeid'];
        $pending = 'Pending';
        $serviceid = $_POST['serviceid'];
        $preparedby = $_POST['salesperson'];
        $supervisor = $_POST['supervisor'];
        $engRecon = 'EngRecon';


        //-----------------------------COUNT and CREATE JOB ORDER ID------------------------------------
        $sqlcountjo = "SELECT concat(YEAR(curdate()),MONTH(curdate()),DAY(curdate())) AS curdate ,COUNT(*)+1 AS countall from joborders";
        $s = $conn->query($sqlcountjo);
        $ss = $s->fetch_assoc(); 
        $countjo = $ss['curdate'].$ss['countall'];


        
        //-----------------------------INSERT joborder TABLE------------------------------------
        $sql = "INSERT INTO joborders (joborderid, problem, engineno, datebrought, jostatus, clientid, modelno, preparedby, supervisor, jotype) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);     
        $stmt->bind_param("sssssiisss",$countjo, $problem, $engnumber, $dateBrought, $pending, $clientid, $modelid, $preparedby, $supervisor, $engRecon) or mysql_error();
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
            $stmt3->bind_param("ii", $maxjoid, $employeeid[$i]) or mysql_error();
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
            $stmt2->bind_param("ii", $maxjoid, $serviceid[$i]) or mysql_error();
            $stmt2->execute();
            
        }


        // echo '<script>'; 
        // echo '$("#brkdownModal").modal("show");';
        // echo 'alert("asdas");';
        // echo 'window.location = "../../job-order.php";'; 
        // echo '</script>';

        
        //-----------------------------SELECT totalprice------------------------------------
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


<!-- <button  id="brkdwnBtn" data-dismiss="modal" data-toggle="modal" href="#brkdownModal">
<span class="glyphicon glyphicon-ok-sign"></span> Next</button>

<script type="text/javascript">

    $('#brkdwnBtn').click();
</script> -->
