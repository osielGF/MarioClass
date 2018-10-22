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

	#VISTA DE ALUMNOS
	#------------------------------------
	public function vistaAlumnosController()
	{
			$arrayRespuesta = Datos::vistaAlumnosModel("alumnos",$_SESSION["id_tipo_usuario"],$_SESSION["id"]);
			echo '
				<table id="example1" class="table table-bordered table-striped datatable">
					<thead>
						<tr>
							<th>Id</th>
							<th>Matricula</th>
							<th>Nombre</th>
							<th>Apellido Pat</th>
							<th>Apellido Mat</th>
							<th>Carrera</th>
							<th>Profesor</th>'; 
							if($_SESSION["id_tipo_usuario"]==1) 
							{ 
							  echo '<th>Editar</th>';
							  }
						  if($_SESSION["id_tipo_usuario"]==1)
						  {
					   		echo '<th>Eliminar</th>';
					   		}
					   		echo '
						</tr>
					</thead><tbody>';
			foreach($arrayRespuesta as $row => $item)
			{
				$nombreCarrera = Datos::getCarreraPorIdModel("carreras",$item["id_carrera"]);
				$nombreProfesor = Datos::getProfesorPorIdModel("profesores",$item["id_profesor"]);
				$nombreProfesor = $nombreProfesor["nombre"].' '.$nombreProfesor["aPaterno"].' '.$nombreProfesor["aMaterno"];

			echo'
				
					<tr>
						<td>'.$item["id_alumno"].'</td>
						<td>'.$item["matricula"].'</td>
						<td>'.$item["nombre"].'</td>
						<td>'.$item["a_paterno"].'</td>
						<td>'.$item["a_materno"].'</td>
						<td>'.$nombreCarrera["nombre"].'</td>
						<td>'.$nombreProfesor.'</td>'; 
						if($_SESSION["id_tipo_usuario"]==1)
						{ 
							echo '
						<td> <a title="Editar" href="index.php?action=editar_alumnos&id='.$item["id_alumno"].'"> 
					        <button class="btn btn-info"><i class="fa fa-edit"></i> Editar</button>
					     </a> 
						</td>';
						}
						if($_SESSION["id_tipo_usuario"]==1)
						  {
						echo '<td> <button title="Borrar" onClick="borrar('.$item["id_alumno"].');" class="btn btn-danger" title= "Eliminar tienda"> 
						<i class="fa fa-trash"></i> Eliminar </button></center> </td>';
						}
					echo '
					</tr> ';
			}
			echo '</tbody></table>';
			echo '<script type="text/javascript">
	        var password="'.$_SESSION["pass"].'";
	        function borrar(id){
	          swal("Ingrese su contraseña:", {
	            content: "input",
		          })
		          .then((value) => 
		          {
		              if (value==password) 
		              {
		                swal("Contraseña correcta", "Alumno eliminado", "success");
		                window.location.href = "index.php?action=alumnos&idBorrar="+id;
		              }
		              else
		              {
		                swal("Contraseña Incorrecta", "Intente de nuevo", "error");
		              }     
		          });
		        } 
		    </script>';

	}
	// MUESTRA LA RELACION DE PROFESORES ALUMNOS
	public function vistaAlumnosProfesorController()
	{
			$arrayRespuesta = Datos::vistaAlumnosProfesorModel("alumnos",$_SESSION["id_tipo_usuario"],$_SESSION["id"]);
			echo '
				<table id="example1" class="table table-bordered table-striped datatable">
					<thead>
						<tr>
							<th>Matricula</th>
							<th>Nombre</th>
							<th>Carrera</th>
							<th>Profesor</th>'; 
							if($_SESSION["id_tipo_usuario"]==1 || $_SESSION["id_tipo_usuario"]==2) 
							{ 
							  echo '<th>Editar</th>';
							  }
						  if($_SESSION["id_tipo_usuario"]!=3)
						  {
					   		echo '<th>Eliminar</th>';
					   		}
					   		echo '
						</tr>
					</thead><tbody>';
			foreach($arrayRespuesta as $row => $item)
			{
				$nombreAlumno = Datos::getAlumnoPorIdModel("alumnos",$item["id_alumno"]);
				$nombreAlumno = $nombreAlumno["nombre"].' '.$nombreAlumno["a_paterno"].' '.$nombreAlumno["a_materno"];
				$nombreCarrera = Datos::getCarreraPorIdModel("carreras",$item["id_carrera"]);
				$nombreProfesor = Datos::getProfesorPorIdModel("profesores",$item["id_profesor"]);
				$nombreProfesor = $nombreProfesor["nombre"].' '.$nombreProfesor["aPaterno"].' '.$nombreProfesor["aMaterno"];

			echo'
				
					<tr>
						<td>'.$item["matricula"].'</td>
						<td>'.$nombreAlumno.'</td>
						<td>'.$nombreCarrera["nombre"].'</td>
						<td>'.$nombreProfesor.'</td>'; 
						if($_SESSION["id_tipo_usuario"]==1 || $_SESSION["id_tipo_usuario"]==2)
						{ 
							echo '
						<td> <a title="Editar" href="index.php?action=editar_alumnos_tutor&id='.$item["id_alumno"].'"> 
					        <button class="btn btn-info"><i class="fa fa-edit"></i> Editar</button>
					     </a> 
						</td>';
						}
						if($_SESSION["id_tipo_usuario"]!=3)
						  {
						echo '<td> <button title="Borrar" onClick="borrar('.$item["id_alumno"].');" class="btn btn-danger" title= ""> 
						<i class="fa fa-trash"></i> Eliminar </button></center> </td>';
						}
					echo '
					</tr> ';
			}
			echo '</tbody></table>';
			echo '<script type="text/javascript">
	        var password="'.$_SESSION["pass"].'";
	        function borrar(id){
	          swal("Ingrese su contraseña:", {
	            content: "input",
		          })
		          .then((value) => 
		          {
		              if (value==password) 
		              {
		                swal("Contraseña correcta", "Tutor actualizado", "success");
		                window.location.href = "index.php?action=alumnos_tutor&idBorrar="+id;
		              }
		              else
		              {
		                swal("Contraseña Incorrecta", "Intente de nuevo", "error");
		              }     
		          });
		        } 
		    </script>';

	}

	public function opcionesAlumnosDeMaestroController()
	{
		$arrayRespuesta = Datos::opcionesAlumnosDeMaestroModel("alumnos",$_SESSION["id"]);
		foreach($arrayRespuesta as $row => $item)
		{
			echo '
				<option value='.$item["id_alumno"].'>'.$item["nombre"].' '.$item["a_paterno"].' '.$item["a_materno"].
				'</option> 
			';	
		}
	}



	#VISTA DE CARRERAS
	#------------------------------------
	public function vistaCarrerasController()
	{
		 
			$arrayRespuesta = Datos::vistaCarrerasModel("carreras");
			echo '
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Nombre</th>'; 
							if($_SESSION["id_tipo_usuario"]==1) { 
								echo '<th>Editar</th>
								<th>Eliminar</th>';
							}
						echo '</tr>
					</thead><tbody>';
			foreach($arrayRespuesta as $row => $item)
			{
			echo'
				
					<tr>
						<td>'.$item["id_carrera"].'</td>
						<td>'.$item["nombre"].'</td>'; 
							if($_SESSION["id_tipo_usuario"]==1) 
							{ 
								echo '
								<td> <a title="Editar" href="index.php?action=editar_carreras&id='.$item["id_carrera"].'"> 
							        <button class="btn btn-info"><i class="fa fa-edit"></i> Editar</button>
							     </a> 
								</td>
								<td> <button title="Borrar" onClick="borrar('.$item["id_carrera"].');" class="btn btn-danger" title= "Eliminar tienda"> 
								<i class="fa fa-trash"></i> Eliminar </button></center> </td>
								</tr> ';
							}
			}
			echo '</tbody></table>';
			echo '<script type="text/javascript">
	        var password="'.$_SESSION["pass"].'";
	        function borrar(id){
	          swal("Ingrese su contraseña:", {
	            content: "input",
		          })
		          .then((value) => 
		          {
		              if (value==password) 
		              {
		                swal("Contraseña correcta", "Carrera eliminado", "success");
		                window.location.href = "index.php?action=carreras&idBorrar="+id;
		              }
		              else
		              {
		                swal("Contraseña Incorrecta", "Intente de nuevo", "error");
		              }     
		          });
		        } 
		    </script>';
    	 
    	
	}

	#VISTA DE TUTORIAS
	#------------------------------------
	public function vistaTutoriasController()
	{
			$arrayRespuesta = Datos::vistaTutoriasModel("sesion_tutoria",$_SESSION["id"],$_SESSION["id_tipo_usuario"]);
			echo '
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Alumno</th>
							<th>Profesor</th>
							<th>Tipo de problema</th>
							<th>Fecha</th>
							<th>Hora</th>
							<th>Tipo de tutoria</th>
							<th>Descripcion</th>'; 
							if($_SESSION["id_tipo_usuario"]==1) { 
								echo '<th>Editar</th>
								<th>Eliminar</th>';
							}
						echo '</tr>
					</thead><tbody>';
			foreach($arrayRespuesta as $row => $item)
			{
				$nombreProfesor = Datos::getProfesorPorIdModel("profesores",$item["id_profesor"]);
				$nombreProfesor = $nombreProfesor["nombre"].' '.$nombreProfesor["aPaterno"].' '.$nombreProfesor["aMaterno"];
				$nombreAlumno = Datos::getAlumnoPorIdModel("alumnos",$item["id_alumno"]);
				$nombreAlumno = $nombreAlumno["nombre"].' '.$nombreAlumno["a_paterno"].' '.$nombreAlumno["a_materno"];
				$tipoProblema = Datos::getTipoDeProblemaPorIdModel("tipo_problema",$item["id_tipo_problema"]);
				$tipoProblema = $tipoProblema["nombre"];
			echo'
				
					<tr>
						<td>'.$item["id_sesion_tutoria"].'</td>
						<td>'.$nombreAlumno.'</td>
						<td>'.$nombreProfesor.'</td>
						<td>'.$tipoProblema.'</td>
						<td>'.$item["fecha"].'</td>
						<td>'.$item["hora"].'</td>
						<td>'.$item["tipo_de_tutoria"].'</td>
						<td>'.$item["descripcion"].'</td>'; 
							if($_SESSION["id_tipo_usuario"]==1) 
							{ 
								echo '
								<td> <a title="Editar" href="index.php?action=editar_tutorias&id='.$item["id_sesion_tutoria"].'"> 
							        <button class="btn btn-info"><i class="fa fa-edit"></i> Editar</button>
							     </a> 
								</td>
								<td> <button title="Borrar" onClick="borrar('.$item["id_sesion_tutoria"].');" class="btn btn-danger" title= "Eliminar tienda"> 
								<i class="fa fa-trash"></i> Eliminar </button></center> </td>
								</tr> ';
							}
			}
			echo '</tbody></table>';
			echo '<script type="text/javascript">
	        var password="'.$_SESSION["pass"].'";
	        function borrar(id){
	          swal("Ingrese su contraseña:", {
	            content: "input",
		          })
		          .then((value) => 
		          {
		              if (value==password) 
		              {
		                swal("Contraseña correcta", "Tutoria eliminada", "success");
		                window.location.href = "index.php?action=tutorias&idBorrar="+id;
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
	public function registroCarrerasController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "nombre"=>$_POST["txtNombre"]);

			$respuesta = Datos::registroCarrerasModel($datosController, "carreras");
			if($respuesta == "success")
			{
				 
				echo '<script type="text/javascript">
						alert("Carrera Agregada Exitosamente!");
					 </script>';

					 echo '<script type="text/javascript">
						window.location.href = "index.php?action=carreras";
					</script>';	

			}
			else
			{
				echo "Error";
			}
		}
	}

	#REGISTRO DE ALUMNO
	#-------------------------------------
	public function registroAlumnosController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "matricula"=>$_POST["txtMatricula"],
									  "nombre"=>$_POST["txtNombre"],
									  "a_paterno"=>$_POST["txtApellidoPaterno"],
									  "a_materno"=>$_POST["txtApellidoMaterno"],
									  "id_carrera"=>$_POST["select_carreras"]);

			$respuesta = Datos::registroAlumnosModel($datosController, "alumnos");
			if($respuesta == "success")
			{
				 
				echo '<script type="text/javascript">
						alert("Alumno Agregado Exitosamente!");
					 </script>';

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

	#REGISTRO DE PROFESORES
	#-------------------------------------
	public function registroProfesoresController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			

			$datosControllerUsuario = array( "email"=>$_POST["txtEmail"],
										     "pass"=>$_POST["txtPassword"],
										     "id_tipo_usuario"=>3);

			//REalizar insercion en usuarios para obtener el id de usuario que sera para insertar en profesores
			$respuestaUser = Datos::registroUsuariosModel($datosControllerUsuario, "usuarios");
			if($respuestaUser == "success")
			{ 
				$respuestaUltimoUser = Datos::getUltimoUsuarioModel("usuarios");
				$datosControllerProfe = array( "nombre"=>$_POST["txtNombre"],
											   "aPaterno"=>$_POST["txtApellidoPaterno"],
											   "aMaterno"=>$_POST["txtApellidoMaterno"],
											   "id_usuario_FK"=>$respuestaUltimoUser["id_usuario"],
									  			"id_carrera"=>$_POST["select_carreras"]);
				//Insertar en la tabla profesores los datos del profe y con el id referente a la tabla usuarios
				$respuestaProfe = Datos::registroProfesoresModel($datosControllerProfe, "Profesores");
				if($respuestaProfe == "success")
				{
					 
					echo '<script type="text/javascript">
							alert("Profesor Agregado Exitosamente!");
						 </script>';

						 echo '<script type="text/javascript">
							window.location.href = "index.php?action=profesores";
						</script>';	

				}
				else
				{
					echo "Error en la insercion en profesores (CONTROLLER)";
				}
			}
			else
			{
				echo "Error en la insercion en usuarios (CONTROLLER)";
			}

			
		}
	}

	#REGISTRO DE TUTORIAS
	#-------------------------------------
	public function registroTutoriasController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "id_alumno"=>$_POST["select_alumnos"],
									  "id_profesor"=>$_POST["select_profesores"],
									  "id_tipo_problema"=>$_POST["select_tipo_problema"],
									  "fecha"=>date('Y/m-d'),
									  
									  "tipo_de_tutoria"=>"Individual",
									  "descripcion"=>$_POST["txtDescripcion"]);

			$respuesta = Datos::registroTutoriasModel($datosController, "sesion_tutoria");
			if($respuesta == "success")
			{
				 
				echo '<script type="text/javascript">
						alert("Tutoria Agregada Exitosamente!");
					 </script>';

					 echo '<script type="text/javascript">
						window.location.href = "index.php?action=tutorias";
					</script>';	
			}
			else
			{
				echo "Error";
			}
		}
	}

	public function registroTutoriasGrupalController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "id_alumno"=>$_POST["select_alumnos"],
									  "id_profesor"=>$_POST["select_profesores"],
									  "id_tipo_problema"=>$_POST["select_tipo_problema"],
									  "fecha"=>date('Y/m-d'),
									  
									  "tipo_de_tutoria"=>"Grupal",
									  "descripcion"=>$_POST["txtDescripcion"]);

			$respuesta = Datos::registroTutoriasModel($datosController, "sesion_tutoria");
			if($respuesta == "success")
			{
				 
				echo '<script type="text/javascript">
						alert("Tutoria Agregada Exitosamente!");
					 </script>';

					 echo '<script type="text/javascript">
						window.location.href = "index.php?action=tutorias";
					</script>';	
			}
			else
			{
				echo "Error";
			}
		}
	}

	#Regresa los prefesores una ves se haya seleccionado la carrera
	
	public function getProfesoresControllerJavaScript()
	{
		$a = Datos::getProfesoresModel("profesores");
		$al ="";
		foreach ($a as $fila) {
			$al = $al . $fila["id_profesor"] . "," . $fila["nombre"] . " " . $fila["aPaterno"] ." ". $fila["aMaterno"] . "," . $fila["id_carrera"] . "$";
		}
		return $al;
	}

	#REGISTRO DE ASIGNACIN DE TUTORES
	#-------------------------------------

	public function seleccionarCarreraController(){
		if(isset($_POST["btnSiguiente"])){
		$d=$_POST["select_carreras"];
			echo '<script type="text/javascript">
						window.location.href = "index.php?action=asignar_tutores&select_carreras=<?php echo $d?>";
					</script>';
			
		}
	}





	public function registroAsignacionTutorController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "id_alumno"=>$_POST["select_alumnos"],
									  "id_profesor"=>$_POST["select_profesores"]);
			$respuesta = Datos::registroAsignacionTutorModal($datosController, "alumnos");
			echo $respuesta;
			if($respuesta == "success")
			{
				 
				echo '<script type="text/javascript">
						alert("Asignacion de Tutor Asignada Exitosamente!");
					 </script>';

					 echo '<script type="text/javascript">
						window.location.href = "index.php?action=alumnos_tutor";
					</script>';
			}
			else
			{
				echo "Error";
			}
		}
	}


	public function registroActualizarTutorController($idAlumno)
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "id_profesor"=>$_POST["select_profesores"]);
			$respuesta = Datos::registroActualizarTutorModal($datosController, "alumnos",$idAlumno);
			echo $respuesta;
			if($respuesta == "success")
			{
				 
				echo '<script type="text/javascript">
						alert("Asignacion de Tutor Asignada Exitosamente!");
					 </script>';

					 echo '<script type="text/javascript">
						window.location.href = "index.php?action=alumnos_tutor";
					</script>';
			}
			else
			{
				echo "Error";
			}
		}
	}
	
	#VISTA DE PROFESORES
	#------------------------------------
	public function vistaProfesoresController()
	{
		if($_SESSION["id_tipo_usuario"]!=3)
		{ 
			$arrayRespuesta = Datos::vistaProfesoresModel("profesores");
			echo '
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Nombre</th>
							<th>Apellido Paterno</th>
							<th>Apellido Materno</th>
							<th>Email</th>
							<th>Carrera</th>';
							if ($_SESSION["id_tipo_usuario"]==1) { 
							echo ' 
							<th>Editar</th>
							<th>Eliminar</th>';
						}
						echo ' 
						</tr>
					</thead>
					<tbody>';
			foreach($arrayRespuesta as $row => $item)
			{
			echo'
				
					<tr>
						<td>'.$item["id_profesor"].'</td>
						<td>'.$item["nombre"].'</td>
						<td>'.$item["aPaterno"].'</td>
						<td>'.$item["aMaterno"].'</td>
						<td>'.$item["email"].'</td>
						<td>'.$item["id_carrera"].'</td>' ;
						if ($_SESSION["id_tipo_usuario"]==1) { 
						echo ' 
						<td> <a title="Editar" href="index.php?action=editar_profesores&id='.$item["id_profesor"].'"> 
					        <button class="btn btn-info"><i class="fa fa-edit"></i> Editar</button>
					     </a> 
						</td>
						<td> <button title="Borrar" onClick="borrar('.$item["id_profesor"].');" class="btn btn-danger" title= "Eliminar Profesor"> 
						<i class="fa fa-trash"></i> Eliminar </button></center> </td>';
					}
					echo'
					</tr>
				';
			}
			echo '</tbody></table>';
			echo '<script type="text/javascript">
	        var password="'.$_SESSION["pass"].'";
	        function borrar(id){
	          swal("Ingrese su contraseña:", {
	            content: "input",
		          })
		          .then((value) => 
		          {
		              if (value==password) 
		              {
		                swal("Contraseña correcta", "Profesor eliminado", "success");
		                window.location.href = "index.php?action=profesores&idBorrar="+id;
		              }
		              else
		              {
		                swal("Contraseña Incorrecta", "Intente de nuevo", "error");
		              }     
		          });
		        } 
		    </script>';
    	}
    }

	public function getCantidadAlumnosController()
	{
		$cantidad_productos = Datos::getCantidadAlumnosModel();
		echo '<h3>'.$cantidad_productos["cantidad"].'</h3>';
	}
	public function getCantidadAlumnosProfesorController()
	{
		$cantidad_productos = Datos::getCantidadAlumnosProfesorModel($_SESSION["id"]);
		echo '<h3>'.$cantidad_productos["cantidad"].'</h3>';
	}

	public function getCantidadCarrerasController()
	{
		$cantidad_carreras = Datos::getCantidadCarrerasModel();
		echo '<h3>'.$cantidad_carreras["cantidad"].'</h3>';
	}

	public function getCantidadProfesoresController()
	{
		$cantidad_profesores = Datos::getCantidadProfesoresModel();
		echo '<h3>'.$cantidad_profesores["cantidad"].'</h3>';
	}  

	public function ingresoUsuarioController()
	{
		if(isset($_POST['btnIngresar']))
		{	
			$datosController = array("email"=>$_POST['txtEmail'],
									"pass"=>$_POST['txtPassword']);

			$respuesta = Datos::ingresoUsuarioModel($datosController,"usuarios");
			if($respuesta["email"] == $_POST["txtEmail"] && $respuesta["pass"] == $_POST["txtPassword"])
			{
				session_start();
				$_SESSION["id"] = $respuesta["id_usuario"];
				$_SESSION["email"] = $respuesta["email"];
				$_SESSION["pass"] = $respuesta["pass"];
				$_SESSION["id_tipo_usuario"] = $respuesta["id_tipo_usuario"];

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

	#TRAER TODAS LAS CARRERAS EXISTENTES
	#------------------------------------
	public function getCarrerasController()
	{
		$todasCarreras = Datos::getCarrerasModel("carreras");
		
		foreach($todasCarreras as $row => $item)
		{
		echo '
				<option value="'.$item["id_carrera"].'"> '.
					$item["nombre"].'
				</option> 
			';
		}
	}

	#TRAER TODAS LOS PROFESORES EXISTENTES
	#------------------------------------
	public function getProfesoresController()
	{
		$todosProfesores = Datos::getProfesoresModel("profesores");
		
		foreach($todosProfesores as $row => $item)
		{
		echo '
				<option value='.$item["id_profesor"].'>'.$item["nombre"].' '.$item["aPaterno"].' '.$item["aMaterno"].
				'</option> 
			';
		}
	}

	public function getProfesoresCarreraController($idCarrera)
	{
		$todosProfesores = Datos::getProfesoresCarreraModel("profesores",$idCarrera);
		
		foreach($todosProfesores as $row => $item)
		{
		echo '
				<option value='.$item["id_profesor"].'>'.$item["nombre"].' '.$item["aPaterno"].' '.$item["aMaterno"].
				'</option> 
			';
		}
	}

	#TRAER TODAS LOS TIPOS DE PROBLEMAS EXISTENTES
	#------------------------------------
	public function getTiposProblemaController()
	{
		$todosTiposProblema = Datos::getTiposProblemaModel("tipo_problema");
		
		foreach($todosTiposProblema as $row => $item)
		{
		echo '
				<option value='.$item["id_tipo_problema"].'>'.$item["nombre"].'</option> 
			';
		}
	}

	#TRAER TODAS LOS alumnos 
	#------------------------------------
	public function getAlumnosController()
	{
		$todosAlumnos = Datos::getAlumnosModel("alumnos");
		
		foreach($todosAlumnos as $row => $item)
		{
		echo '
				<option value='.$item["id_alumno"].'>'.$item["nombre"].' '.$item["a_paterno"].' '.$item["a_materno"].
				'</option> 
			';
		}
	}

	#TRAER TODAS LOS alumnos 
	#------------------------------------
	public function getAlumnosControllerJavaScript()
	{
		$a = Datos::getAlumnosModel("alumnos");
		$al ="";
		foreach ($a as $fila) {
			$al = $al . $fila["id_alumno"] . "," . $fila["nombre"] . " " . $fila["a_paterno"] ." ". $fila["a_materno"] . "," . $fila["id_profesor"] . "$";
		}
		return $al;
	}

	public function getAlumnosTutorController($idCarrera)
	{
		$todosAlumnos = Datos::getAlumnosTutorModel("alumnos",$idCarrera);
		
		foreach($todosAlumnos as $row => $item)
		{
		echo '
				<option value='.$item["id_alumno"].'>'.$item["nombre"].' '.$item["a_paterno"].' '.$item["a_materno"].
				'</option> 
			';
		}
	}

	public function editarAlumnosController()
	{
		if(isset($_GET["id"]))
		{
			$idAlumno = $_GET["id"];
			$respuesta = Datos::editarAlumnosModel($idAlumno,"alumnos");
			return $respuesta;

		}
	}

	public function editarCarrerasController()
	{
		if(isset($_GET["id"]))
		{
			$idCarrera = $_GET["id"];
			$respuesta = Datos::editarCarrerasModel($idCarrera,"carreras");
			return $respuesta;
		}
	}

	public function editarProfesoresController()
	{
		if(isset($_GET["id"]))
		{
			$idProfesor = $_GET["id"];
			$respuesta = Datos::editarProfesoresModel($idProfesor,"profesores");
			return $respuesta;
		}
	}

	public function getCarreraPorIdController($idCarrera)
	{
		return $nombre = Datos::getCarreraPorIdModel("carreras",$idCarrera);
	}

	public function getProfesorPorIdController($idProfesor)
	{
		$nombre = Datos::getProfesorPorIdModel("profesores",$idProfesor);
		return $nombre = $nombre["nombre"]." ".$nombre["aPaterno"]." ".$nombre["aMaterno"];
	}

	public function actualizarAlumnosController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			if($_SESSION["id_tipo_usuario"]==2)
			{
				$datosController = array( "id_alumno"=>$_GET["id"],
										  "id_profesor"=>$_POST["select_profesores"]);
			}
			else
			{
				$datosController = array( "id_alumno"=>$_GET["id"],
										  "matricula"=>$_POST["txtMatricula"],
										  "nombre"=>$_POST["txtNombre"],
										  "a_paterno"=>$_POST["txtApellidoPaterno"],
										  "a_materno"=>$_POST["txtApellidoMaterno"],
										  "id_carrera"=>$_POST["select_carreras"],
										  "id_profesor"=>$_POST["select_profesores"]);
			}
			$respuesta = Datos::actualizarAlumnosModel($datosController, "alumnos",$_SESSION["id_tipo_usuario"]);
			if($respuesta == "success")
			{
				 
				echo '<script type="text/javascript">
						alert("Alumno Actualizado Exitosamente!");
					 </script>';

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

	public function actualizarCarrerasController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "nombre"=>$_POST["txtNombre"],
									  "id_carrera"=>$_GET["id"]);

			$respuesta = Datos::actualizarCarrerasModel($datosController, "carreras");
			if($respuesta == "success")
			{
				 
				echo '<script type="text/javascript">
						alert("Carrera Actualizado Exitosamente!");
					 </script>';

					 echo '<script type="text/javascript">
						window.location.href = "index.php?action=carreras";
					</script>';	

			}
			else
			{
				echo "Error";
			}
		}
	}

	#ACTUALIZAR PROFESORES
	#-------------------------------------
	public function actualizarProfesoresController()
	{
		if(isset($_POST["btnEnviar"]))
		{

			$datosControllerUsuario = array( "id_usuario_FK"=>$_POST["txtIdUsuarioFK"],
											 "email"=>$_POST["txtEmail"],
										     "pass"=>$_POST["txtPassword"]);
			
			//REalizar actualizacion en usuariosde los datos del profesor
			$respuestaUser = Datos::actualizarUsuariosModel($datosControllerUsuario, "usuarios");
			if($respuestaUser == "success")
			{ 
				$datosControllerProfe = array( "nombre"=>$_POST["txtNombre"],
											   "aPaterno"=>$_POST["txtApellidoPaterno"],
											   "aMaterno"=>$_POST["txtApellidoMaterno"],
											   "id_profesor"=>$_GET["id"],
												"id_carrera"=>$_POST["select_carreras"]);
				//Insertar en la tabla profesores los datos del profe y con el id referente a la tabla usuarios
				$respuestaProfe = Datos::actualizarProfesoresModel($datosControllerProfe, "profesores");
				if($respuestaProfe == "success")
				{
					 
					echo '<script type="text/javascript">
							alert("Profesor Actualizado Exitosamente!");
						 </script>';

						 echo '<script type="text/javascript">
							window.location.href = "index.php?action=profesores";
						</script>';	

				}
				else
				{
					echo "Error en la Actualizacion en profesores (CONTROLLER)";
				}
			}
			else
			{
				echo "Error en la Actualizacion en usuarios (CONTROLLER)";
			}

			
		}
	}

	#BORRAR ALUMNOS CONTROLLER
	#------------------------------------
	public function borrarAlumnosController()
	{
		if(isset($_GET["idBorrar"]))
		{
			$respuesta = Datos::borrarAlumnosModel($_GET["idBorrar"],"alumnos");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=alumnos'
					</script>";
			}
			else
			{
				echo "error";
			}
		}
	}

	public function borrarTutorDeAlumnosController()
	{
		if(isset($_GET["idBorrar"]))
		{
			$respuesta = Datos::borrarTutorDeAlumnosModel($_GET["idBorrar"],"alumnos");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=alumnos_tutor'
					</script>";
			}
			else
			{
				echo "error";
			}
		}
	}

	#BORRAR CARRERAS CONTROLLER
	#------------------------------------
	public function borrarCarrerasController()
	{
		if(isset($_GET["idBorrar"]))
		{
			$respuesta = Datos::borrarCarrerasModel($_GET["idBorrar"],"carreras");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=carreras'
					</script>";
			}
			else
			{
				echo "error";
			}
		}
	} 

	#BORRAR PROFESORES CONTROLLER
	#------------------------------------
	public function borrarProfesoresController()
	{
		if(isset($_GET["idBorrar"]))
		{
			$idProfesorABorrar = $_GET["idBorrar"];
			$datosProfesor = Datos::getDatosProfesorByIdModel($idProfesorABorrar,"profesores");
			$respuestaBorrarUser=Datos::borrarUsuariosModel($datosProfesor["id_usuario_FK"],"usuarios");
			if($respuestaBorrarUser=="success")
			{
				echo "<script>
					window.location='index.php?action=profesores'
				</script>";
			}
			else
			{
				echo "error en la eliminacion de profesor en (Usuarios)";
			}
		}
	}

	#BORRAR TUTORIAS CONTROLLER
	#------------------------------------
	public function borrarTutoriasController()
	{
		if(isset($_GET["idBorrar"]))
		{
			$respuesta = Datos::borrarTutoriasModel($_GET["idBorrar"],"sesion_tutoria");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=tutorias'
					</script>";
			}
			else
			{
				echo "error";
			}
		}
	}

	public function getDatosProfesorPorIdUsuarioController()
	{
		$item = Datos::getDatosProfesorPorIdUsuarioModel($_SESSION["id"]);
		echo '
				<option value='.$item["id_profesor"].'>'.$item["nombre"].' '.$item["aPaterno"].' '.$item["aMaterno"].
				'</option> 
			';
	}

	public function arre()
	{
		$item = Datos::getDatosProfesorPorIdUsuarioModel($_SESSION["id"]);
		echo $item["nombre"].' '.$item["aPaterno"].' '.$item["aMaterno"];
	}
	
 
	


}
?>