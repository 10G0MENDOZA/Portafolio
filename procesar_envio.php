<?php
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    if (empty($nombre) || empty($email) || empty($mensaje)) {
        die("Por favor complete todos los campos");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Por favor ingrese un correo electrónico válido");
    }

    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'diegomendoza2609@gmail.com'; 
        $mail->Password = 'mwxe pizy azey ufqz'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom($email, $nombre);
        $mail->addAddress('diegomendoza2609@gmail.com', 'Diego Mendoza');

        $mail->Subject = 'Mensaje de contacto Portafolio';
        $mail->Body = "Nombre: $nombre\nCorreo: $email\nMensaje:\n$mensaje";

        $mail->send();

        header("Location: contacto_exitoso.html");
        exit();

    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}
?>
