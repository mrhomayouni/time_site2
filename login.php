<?php
require "_load.php";
if (isset($_POST["user"], $_POST["pass"], $_POST["sub"])) {
    global $conn;
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    $sql = "SELECT * FROM `user` WHERE `username`=:uname AND  `password`=:pass";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam("uname",$user);
    $stmt->bindParam("pass",$pass);
    $stmt->execute();
    $user=$stmt->fetch();
    if($user===false){
        echo "نام یا رمز عبور اشتباه است";
    }else{
        $_SESSION["id"]=$user["id"];
        header("Location:"."panel.php");    }
}



?>

<form action="" method="post">
    <input type="text" name="user">
    <input type="text" name="pass">
    <input type="submit" name="sub">
</form>
