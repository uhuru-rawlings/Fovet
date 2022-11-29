<?php
    if(isset($_POST['apply'])){
        $Fullname   = $_POST['Fullname'];
        $Email      = $_POST['Email'];
        $Phone      = $_POST['Phone'];
        $Alt_Phone  = $_POST['Alt_Phone'];
        $Start_date = $_POST['Start_date'];
        $course     = $_POST['course_id'];

        include_once("../../database/Database.php");
        include_once("../../models/Applications.php");
        $conn = new Database();
        $db = $conn -> connection();
        $application = new Applications($db);
        $application -> Fullname   = $Fullname;
        $application -> Email      = $Email;
        $application -> Phone      = $Phone;
        $application -> Altphone   = $Alt_Phone;
        $application -> course     = $course;
        $application -> StartDate  = $Start_date;
        $save  = $application -> saveApplication();
        if($save){
            header("Location: list-courses.php?success=Application sent, We will get to you soon for your next step.");
        }else{
            echo "<script>alert('Oops! something went wrong, Either you had applied before, If not true please repeat the process.')</script>";
            echo"<script>setTimeout(() => { history.go(-1) },1000)</script>";
        }
    }
?>