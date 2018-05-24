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
	public function vistaAlumnosController()
	{
		$arrayRespuesta = Datos::vistaAlumnosModel("alumnos");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
		echo '<a href="index.php?action=agregar_alumno"><input type="button" value="AGREGAR ALUMNO" name="btnAgregarAlumno"></a>';
		foreach($arrayRespuesta as $row => $item)
		{
		echo'<tr>
				
				<td>'.$item["matricula"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["carrera"].'</td>
				<td>'.$item["tutor"].'</td>
				<td><a href="index.php?action=editar_alumno&id='.$item["matricula"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=alumnos&idBorrar='.$item["matricula"].'"><button>Borrar</button></a></td>
			</tr>';
		}
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
		foreach($arrayRespuesta as $row => $item)
		{
		echo'<tr>
				<td>'.$item["num_empleado"].'</td>
				<td>'.$item["carrera"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["email"].'</td>
				<td>'.$item["password"].'</td>
				<td><a href="index.php?action=editar_maestro&id='.$item["num_empleado"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=maestros&idBorrar='.$item["num_empleado"].'"><button>Borrar</button></a></td>
			</tr>';
		}
	}

	public function ingresoMaestroController()
	{
		if(isset($_POST['ingresar']))
		{	
			$datosController = array("nombre"=>$_POST['nombre'],"password"=>$_POST['password']);
			$respuesta = Datos::ingresoMaestroModel($datosController,"maestros");
			if($respuesta["nombre"] == $_POST["nombre"] && $respuesta["password"] == $_POST["password"])
			{
				session_start();
				$_SESSION["validar"] = true;
				header("location:index.php?action=alumnos&id=$respuesta[id]");
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
}
?>