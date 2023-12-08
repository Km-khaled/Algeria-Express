

<div class="modal fade" id="<?php echo 'S'.$id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<?php

$sql_check= mysqli_query($con,"SELECT train.statut,train.problem_text FROM train WHERE train.id='$id'");


foreach($sql_check as $data) :
$statut = $data['statut'];
$problem = $data['problem_text'];
endforeach;
?>  

<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Signal-Message </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <form  method="post">
      <div class="modal-body">

      <div class="input-group mb-3">

  <div class="input-group-text">
    <input class="form-check-input mt-0" type="radio" name="check" id="check_available" value="no pane"  <?php if($statut==1) echo "checked"; ?>  >
  </div>

  <input type="text" class="form-control text-success" value="Available"  disabled >
</div>


<div class="input-group mb-3">
  <div class="input-group-text">
    <input class="form-check-input mt-0" type="radio" name="check" id="check_not_available" value="pane"  <?php if($statut==0) echo "checked"; ?>    >
  </div>
  <input type="text" class="form-control text-danger" value="Not Available" disabled >
</div>


  
  <div class="input-group mb-3">
  <span class="input-group-text" ><i class="bi bi-chat-left-text"></i> </span>
  <input type="text" class="form-control"   value="<?php echo $problem;  ?>" disabled>
</div>


<div class="input-group">
  <span class="input-group-text">Comment</span>
  <textarea class="form-control" name="problem_text"  maxlength="400"></textarea>
</div>



      </div>

      <div class="modal-footer">
      
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success"  name="<?php echo 'S'.$id; ?>">Save</button>
        </form>
      </div>
    </div>
  </div>


<?php 
if(isset($_POST['S'.$id])){
$check = $_POST['check'];
$check = trim($check);
$problem_text= $_POST['problem_text'];
$problem_text = trim($problem_text);
// if existe trip where trip.id_train === train.id
$sql_rech =$conn->query("SELECT trip.id_trip FROM trip WHERE trip.id_train='$id'");
$nb_row = $sql_rech->rowcount();
if($nb_row>0){
$sql_get_donee = "SELECT trip.id_trip,train.problem_text FROM trip,train WHERE trip.id_train='$id' AND trip.id_train=train.id";
$result_get = mysqli_query($con,$sql_get_donee);
foreach($result_get as $row_get) :
$get_idtrip = $row_get['id_trip'];
$get_problem_text = $row_get['problem_text'];
endforeach;
$string = explode(' ',$get_problem_text);
$testif = 0;
if(in_array('--',$string)){
$string2 = explode('--',$get_problem_text);
$testif=1;
}
}
if($check=="no pane" && $problem_text=="" && empty($problem_text)){
  if($nb_row>0){
    if($testif==1){
      $sql = "UPDATE train SET train.statut =0,train.problem_text ='$string2[0]' WHERE train.id='$id'";
      $result_s = mysqli_query($con,$sql);  
    }
$sql_update = "UPDATE trip SET trip.statut=0 WHERE trip.id_trip='$get_idtrip'";
$result_up = mysqli_query($con,$sql_update);

echo "<script>document.location='train.php?test=45';</script>";
}else{
  $sql = "UPDATE train SET train.statut=1,train.problem_text ='no comment' WHERE train.id='$id'";
  $result_s = mysqli_query($con,$sql);
}
}else{
  if($check=="pane" && is_string($problem_text) && !empty($problem_text) && $problem_text!=""){
    if($nb_row>0){
    

      $sql_up ="UPDATE trip SET trip.statut=1 WHERE trip.id_train='$id'";
$resu_trip= mysqli_query($con,$sql_up);
if($testif==0){
$sql = "UPDATE train SET train.statut =0,train.problem_text='$get_problem_text -- $problem_text' WHERE train.id='$id'";
$result_s = mysqli_query($con,$sql);
}else{
  $sql = "UPDATE train SET train.statut =0,train.problem_text ='$string2[0] -- $problem_text' WHERE train.id='$id'";
  $result_s = mysqli_query($con,$sql);  
}
    }else{
    $sql = "UPDATE train SET train.statut =0,train.problem_text='$problem_text' WHERE train.id='$id'";
  $result_s = mysqli_query($con,$sql);}
  }else echo "<script>document.location='train.php?test=44';</script>";
}

if($result_s)
echo "<script>document.location='train.php?test=1';</script>";
else echo "<script>document.location='train.php?test=0';</script>";
}



?>