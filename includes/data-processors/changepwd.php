<?php
	include '../header.php';
    if(!isset($_SESSION["username"])){
    header('Location: ../../index.php?loggedout=true');}

    $origuserid =$_SESSION['userid'];
    $userpassword = $_POST["newpwd"];

    if ($_POST["oldpwd"] != $_SESSION["password"]) {
        header('Location: ../../pwd.php?incorrectoldpassword=true');
    } elseif ($_POST["oldpwd"] == $_POST["newpwd"]) {
        header('Location: ../../pwd.php?passwordnotchanged=true');
    } elseif ($_POST["newpwd"] == $_SESSION["username"]) {
        header('Location: ../../pwd.php?sameusernameandpassword=true');
    } elseif ($_POST["newpwd"] != $_POST["renewpwd"]) {
        header('Location: ../../pwd.php?failed=true');
    } else {

        $stmt = $conn->prepare("UPDATE users SET userpassword = ? WHERE userid = ?");
        $stmt->bind_param("ss", $userpassword, $origuserid);
        $stmt->execute();

        $_SESSION['password'] = $userpassword;
        header('Location: ../../pwd.php?success=true');
	}  

	$conn->close();
?>