<?php
    // header("Content-Type: application/json");
    include_once("Payments/Payments.php");
    include_once("database/Database.php");

    $conn = new Database();
    $db = $conn -> connection();
    $pay = new Payments($db);
    $save = $pay -> makePayments();
    if($save){
        header("Location: payments.php?success=Payment was successful, We will get to you shortly.");
    }else{
        header("Location: payments.php?success=Payment process was interrupted, if any amount was deducted please contact us for follow ups.");
    }
?>