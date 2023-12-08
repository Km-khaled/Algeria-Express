<?php

use LDAP\Result;

include 'config/connect.php';

if(isset($_POST['input'])){
$input = $_POST['input'];
$sql = "SELECT * FROM train WHERE train.name_train LIKE '{$input}%' OR train.nb_places LIKE '{$input}%'
 OR train.nbp_reserver LIKE '{$input}%' OR train.name_ch LIKE '{$input}%'";
$result=mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0){
?>
<div class="col">
        <table class="table table-striped">
      <thead>
        <tr>
        <th colspan="7" class="text-center text-light" style="font-size: 20px;background-color:#172F46;">LIST OF TRAIN</th>
        </tr>
      <tr>
        <th scope="col">#</th>
         <th scope="col">Name</th>
         <th scope="col">Name<sub>Driver</sub></th>
         <th scope="col">NB<sub>places</sub></th>
         <th scope="col">NBP<sub>reserver</sub></th>
         <th scope="col">Statut</th>
         <th scope="col">Option</th>
        </tr>
  </thead>
  <tbody>

<?php
foreach($result as $row) : 
    $id =  $row['id'];
   
    $r = mysqli_query($con,"SELECT trip.id_trip,trip.statut FROM trip WHERE trip.id_train='$id'");
    $n_b = $conn->query("SELECT trip.id_trip FROM trip WHERE trip.id_train='$id'");
    $n_b_row = $n_b->rowcount();
if( $n_b_row>0){
foreach($r as $rs) :
$id_trip = $rs['id_trip'];
$trip_statut = $rs['statut'];
endforeach;
}
    $name = $row['name_train'];
    $name_ch = $row['name_ch'];
    $nbp =$row['nb_places'];
    $nbpr =  $row['nbp_reserver'];
    $problem_text = $row['problem_text'];
$test_string = explode(' ',$problem_text);
$test=1;
if($test_string[0]!="Trip" && $problem_text !="no comment") $test=0;
if(in_array('--',$test_string)){
  $test=0;
}
if($problem_text !="no comment" && $test_string[0]=="Trip" && !in_array('--',$test_string)){
$test=2;
}
?>
    <tr>
      <th scope="row" class="<?php if($test==0) echo 'bg-danger';else if($test==2) echo 'bg-info';  ?>"><?php echo $id ;?></th>
      <td><?php echo $name;  ?></td>
      <td><?php echo $name_ch;  ?></td>
      <td><?php echo $nbp; ?></td>
      <td><?php  echo $nbpr; ?></td>
      <td><?php if($row['statut']==1) echo '<p class="text-success">Available</p>'; else echo '<p class="text-danger">Not available</p>'; ?></td>
      <td>
      <?php if($n_b_row>0) {
        if($trip_statut==1){
        ?>
      <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="<?php echo '#send'.$id; ?>"><i class=" bi bi-envelope-at-fill"></i></button>
      <?php include 'mail.php';  ?>
<?php }}?>
      <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="<?php echo '#T'.$id; ?>"><i class="bi bi-pencil-square"></i></button>

      <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="<?php echo '#D'.$id; ?>"><i class="bi bi-archive-fill"></i></button>
      <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="<?php echo '#S'.$id; ?>"><i class=" bi bi-exclamation-triangle-fill"></i></button>
     
      <?php include 'message_y_n.php' ?>

<?php
include 'Edit_train.php';
include 'signial.php';

?>

     
    </td>
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
