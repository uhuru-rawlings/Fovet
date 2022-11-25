<?php
    if(isset($_POST['apply'])){
        ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
        $Fullname   = $_POST['Fullname'];
        $Email      = $_POST['Email'];
        $Phone      = $_POST['Phone'];
        $Alt_Phone  = $_POST['Alt_Phone'];
        $Start_date = $_POST['Start_date'];

        include_once("database/Database.php");
        include_once("models/Applications.php");
        $conn = new Database();
        $db = $conn -> connection();
        $application = new Applications($db);
        $application -> Fullname   = $Fullname;
        $application -> Email      = $Email;
        $application -> Phone      = $Phone;
        $application -> Altphone   = $Alt_Phone;
        $application -> StartDate  = $Start_date;
        $save  = $application -> saveApplication();
        if($save){
            header("Location: payments.php?success=Application sent, We will get to you soon for your next step.");
        }else{
            echo "<script>alert('Oops! something went wrong, Either you had applied before, If not true please repeat the process.')</script>";
            echo"<script>setTimeout(() => { history.go(-1) },1500)</script>";
        }
    }
?>