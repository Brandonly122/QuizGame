<?php
include('../conexion.php');

$pregunta = "";
$res1 = "";
$res2 = "";
$res3 = "";

$sql = "select * from preguntas p inner join respuestas r on p.idPregunta = r.idQuestion ";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "
        Pregunta: " . $row["descripcionPregunta"]. " - Respuesta 1: " . $row["descripcionRespuesta"].  "<br>
        

        <div class='container'>
            <h2 class='question'>".$row['descripcionPregunta']."</h2>
            <ul class='options'>
                <li class='option'>
                    <input type='radio' name='arrival_time' value='1hour'>
                    <label for='1hour'>".$row['descripcionRespuesta']."</label>
                </li>
                <li class='option'>
                    <input type='radio' name='arrival_time' value='15min'>
                    <label for='15min'>Al menos 15 minutos antes de que comience la clase</label>
                </li>
                <li class='option'>
                    <input type='radio' name='arrival_time' value='10min'>
                    <label for='10min'>10 minutos antes de que comience la clase (10 minutos es un poco rápido para terminar la configuración)</label>
                </li>
                <li class='option'>
                    <input type='radio' name='arrival_time' value='5min'>
                    <label for='5min'>Al menos 5 minutos antes de que comience la clase</label>
                </li>
            </ul>
            <button class='submit-button'>Continuar</button>
        </div>

        ";
    }
} else {
    echo "No se encontraron preguntas";
}
mysqli_close($con);
?>


