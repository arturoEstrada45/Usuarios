<?php

include "../php/funcionesSistema.php";
$con = mysqli_connect('localhost', 'root', '', 'intercartonpruebas') or die(mysqli_error($mysqli));
conexion($con);
function conexion($con){
    if (isset($_POST['inicia']))
   {
    $correo = $_POST['correo'];
    $contrasenia = $_POST['contrasenia'];
    Sistema::iniciaSesion($correo,$contrasenia,$con);
   }
   
   else if (isset($_POST['registrarTicket']))
   {
    try{
    $asunto = $_POST['Asunto'];
    $prioridad = $_POST['prioridad'];
    $descripcion = $_POST['descripcion'];
    $correo = $_POST['correo'];
    $archivo = $_FILES["image"]["tmp_name"];
    $nombre = $_FILES["image"]["name"];
    $archivo_tipo = $_FILES['image']['type'];
        //Documentos
    $archivoDocument = $_FILES["document"]["tmp_name"];
    $tamanioDocument = $_FILES["document"]["size"];
    $nombreDocument = $_FILES["document"]["name"];
    $archivo_tipoDocument = $_FILES['document']['type'];
    if($_FILES["image"]["tmp_name"] && $_FILES["document"]["tmp_name"]){
        $image = $_FILES['image']['tmp_name'];
        $document = $_FILES['document']['tmp_name'];
        $imgContenido = addslashes(file_get_contents($image));
        $documentContenido = addslashes(file_get_contents($document));
        print_r("con todo ");
        Sistema::levantaTicket($asunto, $descripcion,$correo,$prioridad,$imgContenido,$archivo_tipo,$nombre,$documentContenido,$archivo_tipoDocument,$nombreDocument,$con);
      
    }else if($_FILES["image"]["tmp_name"] && !$_FILES["document"]["tmp_name"]){
        $image = $_FILES['image']['tmp_name'];
        $imgContenido = addslashes(file_get_contents($image));
        print_r("sin documento ");
        Sistema::levantaTicketSinArchivo($asunto, $descripcion,$correo,$prioridad,$imgContenido,$archivo_tipo,$nombre,$con);
      
    }else if(!$_FILES["image"]["tmp_name"] && $_FILES["document"]["tmp_name"]){
        $document = $_FILES['document']['tmp_name'];
        $documentContenido = addslashes(file_get_contents($document));
        print_r("sin imagen ");
        Sistema::levantaTicketSinImagen($asunto, $descripcion,$correo,$prioridad,$documentContenido,$archivo_tipoDocument,$nombreDocument,$con);
      
    }else if(!$_FILES["image"]["tmp_name"] && !$_FILES["document"]["tmp_name"]){
        print_r("Sin nada");
        Sistema::levantaTicketSinImagenSinDocumento($asunto, $descripcion,$correo,$prioridad,$con);
      
    }
    
        
            
         
        else {
            echo "Error archivo no valido";
        }
    
    
 
}catch (Exception $e){
    
    echo "Verifica LA imagen";
}
}}
  
?>