<?php
// filepath: c:\Users\DomoPy\Downloads\pagina domopy\enviar-licitacion.php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Incluye los archivos de PHPMailer
require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

// Configuración SMTP
$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host       = 'mail.domopy.com'; // Cambia si usas otro proveedor
    $mail->SMTPAuth   = true;
    $mail->Username   = 'web@domopy.com'; // Tu correo SMTP
    $mail->Password   = '0981@contra';       // Tu contraseña SMTP
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    // Sanitizar y obtener datos
    $nombre   = isset($_POST['nombre'])   ? strip_tags(trim($_POST['nombre']))   : '';
    $empresa  = isset($_POST['empresa'])  ? strip_tags(trim($_POST['empresa']))  : '';
    $correo   = isset($_POST['correo'])   ? filter_var(trim($_POST['correo']), FILTER_SANITIZE_EMAIL) : '';
    $mensaje  = isset($_POST['mensaje'])  ? strip_tags(trim($_POST['mensaje']))  : '';

    if ($nombre && $correo && $mensaje) {
        $mail->setFrom('web@domopy.com', 'DomoPy Web');
        $mail->addReplyTo($correo, $nombre);
        $mail->addAddress('henryzapata95@gmail.com');
        //$mail->addAddress('comercial@domopy.com');
        $mail->Subject = 'Nueva solicitud desde la web';

        // Cambia a HTML
        $mail->isHTML(true);
        $body = '
        <div style="font-family: Arial, sans-serif; color: #222; width:100%; min-width:0; margin:32px auto; border-radius:10px; border:1px solid #eee; box-shadow:0 2px 8px #eee; background:#fff; max-width:1100px;">
            <h2 style="color: #0d6efd; border-bottom:1px solid #eee; padding:24px 4vw 8px 4vw; margin:0; font-size:2em; box-sizing:border-box;">Detalles de la solicitud</h2>
            <div style="padding: 0 4vw 32px 4vw; box-sizing:border-box;">
                <p style="margin-bottom:8px;"><strong>Nombre y Apellido:</strong> ' . htmlspecialchars($nombre) . '</p>
                <p style="margin-bottom:8px;"><strong>Empresa/Institución:</strong> ' . htmlspecialchars($empresa) . '</p>
                <p style="margin-bottom:8px;"><strong>Correo:</strong> ' . htmlspecialchars($correo) . '</p>
                <div style="background:#f8f9fa; border-radius:8px; padding:18px; margin:20px 0 12px 0; border:1px solid #e3e3e3;">
                    <strong>Mensaje:</strong>
                    <div style="margin-top:8px; white-space:pre-line; word-break:break-word; font-size:1.08em; color:#333;">
                        ' . nl2br(htmlspecialchars($mensaje)) . '
                    </div>
                </div>
                <hr style="margin:24px 0 12px 0; border:0; border-top:1px solid #eee;">
                <p style="font-size:12px;color:#888; margin:0;">Este mensaje fue enviado desde el formulario de <a href="https://www.domopy.com" style="color:#0d6efd;text-decoration:none;">domopy.com</a></p>
            </div>
        </div>
        ';

        $mail->Body = $body;

        $mail->send();
        echo "OK";
    } else {
        echo "Complete todos los campos obligatorios.";
    }
} catch (Exception $e) {
    echo "Error al enviar el mensaje: " . $mail->ErrorInfo;
}
?>