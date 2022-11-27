<?php
    if(isset($_POST['signup'])){
        include_once("../../database/Database.php");
        include_once("../../models/Registration.php");

        $Fname = $_POST['Fname'];
        $Lname = $_POST['Lname'];
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];

        $conn  = new Database();
        $db    = $conn -> connection();
        $user  = new Registration($db);
        $user  -> Username = $Fname." ".$Lname;
        $user  -> Email = $Email;
        $user  -> Role = "User";
        $user  -> Password = $Password;
        $users = $user -> addUser(); 
        if($users){
            header("Location: add-users.php?success=Account created successfully.");
        }else{
            header("Location: add-users.php?error=Oops! something went wrong, please try again.");
        }
    }
?>