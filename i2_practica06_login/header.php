<?php
//ver si hay una sesion existente
  error_reporting(0);
  session_start();
  if(!$_SESSION['u'])
  {
    echo "
    <script type='text/javascript'>
      window.location='index.php';
    </script>";
  } 
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Practica 06</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
<div class="row">
      <div class="large-3 columns">
        <h2 style="color:#03AFCD">Practica N°6</h2>
      </div>
      <div class="large-9 columns">
        <ul class="right button-group">
          <li><a href="./menu_ejercicios.php" class="button" style="border-radius:10px">Inicio</a></li>
          <li><a href="salir.php" class="button alert" style="border-radius:10px">SALIR</a></li>
        </ul>
      </div>
    </div>


