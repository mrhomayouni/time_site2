<?php
require "_load.php";
if(isset($_SESSION["id"])){
    header("Location:"."panel.php");
}else{
    header("Location:"."login.php");
}
