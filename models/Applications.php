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
    }
?>