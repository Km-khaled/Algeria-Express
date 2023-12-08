
<div class="modal fade" id="<?php echo 'T'.$id; ?>"  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Train</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
           <!-- Form Edit train  -->
      <form class="row g-3 needs-validation" method="post" novalidate>
      <div class="modal-body">
  <div class="col-md-12">
    <label for="validationCustom01" class="form-label">Name Train</label>
    <input type="text" class="form-control" name="name_train" id="validationCustom01" value="<?php echo $name;   ?>" required>
    <div class="valid-feedback">
     <!-- Message succes  -->
    </div>
  </div>
  <div class="col-md-12">
    <label for="validationCustom02" class="form-label">Name Of Driver</label>
    <input type="text" class="form-control" name="name_ch" id="validationCustom02" value="<?php echo $name_ch;   ?>" required>
    <div class="valid-feedback">
     <!-- Message succes  -->
     </div>
  </div>
      </div>
      <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
    <button class="btn btn-success"  type="submit" name="<?php echo 'T'.$id; ?>">Save</button>
  </form>
     </div>
    </div>
  </div>
   
 
  
</div>

<?php
if(isset($_POST['T'.$id])){
$name_t = $_POST['name_train'];
$name_t =trim($name_t);
$name_ch = $_POST['name_ch'];
$name_ch =trim($name_ch);
if((is_string($name_t) && is_string($name_ch))&&(!empty($name_t)&&!empty($name_ch)) && ($name_t!="" && $name_ch!="")){
$sql = "update train set train.name_train ='$name_t',train.name_ch ='$name_ch' where train.id='$id'";
$result = mysqli_query($con,$sql);
if($result)
echo "<script>document.location='train.php?test=1';</script>";
else echo "<script>document.location='train.php?test=0';</script>";
}else{
  echo "<script>document.location='train.php?test=44';</script>";
}
}
?>