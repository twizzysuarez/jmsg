<?php
include_once("conexion.php"); 
$con = conectar();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["id_usuario"]) && isset($_POST["password"])) {

        $ident = $_POST["id_usuario"];
        $pss = $_POST["password"];
        $roll = "Administrador";

        $query = "SELECT * FROM usuarios WHERE id_usuario='$ident' AND password='$pss' AND tipo_usuario='$roll' AND estado='Activo'"; 
        $resulta = mysqli_query($con, $query);

        if (mysqli_num_rows($resulta) >= 1) {
            session_start();  
            $Consul = "SELECT * FROM usuarios WHERE id_usuario = '$ident'"; 
            $result = mysqli_query($con, $Consul);
            $row = mysqli_fetch_assoc($result);

            $_SESSION['tipo'] = $row["tipo_usuario"];
            $_SESSION['id'] = $row["id_usuario"];
            $_SESSION['n_u'] = $row['nombres'];

            $auth = bin2hex(random_bytes(16));
            $_SESSION['auth_id'] = $auth;

            $update = "UPDATE usuarios SET auth_id = '$auth' WHERE id_usuario = '$ident'";
            mysqli_query($con, $update);

            echo '<div class="fullscreen-message success-message">';
            echo '<p class="texto-invi"></p>';
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17"></script>';
            echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Bienvenido al Modulo Administrativo",
                        showConfirmButton: false,
                        timer: 1700
                    }).then(function() {
                        window.location.href = "panel/admin/jmsg.php?auth=' . urlencode($auth) . '";
                    });
                  </script>';
            echo '</div>';

        } else {
            echo '<div class="fullscreen-message success-message">';
            echo '<p class="texto-invi"></p>';
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17"></script>';
            echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Credenciales incorrectas o usuario inactivo",
                        showConfirmButton: false,
                        timer: 1700
                    }).then(function() {
                        window.location.href = "index.php";
                    });
                  </script>';
            echo '</div>';
        }

        mysqli_close($con);
        exit;

    } else {
        echo "Faltan datos del formulario (usuario o contraseña)";
    }

} else {
    echo "Acceso no permitido.";
}
?>
