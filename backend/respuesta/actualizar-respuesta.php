<?php
if(isset($_POST)){
    require_once 'conexion.php';

    // Obtener y validar los datos de la respuesta a actualizar
    $id_respuesta = isset($_POST['id_respuesta']) ? mysqli_real_escape_string($conexion, $_POST['id_respuesta']) : false;
    $respuesta = isset($_POST['respuesta']) ? mysqli_real_escape_string($conexion, $_POST['respuesta']) : false;
    $id_pregunta = isset($_POST['id_pregunta']) ? mysqli_real_escape_string($conexion, $_POST['id_pregunta']) : false;

    $error = array();

    if(empty($id_respuesta) || !is_numeric($id_respuesta)){
        $error['id_respuesta'] = "El ID de la respuesta no es válido";
    }

    if(empty($respuesta)){
        $error['respuesta'] = "La respuesta no puede estar vacía";
    }

    if(empty($id_pregunta) || !is_numeric($id_pregunta)){
        $error['id_pregunta'] = "El ID de la pregunta no es válido";
    }

    // Si no hay errores, actualizar la respuesta en la base de datos
    if (count($error) == 0){
        $sql = "UPDATE respuestas SET respuesta = '$respuesta', id_pregunta = '$id_pregunta' WHERE id_respuesta = $id_respuesta";

        // Ejecutar la consulta SQL
        $query = mysqli_query($conexion, $sql);

        if ($query) {
            $respuesta = array(
                'status' => 'success',
                'message' => 'Respuesta actualizada exitosamente'
            );
        } else {
            $respuesta = array(
                'status' => 'error',
                'code' => 500,
                'message' => 'Error en la consulta SQL: ' . mysqli_error($conexion)
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
