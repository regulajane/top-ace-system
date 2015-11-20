<?php
    include '../header.php';
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}
    if(isset($_POST["ini"])=="ini") {

        $iname;
        $isize;
        $iprice;
        $iquantity;
        $imodeln;
        $irl;

        //echo "<script>alert('asa')</script>";
        //echo "<script>alert('hello')</script>";
       // echo $filename=$_FILES["file"]["tmp_name"];
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

        //$insertquery = "INSERT INTO inventory (inventoryname,inventorysize,inventoryprice,inventoryquantity,modelid,reorderlevel) VALUES ";
        //echo "<script>alert('$arrayCount')</script>";
        $x = 2;

        if($arrayCount > 1500){
          set_time_limit(0);
          echo "<script>alert('Time Limit Set to Infinity: Please Wait.. This may take too long')</script>";
        }
        for($i=2;$i<=$arrayCount;$i++){

            //echo "<script>alert('I = $i array count = $arrayCount')</script>";
            $iname= trim($allDataInSheet[$i]["A"]);
            $isize = trim($allDataInSheet[$i]["B"]);
            $iprice = trim($allDataInSheet[$i]["C"]);
            $iquantity = trim($allDataInSheet[$i]["D"]);
            $imodeln = trim($allDataInSheet[$i]["E"]);
            $irl = trim($allDataInSheet[$i]["F"]);

            //echo "<script>alert('$iname $isize $iprice $iquantity $imodelid $irl')</script>";

              $imodeln=$conn->real_escape_string($imodeln);

              $result = $conn->query("SELECT modelid from models where modelno = '$imodeln'");

                  while ($row=mysqli_fetch_row($result))
                      {
                          $testModelID = $row[0];
                      }

             $sqlcheckduplicates = "SELECT * from inventory 
                    WHERE inventoryname = '$iname' && inventorysize = '$isize' && modelid = '$testModelID' "; //check duplicates
                  $s = $conn->query($sqlcheckduplicates);
                  $ss = $s->fetch_assoc();

                  if ($ss==null){
                      $sqlcheckmodel = "SELECT modelno from models where modelno LIKE '$imodeln'";//check models
                      $st = $conn->query($sqlcheckmodel);
                      $sts = $st->fetch_assoc();

            if($sts==null){
                $sqlinsertmodel =  "INSERT INTO models (modelno)
                  VALUES ('$imodeln')";

                  $stmt = $conn->prepare($sqlinsertmodel);
                  $stmt ->execute();

                  $imodelid = 0;

                  $result = $conn->query("SELECT modelid from models where modelno = '$imodeln'");

                  while ($row=mysqli_fetch_row($result))
                      {
                          $imodelid = $row[0];
                      }
                  
                    $insertquery = "INSERT INTO inventory (inventoryname,inventorysize,inventoryprice,inventoryquantity,modelid,reorderlevel) 
                                          VALUES ('$iname', '$isize', '$iprice', '$iquantity', '$imodelid', '$irl')";
                        $stmt1 = $conn->prepare($insertquery);
                        $stmt1 ->execute();

                  //echo "<script>alert('$modelID')</script>";

                  //$sql2 =  "INSERT INTO inventory (inventoryname, inventorysize, inventoryprice, inventoryquantity, 
                  //                modelid, reorderlevel)
                  //      VALUES ('$inventName', '$inventSize', '$inventPrice', '$quantity', '$modelID', '$reorderlevel')";

                  //$stmt1 = $conn->prepare($sql2);
                  //$stmt1 ->execute();
            }else{
                  $result1 = $conn->query("SELECT modelid from models where modelno = '$imodeln'");

                  $imodelid = 0;

                  while ($row=mysqli_fetch_row($result1))
                       {
                         $imodelid = $row[0];
                       }

                    $insertquery = "INSERT INTO inventory (inventoryname,inventorysize,inventoryprice,inventoryquantity,modelid,reorderlevel) 
                                          VALUES ('$iname', '$isize', '$iprice', '$iquantity', '$imodelid', '$irl')";
                        $stmt1 = $conn->prepare($insertquery);
                        $stmt1 ->execute();
                  
            }
            }else{
                    echo "<script>alert('ERROR: ITEM - $iname , SIZE - $isize , MODEL - $imodeln is currently in database: LINE $x in excel')</script>";
            }  

            $x++;

        }

        //insert null to blank spaces.

        $updateSQLString = 'UPDATE inventory SET inventorysize = NULL WHERE inventorysize = ""';
        $updateSql=$conn->prepare($updateSQLString);
        $updateSql->execute();

        echo '<script type="text/javascript">'; 
        echo ' window.location = "../../inventory.php";'; 
        echo '</script>';
    }
    $conn->close();
?>