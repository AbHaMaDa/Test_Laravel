


<form action="functions/addUser.php" method="post" style="width:80%;margin:auto;">
    <div class="form_check form_check_inline">
        <label for="exampleInputEmail">Name</label>
        <input type="text" name="name" placeholder="name" class="form-control" id="exampleInputEmail">
    </div>
    <div class="form_check form_check_inline">
        <label for="exampleInputEmail">Email</label>
        <input type="text" name="email" placeholder="email" class="form-control" id="exampleInputEmail">
    </div>
    <div class="form_check form_check_inline">
        <label for="exampleInputEmail">Password</label>
        <input type="Password" name="password" placeholder="Password" class="form-control" id="exampleInputEmail">
    </div>
    <br>

    <div style= "display: flex; flex-direction:row;justify-content:space-between;width:150px;" >
        
        <div class="form_check form_check_inline">
            <input type="radio" name="gender" class="form_check_input" id="inlineRadio1" value="0">
            <label class="form_check_label" for="inlineRadio1">Male</label>
        </div>
        <div class="form_check form_check_inline">
            <input type="radio" name="gender" class="form_check_input" id="inlineRadio2" value="1">
            <label class="form_check_label" for="inlineRadio2">Female</label>
        </div>
        </div>
        
    
    <br>

    <div class="form_group">
        <label for="exampleFormControlSelect1">Access</label>
        <select name="access" class="form-control" id="exampleFormControlSelect1">
          <option value="0">Admin</option>
          <option value="1">User</option>
          <option value="2">Owner</option>


        </select>
    </div> <br>
    <input type="submit" name="submit" class="btn btn-primary" value="add">
</form>
<br>