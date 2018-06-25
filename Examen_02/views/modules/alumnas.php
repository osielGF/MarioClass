<?php
//iniciar la sesion y redireccionar al los productos
error_reporting(0);
    session_start();
  if(!$_SESSION['user']){
    echo "
    <script type='text/javascript'>
      window.location='index.php';
    </script>";
  } 
?>

<!--cuerpo de la pagina-->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LISTADO - ALUMNAS</title>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="background-color: purple">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="color: white">LISTADO ALUMNAS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li style="color: white" class="breadcrumb-item active">LISTADO ALUMNAS</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="float-left">
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            			<?php
                    //Creacion de objeto mvc y llamar el controlador especifico para mostrar una tabla con todos los productos
      							$vistaAlumnas = new MvcController();
      							$vistaAlumnas -> vistaAlumnasController();
                    $vistaAlumnas -> borrarAlumnasController()
      							//($vistaProducto -> borrarAlumnoController();
      						?>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

</div>
<!-- ./wrapper -->
</div>

</body>
<!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0-alpha
    </div>
  </footer>
</html>