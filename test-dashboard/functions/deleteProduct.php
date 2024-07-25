


<?php 



session_start();



if(isset($_SESSION["login"])){

    require_once("./connect.php");

    $id=$_GET["id"];

    $delete=$connect->query("DELETE
FROM
    `products`
WHERE
    id='$id'");
    if($delete){
        header("location:../products.php");
    }
}






?>