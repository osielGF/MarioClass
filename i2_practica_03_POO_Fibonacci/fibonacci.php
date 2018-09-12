<?php
	//Crear laclase que se usara Fibonacci
	class Fibonacci
	{
		//Propiedadesde la clase o variables
		public $arrayOriginal;
		public $arrayFibonacheado;

		//Consructor de la clase para incializar los variables en este caso,los arrays
		function __construct()
		{
			//inicializacion del array "arrayOriginal"
			$this->arrayOriginal = array(0,1,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23);
			//inicializacion del array "arrayFibonacheado"
			$this->arrayFibonacheado = array();
		}

		//Metodo para mostrar el array original
		public function mostrarOriginal()
		{
			//ciclo de 25 vueltas para imprimir el arrayOriginal
			for($i=0;$i<25;$i++)
			{
				if($i==24)
				{
					echo $this->arrayOriginal[$i].".<br/>";	
				}
				else
				{
					echo $this->arrayOriginal[$i].", ";	
				}
			}
		}

		//Metodo para aplicar la serie de fibonacci al array
		public function aplicarFibonacci()
		{
			//ciclo de 25 vueltas para recorrer el arrayOriginal e ir aplicando la serieFibonacci
			for($i=0;$i<25;$i++)
			{
				if($i<=1)
				{
					$this->arrayFibonacheado[$i] = $this->arrayOriginal[$i];
				}
				else
				{
					$this->arrayFibonacheado[$i] = $this->arrayFibonacheado[$i-1] + $this->arrayFibonacheado[$i-2];
				}
			}
		}

		//Metodo para mostrar el array con la serie de fibonacci
		public function mostrarFibonacheado()
		{
			//ciclo de 25 vueltas para recorrer el arrayFibonacheado e irlo imprimiendo
			for($i=0;$i<25;$i++)
			{
				if($i==24)
				{
					echo $this->arrayFibonacheado[$i].".<br/>";
				}
				else
				{
					echo $this->arrayFibonacheado[$i].", ";
				}
			}
		}
	}

	echo "------------------------------------------------------------------- PRACTICA 3 ---------------------------------------------------------------------------"."<br/>";
	echo "Nombre: Osiel Gomez Flores";
	echo "<br/>";
	echo "Matricula: 1530272";
	echo "<br/>";
	echo "Materia: Tecnologias y Aplicaciones Web";
	echo "<br/>";
	echo "Cuatrimestre: Decimo";
	echo "<br/>";
	echo "-----------------------------------------------------------------------------------------------------------------------------------------------------------------";
	echo "<br/>";

	//Instanciar una variable "f" de tipo de la clase "Fibonacci"
	$f = new Fibonacci();
	echo "--------------------------------------------------------<b>ARRAY ORIGINAL:</b>------------------------------------------------------------------------------"."<br/>";
	//utilizar el metodo "mostrarOriginal()" del objeto "f" de tipo de la clase "Fibonacci"
	$f -> mostrarOriginal();
	echo "<br/>";
	//utilizar el metodo "aplicarFibonacci()" del objeto "f" de tipo de la clase "Fibonacci"
	$f -> aplicarFibonacci();
	echo "-----------------------------------<b>ARRAY APLICANDO LA SERIE DE FIBONACCI:</b>--------------------------------------------------------------"."<br/>";
	//utilizar el metodo "mostrarFibonacheado()" del objeto de tipo de la clase "Fibonacci"
	$f -> mostrarFibonacheado();
?>