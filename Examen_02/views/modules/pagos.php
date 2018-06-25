<?php
//iniciar la sesion y redireccionar al los productos
error_reporting(0);
    session_start();
?>

<!--cuerpo de la pagina-->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LISTADO - PAGOS</title>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

<?php
if($_SESSION["username"]=="admin")
  {
    echo '<div class="content-wrapper">';
  }
?>
    <!-- Content Header (Page header) -->
    <section class="content-header" style="background-color: purple">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="color: white">LISTADO PAGOS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              <?php
              if($_SESSION["username"]!="admin")
                {
                  echo '
                  <a href="index.php?action=registro_publico"> <li style="color: white" class="breadcrumb-item active">REGISTRAR PAGO</li> </a>
                  <a href="index.php?action=pagos"> <li style="color: white" class="breadcrumb-item active">/ VER LUGARES   </li> </a>';
                }
                else
                {
                  echo '
                  <li style="color: white" class="breadcrumb-item active">LISTADO PAGOS</li>';
                }
              ?>
              
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
              if($_SESSION["username"]!="admin")
              {
                echo '<a href="index.php?action=registro_publico"><input type="button" value="AGREGAR PAGO" name="btnAgregarPago"
                class="btn btn-success" title= "Agregar Pago"></a></br></br>';
              }
              ?>
            	<?php
                //Creacion de objeto mvc y llamar el controlador especifico para mostrar una tabla con todos los productos
      					$vistaPagos = new MvcController();
      					$vistaPagos -> vistaPagosController();
                $vistaPagos -> borrarPagosController()
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

<?php
if($_SESSION["username"]=="admin")
  {
    echo '</div>';
  }
?>

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