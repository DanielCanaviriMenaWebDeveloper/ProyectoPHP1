<?php
    require_once "global.php";

    $conexion = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

    mysqli_query( $conexion, 'SET NAMES "'.DB_ENCODE.'"');

    //Si tenemos un posible error en la conexion lo mostramos
    if (mysqli_connect_errno())
    {
        printf("Falló conexión a la base de datos: %s\n",mysqli_connect_error());
        exit();
    }

    if (!function_exists('ejecutarConsulta'))
    {
        function ejecutarConsulta($sql)
        {
            global $conexion;
            $query = $conexion->query($sql); //Ejecuta el codigo sql que esta recibiendo por parametro
            return $query;
        }

        function ejecutarConsultaSimpleFila($sql)
        {
            global $conexion;
            $query = $conexion->query($sql);
            $row = $query->fetch_assoc(); //Obtiene una fila como resultado en un array 
            return $row;
        }

        function ejecutarConsulta_retornaID($sql)
        {
            global $conexion;
            $query = $conexion->query($sql);
            return $conexion->insert_id(); //Devuelve la llave primaria del registro insertado
        }

        function limpiarCadena($str) //Permitira escapar los caracteres especiales de una cadena para usarlo en una sentencia sql
        {
            global $conexion;
            $srt = mysqli_real_escape_string($conexion,trim($str));
            return htmlspecialchars($str);
        }
    }


?>