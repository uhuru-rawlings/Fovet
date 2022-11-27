<?php
    if(isset($_POST['signup'])){
        ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
        include_once("../database/Database.php");
        include_once("../models/Registration.php");

        $username = $_POST['username'];
        $email_address = $_POST['email_address'];
        $user_password = $_POST['user_password'];

        $conn  = new Database();
        $db    = $conn -> connection();
        $user  = new Registration($db);
        $user  -> Username = $username;
        $user  -> Email = $email_address;
        $user  -> Role = "User";
        $user  -> Password = $user_password;
        $users = $user -> addUser(); 
        if($users){
            header("Location: index.html");
        }else{
            echo "Account could not be created please try again.";
            echo "<script>setTimeout(() => { history.go(-1) },3000)</script>";
        }
    }
?>