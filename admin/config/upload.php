<?php    

include 'connect.php';
if(isset($_POST['upp']) && isset($_FILES['my_file'])){
    $video_name = $_FILES['my_file']['name'];
    $temporaire_name = $_FILES['my_file']['tmp_name'];
    $error_file = $_FILES['my_file']['error'];
    $name = $_POST['name_v'];
    $comment = $_POST['comment'];
if($error_file === 0){
    $v= pathinfo($video_name,PATHINFO_EXTENSION);
    $v_extention = strtolower($v);
    $v_extention_accepter = array("mp4", 'webm','avi','flv');
    if(in_array($v_extention,$v_extention_accepter)){
        $video_n = uniqid("video-",true). '.'.$v_extention; 
        $newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." .$v_extention;
        $targetDirectory = "../video_up/".$video_n;
$sql = "INSERT INTO video(url_v,name_v,comment) VALUES('$video_n','$name','$comment')";
$result = mysqli_query($con,$sql);
move_uploaded_file($temporaire_name,$targetDirectory);

header("Location: ../guid.php?test=100");
    }else{
        //error extension
       header("Location: ../guid.php?test=101");
    }
}
}else{
    //error upload
header("Location: ../guid.php?test=102");
}


?>