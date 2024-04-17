<?php
header('Content-Type: text/html; charset=UTF-8');
$correo = $_REQUEST['correo'];
$estado =0;
$conexion = mysqli_connect('localhost', 'root', '', 'intercartonpruebas');
$sql =  "SELECT * from inventarios";
$result = mysqli_query($conexion, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registro Ticket</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <link href="../css/textos.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
<br>
  <br>  
    <?php if(!($estado=="0")){?>
<div class="container div" id="mensajeCont">
        <div class="row">
            <div class="col-1">
            </div>
            <div class="col-10 justify-content-center">
                <div class="div div-mensaje" id="mensaje">
                    <p><?php echo $estado ?></p>
                </div>
            </div>
          
        </div>
    </div><?php }?>
    <div class="container">
    
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block">
                        <img src="../img/registroEmpleado.jpg" width="505" height="605">
                    </div>
                    
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Agregar Ticket</h1>
                            </div>
                            <form name="register" id="register" action="../php/conexion.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="correo" id="correo" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="busca" aria-describedby="basic-addon2" value="<?php echo $correo ?>"> 
                             
                            <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="Asunto" name="Asunto"
                                            placeholder="Asunto"  required data-toggle="tooltip" data-placement="right" title="Solo letras, números y espacios">
                                                                        </div>
                                    
                                    
                                    <div class="col-sm-6">
                                        <select class="form-control form-control-user" id="prioridad" name="prioridad">
                                            <option select="selected">Prioridad:</option>
                                            <option>Baja</option>
                                            <option>Media</option>
                                            <option>Alta</option>
                                          </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea type="text" class="form-control form-control-user" style="WIDTH: 500; HEIGHT: 100px" size=32 id="descripcion" name="descripcion"
                                        placeholder="Descripción"  pattern="([a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ0-9,.-_!#$%*+&/ ]{1,10000})" required data-toggle="tooltip" data-placement="right" title="Solo letras, números y espacios"></textarea>
                                </div>
                                <div class="form-group">
                                <p>Selecciona una imagen de referencia a tu Ticket:</h1>
                                
                                <input type="file" class="form-control" id="image" name="image">
                             </div>
                             <div class="form-group">
                                <p>Selecciona archivo de referencia a tu Ticket:</h1>
                                
                                <input type="file" class="form-control" id="document" name="document">
                                <br>
                                <button class="btn btn-primary btn-user btn-block" type="submit" name="registrarTicket" id="registrarTicket" form="register" >
                                    Enviar Ticket 
                                </button> 
                            </div>
                           
                                <div class="text-center">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="text-gray-400"></i>
                                    Sugerir cambios en aplicación
                                </a>
                                    </div>
                                    <div class="text-center">
            <a class="dropdown-item" href="../index.html" ">
                                    <i class="text-gray-400"></i>
                                    Cerrar sesión
                                </a>
            </div>
                               
    </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
                       var miBoton = document.getElementById("registrarTicket");

// Agrega un evento de clic al botón
miBoton.addEventListener("click", function() {
    // Coloca aquí la acción que deseas ejecutar
    alert("Tu ticket esta enviandose, espera a que cargue la pagina nuevamente. :D");
    miBoton.hidden=true;
    // Puedes reemplazar la alerta con cualquier acción que desees.
});
                          


                        
                        </script>
                        
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Haznos saber tus sugerencias :D</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    
                </div>
                <div class="modal-body">
                <form action="../mail/cambios.php" method="POST" id="updateUser">
               
                                    <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <p class="mb-4">Sugerir cambios</p>
                                    </div>
                                    <div class="col-sm-6">
                                    <input type="hidden" name="correo" id="correo" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="busca" aria-describedby="basic-addon2" value="<?php echo $correo ?>"> 
                                    <input type="text" class="form-control form-control-user" id="cambios" name="cambios"
                                            placeholder="Escribe tus sugerencias :D" required data-toggle="tooltip">
                                    </div>
                                </div>
                    </form>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" name="updateUser" form="updateUser">Enviar</button>
                </div>
            </div>
        </div>



    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>