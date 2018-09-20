
<?php
//ver si hay una sesion existente
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
	include("../db/connection.php");//Manda llamar la conexión a la base de datos
	$id = $_GET['id'];//Se recibe el id del jugador mediante el metodo GET

    $query = "UPDATE user SET borrado_logico = 1 WHERE id = $id";
    $statement = $pdo->prepare($query);
    if($statement->execute())
    {
      echo "
      <script type='text/javascript'>
        window.location='index.php';
      </script>";
    }
    else
    {
      echo "ERROR en la eliminacion";
    }
	
?>