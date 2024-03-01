<?php
if(isset($_POST)){
    require_once 'conexion.php';

    // Obtener y validar datos
    $pregunta = isset($_POST['pregunta']) ? mysqli_real_escape_string($con, $_POST['pregunta']) : false;
    $imagen = isset($_POST['imagen']) ? mysqli_real_escape_string($con, $_POST['imagen']) : false;

    $error = array();

    if(empty($pregunta)){
        $error['pregunta'] = "La pregunta no puede estar vacía";
    }

    if(empty($imagen)){
        $error['imagen'] = "La imagen no puede estar vacía";
    }

    // Si no hay errores, insertar la pregunta en la base de datos
    if (count($error) == 0){
        $sql = "INSERT INTO preguntas VALUES (null, '$pregunta', '$imagen')";

        // Ejecutar la consulta SQL
        $query = mysqli_query($con, $sql);

        if ($query) {
            $respuesta = array(
                'status' => 'success',
                'message' => 'Pregunta creada exitosamente'
            );
        } else {
            $respuesta = array(
                'status' => 'error',
                'code' => 500,
                'message' => 'Error en la consulta SQL: ' . mysqli_error($con)
            );
        }
    } else {
        // Si hay errores en los datos, construir respuesta de error
        $respuesta = array(
            'status' => 'error',
            'code' => 400,
            'message' => 'Error en los datos',
            'error' => $error
        );
    }

    // Devolver respuesta como JSON
    echo json_encode($respuesta);
}
?>
