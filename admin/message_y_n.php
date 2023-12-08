<div class="modal fade" id="<?php echo 'D'.$id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Message System</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    
      <div class="modal-body">
        Are you sure !!!!
      </div>
      <div class="modal-footer">
      <form method="post">   
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger"  name="<?php echo 'D'.$id; ?>">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php

if(isset($_POST['D'.$id])){
  
$nbt = $conn->query("SELECT trip.id_trip FROM trip WHERE trip.id_train='$id'");
$nbt_row = $nbt->rowcount();

if($nbt_row>0){
 // test=223    you can't delete this train
  echo "<script>document.location='train.php?test=223';</script>";
}else{
  // test=224    you can't delete this train
  $sql_d = "DELETE FROM train WHERE id='$id'";
  $get_name_train ="SELECT train.name_train FROM train WHERE train.id='$id'";
  $re_get = mysqli_query($con,$get_name_train);
  foreach($re_get as $row_get) :
  $name_train = $row_get['name_train'];
  endforeach;
  $date = DATE('y.m.d,h:i:s');
  $date_add = explode(',',$date);
  $date1 = strtolower($date_add[0]);
  $date2 = strtolower($date_add[1]);
  $sql_h = "INSERT INTO history_admin(action_h,dte,tme) VALUES('The administrator deleted a Train name train : $name_train','$date1','$date2')";
$result_h = mysqli_query($con,$sql_h);
  $result_d = mysqli_query($con,$sql_d);
  echo "<script>document.location='train.php?test=224';</script>";
}



}
?>