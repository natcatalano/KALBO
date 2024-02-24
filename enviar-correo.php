<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if (!isset($_POST["name"]) || !isset($_POST["email"]) || !isset($_POST["telefono"])) {
    die("Es necesario completar todos los datos del formulario");
}
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host = '';                     //Set the SMTP server to send through
    $mail->SMTPAuth = true;                                   //Enable SMTP authentication
    $mail->Username = '';                     //SMTP username
    $mail->Password = '';                               //SMTP password
    $mail->SMTPSecure = '';            //Enable implicit TLS encryption
    $mail->Port = ;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('', '');
    $mail->addAddress('', '');     //Add a recipient
    $mail->addAddress('');               //Name is optional

    // Validar y filtrar los datos del formulario
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : '';
    $telefono = isset($_POST['telefono']) ? htmlspecialchars($_POST['telefono']) : '';

    // Contenido del correo
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = 'Mensaje de contacto';
    $mail->Body = 'Has recibido un mensaje del formulario de contacto:<br><br>' .
        '<strong>Nombre:</strong> ' . $name . '<br>' .
        '<strong>Correo electrónico:</strong> ' . $email . '<br>' .
        '<strong>Teléfono:</strong> ' . $telefono;


    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    // Enviar correo electrónico
    $mail->send();
    echo 'Mensaje enviado exitosamente';

    // Redirigir a la página de inicio
    header("Location: index.html");
    exit; // Asegura que el script se detiene después de la redirección

} catch (Exception $e) {
    // Registrar errores en un archivo de registro
    error_log("Error de envío de email: " . $e->getMessage(), 0);
    echo "El mensaje no fue enviado. Por favor intente más tarde.";
    header("Location: index.html");
    exit;
}
