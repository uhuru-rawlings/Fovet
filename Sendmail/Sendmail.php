<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require "vendor/autoload.php";
    class SendMail {
        public $body;
        public $to;
        public $subject;

        public function sendMail()
        {
            try {
                $mail = new PHPMailer(true);
                $mail->SMTPDebug = 0;
                $mail->isSMTP(); 
                $mail->Host       = 'mail.voocar.co.ke';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'info@voocar.co.ke';
                $mail->Password   = 'Info@2022!';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
                $mail->Port       = 587;                                   
                $mail->setFrom("info@voocar.co.ke");
                $mail->addAddress($this -> to); 
                $mail->addReplyTo('info@voocar.co.ke');
                $mail->isHTML(true);
                $mail->Subject = $this -> subject;
                $mail->Body = $this -> body;
            
                $mail->send();
                return true;
            } catch (Exception $e) {
                return false;
            }
        }
    }
?>