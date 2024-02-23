<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.resend.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'resend';                     //SMTP username
    $mail->Password   = 're_WLMJJwhp_J4msocUXDGsLkG9e7G5QEMMk';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('onboarding@resend.dev', 'Resend');
    $mail->addAddress('brunopercara@gmail.com', 'Bruno');     //Add a recipient
    $mail->addAddress('natcatalano@gmail.com');               //Name is optional
 

    //Content
    $mail->isHTML(true); 
    $mail->CharSet = 'UTF-8';                                 //Set email format to HTML
    $mail->Subject = 'Test';
    $mail->Body    = 'Has recibido un mensaje del formulario de contacto:<br><br>' .
    '<strong>Nombre:</strong> ' . $_POST['name'] . '<br>' .
    '<strong>Correo electrónico:</strong> ' . $_POST['email'] . '<br>' .
    '<strong>Teléfono:</strong> ' . $_POST['telefono'];

    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );        

    // CORS headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Content-Type");

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}