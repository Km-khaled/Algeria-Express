<?php

include("connection.php");



if (!isset($_SESSION['email']) && $_SESSION['email'] == false) {
  // User is logged in, so destroy the session and remove all session data
  session_destroy();
  unset($_SESSION);
  // Redirect the user to the login page
header('Location: lg.php');
exit;
}






$ee=check($con);
$k1=$ee['email'];
$query="select * from users where users.email= '$k1'  limit 1 "; 
$result= mysqli_query($con, $query);

?>

<div class="modal fade" id="data_client"  aria-labelledby="exampleModalLabel" aria-hidden="true">
<?php
while($user_data=mysqli_fetch_assoc($result)) 
{ 
?>  
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Profile</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <form  method="post" action="update.php">
      <div class="modal-body">
      <div class="input-group flex-nowrap">
  <span class="input-group-text bi bi-person-fill"></span>
  <input type="text" class="form-control" value="<?php  echo $user_data['fname']; echo " "; echo $user_data['lname']; ?>" disabled>
</div>
<div class="input-group flex-nowrap mt-3 ">
  <span class="input-group-text  bi bi-key-fill"></span>
  <input type="password" class="form-control" value="<?php echo $user_data['pass']; ?>" disabled>
</div>
<div class="input-group flex-nowrap mt-3 ">
  <span class="input-group-text  bi bi-envelope-at-fill"></span>
  <input type="text" class="form-control" value="<?php echo $user_data['email']; ?>" disabled>
</div>
<div class="input-group flex-nowrap mt-3 ">
  <span class="input-group-text  bi bi-credit-card-2-back-fill"></span>
  <input type="text" class="form-control" value="<?php echo $user_data['phone']; ?>" disabled>
</div>






      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button    class="btn btn-secondary" ><a style="  text-decoration:none; color: white;" href="update.php"> Update </a></button>

        </form>
      </div>
    </div>
  </div>
</div>

<?php 

} 

?>