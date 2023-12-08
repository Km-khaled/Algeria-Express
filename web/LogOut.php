



<?php
// Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION['email']) && $_SESSION['email'] == true) {
  // User is logged in, so destroy the session and remove all session data
  session_destroy();
  unset($_SESSION);
}

// Redirect the user to the login page
header('Location: lg.php');
exit;








// session_start();

//  if(isset($_SESSION['email']))
// {

// unset($_SESSION['email']);

// }

// header("Location: LogIn.php");
// die;

?>