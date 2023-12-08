<div class="modal fade" id="<?php echo 'send'.$id; ?>"  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">E-mail Message</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" >
      <div class="modal-body bg-info" >
      Send a letter of apology to customers who signed up for a ride on this train ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
        <button type="submit" class="btn btn-success"  name="<?php echo 'send'.$id; ?>">Send</button>
        </form>
      </div>
    </div>
  </div>
</div>


<?php 
 

if(isset($_POST['send'.$id])){
  $sql_check_mail= mysqli_query($con,"SELECT users.email FROM ticket,users,trip WHERE ticket.id_user=users.id AND ticket.id_trip=trip.id_trip AND trip.id_train='$id'");
  require_once 'mail/mail.php';  
foreach($sql_check_mail as $data) :
$email = $data['email'];
  $mail->setFrom('sahnounemohamed009@gmail.com', 'REAILWAY DZ');
  $mail->Subject ="Regarding your trip!";
$mail->Body ="We apologize, dear customer, your flight has been canceled due to a problem with the train on which you previously registered
Regarding payment, you will be compensated. Thank you .";
$mail->addAddress($email);
$mail->send();
endforeach;
echo "<script>document.location='train.php?test=465';</script>";
}




?>