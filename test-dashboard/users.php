<?php


include_once("designs/Nav.php");

?>


<div id="wrapper">

<!--  Sidebar -->

<?php
include_once("designs/Sidebar.php");
?>

<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Users</li>
        </ol>


<!--  main containt  -->


<?php

if(!isset($_GET["user"])){
include("includes/users_veiw_tables.php");
}elseif($_GET["user"]=="add"){
    include("includes/add_new_user.php");
}elseif($_GET["user"]== "edit"){
    include("./includes/edit_user.php");
}

?>
 




    <!-- Sticky Footer -->
    <?php
     
     include_once("designs/Footer.php");
     
     ?>