<?php
	$file = fopen("alumnos_maestros.txt", "r") or die("Problemas al LEER el archivo de texto alumnos_maestros.txt");
	$Amat = "";
	$Anom = "";
	$Acar = "";
	$Aema = "";
	$Atel = "";
	$Enum = "";
	$Ecar = "";
	$Enom = "";
	$Etel = "";
	while (($line = fgets($file)) !== false) 
	{
	    if(substr($line,0,1)==='A')
	    {
	    	$Amat = substr($line,1);
	    	$line = fgets($file);

	    	$Anom = substr($line,1);
	    	$line = fgets($file);

	    	$Acar = substr($line,1);
	    	$line = fgets($file);

	    	$Aema = substr($line,1);
	    	$line = fgets($file);

	    	$Atel = substr($line,1);

	    	$datosAlumno[] = ['matricula'=>$Amat, 'nombre'=>$Anom, 'carrera'=>$Acar,'email'=>$Aema,'telefono'=>$Atel];
	    }
	    else
	    if(substr($line,0,1)==='E')
	    {
	    	$Enum = substr($line,1);
	    	$line = fgets($file);

	    	$Ecar = substr($line,1);
	    	$line = fgets($file);

	    	$Enom = substr($line,1);
	    	$line = fgets($file);

	    	$Etel = substr($line,1);

	    	$datosEmpleado[] = ['NoEmpleado'=>$Enum,'carrera'=>$Ecar,'nombre'=>$Enom,'telefono'=>$Etel];
	    }
	}
	fclose($file);
?>