<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once("conexion.php");
$con = conectar();

$id = $_SESSION['id'] ?? null;

if (!$id) {
    header("Location: /distrijmsg/index.php?error=no_id");
    exit();
}

$sql = "SELECT auth_id FROM usuarios WHERE id_usuario = '$id'";
$resultado = mysqli_query($con, $sql);

if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($con));
}

$row = mysqli_fetch_assoc($resultado);
$comprobar = $row['auth_id'] ?? null;

// Validar si existe auth_id en la sesión y en la URL
if (!isset($_SESSION['auth_id']) || !isset($_GET['auth'])) {
    header("Location: /distrijmsg/index.php?error=acceso_denegado");
    exit();
}

// Comparar el auth_id de la sesión, el obtenido en la base y el de la URL
if ($_SESSION['auth_id'] != $_GET['auth'] || $_GET['auth'] != $comprobar) {
    echo "<script>
        alert('No está permitido acceder a este sitio. Redirigiendo a Inicio...');
        window.location.href = '/distrijmsg/index.php';
    </script>";
    exit();
}

// Si todo está bien, continúa con el flujo normal
?>
