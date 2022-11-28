<?php
    class Registration {
        public $Username;
        public $Email;
        public $Role;
        public $Password;
        public $Id;
        public $user;
        public $phone;
        public $gender;
        public $dob;
        public $nationality;
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
                $sql = "INSERT INTO `Registration`(`Username`,`Email`,`Password`,`Roles`) VALUES(?,?,?,?)";
                $query = $this ->conn -> prepare($sql);
                $query -> execute([$this -> Username,$this -> Email,password_hash($this -> Password,PASSWORD_DEFAULT),$this -> Role]);
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
            session_start();
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

        public function getUser()
        {
            $sql = "SELECT * FROM Registration WHERE Email = ?";
            $query = $this -> conn -> prepare($sql);
            $query -> execute([$this -> Email]);
            $rows = $query -> rowCount();
            if($rows > 0){
                while($results = $query -> fetch(PDO::FETCH_ASSOC)){
                    return $results;
                }
            }else{
                return false;
            }
        }

        public function getProfile()
        {
            $sql = "SELECT Profile.id,Profile.Phone,Profile.Gender,Profile.Dob,Profile.Nationality,Registration.id,Registration.Username,Registration.Email,Registration.Roles,Registration.is_active FROM Registration INNER JOIN Profile ON Registration.id = Profile.user WHERE Profile.user = ?";
            $query = $this -> conn -> prepare($sql);
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

        public function updateUser()
        {
            $sql = "SELECT * FROM Registration WHERE id = ?";
            $query = $this -> conn -> prepare($sql);
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
        public function getUsers()
        {
            $sql = "SELECT * FROM Registration WHERE Roles = ?";
            $query = $this -> conn -> prepare($sql);
            $query -> execute([$this -> Role]);
            $rows = $query -> rowCount();
            if($rows > 0){
                while($results = $query -> fetchAll(PDO::FETCH_ASSOC)){
                    return $results;
                }
            }else{
                return false;
            }
        }

        public function updateAdmin()
        {
            if(empty($this -> Password) || $this -> Password == ""){
                $sql = "UPDATE Registration SET Username = ?, Email = ? WHERE id = ?";
                $query = $this -> conn -> prepare($sql);
                $query -> execute([$this -> Username,$this -> Email,$this -> Id]);
            }else{
                $sql = "UPDATE Registration SET Username = ?, Email = ?, Password = ? WHERE id = ?";
                $query = $this -> conn -> prepare($sql);
                $query -> execute([$this -> Username,$this -> Email,password_hash($this -> Password,PASSWORD_DEFAULT),$this -> Id]);
            }

            if($query){
                return true;
            }else{
                return false;
            }
        }

        public function updateProfile()
        {
            $sql   = "SELECT * FROM `Profile` WHERE user = ?";
            $query = $this -> conn -> prepare($sql);
            $query -> execute([$this -> user]);
            $rows = $query -> rowCount();
            if($rows > 0){
                $sql = "UPDATE `Profile` SET user = ?,Phone = ?,Gender = ?,Dob = ?,Nationality = ? WHERE user = ?";
                $query = $this -> conn -> prepare($sql);
                $query -> execute([$this -> user,$this -> phone,$this -> gender,$this -> dob,$this -> nationality,$this -> user]);
            }else{
                $sql = "INSERT INTO `Profile`(user,Phone,Gender,Dob,Nationality) VALUES(?,?,?,?,?)";
                $query = $this ->conn -> prepare($sql);
                $query -> execute([$this -> user,$this -> phone,$this -> gender,$this -> dob,$this -> nationality]);
            }

            if($query){
                return true;
            }else{
                return false;
            }
        }
    }
?>