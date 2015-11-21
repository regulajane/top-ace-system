<?php

    include '../header.php';

    $key=$_GET['key'];
    $search=trim($key);
    $modelno = array();

    $sql = "SELECT a.invty AS invtynameandmodelno
        FROM
            (SELECT 
                CONCAT(inventoryname, ' ', modelno) AS invty
            FROM
                inventory
            JOIN models USING (modelid)
            WHERE
                    (inventoryname = 'Bearing'
                    OR inventoryname = 'Fuel Filter'
                    OR inventoryname = 'Oil Filter')) AS a
            WHERE
                invty LIKE '".$search."%' ";

    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
        $modelno[] = $row['invtynameandmodelno'];
    }

    echo json_encode($modelno);
?>