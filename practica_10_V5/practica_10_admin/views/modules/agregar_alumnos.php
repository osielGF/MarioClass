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
	<title>Agregar alumno</title>
</head>
<body> 
	<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-6">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Agregar alumno</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Matricula:</label>
              <input type="text" style="width: 600px" name="txtMatricula" class="form-control" id="txtMatricula" placeholder="Matricula" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nombre:</label>
              <input type="text" style="width: 600px" name="txtNombre" class="form-control" id="txtNombre" placeholder="Nombre" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Apellido Paterno:</label>
              <input type="text" style="width: 600px" name="txtApellidoPaterno" class="form-control" id="txtApellidoPaterno" placeholder="Apellido Paterno" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Apellido Materno:</label>
              <input type="text" style="width: 600px" name="txtApellidoMaterno" class="form-control" id="txtApellidoMaterno" placeholder="Apellido Materno" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Carrera:</label>
              <select style="width: 200px" id="select_carreras" name="select_carreras" class="form-control my-colorpicker1" required>
                <option value="">Selecciona una carrera</option> 
                <?php
                  //cREAR un objeto MVC y accionar el controlador para traer todas las carreras y llenar el select
                  $opciones = new MvcController();
                  $opciones -> getCarrerasController();
                ?>  
              </select>
            </div> 
            
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <input title="Agregar" name="btnEnviar" type="submit" value="AGREGAR" class="btn btn-primary">
            <input type="button" name="btnButton" onClick="deletee();" class="btn btn-danger" value="CANCELAR">
          </div>
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
	$registro -> registroAlumnosController();
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
        window.location.href = "index.php?action=alumnos";
      } else {
        swal("Bien hecho, todo sigue aqui!");
      }
    });
  }
</script>

