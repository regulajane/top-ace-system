<?php
    include '../header.php';
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}
    if(isset($_POST["submit"])=="submit") {

        $modelno = $_POST["modelno"];
        $inventName = $_POST["inventoryname"];
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

            $sql2 =  "INSERT INTO inventory (inventoryname, inventorysize, inventoryprice, inventoryquantity, 
                            modelid, reorderlevel)
                  VALUES ('$inventName', '$inventSize', '$inventPrice', '$quantity', '$modelID', '$reorderlevel')";

            $stmt1 = $conn->prepare($sql2);
            $stmt1 ->execute();

        }else{
            $result1 = $conn->query("SELECT modelid from models where modelno = '$modelno'");

            $modelID = 0;

            while ($row=mysqli_fetch_row($result1))
                 {
                   $modelID = $row[0];
                 }

            $sql2 =  "INSERT INTO inventory (inventoryname, inventorysize, inventoryprice, inventoryquantity, 
                            modelid, reorderlevel)
                  VALUES ('$inventName', '$inventSize', '$inventPrice', '$quantity', '$modelID', '$reorderlevel')";

            $stmt1 = $conn->prepare($sql2);
            $stmt1 ->execute();
        }
        //-----------------------------UPDATE INVENTORY------------------------------------
/*        $sql =  "INSERT INTO inventory (inventoryname, inventorysize, inventoryprice, inventoryquantity, 
                            modelid, reorderlevel)
                  VALUES ('$inventName', '$inventSize', '$inventPrice', '$quantity', '1', '$reorderlevel')";
        $stmt = $conn->prepare($sql);

        $stmt->execute(); */
        
        header('location:../../inventory.php');  

    }
    $conn->close();
?>