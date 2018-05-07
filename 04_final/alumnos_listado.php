<?php require_once('header.php'); ?>
<?php require_once('leerArchivo.php'); 
$total_users = count($datosAlumno);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div align="center">
		<h1>ALUMNOS - LISTADO</h1>	
		<a href="./alumnos_alta.php"> <input type="button" name="btnAlumnosAlta" value="DAR DE ALTA ALUMNO" /></a> 	
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
                    <th width="250">MATRICULA</th>
                    <th width="250">NOMBRE</th>
                    <th width="250">CARRERA</th>
                    <th width="250">EMAIL</th>
                    <th width="250">TELEFONO</th>
                    <th width="250">ACCION</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($datosAlumno as $id => $user ){ ?>
	                  <tr>
	                    <td><?php echo $id ?></td>
	                    <td><?php echo $user['matricula'] ?>  </td>
	                    <td><?php echo $user['nombre'] ?>     </td>
	                    <td><?php echo $user['carrera'] ?>    </td>
	                    <td><?php echo $user['email'] ?>      </td>
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
