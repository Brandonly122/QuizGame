<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Preguntas</title>
    <link rel="stylesheet" href="../../../frontend/css/preguntas.css">
    <!-- Agrega tus estilos CSS aquí -->
</head>
<body>

<?php
include('../conexion.php');

// Consulta SQL para obtener 5 preguntas aleatorias
$sql = "SELECT * FROM preguntas ORDER BY RAND() LIMIT 5";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $preguntaId = $row['idPregunta'];
?>
    <div class='container'>
        <h2 class='question'><?php echo $row['descripcionPregunta']; ?></h2>
        <ul class='options'>
<?php
        $respuestasSql = "SELECT * FROM respuestas WHERE idQuestion = $preguntaId";
        $respuestasResult = mysqli_query($con, $respuestasSql);
        while ($respuesta = mysqli_fetch_assoc($respuestasResult)) {
?>
            <li class='option' data-correcta="<?php echo $respuesta['opcionRespuesta'] == 'V' ? 'true' : 'false'; ?>">
                <input type='radio' name='pregunta_<?php echo $preguntaId; ?>' value='<?php echo $respuesta['idRespuesta']; ?>'>
                <label for='<?php echo $respuesta['idRespuesta']; ?>'><?php echo $respuesta['descripcionRespuesta']; ?></label>
                <span class="respuesta-icon"></span>
            </li>
<?php
        }
?>
        </ul>
        <button class='submit-button' data-id="<?php echo $preguntaId; ?>">Continuar</button>
    </div>
<?php
    }
} else {
    echo "No se encontraron preguntas";
}

mysqli_close($con);
?>

<script>
    // Agrega un evento de clic a todas las etiquetas de opciones
    const labels = document.querySelectorAll('.options label');
    labels.forEach(label => {
        label.addEventListener('click', function() {
            const radio = this.previousElementSibling; // Obtener el radio button previo a la etiqueta
            const allRadios = document.querySelectorAll(`input[name='${radio.name}']`); // Obtener todos los radios con el mismo nombre
            allRadios.forEach(r => {
                r.checked = false; // Desmarcar todos los radios
                const li = r.closest('li'); // Obtener el elemento li padre
                li.style.backgroundColor = ''; // Reiniciar el color de fondo de la opción
                li.querySelector('.respuesta-icon').classList.remove('visto', 'error'); // Ocultar los iconos
            });
            radio.checked = true; // Seleccionar el radio button al hacer clic en la etiqueta
            const li = radio.closest('li'); // Obtener el elemento li padre
            li.style.backgroundColor = 'lightblue'; // Cambiar el color de fondo de la opción seleccionada
        });
    });

    // Agrega un evento de clic a todos los botones "Continuar"
    const buttons = document.querySelectorAll('.submit-button');
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            const preguntaId = this.getAttribute('data-id');
            const opciones = document.querySelectorAll(`input[name='pregunta_${preguntaId}']`);
            opciones.forEach(opcion => {
                const li = opcion.closest('li');
                const esCorrecta = li.getAttribute('data-correcta') === 'true';
                if (opcion.checked) {
                    // Marcar visualmente la respuesta seleccionada como correcta o incorrecta
                    if (esCorrecta) {
                        li.style.backgroundColor = 'lightgreen'; // Respuesta correcta
                        li.querySelector('.respuesta-icon').classList.add('visto'); // Mostrar el icono de visto
                    } else {
                        li.style.backgroundColor = 'pink'; // Respuesta incorrecta
                        li.querySelector('.respuesta-icon').classList.add('error'); // Mostrar el icono de error
                    }
                }
            });
        });
    });
</script>

</body>
</html>
