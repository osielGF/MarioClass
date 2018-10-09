<?php

	class MvcController
	{
		//Llamar a la plantilla 
		public function plantilla()
		{
			//Include se utiliza para invocar el archivo con el codigo html
			include "Views/template.php";
		}

		public function enlacesPaginasController()
		{
			//Trabajar con los enlaces de las paginas
			//Validar si la variable "action" viene vacia o no, es decir, cuando se abre la pagina por primera vez se debe cargar la vista index.php

			//Si la variable "action " existe en la URL almacenamos el valor de esa variable
			if(isset( $_GET['action']))
			{
				$enlaces = $_GET['action'];
			}
			else
			{
				//Si no existe el action en la URL le asignamos "index"
				$enlaces = "index";
			}
			$respuesta = Paginas::enlacesPaginasModel($enlaces);
			//incluir  la pAgina indicada devuelta por el metodo "enlacesPaginasModel"
			include $respuesta;
	    }

	    //Metodo controller para registrar un usuario
	    public function registroAlumnosController()
	    {
	    	//Si el boton txtRegistrar fue presionado
	    	if(isset($_POST["txtRegistrar"]))
	    	{
		        $dir = "Views/Modules/imgs/";
		        $file = $_FILES["txtFoto"]["name"];
		        $dirFile = $dir.$file;
		        $tempFile = $_FILES["txtFoto"]["tmp_name"];
		        move_uploaded_file($tempFile,$dirFile);

	    		//Obtener mediante POST todos los valores de los campos del formulario llenado
	    		$datosController = array("matricula"=>$_POST["txtMatricula"],
	    								 "nombre"=>$_POST["txtNombre"],
	    								 "carrera"=>$_POST["txtCarrera"],
	    								 "situacion"=>$_POST["txtSituacion"],
	    								 "correo"=>$_POST["txtCorreo"],
	    								 "tutor"=>$_POST["txtTutor"],
	    								 "foto"=>$dirFile);

	    		//Mandar el array asociativo con todos los dtos del usario a registrar al metodo model "registroUsuarioModel" mandandole el array y el nombre de la tabla a operar
	    		$respuesta = Datos::registroAlumnosModel($datosController,"alumnos");

	    		//Dependiendo si fue exitosa la insercion redirige a la vista "registro"	
	    		if($respuesta == "success")
	    		{
					    echo "
					    <script type='text/javascript'>
					      window.location='index.php?action=alumnos';
					    </script>";
	    		}
	    		//de lo contrario manda al login
	    		else
	    		{
	    			echo '<script type="text/javascript">
						window.location.href = "index.php?action=registrar_alumno";
					</script>'; 
	    		}
	    	}
	    }
 
		//Controller para mostrar la vista de todos los usuarios imprimiendo la tabla con todos los usuarios  dando la posibilidad de editarlos o eliminarlos
		public function vistaAlumnosController()
		{
			$arrayRespuesta = Datos::vistaAlumnosModel("alumnos");
			echo '
			<a href="index.php?action=registrar_alumno"> 
				<button class="button" name="btnAgregarAlumo" title= "Agregar Alumno" style="width:250px;height:50px;font-size:17px; border-radius:10px"> REGISTRAR ALUMNO</button>
		    </a>
				<table border="1px">
					<thead>
						<tr>
							<th>Matricula</th>
							<th>Nombre</th>
							<th>Carrera</th>
							<th>Situacion</th>
							<th>Correo</th>
							<th>Tutor</th>
							<th>Foto</th>
							<th>Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>';
			foreach($arrayRespuesta as $row => $item)
			{
			echo'
				<tbody>
					<tr>
						<td>'.$item["matricula"].'</td>
						<td>'.$item["nombre"].'</td>
						<td>'.$item["carrera"].'</td>
						<td>'.$item["situacion"].'</td>
						<td>'.$item["correo"].'</td>
						<td>'.$item["tutor"].'</td>
						<td align="center"><a href="'.$item["foto"].'">Ver foto</a></td>
						<td><a href="index.php?action=editar_alumno&id='.$item["matricula"].'">Editar</a></td>
						<td>
							<a href="index.php?action=alumnos&idBorrar='.$item["matricula"].'">
								<input type="button" value="Eliminar">
							</a>
						</td>
					</tr>
				</tbody>
				';
				
			}
			echo '</table>';
		}

		public function editarAlumnosController()
		{
			$datosController = $_GET["id"]; 
			$respuesta = Datos::editarAlumnosModel($datosController,"alumnos");

			echo '
			<input type="hidden" id="txtMatricula" name="txtMatricula" value="'.$respuesta["matricula"].'" required>
			Nombre:<input type="text" id="txtNombre" name="txtNombre" value="'.$respuesta["nombre"].'" required>
			Carrera:<input type="text" id="txtCarrera" name="txtCarrera" value="'.$respuesta["carrera"].'" required>
			Situacion:<input type="text" id="txtSituacion" name="txtSituacion" value="'.$respuesta["situacion"].'" required>
			Correo:<input type="email" id="txtCorreo" name="txtCorreo" value="'.$respuesta["correo"].'" required>
			Tutor:<input type="text" id="txtTutor" name="txtTutor" value="'.$respuesta["tutor"].'" required>
			<div align="center">
			<img src="'.$respuesta["foto"].'" width="200px">
			</div>
			<input type="file" id="txtFoto" name="txtFoto">

			<input type="hidden" id="dirFoto" name="dirFoto" value="'.$respuesta["foto"].'" required>
			<input type="submit" class="button" id="txtGuardar" name="txtGuardar" value="Guardar">';
		}

		public function actualizarAlumnosController()
		{
			if(isset($_POST["txtGuardar"]))	
			{
				if($_FILES["txtFoto"]["name"]==null)
		      	{
		          	$datosController = array("matricula"=>$_POST["txtMatricula"],
	    								 "nombre"=>$_POST["txtNombre"],
	    								 "carrera"=>$_POST["txtCarrera"],
	    								 "situacion"=>$_POST["txtSituacion"],
	    								 "correo"=>$_POST["txtCorreo"],
	    								 "tutor"=>$_POST["txtTutor"],
	    								 "foto"=>$_POST["dirFoto"]);
		      	}	
		      	else
		      	{
			        $dir = "Views/Modules/imgs/";
		        	$file = $_FILES["txtFoto"]["name"];
		        	$dirFile = $dir.$file;
		        	$tempFile = $_FILES["txtFoto"]["tmp_name"];
		        	move_uploaded_file($tempFile,$dirFile);
		        	$datosController = array("matricula"=>$_POST["txtMatricula"],
	    								 "nombre"=>$_POST["txtNombre"],
	    								 "carrera"=>$_POST["txtCarrera"],
	    								 "situacion"=>$_POST["txtSituacion"],
	    								 "correo"=>$_POST["txtCorreo"],
	    								 "tutor"=>$_POST["txtTutor"],
	    								 "foto"=>$dirFile);
		        }

				

				$respuesta = Datos::actualizarAlumnosModel($datosController,"alumnos");
				if($respuesta=="success")
				{
					echo '<script type="text/javascript">
						window.location.href = "index.php?action=alumnos";
					</script>'; 
				}
				else
				{
					echo 'ERRORR'; 
				}
			}
		}

		public function borrarAlumnosController()
		{
			if(isset($_GET["idBorrar"]))
			{
				$idBorrar = $_GET["idBorrar"];
				$respuesta = Datos::borrarAlumnosModel($idBorrar,"alumnos");
				if($respuesta=="success")
				{
					echo '<script type="text/javascript">
						window.location.href = "index.php?action=alumnos";
					</script>'; 
				}
				else
				{
					echo "Error";
				}
			}
		}


	}
?>