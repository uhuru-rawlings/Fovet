<?php
    class Contact {
        public $Fullname;
        public $Email;
        public $Subject;
        public $Message;
        private $conn;

        public function __construct($db)
        {
            $this -> conn = $db;
        }

        public function saveMessage()
        {
            $sql = "INSERT INTO `contact`(`Fullname`,`Email`,`Subject`,`Message`) VALUES(?,?,?,?)";
            $query = $this -> conn -> prepare($sql);
            $query -> execute([$this -> Fullname,$this -> Email,$this -> Subject,$this -> Message]);
            if($query){
                return true;
            }else{
                return false;
            }
        }
    }
?>