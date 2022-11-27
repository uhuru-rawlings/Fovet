<?php
    class Courses {
        public $Course_name;
        public $Course_duration;
        public $Course_fee;
        public $Course_attendance;
        public $Course_image;
        public $Course_description;
        private $conn;

        public function __construct($db)
        {
            $this -> conn = $db;
        }

        public function addCourse()
        {
            $sql = "INSERT INTO Courses(Course_Name,Course_Duration,Course_Fee,Course_Attendance,Course_Image,Course_Description) VALUES(?,?,?,?,?,?)";
            $query = $this -> conn -> prepare($sql);
            $query -> execute([$this -> Course_name,$this -> Course_duration,$this -> Course_fee,$this -> Course_attendance,$this -> Course_image,$this -> Course_description]);
            if($query){
                return true;
            }else{
                return false;
            }
        }
    }
?>