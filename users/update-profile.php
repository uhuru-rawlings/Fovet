<?php
    if(isset($_POST['save'])){
        session_start();
        include_once("../database/Database.php");
        include_once("../models/Registration.php");
        $phone_number = $_POST['phone_number'];
        $gender       = $_POST['gender'];
        $dob          = $_POST['dob'];
        $nationality  = $_POST['nationality'];

        $conn = new Database();
        $db = $conn -> connection();
        $profile = new Registration($db);
        $profile -> Email = $_SESSION['current_user'];
        $user = $profile -> getUser();
        $profile -> user = $user['id'];
        $profile -> phone = $phone_number;
        $profile -> gender = $gender;
        $profile -> dob = $dob;
        $profile -> nationality = $nationality;
        $save = $profile -> updateProfile();
        if($save){
            header("Location: index.php?success=Profile save successfully.");
        }else{
            header("Location: index.php?error=Oops! something went wrong, profile not saved.");
        }
    }
?>