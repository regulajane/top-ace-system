<?php
    include '../header.php';

    $key=$_GET['key'];
    $search=trim($key);
    $itemname = array();

    $sql = "SELECT itemname from inventoryfabrication where itemname LIKE '%".$search."%'";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
        $itemname[] = $row["itemname"];
    }

    echo json_encode($itemname);
?>