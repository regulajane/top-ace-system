<?php

    include '../header.php';

    $key=$_GET['key'];
    $search=trim($key);
    $itemandmodelandsize = array();

    $sql = "SELECT a.invty AS invtynameandmodelnoandsize
        FROM
            (SELECT 
                CONCAT(modelno,':',inventoryname,':', IFNULL(inventorysize,'No Size')) AS invty
            FROM
                inventory
            JOIN models USING (modelid)) AS a
            WHERE
                invty LIKE '".$search."%' ";

    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
        $itemandmodelandsize[] = $row['invtynameandmodelnoandsize'];
/*        if($row['inventorysize'] == null){
            $isize = '';
        }else{
            $isize = $row['inventorysize'];
        }
        $modelno = $row['modelno'];
        $iname = $row['inventoryname'];
        $itemandmodelandsize[] = "$modelno:$iname:$isize";*/
    }

    echo json_encode($itemandmodelandsize);
?>