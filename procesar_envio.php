<?php
// Importa las clases necesarias de PHPMailer desde la carpeta local (sin usar Composer)
require 'PHPMailer/PHPMailer.php';      // Clase principal PHPMailer
require 'PHPMailer/SMTP.php';           // Clase para el envío vía SMTP
require 'PHPMailer/Exception.php';      // Clase que maneja errores y excepciones de PHPMailer

// Verifica si el formulario fue enviado mediante POST
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Escapa caracteres peligrosos para evitar XSS (ataques de inyección)
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Verifica que ningún campo esté vacío
    if (empty($nombre) || empty($email) || empty($mensaje)) {
        die("Por favor, completa todos los campos.");
    }
    // Valida que el correo tenga un formato válido
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Correo electrónico no válido.");
    }

    // Crea una nueva instancia de PHPMailer, activando el modo de errores (true)
    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

    try {
        // ============================
        // CONFIGURACIÓN DEL SERVIDOR SMTP
        // ============================

        $mail->isSMTP();                                      // Usa SMTP (en vez de mail() de PHP)
        $mail->Host = 'smtp.gmail.com';                       // Servidor SMTP de Gmail
        $mail->SMTPAuth = true;                               // Activa autenticación SMTP
        $mail->Username = 'diegomendoza2609@gmail.com';
        $mail->Password = 'mwxe pizy azey ufqz';                // Contraseña de aplicación de Gmail
        $mail->SMTPSecure = 'tls';                            // Cifrado TLS (STARTTLS)
        $mail->Port = 587;                                    // Puerto TLS de Gmail

        // ============================
        // CONFIGURACIÓN DEL MENSAJE
        // ============================

        $mail->setFrom($email, $nombre);                      // Remitente: quien llena el formulario
        $mail->addAddress('diegomendoza2609@gmail.com', 'Diego'); // Destinatario: tú

        $mail->Subject = 'Mensaje de contacto Portafolio';    // Asunto del correo
        $mail->Body = "Nombre: $nombre\nCorreo: $email\nMensaje:\n$mensaje"; // Cuerpo del mensaje (texto plano)

        // Envía el correo
        $mail->send();

        // Redirige al usuario a una página de éxito si todo salió bien
        header("Location: contacto_exitoso.html");
        exit();

    } catch (Exception $e) {
        // Captura cualquier error al enviar el correo
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}
?>