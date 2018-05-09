<?php
  //Llamamos lutilities donde esta el CRUD
  include_once('utilities.php');
  //Almacenamos en la variable res los datos obtenidos por la consulta select y la cantidad de filas
  $res = select_query();
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Curso PHP |  Bienvenidos</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    <?php require_once('header.php'); //Llamamos al header?>
    <div class="row">
      <div class="large-9 columns">
        <h3>Ejemplos de listado en array</h3>
          <p>Listado</p>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <div align="center">  
                <?php //Boton para realizar una nuevo registro en la base de datos, el cual nos reedirecciona a otra pagina con el formulario adecuado ?>
                <a href="agregar.php"><input type="button" name="btnAgregarN" value="Agregar Nuevo"></a>
              </div>
              </br>
              <?php if($res){ ?>
              <table>
                <thead>
                  <tr>
                    <th width="200">ID</th>
                    <th width="250">Nombre</th>
                    <th width="250">Correo</th>
                    <th width="250">Acción</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach( $res as $id => $user ){ //ciclo que estara recorriendo el resultado de la consulta asociandolo a la variable user ?>
                  <tr>
                    <?php //Traemos los datos correspondientes como ID, NOMBRE y CORREO ?>
                    <td><?php echo $user['id'] ?></td>
                    <td><?php echo $user['nombre'] ?></td>
                    <td><?php echo $user['correo'] ?></td>
                    <?php //Agregamos un alert al boton eliminar y vamos agregando el id correspondiente segun el foreach ciclo tanto para eliminar como para actualizar ?>
                    <td><a href="./complementoBorrar.php?id=<?php echo $user['id']; ?>" class="button radius tiny alert" onClick=avoidDeleting();>Eliminar</a>
                    <a href="./actualizar.php?id=<?php echo $user['id']; ?>" class="button radius tiny success">Actualizar</a></td>
                    <?php //Codigo para realizar el alert anteriormente llamado ?>
                    <script type="text/javascript">
                      //Funcion para el alert para confirmacion del usuario a borrar
                      function avoidDeleting()
                      {
                        var msj = confirm("Deseas eliminar este usuario?");
                        if(msj == false)
                        {
                          event.preventDefault();
                        }
                      }
                    </script>
                  </tr>
                  <?php } ?>
                  <tr>
                    <?php //Mostrar cantidad de registros obtenidos en la consulta ?>
                    <td colspan="4"><b>Registros: </b> <?php echo $res->num_rows; ?></td>
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