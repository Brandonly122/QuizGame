<?php
require_once 'conexion.php';
$query = "SELECT * FROM preguntas";

echo '<h1>preguntas</h1>
<table class="table">
<thead>
<tr>
<th scope="col">ID</th>
<th scope="col"Pregunta</th>
<th scope="col">Imagen</th>
</tr>
</thead>
<tbody>';

while($pregunta = mysqli_fetch_assoc($query)){
    echo '<tr>
    <th scope="row">'.$pregunta['id'],'</th>
    <td>'.$pregunta['pregunta'],'</td>
    <td>'.$pregunta['imagen'],'</td>
    </tr>';
}
echo '</tbody></table>';
?>




