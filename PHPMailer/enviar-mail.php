<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Incluir las clases de PHPMailer
require("./PHPMailer/PHPMailer.php");
require("./PHPMailer/SMTP.php");
require("./PHPMailer/Exception.php");

// Obtener los valores de las variables de entorno
$smtpHost = getenv('smtp.resend.com');
$smtpUsuario = getenv('resend');
$smtpClave = getenv('re_WLMJJwhp_J4msocUXDGsLkG9e7G5QEMMk');

// Valores enviados desde el formulario
if (!isset($_POST["name"]) || !isset($_POST["email"]) || !isset($_POST["tel"])) {
    die("Es necesario completar todos los datos del formulario");
}

// Obtener los valores del formulario
$nombre = $_POST["name"];
$email = $_POST["email"];
$telefono = $_POST["tel"];

// Validar los datos del formulario (puedes agregar más validaciones según sea necesario)
if (empty($nombre) || empty($email) || empty($telefono)) {
    die("Todos los campos son obligatorios. Por favor, completa el formulario correctamente.");
}

// Dirección de correo electrónico a la que se enviará el formulario
$destinatario = "brunopercara@gmail.com";


// Crear una nueva instancia de PHPMailer
$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host = $smtpHost; // Aquí define el host SMTP correcto
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUsuario; // Aquí define el nombre de usuario SMTP correcto
    $mail->Password = $smtpClave; // Aquí define la contraseña SMTP correcta
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    // Configuración del remitente y destinatario
    $mail->setFrom($email, $nombre);
    $mail->addAddress($destinatario);

    // Configuración del contenido del correo
    $mail->isHTML(true);
    $mail->Subject = "Formulario desde el Sitio Web";
    $mail->Body = "
        <html>
        <body>
        <h1>Recibiste un nuevo mensaje desde el formulario de contacto</h1>
        <p>Información enviada por el usuario de la web:</p>
        <p>Nombre: {$nombre}</p>
        <p>Email: {$email}</p>
        <p>Teléfono: {$telefono}</p>
        </body>
        </html>
        <br />";

    // Enviar el correo electrónico
    $mail->send();
    echo "El correo fue enviado correctamente.";
} catch (Exception $e) {
    // Manejar cualquier error que pueda ocurrir durante el envío del correo electrónico
    echo "Ocurrió un error inesperado: {$mail->ErrorInfo}";
}
