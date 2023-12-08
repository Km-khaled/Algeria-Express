
<div class="modal fade" id="add_trip"  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Trip</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
           <!-- Form add train  -->
      <form class="row g-3 needs-validation" method="post" novalidate>
      <div class="modal-body">
  <div class="col-md-12">
    <label  class="form-label">Departure</label>
    <input type="text" class="form-control" name="Departure"  required>
    <div class="valid-feedback">
     <!-- Message succes  -->
    </div>
  </div>
  <div class="col-md-12">
    <label  class="form-label">Destination</label>
    <input type="text" class="form-control" name="Destination"   required>
    <div class="valid-feedback">
     <!-- Message succes  -->
     </div>
  </div>

  <div class="col-md-12 mt-4">
  <select class="form-select"  name="train_selected" require>
  <option selected disabled>Select train</option>
  <?php  
$sql_train_a ="SELECT train.id FROM train WHERE train.statut=1 EXCEPT SELECT train.id FROM train,trip WHERE train.statut=1 AND train.id=trip.id_train";
$sql_train_a_result = mysqli_query($con,$sql_train_a);
foreach($sql_train_a_result as $col) :
$id_train_disponible = $col['id'];
    ?>
  <option value="<?php echo $id_train_disponible;?>"><?php echo $id_train_disponible;?></option>  
<?php
endforeach;
?>
</select>
  </div>



  <div class="col-md-12">
    <label  class="form-label">Time</label>
    <input type="time" class="form-control" name="tme"   required>
    <div class="valid-feedback">
     <!-- Message succes  -->
     </div>
  </div>


  <div class="col-md-12">
    <label  class="form-label">Time-Arrive</label>
    <input type="time" class="form-control" name="tme_arr"   required>
    <div class="valid-feedback">
     <!-- Message succes  -->
     </div>
  </div>


  <div class="col-md-12">
    <label  class="form-label">Date</label>
    <input type="date" class="form-control" name="dte"   required>
    <div class="valid-feedback">
     <!-- Message succes  -->
     </div>
  </div>
  <div class="col-md-12">
    <label  class="form-label">Amount</label>
    <input type="number" class="form-control" name="amount"   required>
    <div class="valid-feedback">
     <!-- Message succes  -->
     </div>
  </div>
      </div>
      <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
    <button class="btn btn-success"  type="submit" name="add">ADD</button>
  </form>
     </div>
    </div>
  </div>
   
 
  
</div>

<?php
if(isset($_POST['add'])){
   $Departure = $_POST['Departure'];
   $Departure=trim($Departure);
    $Destination = $_POST['Destination'];
    $Destination=trim($Destination);
    $time = $_POST['tme'];
    $time_arr=$_POST['tme_arr'];
    $time=trim( $time);
    $time_arr=trim( $time_arr);
    $date_a = $_POST['dte'];
    $date = trim($date);
    $amount = $_POST['amount'];
    $amount=trim($amount);
    $id_train = $_POST['train_selected'];
    $date = DATE('y.m.d,h:i:s');
$date_add = explode(',',$date);
$date1 = strtolower($date_add[0]);
$date2 = strtolower($date_add[1]);
if((is_string($Departure) && is_string($Destination) && is_string($time) && is_string($date_a) && is_numeric($amount)) && ($Departure!="" && $Destination!="" && $time!="" && $time_arr!="" && $date_a!="" && $amount!="") && (!empty($Departure)&&!empty($Destination)&&!empty($time)&& !empty($time_arr) &&!empty($date_a)&&!empty($amount)))
{
  $sql_h = "INSERT INTO history_admin(action_h,dte,tme) VALUES('The administrator has added a new Trip Info : $Departure --> $Destination','$date1','$date2')";
$result_h = mysqli_query($con,$sql_h);
$sql_a_t = "INSERT INTO trip(id_train,Departure,Destination,tme,tme_arr,dte,amount) VALUES('$id_train','$Departure','$Destination','$time','$time_arr','$date_a','$amount')";
$result_a_t= mysqli_query($con,$sql_a_t);
$sql_cherch_num_trip = "SELECT trip.id_trip FROM trip WHERE trip.id_train='$id_train'";
$result_ch= mysqli_query($con,$sql_cherch_num_trip);
foreach($result_ch as $row ) :
$id_trip = $row['id_trip'];
endforeach;
$sql_update = "UPDATE train SET train.statut=0,train.problem_text='Trip Number $id_trip' WHERE train.id='$id_train'";
$result_up = mysqli_query($con,$sql_update);
if($result_a_t)
echo "<script>document.location='trip.php?test_e=1';</script>";
else echo "<script>document.location='trip.php?test_e=0';</script>";
}else
  echo "<script>document.location='trip.php?test_e=44';</script>";



}
?>

