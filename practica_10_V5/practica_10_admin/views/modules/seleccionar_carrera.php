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
  <title>Seleccionar Carrera</title>
</head>
<body> 
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-6">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Seleccionar Carrera</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post" action="?action=asignar_tutores">
          <div class="card-body">

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
             
          <!-- /.card-body -->
          <div class="card-footer">
            <input title="Siguiente" name="btnSiguiente" type="submit" value="SIGUIENTE" class="btn btn-primary">
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