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


<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Practica 06- Ejercicio 2</title>
        <link rel="stylesheet" href="../css/foundation.css" />
        <script src="../js/vendor/modernizr.js"></script>
    </head>
    <body>
    <!-- Llaamada al header de la pagina para que se colocque como cabecera al principio de la pagina -->
    <?php require_once('header.php'); ?>

     
        <div class="row">
            <div class="large-12 columns">
                <div class="section-container tabs" data-section align="center">
                    <section class="section">
                        <div class="content" data-slug="panel1">
                            <h2>Equipos Deportivos UPV</h2>
                            <!-- Menu para decidir entre que tipo de deportista elegir -->
                            <a href="football.php" class="button success" style="height:70px;width:300px;border-radius:10px;font-size:40px">FootBall</a><br>
                            <a href="basketball.php" class="button success" style="height:70px;width:300px;border-radius:10px;font-size:40px">BasketBall</a>                
                        </div>
                    </section>
                </div>
            </div>

        </div>
    
        <!-- Llanada al footer para ser colocado hasta al final d la pagina -->
    <?php require_once('footer.php'); ?>
