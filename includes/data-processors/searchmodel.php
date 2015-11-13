<?php
    include '../header.php';

    $key=$_GET['key'];
    $search=trim($key);
    $modelno = array();

    $sql = "SELECT * from inventory JOIN models USING (modelid) where modelno LIKE '%".$search."%'";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
        $modelno[] = $row["modelno"];
    }

    echo json_encode($modelno);
?>