<?php
// Importar la librería PHPMailer
require 'phpmailer/PHPMailerAutoload.php';

// Recibir los datos del formulario
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Configuración de envío de correo
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.example.com'; // Servidor SMTP del correo saliente
$mail->SMTPAuth = true;
$mail->Username = 'tu-correo@example.com'; // Correo electrónico desde el cual se enviarán los mensajes
$mail->Password = 'tu-contraseña'; // Contraseña del correo electrónico
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

// Configurar el remitente y destinatario del correo
$mail->setFrom('tu-correo@example.com', 'Nombre del remitente'); // Remitente
$mail->addAddress('destinatario@example.com', 'Nombre del destinatario'); // Destinatario

// Configurar el contenido del correo
$mail->Subject = 'Mensaje de contacto';
$mail->Body = "Nombre: $name\nEmail: $email\nTeléfono: $phone\nAsunto: $subject\nMensaje: $message";

// Enviar el correo electrónico
if ($mail->send()) {
  echo 'Mensaje enviado correctamente';
} else {
  echo 'Error al enviar el mensaje: ' . $mail->ErrorInfo;
}
?>
