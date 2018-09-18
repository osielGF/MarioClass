<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Pracitca 05</title>
        <link rel="stylesheet" href="./css/foundation.css" />
        <script src="./js/vendor/modernizr.js"></script>
    </head>
    <body>
        <!-- Llamar una vez al header cabecera para que se coloque y muestre -->
        <?php require_once('header.php'); ?>
    
        <div class="row">
            <div class="large-12 columns" align="center">
                <div class="section-container tabs" data-section>
                    <section class="section">
                        <div class="content" data-slug="panel1">
                            <div class="row">
                                <!-- Menu para que el usuario decida a que ejercicio ir 1  o 2 -->
                                </br><a href="Ejercicio1/"><input type="button" name="ex1" class="button" value="Ejericicio N°1" style="width:300px;height:100px;font-size:30px; border-radius:10px"></a></br>
                                </br><a href="Ejercicio2/"><input type="button" name="ex2" class="button" value="Ejericicio N°2" style="width:300px;height:100px;font-size:30px; border-radius:10px"></a></br></br></br>
                            </div>
                    </section>
                </div>
            </div>
        </div>
    
        <!-- Llamada al footer que se colocara ahasta el final de la pagina -->
    <?php require_once('footer.php'); ?>