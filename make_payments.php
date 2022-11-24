<?php
    header("Content-Type: application/json");
    include_once("Payments/Payments.php");
    include_once("database/Database.php");

    $conn = new Database();
    $db = $conn -> connection();
    $pay = new Payments($db);
    $save = $pay -> makePayments();
    // if($save){
    //     header("Location: payments.html?success=Payment was successful, We will contact you as soon as possible for your next move.");
    // }else{
    //     header("Location: payments.html?error=Payment process was interrupted, if any amount was deducted please contact us for followups.");
    // }
?>