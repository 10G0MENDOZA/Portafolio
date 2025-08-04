<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    $destinatario = "diegomendoza2609@gmail.com";
    $asunto = "Mensaje de contacto Portafolio";

    // Contenido del mensaje correctamente concatenado
    $contenido = "Nombre: $nombre\n";
    $contenido .= "Correo: $email\n";
    $contenido .= "Mensaje:\n$mensaje\n";

    // Cabecera del mensaje
    $headers = "From: $email";

    // Envío del correo
    if (mail($destinatario, $asunto, $contenido, $headers)) {
        header("Location: contacto_exitoso.php");
        exit();
    } else {
        die("Error al enviar el correo");
    }
}
?>
