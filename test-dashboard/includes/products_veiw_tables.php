<a href="?product=add" class="btn btn-primary" style="margin-bottom: 10px;" >Add</a>



<?php


$id=1;
$select=$connect->query("SELECT * FROM `products`");



?>


<table class="table table-dark" style="text-align: center;" >
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Sale</th>
            <th scope="col">Saller</th>
            <th scope="col">img</th>
            <th scope="col">Controlers</th>
        </tr>
    </thead>
    <tbody>

    <?php
        foreach($select as $product){
    ?>
        <tr style="line-height: 60px;">
            <th><?php echo $id++;?></th>
            <th> <?php echo $product["name"];?></th>
            <th> <?php echo $product["price"]."$";?></th>
            <th><?php echo $product["sale"]."%";?></th>
            <th><?php echo $product["seller"];?></th>
            <th><img  src="./images/<?php echo $product["img"]?>" alt="img" style="width: 100px;" ></th>
            <th>

                <a class="btn  btn-primary" href="?product=edit&id=<?php echo $product["id"]?>">Edit</a>

                

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $product["id"] ?>">
                Delete
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?php echo $product["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel<?php echo $product["id"] ?>">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span style="color: red ;" > Are U Sure That You Want to Delete <?php echo $product["name"] ?></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a class="btn  btn-danger" href="./functions/deleteProduct.php?id=<?php echo $product["id"]?>">Delete</a>
                    </div>
                    </div>
                </div>
                </div>

            </th>
        </tr>
            <?php } ?>
    </tbody>

</table>