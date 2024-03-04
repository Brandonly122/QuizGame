<?php
include('conexion.php');

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha proporcionado una respuesta, una opción de respuesta y la pregunta asociada
    if (!empty($_POST["respuesta"]) && !empty($_POST["opcionRespuesta"]) && !empty($_POST["idPregunta"])) {
        // Escapar la respuesta y la opción de respuesta para evitar inyección SQL
        $respuesta = mysqli_real_escape_string($con, $_POST["respuesta"]);
        $opcionRespuesta = mysqli_real_escape_string($con, $_POST["opcionRespuesta"]);
        $idPregunta = mysqli_real_escape_string($con, $_POST["idPregunta"]);

        // Insertar la respuesta en la base de datos
        $sql = "INSERT INTO respuestas (descripcionRespuesta, opcionRespuesta, idQuestion) VALUES ('$respuesta', '$opcionRespuesta', '$idPregunta')";

        if (mysqli_query($con, $sql)) {
            echo "La respuesta se ha creado correctamente.";
        } else {
            echo "Error al crear la respuesta: " . mysqli_error($con);
        }
    } else {
        echo "Por favor, proporcione una respuesta, una opción de respuesta y la pregunta asociada.";
    }
}
?>
