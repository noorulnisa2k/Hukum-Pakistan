<?php
    require 'phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;

    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        //$mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.hukumpakistan.pk';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'contact@hukumpakistan.pk';                     //SMTP username
        $mail->Password   = 'ofqlt9X3p8)6';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('contact@hukumpakistan.pk', 'Hukum Pakistan');
        $mail->addAddress('moizwaseem94@gmail.com');     //Add a recipient
    
        //Attachments
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    
        if($mail->send()){
            echo "Success";
        }else{
            echo "Failed";
        }
        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>