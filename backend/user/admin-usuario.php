<?php
// Nombre de usuario y contraseña del administrador (cámbialos según tus necesidades)
$adminName = "admin";
$adminPassword = "admin12345";

// Verificar si se recibieron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $inputAdminName = $_POST["adminName"];
    $inputAdminPassword = $_POST["adminPassword"];

    // Verificar si las credenciales coinciden con las del administrador
    if ($inputAdminName === $adminName && $inputAdminPassword === $adminPassword) {
        // Inicio de sesión exitoso
        // Redireccionar al usuario a admin.html
        header("Location: ../../frontend/html/administrador/admin.html");
        exit; // Asegúrate de terminar la ejecución del script después de la redirección
    } else {
        // Credenciales incorrectas
        echo "Nombre de usuario o contraseña incorrectos.";
    }
}
?>
