
<?php
//ver si hay una sesion existente
  error_reporting(0);
  session_start();
  if(!$_SESSION['u'])
  {
    echo "
    <script type='text/javascript'>
      window.location='../index.php';
    </script>";
  } 
?>

<?php

  include('../db/connection.php');//Llamado al archivo connection.php el cual incluye la conexion a la bd
  $id = $_GET['id'];//Se recibe el id del usuario mediante el metodo GET

  $query = "SELECT * FROM user WHERE id = '$id'";
  $statement = $pdo->prepare($query);
  $statement->execute();
  $res = $statement->fetch(); 

  if(isset($_POST['modificar']))
  {//Se condiciona si se hizo el uso del elemento 'modificar'
    $email = $_POST['email'];//Se recibe el elemento name mediante el metodo POST
    $pass = $_POST['password'];//Se recibe el elemento position mediante el metodo POST
    $status = $_POST['status'];
    $tipoUser = $_POST['tipo_user'];

    $query = "INSERT INTO user(email,password,status_id,user_type_id) VALUES('$email','$pass','$status','$tipoUser')";
    $statement = $pdo->prepare($query);
    if($statement->execute())
    {
      header("location: index.php");//Redireccion al apartado de inicio de usuarios  
    }
    else
    {
      echo "no jalo este rollo";
    }

    
  }
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Curso PHP |  Bienvenidos</title>
    <link rel="stylesheet" href="../css/foundation.css" />
    <script src="../js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>
    <div class="row">
 
      <div class="large-9 columns">
        <p style="font-size:30px">Agregar Nuevo Usuario</p>
        <a href="index.php" class="button">Regresar</a>
        <div class="section-container tabs" data-section>
          <form method="POST">
	          <section class="section">
	            <div class="content" data-slug="panel1">

                  <!--Dentro de cada input, es su value se encuentran etiquetas de PHP, en las cuales se utiliza la funcion echo para impresion, dentro de dicha funcion se imprime el resultado de hacer la consulta para obetener los datos del jugador, mediante los parametros que son el id y el deporte, y asi poder mostrar los datos del jugador-->

	            Correo:<input type="email" name="email" value="<?php echo $res['email']?>" >
	            Contraseña:<input type="text" name="password" value="<?php echo $res['password']?>">
              Estatus:<select name="status">
                  <option value="1">Activo</option>
                  <option value="2">Inactivo</option>
              </select>
              Tipo de Usuario:<select name="tipo_user">
                  <option value="1">Final</option>
                  <option value="2">Admin</option>
              </select>
              <input type="hidden" name="idd" value="<?php echo $res['id']?>"></br>
	            <input type="submit" name="modificar" value="Guardar" class="button success" onclick="alertaAccion()">
	            </div>
	          </section>
          </form>
        </div>
      </div>

    </div>
    

    <?php require_once('footer.php'); ?>
<script type="text/javascript">
  //Funcion para escribir una alerta y validar si se desaea realizar la accion de modificar
      function alertaAccion(){
        var alerta = confirm("Seguro que desea Agregar este usuario?");
        if(alerta == false){
            event.preventDefault();
        }
      }
</script>