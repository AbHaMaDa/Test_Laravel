


<?php
session_start();
  $priv= $_SESSION["login"]["priv"];
  $sess_id= $_SESSION["login"]["id"];

require_once("./connect.php");
$id=$_GET["id"];

$select=$connect->query("SELECT * FROM `users` WHERE id='$id'");

$user=$select->fetch_assoc();


// $delete = $connect->query("DELETE
// FROM
//     `users`
// WHERE
//     id='$id'");

    

//make sure the  user can not edit admins
if($user["priv"] < $priv){include_once("../404.php");exit(); }
// make sure the admin can edit users
elseif($user["priv"] > $priv){
    $delete = $connect->query("DELETE
    FROM
        `users`
    WHERE
        id='$id'");
        if ($delete) {
    header("location:../users.php");
    exit();    
};}
// make sure the users can not edit another users 
else{if($sess_id != $user["id"]){include_once("../404.php"); exit();}else{ $delete = $connect->query("DELETE
    FROM
        `users`
    WHERE
        id='$id'");
        if ($delete) {
    header("location:../users.php");  
    exit();  
};}}

// if ($delete) {
//     header("location:../users.php");    
// };


?>