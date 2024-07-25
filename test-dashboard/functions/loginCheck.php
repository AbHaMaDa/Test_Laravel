
<?php
session_start();


require_once("./connect.php");

$email = $_POST["email"];
$password = $_POST["password"];


$num_email=$connect->query("SELECT * FROM `users` WHERE email='$email'")->num_rows;



if($num_email> 0 ){

    $user= $connect->query("SELECT * FROM `users` WHERE email='$email' ")->fetch_assoc();
    
    $truePass = password_verify($password,$user["password"]);
    if($truePass){
        $_SESSION["login"] = $user;
        header("location:../index.php");


    }else{
        header("location:../login.php?error=password_is_incorrct");
    }
  
    

}else{
    header("location:../login.php?error=email_does_not_exsist");
}


?>