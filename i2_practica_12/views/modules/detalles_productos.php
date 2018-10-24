<?php
//iniciar la sesion y redireccionar al los productos
error_reporting(0);
    session_start();
  if(!$_SESSION['id']){
    echo "
    <script type='text/javascript'>
      window.location='index.php';
    </script>";
  } 
?>
<div class="row">
    <div class="col-xs-6 col-sm-3">  </div> 
    <div class="col-xs-6 col-sm-6">                                    

        <div class="card">
            <div class="card-header">
                <h1>Detalles de inventario</h1>
                <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>

                <div class="card-header-right">
                    <i class="icofont icofont-spinner-alt-5"></i>
                </div>

            </div>
            <div class="col-sm-12 mobile-inputs">
                <div class="card gallery-desc">
                    <div class="masonry-media">
                        <a class="media-middle" href="#!">
                            <img class="img-fluid" src="views/img/stock.png" alt="masonary">
                        </a>
                    </div>
                    <?php 
                        $det = new MvcController();
                        $res = $det -> getDetallesProductosController();
                    ?>
                    <div class="card-block">
                        <h6 class="job-card-desc">Producto: <?php echo $res["nombre"] ?></h6>
                        <h6 class="job-card-desc">Categoria: <?php echo $res["categoria"] ?></h6>
                        <h6 class="job-card-desc">Cantidad: <?php echo $res["stock"] ?></h6>
                        <p class="text-muted">Aumentar o disminuir cantidad a este producto del inventario.</p>
                        <form method="post">
                         <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Stock:</label>
                                <div class="col-sm-10">
                                    <input type="number" name="txtStock" class="form-control form-control-round  form-txt-danger" placeholder="Ingresa la cantidad" required>
                                </div>
                            </div>
                        <input title="Aumentar" name="btnAumentar" type="submit" value="Aumentar" class=" form-control btn hor-grd btn-grd-primary">
                        <input title="Disminuir" name="btnDisminuir" type="submit" value="Disminuir" class=" form-control btn hor-grd btn-grd-danger">
                        </form>
                    </div>
                    <?php 
                        $aumentarDisminuir = new MvcController();
                        $aumentarDisminuir -> aumentar_disminuirStockController();
                    ?>
                </div>
            </div>
            <br><br>
        </div>
</div>
</div>















 