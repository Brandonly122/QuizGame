<?php
require_once 'conexion.php';

$query = "SELECT * FROM respuestas";

echo '<h1>Respuestas</h1>
<table class="table">
<thead>
<tr>
<th scope="col">ID</th>
<th scope="col">Respuesta</th>
<th scope="col">ID Pregunta</th>
</tr>
</thead>
<tbody>';

$resultado = mysqli_query($conexion, $query);

while($respuesta = mysqli_fetch_assoc($resultado)){
    echo '<tr>
    <th scope="row">'.$respuesta['id_respuesta'].'</th>
    <td>'.$respuesta['respuesta'].'</td>
    <td>'.$respuesta['id_pregunta'].'</td>
    </tr>';
}
echo '</tbody></table>';
?>
