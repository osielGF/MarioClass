<?php require_once('header.php'); ?>
<?php require_once('leerArchivo.php'); 
$total_users = count($datosEmpleado);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div align="center">
		<h1>MAESTROS - LISTADO</h1>	
		<a href="./maestros_alta.php"> <input type="button" name="btnMaestrosAlta" value="DAR DE ALTA PROFESOR" /></a> 	
	</div>
<div class="row">
      <div class="large-9 columns">
          <p>Listado</p>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <?php if($total_users){ ?>
              <table>
                <thead>
                  <tr>
                    <th width="200">ID</th>
                    <th width="250">NO EMPLEADO</th>
                    <th width="250">CARRERA</th>
                    <th width="250">NOMBRE</th>
                    <th width="250">TELEFONO</th>
                    <th width="250">ACCION</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($datosEmpleado as $id => $user ){ ?>
	                  <tr>
	                    <td><?php echo $id ?></td>
	                    <td><?php echo $user['NoEmpleado'] ?>  </td>
	                    <td><?php echo $user['carrera'] ?>    </td>
	                    <td><?php echo $user['nombre'] ?>     </td>
	                    <td><?php echo $user['telefono'] ?>   </td>
	                    <td><a href="./key.php?id= <?php echo $id;?> " class="button radius tiny secondary">Ver detalles</a></td>
	                  </tr>
                  <?php } ?>
                  <tr>
                    <td colspan="4"><b>Total de registros: </b> <?php echo $total_users; ?></td>
                  </tr>
                </tbody>
              </table>
              <?php }else{ ?>
              No hay registros
              <?php } ?>
            </div>
          </section>
        </div>
      </div>
    </div>
<?php require_once('footer.php'); ?>