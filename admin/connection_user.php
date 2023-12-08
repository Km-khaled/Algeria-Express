<?php  
include 'config/connect.php';

if(isset($_POST['login'])){
   

    $user_name = $_POST['user_name'];
$pass =$_POST['pass'];
$sql_get_admin  = " SELECT * FROM  admin WHERE admin.user_name='$user_name' AND admin.pass='$pass'";
$result =$conn->prepare($sql_get_admin);
$result->execute();

if($result->rowCount()>0){
    $data =$result->fetchAll();
    session_start();
    $_SESSION['id']= $data[0]['id_admin'];
    $_SESSION['email']= $data[0]['email'];
    $_SESSION['user_name'] = $data[0]['user_name'];
    $_SESSION['pass'] =$data[0]['pass'];
    $_SESSION['credit_card'] =$data[0]['credit_card'];
    $_SESSION['solde'] = $data[0]['solde'];
     header('Location:train.php?test=33');
    
}else{
     header('Location:login.php?log=101');
    
}






}



?>
