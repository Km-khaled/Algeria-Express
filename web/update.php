<?php




















session_start();
include("connection.php");

if (!isset($_SESSION['email']) && $_SESSION['email'] == false) {
    // User is logged in, so destroy the session and remove all session data
    session_destroy();
    unset($_SESSION);
    // Redirect the user to the login page
  header('Location: LogIn.php');
  exit;
  }
  




function check($con)
{

 if(isset($_SESSION['email']))
  {

    $id= $_SESSION['email'];
    $query= "select email from users where email ='$id' limit 1";
    $result=mysqli_query($con,$query);

   if($result && mysqli_num_rows($result) > 0 )
   {
    $user_data=mysqli_fetch_assoc($result);
    return $user_data['email'];
   }

  }

  
}


$ee=check($con);
$query="select * from users where users.email= '$ee'  limit 1 "; 
$result= mysqli_query($con, $query);








if($_SERVER['REQUEST_METHOD'] =="POST")
{

    $first= $_POST['fn']; 
    $last=$_POST['ln'];
    $phone=$_POST['ph'];
    $pass=$_POST['pass'];


    $query=" update users set  fname='$first' ,lname='$last',pass='$pass',phone=$phone
where email='$ee'; ";

$lt=mysqli_query($con,$query);

header("Location: client.php");
 die;





}

?>
<!DOCTYPE html>


<head>


    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formcss.css">


    <style>



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





h3 {
    position: absolute;
    top: 80px;
    left: 10%;
}

form {
    position: absolute;
    top: 15%;
    right:75%;

}

label {
    position: absolute;
    color: gray;
    left: 230px;
    text-align: center;
}

input:hover {
    outline-color: rgb(126, 5, 126);
    ;
}

input {
    margin-left: 20px;
    height: 5%;
    width: 30%;
}

.m,.w {
    left: 335px;
}



.btn {
    position: absolute;
    background-color: rgb(74, 111, 182);
    color: white;
    font-weight: 400;
    font-size: larger;
    text-align: center;
    height: 40px;
    border-radius: 15px;
    left: 33%;
}

fieldset {
    background-color:   rgba(255, 255, 255, 0.918);
    position: absolute;
    left: 70px;
    width: 600px;
    height: 2750px;
    text-align: center;
    
}

body {
    background-color: rgb(224, 224, 224);
}

legend {
    font-weight: 700;
    font-size: larger;
}

#top {
    display: none;
    position: fixed;
    border-radius: 30px;
    background-color: rgb(126, 5, 126);
    bottom: 0%;
    right: 0%;
    height: 50px;
    width: 50px;
}

#top img {
    height: 30px;
    width: 20px;
}





label {
    position: absolute;
    color: gray;
    left: 230px;
    text-align: center;
}



    
    fieldset{
        height:600px;
        
    }



input{
    border-radius:5px;
}

    </style>
    
</head>


<body>

    <nav class="nav">
        <a class="logo" href="client.php">Algeria Express</a>

    </nav>



    <form method="POST" >

        <fieldset>
            
            <legend>
               Modify Your Account
            </legend>
            
            <br>
            <h2>
                <legend>
                        <p>Personal Info</p>
                </legend>
            </h2>
            <?php while($user_data=mysqli_fetch_assoc($result)) 
		{ 
		?>
            <br>
            <label for="Name">Email</label>
            <br>
            <input type="text"  value="<?php echo $user_data['email']; ?>" disabled >
            <br><br>
            <label for="Name">First Name</label>
            <br>
            <input type="text" id="Name" name="fn" value="<?php echo $user_data['fname']; ?>" value="" >
            <br><br>
            <label for="prenom">Last Name</label>
            <br>
            <input type="text" id="prenom" name="ln" value="<?php echo $user_data['lname']; ?>" >
            <br><br><label for="etb">Phone</label>
            <br>
            <input id="phone" type="tel"  name="ph" value="<?php echo $user_data['phone']; ?>" >
            <br> <br>
            <label for="etb">Password</label>
            <br>
            <input id="password" type="password"  name="pass" value="<?php echo $user_data['pass']; ?>" >
            <br> <br>
             






            

            <?php
        } 
		?>

            <input class="btn" type="submit" name="sbb" value="Update Account">




        </fieldset>
    </form>











</body>

























</html>