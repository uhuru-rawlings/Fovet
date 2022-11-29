<?php
    class Applications {
        public $Fullname;
        public $Email;
        public $Phone;
        public $Altphone;
        public $StartDate;
        private $conn;

        public function __construct($db)
        {
            $this -> conn = $db;
        }

        public function saveApplication()
        {
            $sql = "SELECT * FROM Applications WHERE Email = ? AND StartDate = ?";
            $query = $this -> conn -> prepare($sql);
            $query -> execute([$this -> Email, $this -> StartDate]);
            $rows = $query -> rowCount();
            if($rows > 0){
                return false;
            }else{
                $sql = "INSERT INTO Applications(Fullname,Email,Phone,Altphone,StartDate) VALUES(?,?,?,?,?)";
                $query = $this -> conn -> prepare($sql);
                $query -> execute([$this -> Fullname,$this -> Email,$this -> Phone,$this -> Altphone,$this -> StartDate]);
                if($query){
                    return true;
                }else{
                    return false;
                }
            }
        }

        public function getPayments()
        {
            $sql = "SELECT * FROM Payments";
            $query = $this -> conn -> prepare($sql);
            $query -> execute();
            if($query){
                while($results = $query -> fetchAll(PDO::FETCH_ASSOC)){
                    return $results;
                }
            }else{
                return false;
            }
        }

        public function getApplications()
        {
            $sql = "SELECT Courses.id,Courses.Course_Name,Courses.Course_Duration,Courses.Course_Fee,Courses.Course_Attendance,Courses.Date_added,Applications.StartDate,Applications.is_payed FROM Courses INNER JOIN Applications ON Applications.course = Courses.id WHERE Email = ?";
            $query = $this -> conn -> prepare($sql);
            $query -> execute([$this -> Email]);
            $rows = $query -> rowCount();
            if($rows > 0){
                while($results = $query -> fetchAll(PDO::FETCH_ASSOC)){
                    return $results;
                }
            }else{
                return false;
            }
        }
    }
?>