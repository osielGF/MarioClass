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
  <title>Eliminar - Usuario</title>
</head>
<body>
  <div class="content-wrapper">
          <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">ELIMINAR USUARIO</h3>
              </div>
              <h4 class="card-title">INGRESA TU CONTRASEÑA DE USUARIO COMO CONFIRMACION</h4>
              <div class="card-body">
                <div class="row">
                  <div class="col-8">
                  <form method="post" role="form">
                      <input type="text" class="form-control" name="txtPassword" placeholder="password" class="form-control my-colorpicker1">
                      </br>
                      </br>
                      <div class="col-2">
                      <input type="submit" value="Enviar" name="btnConfirmacion" class="btn btn-block btn-danger">
                      </br>
                  </form>
                  <?php
                  //objeto mvc para llamar el controlador para eliminar el usuario seleccionado
                    $mvc = new MvcController();
                    $mvc -> eliminarUsuariosController();
                  ?>
                  </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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