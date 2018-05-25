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
			$enlaces = "ingresar";
		}
		$respuesta = Paginas::enlacesPaginasModel($enlaces);
		include $respuesta;
	}

	#VISTA DE ALUMNOS
	#------------------------------------
	public function vistaAlumnosController()
	{
		$arrayRespuesta = Datos::vistaAlumnosModel("alumnos");
		echo '<a href="index.php?action=agregar_alumno"><input type="button" value="AGREGAR ALUMNO" name="btnAgregarAlumno"></a>';
		echo '<table border="1" id="alumno">
				<thead>
					<tr>
						<th>Matricula</th>
						<th>Nombre</th>
						<th>Carrera</th>
						<th>Tutor</th>
						<th>Editar?</th>
						<th>Eliminar?</th>
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
					<td>'.$item["tutor"].'</td>
					<td> <a href="index.php?action=editar_alumno&id='.$item["matricula"].'"><button>Editar</button></a> </td>
					<td> <a href="index.php?action=alumnos&idBorrar='.$item["matricula"].'"><button>Borrar</button></a> </td>
				</tr>
			</tbody>';
		}
		echo '</table>';
	}

	#EDITAR ALUMNO
	#------------------------------------
	public function editarAlumnoController()
	{
		$datosController = $_GET["id"];
		$respuesta = Datos::editarAlumnoModel($datosController, "alumnos");

		echo'<input type="text" value="'.$respuesta["matricula"].'" name="txtMatricula">
			 <input type="text" value="'.$respuesta["nombre"].'" name="txtNombre" required>
			 <input type="text" value="'.$respuesta["carrera"].'" name="txtCarrera" required>
			 <input type="text" value="'.$respuesta["tutor"].'" name="txtTutor" required>
			 <input type="submit" value="btnActualizar">';
	}

	#ACTUALIZAR ALUMNO
	#------------------------------------
	public function actualizarAlumnoController()
	{
		if(isset($_POST["txtNombre"]))
		{
			$datosController = array( "matricula"=>$_POST["txtMatricula"],
							          "nombre"=>$_POST["txtNombre"],
				                      "carrera"=>$_POST["txtCarrera"],
				                      "tutor"=>$_POST["txtTutor"]);
			
			$respuesta = Datos::actualizarAlumnoModel($datosController, "alumnos");
			if($respuesta == "success")
			{
				header("location:index.php?action=cambioAlumno");
			}
			else
			{
				echo "error";
			}
		}
	}

	#BORRAR ALUMNO
	#------------------------------------
	public function borrarAlumnoController()
	{
		if(isset($_GET["idBorrar"]))
		{
			$datosController = $_GET["idBorrar"];
			$respuesta = Datos::borrarAlumnoModel($datosController, "alumnos");
			if($respuesta == "success")
			{
				header("location:index.php?action=alumnos");
			}
			else
			{
				echo "error";
			}
		}
	}

	#VISTA DE MAESTROS
	#------------------------------------
	public function vistaMaestrosController()
	{
		$arrayRespuesta = Datos::vistaMaestrosModel("maestros");
		echo '<a href="index.php?action=agregar_maestro"><input type="button" value="AGREGAR MAESTRO" name="btnAgregarMaestro"></a>';
		echo '<table border="1" id="maestro">
				<thead>
					<tr>
						<th>No Empleado</th>
						<th>Carrera</th>
						<th>Nombre</th>
						<th>Email</th>
						<th>Password</th>
						<th>Editar?</th>
						<th>Eliminar?</th>
					</tr>
				</thead>';
		foreach($arrayRespuesta as $row => $item)
		{
		echo'
			<tbody>
				<tr>
					<td>'.$item["num_empleado"].'</td>
					<td>'.$item["carrera"].'</td>
					<td>'.$item["nombre"].'</td>
					<td>'.$item["email"].'</td>
					<td>'.$item["password"].'</td>
					<td><a href="index.php?action=editar_maestro&id='.$item["num_empleado"].'"><button>Editar</button></a></td>
					<td><a href="index.php?action=maestros&idBorrar='.$item["num_empleado"].'"><button>Borrar</button></a></td>
				</tr>
			</tbody>';
		}
		echo '</table>';
	}

	public function ingresoMaestroController()
	{
		if(isset($_POST['ingresar']))
		{	
			$datosController = array("nombre"=>$_POST['nombre'],
									"password"=>$_POST['password']);

			$respuesta = Datos::ingresoMaestroModel($datosController,"maestros");
			if($respuesta["nombre"] == $_POST["nombre"] && $respuesta["password"] == $_POST["password"])
			{
				session_start();
				$_SESSION["m"] = true;
				header("location:index.php?action=alumnos");
			}
			if($_POST["nombre"]=="superadmin" && $_POST["password"]=="superadmin"){
				session_start();
				$_SESSION["validar"] = true;
				header("location:index.php?action=reportes");
			}
		}
	}

	#EDITAR MAESTRO
	#------------------------------------
	public function editarMaestroController()
	{
		$datosController = $_GET["id"];
		$respuesta = Datos::editarMaestroModel($datosController, "maestros");

		echo'<input type="text" value="'.$respuesta["num_empleado"].'" name="txtEmpleado">
			 <input type="text" value="'.$respuesta["carrera"].'" name="txtCarrera" required>
			 <input type="text" value="'.$respuesta["nombre"].'" name="txtNombre" required>
			 <input type="text" value="'.$respuesta["email"].'" name="txtEmail" required>
			 <input type="text" value="'.$respuesta["password"].'" name="txtPassword" required>
			 <input type="submit" value="btnActualizar">';
	}

	#ACTUALIZAR MAESTRO
	#------------------------------------
	public function actualizarMaestroController()
	{
		if(isset($_POST["txtCarrera"]))
		{
			$datosController = array( "num_empleado"=>$_POST["txtEmpleado"],
							          "carrera"=>$_POST["txtCarrera"],
							          "nombre"=>$_POST["txtNombre"],
				                      "email"=>$_POST["txtEmail"],
				                      "password"=>$_POST["txtPassword"]);
			
			$respuesta = Datos::actualizarMaestroModel($datosController, "maestros");
			if($respuesta == "success")
			{
				header("location:index.php?action=cambioMaestro");
			}
			else
			{
				echo "error";
			}
		}
	}

	#BORRAR MAESTRO
	#------------------------------------
	public function borrarMaestroController()
	{
		if(isset($_GET["idBorrar"]))
		{
			$datosController = $_GET["idBorrar"];
			$respuesta = Datos::borrarMaestroModel($datosController, "maestros");
			if($respuesta == "success")
			{
				header("location:index.php?action=maestros");
			}
			else
			{
				echo "error";
			}
		}
	}

	#REGISTRO DE ALUMNOS
	#-------------------------------------
	public function registroAlumnosController()
	{
		if(isset($_POST["txtMatricula"]))
		{
			$datosController = array( "matricula"=>$_POST["txtMatricula"], 
								      "nombre"=>$_POST["txtNombre"],
								      "carrera"=>$_POST["txtCarrera"],
								      "tutor"=>$_POST["txtTutor"]);

			$respuesta = Datos::registroAlumnosModel($datosController, "alumnos");
			if($respuesta == "success")
			{
				header("location:index.php?action=registroAlumno");
			}
			else
			{
				header("location:index.php");
			}
		}
	}

	#REGISTRO DE MAESTROS
	#-------------------------------------
	public function registroMaestrosController()
	{
		if(isset($_POST["txtEmpleado"]))
		{
			$datosController = array( "num_empleado"=>$_POST["txtEmpleado"], 
								      "carrera"=>$_POST["txtCarrera"],
								      "nombre"=>$_POST["txtNombre"],
								      "email"=>$_POST["txtEmail"],
								      "password"=>$_POST["txtPassword"]);

			$respuesta = Datos::registroMaestrosModel($datosController, "maestros");
			if($respuesta == "success")
			{
				header("location:index.php?action=registroMaestro");
			}
			else
			{
				header("location:index.php");
			}
		}
	}

	#VISTA DE ALUMNOS
	#------------------------------------
	public function vistaCarreraController()
	{
		$arrayRespuesta = Datos::vistaCarreraModel("carreras");
		echo '<a href="index.php?action=agregar_carrera"><input type="button" value="AGREGAR CARRERA" name="btnAgregarCarrera"></a>';
		echo '<table border="1" id="carrera">
				<thead>
					<tr>
						<th>id</th>
						<th>Nombre</th>
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
					<td><a href="index.php?action=editar_carrera&id='.$item["id"].'"><button>Editar</button></a></td>
					<td><a href="index.php?action=carreras&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
				</tr>
			</tbody>';
		}
		echo '</table>';
	}

	#EDITAR CARRERA
	#------------------------------------
	public function editarCarreraController()
	{
		$datosController = $_GET["id"];
		$respuesta = Datos::editarCarreraModel($datosController, "carreras");

		echo'<input type="text" value="'.$respuesta["id"].'" name="txtId">
			 <input type="text" value="'.$respuesta["nombre"].'" name="txtNombre">
			 <input type="submit" value="btnActualizar">';
	}

	#ACTUALIZAR MAESTRO
	#------------------------------------
	public function actualizarCarreraController()
	{
		if(isset($_POST["txtNombre"]))
		{
			$datosController = array( "id"=>$_POST["txtId"],
				                      "nombre"=>$_POST["txtNombre"]);
			
			$respuesta = Datos::actualizarCarreraModel($datosController, "carreras");
			if($respuesta == "success")
			{
				header("location:index.php?action=cambioCarrera");
			}
			else
			{
				echo "error";
			}
		}
	}

	#BORRAR CARRERA
	#------------------------------------
	public function borrarCarreraController()
	{
		if(isset($_GET["idBorrar"]))
		{
			$datosController = $_GET["idBorrar"];
			$respuesta = Datos::borrarCarreraModel($datosController, "carreras");
			if($respuesta == "success")
			{
				header("location:index.php?action=carreras");
			}
			else
			{
				echo "error";
			}
		}
	}

	#REGISTRO DE CARRERAS
	#-------------------------------------
	public function registroCarreraController()
	{
		if(isset($_POST["txtNombre"]))
		{
			$datosController = array( "id"=>$_POST["txtId"], 
								      "nombre"=>$_POST["txtNombre"]);

			$respuesta = Datos::registroCarreraModel($datosController, "carreras");
			if($respuesta == "success")
			{
				header("location:index.php?action=registroCarrera");
			}
			else
			{
				header("location:index.php");
			}
		}
	}
	public static function editarTutoriaController()
	{
		$datosController = $_GET["id"];
		$respuesta = Datos::editarTutoriaModel($datosController, "sesion_turoria");

		echo'<input type="text" value="'.$respuesta["id"].'" name="txtId">
			 <input type="text" value="'.$respuesta["alumno"].'" name="txtAlumno">
			 <input type="text" value="'.$respuesta["tutor"].'" name="txtTutor">
			 <input type="date" value="'.$respuesta["fecha"].'" name="txtFecha">
			 <input type="time" value="'.$respuesta["hora"].'" name="txtHora">
			 <input type="text" value="'.$respuesta["tipo"].'" name="txtTipo">
			 <input type="text" value="'.$respuesta["tutoria"].'" name="txtTutoria">
			 <input type="submit" value="btnActualizar">';
	}

	public function actualizarTutoriaController()
	{
		if(isset($_POST["txtAlumno"]))
		{
			$datosController = array( "id"=>$_POST["txtId"],
				                      "alumno"=>$_POST["txtAlumno"],
				                  	"tutor"=>$_POST["txtTutor"],
				                  	"fecha"=>$_POST["txtFecha"],
				                  	"hora"=>$_POST["txtHora"],
				                  	"tipo"=>$_POST["txtTipo"],
				                  	"tutoria"=>$_POST["txtTutoria"]);
			
			$respuesta = Datos::actualizarTutoriaModel($datosController, "sesion_turoria");
			if($respuesta == "success")
			{
				header("location:index.php?action=tutorias");
			}
			else
			{
				echo "error";
			}
		}
	}

	#VISTA DE ALUMNOS
	#------------------------------------
	public function vistaTutoriasController()
	{
		$arrayRespuesta = Datos::vistaTutoriasModel("sesion_turoria");
		echo '<a href="index.php?action=agregar_tutoria"><input type="button" value="AGREGAR TUTORIA" name="btnAgregarTutoria"></a>';
		echo '<table border="1">
				<thead>
					<tr>
						<th>id</th>
						<th>Alumno</th>
						<th>Tutor</th>
						<th>Fecha</th>
						<th>Hora</th>
						<th>Tipo</th>
						<th>Tutoria</th>
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
					<td>'.$item["alumno"].'</td>
					<td>'.$item["tutor"].'</td>
					<td>'.$item["fecha"].'</td>
					<td>'.$item["hora"].'</td>
					<td>'.$item["tipo"].'</td>
					<td>'.$item["tutoria"].'</td>
					<td><a href="index.php?action=editar_tutoria&id='.$item["id"].'"><button>Editar</button></a></td>
					<td><a href="index.php?action=tutorias&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
				</tr>
			</tbody>';
		}
		echo '</table>';
	}

	#BORRAR CARRERA
	#------------------------------------
	public function borrarTutoriaController()
	{
		if(isset($_GET["idBorrar"]))
		{
			$datosController = $_GET["idBorrar"];
			$respuesta = Datos::borrarTutoriaModel($datosController, "sesion_turoria");
			if($respuesta == "success")
			{
				header("location:index.php?action=tutorias");
			}
			else
			{
				echo "error";
			}
		}
	}

	#REGISTRO DE TUTORIAS
	#-------------------------------------
	public function registroTutoriasController()
	{
		if(isset($_POST["btnRegistrarTutoria"]))
		{
			$datosController = array( 	"id"=>$_POST["txtId"], 
										"alumno"=>$_POST["txtAlumno"],
										"tutor"=>$_POST["txtTutor"],
										"fecha"=>$_POST["txtFecha"],
										"hora"=>$_POST["txtHora"],
										"tipo"=>$_POST["txtTipo"],
								      	"tutoria"=>$_POST["txtTutoria"]);

			$respuesta = Datos::registroTutoriaModel($datosController, "sesion_turoria");
			if($respuesta == "success")
			{
				header("location:index.php?action=registroTutoria");
			}
			else
			{
				header("location:index.php");
			}
		}
	}

	#VISTA REPORTES
	#--------------------------------------------
	public function vistaReportesController()
	{
		echo '</BR><h3>TABLA ALUMNOS</h3></BR>';
		$arrayRespuesta = Datos::vistaAlumnosModel("alumnos");
		echo '<table border="1" id="alumno">
				<thead>
					<tr>
						<th>Matricula</th>
						<th>Nombre</th>
						<th>Carrera</th>
						<th>Tutor</th>
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
					<td>'.$item["tutor"].'</td>
				</tr>
			</tbody>';
		}
		echo '</table>';
		echo '<h3>TABLA MAESTROS</h3></BR>';
		$arrayRespuesta = Datos::vistaMaestrosModel("maestros");
		echo '<table border="1" id="maestro">
				<thead>
					<tr>
						<th>No Empleado</th>
						<th>Carrera</th>
						<th>Nombre</th>
						<th>Email</th>
						<th>Password</th>
					</tr>
				</thead>';
		foreach($arrayRespuesta as $row => $item)
		{
		echo'
			<tbody>
				<tr>
					<td>'.$item["num_empleado"].'</td>
					<td>'.$item["carrera"].'</td>
					<td>'.$item["nombre"].'</td>
					<td>'.$item["email"].'</td>
					<td>'.$item["password"].'</td>
				</tr>
			</tbody>';
		}
		echo '</table>';
		echo '<h3>TABLA CARRERAS</h3></BR>';
		$arrayRespuesta = Datos::vistaCarreraModel("carreras");
		echo '<table border="1" id="carrera">
				<thead>
					<tr>
						<th>id</th>
						<th>Nombre</th>
					</tr>
				</thead>';
		foreach($arrayRespuesta as $row => $item)
		{
		echo'
			<tbody>
				<tr>
					<td>'.$item["id"].'</td>
					<td>'.$item["nombre"].'</td>
				</tr>
			</tbody>';
		}
		echo '</table>';
		echo '<h3>TABLA TUTORIAS</H3>';
		$arrayRespuesta = Datos::vistaTutoriasModel("sesion_turoria");
		echo '<table border="1" id="tutoria">
				<thead>
					<tr>
						<th>id</th>
						<th>Alumno</th>
						<th>Tutor</th>
						<th>Fecha</th>
						<th>Hora</th>
						<th>Tipo</th>
						<th>Tutoria</th>
					</tr>
				</thead>';
		foreach($arrayRespuesta as $row => $item)
		{
		echo'
			<tbody>
				<tr>
					<td>'.$item["id"].'</td>
					<td>'.$item["alumno"].'</td>
					<td>'.$item["tutor"].'</td>
					<td>'.$item["fecha"].'</td>
					<td>'.$item["hora"].'</td>
					<td>'.$item["tipo"].'</td>
					<td>'.$item["tutoria"].'</td>
				</tr>
			</tbody>';
		}
		echo '</table>';
	}
}
?>