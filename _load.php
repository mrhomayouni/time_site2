<?php
require "secret.php";
session_start();
try {
    $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PAS);
    $conn->exec("SET NAMES UTF8");
} catch (PDOException $e) {
    echo "database error" . $e->getMessage();
}
function auth_reqire()
{
    if (!isset($_SESSION["id"])) {
        header("Location:" . "login.php");
        exit();
    }
}

function get_user($user)
{
    global $conn;
    $sql="SELECT * FROM `user` WHERE `id`=:id";
    $stmt=$conn->prepare();

}

function get_projects()
{
    global $conn;
    $sql = "SELECT * FROM `project`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $project = $stmt->fetchAll();
    return $project;
}

function get_products($project_id)
{
    global $conn;
    $sql = "SELECT * FROM `product` WHERE `project_id`=:project_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam("project_id", $project_id);
    $stmt->execute();
    $product = $stmt->fetchAll();
    return $product;
}

function get_activities()
{
    global $conn;
    $sql = "SELECT * FROM `activity`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $activities = $stmt->fetchAll();
    return $activities;
}

function get_product($product_id)
{
    global $conn;
    $sql = "SELECT * FROM  `product` WHERE `id`=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam("id", $product_id);
    $stmt->execute();
    $product = $stmt->fetch();
    return $product;
}

function report($user_id, $project_id, $product_id, $activity_id, $normal_h, $normal_m, $extra_h, $extra_m)
{
    global $conn;
    $sql = "INSERT INTO `report`(`user_id`, `project_id`, `product_id`, `activity_id`, `normal_h`, `normal_m`, `extra_h`, `extra_m`) 
VALUES (:user_id,:project_id,:product_id,:activity_id,:normal_h,:normal_m,:extra_h,:extra_m)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam("user_id", $user_id);
    $stmt->bindParam("project_id", $project_id);
    $stmt->bindParam("product_id", $product_id);
    $stmt->bindParam("activity_id", $activity_id);
    $stmt->bindParam("normal_h", $normal_h);
    $stmt->bindParam("normal_m", $normal_m);
    $stmt->bindParam("extra_h", $extra_h);
    $stmt->bindParam("extra_m", $extra_m);
    $stmt->execute();
}

##################
if (isset($_SESSION["id"])) {
    $user["id"] = $_SESSION["id"];
}


































