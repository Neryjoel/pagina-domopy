<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Incluye los archivos de PHPMailer
require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

// ✅ Validar reCAPTCHA ANTES DE NADA
$recaptcha_secret = "6Ld9VH4rAAAAAOYCj3qFbm6iwvpgBrsEAnTZn1pA";
$recaptcha_response = $_POST['g-recaptcha-response'] ?? '';

$verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$recaptcha_secret}&response={$recaptcha_response}");
$response = json_decode($verify);

if (!$response->success) {
    echo "ERROR: reCAPTCHA fallido.";
    exit;
}


// ✅ Si pasó el reCAPTCHA, continuar con PHPMailer
$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host       = 'mail.domopy.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'paginaweb@domopy.com';
    $mail->Password   = '0981@contra';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    // Sanitizar
    $nombre   = isset($_POST['nombre'])   ? strip_tags(trim($_POST['nombre']))   : '';
    $empresa  = isset($_POST['empresa'])  ? strip_tags(trim($_POST['empresa']))  : '';
    $correo   = isset($_POST['correo'])   ? filter_var(trim($_POST['correo']), FILTER_SANITIZE_EMAIL) : '';
    $mensaje  = isset($_POST['mensaje'])  ? strip_tags(trim($_POST['mensaje']))  : '';

    if ($nombre && $correo && $mensaje) {
        $mail->setFrom('web@domopy.com', 'DomoPy Web');
        $mail->addReplyTo($correo, $nombre);
        $mail->addAddress('paginaweb@domopy.com');
        $mail->Subject = 'Nueva solicitud desde la web';

        $mail->isHTML(true);
        $mail->Body = '
        <div style="font-family: Arial; color: #222; max-width:1100px; margin:32px auto;">
            <h2 style="color: #0d6efd;">Detalles de la solicitud</h2>
            <p><strong>Nombre:</strong> ' . htmlspecialchars($nombre) . '</p>
            <p><strong>Empresa:</strong> ' . htmlspecialchars($empresa) . '</p>
            <p><strong>Correo:</strong> ' . htmlspecialchars($correo) . '</p>
            <div style="background:#f8f9fa; padding:18px; margin:20px 0;">
                <strong>Mensaje:</strong><br>' . nl2br(htmlspecialchars($mensaje)) . '
            </div>
            <small>Mensaje enviado desde <a href="https://www.domopy.com">domopy.com</a></small>
        </div>';

        $mail->send();
        echo "OK";
    } else {
        echo "Complete todos los campos obligatorios.";
    }
} catch (Exception $e) {
    echo "Error al enviar el mensaje: " . $mail->ErrorInfo;
}
?>
