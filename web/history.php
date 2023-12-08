<?php


session_start();
include("connection.php");

if (!isset($_SESSION['email']) && $_SESSION['email'] == false) {
  // User is logged in, so destroy the session and remove all session data
  session_destroy();
  unset($_SESSION);
  // Redirect the user to the login page
header('Location: lg.php');
exit;
}


function check($con)
{

 if(isset($_SESSION['email']))
  {

    $id= $_SESSION['email'];
    $query= "select id from users where email ='$id' limit 1";
    $result=mysqli_query($con,$query);

   if($result && mysqli_num_rows($result) > 0 )
   {
    $user_data=mysqli_fetch_assoc($result);
    return $user_data['id'];
   }

  }

  
}






$id2=check($con);




$query= "select * from history where user_id= '$id2' limit 1";
$result = mysqli_query($con, $query);


  

?>

<!DOCTYPE html>
  <head>
    
    <title>Booking History</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
      <style>
      /* Add some style to the page */
      body {
        font-family: Arial, sans-serif;
      }
      .booking-history {
        position: absolute;
        top: 9%;
        left: 1.5%;
        width: 99%;
        margin: 0 auto;
      }
      .booking-history h1 {
        text-align: center;
        text-align: left;
        margin-bottom: 30px;
      }
      .booking-history table {
        position: absolute;
left: 1%;
        border-collapse: collapse;
        width: 100%;
      }
      .booking-history th,
      .booking-history td {
        border: 1px solid #ffffff;
        text-align: left;
        padding: 8px;
      }
      .booking-history tr:nth-child(even) {
        background-color: #dddddd;
      }


      body {
    background-color: rgb(255,255,255);
}


nav {
    background-color: rgb(31,37,47);
    width: 100%;
    height: 80px;
    position: absolute;
    top: 0;
    left: 0;
}

.logo {
    background-color: rgb(31,37,47);
    position: absolute;
    top: 7px;
    left: 25px;
    width: fit-content;
    color: #3872A1;
    padding: 0px;
    font-weight: 900;
    font-size:45px;
    font-size: Bold;
    border-radius: 10px;
    text-decoration: none;
}

    </style>
  </head>
  <body>


    <nav class="nav">
        <a class="logo" href="client.php">Algeria Express</a>

    </nav>


    <div class="booking-history">
      <h1>Booking History</h1>



      <table class="table table-striped">
  <thead>
    <tr>
      
      <th scope="col">Booking ID</th>
          <th scope="col">Train</th>
          <th scope="col" >Departure</th>
          <th scope="col">Arrival</th>
          <th scope="col">Date</th>
          <th scope="col">Time Depart</th>
          <th scope="col">Time Arrival</th>
          <th scope="col">Total Cost</th>
          <th scope="col">email</th>
          <th scope="col">option</th>

    </tr>
  </thead>

  
  
   
  










    
        
       
       <?php
       

       if($result && mysqli_num_rows($result) > 0 )
       {   
         
     $user_data=mysqli_fetch_assoc($result);
     
     
     $query2= "SELECT  history.id_his,history.id_trip,history.id_train,users.email,history.id_ticket, trip.Departure,trip.Destination,trip.tme,trip.tme_arr,trip.tme_arr,trip.dte ,trip.amount,train.name_train 
     FROM history,users,trip,ticket,train WHERE users.id = ".$user_data['user_id']." AND
      trip.id_trip = history.id_trip AND
      ticket.id_ticket=history.id_ticket AND
        train.id = history.id_train order by  history.id_his DESC ;" ;
     
     $result2 = mysqli_query($con, $query2);



        while($user_data2=mysqli_fetch_assoc($result2)) 
		{ 
      $idtrip=$user_data2['id_trip'];
      $idtrain=$user_data2['id_train'];

      $idticket=$user_data2['id_ticket'];
      $text=$idticket.'.'.$idtrain.'.'.$idtrip;

?>
      <tbody>
    <tr>
    <th scope="row"><?php echo $user_data2['id_his']; ?></th>
    <td><?php echo $user_data2['name_train']; ?></td>
    <td><?php echo    $user_data2['Departure']; ?></td>
    <td><?php echo  $user_data2['Destination']; ?></td>
    <td><?php echo  $user_data2['dte'];?></td>

    <td><?php echo  $user_data2['tme'];?></td>
    <td><?php echo  $user_data2['tme_arr']; ?></td>
    <td><?php echo  $user_data2['amount'];?></td>
    <td><?php echo $user_data2['email'];?></td>
    <td><button class="btn btn-outline-info "> <a style=" color: black ;  text-decoration:none;" href="ticket.php?id=<?php echo $text ; ?>">Option</a></button></td>



    
    </tr>


    
   
  </tbody>
  <?php
    }

       }
?>

  </table>

  
      
    </div>
  </body>
</html>
