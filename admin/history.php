
<?php include 'config/connect.php';
    include 'config/history_row.php';
session_start();
if(!isset($_SESSION['email'])){
    header('Location:index.php');
}else{
   
?>


<!DOCTYPE html>
<html lang="en">
<head>
      
<script >
window.history.forward();
    </script>
  
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/styles.css" />
  <link rel="stylesheet" href="../web/icons/bootstrap-icons.css">
    <title>Railway</title>
    <style>
        
    </style>
</head>






<body>


    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-light"  id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 fs-4 fw-bold text-uppercase border-bottom"><i
                    class="bi bi-person-workspace me-2  text-dark"></i>Admin</div>
            <div class="list-group list-group-flush my-2 color_onhover">
                <a href="train.php" class="list-group-item list-group-item-action  active " >
                    <i class="bi bi-train-freight-front me-3"></i>----- Train -----</a>
                         </div>
                         <div class="list-group list-group-flush my-2 color_onhover ">
                            <a href="trip.php" class="list-group-item list-group-item-action active"><i
                                    class="bi bi-geo-alt-fill me-3 "></i>----- Trip -----</a>
                                     </div>
                                     <div class="list-group list-group-flush my-3 color_text_ui">
                            <a href="history.php" class="list-group-item list-group-item-action active"  style="background-color: #172F46;"><i
                                    class="bi bi-archive-fill me-3"></i>----- History ------</a>
                                     </div>
                                     <div class="list-group list-group-flush my-3 color_onhover">
                            <a href="guid.php" class="list-group-item list-group-item-action active" ><i
                                    class="bi bi-map-fill me-3"></i>----- Guid ------</a>
                                     </div>
                         <div class="list-group  list-group-flush align-self-end   color_onhover">
                <a  class="list-group-item list-group-item-action  active " data-bs-toggle="modal" data-bs-target="#y_n" >
                    <i class="bi bi-door-open-fill me-3  "></i>----- Log Out -----</a>
                         </div>
                         <?php  include 'massage_y_n_logout.php';  ?> 


        </div>
       

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light  py-4 px-4">
                <div class="d-flex align-items-center text-dark ">
                    <i class="bi bi-filter-left  fs-3 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0  " >Algeria <span style="color:#172F46;">Express</span></h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle second-text fw-bold text-dark" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-fill me-2  "></i>Mon Compte
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#data_admin">Profile</a></li>
                                <li><a class="dropdown-item"  href="#" data-bs-toggle="modal" data-bs-target="#y_n">Log out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
<?php include 'data_admin.php';   ?>
            <div class="container-fluid px-4" >
            <div class="row d-flex  justify-content-start ">
        <!-- form recherch  -->
        <div class="col-xl-6 col-md-8 col-sm-8 col-8 ">
        <form class="me-4">
            <div class="input-group mb-3" style="border: 2px solid black;border-radius:8px;">
                <input type="date" class="form-control" style="outline: none;"  placeholder="Search" id="search_history" aria-label="Search">
                <button class="input-group-text btn  bi bi-search" type="submit" disabled></button>
            </div>
          </form> 
          </div>
    
          <!-- end from recherch -->
    
</div>











                <div class="row g-3 my-2" id="result_search">
                <?php
                if($nbt_row >0) include 'affiche_liste_history.php';
                else  include 'NoDataFound.php';
                ?>    
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


<script>
var msg_system_content = document.getElementById('content_msg_system');
</script>
<?php  
if(isset($_GET['test_e'])){
    $test_e = $_GET['test_e'];
if($test_e==1){
    echo " 
    <script>
    msg_system_content.classList.add('bg-success');
    msg_system_content.textContent='Your modification success'
    document.getElementById('btn_msg_h').click();
    document.addEventListener('click',function(){
        window.location='trip.php';
    })
    </script>   
        ";
    }
    if($test_e==0){
        echo " 
        <script>
        msg_system_content.classList.add('bg-danger');
        msg_system_content.textContent='Error !!!!!'
        document.getElementById('btn_msg_h').click();
        document.addEventListener('click',function(){
            window.location='trip.php';
        })
        </script>   
            ";
        }

}
?>


<script src="js/jquery-3.6.1.min.js"></script>


<script>
$(document).ready(function(){
$("#search_history").keyup(function(){
    var input = $(this).val();
   // alert(input);

    $.ajax({
        url:"SearchHistory.php",
        method: "POST",
        data:{input:input},
        success:function(data){
            $("#result_search").html(data);
        }
    });



});



})

</script>







</body>

</html>

<?php }  ?>