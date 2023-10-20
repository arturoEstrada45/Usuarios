<?php
$con = mysqli_connect('localhost', 'root', '', 'intercartonpruebas') or die(mysqli_error($mysqli));
$consulta1=mysqli_query($con,"SELECT MAX(ticketID) as ticketID from tickets");

while ($mostrar = mysqli_fetch_array($consulta1)) 
                         {
$ticketID=$mostrar['ticketID'];
                         }

                         
$correo = $_REQUEST['correo'];
$correoenvio='intercarton@gmail.com';
// Crea el correo electrónico y envía el mensaje
$to = 'tickets@intercarton.com.mx'; // Agregua tu dirección de correo electrónico entre el "" reemplazando msevillab@gmail.com - Aquí es donde el formulario enviará un mensaje.
$email_subject = 'Nuevo ticket';
$email_body = 'El usuario '.$correo.' ha creado un nuevo ticket favor de revisar la aplicación,\n\n
http://192.168.1.6:8080/PruebasIntercartonBueno/vistas/infoTickets.php?buscarTicket='.$ticketID.'&correo=pruebas@intercarton.com.mx&estado=0';

$headers = "FROM: ".$correoenvio.";".$correo; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.

mail($to,$email_subject,$email_body,$headers);
echo "Tu correo ha sido enviado";
header('location: ../vistas/levantarTicket.php?correo=' . $correo);
return true;			
?>