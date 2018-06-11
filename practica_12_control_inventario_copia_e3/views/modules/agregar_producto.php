<?php
//ver si hay una sesion existente
  error_reporting(0);
  session_start();
  if(!$_SESSION['user']){
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
	<title>Registrar - Producto</title>
</head>
<body>

	<div class="content-wrapper">
	<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">REGISTRAR PRODUCTO</h3>
              </div>
              <div class="col-12">

              <div class="card-body">
                <!-- Color Picker -->
                <div class="form-group">
                	<!--Formulario para los capmos necesarios a llenar como tambien un select dinamico-->
                  <form method="post">
					<input type="text" placeholder="nombre" name="txtNombre" required class="form-control my-colorpicker1">
					</br>
					<input type="text" placeholder="precio de compra" name="txtPrecioCompra" required class="form-control my-colorpicker1">
					</br>
					<input type="text" placeholder="precio de venta" name="txtPrecioVenta" required class="form-control my-colorpicker1">
					</br>
					<input type="text" placeholder="stock" name="txtStock" required class="form-control my-colorpicker1">
					</br>
					Categoria: <select id="select_categorias" name="select_categorias" class="form-control my-colorpicker1">
						<?php
							//cREAR un objeto MVC y accionar el controlador para traer todas las categorias y llenar el select
							$opciones = new MvcController();
							$opciones -> getCategoriasController();
						?>	
					</select>
						<?php
							$mostrarTiendaDelProducto = new MvcController();
							$mostrarTiendaDelProducto -> getTiendaController();
						?>	
					</br>
					<input type="submit" value="Enviar" class="btn btn-success">
					</br>
				</form>
                </div>
                <!-- /.form group -->
              </div>
              <!-- /.card-body -->
            </div>  
            </div>
            <!-- /.card -->
		</div>
</body>
</html>

<?php
	//Crear un objeto mvc y llamar el controlador registro de productos
	$registro = new MvcController();
	$registro -> registroProductosController();
?>

			