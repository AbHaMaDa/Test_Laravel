


<?php

if($_SERVER["REQUEST_METHOD"]== "POST"){

    require_once("connect.php");

  $id = $_POST["id"];
  $name = $_POST["name"];
  $email= $_POST["email"];
  $gender=$_POST["gender"];
  $priv=$_POST["access"];

 $num_email=$connect->query("SELECT * FROM `users` WHERE email='$email' ")->num_rows;
 
 $user=$connect->query(" SELECT * FROM `users` WHERE id='$id'")->fetch_assoc();

echo $user["email"];


 
 if($num_email ==0 || $email == $user["email"] ){
    $update=$connect->query("UPDATE
    `users`
SET
    
    `name` = '$name',
    `email` = '$email',
    `priv` = '$priv',
    `gender` = '$gender'
    WHERE id = '$id'
    ");

    if($update){
        header("location:../users.php");
    }
 }else{
    header("location:../login.php?this_email_already_exsist");
 }
}


?>