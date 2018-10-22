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
	<title>Agregar tutoria grupal</title>
</head>
<body> 
	<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-6">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Agregar tutoria grupal</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post">
          <div class="card-body">

            <!-- campos a utilizar por la funcion JavaScript -->
            
            <?php if($_SESSION["id_tipo_usuario"]==1) 
            { ?>
            <div class="form-group">
              <label for="exampleInputEmail1">Profesor:</label>
              <select style="width: 600px" onchange="act();" id="select_profesores" name="select_profesores" class="form-control my-colorpicker1" required>
                <option value="">Selecciona un profesor</option> 
                <?php
                  //cREAR un objeto MVC y accionar el controlador para traer todas las carreras y llenar el select
                  $opciones = new MvcController();
                  $opciones -> getProfesoresController();
                ?>  
              </select>
            </div> 
            <?php 
            } 
            else 
            {  
              ?>
              <label for="exampleInputEmail1">Profesor:</label>
              <select style="width: 600px" id="select_profesores" name="select_profesores" class="form-control my-colorpicker1" hidden="">
                <?php
                  $nombreProfe = new MvcController();
                  $nombre = $nombreProfe -> getDatosProfesorPorIdUsuarioController();
                ?>  
              </select>
              <input readonly style="width: 600px" type="text" value="<?php
                  $nombreProfe = new MvcController();
                  $nombre = $nombreProfe -> arre();
                ?> " class="form-control my-colorpicker1">

            <?php } ?>

            <div class="form-group">
              <label for="exampleInputEmail1">Alumno:</label>
                </select>
                <?php
                  $opciones = new MvcController();
                  if($_SESSION["id_tipo_usuario"]==1) 
                  {
                  ?> 
                    <select style="width: 600px" id="select_alumnos" name="select_alumnos" class="form-control my-colorpicker1" required>
                <option value="">Selecciona un alumno</option> 
                <?php 
                  $opcionesAlumnoss = new MvcController();
                  $respu = $opcionesAlumnoss -> getAlumnosControllerJavaScript();
                ?> 
                    </select>
                    <?php 
                  } 
                ?>

                <?php
                if($_SESSION["id_tipo_usuario"]==3)
                { 
                ?>  
                    <select style="width: 600px" id="select_alumnos" name="select_alumnos" class="form-control my-colorpicker1" required>
                      <option value="">Selecciona un alumno</option>
                    <?php   
                      $opciones -> opcionesAlumnosDeMaestroController();
                    ?>  
                    </select>
                    <?php
                } ?>  
            </div>
            <!-- **************************************************** -->

            <input type="button" name="add" value="Agregar alumno" onclick="agregar();" class="btn btn-primary">
            </br></br>


            <div class="form-group">
              <label for="exampleInputEmail1">Tipo de problema:</label>
              <select style="width: 600px" id="select_tipo_problema" name="select_tipo_problema" class="form-control my-colorpicker1" required>
                <option value="">Selecciona un tipo de problema</option> 
                <?php
                  //cREAR un objeto MVC y accionar el controlador para traer todas las carreras y llenar el select
                  $opciones = new MvcController();
                  $opciones -> getTiposProblemaController();
                ?>  
              </select>
            </div>
            
            <label for="exampleInputEmail1">Descripcion:</label>
            <textarea name="txtDescripcion" id="txtDescripcion" class="form-control" rows="5" cols="50" required> </textarea>
            <h3>---- -----INTEGRANTES:-------- ---- </h3></br>
          <div name="div1" id="div1" style="width: 1000px;">
            <!--  -->

          </div>
          </div>




          






          <!-- /.card-body -->
          <div class="card-footer">
            <input title="Agregar" name="btnEnviar" type="submit" value="AGREGAR" class="btn btn-primary">
            <input type="button" name="btnButton" onClick="deletee();" class="btn btn-danger" value="CANCELAR">
          </div>
        </form>



        <!-- Camo escondido para uso de la funcion JavaScript -->
        <input type="hidden" name="alu" id="alu" value="<?php echo $respu ?>" style="width: 100%;">
        <!-- **************************************************** -->


        
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
	$registro -> registroTutoriasGrupalController();
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
        window.location.href = "index.php?action=tutorias";
      } else {
        swal("Bien hecho, todo sigue aqui!");
      }
    });
  }
</script>

<script type="text/javascript">
    var alumnasA = document.getElementById("alu").value+"";
    function act()
    {
      $('#select_alumnos').empty().trigger("change");
      var g = document.getElementById("select_profesores").value+"";
      var v1 = alumnasA.split("$");
      for (var i = 0; i < v1.length-1; i++) 
      {
        var f = v1[i].split(",");
        if(f[2]===g)
        {
          document.getElementById("select_alumnos").options[document.getElementById("select_alumnos").options.length] = new Option(f[1], f[0]);
        }
      }
    }
</script>


<script type="text/javascript">
      var c = 0;
      var div1 = document.getElementById("div1");
      var br = document.createElement("br");

      function agregar()
      {
            c++;
            var combo = document.getElementById("select_alumnos");
            var selected = combo.options[combo.selectedIndex].text;
            var lArt = document.createElement("input");
            var br2 = document.createElement("br");
            var nombre_prod = selected;

            lArt.setAttribute("value", nombre_prod);
            lArt.setAttribute("style", "width:500px;");
            lArt.setAttribute("class", "n");
            lArt.setAttribute("disabled", "");
            lArt.name = "prod" + c;
            div1.appendChild(br2);
            div1.appendChild(lArt);
      }
    </script>


