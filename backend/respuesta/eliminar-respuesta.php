<?php
if(isset($_POST)){
    require_once 'conexion.php';

    // Obtener y validar el ID de la respuesta a eliminar
    $id_respuesta = isset($_POST['id_respuesta']) ? mysqli_real_escape_string($conexion, $_POST['id_respuesta']) : false;

    $error = array();

    if(empty($id_respuesta) || !is_numeric($id_respuesta)){
        $error['id_respuesta'] = "El ID de la respuesta no es válido";
    }

    // Si no hay errores, eliminar la respuesta de la base de datos
    if (count($error) == 0){
        $sql = "DELETE FROM respuestas WHERE id_respuesta = $id_respuesta";

        // Ejecutar la consulta SQL
        $query = mysqli_query($conexion, $sql);

        if ($query) {
            $respuesta = array(
                'status' => 'success',
                'message' => 'Respuesta eliminada exitosamente'
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
