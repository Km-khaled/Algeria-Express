<!DOCTYPE html>
<html lang="en">




<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="../web/icons/bootstrap-icons.css">

<link href="css/bootstrap.min.css" rel="stylesheet" />

<link rel="stylesheet" href="css/login.css">
<title>signin-signup</title>
<style>
.container .in{
   top: 10;

}
</style>
</head>




<body>
<div class="container">

<div class="signin-signup">
<form action="connection_user.php" class="sign-in-form" method="post" >
<h2 class="title">Sign in</h2>
<div class="input-field">
<i class="bi bi-person-fill" style="color: #051832;"></i>
<input type="text" required name="user_name" placeholder="Username">
</div>
<div class="input-field">
<i class="bi bi-lock-fill"></i>
<input type="password" required name="pass" placeholder="Password">
</div>
<div >
<input type="submit" value="Login" class="btn" name="login">

</div>

</form>
<form action="" class="sign-up-form">

</form>
</div>

<div class="panels-container">
<div class="panel left-panel">
<img src="" alt="" class="image">
</div>
<div class="panel right-panel">
<div class="content">

</div>
<img src="img/close.svg" alt="" class="image">
<div class="in" style="width: 200px;height: 25px; margin-top:100px; color:white;" id="retour">
<a  style="font-size: 20px;text-transform: uppercase;  font-weight: bold;cursor: pointer;"><i class="bi bi-caret-left-square-fill" style="margin-right:5px;"></i>return</a>
</div>
</div>

</div>
</div>


<script>

var retour = document.getElementById('retour');
retour.addEventListener('click', function(){
    document.location='../web/index.php';
})

</script>

<script src="js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");
        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
            
        };
    </script>
    
<?php include 'message_system.php';   ?>
<script>
var msg_system_content = document.getElementById('content_msg_system');

</script>

<?php   
if(isset($_GET['log'])){
    $test = $_GET['log'];
if($test==101){
    echo " 
    <script>
    msg_system_content.classList.add('bg-warning');
    msg_system_content.textContent='Error login !!';
    document.getElementById('btn_msg_h').click();
    document.addEventListener('click',function(){
        window.location='login.php';
    })
    </script>   
        ";
     
    }
}
    ?>



<script src="js/script.js"></script>




</body>

</html>
