<?php
    if(isset($_POST['save'])){
        ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
        include_once("../../database/Database.php");
        include_once("../../models/Courses.php");
        $course_id = $_POST['course_id'];
        $course_name = $_POST['course_name'];
        $course_duration = $_POST['course_duration'];
        $course_fee = $_POST['course_fee'];
        $attendance = $_POST['attendance'];
        $class_image = $_FILES['class_image'];
        $description = $_POST['description'];

        $conn = new Database();
        $db = $conn -> connection();
        $courses = new Courses($db);
        
        $file_upload = move_uploaded_file($file_tmpname,$location);
        $courses -> Course_name        = $course_name;
        $courses -> Course_duration    = $course_duration;
        $courses -> Course_fee         = $course_fee;
        $courses -> Course_attendance  = $attendance;
        if(!empty($_FILES['class_image']['name']) || $_FILES['class_image']['name'] !== ""){
            // upload image
            $file_tmpname = $_FILES['class_image']['tmp_name'];
            $file_name = $_FILES['class_image']['name'];
            $location = "../../uploads/".$file_name;
            $courses -> Course_image = $file_name;
        }else{
            $courses -> Course_image = "";
        }
        $courses -> Course_description = $description;
        $courses -> Id = $course_id;

        $course = $courses -> updateCourse();
        $id = $course_id;
        if($course){
            header("Location: update-course.php?update={$id}&success=course updated successfully.");
        }else{
            header("Location:  update-course.php?update={$id}&error=Oops! failed to upload course");
        }

    }
?>