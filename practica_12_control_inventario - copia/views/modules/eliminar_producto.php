<?php
error_reporting(0);
  session_start();
  if(!$_SESSION['user']){
    echo "
    <script type='text/javascript'>
      window.location='index.php';
    </script>";
  } 
?>


<!DOCTYPE html>
<html>
<head>
  <title>Eliminar - Producto</title>
</head>
<body>
  <div class="content-wrapper">
          <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">ELIMINAR PRODUCTO</h3>
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
                    $mvc = new MvcController();
                    $mvc -> eliminarProductosController();
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
</html>