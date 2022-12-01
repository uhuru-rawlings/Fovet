<?php
    if(isset($_POST['save'])){
        // ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
        include_once("../../database/Database.php");
        include_once("../../models/Courses.php");
        $course_name = $_POST['course_name'];
        $course_duration = $_POST['course_duration'];
        $course_fee = $_POST['course_fee'];
        $attendance = $_POST['attendance'];
        $class_image = $_FILES['class_image'];
        $description = $_POST['description'];

        $conn = new Database();
        $db = $conn -> connection();
        $courses = new Courses($db);
        // upload image
        $file_tmpname = $_FILES['class_image']['tmp_name'];
        $file_name = $_FILES['class_image']['name'];
        $location = "../../uploads/".$file_name;
        $file_upload = move_uploaded_file($file_tmpname,$location);
        $courses -> Course_name        = $course_name;
        $courses -> Course_duration    = $course_duration;
        $courses -> Course_fee         = $course_fee;
        $courses -> Course_attendance  = $attendance;
        $courses -> Course_image       = $file_name;
        $courses -> Course_description = $description;
        if($file_upload){
            $course = $courses -> addCourse();
            if($course){
                header("Location: add-courses.php?success=course added successfully.");
            }else{
                header('Location:  add-courses.php?error=Oops! failed to upload course');
            }
        }else{
            header("Location: add-courses.php?error=Oops! failed to upload file, please try again.");
        }

    }
?>