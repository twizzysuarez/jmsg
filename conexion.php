<?php
function conectar()
{
    // Detecta si estás en local o en hosting
    $esLocal = in_array($_SERVER['SERVER_NAME'], ['localhost', '127.0.0.1']);

    if ($esLocal) {
        // LOCAL (XAMPP)
        $servidor = "localhost";
        $usuario = "root";
        $password = "";
        $basededatos = "distribuidora_jmsg";
        $puerto = 3306;
    } else {
        // HOSTING (InfinityFree)
        $servidor = "sql107.infinityfree.com";
        $usuario = "if0_41017955";
        $password = "Op6KICnWhR";
        $basededatos = "if0_41017955_XXX";
        $puerto = 3306;
    }

    $conexion = mysqli_connect($servidor, $usuario, $password, $basededatos, $puerto);

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    mysqli_set_charset($conexion, "utf8");

    return $conexion;
}
?>
