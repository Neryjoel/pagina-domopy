<?php
// filepath: c:\Users\DomoPy\Downloads\pagina domopy\enviar-licitacion.php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\STMP;
use PHPMailer\PHPMailer\Exception;

// Incluye los archivos de PHPMailer
require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

// Configuración SMTP (ejemplo con Gmail)
$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host       = 'mail@domopy.com'; // Cambia si usas otro proveedor
    $mail->SMTPAuth   = true;
    $mail->Username   = 'prueba@domopy.com'; // Cambia por tu correo SMTP
    $mail->Password   = '0981@contra';  // Contraseña de aplicación Gmail
    $mail->SMTPSecure = tls;
    $mail->Port       = 465;

    // Sanitizar y obtener datos
    $nombre   = isset($_POST['nombre'])   ? strip_tags(trim($_POST['nombre']))   : '';
    $empresa  = isset($_POST['empresa'])  ? strip_tags(trim($_POST['empresa']))  : '';
    $correo   = isset($_POST['correo'])   ? filter_var(trim($_POST['correo']), FILTER_SANITIZE_EMAIL) : '';
    $telefono = isset($_POST['telefono']) ? strip_tags(trim($_POST['telefono'])) : '';
    $mensaje  = isset($_POST['mensaje'])  ? strip_tags(trim($_POST['mensaje']))  : '';

    if ($nombre && $correo && $mensaje) {
        $mail->setFrom($correo, $nombre);
        $mail->addAddress('henryzapata95@gmail.com'); // Destinatario
        $mail->Subject = 'Nueva solicitud de licitación desde la web';

        $body = "Nombre: $nombre\n";
        $body .= "Empresa/Institución: $empresa\n";
        $body .= "Correo: $correo\n";
        $body .= "Teléfono: $telefono\n";
        $body .= "Mensaje:\n$mensaje\n";

        $mail->Body = $body;

        $mail->send();
        echo "OK";
    } else {
        echo "Complete todos los campos obligatorios.";
    }
} catch (Exception $e) {
    echo "Error al enviar el mensaje. Intente más tarde.";
}
?>