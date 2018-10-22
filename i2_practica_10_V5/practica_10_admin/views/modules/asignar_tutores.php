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
  <title>Asignar Alumno - Tutor</title>
</head>
<body> 
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-6">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Asignar Alumno - Tutor <?php echo $_POST['select_carreras'];?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post">
          <div class="card-body">


            <label for="exampleInputEmail1">Alumno:</label>
              <select style="width: 600px" id="select_alumnos" name="select_alumnos" class="form-control my-colorpicker1" required>
                <option value="">Selecciona un alumno</option> 
                <?php
                  //cREAR un objeto MVC y accionar el controlador para traer todas las carreras y llenar el select
                  echo "Valor carrera: ".$_POST["select_carrera"];
                  $opciones = new MvcController();
                  $opciones -> getAlumnosTutorController($_POST['select_carreras']);
                ?>  
              </select>
            <div class="form-group">
              <label for="exampleInputEmail1">Profesor:</label>
              <select style="width: 600px" id="select_profesores" name="select_profesores" class="form-control my-colorpicker1" required>
                <option value="">Selecciona un profesor</option> 
                <?php
                  //cREAR un objeto MVC y accionar el controlador para traer todas las carreras y llenar el select
                  $opciones = new MvcController();
                  $opciones -> getProfesoresCarreraController($_POST['select_carreras']);

                ?>  
              </select>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <input title="Agregar" name="btnEnviar" type="submit" value="GUARDAR" class="btn btn-primary">
            <input type="button" name="btnButton" onClick="deletee();" class="btn btn-danger" value="CANCELAR">
          </div>
          <?php
            //crear un bjeto mvc y llamar el controlador registro para usuarios
            $registro = new MvcController();
            $registro -> registroAsignacionTutorController();
          ?>
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
        window.location.href = "index.php?action=alumnos_tutor";
      } else {
        swal("Bien hecho, todo sigue aqui!");
      }
    });
  }
</script>

<script type="text/javascript">
  window.onload = function() {
  document.getElementById("n6").style.background='#53585A';
  }
</script>