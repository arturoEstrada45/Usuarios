<?php
                         
$correo = $_REQUEST['correo'];
$cambios=$_REQUEST['cambios'];
$correoenvio='intercarton@gmail.com';
// Crea el correo electrónico y envía el mensaje
$to = 'tickets@intercarton.com.mx'; // Agregua tu dirección de correo electrónico entre el "" reemplazando msevillab@gmail.com - Aquí es donde el formulario enviará un mensaje.
$email_subject = 'Cambios o Sugerencias';
$email_body = 'El usuario '.$correo.' tiene una sugerencia '.$cambios;

$headers = "FROM: ".$correoenvio.";".$correo; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.

mail($to,$email_subject,$email_body,$headers);
echo "Tu correo ha sido enviado".$cambios;
header('location: ../vistas/levantarTicket.php?correo=' . $correo);
return true;			
?>