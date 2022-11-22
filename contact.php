<?php
    include_once("database/Database.php");
    include_once("models/Contact.php");
    if(isset($_POST['contact'])){
        $fullname = $_POST['fullname'];
        $Email = $_POST['Email'];
        $Subject = $_POST['Subject'];
        $Message = $_POST['Message'];

        $conn = new Database();
        $db   = $conn -> connection();
        $contacts = new Contact($db);
        $contacts -> Fullname = $fullname;
        $contacts -> Email    = $Email;
        $contacts -> Subject  = $Subject;
        $contacts -> Message  = $Message;
        $contact = $contacts -> saveMessage();
        if($contact){
            echo "Message sent, We'll try to get back to you as soon as possible.";
            echo "<script>setTimeout(() => { history.go(-1) },3000)</script>";
        }else{
            echo "Account could not be created please try again.";
            echo "<script>setTimeout(() => { history.go(-1) },3000)</script>";
        }
    }
?>