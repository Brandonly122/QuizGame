<?php
include('conexion.php');

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha proporcionado una pregunta
    if (!empty($_POST["pregunta"])) {
        // Escapar la pregunta para evitar inyección SQL
        $pregunta = mysqli_real_escape_string($con, $_POST["pregunta"]);

        // Insertar la pregunta en la base de datos
        $sql = "INSERT INTO Preguntas (descripcionPregunta) VALUES ('$pregunta')";

        if (mysqli_query($con, $sql)) {
            echo "La pregunta se ha creado correctamente.";
        } else {
            echo "Error al crear la pregunta: " . mysqli_error($con);
        }
    } else {
        echo "Por favor, proporcione una pregunta.";
    }
}
?>
