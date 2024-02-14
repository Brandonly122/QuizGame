<?php
include('conexion.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];

    $usuario = mysqli_real_escape_string($con, $usuario);
    $password = mysqli_real_escape_string($con, $password);

    $consulta = "SELECT * FROM usuarios WHERE usuario='$usuario'";
    $resultado = mysqli_query($con, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);

        // Ahora, la columna 'contrasena' contiene el hash de la contraseña
        if (password_verify($password, $fila["contrasena"])) {
            echo "Inicio de sesión exitoso";
            // Puedes iniciar sesión o redirigir aquí
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "Usuario no encontrado";
    }

    mysqli_close($con);
}
?>
