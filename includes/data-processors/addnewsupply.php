<?php
    include '../header.php';
    // Access Validation
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}
    if(isset($_POST["submit"])=="submit") {
        // Define Variables
        $inventoryName= $_POST["inventoryName"];
        $modelNo= $_POST["modelNo"];
        
        $inventorySize= $_POST["inventorySize"];
        $inventoryquantity= $_POST["inventoryquantity"];
        $inventoryprice= $_POST["inventoryprice"];
        
        // Prepare
        $sql = "INSERT INTO inventory (inventoryName, modelNo, inventorySize, inventoryquantity, inventoryprice) VALUES ('$inventoryName','$modelNo', '$inventorySize', '$inventoryquantity', '$inventoryprice')";
    
if(mysqli_query($conn, $sql)){
    echo "Supply was added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
}

mysqli_close($conn);
 header('location:../../inventory.php');  
?>

   