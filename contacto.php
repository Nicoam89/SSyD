<?php

if (isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['mensaje'])) {

  // Validar datos (opcional)

  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
  $mensaje = $_POST['mensaje'];

  // Enviar correo electrónico
  $para = "ssydconsultora@gmail.com";
  $asunto = "Contacto web - " . $email;
  $cuerpo = "Nombre: $nombre \nCorreo electrónico: $email \nMensaje: $mensaje";
  $cabecera = "MIME-Version: 1.0\nContent-Type: text/plain; charset=UTF-8\nFrom: $nombre <$email>\n";

  if (mail($para, $asunto, $cuerpo, $cabecera)) {
    echo header('Location: pages/contacto-correcto.html');

  } else {
    echo header('Location: pages/contacto-error1.html');
  }
} else {
  echo header('Location: pages/contacto-error2.html');
}

?>
