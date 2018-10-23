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
  <title>Editar Libro</title>
</head>
<body>
</br>
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-6">
      <div class="card card-primary">
        <div class="card-header" style="background-color: #0E0043">
          <h3 class="card-title">Editar Libro</h3>
        </div>
        <!-- /.card-header -->

        <?php
          //crear un bjeto mvc y llamar el controlador
          $editar = new MvcController();
          $editar = $editar -> editarLibrosController();
        ?>
        <!-- form start -->
        <form role="form" method="post">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Titulo:</label>
              <input type="text" style="width: 300px" name="txtTitulo" class="form-control" id="txtTitulo" value="<?php echo $editar["titulo"] ?>" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Autor:</label>
              <input type="text" style="width: 300px" name="txtAutor" class="form-control" id="txtAutor" value="<?php echo $editar["autor"] ?>" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Descripcion:</label>
              <textarea name="txtDescripcion" id="txtDescripcion" class="form-control" rows="5" cols="50" required><?php echo $editar["descripcion"] ?> </textarea>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <input style="background-color: #0E0043" title="Agregar" name="btnEnviar" type="submit" value="GUARDAR" class="btn btn-primary">
            <input style="background-color: #A50103" type="button" name="btnButton" onClick="deletee();" class="btn btn-danger" value="CANCELAR">
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
  $registro -> actualizarLibrosController();
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
        window.location.href = "index.php?action=libros";
      } else {
        swal("Bien hecho, todo sigue aqui!");
      }
    });
  }
</script>

