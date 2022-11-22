<?php
    if(isset($_POST['login'])){
        ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
        include_once("../database/Database.php");
        include_once("../models/Registration.php");

        $email_address = $_POST['email_address'];
        $user_password = $_POST['user_password'];

        $conn  = new Database();
        $db    = $conn -> connection();
        $user  = new Registration($db);
        $user  -> Email = $email_address;
        $user  -> Password = $user_password;
        $users = $user -> loginUser(); 
        if($users){
            header("Location: ../index.html");
        }else{
            echo "Wrong credentials provided, please confirm username or password.";
            echo "<script>setTimeout(() => { history.go(-1) },3000)</script>";
        }
    }
?>