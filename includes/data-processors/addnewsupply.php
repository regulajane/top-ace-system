<?php
    include '../header.php';
    // Access Validation
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}
    if(isset($_POST["submit"])=="submit") {
        // Define Variables
        $inventoryName= $_POST["inventoryName"];
        $type= $_POST["type"];
        $size= $_POST["size"];
        $quantity= $_POST["quantity"];
        $price= $_POST["price"];
        
        // Prepare
        $sql = "INSERT INTO inventory (inventoryName, type, size, quantity, price) VALUES ('$inventoryName', '$type', '$size', '$quantity', '$price')";
		
if(mysqli_query($conn, $sql)){
    echo "Supply was added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
}

mysqli_close($conn);
 header('location:../../inventory.php');  
?>

   