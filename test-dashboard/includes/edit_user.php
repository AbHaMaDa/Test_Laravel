

<?php



  $priv= $_SESSION["login"]["priv"];
  $sess_id= $_SESSION["login"]["id"];



 $id=$_GET["id"];

$select=$connect->query("SELECT * FROM `users` WHERE id='$id'");

$user=$select->fetch_assoc();

//make sure the  user can not edit admins
if($user["priv"] < $priv){include_once("./404.php");exit(); }
// make sure the admin can edit users
elseif($user["priv"] > $priv){ null;}
// make sure the users can not edit another users 
else{if($sess_id != $user["id"]){include_once("./404.php"); exit();}}

// print_r($user) ;
 
?>



<form action="functions/editUser.php" method="post" style="width:80%;margin:auto;">
<div class="form_check form_check_inline">
        <label for="exampleInputEmail" hidden>id</label>
        <input type="text" name="id" placeholder="id" class="form-control" id="exampleInputEmail"  value="<?php echo $id ?>" hidden >
    </div>
    <div class="form_check form_check_inline">
        <label for="exampleInputEmail">Name</label>
        <input type="text" name="name" placeholder="name" class="form-control" id="exampleInputEmail"  value="<?php echo $user["name"] ?>" >
    </div>
    <div class="form_check form_check_inline">
        <label for="exampleInputEmail">Email</label>
        <input type="text" name="email" placeholder="email" class="form-control" id="exampleInputEmail"  value="<?php echo $user["email"] ?>">
    </div>
  
    <br>

    <div style= "display: flex; flex-direction:row;justify-content:space-between;width:150px;" >
        
        <div class="form_check form_check_inline">
            <input type="radio" name="gender" class="form_check_input" id="inlineRadio1" value="0" <?php  $user["gender"]==0?printf ("checked"):null ?> >
            <label class="form_check_label" for="inlineRadio1">Male</label>
        </div>
        <div class="form_check form_check_inline">
            <input type="radio" name="gender" class="form_check_input" id="inlineRadio2" value="1" <?php  $user["gender"]==1?printf ("checked"):null ?>>
            <label class="form_check_label" for="inlineRadio2">Female</label>
        </div>
        </div>
        
    
    <br>

    <div class="form_group">
        <label for="exampleFormControlSelect1">Access</label>
        <select name="access" class="form-control" id="exampleFormControlSelect1">
          <option value="0" <?php  $user["priv"]==0? printf ("selected"):null ?> >Admin</option>
          <option value="1" <?php  $user["priv"]==1? printf ("selected"):null ?>>User</option>

        </select>
    </div> <br>
    <input type="submit" name="submit" class="btn btn-primary" value="submit">
</form>
<br>