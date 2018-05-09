<?php
    //hac3mos llamado a conexion.php ya que ahi estan las credenciales necesarias para poder hacer uso de la base de datos
    require_once('conexion.php');
    //Creamos una variable conexion ejecutando mysqli con los parametros de las credenciales para la base de datos
    $conexion = new mysqli($server, $user, $pass, $bd);

    //Funcion para realizar una consulta y traer la cantidad de elementos
    function select_query()
    {
        //Usamos la varialbe conexion declarada afuera para poder usarla dentro
        global $conexion;
        //Preparamos la consulta a realizar
        $sqlQuery = 'SELECT * FROM users';
        //Ejecutamos la consulta  y la almacenamos en una variable
        $queryExecuted = $conexion->query($sqlQuery);
        //Si la ejecucion tiene un numero de filas ke lo retorne
        if($queryExecuted->num_rows)
            return $queryExecuted;
        return false;
    }

    //Funcion para borrar en la base de datos
    function delete_query($userId)
    {
        global $conexion;
        //Preparamos la consulta sql
        $sqlQuery = "DELETE FROM users WHERE id='$userId'";
        //Ejecutamos la consulta
        $conexion->query($sqlQuery);
    }

    //Funcion para insertar en la base de datos, con dos parametros, nombre y correo
    function insert_query($nombre,$correo)
    {
        global $conexion;
        //Se prepara la consulta indicando los campos  y los valores correspondientes segun llegan como parametros al a funcion
        $sqlQuery = "INSERT INTO users (nombre, correo) VALUES ('$nombre','$correo')";
        //Se ejecuta la consulta
        $conexion->query($sqlQuery);
    }

    //Funcion para actualizar en la base de datos , con 3 parametros, id, nombre y correo
    function update_query($id,$nombre,$correo)
    {
        global $conexion;
        //Preparamos la consulta adecuada asignando los valores correspondientes a actualizar respectivo del ID
        $sqlQuery = "UPDATE users SET correo = '$correo', nombre='$nombre'where id='$id'";
        //Ejecutamos la consulta
        $conexion->query($sqlQuery);
    }

    //Funcion para buscar un usuario con un ID respectivo
    function buscarId($id)
    {
        global $conexion;
        //Preparamos la consulta adecuada
        $sqlQuery = "SELECT * FROM users where id='$id'";
        //Ejecutamos la consulta
        $resultados = $conexion->query($sqlQuery);
        //Si tiene filas entonces que regrese todo lo que encontro
        if($resultados->num_rows)
            return mysqli_fetch_assoc($resultados);
        return false;
    }
?>
