



<?php

echo"<pre>";
print_r( $_FILES);
echo"</pre>";




if($_SERVER["REQUEST_METHOD"]=="POST"){

    require_once("./connect.php");


$name=$_POST["name"];
$price=$_POST["price"];
$sale=$_POST["sale"];
$seller=$_POST["seller"];
$img=$_FILES["img"]["name"];

if($_FILES["img"]["error"] ==0 ){

    $extentions=["png","jpg","gfif"];
    $ext_img = pathinfo($img,PATHINFO_EXTENSION);

    if(in_array($ext_img,$extentions)){
        
        if($_FILES["img"]["size"] <= 500000){

             $new_name=md5(uniqid()).".".$ext_img;
             move_uploaded_file($_FILES["img"]["tmp_name"],"../images/".$new_name);
             
             $insert=$connect->query("INSERT INTO `products`(
    `name`,
    `price`,
    `sale`,
    `seller`,
    `img`
)
VALUES(
    '$name',
    '$price',
    '$sale',
    '$seller',
    '$new_name'
)");

    if($insert){
        header("location:../products.php");
    }


    }




}




}
}





?>