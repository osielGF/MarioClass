<?php
//iniciar sesion 
error_reporting(0);
  $MVC = new MvcController();
  session_start();
?>
    
<div class="wrapper">
  <!-- Navbar -->
  
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#270A43">
    <!-- Brand Logo -->
    <?php
    if($_SESSION["username"]=="admin")
    {
      echo '
      <a href="index.php?action=alumnas" class="brand-link">
        <span class="brand-text font-weight-light">CONTROL ALUMNAS/PAGOS</span>
      </a>
    
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="views/yo.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">';
      ?>
              <?php 
                //Nombre usuario
                echo "Usuario: [".$_SESSION["username"]."]";
      ?>
       <?php  echo '
             </a>
                </div>
              </div>';
      }
      ?>
            
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">NAVEGACION</li>
          <li class="nav-item">

            <?php if($_SESSION["username"]=="admin")
            {
              echo '
              <li class="nav-item">
                <a href="index.php?action=alumnas" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-info"></i>
                  <p>Alumnas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?action=grupos" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-info"></i>
                  <p>Grupos</p>
                </a>
              </li>';
            }
            ?>

              <li class="nav-item">
                <a href="index.php?action=pagos" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-info"></i>
                  <p>Pagos</p>
                </a>
              </li>

              <?php if($_SESSION["username"]=="admin")
            {
              echo '
          <li class="nav-item">
            <a id="salir_salir" href="index.php?action=salir" class="nav-link">
              <i class="nav-icon fa fa-circle-o text-danger"></i>
              <p>Salir</p>
            </a>
          </li>';
            }
            ?>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

