


<?php


// echo"<pre>";
// print_r($_SERVER);
// echo "</pre>";


if($_SERVER["REQUEST_METHOD"]== "POST"){

    require_once("connect.php");


 $name = $_POST["name"];
 $email= $_POST["email"];
 $password=$_POST["password"];
 $gender=$_POST["gender"];
 $priv=$_POST["access"];

$pass_hash = password_hash($password,PASSWORD_DEFAULT);

// chech if this emails excits in the  database

$num_email=$connect->query("SELECT * FROM `users` WHERE email='$email' ")->num_rows;

echo $num_email;

if($num_email == 0){

    $insert=$connect->query("INSERT INTO `users`(
    name,
    email,
    password,
    priv,
    gender
    )
    VALUES(
    '$name',
    '$email',
    '$pass_hash',
    '$priv',
    '$gender'
    )");

    if($insert){
        header("location:../users.php");
    };



    
}elseif($num_email>0){
    header("location:../login.php?this_email_is_exsist");
};

}


?>