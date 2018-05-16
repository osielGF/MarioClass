<?php  
	require_once('funciones.php');
	contar_ventas();
	listado_ventas();
?>

<?php include('header.php'); ?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Listado - Ventas</title>
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
              			<h1>LISTADO DE VENTAS</h1>	
              		</div>
              		<a href="ventas.php"><input type="button" class="button" name="btnAgregarVenta" value="REALIZAR VENTA"></a>
          			
              		<!-- LISTADO DE VENTAS -->
              		<section class="section">
                         <div class="content" data-slug="panel1">
                            <div class="row">
                                <table>
                                    <thead>
                                        <tr>
                                            <th width="200">ID</th>
                                            <th width="250">Total</th>
                                            <th width="250">Fecha</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i=0;
                                            while($i<$cantidadVentas){ 
                                        ?>
                                            <tr> 
                                                <td><?php echo $lista_ventas[$i]['id']?></td>
                                                <td><?php echo $lista_ventas[$i]['total'];?></td>
                                                <td><?php echo $lista_ventas[$i]['fecha'];?></td>
                    							<td><a href="soporte_eliminar_venta.php?id=<?php echo $lista_ventas[$i]['id']; ?>" class="button radius tiny secondary" onClick=avoidDeleting();>Eliminar</a></td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                    </section>
                    <!-- FIN DE LISTADO -->

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
        var msj = confirm("Deseas eliminar esta venta?");
        if(msj == false)
        {
            event.preventDefault();
        }
    }
</script>