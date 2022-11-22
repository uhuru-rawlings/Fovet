<?php
    class Registration {
        public $Username;
        public $Email;
        public $Password;
        public $conn;

        public function __construct($db)
        {
            $this -> conn = $db;
        }

        public function addUser()
        {
            $sql = "SELECT * FROM Registration WHERE Email = ?";
            $query = $this -> conn -> prepare($sql);
            $query -> execute([$this -> Email]);
            $rows = $query -> rowCount();
            if($rows > 0){
                return false;
            }else{
                $sql = "INSERT INTO `Registration`(`Username`,`Email`,`Password`) VALUES(?,?,?)";
                $query = $this ->conn -> prepare($sql);
                $query -> execute([$this -> Username,$this -> Email,password_hash($this -> Password,PASSWORD_DEFAULT)]);
                if($query){
                    return true;
                }else{
                    return false;
                }
            }
        }

        public function resetPassword()
        {
            $sql = "SELECT * FROM Registration WHERE Email = ?";
            $query = $this -> conn -> prepare($sql);
            $query -> execute([$this -> Email]);
            $rows = $query -> rowCount();
            if($rows < 1){
                return false;
            }else{
                $sql = "UPDATE `Registration` SET `Password` = ? WHERE `Email` = ?";
                $query = $this ->conn -> prepare($sql);
                $query -> execute([password_hash($this -> Password,PASSWORD_DEFAULT),$this -> Email]);
                if($query){
                    return true;
                }else{
                    return false;
                }
            }
        }

        public function loginUser()
        {
            $sql = "SELECT * FROM Registration WHERE Email = ?";
            $query = $this -> conn -> prepare($sql);
            $query -> execute([$this -> Email]);
            $rows = $query -> rowCount();
            if($rows > 0){
                while($results = $query -> fetch(PDO::FETCH_ASSOC)){
                    $pass = $results['Password'];
                    if(password_verify($this -> Password,$pass)){
                        setcookie("user",$this -> Email,time() +3600,"/");
                        return true;
                    }
                }
            }else{
                return false;
            }
        }
    }
?>