<?php
$to ="sahnounemohamed009@gmail.com";
$subject = "test email";
$message = " hello my name sahnoune";
$headers = "From: sei00gen@gmail.com\r\nReply-To: sei00gen@gmail.com";
$mail_sent = mail($to,$subject,$message,$headers);
if($mail_sent==true)
echo "mail send";
else
echo "mail fialed";
?>