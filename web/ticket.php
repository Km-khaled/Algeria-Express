

<?php

include('connection.php');

require 'dompdf/autoload.inc.php';


use Dompdf\Dompdf;





if(isset($_GET['id'])){

$id=$_GET['id'];

$array=explode('.',$id);
$idtrip=$array[2];
      $idtrain=$array[1];

      $idticket=$array[0];

      $kk= "SELECT   history.id_his ,history.id_ticket  ,ticket.fullname ,  train.name_train  , trip.Departure,  trip.Destination, trip.amount,trip.dte, trip.tme, trip.tme_arr
     FROM history,ticket ,train,trip WHERE ticket.id_ticket=$idticket and train.id=$idtrain and trip.id_trip=$idtrip  LIMIT 1;";




    
     $result = mysqli_query($con, $kk);

foreach($result as $row):

    $fullname=$row['fullname']; 
    $amount=$row['amount'];
    $name_train=$row['name_train'];
    $Departure=$row['Departure'];
    $Destination=$row['Destination'];
    $dte=$row['dte'];
    $tme=$row['tme'];
    $tme_arr=$row['tme_arr'];
    $id_ticket=$row['id_ticket'];


    

endforeach;










$html=<<<HTML

<!DOCTYPE html>


<head>
    <title>ticket</title>
    <meta charset='UTF_8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>


<style>

nav {
    display: flex;

    background-color: #0A2647;
    width: 100%;
    height: 80px;
    position: absolute;
    top: 0;
    left: 0;
}

h1{
    
    color: #3872A1;
   margin-left: 70px;
}

body{

    background-color: #2C74B3;
}


.test1{

position: absolute;
top: 10%;;

}


h2{
    color: #C69749;

display: block;
    font-size: 1.5em;
   margin-left: 20px; ;
    font-weight: bold;
}

h3{

    display: block;
    font-size:1.5em;
    margin-left: 20px; 
    color:#040303;

    font-weight: bold;
}


  </style>
  </head>
<body>

<nav class= 'nav'>

<img src="" alt="">

 <a class='logo' > <h1> Algeria Express</h1></a>            

 <h1 class="id-tick" style="color: #3872A1; position:absolute;
top:0%; right:20%;">id_ticket: $idticket   </h1>  
    </nav>


<div class='test1'>


<pre>  <h2> FullName              Total Cost                  Train </h2> </pre>

<pre>   <h3>  $fullname                 $amount                        $name_train </h3> </pre>
<pre>  <h2> Departure               Arrival                    Date </h2> </pre>

<pre>  <h3>   $Departure                   $Destination                  $dte </h3> </pre>
 

<pre>  <h2>   Time Departure                         Time Arrival </h2> </pre>

<pre>  <h3>     $tme                               $tme_arr</h3> </pre>






</div>

</body>


HTML;




     
$dompdf = new Dompdf();

$dompdf->loadHtml($html);



$size = array(0,0,800,570);
// $dompdf->set_paper($size);
define("DOMPDF_ENABLE_REMOTE", false);

$dompdf->setPaper($size);


$dompdf->render();

$dompdf->stream("playerofcode",array("Attachment"=>0));



}






?>


