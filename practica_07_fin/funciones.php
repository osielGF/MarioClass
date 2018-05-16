<?php
    include('conexion.php');
    $listaProductos;
    $cantidadProductos;
    $datosPorId;
    $nombresProductos;
    $cantidadVentas;
    $lista_ventas;
    $cantidadUsuarios;
    $lista_usuarios;
    $usuarioPorId;
    $resLogin;
    $ultimaVenta;

    function agregar_usuario($un,$pass)
    {
    	global $pdo;
		$consulta = "INSERT INTO usuarios(username,password) VALUES ('$un','$pass')";
		$preparacion = $pdo->prepare($consulta);
    	$preparacion->execute();
    }

    function agregar_producto($id,$nom,$precio)
    {
    	global $pdo;
    	$consulta = "INSERT INTO productos(id,nombre,precio) VALUES('$id','$nom','$precio')";
    	$preparacion = $pdo->prepare($consulta);
    	$preparacion->execute();
    }

    function listado_productos()
    {
        global $pdo;
        global $listaProductos;
        $consulta = "SELECT * FROM productos";
        $preparacion = $pdo->prepare($consulta);
        $preparacion->execute();
        $listaProductos = $preparacion->fetchAll();
        return $listaProductos;
    }

    function contar_productos()
    {
        global $pdo;
        global $cantidadProductos;
        $consulta = "SELECT count(*) as cantidad_de_productos FROM productos";
        $preparacion = $pdo->prepare($consulta);
        $preparacion->execute();
        $productos = $preparacion->fetchAll();
        $cantidadProductos = $productos[0]['cantidad_de_productos'];
        return $cantidadProductos;
    }

    function actualizar_producto($id,$nom,$precio)
    {
        global $pdo;
        $consulta = "UPDATE productos SET nombre='$nom', precio=$precio WHERE id=$id";
        $preparacion = $pdo->prepare($consulta);
        $preparacion->execute();
    }

    function buscar_por_id($id)
    {
        global $pdo;
        global $datosPorId;
        $consulta = "SELECT * FROM productos WHERE id=$id";
        $preparacion = $pdo->prepare($consulta);
        $preparacion->execute();
        $datosPorId = $preparacion->fetchAll();
        return $datosPorId;
    }

    function eliminar_producto($id)
    {   
        global $pdo;
        $consulta = "DELETE FROM productos WHERE id=$id";
        $preparacion = $pdo->prepare($consulta);
        $preparacion->execute();
    }

    function nombres_productos()
    {
        global $pdo;
        global $nombresProductos;
        $consulta = "SELECT nombre, precio FROM productos";
        $preparacion = $pdo->prepare($consulta);
        $preparacion->execute();
        $nombresProductos = $preparacion->fetchAll();
        return $nombresProductos;
    }

    function guardar_venta($tot,$fech)
    {   
        global $pdo;
        $consulta = "INSERT INTO ventas(total,fecha) VALUES('$tot','$fech')";
        $preparacion = $pdo->prepare($consulta);
        $preparacion->execute();
    }

    function contar_ventas()
    {
        global $pdo;
        global $cantidadVentas;
        $consulta = "SELECT count(*) as cantidad_ventas FROM ventas";
        $preparacion = $pdo->prepare($consulta);
        $preparacion->execute();
        $ventas = $preparacion->fetchAll();
        $cantidadVentas = $ventas[0]['cantidad_ventas'];
        return $cantidadVentas;
    }

    function listado_ventas()
    {
        global $pdo;
        global $lista_ventas;
        $consulta = "SELECT * FROM ventas";
        $preparacion = $pdo->prepare($consulta);
        $preparacion->execute();
        $lista_ventas = $preparacion->fetchAll();
        return $lista_ventas;
    }

    function eliminar_venta($id)
    {
        global $pdo;
        $consulta = "DELETE FROM ventas WHERE id=$id";
        $preparacion = $pdo->prepare($consulta);
        $preparacion->execute();
    }

    function contar_usuarios()
    {
        global $pdo;
        global $cantidadUsuarios;
        $consulta = "SELECT count(*) as cantidad_usuarios FROM usuarios";
        $preparacion = $pdo->prepare($consulta);
        $preparacion->execute();
        $usuarios = $preparacion->fetchAll();
        $cantidadUsuarios = $usuarios[0]['cantidad_usuarios'];
        return $cantidadUsuarios;
    }

    function listado_usuarios()
    {
        global $pdo;
        global $lista_usuarios;
        $consulta = "SELECT * FROM usuarios";
        $preparacion = $pdo->prepare($consulta);
        $preparacion->execute();
        $lista_usuarios = $preparacion->fetchAll();
        return $lista_usuarios;
    }

    function eliminar_usuario($id)
    {
        global $pdo;
        $consulta = "DELETE FROM usuarios WHERE id=$id";
        $preparacion = $pdo->prepare($consulta);
        $preparacion->execute();
    }

    function buscar_usuario_por_id($id)
    {
        global $pdo;
        global $usuarioPorId;
        $consulta = "SELECT * FROM usuarios WHERE id=$id";
        $preparacion = $pdo->prepare($consulta);
        $preparacion->execute();
        $usuarioPorId = $preparacion->fetchAll();
        return $usuarioPorId;
    }

    function actualizar_usuario($id,$username,$password)
    {
        global $pdo;
        $consulta = "UPDATE usuarios SET username='$username', password='$password' WHERE id=$id";
        $preparacion = $pdo->prepare($consulta);
        $preparacion->execute();
    }

    function login($username,$password)
    {
        global $pdo;
        global $resLogin;
        $consulta = "SELECT * FROM usuarios WHERE username='$username' and password='$password'";
        $preparacion = $pdo->prepare($consulta);
        $preparacion->execute();
        $resLogin = $preparacion->fetchAll();
        return $resLogin;
    }

    function venta_ultima()
    {
        global $pdo;
        global $ultimaVenta;
        $consulta = "SELECT * FROM ventas ORDER BY id desc LIMIT 1";
        $preparacion = $pdo->prepare($consulta);
        $preparacion->execute();
        $ultimaVenta = $preparacion->fetchAll();
        return $ultimaVenta;
    }

    function agregar_detalle_venta($idVta,$idProd,$pre,$cant)
    {
        global $pdo;
        $consulta = "INSERT INTO detalle_venta(id_venta,id_producto,precio,cantidad) VALUES('$idVta','idProd','$pre','$cant')";
        $preparacion = $pdo->prepare($consulta);
        $preparacion->execute();
    }

?>