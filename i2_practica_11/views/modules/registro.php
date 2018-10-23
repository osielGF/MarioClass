<?php 
  //iniciar la sesion y redireccionar al los productos
error_reporting(0);
    session_start();
    if(isset($_SESSION["user"])){
        header("location: index.php?action=dashboard");
    }
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>REGISTRO DE USUARIO</title>
</head>
<body class="hold-transition login-page" style="background-color: black;">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b style="color: white; font-size: 30px;">REGISTRO DE USUARIO</b></a>
    <hr style="border-color: white;">
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <strong><p class="login-box-msg">Ingresa tus datos</p></strong>

<!-- Formulario de login -->
      <form method="post">
        <div class="form-group has-feedback">
          <label>Name: </label>
          <input type="text" class="form-control" placeholder="Nombre" name="txtNombre" required>
          <span class="fa fa-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <label>Username: </label>
          <input type="text" class="form-control" placeholder="Nombre de usuario" name="txtUsername" required>
          <span class="fa fa-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <label>Password: </label>
          <input type="password" class="form-control" placeholder="Password" name="txtPassword" required>
          <span class="fa fa-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <input type="submit" class="btn btn-block btn-primary" style="color: white;" name="btnRegistrarse" value="Registrarse"></input></input>
            <a href="index.php"  class="btn btn-block btn-flat" style="background-color:#A50103; color: white;">Volver al Login</a>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

</body>
</html>
<?php 
  $mvc = new MvcController();
  $mvc -> registroUsuariosController();
?>
