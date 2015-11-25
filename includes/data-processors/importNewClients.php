<?php
    include '../header.php';
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}
    if(isset($_POST["upload"])=="upload") {

        $lname;
        $fname;
        $minitial;
        $cellno;
        $gender;
        $address;
        $memsince;

        require 'classes/Classes/PHPExcel.php';
        require_once 'classes/Classes/PHPExcel/IOFactory.php';

        $file = $_FILES['excelfileNewClients']['tmp_name'];

        try{
           $objPHPExcel = PHPExcel_IOFactory::load($file);
        }catch(Exception $e){
          die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }
        $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

        $arrayCount = count($allDataInSheet); // Total Number of rows in the uploaded EXCEL file

        $x = 2;

        if($arrayCount > 1500){
          set_time_limit(0);
          echo "<script>alert('Time Limit Set to Infinity: Please Wait.. This may take too long')</script>";
        }
        for($i=2;$i<=$arrayCount;$i++){

            //echo "<script>alert('I = $i array count = $arrayCount')</script>";
            $lname= trim($allDataInSheet[$i]["A"]);
            $fname = trim($allDataInSheet[$i]["B"]);
            $minitial = trim($allDataInSheet[$i]["C"]);
            $cellno = trim($allDataInSheet[$i]["D"]);
            $gender = trim($allDataInSheet[$i]["E"]);
            $address = trim($allDataInSheet[$i]["F"]);
            $memsince= trim($allDataInSheet[$i]["G"]);

            $sqlcheckduplicates = "SELECT * from clients 
                    WHERE cllastname  = '$lname' 
                      && clfirstname  = '$fname' 
                      && clmidinitial = '$minitial' 
                      && clcelno      = '$cellno'
                      && clgender     = '$gender'
                      && claddress    = '$address' "; //check duplicates
                  $s = $conn->query($sqlcheckduplicates);
                  $ss = $s->fetch_assoc();

                  if ($ss==null){
                    $insertquery = "INSERT INTO clients 
                        (cllastname,clfirstname,clmidinitial,clcelno,clgender,claddress,clsince) 
                        VALUES ('$lname', '$fname', '$minitial', '$cellno', '$gender', '$address', '$memsince')";
                        $stmt1 = $conn->prepare($insertquery);
                        $stmt1 ->execute();
                  }else{
                     echo "<script>alert('ERROR: CLIENT $fname , $lname is currently in database: LINE $x in excel')</script>";
                  }
            $x++;
        }

        echo '<script type="text/javascript">'; 
        echo ' window.location = "../../clients.php";'; 
        echo '</script>';
    }
    $conn->close();
?>