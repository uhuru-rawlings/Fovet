<?php
    class Courses {
        public $Course_name;
        public $Course_duration;
        public $Course_fee;
        public $Course_attendance;
        public $Course_image;
        public $Course_description;
        public $Id;
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

        public function getCourses()
        {
            $sql = "SELECT * FROM Courses";
            $query = $this ->conn -> prepare($sql);
            $query -> execute();
            $rows = $query -> rowCount();
            if($rows > 0){
                while($results = $query -> fetchAll(PDO::FETCH_ASSOC)){
                    return $results;
                }
            }else{
                return false;
            }
        }

        public function getCourse()
        {
            $sql = "SELECT * FROM Courses WHERE id = ?";
            $query = $this ->conn -> prepare($sql);
            $query -> execute([$this -> Id]);
            $rows = $query -> rowCount();
            if($rows > 0){
                while($results = $query -> fetch(PDO::FETCH_ASSOC)){
                    return $results;
                }
            }else{
                return false;
            }
        }

         public function updateCourse()
        {
            if($this -> Course_image == "" || empty($this -> Course_image)){
                $sql = "UPDATE Courses SET Course_Name = ?,Course_Duration = ? ,Course_Fee = ?,Course_Attendance = ?,Course_Description = ? WHERE id = ?";
                $query = $this -> conn -> prepare($sql);
                $query -> execute([$this -> Course_name,$this -> Course_duration,$this -> Course_fee,$this -> Course_attendance,$this -> Course_description,$this -> Id]);
            }else{
                $sql = "UPDATE Courses SET Course_Name = ?,Course_Duration = ? ,Course_Fee = ?,Course_Attendance = ?,Course_Image = ?,Course_Description = ? WHERE id = ?";
                $query = $this -> conn -> prepare($sql);
                $query -> execute([$this -> Course_name,$this -> Course_duration,$this -> Course_fee,$this -> Course_attendance,$this -> Course_image,$this -> Course_description,$this -> Id]);
            }
            if($query){
                return true;
            }else{
                return false;
            }
        }

        public function deleteCourse()
        {
            $sql = "DELETE FROM Courses WHERE id = ?";
            $query = $this -> conn -> prepare($sql);
            $query -> execute([$this -> Id]);
            if($query){
                return true;
            }else{
                return false;
            }
        }
    }
?>