<?php
header('Content-Type: text/html; charset=UTF-8');
$con = mysqli_connect('localhost', 'root', '', 'intercartonpruebas') or die(mysqli_error($mysqli));
$consulta1=mysqli_query($con,"SELECT MAX(ticketID) as ticketID from tickets");

while ($mostrar = mysqli_fetch_array($consulta1)) 
                         {
$ticketID=$mostrar['ticketID'];
                         }

                       

                         
$correo = $_REQUEST['correo'];
$consulta1=mysqli_query($con,"SELECT * from empleados where empleadoID='$correo'");

while ($mostrar = mysqli_fetch_array($consulta1)) 
                         {
$nombre=$mostrar['nombre'].' '.$mostrar['apellidos'];
                         }
$correoenvio='intercarton@gmail.com';
// Crea el correo electrónico y envía el mensaje
$to = 'tickets@intercarton.com.mx'; // Agregua tu dirección de correo electrónico entre el "" reemplazando msevillab@gmail.com - Aquí es donde el formulario enviará un mensaje.
$email_subject = 'Nuevo ticket';
$email_body = 'El usuario '.$correo.' ha creado un nuevo ticket favor de revisar la aplicación,\n\n
http://192.168.1.6:8080/PruebasIntercartonBueno/vistas/infoTickets.php?buscarTicket='.$ticketID.'&correo=tickets@intercarton.com.mx&estado=0';

$headers = "FROM: ".$correoenvio.";".$correo; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.

mail($to,$email_subject,$email_body,$headers);
echo "Tu correo ha sido enviado";
header('location: ../vistas/levantarTicket.php?correo=' . $correo);



$correoenvio='intercarton@gmail.com';
// Crea el correo electrónico y envía el mensaje
$to = 'tickets@intercarton.com.mx'; // Agregua tu dirección de correo electrónico entre el "" reemplazando msevillab@gmail.com - Aquí es donde el formulario enviará un mensaje.
$email_subject = 'Nuevo ticket';
$email_body = "Estimado/a ".$nombre.",\n\n\nTu ticket ha sido creado y enviado al area de sistemas, su ID es ".$ticketID."\n\n Puedes visualizar su estado en el siguiente link: \n";
$email_body.="http://192.168.1.6:8080/PruebasIntercartonBueno/vistas/infoTicketsUsuario.php?buscarTicket=".$ticketID."&correo=".$correo."&estado=0";

$email_body.="\n\nAgradecemos tu paciencia, pronto nos pondremos en contacto contigo :D\n";
$email_body.="\n\n\nContacto:\ntickets@intercarton.com.mx\nExt.129 Oscar Hernandez\nExt.131 Arturo Jimenez\n";
$headers = "FROM: ".$correoenvio.";".$correo; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.

mail($correo,$email_subject,$email_body,$headers);




header('location: ../vistas/levantarTicket.php?correo=' . $correo);
return true;			
?>