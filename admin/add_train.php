
<div class="modal fade" id="add_train"  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Train</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
           <!-- Form add train  -->
      <form class="row g-3 needs-validation" method="post" name="form_add_train"  novalidate>
      <div class="modal-body">

  <div class="col-md-12">
    <label  class="form-label">Name Train</label>
    <input type="text" class="form-control" name="name_train"   required>
  </div>
  <div class="col-md-12">
    <label  class="form-label">Name Of Driver</label>
    <input type="text" class="form-control" name="name_ch"   required> 
  </div>

  <div class="col-md-12">
    <label  class="form-label">Number places</label>
    <input type="number" class="form-control" name="nb_places"   required>
  </div>

      </div>
      <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
    <button class="btn btn-success"  type="submit" name="add"  >ADD</button>
  </form>
     </div>
    </div>
  </div>
   
 <script>
// var valide_name_t = document.getElementById('valide_name_t');
// var valide_name_d = document.getElementById('valide_name_d');
// var nb_places = document.getElementById('nb_places');
function hello(){
  console.log('hello');
return false;

}

 </script>
  
</div>

<?php
if(isset($_POST['add'])){
$name_t = $_POST['name_train'];
$name_t = trim($name_t);

$name_ch = $_POST['name_ch'];
$name_ch = trim($name_ch);

$nb_places = $_POST['nb_places'];
$nb_places = trim($nb_places);
$date = DATE('y.m.d,h:i:s');







$date_add = explode(',',$date);
$date1 = strtolower($date_add[0]);
$date2 = strtolower($date_add[1]);
if(($name_t!="" && $name_ch!="" && $nb_places!="") && (!empty($name_t) && !empty($name_ch) && !empty($nb_places)) && (is_string($name_t) && is_string($name_ch))  && is_numeric($nb_places)){
  
$sql_a = "INSERT INTO train(name_train,nb_places,name_ch,statut,nbp_reserver,problem_text) VALUES('$name_t',$nb_places,'$name_ch',0,0,'no comment')";
$sql_h = "INSERT INTO history_admin(action_h,dte,tme) VALUES('Admin add new train $name_t ','$date1','$date2')";
$result_a = mysqli_query($con,$sql_a);
$result_h = mysqli_query($con,$sql_h);
if($result_a)
echo "<script>document.location='train.php?test=1';</script>";
else echo "<script>document.location='train.php?test=0';</script>";
}
else{
// error formulaire
  echo "<script>document.location='train.php?test=44';</script>";
}
}
?>