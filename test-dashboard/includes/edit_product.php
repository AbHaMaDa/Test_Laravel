

<?php

$id=$_GET["id"];

$product=$connect->query("SELECT * FROM `products` WHERE id='$id' ")->fetch_assoc();



?>



<form action="functions/edit_products.php" method="post" style="width:80%;margin:auto;" enctype="multipart/form-data">
    <input type="text" name="id" value="<?php echo  $product["id"]?>" hidden  >
    <div class="form_check form_check_inline">
        <label for="exampleInputEmail">Name</label>
        <input type="text" name="name" placeholder="name" class="form-control" id="exampleInputEmail" value="<?php echo $product["name"]  ?>" >
    </div>
    <div class="form_check form_check_inline">
        <label for="exampleInputEmail">price</label>
        <input type="price" name="price" placeholder="price" class="form-control" id="exampleInputEmail"value="<?php echo $product["price"]  ?>" >
    </div>
    <div class="form_check form_check_inline">
        <label for="exampleInputEmail">sale</label>
        <input type="text" name="sale" placeholder="sale" class="form-control" id="exampleInputEmail"value="<?php echo $product["sale"]  ?>" >
    </div>
   
        <div class="form_group">
            <label for="exampleInputEmail">seller</label>
            <input type="text" name="seller" placeholder="seller" class="form-control" id="exampleInputEmail"value="<?php echo $product["seller"]  ?>" >
        </div>
    
    <br>
    <div class="form_group">

        <label for="exampleFormControlSelect1">Img</label>
        <input type="file" name="img" multiple class="form-control" id="exampleFormControlSelect1">
        <br>

        <div><img  src="./images/<?php echo $product["img"]?>" alt="img" style="width: 100px;" ></div>
       
    </div> <br>
    <input type="submit" name="submit" class="btn btn-primary" value="Add">
</form>
<br>