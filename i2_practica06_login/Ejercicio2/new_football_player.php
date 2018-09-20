
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

  require('utilities.php'); //Llamado al archivo utilities.php el cual incluye las funciones y conexion a la base de datos

  if(isset($_POST['agregar'])){//Se condiciona si se hizo el uso del elemento 'agregar'
    $id = $_POST['id'];//Se recibe el id del jugador mediante el metodo POST
    $name = $_POST['name'];//Se recibe el elemento name mediante el metodo POST
    $position = $_POST['position'];//Se recibe el elemento position mediante el metodo POST
    $carrier = $_POST['carrier'];//Se recibe el elemento carrier mediante el metodo POST
    $email = $_POST['email'];//Se recibe el elemento email mediante el metodo POST
    $sport = "FootBall";//Se declara una variable sport para determinar que es de FoottBall
    

    add($id,$name,$position,$carrier,$email,$sport);//Se ejecuta la funcion add para hacer el registro en la base de datos
    header("location: football.php");//Redireccion al apartado de FootBall
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
        <h3>Agregar nuevo Jugador de FootBall</h3>
        <a href="football.php" class="button">Regresar</a>
        <div class="section-container tabs" data-section>
          <form method="POST">
	          <section class="section">
	            <div class="content" data-slug="panel1">
	            <input type="number" name="id" placeholder="Numero de Dorso" required><br>
	            <input type="text" name="name" placeholder="Nombre" required></br>
              <select name ="position" required>
                <option>Posicion...</option>
                <option value="Portero">Portero</option>
                <option value="Defensa Central">Defensa Central</option>
                <option value="Defensa Lateral">Defensa Lateral</option>
                <option value="Defensa de Carril">Defensa de Carril</option>
                <option value="Defensa de medio campo">Defensa de medio campo</option>
                <option value="Medio Campista Central">Medio Campista Central</option>
                <option value="Medio Campista Externo">Medio Campista Externo</option>
                <option value="Medio Campista Ofensivo">Medio Campista Ofensivo</option>
                <option value="Segundo Delantero">Segundo Delantero</option>
                <option value="Centro Punta">Centro Punta</option>
                <option value="Delantero">Delantero</option>
              </select></br>
              <select name="carrier">
                  <option>Carrera...</option>
                  <option value="Ingenieria en Tecnologias de la Informacion">Ingenieria en Tecnologias de la Informacion</option>
                  <option value="Ingenieria en Tecnologias de la Manufactura">Ingenieria en Tecnologias de la Manufactura</option>
                  <option value="Ingenieria en Mecatronica">Ingenieria en Mecatronica</option>
                  <option value="Ingenieria en Sistemas Automotrices">Ingenieria en Sistemas Automotrices</option>
                  <option value="Licenciatura en Administracion y Gestion de PYMES">Licenciatura en Administracion y Gestion de PYMES</option>

              </select>
              <input type="text" name="email" placeholder="Correo Electronico" required></br>
	            <input type="submit" name="agregar" value="Agregar" class="button success">
	            </div>
	          </section>
          </form>
        </div>
      </div>

    </div>
    

    <?php require_once('footer.php'); ?>