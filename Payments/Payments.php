<?php
    class Payments {
        private $Till = 894553;
        private $conn;

        public function __construct($db)
        {
            $this -> conn = $db;
        }

        public function makePayments()
        {
            

            $response = '{
                "ResultCode": 0, 
                "ResultDesc": "Confirmation Received Successfully"
            }';
            
            $body ='Body';
            // DATA
            $mpesaResponse = file_get_contents('php://input');
        
            // log the response
            $logFile = "M_PESAConfirmationResponse.json";
            
        
            // write to file
            $log = fopen($logFile, "a");
        
            fwrite($log, $mpesaResponse);
            fclose($log);

            //Processing the Mpesa json response Data
            $mpesaResponse = file_get_contents('M_PESAConfirmationResponse.json');
            $callbackContent = json_decode($mpesaResponse);
            
            $Resultcode = $callbackContent->Body->stkCallback->ResultCode;
            $CheckoutRequestID = $callbackContent->Body->stkCallback->CheckoutRequestID;
            $Amount = $callbackContent->Body->stkCallback->CallbackMetadata->Item[0]->Value;
            $MpesaReceiptNumber = $callbackContent->Body->stkCallback->CallbackMetadata->Item[1]->Value;
            $PhoneNumber = $callbackContent->Body->stkCallback->CallbackMetadata->Item[4]->Value;
            if ($Resultcode == 0) {
                $sql = "INSERT INTO Payments(CheckoutRequestID,ResultCode,Amount,MpesaReceiptNumber,PhoneNumber) VALUES(?,?,?,?,?)";
                $query = $this -> conn -> prepare($sql);
                $query -> execute([$CheckoutRequestID,$Resultcode,$Amount,$MpesaReceiptNumber,$PhoneNumber]);
                unset($mpesaResponse);
                if($query){
                    unlink('M_PESAConfirmationResponse.json');
                   
                }

                     return true;
            }
            unlink('M_PESAConfirmationResponse.json');
            return false;
        }
    }
?>