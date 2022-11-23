<?php
    ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
    header("Content-Type: application/json");
    include_once("Payments/Payments.php");
    include_once("database/Database.php");

    $conn = new Database();
    $db = $conn -> connection();
    $pay = new Payments($db);
    $save = $pay -> makePayments();
    echo $save;
?>