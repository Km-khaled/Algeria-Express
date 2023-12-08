
<?php
$sql_v = "SELECT * FROM video";
$result_v =mysqli_query($con,$sql_v);
foreach($result_v as $row_v) : 
$id = $row_v['id'];
$url = $row_v['url_v'];
$name = $row_v['name_v'];
$comment = $row_v['comment'];
?>
<div class="col-4">
<div class="card" style="width: 18rem;">
  <video  src="video_up/<?php echo $url;  ?>" class="card-img-top"  controls>
</video>
  <div class="card-body">
    <h5 class="card-title"><?php echo $name; ?></h5>
   <?php if($comment !=""){ ?>
    <p class="card-text"><?php echo $comment; ?></p>
  
    <?php }  ?>
  
    </div>
</div>
</div>

<?php   endforeach;  ?>