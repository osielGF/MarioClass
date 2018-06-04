<?php
//ver si hay una sesion existente
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
  <title>LISTADO - CATEGORIAS</title>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>LISTADO CATEGORIAS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?action=dashboard">Home</a></li>
              <li class="breadcrumb-item active">LISTADO CATEGORIAS</li>
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
                    //Crear un objeto tipo mvc para llamar el controlador para mostrar todos las categorias en un atabla
      							$vistaCategorias = new MvcController();
      							$vistaCategorias -> vistaCategoriasController();
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