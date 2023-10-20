<?php
class Sistema
{

    public static function iniciaSesion($correo, $contrasenia,$con)
    {
        $consulta1 = mysqli_query($con, "SELECT * from empleados WHERE empleadoID='$correo'
                                                AND contrasenia='$contrasenia'");
        $numeroDatos= mysqli_num_rows($consulta1);
        if($numeroDatos==1){
            
            header('location: ../vistas/levantarTicket.php?correo=' . $correo);
        } else{
            header('location: ../vistas/index.php?estado=' . "Correo o contraseña incorrectos.");
        }
       
    }
    public static function levantaTicket($asunto, $descripcion,$correo,$prioridad,$imgContenido,$archivo_tipo,$nombre,$documentContenido,$archivo_tipoDocument,$nombreDocument,$con)
    {
        try{
        $consulta1 = mysqli_query($con, "SELECT * from tickets");
        $numeroDatos= mysqli_num_rows($consulta1)+1;
        $soporteID="pruebas@intercarton.com.mx";
        $estado="Activo";
        $fechaAlta=date('Y-m-d');
        
        $consulta4 = mysqli_query($con, "SELECT * from img");
        $numeroDatosIMG= mysqli_num_rows($consulta4)+1;
        $consulta2 = mysqli_query($con,"INSERT INTO tickets(ticketID,asunto,descripcion,solicitanteID,estado,prioridad,soporteID,fechaAlta) VALUES ($numeroDatos,'$asunto','$descripcion','$correo','$estado','$prioridad','$soporteID','$fechaAlta')");
        $consulta3 = mysqli_query($con,"INSERT INTO img(imagenID,imagenes,ticketID,tipo,nombre) VALUES ($numeroDatosIMG,'$imgContenido','$numeroDatos','$archivo_tipo','$nombre')");
       $numeroDatosIMG=$numeroDatosIMG+1;
        $consultaDocument = mysqli_query($con,"INSERT INTO img(imagenID,imagenes,ticketID,tipo,nombre) VALUES ($numeroDatosIMG,'$documentContenido','$numeroDatos','$archivo_tipoDocument','$nombreDocument')");
        
        if($consulta3 && $consultaDocument){
            $descripcion="Ticket de ".$correo;
            $estadoNoti="No leido";
            $ingresaNoti = mysqli_query($con,"INSERT INTO notificaciones(descripcion,estado,fecha) VALUES ('$descripcion','$estadoNoti','$fechaAlta')");
            header('location: ../mail/contact_me.php?correo=' . $correo);
        }
        }catch (Exception $e){
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        
    }
    public static function levantaTicketSinArchivo($asunto, $descripcion,$correo,$prioridad,$imgContenido,$archivo_tipo,$nombre,$con)
    {
        try{
        $consulta1 = mysqli_query($con, "SELECT * from tickets");
        $numeroDatos= mysqli_num_rows($consulta1)+1;
        $soporteID="pruebas@intercarton.com.mx";
        $estado="Activo";
        $consulta4 = mysqli_query($con, "SELECT * from img");
        $numeroDatosIMG= mysqli_num_rows($consulta4)+1;
        $fechaAlta=date('Y-m-d');
        $consulta2 = mysqli_query($con,"INSERT INTO tickets(ticketID,asunto,descripcion,solicitanteID,estado,prioridad,soporteID,fechaAlta) VALUES ($numeroDatos,'$asunto','$descripcion','$correo','$estado','$prioridad','$soporteID','$fechaAlta')");
       $consulta3 = mysqli_query($con,"INSERT INTO img(imagenID,imagenes,ticketID,tipo,nombre) VALUES ($numeroDatosIMG,'$imgContenido','$numeroDatos','$archivo_tipo','$nombre')");
       
        if($consulta3){
            $descripcion="Ticket de ".$correo;
            
            $estadoNoti="No leido";
            $ingresaNoti = mysqli_query($con,"INSERT INTO notificaciones(descripcion,estado,fecha) VALUES ('$descripcion','$estadoNoti','$fechaAlta')");
            header('location: ../mail/contact_me.php?correo=' . $correo);
        }
        }catch (Exception $e){
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        
    }

    public static function levantaTicketSinImagen($asunto, $descripcion,$correo,$prioridad,$documentContenido,$archivo_tipoDocument,$nombreDocument,$con)
    {
        try{
        $consulta1 = mysqli_query($con, "SELECT * from tickets");
        $numeroDatos= mysqli_num_rows($consulta1)+1;
        $soporteID="pruebas@intercarton.com.mx";
        $estado="Activo";
        $fechaAlta=date('Y-m-d');
        
        $consulta4 = mysqli_query($con, "SELECT * from img");
        $numeroDatosIMG= mysqli_num_rows($consulta4)+1;
        $consulta2 = mysqli_query($con,"INSERT INTO tickets(ticketID,asunto,descripcion,solicitanteID,estado,prioridad,soporteID,fechaAlta) VALUES ($numeroDatos,'$asunto','$descripcion','$correo','$estado','$prioridad','$soporteID','$fechaAlta')");
        $consultaDocument = mysqli_query($con,"INSERT INTO img(imagenID,imagenes,ticketID,tipo,nombre) VALUES ($numeroDatosIMG,'$documentContenido','$numeroDatos','$archivo_tipoDocument','$nombreDocument')");
        
        if($consultaDocument){
            $descripcion="Ticket de ".$correo;
            
            $estadoNoti="No leido";
            $ingresaNoti = mysqli_query($con,"INSERT INTO notificaciones(descripcion,estado,fecha) VALUES ('$descripcion','$estadoNoti','$fechaAlta')");
            header('location: ../mail/contact_me.php?correo=' . $correo);
        }
        }catch (Exception $e){
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        
    }

    public static function levantaTicketSinImagenSinDocumento($asunto, $descripcion,$correo,$prioridad,$con)
    {
        try{
        $consulta1 = mysqli_query($con, "SELECT * from tickets");
        $numeroDatos= mysqli_num_rows($consulta1)+1;
        $soporteID="pruebas@intercarton.com.mx";
        $estado="Activo";
        $fechaAlta=date('Y-m-d');
        
        $consulta4 = mysqli_query($con, "SELECT * from img");
        $numeroDatosIMG= mysqli_num_rows($consulta4)+1;
        $consulta2 = mysqli_query($con,"INSERT INTO tickets(ticketID,asunto,descripcion,solicitanteID,estado,prioridad,soporteID,fechaAlta) VALUES ($numeroDatos,'$asunto','$descripcion','$correo','$estado','$prioridad','$soporteID','$fechaAlta')");
        if($consulta2){
            $descripcion="Ticket de ".$correo;
            $estadoNoti="No leido";
            $ingresaNoti = mysqli_query($con,"INSERT INTO notificaciones(descripcion,estado,fecha) VALUES ('$descripcion','$estadoNoti','$fechaAlta')");
            header('location: ../mail/contact_me.php?correo=' . $correo);
        }
        }catch (Exception $e){
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        
    }
    }

?>