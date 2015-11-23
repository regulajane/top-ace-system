<?php
    include '../header.php';
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}
    if(isset($_POST["save"])=="save") {

        $modelno = $_POST["modelno"];
        $inventName = $_POST["invtname"];
        $inventSize = $_POST["inventorysize"];
        $inventPrice = $_POST["inventoryprice"];
        $quantity = $_POST["inventoryquantity"];
        $reorderlevel = $_POST["reorderlevel"];

                $sqlcheckmodel = "SELECT modelno from models where modelno = '$modelno'";
                $s = $conn->query($sqlcheckmodel);
                $ss = $s->fetch_assoc(); 
                if ($ss==null){
                    $sql1 =  "INSERT INTO models (modelno)
                          VALUES ('$modelno')";

                    $stmt = $conn->prepare($sql1);
                    $stmt ->execute();

                          $modelID = 0;

                    $result = $conn->query("SELECT modelid from models where modelno = '$modelno'");

                    while ($row=mysqli_fetch_row($result))
                        {
                            $modelID = $row[0];
                        }
                    
                    //echo "<script>alert('$modelID')</script>";
                            $sqlcheckduplicates = "SELECT * from inventory 
                                    WHERE inventoryname = '$inventName' && inventorysize = '$inventSize' && modelid = '$modelID' "; //check duplicates

                            $qq = $conn->query($sqlcheckduplicates);
                            $qqq = $qq->fetch_assoc();
                            if($qqq==null){
                            $sql2 =  "INSERT INTO inventory (inventoryname, inventorysize, inventoryprice, inventoryquantity, 
                                            modelid, reorderlevel)
                                  VALUES ('$inventName', '$inventSize', '$inventPrice', '$quantity', '$modelID', '$reorderlevel')";

                            $stmt1 = $conn->prepare($sql2);
                            $stmt1 ->execute();
                            }else{
                                echo "<script>alert('ERROR: ITEM - $inventName , SIZE - $inventSize , MODEL - $modelno is currently in database')</script>";
                            }
                        }
                        else{
                            $result1 = $conn->query("SELECT modelid from models where modelno = '$modelno'");

                            $modelID = 0;

                            while ($row=mysqli_fetch_row($result1))
                                 {
                                   $modelID = $row[0];
                                 }
                            $sqlcheckduplicates = "SELECT * from inventory 
                                    WHERE inventoryname = '$inventName' && inventorysize = '$inventSize' && modelid = '$modelID' "; //check duplicates

                            $qq = $conn->query($sqlcheckduplicates);
                            $qqq = $qq->fetch_assoc();
                            if($qqq==null){
                            $sql2 =  "INSERT INTO inventory (inventoryname, inventorysize, inventoryprice, inventoryquantity, 
                                            modelid, reorderlevel)
                                  VALUES ('$inventName', '$inventSize', '$inventPrice', '$quantity', '$modelID', '$reorderlevel')";

                            $stmt1 = $conn->prepare($sql2);
                            $stmt1 ->execute();
                            }else{
                                echo "<script>alert('ERROR: ITEM - $inventName , SIZE - $inventSize , MODEL - $modelno is currently in database')</script>";
                            }
                        }
                        //echo "<script>alert('ERROR: ITEM - $inventName , SIZE - $inventSize , MODEL - $modelno is currently in database')</script>";
    

        //-----------------------------UPDATE INVENTORY------------------------------------
/*        $sql =  "INSERT INTO inventory (inventoryname, inventorysize, inventoryprice, inventoryquantity, 
                            modelid, reorderlevel)
                  VALUES ('$inventName', '$inventSize', '$inventPrice', '$quantity', '1', '$reorderlevel')";
        $stmt = $conn->prepare($sql);

        $stmt->execute(); */
        
        echo '<script type="text/javascript">'; 
        echo ' window.location = "../../inventory.php";'; 
        echo '</script>';
    }
    $conn->close();
?>