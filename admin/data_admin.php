<div class="modal fade" id="data_admin"  aria-labelledby="exampleModalLabel" aria-hidden="true">
<?php
$sql_data = "SELECT * FROM admin WHERE id_admin=1 ";
$execute  = mysqli_query($con,$sql_data);




$nbt_user = $conn->query("SELECT id FROM users");
$nbt_row_user = $nbt_user->rowcount();
foreach($execute as  $row ) : 
?>  
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Profile</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <form  method="post">
      <div class="modal-body">
      <div class="input-group flex-nowrap">
  <span class="input-group-text bi bi-person-fill"></span>
  <input type="text" class="form-control" value="<?php echo $row['user_name'];  ?>" disabled>
</div>
<div class="input-group flex-nowrap mt-3 ">
  <span class="input-group-text  bi bi-envelope-at-fill"></span>
  <input type="text" class="form-control" value="<?php echo $row['email'];  ?>" disabled>
</div>
<div class="input-group flex-nowrap mt-3 ">
  <span class="input-group-text  bi bi-credit-card-2-back-fill"></span>
  <input type="text" class="form-control" value="<?php echo $row['credit_card'];  ?>" disabled>
</div>
<div class="input-group flex-nowrap mt-3 ">
  <span class="input-group-text  bi bi-currency-dollar"></span>
  <input type="number" class="form-control" value="<?php echo $row['solde'];  ?>" disabled>
</div>

<div class="input-group flex-nowrap mt-3 ">
  <span class="input-group-text  bi bi-person-fill"></span>
  <input type="text" class="form-control" value="<?php  echo $nbt_row_user;  ?> " disabled>
</div>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
    
<?php 

endforeach;

?>
  </div>
</div>