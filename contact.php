<?php
    include_once("database/Database.php");
    include_once("models/Contact.php");
    include_once("Sendmail/Sendmail.php");
    if(isset($_POST['contact'])){
        $fullname = $_POST['fullname'];
        $Email = $_POST['Email'];
        $Subject = $_POST['Subject'];
        $Message = $_POST['Message'];
        $token = $_POST['token'];
        if(empty($token)){
            header("Location: contact.html");
        }

        $conn = new Database();
        $db   = $conn -> connection();
        $contacts = new Contact($db);
        $contacts -> Fullname = $fullname;
        $contacts -> Email    = $Email;
        $contacts -> Subject  = $Subject;
        $contacts -> Message  = $Message;
        $contact = $contacts -> saveMessage();
        if($contact){
            $body = "Name: {$fullname},
                    <br>Email: {$Email},
                    <br> Subject: {$Subject},
                    <br> Message: {$Message}";
            $emails = new sendMail();
            $emails -> body = $body;
            $emails -> to = "uhururawlings40@gmail.com";
            $emails -> subject = "New Message From Fovet";
            $send = $emails -> sendMail();
            echo "Message sent, We'll try to get back to you as soon as possible.";
            echo "<script>setTimeout(() => { history.go(-1) },3000)</script>";
        }else{
            echo "Account could not be created please try again.";
            echo "<script>setTimeout(() => { history.go(-1) },3000)</script>";
        }
    }
?>