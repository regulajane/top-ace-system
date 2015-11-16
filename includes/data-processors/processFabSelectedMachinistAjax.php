<?php
    include '../header.php';
    // Access Validation
    if(!isset($_SESSION["username"])){
    header('Location: ../index.php?loggedout=true');}
    // Job Order Data
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $_SESSION['joNumber'] = $_POST['selectedID'];
    $num = $_SESSION['joNumber'];
    
    $sql = "SELECT employeeid, emplastname, empfirstname from employees join joemployees using (employeeid) where joborderid = $num;";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $results_array=$stmt->fetchAll(PDO::FETCH_ASSOC);

    $row=json_encode( $results_array );

    echo $row;

    // $rs = $conn->query($sql);
    // while($row = $rs->fetch_assoc()){
    //     echo json_encode($row); 
    // }
    // $stmt=$conn->prepare($sql);
    // $stmt->execute();
    // $results_array=$stmt->fetchAll(PDO::FETCH_ASSOC);

    // $row=json_encode( $results_array );

    // echo $row;
    // while ($row = mysql_fetch_assoc($sql)) {
    //             echo "Name:". $row["name"];
    //             echo "Other Data:". $row["otherdata"];
    //             echo "<br>";
    //     }
?>