<?php
    include '../header.php';
    // Access Validation
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}
    if(isset($_POST["submit"])=="submit") {
        // Define Variables
        $servicename= $_POST["servicename"];
        $serviceprice= $_POST["serviceprice"];
        
        // Prepare
        $sql = "INSERT INTO services (servicename, serviceprice) VALUES ('$servicename','$serviceprice')";
    
if(mysqli_query($conn, $sql)){
    echo "Service was added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
}

mysqli_close($conn);
 header('location:../../services.php');  
?>
