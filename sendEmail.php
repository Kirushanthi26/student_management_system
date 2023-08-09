<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if(isset($_POST["acceptBtn"])){
    $emailName = $_POST["emailName"];
    $emailAddress = $_POST["emailAddress"];
}


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function


//Load Composer's autoloader
//require './vendor/autoload.php';
require 'D:\xampp\htdocs\simple_sms\vendor\autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'kirushanthi26.it@gmail.com';                     //SMTP username
    $mail->Password   = 'ucfdgfqrwpcbhlha';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; ;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('kirushanthi26.it@gmail.com', 'kirushanthi');
    $mail->addAddress($emailAddress, $emailName);     //Add a recipient
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'enrolment is successfull';
    $mail->Body    = 'thanks for selecting us!. entrolment is successfull!!!';
    $mail->AltBody = 'thanks for selecting us!. entrolment is successfull!!!';

    $mail->send();
    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}