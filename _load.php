<?php
require "secret.php";
session_start();
try {
    $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PAS);
    $conn->exec("SET NAMES UTF8");
} catch (PDOException $e) {
    echo "database error" . $e->getMessage();
}
function auth_reqire(){
    if(!isset($_SESSION["id"])){
        header("Location:"."login.php");
        exit();
    }
}
function get_projects()
{
    global $conn;
    $sql = "SELECT * FROM `project`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $project=$stmt->fetchAll();
    return $project;
}

function get_products($project_id){
    global $conn;
    $sql="SELECT * FROM `product` WHERE `project_id`=:project_id";
    $stmt=$conn->prepare($sql);
    $stmt->bindParam("project_id",$project_id);
    $stmt->execute();
    $product=$stmt->fetchAll();
    return $product;
}

function get_activities(){
    global $conn;
    $sql="SELECT * FROM `activity`";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $activities=$stmt->fetchAll();
    return $activities;
}
function get_product($product_id){
    global $conn;
    $sql="SELECT * FROM  `product` WHERE `id`=:id";
    $stmt=$conn->prepare($sql);
    $stmt->bindParam("id",$product_id);
    $stmt->execute();
    $product=$stmt->fetch();
    return $product;
}


































