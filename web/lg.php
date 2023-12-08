<?php 





session_start();
include("connection.php");



if($_SERVER['REQUEST_METHOD']=="POST"  && isset($_POST['btn1']) ){
$phone= $_POST['p'];
    $email= $_POST['e'];
    $password= $_POST['pass'];
    $name= $_POST['f'];
    $Lasname= $_POST['laa'];

    if (empty ($name)){

         $alert="<script> alert( ' please enter your first name correctly')</script>";

echo $alert;
     }
     else if (empty ($Lasname)){
         $alert="<script> alert( 'please enter your last name correctly')</script>";

         echo $alert;
     }

     else if (empty( $phone)){
         $alert="<script> alert( ' please enter a valid phone')</script>";

         echo $alert;
     }
     else if (empty( $email)){
         $alert="<script> alert( ' please enter a valid email')</script>";

         echo $alert;
     }
     else if (empty( $password)){
         $alert="<script> alert( ' please a valid password ')</script>";

         echo $alert;
    
     }
     else if(strlen($password)<7){
         $alert="<script> alert( ' your Password must be >=7')</script>";

         echo $alert;
     }

     else if( !empty($email) && !empty($password)  )
     {

         $query= "insert into users(phone,fname,lname,email,pass) values( '$phone','$name','$Lasname','$email','$password')";
         mysqli_query($con, $query);
         header("Location: lg.php");
         die;
     }

}







if($_SERVER['REQUEST_METHOD']=="POST"  && isset($_POST['btn2']) ){


    $email= $_POST['emaill'];
    $password= $_POST['passl'];


    if( !empty($email) && !empty($password) )
    {



    



    $query= "select * from users where email= '$email' limit 1";
    $result = mysqli_query($con, $query);




    if(mysqli_num_rows($result) == 0){
        include('NoDataFound.php');

  
  }





  if($result && mysqli_num_rows($result) > 0 )
  {   
          $user_data=mysqli_fetch_assoc($result);



if( $user_data['pass']!= $password){

$alertt="<script> alert( 'Wrong Email/Password')</script>";

echo $alertt;


}


          if($user_data['pass'] === $password )
          {
              $_SESSION['email'] = $user_data['email'];


              $forOneHour = time() + 60;

              if(isset($_POST['box']))
                      {
              
              
              
              
              
                      //setcookie (name,value,expire ,path,domain,secure ,httponly);
              
                          
                  setcookie ("email",$_POST["e"],$forOneHour,null,null,false,true);
                  setcookie ("password",$_POST["p"],$forOneHour,null,null,false,true);
                  echo "Cookies Set Successfuly";
              }

              header("Location: client.php");
 die;



}
}
}




}




?>

<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<link rel="stylesheet" href="styles.css">
<title>signin-signup</title>
<style>
 * {
margin: 0;
padding: 0;
box-sizing: border-box;
font-family: 'Poppins', sans-serif;
}

body {
display: flex;
align-items: center;
justify-content: center;
min-height: 100vh;
background: #000;
}

.container {
position: relative;
width: 70vw;
height: 80vh;
background: #fff;
border-radius: 15px;
box-shadow: 0 4px 20px 0 rgba(255, 255, 255, 0.3), 0 6px 20px 0 rgba(255, 255, 255, 0.3);
overflow: hidden;
}

.container::before {
content: "";
position: absolute;
top: 0;
left: -50%;
width: 100%;
height: 100%;
background: linear-gradient(-45deg, #172F46, #051832);
z-index: 6;
transform: translateX(100%);
transition: 1s ease-in-out;
}

.signin-signup {
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
display: flex;
align-items: center;
justify-content: space-around;
z-index: 5;
}

form {
display: flex;
align-items: center;
justify-content: center;
flex-direction: column;
width: 40%;
min-width: 238px;
padding: 0 10px;
}

form.sign-in-form {
opacity: 1;
transition: 0.5s ease-in-out;
transition-delay: 1s;
}

form.sign-up-form {
opacity: 0;
transition: 0.5s ease-in-out;
transition-delay: 1s;
}

.title {
font-size: 35px;
color: #172F46;
margin-bottom: 10px;
}

.input-field {
width: 100%;
height: 50px;
background: #fff;
margin: 10px 0;
border: 2px solid #172F46;
border-radius: 50px;
display: flex;
align-items: center;
}

.input-field i {
flex: 1;
text-align: center;
color: #fff;
font-size: 18px;
}

.input-field input {
flex: 5;
background: none;
border: none;
outline: none;
width: 100%;
font-size: 18px;
font-weight: 600;
color: #000;
}

.btn {
width: 150px;
height: 50px;
border: none;
border-radius: 50px;
background: #172F46;
color: #fff;
font-weight: 600;
margin: 10px 0;
text-transform: uppercase;
cursor: pointer;
}

.btn:hover {
background: #172F46;
}

.social-text {
margin: 10px 0;
font-size: 16px;
}

.social-media {
display: flex;
justify-content: center;
}

.social-icon {
height: 45px;
width: 45px;
display: flex;
align-items: center;
justify-content: center;
color: #444;
border: 1px solid #444;
border-radius: 50px;
margin: 0 5px;
}

a {
text-decoration: none;
}

.social-icon:hover {
color: #172F46;
border-color: #172F46;
}

.panels-container {
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
display: flex;
align-items: center;
justify-content: space-around;
}

.panel {
display: flex;
flex-direction: column;
align-items: center;
justify-content: space-around;
width: 35%;
min-width: 238px;
padding: 0 10px;
text-align: center;
z-index: 6;
}

.left-panel {
pointer-events: none;
}

.content {
color: #fff;
transition: 1.1s ease-in-out;
transition-delay: 0.5s;
}

.panel h3 {
font-size: 24px;
font-weight: 600;
}

.panel p {
font-size: 15px;
padding: 10px 0;
}

.image {
width: 100%;
transition: 1.1s ease-in-out;
transition-delay: 0.4s;
}

.left-panel .image,
.left-panel .content {
transform: translateX(-200%);
}

.right-panel .image,
.right-panel .content {
transform: translateX(0);
}

.account-text {
display: none;
}
/*Animation*/

.container.sign-up-mode::before {
    transform: translateX(0);
}

.container.sign-up-mode .right-panel .image,
.container.sign-up-mode .right-panel .content {
    transform: translateX(200%);
}

.container.sign-up-mode .left-panel .image,
.container.sign-up-mode .left-panel .content {
    transform: translateX(0);
}

.container.sign-up-mode form.sign-in-form {
    opacity: 0;
}

.container.sign-up-mode form.sign-up-form {
    opacity: 1;
}

.container.sign-up-mode .right-panel {
    pointer-events: none;
}

.container.sign-up-mode .left-panel {
    pointer-events: all;
}


/*Responsive*/

@media (max-width:779px) {
    .container {
        width: 100vw;
        height: 100vh;
    }
}

@media (max-width:635px) {
    .container::before {
        display: none;
    }
    form {
        width: 80%;
    }
    form.sign-up-form {
        display: none;
    }
    .container.sign-up-mode2 form.sign-up-form {
        display: flex;
        opacity: 1;
    }
    .container.sign-up-mode2 form.sign-in-form {
        display: none;
    }
    .panels-container {
        display: none;
    }
    .account-text {
        display: initial;
        margin-top: 30px;
    }
}

@media (max-width:320px) {
    form {
        width: 90%;
    }
}

.return{
text-decoration:none;
    position: absolute;
    top:4%;
    left:3%;
}
</style>
</head>

<body>
        <div class="container">
        <div class="signin-signup">

        
        <form method="post" class="sign-in-form">
        <h2 class="return">     <img src="return.png" style=" height:20px; width:40px;">   <a href="index.php " style="text-decoration: none; color:black;">Home</a></h2>

        <h2 class="title">Sign in</h2>
        <div class="input-field">
        <i class="fas fa-user"></i>
        <input type="email"   required name="emaill" placeholder="Email">
        </div>
        <div class="input-field">
        <i class="fas fa-lock"></i>
        <input  required type="password" name="passl" placeholder="Password">

        </div>

        <div class="">
        <input type="checkbox" name="box" id="box">
            <label class='bx'for="box">Remember me</label>

        </div>

        <input type="submit" value="Login" name="btn2" class="btn">


        
        <p class="account-text">Don't have an account? <a href="#" id="sign-up-btn2">Sign up</a></p>
        </form>
        <form  method="post"  class="sign-up-form">
        <h2 class="title">Sign up</h>
        <div class="input-field">
        <i class="fas fa-user"></i>
        <input type="text" required  placeholder="First Name" name="f"> <br>


        </div>
        <div class="input-field">
        <i class="fas fa-envelope"></i>
        <input type="text"  required placeholder="Last Name" name="laa"> <br>


        </div>
        <div class="input-field">
        <i class="fas fa-lock"></i>
        <input type="tel"  required placeholder="Your phone" class="phone" minlength="10" maxlength="10" name="p"> <br>


        </div>
        
        <div class="input-field">
            <i class="fas fa-lock"></i>
        
            <input type="email"   required placeholder="Your Email" name="e"> <br>

            
        </div>
        
        
            <div class="input-field">
                <i class="fas fa-lock"></i>
            
                <input type="password"  required  placeholder=" Password" minminlength="7" name="pass">

               

            </div>
        
               
        <input type="submit" value="Sign up"  name="btn1" class="btn">
        <!-- <p class="account-text">Already have an account? <a href="#" id="sign-in-btn2">Sign in</a></p> -->
        </form>
        </div>
        <div class="panels-container">
        <div class="panel left-panel">
        <div class="content">
        <h3>RAILWAY DZ </h3>
        <p>Already have an Account, Click Here and Log In</p> 
        <button class="btn" id="sign-in-btn">Sign in</button>
        </div>
        </div>
        <div class="panel right-panel">
        <div class="content">
        <h3>RAILWAY DZ </h3>
        <p>Don't Have an Account, Create Right Now </p>
        
        <button class="btn" id="sign-up-btn">Sign up</button>
        </div>
        </div>
        </div>
        </div>
        
        </body>
        <script src="js/loginn.js"></script>


        <script>
var sign = document.getElementById('sign-up-btn');


</script>

<?php
if(isset($_GET['log'])){
    $log = $_GET['log'];
    if($log==0)
echo '<script>sign.click();</script>';
}
?>

</html>
