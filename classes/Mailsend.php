<?php
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    class Mailsend{

        private $host = '';     
        private $Username = ''; 
        private $Password = ''; 
        private $Port = '';           
        private $addAddress = '';
        private $subject = '';  
        private $body = '';         
        private $title = '';
        private $clientName = '';
        private $maildebug  = false;
        public $response = ''; 

        
        public function __construct($params = array()){
            if (count($params) > 0){ 
               $this->initialize($params);         
            } 
        }


         public function initialize($params = array()){
            if(count($params)>0):
                foreach($params as $key => $val):
                    if(isset($this->$key)):
                       $this->$key = $val;
                    endif;
                endforeach;
            endif;
            $this->sendmail();
        }

        public function sendmail(){
           
                    require __DIR__.'/PHPMailer/src/Exception.php';
                    require __DIR__.'/PHPMailer/src/PHPMailer.php';
                    require __DIR__.'/PHPMailer/src/SMTP.php';
                    //echo 'testing';exit;

                    // Instantiation and passing `true` enables exceptions
                    $mail = new PHPMailer(true);

                            try {
                                // delete or comment SMTPOptions if you are using online sever
                                $mail->SMTPOptions = array(
                                'ssl' => array(
                                        'verify_peer' => false,
                                        'verify_peer_name' => false,
                                        'allow_self_signed' => true
                                    )
                                );
                                //Server settings
                                $mail->SMTPDebug = $this->maildebug;
                                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                     
                                $mail->isSMTP();                                           
                                $mail->Host       =     $this->host;                    
                                $mail->SMTPAuth   =     true;                                  
                                $mail->Username   =     $this->Username;                     
                                $mail->Password   =     $this->Password;                               
                                $mail->SMTPSecure =     PHPMailer::ENCRYPTION_STARTTLS;
                                $mail->Port       =     $this->Port;                                    

                                

                                //Recipients
                                $mail->setFrom($mail->Username, $this->title);
                                $mail->addAddress($this->addAddress, $this->clientName);     // Add a recipient
                                // $mail->addAddress('ellen@example.com');               // Name is optional
                                // $mail->addReplyTo('info@example.com', 'Information');
                                // $mail->addCC('cc@example.com');
                                // $mail->addBCC('bcc@example.com');

                                // Attachments
                                /* $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                                $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name */

                                // Content
                                $mail->isHTML(true);                                
                                $mail->Subject = $this->subject;
                                $mail->Body    = $this->body;
                               // $mail->AltBody = $this->body;

                                $mail->send();
                                return $this->response = true;
                                exit;
                               
                                
                            } catch (Exception $e) {
                                return $this->response = 'mailerror';
                               
                                //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                exit;
                            }

        }
    }


?>