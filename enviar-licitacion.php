<?php

// Configuración
$destino = "comercial@domopy.com"; // <-- Cambia esto por tu correo real
$asunto = "Nueva solicitud de licitación desde la web";

// Sanitizar y obtener datos
$nombre   = isset($_POST['nombre'])   ? strip_tags(trim($_POST['nombre']))   : '';
$empresa  = isset($_POST['empresa'])  ? strip_tags(trim($_POST['empresa']))  : '';
$correo   = isset($_POST['correo'])   ? filter_var(trim($_POST['correo']), FILTER_SANITIZE_EMAIL) : '';
$telefono = isset($_POST['telefono']) ? strip_tags(trim($_POST['telefono'])) : '';
$mensaje  = isset($_POST['mensaje'])  ? strip_tags(trim($_POST['mensaje']))  : '';

if ($nombre && $correo && $mensaje) {
    $body = "Nombre: $nombre\n";
    $body .= "Empresa/Institución: $empresa\n";
    $body .= "Correo: $correo\n";
    $body .= "Teléfono: $telefono\n";
    $body .= "Mensaje:\n$mensaje\n";

    $headers = "From: $nombre <$correo>\r\n";
    $headers .= "Reply-To: $correo\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    if (mail($destino, $asunto, $body, $headers)) {
        echo "OK";
    } else {
        echo "Error al enviar el mensaje. Intente más tarde.";
    }
} else {
    echo "Complete todos los campos obligatorios.";
}
?>