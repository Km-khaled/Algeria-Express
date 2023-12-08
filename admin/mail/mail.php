<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;



require 'mailer/autoload.php';


$mail = new PHPMailer();
        
    //Server settings
 //   $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
//  $mail->SMTPDebug = SMTP::DEBUG_SERVER;                    
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                   
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'sahnounemohamed009@gmail.com';                    
    $mail->Password   = 'rvuuhafseteillhr';                           

    $mail->SMTPSecure = 'ssl';         
    $mail->Port       = 465;                                   

// Content
$mail->isHTML(true);  
$mail->CharSet = "UTF-8";
