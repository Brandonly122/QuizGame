<?php
require_once 'conexion.php';

$query = "SELECT * FROM preguntas";
$resultado = mysqli_query($conexion, $query);

echo '<h1>Preguntas</h1>
<table class="table">
<thead>
<tr>
<th scope="col">ID</th>
<th scope="col">Pregunta</th> <!-- Corregido aquí -->
<th scope="col">Imagen</th>
</tr>
</thead>
<tbody>';

while($pregunta = mysqli_fetch_assoc($resultado)){ // Corregido aquí
    echo '<tr>
    <th scope="row">'.$pregunta['id'].'</th> <!-- Corregido aquí -->
    <td>'.$pregunta['pregunta'].'</td> <!-- Corregido aquí -->
    <td>'.$pregunta['imagen'].'</td>
    </tr>';
}
echo '</tbody></table>';
?>
