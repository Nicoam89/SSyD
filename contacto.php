Tu código PHP es funcional y debería cumplir con el propósito de enviar un correo electrónico desde un formulario web. Aquí tienes algunas recomendaciones y mejoras para asegurar que el código sea más robusto y seguro:

Validación de datos: Es importante validar y sanitizar los datos que provienen de un formulario para evitar posibles ataques como la inyección de correo electrónico.
Manejo de errores: Asegúrate de tener un buen manejo de errores y logueo para diagnosticar posibles problemas.
Uso de filtros de PHP: Utilizar filter_var para validar y sanitizar los datos de entrada.
Escapar salida: Escapar las salidas para prevenir ataques XSS.

Aquí te dejo una versión mejorada:

php

<?php

if (isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['mensaje'])) {

// Validar y sanitizar datos
$nombre = htmlspecialchars(strip_tags(trim($_POST['nombre'])));
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
$mensaje = htmlspecialchars(strip_tags(trim($_POST['mensaje'])));

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
// Email no válido
header('Location: pages/contacto-error3.html');
exit();
}

// Enviar correo electrónico
$para = "ssydconsultora@gmail.com";
$asunto = "Contacto web - " . $email;
$cuerpo = "Nombre: $nombre \nCorreo electrónico: $email \nMensaje: $mensaje";
$cabecera = "MIME-Version: 1.0\nContent-Type: text/plain; charset=UTF-8\nFrom: $nombre <$email>\n";

if (mail($para, $asunto, $cuerpo, $cabecera)) {
header('Location: pages/contacto-correcto.html');
} else {
header('Location: pages/contacto-error1.html');
}
} else {
header('Location: pages/contacto-error2.html');
}

?>
