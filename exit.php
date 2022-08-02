<?php
require "_load.php";
unset($_SESSION["id"]);
header("Location:"."login.php");