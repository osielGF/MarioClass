<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="views/plugins/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="views/dist/css/adminlte.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="views/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="views/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="views/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="views/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="views/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="views/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="views/plugins/datatables/dataTables.bootstrap4.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="views/dist/css/adminlte.min.css">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="views/sweetalert/dist/sweetalert.css">
    <script type="text/javascript" src="views/sweetalert/dist/sweetalert.js"></script>
    <script type="text/javascript" src="views/sweetalert/dist/sweetalert.min.js"></script>




</head>

<body class="hold-transition sidebar-mini">

  <!-- Content Wrapper. Contains page content -->
<?php
        //se validan los tipos de action que hay ya que existen dos menus de navegacion diferentes
       if(isset($_GET["action"])){
              include("modules/navegacion.php");
         }
      ?>
      <?php 
        $mvc = new MvcController();
        $mvc -> enlacesPaginasController();
      ?> 

<!-- jQuery -->
<script src="views/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="views/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="views/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="views/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="views/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="views/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="views/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="views/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="views/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="views/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="views/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="views/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="views/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="views/dist/js/demo.js"></script>
<script src="views/plugins/datatables/jquery.dataTables.js"></script>
<script src="views/plugins/datatables/dataTables.bootstrap4.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

<script src="views/js/sweetalert.min.js"></script>


</body>
</html>

<script type="text/javascript">
  function funcion_salir()
  {
      var url = document.getElementById("salir_salir").href;
      event.preventDefault();
      swal({
        title: "Seguro que desea salir?",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "Cancelar",
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Si, Eliminar",
        closeOnConfirm: false
      },
      function()
      {
        window.location=url;
      });
  }
</script>






<script>
  $("#example1").DataTable();
    
   
</script>
