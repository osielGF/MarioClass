<?php 
	class Paginas
	{
		//Metodo para relacionar las paginas dependiendo del action que se coloque redirecciona a sia la pagina que es
		public static function enlacesPaginasModel($enlaces)
		{
			if($enlaces == "alumnas" || $enlaces =="salir" || $enlaces =="agregar_alumna" || $enlaces =="editar_alumna" 
		 	|| $enlaces =="grupos" || $enlaces =="agregar_grupo" || $enlaces =="pagos" || $enlaces =="editar_pago" || $enlaces =="registro_publico"
		  || $enlaces =="ingresar")
			{
				$module =  "views/modules/".$enlaces.".php";
			}
			else if($enlaces == "index")
		    {
		    	$module =  "views/modules/ingresar.php";
		    }
		    else if($enlaces == "cambioAlumna")
		    {
		    	$module =  "views/modules/alumnas.php";
		    }
		    else if($enlaces == "cambioPago")
		    {
		    	$module =  "views/modules/pagos.php";
		    }
			return $module;
		}
	}
?>