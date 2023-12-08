<div class="modal fade" id="<?php echo 'D'.$id_trip; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Messgae System</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    
      <div class="modal-body">
        Are you sure !!!!
      </div>
      <div class="modal-footer">
      <form method="post">   
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger"  name="<?php echo 'D'.$id_trip; ?>">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php

if(isset($_POST['D'.$id_trip])){
$sql = "SELECT trip.Departure,trip.Destination FROM trip WHERE trip.id_trip='$id_trip'";
$sql_ch_ticket = "SELECT ticket.id_ticket FROM ticket WHERE ticket.id_trip='$id_trip' ";
$nbt = $conn->query($sql_ch_ticket);

$nbt_row = $nbt->rowcount();
if($nbt_row<1){
$sql_result = mysqli_query($con,$sql);
foreach($sql_result as $row) :
$departure = $row['Departure'];
$destination = $row['Destination'];
endforeach;
$sql_dtrip ="DELETE FROM trip WHERE trip.id_trip='$id_trip'";
$date = DATE('y.m.d,h:i:s');
$date_add = explode(',',$date);
$date1 = strtolower($date_add[0]);
$date2 = strtolower($date_add[1]);
$sql_d= "INSERT INTO history_admin(action_h,dte,tme) VALUES('The administrator deleted a Trip Info : $departure --> $destination ','$date1','$date2')";
$result_dtrip = mysqli_query($con,$sql_dtrip);
$result_h = mysqli_query($con,$sql_d);
if($result_dtrip)
echo "<script>document.location='trip.php?test_e=1';</script>";
else  echo "<script>document.location='trip.php?test_e=0';</script>";
}else{
  echo "<script>document.location='trip.php?test_e=901';</script>";
}
}
?>