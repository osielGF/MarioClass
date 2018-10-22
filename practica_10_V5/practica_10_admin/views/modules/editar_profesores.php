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
	<title>Editar profesor</title>
</head>
<body> 
	<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-6">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Editar profesor</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post">
          <div class="card-body">
            <div class="form-group">
              <?php
                //crear un bjeto mvc y llamar el controlador editar para usuarios
                $editar = new MvcController();
                $resp = $editar -> editarProfesoresController();
              ?>
              <label for="exampleInputEmail1">Nombre:</label>
              <input type="text" style="width: 600px" name="txtNombre" class="form-control" id="txtNombre"  required value="<?php echo $resp['nombre'] ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Apellido Paterno:</label>
              <input type="text" style="width: 600px" name="txtApellidoPaterno" class="form-control" id="txtApellidoPaterno" required value="<?php echo $resp['aPaterno'] ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Apellido Materno:</label>
              <input type="text" style="width: 600px" name="txtApellidoMaterno" class="form-control" id="txtApellidoMaterno" required value="<?php echo $resp['aMaterno'] ?>">
            </div>

            <?php if ($_SESSION["id_tipo_usuario"]!=2) { ?> 
            <div class="form-group">
              <label for="exampleInputEmail1">Carrera:</label>
              <select style="width: 300px" id="select_carreras" name="select_carreras" class="form-control my-colorpicker1" required >
                <?php
                  //Traer el nombre de la carrera por el id para mostrarlo en el select como primera opcion
                  $opciones = new MvcController();
                  $nombre = $opciones -> getCarreraPorIdController($resp['id_carrera']);
                ?>  
                <option value="<?php echo $resp['id_carrera']?>"> <?php echo $nombre['nombre']?> </option> 
                <?php
                  //cREAR un objeto MVC y accionar el controlador para traer todas las carreras y llenar el select
                  $opciones = new MvcController();
                  $opciones -> getCarrerasController();
                ?>  
              </select>
              
            </div> 
            <?php } ?>

            <div class="form-group">
              <label for="exampleInputEmail1">Email:</label>
              <input type="email" style="width: 600px" name="txtEmail" class="form-control" id="txtEmail"  required value="<?php echo $resp['email'] ?>">
            </div>
            <div class="form-group">
              <input type="hidden" style="width: 600px" name="txtIdUsuarioFK" class="form-control" id="txtIdUsuarioFK" value="<?php echo $resp['id_usuario_FK'] ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Password:</label>
              <input type="password" style="width: 600px" name="txtPassword" class="form-control" id="txtPassword" required value="<?php echo $resp['pass'] ?>">
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <input title="Agregar" name="btnEnviar" type="submit" value="ACTUALIZAR" class="btn btn-primary">
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
	$actualizar = new MvcController();
	$actualizar -> actualizarProfesoresController();
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

