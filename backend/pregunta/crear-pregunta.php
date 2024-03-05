<?php
include('../conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pregunta = mysqli_real_escape_string($con, $_POST["pregunta"]);
    $res1= mysqli_real_escape_string($con, $_POST["respuestaA"]);
    $res2= mysqli_real_escape_string($con, $_POST["respuestaB"]);
    $res3= mysqli_real_escape_string($con, $_POST["respuestaC"]);
    $val= mysqli_real_escape_string($con, $_POST["respuestaCorrecta"]);

    $errores = array();

    if (empty($pregunta)) {
        $errores['pregunta'] = "La pregunta no puede estar vacío";
    }
  
    if (empty($errores)) {
        $sql = "INSERT INTO Preguntas (descripcionPregunta) VALUES ('$pregunta');
        CALL proc_insertar_respuestas((SELECT MAX(idPregunta) FROM preguntas), '$res1', '$res2', '$res3', '$val');";
        

        if ($con->multi_query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
    } else {
        echo "Por favor, proporcione una pregunta.";
    }
}
$con->close();
?>