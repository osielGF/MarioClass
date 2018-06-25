<?php
//MIOOOOOOO------
class MvcController
{
	#LLAMADA A LA PLANTILLA
	#-------------------------------------
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

	#VISTA DE ALUMNOS
	#------------------------------------
	public function vistaAlumnasController()
	{
		$arrayRespuesta = Datos::vistasModel("alumnas");
		echo '<a href="index.php?action=agregar_alumna"><input type="button" value="AGREGAR ALUMNA" name="btnAgregarAlumna"
			class="btn btn-success" title= "Agregar Alumna"></a></br></br>';
		echo '
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Fecha_Nac</th>
						<th>Grupo</th>
						<th>Editar?</th>
						<th>Eliminar?</th>
					</tr>
				</thead>';
		foreach($arrayRespuesta as $row => $item)
		{
		echo'
			<tbody>
				<tr>
					<td>'.$item["id"].'</td>
					<td>'.$item["nombre"].'</td>
					<td>'.$item["apellido"].'</td>
					<td>'.$item["fecha_nac"].'</td>
					<td>'.$item["grupo"].'</td>
					<td> <a  class="btn btn-primary btn-block btn-flat" href="index.php?action=editar_alumna&id='.$item["id"].'"><i class="fa fa-edit"></i></center> </a> </td>
					
					<td> <button onClick="borrar('.$item["id"].');" class="btn btn-danger" title= "Eliminar alumna"> <i class="fa fa-trash"></i> </button></center> </td>
				</tr>
			</tbody>
			';
		}
		echo '
		<tfoot>
                <tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Fecha_Nac</th>
						<th>Grupo</th>
						<th>Editar?</th>
						<th>Eliminar?</th>
					</tr>
                </tfoot></table> ';
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
                swal("Contraseña correcta", "Alumna eliminado", "success");
                window.location.href = "index.php?action=alumnas&idBorrar="+id;
              }
              else
              {
                swal("Contraseña Incorrecta", "Intente de nuevo", "error");
              }     
          });
        } 
    </script>';
	}

	#REGISTRO DE ALUMNAS
	#-------------------------------------
	public function registroAlumnasController()
	{
		if(isset($_POST["txtNombre"]))
		{
			$datosController = array( "nombre"=>$_POST["txtNombre"], 
								      "apellido"=>$_POST["txtApellido"],
								      "fecha_nac"=>$_POST["txtFecha"],
								      "grupo"=>$_POST["select_grupos"]);

			$respuesta = Datos::registroAlumnasModel($datosController, "alumnas");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=alumnas'
					</script>";
			}
			else
			{
				echo "no jalo";
			}
		}
	}

	#EDITAR PRODUCTOS
	#------------------------------------
	public function editarAlumnasController()
	{
		$datosController = $_GET["id"];
		$respuesta = Datos::editarAlumnasModel($datosController, "alumnas");

		echo'<input type="text" value="'.$respuesta["nombre"].'" name="txtNombre" class="form-control my-colorpicker1">
			</br>	
			 <input type="text" value="'.$respuesta["apellido"].'" name="txtApellido" required class="form-control my-colorpicker1">
			 </br>
			 <input type="date" value="'.$respuesta["fecha_nac"].'" name="txtFecha" required class="form-control my-colorpicker1">
			 ';
	}

	#ACTUALIZAR PRODUCTO
	#------------------------------------
	public function actualizarAlumnasController()
	{
		if(isset($_POST["btnActualizar"]))
		{
			$datosController = array( "nombre"=>$_POST["txtNombre"],
							          "apellido"=>$_POST["txtApellido"],
				                      "fecha_nac"=>$_POST["txtFecha"],
				                      "id"=>$_GET["id"],
				                      "grupo"=>$_POST["select_grupos"]);
			
			$respuesta = Datos::actualizarAlumnasModel($datosController, "alumnas");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=cambioAlumna'
					</script>";
			}
			else
			{
				echo "error";
			}
		}
	}

	#BORRAR ALJUMNA
	#------------------------------------
	public function borrarAlumnasController()
	{
		if(isset($_GET["idBorrar"]))
		{
			$respuesta = Datos::borrarJSModel($_GET["idBorrar"],"alumnas");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=alumnas'
					</script>";
			}
			else
			{
				echo "error";
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
				$_SESSION["user"] = $respuesta["id"];
				$_SESSION["username"] = $respuesta["username"];
				$_SESSION["password"] = $respuesta["password"];
				$_SESSION["email"] = $respuesta["email"];

				echo "<script>
						window.location='index.php?action=alumnas'
					</script>";
			}
			else
			{
				echo "<script>
						window.location='index.php?action=index'
					</script>";
			}
		}
	}

	#VISTA DE GRUPOS
	#------------------------------------
	public function vistaGruposController()
	{
		$arrayRespuesta = Datos::vistasModel("grupos");
		echo '<a href="index.php?action=agregar_grupo"><input type="button" value="AGREGAR GRUPO" name="btnAgregarGrupo"
			class="btn btn-success" title= "Agregar Grupo"></a></br></br>';
		echo '
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Eliminar?</th>
					</tr>
				</thead>';
		foreach($arrayRespuesta as $row => $item)
		{
		echo'
			<tbody>
				<tr>
					<td>'.$item["id"].'</td>
					<td>'.$item["nombre"].'</td>
					<td> <button onClick="borrar('.$item["id"].');" class="btn btn-danger" title= "Eliminar grupo"> 
					<i class="fa fa-trash"></i> </button></center> </td>
				</tr>
			</tbody>
			';
		}
		echo '
		<tfoot>
                <tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Eliminar?</th>
					</tr>
                </tfoot></table> ';
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
                swal("Contraseña correcta", "Grupo eliminado", "success");
                window.location.href = "index.php?action=grupos&idBorrar="+id;
              }
              else
              {
                swal("Contraseña Incorrecta", "Intente de nuevo", "error");
              }     
          });
        } 
    </script>';
	}

	#REGISTRO DE GRUPOS
	#-------------------------------------
	public function registroGruposController()
	{
		if(isset($_POST["txtNombre"]))
		{
			$datosController = array("nombre"=>$_POST["txtNombre"]);

			$respuesta = Datos::registroGruposModel($datosController, "grupos");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=grupos'
					</script>";
			}
			else
			{
				echo "no jalo";
			}
		}
	}

	#TRAER TODAS LOS GRUPOS EXISTENTES
	#------------------------------------
	public function getGruposController()
	{
		$todasCategorias = Datos::getGruposModel("grupos");
		
		foreach($todasCategorias as $row => $item)
		{
		echo '
				<option value="'.$item["nombre"].'"> '.
					$item["nombre"].'
				</option> 
			';
		}
	}

	#TRAER TODAS LOS ALUMNAS EXISTENTES
	#------------------------------------
	public function getAlumnasController()
	{
		$todasCategorias = Datos::getAlumnasModel("alumnas");
		
		foreach($todasCategorias as $row => $item)
		{
		echo '
				<option value="'.$item["nombre"].'"> '.
					$item["nombre"].'
				</option> 
			';
		}
	}

	#BORRAR GRUPOS
	#------------------------------------
	public function borrarGruposController()
	{
		if(isset($_GET["idBorrar"]))
		{
			$borrarAlumnas = Datos::borrarAlumnasDeGrupoTalModel($_GET["idBorrar"],"alumnas");
			$respuesta = Datos::borrarJSModel($_GET["idBorrar"],"grupos");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=grupos'
					</script>";
			}
			else
			{
				echo "error";
			}
		}
	}

	#VISTA DE PAGOS
	#------------------------------------
	public function vistaPagosController()
	{
		$arrayRespuesta = Datos::vistasModel("pagos");
		echo '
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Id</th>
						<th>Grupo</th>
						<th>Alumno</th>
						<th>Nombre_mama</th>
						<th>Apellido_mama</th>
						<th>Fecha_pago</th>
						<th>Fecha_envio</th>
						<th>Img_folio</th>
						<th>Folio</th>
						';
						if($_SESSION["username"]=="admin")
						{
							echo '
							<th>Editar?</th>
							<th>Eliminar?</th>
							<th>Ver?</th>	';
						}

						echo '
					</tr>
				</thead>';
		foreach($arrayRespuesta as $row => $item)
		{
		echo'
			<tbody>
				<tr>
					<td>'.$item["id"].'</td>
					<td>'.$item["grupo"].'</td>
					<td>'.$item["alumna"].'</td>
					<td>'.$item["nombre_mama"].'</td>
					<td>'.$item["apellido_mama"].'</td>
					<td>'.$item["fecha_pago"].'</td>
					<td>'.$item["fecha_envio"].'</td>
					<td>'.$item["imagen_folio"].'</td>
					<td>'.$item["folio"].'</td>';
					if($_SESSION["username"]=="admin")
						{
							echo '
							<td> <a  class="btn btn-primary btn-block btn-flat" href="index.php?action=editar_pago&id='.$item["id"].'"><i class="fa fa-edit"></i></center> </a> </td>
							<td> <button onClick="borrar('.$item["id"].');" class="btn btn-danger" title= "Eliminar pago"> 
							<i class="fa fa-trash"></i> </button></center> </td>
							<td> <a  class="btn btn-primary btn-block btn-flat" href="'.$item["imagen_folio"].'"><i class="fa fa-edit"></i></center> </a> </td>';
						}
						echo '
				</tr>
			</tbody>
			';
		}
		echo '
		</table> ';
		echo '<script type="text/javascript">
        var password="'.$_SESSION["password"].'";
        function borrar(id)
        {
          swal("Ingrese su contraseña:", 
          {
            content: "input",
          })
          .then((value) => 
          {
              if (value==password) 
              {
                swal("Contraseña correcta", "Pago eliminado", "success");
                window.location.href = "index.php?action=pagos&idBorrar="+id;
              }
              else
              {
                swal("Contraseña Incorrecta", "Intente de nuevo", "error");
              }     
          });
        } 
    </script>';
	}

	#EDITAR PAGOS
	#------------------------------------
	public function editarPagosController()
	{
		$datosController = $_GET["id"];
		$respuesta = Datos::editarPagosModel($datosController, "pagos");

		echo'ID: <input type="text" value="'.$respuesta["id"].'" name="txtIdPago" class="form-control my-colorpicker1">
			</br>	
			 Grupo: <input type="text" value="'.$respuesta["grupo"].'" name="txtIdGrupo" required class="form-control my-colorpicker1">
			 </br>
			 Alumno: <input type="text" value="'.$respuesta["alumna"].'" name="txtAlumno" required class="form-control my-colorpicker1">
			 </br>
			 MADRE: <input type="text" value="'.$respuesta["nombre_mama"].'" name="txtNombreMama" required class="form-control my-colorpicker1">
			 </br>
			 APELLIDO MADRE: <input type="text" value="'.$respuesta["apellido_mama"].'" name="txtApellidoMama" required class="form-control my-colorpicker1">
			 </br>
			 FECHA PAGO: <input type="date" value="'.$respuesta["fecha_pago"].'" name="txtFechaPago" required class="form-control my-colorpicker1">
			 </br>
			 FECHA ENVIO: <input type="date" value="'.$respuesta["fecha_envio"].'" name="txtFechaEnvio" required class="form-control my-colorpicker1">
			 </br>
			 IMG FOLIO: <input type="file" value="'.$respuesta["imagen_folio"].'" name="txtImgFolio" required class="form-control my-colorpicker1">
			 </br>
			 FOLIO: <input type="text" value="'.$respuesta["folio"].'" name="txtFolio" required class="form-control my-colorpicker1">
			 ';
	}

	#ACTUALIZAR PAGOS
	#------------------------------------
	public function actualizarPagosController()
	{
		if(isset($_POST["btnActualizar"]))
		{
			$datosController = array( "id_grupo"=>$_POST["txtIdGrupo"],
							          "id_alumno"=>$_POST["txtAlumno"],
				                      "nombre_mama"=>$_POST["txtNombreMama"],
				                      "apellido_mama"=>$_POST["txtApellidoMama"],
				                      "fecha_pago"=>$_POST["txtFechaPago"],
				                      "fecha_envio"=>$_POST["txtFechaEnvio"],
				                      "imagen_folio"=>$_POST["txtImgFolio"],
				                      "folio"=>$_POST["txtFolio"],
				                      "id"=>$_GET["id"]);
			
			$respuesta = Datos::actualizarPagosModel($datosController, "pagos");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=cambioPago'
					</script>";
			}
			else
			{
				echo "error";
			}
		}
	}

	#BORRAR PAGOS
	#------------------------------------
	public function borrarPagosController()
	{
		if(isset($_GET["idBorrar"]))
		{
			$respuesta = Datos::borrarJSModel($_GET["idBorrar"],"pagos");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=pagos'
					</script>";
			}
			else
			{
				echo "error";
			}
		}
	}

	#REGISTRO DE PAGOS
	#-------------------------------------
	public function registroPagosController()
	{
		if(isset($_POST["registroo"]))
		{
			$dir = "views/imgs/";
			$file = $_FILES["txtImagenFolio"]["name"];
			$dirFile = $dir.$file;
			$tempFile = $_FILES["txtImagenFolio"]["tmp_name"];
			echo $dirFile;
			move_uploaded_file($tempFile,$dirFile);

			$datosController = array( 	"grupo"=>$_POST["select_grupos"], 
										"alumna"=>$_POST["select_alumnas"],
										"nombre_mama"=>$_POST["txtNombreMama"], 
								      	"apellido_mama"=>$_POST["txtApellido"],
								      	"fecha_pago"=>$_POST["txtFechaPago"],
								      	"fecha_envio"=>date("Y/m/d"),
								      	"imagen_folio"=>$dirFile,
								      	"folio"=>$_POST["txtFolio"]);

			$respuesta = Datos::registroPagosModel($datosController, "pagos");
			if($respuesta == "success")
			{
				echo '<script type="text/javascript">
				                swal("REGISTRO EXITOSO", "Pago guardado", "success");
				    </script>';
				echo "<script>
						window.location='index.php?action=pagos'
					</script>";
			}
			else
			{
				echo "no jalo";
			}
		}
	}

	#TRAER GRUPO QUE TIENE UNA ALUMNA
	#------------------------------------
	public function traerGrupoDeAlumnaController()
	{
		$datosController = $_GET["id"];
		$respuesta = Datos::traerGrupoDeAlumnaModel($datosController, "alumnas");
		if($respuesta)
		{
			echo '
					<option value="'.$respuesta["grupo"].'"> '.
						$respuesta["grupo"].'
					</option> 
				';
		}
		else
		{
			echo "no jaloooooooooooooo";
		}
	}



	
}
?>