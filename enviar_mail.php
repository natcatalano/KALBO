<?php
// Verificar si se han enviado datos mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar y limpiar los datos del formulario
    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
    $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);

    // Verificar campos requeridos
    if (!empty($nombre) && !empty($correo) && !empty($telefono)) {
        // Dirección de correo a la que se enviará el formulario (usando una constante)
        define('DESTINATARIO', 'brujoda_8@hotmail.com');
        $destinatario = DESTINATARIO;

        // Asunto del correo (usando una constante)
        define('ASUNTO', 'Nuevo formulario de contacto');
        $asunto = ASUNTO;

        // Construir el cuerpo del mensaje
        $mensaje = "Nuevo formulario de contacto recibido:\n\n";
        $mensaje .= "Nombre: " . $nombre . "\n";
        $mensaje .= "Correo electrónico: " . $correo . "\n";
        $mensaje .= "Teléfono: " . $telefono . "\n";

        // Filtrar y validar cabeceras del correo electrónico
        $correo_filtrado = filter_var($correo, FILTER_SANITIZE_EMAIL);
        $headers = "From: " . $correo_filtrado . "\r\n";
        $headers .= "Reply-To: " . $correo_filtrado . "\r\n";

        // Enviar el correo electrónico
        if (mail($destinatario, $asunto, $mensaje, $headers)) {
            // Si el correo se envía correctamente, puedes redirigir a una página de éxito
            header('Location:gracias.html');
            exit;
        } else {
            // Si hay un error en el envío del correo, puedes redirigir a una página de error
            header('Location:error.html');
            exit;
        }
    } else {
        // Redirigir a una página de error si los campos requeridos están vacíos
        header('Location:error.html');
        exit;
    }
} else {
    // Si no se han enviado datos mediante POST, redirigir a una página de error
    header('Location:error.html');
    exit;
}
?>




