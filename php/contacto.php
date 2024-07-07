<?php

$nombreapellido = $_POST['nombreapellido'];
$email = $_POST['email'];
$mensajecontacto = $_POST['mensajecontacto'];

$formcontent="
    Nombre: $nombreapellido \n
    E-mail: $email \n
    Mensaje: $mensajecontacto

";

$recipient = "ssydssydconsultora@gmail.com";

$subject = "Nueva Consulta de $email";

$header = "From: $email \r\n";
$header .= "Content-Type: text/plain; charset=UTF-8";
mail($recipient, $subject, $formcontent, $header) or die("Error!");
header("Location: index.html");

?>