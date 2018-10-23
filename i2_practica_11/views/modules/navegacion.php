<?php
//iniciar sesion 
  $MVC = new MvcController();
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

<div class="wrapper" style="background-color: #A50103;">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand  navbar-light border-bottom" >
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars" style="color:white"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php?action=dashboard" class="nav-link" style="color:white">Inicio</a>
      </li>
      
    </ul>
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      
    </ul>
    <ul class="navbar-nav">
      <a style="color: black" href="index.php?action=perfil" class="btn btn-block btn-warning btn-sm">Mi Perfil</a>
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:black">
    <!-- Brand Logo -->
    
    <a style="background-color: #A50103" href="views/dist/img/libros2.jpg" class="brand-link">
      <img style="width: 50px" src="views/dist/img/libros2.jpg" alt="Sistema de tutorias" title="Tutorias" class="brand-image img-circle elevation-3"
           style="opacity: 1">
      <span class="brand-text font-weight-light">Control de Libros</span>
    </a>

    <div align="center">
    <label style="color: white; font: caption;">Sistema de Control de Libros</label>
    </div>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="">
        <div class="">
          <img width="240px" height="150px" title="foto de perfil" src="views/dist/img/libros.jpg" class="" alt="User Image" >
        </div>
        <div class="info">
          <a href="#" class="d-block">
            
          </a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <div style="color: white">
          Usuario:  
          <?php echo $_SESSION["username"]; ?>
          </br></br>
          </div>
          <li class="nav-header">NAVEGACION</li>
          <li class="nav-item">
          
          <li class="nav-item">
            <a href="index.php?action=dashboard" id="n1" class="nav-link">
              <i class="nav-icon fa fa-dashboard text-info"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?action=libros" id="n2" class="nav-link">
              <i class="nav-icon fa fa-bars text-info"></i>
              <p>Libros</p>
            </a>
          </li>
          <li class="nav-item">
            <a id="salir_salir" href="index.php?action=salir" class="nav-link">
              <i class="nav-icon fa fa-circle-o text-danger"></i>
              <p>Salir</p>
            </a>
          </li> 
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

</body>
</html>    

