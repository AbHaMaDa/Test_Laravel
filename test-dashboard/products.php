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
            <li class="breadcrumb-item active">Products</li>
        </ol>

        <!--  main containt  -->


<?php


if(!isset($_GET["product"])){
    include("includes/products_veiw_tables.php");
}elseif($_GET["product"] =="add"){
    include("includes/add_new_product.php");
}elseif($_GET["product"] == "edit"){
    include("./includes/edit_product.php");
}


?>







            <!-- Sticky Footer -->
    <?php
     
     include_once("designs/Footer.php");
     
     ?>