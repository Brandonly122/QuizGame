<?php

$conexion = mysqli_connect("localhost", "root", "", "quizz");


if (!$conexion) {
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
}

$errores = array();

if (empty($name)) {
    $errores['name'] = "El nombre no puede estar vacío";
}

if (empty($password)) {
    $errores['password'] = "La contraseña no puede estar vacía";
} else {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
}

if (empty($errores)) {
    $sql = "INSERT INTO user (name, password) VALUES ('$name','$hashed_password')";
    $guardar = mysqli_query($conexion, $sql);

    if ($guardar) {
        echo "Usuario creado exitosamente.";
    } else {
        echo "Error al crear el usuario: " . mysqli_error($conexion);
    }
} else {
    foreach ($errores as $val) {
        echo $val . '<br>';
    }
}


mysqli_close($conexion);
?>
