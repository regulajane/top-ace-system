<?php
    include '../header.php';
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}
    if(isset($_POST["ini"])=="ini") {

        $itemname;
        $itemsizediam;
        $itemsizelength;
        $x = 2;
        require 'classes/Classes/PHPExcel.php';
        require_once 'classes/Classes/PHPExcel/IOFactory.php';

        $file = $_FILES['excelfileNewItems']['tmp_name'];

        try{
           $objPHPExcel = PHPExcel_IOFactory::load($file);
        }catch(Exception $e){
          die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }
        $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

        $arrayCount = count($allDataInSheet); // Total Number of rows in the uploaded EXCEL file

        if($arrayCount > 1500){
          set_time_limit(0);
          echo "<script>alert('Time Limit Set to Infinity: Please Wait.. This may take too long')</script>";
        }
        for($i=2;$i<=$arrayCount;$i++){

            //echo "<script>alert('I = $i array count = $arrayCount')</script>";
            $itemname= trim($allDataInSheet[$i]["A"]);
            $itemsizediam = trim($allDataInSheet[$i]["B"]);
            $itemsizelength = trim($allDataInSheet[$i]["C"]);

            //echo "<script>alert('$iname $isize $iprice $iquantity $imodelid $irl')</script>";

              $itemname=$conn->real_escape_string($itemname);
              $itemsizediam=$conn->real_escape_string($itemsizediam);
              $itemsizelength=$conn->real_escape_string($itemsizelength);

                  $sqlcheckduplicates = "SELECT * from inventoryfabrication 
                    WHERE itemname = '$itemname' AND itemsizediam = '$itemsizediam' AND itemsizelength = '$itemsizelength' "; //check duplicates
                  $s = $conn->query($sqlcheckduplicates);
                  $ss = $s->fetch_assoc();

                  if ($ss==null){
                    $insertquery = "INSERT INTO inventoryfabrication (itemname,itemsizediam,itemsizelength) 
                                          VALUES ('$itemname', '$itemsizediam', '$itemsizelength')";
                        $stmt1 = $conn->prepare($insertquery);
                        $stmt1 ->execute();
                  }else{
                       echo "<script>alert('ERROR: ITEM - $itemname , SIZE(DIAM) - $itemsizediam , SIZE(LENGTH) - $itemsizelength is currently in database: LINE $x in excel')</script>";
                  }  
                $x++;  
            } 

          

        echo '<script type="text/javascript">'; 
        echo ' window.location = "../../fabrication-items.php";'; 
        echo '</script>';
    }
    $conn->close();
?>