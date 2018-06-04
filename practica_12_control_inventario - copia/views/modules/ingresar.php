<?php 
    session_start();
    if(isset($_SESSION["user"])){
        header("location: index.php?action=productos");
    }
?>


<!DOCTYPE html>
<html>
<head>
</head>
<body style="background-color:#270A43" class="hold-transition login-page">
<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

      <form method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Username" name="txtUsername">
          <span class="fa fa-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="txtPassword">
          <span class="fa fa-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="checkbox icheck">
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="btnIngresar" id="btnIngresar" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <?php
        $ingresar = new MvcController();
        $ingresar -> ingresoUsuarioController();
        ?>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

</body>
</html>

