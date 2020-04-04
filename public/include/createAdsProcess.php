 <?php 

    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

 
    require_once('../../resources/templates/config.php');

    if(isset($_POST['submit'])){

 
    $sql = "INSERT INTO `ads` (`user_id`, `cartype`, `carname`, `carmodel`, `bodytype`, `odometer`,`transmission`, `price`, `year`, `cylinder`, `engineDes`, `fuelEconomy`,`colour`, `seats`, `doors`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    
    $stmt = $db->prepare($sql);

    if(!$stmt){
      die('query failed');
    }else{
         $stmt->bind_param("sssssssssssssss", $_SESSION['id'], $_POST['vType'], $_POST['vName'], $_POST['vModel'], $_POST['vBodyType'], $_POST['odoMeter'], $_POST['transmission'], $_POST['vPrice'], $_POST['modelYr'], $_POST['cylinder'], $_POST['vEngDesc'], $_POST['economy'], $_POST['vColor'], $_POST['vSeats'],$_POST['Doors']);

        $stmt->execute();
    

        if($stmt->affected_rows > 0){

            $stmt->close();

            $sql = "SELECT MAX(id) FROM `ads` WHERE `user_id` = ?";
            $stmt = $db->prepare($sql);
            $stmt->bind_param('s',$_SESSION['id']);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
           
            $adId = $row['MAX(id)'];
           
            $stmt->close();
            //validating imges

                $files = $_FILES['image'];

      
                for($i =0; $i < count($files['name']); $i++){
                        $maxSize = (1024*1024);
                        $accepted = ['jpeg','jpg','png'];
                        $ext = pathinfo($files['name'][$i],PATHINFO_EXTENSION);
                        $dir = "../uploads/";
                    
                        if($files['size'][$i] > $maxSize || $files['size'][$i] <= 0){
                            $status['msg'] = $files['name'][$i]." file larger than 1MB";
                            echo json_encode($status);
                            exit;
                        
                        }elseif(!in_array($ext,$accepted)){
                            $status['msg'] = "Only jpg, Jpeg and png file format allowed";
                            echo json_encode($status);
                            exit;
                        }else{
                                $files['name'][$i] = uniqid().".".$ext;
                                move_uploaded_file($files['tmp_name'][$i],$dir.$files['name'][$i]); 
                            }
                    }

                   // print_r($files['name']);

            //inserting img query

            $totalImg = count($files['name']);

            for($j = 0; $j < $totalImg; $j++):

                $fileName = $files['name'][$j];
                

                $sql = "INSERT INTO `adimg` (`user_id`,`ads_id`,`imgname`) VALUES(?,?,?)";
                $stmt = $db->prepare($sql);
                    if(!$stmt){
                        die('query error');
                    }
                $stmt->bind_param('sss', $_SESSION['id'], $adId , $fileName);
                $stmt->execute();

                 if(!$stmt->affected_rows > 0){
                        $status['msg'] = $fileName.'not uploaded';
                        echo json_encode($status);
                        exit;
                 }

            endfor;
            $status['upload'] = true;
            
           // $status = url_encode($status);

           // header('location:../createAds.php?status='.$status);

            if($status['upload'] = true):
                $token = createToken();
                $tokenSql = "INSERT INTO `adapprove` (`ad_id`,`token`) VALUES(?,?)";
                $stmt = $db->prepare($tokenSql);
                    if(!$stmt){
                        die('query error');
                    }
                $stmt->bind_param('is', $adId , $token);
                $stmt->execute();
               

                 if($stmt->affected_rows > 0){

                    require '../../PHPMailer/src/Exception.php';
                    require '../../PHPMailer/src/PHPMailer.php';
                    require '../../PHPMailer/src/SMTP.php';

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
                                $mail->SMTPDebug = false;
                                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                     
                                $mail->isSMTP();                                           
                                $mail->Host       = 'smtp.gmail.com';                    
                                $mail->SMTPAuth   =  true;                                  
                                $mail->Username   = 'Motoronwheelsproject@gmail.com';                     
                                $mail->Password   = 'motorsonwheels123!';                               
                                $mail->SMTPSecure =  PHPMailer::ENCRYPTION_STARTTLS;
                                $mail->Port       =  587;                                    

                                //Recipients
                                $mail->setFrom('Motoronwheelsproject@gmail.com', 'New Post Add');
                                $mail->addAddress('Motoronwheelsproject@gmail.com', 'New Post(Motoronwheels)');     // Add a recipient
                                // $mail->addAddress('ellen@example.com');               // Name is optional
                                // $mail->addReplyTo('info@example.com', 'Information');
                                // $mail->addCC('cc@example.com');
                                // $mail->addBCC('bcc@example.com');

                                // Attachments
                                /* $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                                $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name */

                                // Content
                                $mail->isHTML(true);                                
                                $mail->Subject = 'New Ad Posted';
                                $mail->Body    = "<a href='http://localhost/motorOnWheels/public/approve.php?token=$token&adId=$adId'>Approve</a>";
                                $mail->AltBody = "<a href='http://localhost/motorOnWheels/public/approve.php?token=$token&adId=$adId'>Approve</a>";

                                $mail->send();
                                $status['mail'] = 'sent';
                                $stmt->close();
                                $updateTokensql = "UPDATE `adapprove` SET `mailsent` = '1' WHERE  `ad_id` = ? AND `token`= ?";
                                
                                $stmt = $db->prepare($updateTokensql);
                                    if(!$stmt){
                                        die('query error');
                                    }
                                $stmt->bind_param('is',$adId,$token);
                                $stmt->execute();
                                $stmt->close();
                                $status['msg'] = true;
                                echo json_encode($status);
                                exit;
                                
                            } catch (Exception $e) {
                                $status['mail'] = 'mailerror';
                                echo json_encode($msg['status']);
                                //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                exit;
                            }


                 }

            endif;


        }
     
    } 





 }


 
