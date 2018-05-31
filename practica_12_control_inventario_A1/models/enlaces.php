<?php 
	class Paginas
	{
		public static function enlacesPaginasModel($enlaces)
		{
			if($enlaces == "productos" || $enlaces =="agregar_producto" || $enlaces =="editar_productos"  || $enlaces =="usuarios" || $enlaces =="categorias")
			{
				$module =  "views/modules/".$enlaces.".php";
			}
			else if($enlaces == "productos")
			{
				$module =  "views/modules/productos.php";
			}
			else if($enlaces == "registroProducto")
		    {
		    	$module =  "views/modules/productos.php";
		    }
		    else if($enlaces == "cambioProducto")
		    {
		    	$module =  "views/modules/productos.php";	
		    }
			return $module;
		}
	}
?>