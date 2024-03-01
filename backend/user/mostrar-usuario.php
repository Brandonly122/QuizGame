<?php
$con = mysqli_connect("localhost", "root", "", "quizz");

// Verificar errores de conexión
if (mysqli_connect_errno()) {
    echo "Error al conectar a la base de datos: " . mysqli_connect_error();
} else {
    // Conexión exitosa

    // Consultar todos los usuarios
    $sql = "SELECT * FROM user";
    $result = mysqli_query($con, $sql);

    // Verificar si hay resultados
    if (mysqli_num_rows($result) > 0) {
        // Mostrar encabezado de la tabla
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>isAdmin</th>
                </tr>";

        // Mostrar filas de la tabla
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . $row['id_user'] . "</td>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['isAdmin'] . "</td>
                </tr>";
        }

        // Cerrar la tabla
        echo "</table>";
    } else {
        echo "No hay usuarios en la base de datos.";
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($con);
?>
