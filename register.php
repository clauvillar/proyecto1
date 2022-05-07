<?php include("templates/header.php"); ?>
<?php

    $textID = (isset($_POST['textID']))?$_POST['textID']:"";
    $textNombre = (isset($_POST['textNombre']))?$_POST['textNombre']:"";
    $textApellido = (isset($_POST['textApellido']))?$_POST['textApellido']:"";
    $textCorreo = (isset($_POST['textCorreo']))?$_POST['textCorreo']:"";
    $textCotra = (isset($_POST['textCotra']))?$_POST['textCotra']:"";
    $accion = (isset($_POST['accion']))?$_POST['accion']:"";
    include("./data/db.php");

    if($accion){
        //INSERT INTO `admin` (`id`, `nombre`, `apellido`, `correo`, `contrasenia`) VALUES (NULL, 'Robinson', 'Higuita', 'robinson10394@gmail.com', 'sistema');
        $sentenciaSQL = $conexion -> prepare("INSERT INTO administrador (nombre, apellido, correo, contrasenia) VALUES (:nombre, :apellido, :correo, :contra);");
        $sentenciaSQL -> bindParam(':nombre',$textNombre);
        $sentenciaSQL -> bindParam(':apellido',$textApellido);
        $pass_fuerte = sha1($textCotra);
        $sentenciaSQL -> bindParam(':contra',$pass_fuerte);
        $sentenciaSQL -> bindParam(':correo',$textCorreo);

        $sentenciaSQL -> execute();
        header("Location:./admin/index.php");
    }

?>
   <section class="contact-box">
       <div class="row">
            <div class=" img-register col-5">
                <img src="./img/register2.png" height="500px" alt="">
            </div>
            <div class="col-6 d-flex">
                <div class="container align-self-center p-6">
                    <h1 class="font-weight-bold mb-3">Crea tu cuenta</h1>
                    <p class="text-muted mb-5">Ingresa la siguiente información para registrarte.</p>

                    <form method="POST">
                        <div class="form-sesion">
                            <div class="form-group">
                            <label for = "textNombre" class="font-weight-bold">Nombre <span class="text-danger">*</span></label>
                                <input type="text" id = "textNombre" name = "textNombre" class="form-control" placeholder="Tu nombre">
                            </div>
                            <div class="form-group">
                            <label for = "textApellido" class="font-weight-bold">Apellido <span class="text-danger">*</span></label>
                                <input type="text"  id = "textApellido" name = "textApellido" class="form-control" placeholder="Tu apellido">
                            </div>
                        </div>
                        <div class="form-group">
                        <label for = "textCorreo" class="font-weight-bold">Correo electrónico <span class="text-danger">*</span></label>
                            <input type="email" id = "textCorreo" name = "textCorreo" class="form-control" placeholder="Ingresa tu correo electrónico">
                        </div>
                        <div class="form-group">
                        <label for = "textCotra" class="font-weight-bold">Contraseña <span class="text-danger">*</span></label>
                            <input type="password" id = "textCotra" name = "textCotra" class="form-control" placeholder="Ingresa una contraseña">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox">
                                <label class="form-check-label text-muted">Al seleccionar esta casilla aceptas nuestro aviso de privacidad y los términos y condiciones</label>
                            </div>
                        </div>
                        <button type = "submit" name = "accion" value = "registrar" class="btn btn-primary width-100">Regístrate</button>
                    </form>
                </div>
           </div>
       </div>
   </section>
</body>
<?php include("templates/footer.php"); ?> 