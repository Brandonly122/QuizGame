<?php

$conexion = mysqli_connect("localhost", "root", "", "quizz");


if (!$conexion) {
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
}

$errores = array();


if (empty($id_user) || !is_numeric($id_user)) {
    $errores['id_user'] = "ID de usuario no válido";
} else {
    $id_user_valido = true;
}


if (empty($errores)) {
    $sql = "DELETE FROM user WHERE id_user = $id_user";
    $eliminar = mysqli_query($conexion, $sql);

    if ($eliminar) {
        echo "¡Usuario eliminado exitosamente!";
    } else {
        echo "Error al eliminar el usuario: " . mysqli_error($conexion);
    }
} else {
    foreach ($errores as $val) {
        echo $val . '<br>';
    }
}


mysqli_close($conexion);
?>
