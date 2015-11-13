<?php

    include '../header.php';

    $key=$_GET['key'];
    $search=trim($key);
    $inventoryname = array();

    $sql = "SELECT * from inventory JOIN models USING (modelid) where inventoryname LIKE '%".$search."%'";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
        $inventoryname[] = $row["inventoryname"];
    }

    echo json_encode($inventoryname);
?>