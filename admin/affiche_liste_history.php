<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="height:500px; overflow-y: scroll;">
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
$rows= mysqli_query($con,"SELECT * FROM history_admin ORDER BY history_admin.id_h DESC");
foreach($rows as $row) : 
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