<?php
//ver si hay una sesion existente
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
	<title>Agregar profesor</title>
</head>
<body> 
	<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-6">
      <div class="card card-primary">
        <div align="center" class="card-header">
          <h3 class="card-title">Elegir Tipo de Tutoria</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post">
          <!-- /.card-body -->
        </br></br>
          <div align="center" class="card-footer">
            <a href="index.php?action=agregar_tutorias" class="btn btn-primary"> Individual</a>
            <a href="index.php?action=agregar_tutorias_grupal" class="btn btn-primary"> Grupal</a>
          </div>
          </br></br>
        </form>
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
</html>

<?php
  //crear un bjeto mvc y llamar el controlador registro para usuarios
	$registro = new MvcController();
	$registro -> registroProfesoresController();
?>

<script type='text/javascript'>
  function deletee()
    {
    swal({
      title: "Estas seguro?",
      text: "Se perderan los datos ingresados!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        swal("Regresando!", {
          icon: "success",
        });
        window.location.href = "index.php?action=profesores";
      } else {
        swal("Bien hecho, todo sigue aqui!");
      }
    });
  }
</script>

