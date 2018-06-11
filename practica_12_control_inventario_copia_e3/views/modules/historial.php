<?php
//ver si hay una sesion existente  si o hay una sesion,me redireccina al index que en este caso es el login
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
  <title>LISTADO - HISTORIAL</title>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>LISTADO HISTORIAL</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?action=dashboard">Home</a></li>
              <li class="breadcrumb-item active">LISTADO PRODUCTOS</li>
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
                    //Objeto tipo modelo vista controlador y mostrar una tabla de todo el historial
      							$vistaHistorial = new MvcController();
      							$vistaHistorial -> vistaHistorialController();
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
</html>