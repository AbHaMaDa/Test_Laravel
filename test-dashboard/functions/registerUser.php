

<?php


if($_SERVER["REQUEST_METHOD"]== "POST"){

    require_once("./connect.php");

 $first_name= $_POST["frist_name"];
 $last_name= $_POST["last_name"];
 $email=$_POST["email"];
 $password=$_POST["password"];
 $confirm_password=$_POST["confirm_password"];

$name=$first_name ." ".$last_name;
$num_email=$connect->query("SELECT * FROM `users` WHERE email='$email'")->num_rows;


echo $num_email;

if($num_email == 0){
    if($password == $confirm_password){
        $pass_hash=password_hash($password, PASSWORD_DEFAULT);

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
            '1',
            '0'
            )");
        
            if($insert){
                header("location:../index.php");
            };


    }else{
        header("location:../register.php?error_while_condirming_password");
    }

}elseif($num_email>0){
    header("location:../register.php?this_email_is_exsist");
};

}




?>