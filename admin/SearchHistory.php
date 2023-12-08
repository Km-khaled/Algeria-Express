<?php

use LDAP\Result;

include 'config/connect.php';

if(isset($_POST['input'])){
$input = $_POST['input'];
$sql = "SELECT * FROM history_admin WHERE history_admin.dte LIKE '{$input}%' ORDER BY history_admin.id_h DESC";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
?>
<div class="col">
        <table class="table table-striped">
      <thead>
      <tr>
        <th colspan="8" class="text-center text-light" style="font-size: 20px;background-color:#172F46;">HISTORY</th>
        </tr>
        <tr>
        <th scope="col">#</th>
         <th scope="col-4">Action</th>
         <th scope="col-2">Date</th>
         <th scope="col-2">Time</th>
        </tr>
  </thead>
  <tbody>

<?php
foreach($result as $row) : 
    $id_h =  $row['id_h'];
    $action_h =  $row['action_h'];
    $time =$row['tme'];
    $date =  $row['dte'];
?>
    <tr>
      <th scope="row"><?php echo $id_h ;?></th>
      <td><?php echo $action_h;  ?></td>
      <td><?php echo $date; ?></td>
      <td><?php  echo $time; ?></td>
    </tr>
   <?php  endforeach; ?>
  </tbody>
</table>


                    </div>
<?php
}else{
    include 'NoDataFound.php';
}



}
?>
