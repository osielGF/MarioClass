<?php 
	class Paginas
	{
		public static function enlacesPaginasModel($enlaces)
		{
			if($enlaces == "productos" || $enlaces =="agregar_producto" || $enlaces =="editar_productos"  || $enlaces =="usuarios" || $enlaces =="categorias" || $enlaces =="agregar_usuario" || $enlaces =="editar_usuarios" || $enlaces =="agregar_categoria"
				 || $enlaces =="editar_categorias" || $enlaces =="salir" || $enlaces =="eliminar_producto" || $enlaces =="ver_producto"
				  || $enlaces =="eliminar_usuario"|| $enlaces =="historial")
			{
				$module =  "views/modules/".$enlaces.".php";
			}
			else if($enlaces == "registroProducto")
		    {
		    	$module =  "views/modules/productos.php";
		    }
		    else if($enlaces == "cambioProducto")
		    {
		    	$module =  "views/modules/productos.php";	
		    }
		    else if($enlaces == "cambioUsuario")
		    {
		    	$module =  "views/modules/usuarios.php";	
		    }
		    else if($enlaces == "index")
		    {
		    	$module =  "views/modules/ingresar.php";	
		    }
		    else if($enlaces == "registroCategoria")
		    {
		    	$module =  "views/modules/categorias.php";	
		    }
		    else if($enlaces == "cambioCategoria")
		    {
		    	$module =  "views/modules/categorias.php";	
		    }
			return $module;

			
		}
	}
?>