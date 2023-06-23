<?php
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Create an instance; passing true enables exceptions
function sendmail($email,$name,$title,$content){
    try {
        $mail = new PHPMailer(true);
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'ngoanhduc10a2@gmail.com';                     //SMTP username
        $mail->Password   = 'eavothhvpzitsfsf';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS
        $mail->CharSet='UTF-8';
        //Recipients
        $mail->setFrom('ngoanhduc10a2@gmail.com', 'Cửa hàng nhạc cụ -Yomate');
        $mail->addAddress($email,$name);     //Add a recipientme
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $title;
        $mail->Body    = $content;

        $mail->send();
        echo 'Mail đã được gửi!';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}