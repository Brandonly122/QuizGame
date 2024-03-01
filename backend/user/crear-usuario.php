<?php

$conexion = mysqli_connect("localhost", "root", "", "quizz");


if (!$conexion) {
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
}

$errores = array();

if (empty($name)) {
    $errores['name'] = "El nombre no puede estar vacío";
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores['email'] = "El correo electrónico no es válido";
}

if (empty($password)) {
    $errores['password'] = "La contraseña no puede estar vacía";
} else {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
}

if (!isset($isAdmin) || !is_numeric($isAdmin)) {
    $errores['isAdmin'] = "El valor de isAdmin no es válido";
}

if (empty($errores)) {
    $sql = "INSERT INTO user (name, email, password, isAdmin) VALUES ('$name', '$email', '$hashed_password', $isAdmin)";
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
