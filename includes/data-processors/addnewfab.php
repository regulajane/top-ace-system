<?php
    include '../header.php';
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}
    if(isset($_POST["save"])=="save") {

        $itemid = $_POST["itemid"];
        $itemname = $_POST["itemname"];
        $itemsizediam = $_POST["itemsizediam"];
        $itemsizelength = $_POST["itemsizelength"];

       

            $query =  "INSERT INTO inventoryfabrication (itemname, itemsizediam, itemsizelength)
                  VALUES ('$itemname', '$itemsizediam', '$itemsizelength')";

            $stmt1 = $conn->prepare($query);
            $stmt1 ->execute();

    
        header('location:../../fabrication-items.php');  

    }
    $conn->close();
?>