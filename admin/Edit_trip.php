
<div class="modal fade" id="<?php echo 'T'.$id_trip; ?>"  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Trip</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
           <!-- Form Edit train  -->
      <form class="row g-3 needs-validation" method="post" novalidate>
      <div class="modal-body">
  <div class="col-md-12">
    <label  class="form-label">Departure</label>
    <input type="text" class="form-control" name="Departure" value="<?php echo $Departure;   ?>" required>
   
  </div>
  <div class="col-md-12">
    <label  class="form-label">Destination</label>
    <input type="text" class="form-control" name="Destination"  value="<?php echo $Destination;   ?>" required>
   
  </div>
  <div class="col-md-12">
    <label  class="form-label">Time</label>
    <input type="time" class="form-control" name="tme"  value="<?php echo $time; ?>" required>
    
  </div>
  <div class="col-md-12">
    <label  class="form-label">Date</label>
    <input type="text" class="form-control" name="dte"  value="<?php echo $date;?>" required>
    
  </div>
  <div class="col-md-12">
    <label  class="form-label">Amount</label>
    <input type="text" class="form-control" name="amount"  value="<?php echo $amount;?>" required>

  </div>
      </div>
      <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
    <button class="btn btn-success"  type="submit" name="<?php echo 'T'.$id_trip; ?>">Save</button>
  </form>
     </div>
    </div>
  </div>
   
 
  
</div>

<?php

if(isset($_POST['T'.$id_trip])){
    $Departure = $_POST['Departure'];
    $Departure=trim($Departure);
    $Destination = $_POST['Destination'];
    $Destination=trim($Destination);
    $time = $_POST['tme'];
    $time=trim( $time);
    $date = $_POST['dte'];
    $date = trim($date);
    $amount = $_POST['amount'];
    $amount=trim($amount);
    $date = DATE('y.m.d,h:i:s');
    $date_add = explode(',',$date);
    $date1 = strtolower($date_add[0]);
    $date2 = strtolower($date_add[1]);
if((is_string($Departure) && is_string($Destination) && is_string($time) && is_string($date) && is_numeric($amount)) && ($Departure!="" && $Destination!="" && $time!="" && $date!="" && $amount!="") && (!empty($Departure)&&!empty($Destination)&&!empty($time)&&!empty($date)&&!empty($amount))){
$sql_d= "INSERT INTO gl.history_admin(action_h,dte,tme) VALUES('Administrator has re-edited a Trip Info : $Departure --> $Destination ','$date1','$date2')";
$result_h = mysqli_query($con,$sql_d);
$sql = "UPDATE trip SET trip.Departure ='$Departure',trip.Destination ='$Destination',trip.tme ='$time',trip.dte ='$date',trip.amount ='$amount' WHERE trip.id_trip='$id_trip'";
$result = mysqli_query($con,$sql);
if($result)
echo "<script>document.location='trip.php?test_e=1';</script>";
else echo "<script>document.location='trip.php?test_e=0';</script>";
}else{
  echo "<script>document.location='trip.php?test_e=44';</script>";
}
}
?>