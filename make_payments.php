<?php
    // header("Content-Type: application/json");
    include_once("Payments/Payments.php");
    include_once("database/Database.php");

    $conn = new Database();
    $db = $conn -> connection();
    $pay = new Payments($db);
    $save = $pay -> makePayments();
    if($save){
        echo "<script>alert('saved')</script>";
        echo "<script>window.location.href='http://127.0.0.1/Fovet/payments.html'</script>";
    }else{
        echo "<script>alert('Payment process was interrupted, if any amount was deducted please contact us for follow ups')</script>";
        echo "<script>window.location.href='http://127.0.0.1/Fovet/payments.html'</script>";
    }
?>