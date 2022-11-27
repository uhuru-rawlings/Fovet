<?php
    if(isset($_POST['signup'])){
        include_once("../../database/Database.php");
        include_once("../../models/Registration.php");

        $Fname = $_POST['Fname'];
        $Lname = $_POST['Lname'];
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];
        $id = $_POST['account'];

        $conn  = new Database();
        $db    = $conn -> connection();
        $user  = new Registration($db);
        $user  -> Username = $Fname." ".$Lname;
        $user  -> Email = $Email;
        $user  -> Id = $id;
        $user  -> Role = "Admin";
        if($Password == "" || empty($Password)){
            $user -> Password = "";
        }else{
             $user  -> Password = $Password;
        }
        $users = $user -> updateAdmin(); 
        if($users){
            header("Location: update-admins.php?update={$id}&success=Account updated successfully.");
        }else{
            header("Location: update-admins.php?update={$id}&error=Oops! something went wrong, please try again.");
        }
    }
?>