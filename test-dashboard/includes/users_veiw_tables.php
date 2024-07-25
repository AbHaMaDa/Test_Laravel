

<?php 


$priv = $_SESSION["login"]["priv"];
$sess_id=$_SESSION["login"]["id"];
?>

<a class="btn btn-primary" href="?user=add" style="margin-bottom: 15px;" >Add</a>


<table class="table table-dark" style="text-align: center;" >
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Priv</th>
            <th scope="col">Gender</th>
            <th scope="col">Controlers</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $id=1;
        $select=$connect->query("SELECT * FROM `users` ");


        foreach($select as $user){
        ?>
        <tr>
            <td><?php echo $id++ ?></td>
            <td> <?php echo $user["name"] ?> </td>
            <td><?php echo $user["email"] ?> </td>
            <td><?php echo ($user["priv"]==1?  "user" :  "admin"); ?></td>
            <td><?php echo ($user["gender"]==1?  "female" :  "male"); ?> </td>
            <td>
                <a class="btn btn-primary" href='?user=edit&id=<?php echo $user["id"]; ?>' 
                style="display:<?php  
                //make sure the  user can not edit admins
                if($user["priv"] < $priv){echo"none";}
                // make sure the admin can edit users
                elseif($user["priv"] > $priv){echo"";}
                // make sure the users can not edit another users 
                else{if($sess_id !== $user["id"]){echo"none";}} ?>;" >Edit</a>

              


                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $user["id"] ?>" style="display:<?php
                    //make sure the  user can not edit admins
                   if($user["priv"] < $priv){echo"none";}
                   // make sure the admin can edit users
                   elseif($user["priv"] > $priv){echo"";
                    // make sure the users can not edit another users 
                   }else{if($sess_id !== $user["id"]){echo"none";}} ?>;" >
                Delete
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?php echo $user["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel<?php echo $user["id"] ?>">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span style="color: red ;" > Are U Sure That You Want to Delete <?php echo $user["name"] ?></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a class="btn btn-danger" href="./functions/deleteUser.php?id=<?php echo $user["id"]; ?>" style="display:<?php
                    //make sure the  user can not edit admins
                   if($user["priv"] < $priv){echo"none";}
                   // make sure the admin can edit users
                   elseif($user["priv"] > $priv){echo"";
                    // make sure the users can not edit another users 
                   }else{if($sess_id !== $user["id"]){echo"none";}} ?>;" >Delete</a>
                    </div>
                    </div>
                </div>
                </div>





            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>


