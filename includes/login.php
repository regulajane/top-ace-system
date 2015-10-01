<?php
    include 'header.php';
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    $flag = false;
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if($row["username"] == $_POST["username"] && $row["userpassword"] == $_POST["password"]) {
                // set session variables
                
                $_SESSION["username"] = $row["username"];
                $_SESSION["password"] =  $row["userpassword"];
                
                $flag = true;

                //-----------------------------INSERT SESSIONLOGS------------------------------------
                ini_set('date.timezone', 'Asia/Manila');
                $timestamp = date("D M j G:i:s T Y");
                $username = $_SESSION["username"];
                $loggedin = "logged in";

                // Prepare
                $sql = "INSERT INTO sessionlogs (username, timestamp, activity) VALUES (?, ?, ?)";          
                $stmt = $conn->prepare($sql);
                // Bind
                // $stmt->bind_param("sss", $username, $timestamp, $loggedin);
                // Execute 
                // $stmt->execute();
                header('Location: ../home.php');
                break;
            } else {
                $flag = false;
            }
        }
        if($flag == false) {
            header('Location: ../index.php?failed=true');
        }
    }
    $conn->close();
?>