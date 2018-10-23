<?php
class MvcController
{
	#LLAMADA A LA PLANTILLA
	#-------------------------------------
    private $_dato;

	public function pagina()
	{	
		include "views/template.php";
	}
	

	#ENLACES
	#-------------------------------------
	public function enlacesPaginasController()
	{
		if(isset( $_GET['action']))
		{
			$enlaces = $_GET['action'];
		}
		else
		{
			$enlaces = "index";
		}
		$respuesta = Paginas::enlacesPaginasModel($enlaces);
		include $respuesta;
	}

	public function getCantidadLibrosController()
	{
		$respuesta = Datos::getCantidadLibrosModel("libros",$_SESSION["id"]);
		echo $respuesta["cantidad"];
	}

	#VISTA DE LIBROS
	#------------------------------------
	public function vistaLibrosController()
	{
		 
			$arrayRespuesta = Datos::vistaLibrosModel("libros",$_SESSION["id"]);
			echo '
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Titulo</th>
							<th>Autor</th>
							<th>Descripcion</th>
							<th>Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead><tbody>';
			foreach($arrayRespuesta as $row => $item)
			{
			echo'
					<tr>
						<td>'.$item["id_libro"].'</td>
						<td>'.$item["titulo"].'</td>
						<td>'.$item["autor"].'</td>
						<td>'.$item["descripcion"].'</td>
						<td> <a title="Editar" href="index.php?action=editar_libro&id='.$item["id_libro"].'"> 
						    <button style="background-color: #0E0043" class="btn btn-info"><i class="fa fa-edit"></i> Editar</button>
						     </a> 
						</td>
						<td> <button style="background-color: #A50103" title="Borrar" onClick="borrar('.$item["id_libro"].');" class="btn btn-danger" title= "Eliminar Libro"> 
						<i class="fa fa-trash"></i> Eliminar </button></center> </td>
					</tr> ';
			}
			echo '</tbody></table>';
			echo '<script type="text/javascript">
	        var password="'.$_SESSION["password"].'";
	        function borrar(id){
	          swal("Ingrese su contraseña:", {
	            content: "input",
		          })
		          .then((value) => 
		          {
		              if (value==password) 
		              {
		                swal("Contraseña correcta", "Libro eliminado", "success");
		                window.location.href = "index.php?action=libros&idBorrar="+id;
		              }
		              else
		              {
		                swal("Contraseña Incorrecta", "Intente de nuevo", "error");
		              }     
		          });
		        } 
		    </script>';
    	 
    	
	} 

	#REGISTRO DE CARRERA
	#-------------------------------------
	public function registroLibrosController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "titulo"=>$_POST["txtTitulo"],
									  "autor"=>$_POST["txtAutor"],
									  "descripcion"=>$_POST["txtDescripcion"],
									  "id_usuario"=>$_SESSION["id_usuario"]);

			$respuesta = Datos::registroLibrosModel($datosController, "libros");
			if($respuesta == "success")
			{
				 
				echo '<script type="text/javascript">
						alert("libro Agregado Exitosamente!");
					 </script>';

					 echo '<script type="text/javascript">
						window.location.href = "index.php?action=libros";
					</script>';	

			}
			else
			{
				echo "Error";
			}
		}
	}

	#REGISTRO DE CARRERA
	#-------------------------------------
	public function registroUsuariosController()
	{
		if(isset($_POST["btnRegistrarse"]))
		{
			$datosController = array("nombre"=>$_POST['txtNombre'],
									"username"=>$_POST['txtUsername'],
								    "password"=>$_POST['txtPassword']);

			$respuesta = Datos::registroUsuariosModel($datosController, "usuarios");
			if($respuesta == "success")
			{
				 
				echo '<script type="text/javascript">
						alert("Usuario Agregado Exitosamente!");
					 </script>';

					 echo '<script type="text/javascript">
						window.location.href = "index.php";
					</script>';	

			}
			else
			{
				echo "Error";
			}
		}
	}

	public function ingresoUsuarioController()
	{
		if(isset($_POST['btnIngresar']))
		{	
			$datosController = array("username"=>$_POST['txtUsername'],
									"password"=>$_POST['txtPassword']);

			$respuesta = Datos::ingresoUsuarioModel($datosController,"usuarios");
			if($respuesta["username"] == $_POST["txtUsername"] && $respuesta["password"] == $_POST["txtPassword"])
			{
				session_start();
				$_SESSION["id"] = $respuesta["id_usuario"];
				$_SESSION["nombre"] = $respuesta["nombre"];
				$_SESSION["username"] = $respuesta["username"];
				$_SESSION["password"] = $respuesta["password"];
				$_SESSION["id_usuario"] = $respuesta["id_usuario"];

				echo "<script>
						window.location='index.php?action=libros'
					</script>";
			}
			else
			{
				echo "<script>
						window.location='index.php'
					</script>";
			}
		}
	}

	public function editarLibrosController()
	{
		if(isset($_GET["id"]))
		{
			$idLibro = $_GET["id"];
			$respuesta = Datos::editarLibrosModel($idLibro,"libros");
			return $respuesta;
		}
	}

	public function actualizarLibrosController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "titulo"=>$_POST["txtTitulo"],
									  "autor"=>$_POST["txtAutor"],
									  "descripcion"=>$_POST["txtDescripcion"],
									  "id_usuario"=>$_SESSION["id_usuario"],
									  "id_libro"=>$_GET["id"]);

			$respuesta = Datos::actualizarLibrosModel($datosController, "libros");
			if($respuesta == "success")
			{
				 
				echo '<script type="text/javascript">
						alert("Libro Actualizado Exitosamente!");
					 </script>';

					 echo '<script type="text/javascript">
						window.location.href = "index.php?action=libros";
					</script>';	

			}
			else
			{
				echo "Error";
			}
		}
	}

	public function actualizarPerfilController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array("nombre"=>$_POST['txtNombre'],
									"username"=>$_POST['txtUsername'],
								    "password"=>$_POST['txtPassword'],
								    "id_usuario"=>$_SESSION["id"]);
			$respuesta = Datos::actualizarPerfilModel($datosController, "usuarios");
			if($respuesta == "success")
			{
				$datosActualizadosUsuario = Datos::getDatosUsuarioModel();
	 			$_SESSION["id"] = $datosActualizadosUsuario["id_usuario"];
				$_SESSION["nombre"] = $datosActualizadosUsuario["nombre"];
				$_SESSION["username"] = $datosActualizadosUsuario["username"];
				$_SESSION["password"] = $datosActualizadosUsuario["password"];
				$_SESSION["id_usuario"] = $datosActualizadosUsuario["id_usuario"];
				
				echo '<script type="text/javascript">
						alert("Perfil Actualizado Exitosamente!");
					 </script>';

					 echo '<script type="text/javascript">
						window.location.href = "index.php?action=perfil";
					</script>';	
			}
			else
			{
				echo "Error";
			}
		}
	}

	#BORRAR LIBROS CONTROLLER
	#------------------------------------
	public function borrarLibrosController()
	{
		if(isset($_GET["idBorrar"]))
		{
			$respuesta = Datos::borrarLibrosModel($_GET["idBorrar"],"libros");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=libros'
					</script>";
			}
			else
			{
				echo "error";
			}
		}
	} 



	


}
?>