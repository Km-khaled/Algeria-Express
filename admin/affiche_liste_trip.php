<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="height:500px; overflow-y: scroll;">
        <table class="table table-striped">
      <thead>
        <tr>
        <th colspan="10" class="text-center text-light" style="font-size: 20px;background-color:#172F46;">LIST OF TRIP</th>
        </tr>
      <tr>
        <th scope="col">#</th>
         <th scope="col">Train<sub>num</sub></th>
         <th scope="col">Departure</th>
         <th scope="col">Destination</th>
         <th scope="col">Time</th>
         <th scope="col">Time-Arr</th>
         <th scope="col">Date</th>
         <th scope="col">Amount</th>
         <th scope="col">Option</th>
        </tr>
  </thead>
  <tbody>
<?php
$rows= mysqli_query($con,"SELECT * FROM trip");
foreach($rows as $row) : 
    $id_trip =  $row['id_trip'];
    $id_train =  $row['id_train'];
    $Departure = $row['Departure'];
    $Destination = $row['Destination'];
    $time =$row['tme'];
    $time_arr=$row['tme_arr'];
    $date =  $row['dte'];
    $amount =$row['amount'];
    $statut=$row['statut'];
?>
    <tr>

      <th scope="row" class="<?php if($statut==1) echo 'bg-danger';  ?>"><?php echo $id_trip ;?></th>
      <th scope="row"><?php echo $id_train ;?></th>
      <td><?php echo $Departure; ?></td>
      <td><?php echo $Destination;  ?></td>
      <td><?php echo $time; ?></td>
      <td><?php echo $time_arr; ?></td>
      <td><?php  echo $date; ?></td>
      <td><?php  echo $amount.'  DA'; ?></td>
      <td>
      <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="<?php echo '#T'.$id_trip; ?>"><i class="bi bi-pencil-square"></i></button>
      <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="<?php echo '#D'.$id_trip; ?>"><i class="bi bi-archive-fill"></i></button>
     <?php include 'Edit_trip.php'; ?>
     <?php include 'Delete_trip.php';  ?> 
    </td>

    </tr>
   <?php  endforeach; ?>
  </tbody>
</table>


                    </div>