<?php 
	class Paginas
	{
		//Metodo para relacionar las paginas dependiendo del action que se coloque redirecciona a sia la pagina que es
		public static function enlacesPaginasModel($enlaces)
		{
			if($enlaces == "productos" || $enlaces =="agregar_producto" || $enlaces =="editar_productos"  || $enlaces =="usuarios" || $enlaces =="agregar_usuario" || $enlaces =="editar_usuarios" || $enlaces =="salir" || $enlaces =="eliminar_producto" || $enlaces =="ver_producto" || $enlaces =="eliminar_usuario" || $enlaces =="ventas" || $enlaces =="agregar_venta")
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
			return $module;

			
		}
	}
?>