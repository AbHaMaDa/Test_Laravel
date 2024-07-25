


<?php


if($_SERVER["REQUEST_METHOD"]== "POST"){

    require_once("./connect.php");

     $id=$_POST["id"];
     $name=$_POST["name"];
     $price=$_POST["price"];
     $sale=$_POST["sale"];
     $seller=$_POST["seller"];
     $img=$_FILES["img"]["name"];

if(empty($img)){

    $update=$connect->query("UPDATE
    `products`
SET
    `name` = '$name',
    `price` = '$price',
    `sale` = '$sale',
    `seller` = '$seller'
WHERE
    id = '$id'");

    if($update){
        header("location:../products.php");
    }
}else{
    
    if($_FILES["img"]["error"] ==0 ){

        $extentions=["png","jpg","gfif"];
        $ext_img = pathinfo($img,PATHINFO_EXTENSION);
    
        if(in_array($ext_img,$extentions)){
            
            if($_FILES["img"]["size"] <= 500000){
    
                 $new_name=md5(uniqid()).".".$ext_img;
                 move_uploaded_file($_FILES["img"]["tmp_name"],"../images/".$new_name);


                 $full_update=$connect->query("UPDATE
                 `products`
             SET
                 `name` = '$name',
                 `price` = '$price',
                 `sale` = '$sale',
                 `seller` = '$seller',
                 `img` = '$new_name'
             WHERE
                 id = '$id' ");
                 if($full_update){
                    header("location:../products.php");
                 }

                 


                }
                }
                }

}



}


?>