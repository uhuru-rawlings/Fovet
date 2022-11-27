<?php
    if(isset($_GET['delete'])){
        include_once("../../database/Database.php");
        include_once("../../models/Courses.php");
        $id = $_GET['delete'];

        $conn = new Database();
        $db = $conn -> connection();
        $course = new Courses($db);
        $course -> Id = $id;
        $delete = $course -> deleteCourse();
        if($delete){
            header("Location: list-courses.php?success=course details deleted successfully.");
        }else{
            header("Location: list-courses.php?error=Oops! something went wrong, please try again.");
        }
    }
?>