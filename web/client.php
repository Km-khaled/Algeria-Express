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
    $query11= "select * from users where email ='$id' limit 1";
    $rslt=mysqli_query($con,$query11);

   if($rslt && mysqli_num_rows($rslt) > 0 )
   {
    $user_data12=mysqli_fetch_assoc($rslt);
    return $user_data12;
   }

  }

  
}



$ee= check($con);

$usid=$ee['id'];



?>

<!DOCTYPE html>
<html lang="en">
<head>

   

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/styles.css" />
  <link rel="stylesheet" href="icons/bootstrap-icons.css">

    <title>utilisateur</title>
    <style>
        
    </style>




</head>






<body>
<!--  -->


    <div class="d-flex" id="wrapper">
    
        <!-- Sidebar -->
        <div class="bg-light"  id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 fs-4 fw-bold text-uppercase border-bottom"><i
                    class="bi bi-person-fill me-2  text-dark"></i>Hi,
                    <?php echo $ee['fname']; ?>
                  </div>
            <!-- <div class="list-group list-group-flush my-2 color_text_ui">
                <a href="update.php" class="list-group-item list-group-item-action  active " style="background-color: #172F46;">
                    <i class="bi bi-train-freight-front me-3  "></i>Update Data</a>
                         </div> -->
                        

                         <div class="list-group list-group-flush my-3 color_onhover">
                            <a href="update.php" class="list-group-item list-group-item-action active"><i
                                    class="bi bi-diagram-3-fill me-2"></i>Update Data</a>
                                     </div>


                                     <div class="list-group list-group-flush my-3 color_onhover">
                            <a href="history.php" class="list-group-item list-group-item-action active"><i
                                    class="bi bi-diagram-3-fill me-2"></i>Booking History</a>
                                     </div>
                    
           
        </div>
       

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light  py-4 px-4" style="background-color:#172F46;">
                <div class="d-flex align-items-center text-dark ">
                    <i class="bi bi-filter-left  fs-3 me-3" id="menu-toggle" style="color:#3872A1;"></i>
                    <h2 class="fs-2 m-0  " style="color:#3872A1;">Algeria <span style="color:#3872A1;">Express</span></h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle second-text fw-bold " style="color:#3872A1;" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                                <i class="bi bi-person-fill me-2  " style="color:#3872A1;"></i>  <span style="color:#3872A1;">Mon Compte</span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" >
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#data_client">Profile</a></li>


                                <!-- <li> <a  href="Logout.php"> LogOut </a></li> -->

                                <li><a class="dropdown-item" href="LogOut.php"  >Log Out</a></li>

                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
<?php include 'data_client.php';  ?>
            <div class="container-fluid px-4" >
<!--  Container    ---> 

<!-- new row   --->




<form method="post" action="client.php">

<div class="row mt-3">
<!--    new column  --->


<div class="col-3">


<div class="input-group mb-3">
<span class="input-group-text" > Departure:</span>

  <input type="text" class="form-control"  required name="value">
</div>

</div>

<div class="col-3">

<div class="input-group mb-3">
  <span class="input-group-text" >Destination:</span>
  <input type="text" class="form-control"  required name="desti" >
</div>



</div>




<div class="col-3">

<div class="input-group mb-3">
  <span class="input-group-text" >Departure Date:</span>
  <input type="date" class="form-control" required  name="ladate" >
</div>



</div>



<div class="col-3">

 <button class="btn btn-outline-primary text-light" style="background-color: rgb(74, 111, 182);  " name="submit">Search For a Trip</button>



</div>

</form>



  


 


  </div>

  <div class="row">


  



  <?php 




if (isset($_POST['submit'])) {
  

  $value1=$_POST['value'];
  $value2=$_POST['desti'];
  $value3=$_POST['ladate'];




$query="select * from trip,train  where trip.id_train=train.id and Departure='$value1' and Destination='$value2' and dte='$value3' and train.nbp_reserver<train.nb_places ; "; 
$result= mysqli_query($con, $query);





if($result && mysqli_num_rows($result) > 0 )
            {  

?>

              <table class="table">
              <thead>
                <tr>
                  <th scope="col">Trip№</th>
                  <th scope="col">Departure</th>
                  <th scope="col">Destination</th>
                  <th scope="col">Time Depart</th>
                  <th scope="col">Time Arrive</th>
                  <th scope="col">Date</th>
                  <th scope="col">Amount</th>
            
                </tr>
              </thead>

<?php 
while($user_data=mysqli_fetch_assoc($result)) 
		{ 
   $id=$user_data['id_trip'];
   $departure=$user_data['Departure'];
   $destination=$user_data['Destination'];
   $time=$user_data['tme'];
   $time2=$user_data['tme_arr'];

   $date=$user_data['dte'];
   $amount=$user_data['amount'];
   $idtrain=$user_data['id_train'];

   
		?>


  <tbody>
    <tr>
    <td><?php echo $id; ?></td>
    <td><?php echo    $departure; ?></td>
    <td><?php echo   $destination; ?></td>
    <td><?php echo  $time; ?></td>
    <td><?php echo  $time2; ?></td>
    <td><?php echo  $date; ?></td>
    <td><?php echo  $amount;?></td>

    <td> <button type="button" class="btn btn-primary" id="btn_b" data-bs-toggle="modal" data-bs-target="<?php echo '#T'.$id; ?> ">
      Booking-Now
    </button></td>
    </tr>
   
  </tbody>




  <div class="modal fade" id="<?php echo 'T'.$id; ?>"  aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Form</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3 needs-validation" method="post"  >
            <div class="modal-body" id="mybody">
        <div class="col-md-12">
          <label for="validationCustom01" class="form-label">Full Name : </label>
          <input type="text" class="form-control" name="FullName" id="validationCustom01" value="" required>
        </div>
            </div>
            <div class="modal-footer">

            <div class="col-md-12">
          <label for="validationCustom01" class="form-label">Number Card (16 number)</label>
          <input type="text" class="form-control" name="card1" min="16"  max="16" value="" required>
        </div>


        <div class="col-md-12 d-none" >
          <input  class="form-control" name="idtrip" min="16" value="<?php echo $id; ?>" >
        </div>
        <div class="col-md-12 d-none" >
          <input  class="form-control" name="idtrip2" min="16" value="<?php echo $idtrain; ?>" >
        </div>
        <div class="col-md-12">
          <label for="validationCustom01" class="form-label">Date Exp (12-22)</label>
          <input type="text" class="form-control" name="exp" min="5" max="5" id="validationCustom01" value="" required>
        </div>
        <div class="col-md-12 mb-3">
          <label for="validationCustom01" class="form-label">CVV (3 number)</label>
          <input type="text" class="form-control" name="cvv"  min="3" max="3" id="validationCustom01" value="" required>
        </div>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
          <button class="btn btn-success" type="submit" name="Pay">Pay-Now</button>
        </form>
           </div>
          </div>
        </div>
        <?php  
    }
  }

  else {
  
    include('NoDataFound.php');
    
  }
    

}
		?>


</table>























 </div>
</div>



</div>

</div>

<!-- example row{col}  --> 
<div class="row d-flex  justify-content-start ">
     
        <div class="col">
       
          </div>
</div>

                <div class="row g-3 my-2"  >
                <!-- content  -->
                </div>


         





    </div>
  
        </div>



  

  
  

  

    </div>
</div>





    </div>

    </div>

    



    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");
        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
            
        };
    </script>





</body>

</html>


<?php
if(isset($_POST['Pay'])){
  $id2 = $_POST['idtrip'];
  $idtrain2 = $_POST['idtrip2'];

  $fullname = $_POST['FullName'];
  $card = $_POST['card1'];
  $exp = $_POST['exp'];

  $cvv = $_POST['cvv'];




  $date = DATE('y.m.d,h:i:s');
  $date_add = explode(',',$date);
  $date1 = strtolower($date_add[0]);
  $tme = strtolower($date_add[1]);


  $kk33= "select  amount from trip where id_trip=$id2 ";
  $rslt9=mysqli_query($con,$kk33);
  
  
  foreach($rslt9 as $row2): 
      $amnt= $row2['amount'];
    
  endforeach;


  $query2= "INSERT INTO ticket (fullname ,id_trip ,id_user,card_number,Exp,CVV,tem,dte) values ('$fullname',$id2,$usid,'$card','$exp','$cvv','$tme','$date1')";
  mysqli_query($con, $query2);

  $query4= "UPDATE train SET  nbp_reserver	 = nbp_reserver	 + 1 where train.id=$idtrain2";
  mysqli_query($con, $query4);

  $query13= "UPDATE admin SET  solde	 = solde + $amnt	 where id_admin=1";
  mysqli_query($con, $query13);


$kk= "select  id_ticket from ticket where tem='$tme' and dte='$date1' and id_user=$usid order by id_ticket DESC limit 1";
$rslt8=mysqli_query($con,$kk);


foreach($rslt8 as $row): 
  $id_ticket44= $row['id_ticket'];
  
endforeach;








  $query3= "INSERT INTO history (user_id	,id_trip	,id_train,id_ticket) values ($usid,$id2,$idtrain2,$id_ticket44)";
  mysqli_query($con, $query3);
   


  echo "<script>window.location.href='history.php'</script>";


}


?>