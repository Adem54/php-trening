<?php include("includes/header.php"); ?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            


            <?php
            require_once("includes/top_nav.php");
            
            ?>




            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php require_once("includes/side_nav.php") ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

          <?php require_once("includes/admin_content.php"); ?>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>