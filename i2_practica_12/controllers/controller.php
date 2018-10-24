<?php
class MvcController
{
	#LLAMADA A LA PLANTILLA
	#-------------------------------------
    private $_dato;

	public function pagina()
	{	
		 session_start();
        //Include se utiliza para invocar el arhivo que contiene el codigo HTML
        
        if( isset($_SESSION['id']) ){
            include "views/template.php";
        }else{
            include 'views/modules/ingresar.php';
        }
		
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

	public function getCategoriaByIdController($id)
	{
			$respuesta = Datos::getCategoriaByIdModel("categorias",$id);
			return $respuesta;
	}

	public function vistaProductosController()
	{
			$arrayRespuesta = Datos::vistaProductosModel("productos");
			foreach($arrayRespuesta as $row => $item)
			{
				$nomCate = Datos::getNombreCategoriaByIdModel("categorias",$item["categoria"]);
			echo'
					<tr>
						<td>'.$item["id_producto"].'</td>
						<td>'.$item["codigo"].'</td>
						<td>'.$item["nombre"].'</td>
						<td>'.$nomCate["nombre"].'</td>
						<td>'.$item["precio"].'</td>
						<td>'.$item["stock"].'</td>
						<td> <a title="Editar" href="index.php?action=editar_productos&id='.$item["id_producto"].'"> 
						    <button class="btn hor-grd btn-grd-warning "><i class="fa fa-edit"></i> Editar</button>
						     </a> 
						</td>
						<td> <a title="detalles" href="index.php?action=detalles_productos&id='.$item["id_producto"].'"> 
						    <button class="btn hor-grd btn-grd-primary "><i class="fa fa-edit"></i> Detalles</button>
						     </a> 
						</td>
						<td> <button title="Borrar" onClick="borrar('.$item["id_producto"].');" class="btn hor-grd btn-grd-danger " title= "Eliminar Libro"> 
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
		                window.location.href = "index.php?action=listado_productos&idBorrar="+id;
		              }
		              else
		              {
		                swal("Contraseña Incorrecta", "Intente de nuevo", "error");
		              }     
		          });
		        } 
		    </script>';
	} 

	public function vistaCategoriasController()
	{
			$arrayRespuesta = Datos::vistaCategoriasModel("categorias");
			foreach($arrayRespuesta as $row => $item)
			{
			echo'
					<tr>
						<td>'.$item["id_categoria"].'</td>
						<td>'.$item["nombre"].'</td>
						<td>'.$item["descripcion"].'</td>
						<td>'.$item["fecha_registrada"].'</td>
						<td> <a title="Editar" href="index.php?action=editar_categorias&id='.$item["id_categoria"].'"> 
						    <button class="btn hor-grd btn-grd-warning "><i class="fa fa-edit"></i> Editar</button>
						     </a> 
						</td>
						<td> <button title="Borrar" onClick="borrar('.$item["id_categoria"].');" class="btn hor-grd btn-grd-danger " title= "Eliminar Libro"> 
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
		                swal("Contraseña correcta", "Categoria eliminada Exitosamente", "success");
		                window.location.href = "index.php?action=listado_categorias&idBorrar="+id;
		              }
		              else
		              {
		                swal("Contraseña Incorrecta", "Intente de nuevo", "error");
		              }     
		          });
		        } 
		    </script>';
	} 

	public function vistaUsuariosController()
	{
			$arrayRespuesta = Datos::vistaUsuariosModel("usuarios");
			foreach($arrayRespuesta as $row => $item)
			{
			echo'
					<tr>
						<td>'.$item["id_usuario"].'</td>
						<td>'.$item["nombre"].'</td>
						<td>'.$item["apellido"].'</td>
						<td>'.$item["username"].'</td>
						<td>'.$item["email"].'</td>
						<td>'.$item["fecha_registro"].'</td>
						<td> <a title="Editar" href="index.php?action=editar_usuarios&id='.$item["id_usuario"].'"> 
						    <button class="btn hor-grd btn-grd-warning "><i class="fa fa-edit"></i> Editar</button>
						     </a> 
						</td>
						<td> <button title="Borrar" onClick="borrar('.$item["id_usuario"].');" class="btn hor-grd btn-grd-danger " title= "Eliminar Libro"> 
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
		                swal("Contraseña correcta", "Usuario eliminado Exitosamente", "success");
		                window.location.href = "index.php?action=listado_usuarios&idBorrar="+id;
		              }
		              else
		              {
		                swal("Contraseña Incorrecta", "Intente de nuevo", "error");
		              }     
		          });
		        } 
		    </script>';
	} 

	public function getCategoriasController()
	{
		$todasCarreras = Datos::getCategoriasModel("categorias");
		
		foreach($todasCarreras as $row => $item)
		{
		echo '
				<option value="'.$item["id_categoria"].'"> '.
					$item["nombre"].'
				</option> 
			';
		}
	}

	#REGISTRO DE producto
	#-------------------------------------
	public function agregarProductosController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "codigo"=>$_POST["txtCodigo"],
									  "nombre"=>$_POST["txtNombre"],
									  "categoria"=>$_POST["select_categorias"],
									  "precio"=>$_POST["txtPrecio"],
									  "stock"=>$_POST["txtStock"]);

			$respuesta = Datos::agregarProductosModel($datosController, "productos");
			if($respuesta == "success")
			{
				 
				echo '<script type="text/javascript">
						alert("Producto Agregado Exitosamente!");
					 </script>';

					 echo '<script type="text/javascript">
						window.location.href = "index.php?action=listado_productos";
					</script>';	

			}
			else
			{
				echo "Error";
			}
		}
	}

	public function agregarCategoriasController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "nombre"=>$_POST["txtNombre"],
									  "descripcion"=>$_POST["txtDescripcion"],
									  "fecha_registrada"=>date('Y/m-d'));

			$respuesta = Datos::agregarCategoriasModel($datosController, "categorias");
			if($respuesta == "success")
			{
				 
				echo '<script type="text/javascript">
						alert("Categoria Agregada Exitosamente!");
					 </script>';

					 echo '<script type="text/javascript">
						window.location.href = "index.php?action=listado_categorias";
					</script>';	

			}
			else
			{
				echo "Error";
			}
		}
	}

	public function agregarUsuariosController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "nombre"=>$_POST["txtNombre"],
									  "apellido"=>$_POST["txtApellido"],
									  "username"=>$_POST["txtUsername"],
									  "email"=>$_POST["txtEmail"],
									  "password"=>$_POST["txtPassword"],
									  "fecha_registro"=>date('Y/m-d'));

			$respuesta = Datos::agregarUsuariosModel($datosController, "usuarios");
			if($respuesta == "success")
			{
				 
				echo '<script type="text/javascript">
						alert("Usuario Agregado Exitosamente!");
					 </script>';

					 echo '<script type="text/javascript">
						window.location.href = "index.php?action=listado_usuarios";
					</script>';	

			}
			else
			{
				echo "Error";
			}
		}
	}

	public function aumentar_disminuirStockController()
	{
		if(isset($_POST["btnAumentar"]))
		{
			$datosController = array( "stock"=>$_POST["txtStock"]);
			$respuesta = Datos::aumentarStockModel($datosController,$_GET["id"]);
			if($respuesta == "success")
			{
				echo '<script type="text/javascript">
						alert("Stock Aumentado Exitosamente!");
					 </script>';

					 echo '<script type="text/javascript">
						window.location.href = "index.php?action=listado_productos";
					</script>';	
			}
			else
			{
				echo "Error";
			}
		}
		else if(isset($_POST["btnDisminuir"]))
		{

		}
	}

	public function actualizarProductosController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "codigo"=>$_POST["txtCodigo"],
									  "nombre"=>$_POST["txtNombre"],
									  "categoria"=>$_POST["select_categorias"],
									  "precio"=>$_POST["txtPrecio"],
									  "stock"=>$_POST["txtStock"],
									  "id_producto"=>$_GET["id"]);

			$respuesta = Datos::actualizarProductosModel($datosController, "productos");
			if($respuesta == "success")
			{
				 
				echo '<script type="text/javascript">
						alert("Producto Actualizado Exitosamente!");
					 </script>';

					 echo '<script type="text/javascript">
						window.location.href = "index.php?action=listado_productos";
					</script>';	
			}
			else
			{
				echo "Error";
			}
		}
	}

	public function actualizarCategoriasController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "nombre"=>$_POST["txtNombre"],
									  "descripcion"=>$_POST["txtDescripcion"],
									  "fecha_registrada"=>$_POST["txtFecha"],
									  "id_categoria"=>$_GET["id"]);

			$respuesta = Datos::actualizarCategoriasModel($datosController, "categorias");
			if($respuesta == "success")
			{
				 
				echo '<script type="text/javascript">
						alert("Categoria Actualizado Exitosamente!");
					 </script>';

					 echo '<script type="text/javascript">
						window.location.href = "index.php?action=listado_categorias";
					</script>';	
			}
			else
			{
				echo "Error";
			}
		}
	}

	public function actualizarUsuariosController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "nombre"=>$_POST["txtNombre"],
									  "apellido"=>$_POST["txtApellido"],
									  "username"=>$_POST["txtUsername"],
									  "email"=>$_POST["txtEmail"],
									  "password"=>$_POST["txtPassword"],
									  "fecha_registro"=>$_POST["txtFecha"],
									  "id_usuario"=>$_GET["id"]);

			$respuesta = Datos::actualizarUsuariosModel($datosController, "usuarios");
			if($respuesta == "success")
			{
				 
				echo '<script type="text/javascript">
						alert("Usuario Actualizado Exitosamente!");
					 </script>';

					 echo '<script type="text/javascript">
						window.location.href = "index.php?action=listado_usuarios";
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

			$ifDuplicado = Datos::ifDuplicadoModel($datosController, "usuarios");
			if($ifDuplicado["username"]!=$_POST["txtUsername"])
			{
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
					echo "Error en registro de usuario";
				}
			}
			else
			{
				echo '<script type="text/javascript">
							alert("Este nombre de usuario ya existe!");
						 </script>';
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
				$_SESSION["apellido"] = $respuesta["apellido"];
				$_SESSION["username"] = $respuesta["username"];
				$_SESSION["email"] = $respuesta["email"];
				$_SESSION["password"] = $respuesta["password"];
				$_SESSION["fecha_registro"] = $respuesta["fecha_registro"];
				$_SESSION["foto"] = $respuesta["foto"];

				echo "<script>
						window.location='index.php?action=dashboard'
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

	public function editarProductosController()
	{
		if(isset($_GET["id"]))
		{
			$id = $_GET["id"];
			$respuesta = Datos::editarProductosModel($id,"productos");
			return $respuesta;
		}
	}

	public function editarCategoriasController()
	{
		if(isset($_GET["id"]))
		{
			$id = $_GET["id"];
			$respuesta = Datos::editarCategoriasModel($id,"categorias");
			return $respuesta;
		}
	}

	public function editarUsuariosController()
	{
		if(isset($_GET["id"]))
		{
			$id = $_GET["id"];
			$respuesta = Datos::editarUsuariosModel($id,"usuarios");
			return $respuesta;
		}
	}

	public function getDetallesProductosController()
	{
		if(isset($_GET["id"]))
		{
			$id = $_GET["id"];
			$respuesta = Datos::getDetallesProductosModel($id,"productos");
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

	#BORRAR productos CONTROLLER
	#------------------------------------
	public function borrarProductosController()
	{
		if(isset($_GET["idBorrar"]))
		{
			$respuesta = Datos::borrarProductosModel($_GET["idBorrar"],"productos");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=listado_productos'
					</script>";
			}
			else
			{
				echo "error";
			}
		}
	} 

	public function borrarCategoriasController()
	{
		if(isset($_GET["idBorrar"]))
		{
			$respuesta = Datos::borrarCategoriasModel($_GET["idBorrar"],"categorias");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=listado_categorias'
					</script>";
			}
			else
			{
				echo "error";
			}
		}
	} 

	public function borrarUsuariosController()
	{
		if(isset($_GET["idBorrar"]))
		{
			$respuesta = Datos::borrarUsuariosModel($_GET["idBorrar"],"usuarios");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=listado_usuarios'
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