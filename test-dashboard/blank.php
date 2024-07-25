<?php

include_once("designs/Nav.php");

?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php
  include_once("designs/Sidebar.php");
  ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Blank Page</li>
        </ol>

        <!-- Page Content -->
        <h1>Blank Page</h1>
        <hr>
        <p>This is a great starting point for new custom pages.</p>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <?php
     
     include_once("designs/Footer.php");
     
     ?>