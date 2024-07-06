
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar y sanitizar los datos del formulario
    $nombreapellido = filter_var(trim($_POST["nombreapellido"]), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $mensajecontacto = filter_var(trim($_POST["mensajecontacto"]), FILTER_SANITIZE_STRING);

    // Validación adicional
    if (empty($nombreapellido) || empty($email) || empty($mensajecontacto) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Datos no válidos. Por favor, complete todos los campos y proporcione un correo electrónico válido.";
        exit;
    }

    // Configuración del correo
    $to = "ssydconsultorao@gmail.com"; // Reemplaza con tu correo
    $subject = "Mensaje de $nombreapellido";
    $body = "Nombre: $nombreapellido\nCorreo Electrónico: $email\n\nMensaje:\n$mensajecontacto";
    $headers = "From: $email";

    // Enviar el correo
    if (mail($to, $subject, $body, $headers)) {
        echo "Mensaje enviado exitosamente!";
    } else {
        echo "Error al enviar el mensaje. Inténtalo de nuevo más tarde.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>
