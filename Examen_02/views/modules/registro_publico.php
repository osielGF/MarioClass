<?php

?>
<!--cuerpo de la pagina-->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>REGISTRO - PUBLICO</title>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header" style="background-color: purple">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="color: white">DANZLIFE</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <a href="index.php?action=registro_publico"> <li style="color: white" class="breadcrumb-item active">REGISTRAR PAGO</li> </a>
             <a href="index.php?action=pagos"> <li style="color: white" class="breadcrumb-item active">/ VER LUGARES   </li> </a>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-10">
          <div class="card">
            <div class="card-header">
              <div class="float-left">
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                  <form method="post" enctype="multipart/form-data">
                    Seleccionar Grupo: <select id="select_grupo" name="select_grupos" class="form-control my-colorpicker1">
                      <?php
                        //cREAR un objeto MVC y accionar el controlador para traer todas las categorias y llenar el select
                        $opciones = new MvcController();
                        $opciones -> getGruposController();
                      ?>  
                    </select>
                    </br>
                    Seleccionar Alumna: <select id="select_alumnas" name="select_alumnas"  class="form-control my-colorpicker1">
                      <?php
                        //cREAR un objeto MVC y accionar el controlador para traer todas las categorias y llenar el select
                        $opciones = new MvcController();
                        $opciones -> getAlumnasController();
                      ?>  
                    </select>
                    </br>
                    Nombre: <input type="text" placeholder="Nombre de la madre" name="txtNombreMama" required class="form-control my-colorpicker1">
                    </br>
                    Apellido: <input type="text" placeholder="Apellido de la madre" name="txtApellido" required class="form-control my-colorpicker1">
                    </br>
                    Fecha de pago: <input type="date" placeholder="Fecha de pago" name="txtFechaPago" required class="form-control my-colorpicker1">
                    </br>
                    Comprobante de folio: <input type="file" placeholder="Comprobante de folio" name="txtImagenFolio" id="txtImagenFolio" required class="form-control my-colorpicker1">
                    </br>
                    Numero de folio: <input type="number" placeholder="Numero de folio" name="txtFolio" required class="form-control my-colorpicker1">
                    </br>
                    <input type="submit" value="Enviar" id="registroo" name="registroo" class="btn btn-success">
                    </br>
                    <?php
                        //cREAR un objeto MVC y accionar el controlador para traer todas las categorias y llenar el select
                        $registroLibre = new MvcController();
                        $registroLibre -> registroPagosController();
                    ?> 
                  </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
<!-- ./wrapper -->
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



