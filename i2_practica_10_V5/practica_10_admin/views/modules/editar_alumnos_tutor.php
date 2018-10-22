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

            <?php
                //crear un bjeto mvc y llamar el controlador editar para usuarios
                $editar = new MvcController();
                $resp = $editar -> editarAlumnosController();
              ?>

<!--cuerpo de la pagina-->
<!DOCTYPE html>
<html>
<head>
  <title>Editar alumno</title>
</head>
<body> 
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-6">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Editar tutor de alumno:  <?php echo $resp['nombre']." ".$resp['a_paterno']." ".$resp['a_materno'];?> </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Profesor:</label>
              <select style="width: 300px" id="select_profesores" name="select_profesores" class="form-control my-colorpicker1" >
                <?php
                  //Traer el nombre de la profesor por el id para mostrarlo en el select como primera opcion
                  $opciones = new MvcController();
                  $nombre = $opciones -> getProfesorPorIdController($resp['id_profesor']);
                ?>  
                <option value="<?php echo $resp['id_profesor']?>"> <?php echo $nombre?> </option> 
                <?php
                  //cREAR un objeto MVC y accionar el controlador para traer todas las carreras y llenar el select
                  $opciones = new MvcController();
                  $opciones -> getProfesoresCarreraController($resp["id_carrera"]);
                ?>  
                <option value="">Selecciona un profesor</option> 
              </select>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <input title="Agregar" name="btnEnviar" type="submit" value="ACTUALIZAR" class="btn btn-primary">
            <input type="button" name="btnButton" onClick="deletee();" class="btn btn-danger" value="CANCELAR">
          </div>
        </form>
        <?php
          //Actualizar alumno
          $actualizar = new MvcController();
          $actualizar -> registroActualizarTutorController($resp["id_alumno"]);
        ?>  
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

