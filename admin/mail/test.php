<?php
 require_once 'mail.php';
 $mail->setFrom('sahnounemohamed009@gmail.com', 'REAILWAY DZ');
 $mail->addAddress('sei00gen@gmail.com');
//  $mail->addCC('academyshiyar@gmail.com');
 $mail->Subject ="You trip reserved";
 $mail->Body ="hi , sorry whith that but this trip is on pane !! anuuler";
$mail->send();
?>