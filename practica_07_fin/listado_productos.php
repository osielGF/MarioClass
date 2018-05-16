<?php
	require_once('funciones.php');
	contar_productos();
	listado_productos();
?>

<?php include('header.php'); ?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Listado - Productos</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    <div class="row">
      <div class="large-9 columns">
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              	<div class="row">
              		<div align="center">
              			<h1>LISTADO DE PRODUCTOS</h1>	
              		</div>
        					<a href="productos_agregar.php"><input class="button success" type="button" name="btnAgregarNuevo" value="AGREGAR NUEVO"></a>
        					<!--  -->
              		<section class="section">
                         <div class="content" data-slug="panel1">
                            <div class="row">
                                <table>
                                    <thead>
                                        <tr>
                                            <th width="200">ID</th>
                                            <th width="250">Nombre</th>
                                            <th width="250">Precio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i=0;
                                            while($i<$cantidadProductos){ 
                                        ?>
                                            <tr> 
                                                <td><?php echo $listaProductos[$i]['id']?></td>
                                                <td><?php echo $listaProductos[$i]['nombre'];?></td>
                                                <td><?php echo $listaProductos[$i]['precio'];?></td>
                                                <td><a href="actualizar_productos.php?id=<?php echo $listaProductos[$i]['id']; ?>" class="button radius tiny secondary">Actualizar</a></td>
                    							<td><a href="soporte_eliminar.php?id=<?php echo $listaProductos[$i]['id']; ?>" class="button radius tiny secondary" onClick=avoidDeleting();>Eliminar</a></td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                    </section>
                    <!-- Fin de tabla de productos -->

				</div>
            </div>
          </section>
        </div>
      </div>
    </div>
</body>
</html>
<?php include('footer.php'); ?>

<script type="text/javascript">
    function avoidDeleting()
    {
        var msj = confirm("Deseas eliminar este producto?");
        if(msj == false)
        {
            event.preventDefault();
        }
    }
</script>