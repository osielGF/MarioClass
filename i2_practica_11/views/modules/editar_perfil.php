<?php
//iniciar la sesion y redireccionar al los productos
error_reporting(0);
    session_start();
  if(!$_SESSION['id']){
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
  <title>Editar Perfil</title>

</head>
<body class="hold-transition sidebar-mini">
</br>
<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-6">
    <div class="card card-primary card-outline">
      <div class="card-body box-profile">
        <h3 class="profile-username text-center">Sistema de Control de Libros</h3>

        <p class="text-muted text-center">EDITAR PERFIL</p>

        <form method="post">  
          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b>Nombre:</b>
              <div class="form-group has-feedback">
                <input type="text" class="form-control" value="<?php echo $_SESSION["nombre"] ?>" name="txtNombre" required>
              </div>
            </li>
            <li class="list-group-item">
              <b>Nombre de usuario:</b>
              <div class="form-group has-feedback">
                <input type="text" class="form-control" value="<?php echo $_SESSION["username"] ?>" name="txtUsername" required>
              </div>
            </li>
            <li class="list-group-item">
              <b>Contraseña:</b> 
              <div class="form-group has-feedback">
                <input type="password" class="form-control" value="<?php echo $_SESSION["password"] ?>" name="txtPassword" required>
              </div>
            </li>
          </ul>
          <input style="background-color: #0E0043" title="Agregar" type="submit" name="btnEnviar" class="btn btn-primary btn-block" value="Guardar">
        </form>
        <?php 
          $editarPerfil = new MvcController();
          $editarPerfil -> actualizarPerfilController();
        ?>
      </div>
      <!-- /.card-body -->
    </div>
  </div>  
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

  <!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>

</html>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>


<script type="text/javascript">
  window.onload = function() {
  document.getElementById("n3").style.background='#53585A';
  }
</script>