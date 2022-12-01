<?php
    if(isset($_POST['login'])){
        // ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
        session_start();
        include_once("../../database/Database.php");
        include_once("../../models/Registration.php");

        $email_address = $_POST['email_address'];
        $user_password = $_POST['user_password'];

        $conn  = new Database();
        $db    = $conn -> connection();
        $user  = new Registration($db);
        $user  -> Email = $email_address;
        $user  -> Password = $user_password;
        $users = $user -> loginUser(); 
        if($users){
            $_SESSION['current_user'] = $email_address;
            header("Location: ../index.php");
        }else{
             header("Location: index.php?error=Wrong credentials provided, please confirm username or password");
        }
    }
?>