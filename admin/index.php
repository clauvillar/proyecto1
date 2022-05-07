<?php 
    include("../data/db.php");
    session_start();
    if($_POST){

        $correo = (isset($_POST['correo']))?$_POST['correo']:"";
        $contrasenia = (isset($_POST['contrasenia']))?$_POST['contrasenia']:"";
        $pass_c = sha1($contrasenia);
        $sentenciaSQL = $conexion -> prepare("SELECT id, correo, contrasenia FROM administrador WHERE correo=:correo");
        $sentenciaSQL -> bindParam(':correo',$correo);
        $sentenciaSQL -> execute();
        $adm = $sentenciaSQL -> fetch(PDO::FETCH_LAZY);

        $textID=$adm['id'];
        $textCorr=$adm['correo'];
        $textContra=$adm['contrasenia'];

        if(($_POST['correo'] == $textCorr) && ($pass_c == $textContra)){
            $_SESSION['usuario'] = "ok";
            $_SESSION['nombreUsuario'] = $textCorr;
            $_SESSION['id'] = $textID;
            header('Location:section/inventario.php');
        }else{
            $mensaje = "Error: usuario o contraseña incorrectos";
        }
    }

?>
<?php include("../templates/header.php"); ?>

   <section class="contact-box">
       <div class="row">
           <div class=" img-register col-5">
                <img src="../img/login.png" height="500px" alt="">
           </div>
                <div class="col-6 d-flex">
                     <div class="container align-self-center p-6">
                    <h1 class="font-weight-bold mb-3">Inicio de sesión</h1>
                    <p class="text-muted mb-5">Ingresa a tu cuenta.</p>
                    <?php if(isset($mensaje)) { ?>   
                        <div class="alert alert-primary" role="alert">
                            <?php echo $mensaje; ?>
                        </div>
                    <?php } ?>
                    <form class="form-sesion" method = "POST">                    
                    <div class="form-col mb-3">
                            <div class="form-col md-6">
                                <label class="font-weight-bold">Correo <span class="text-danger">*</span></label>
                                <input type="text" required class="form-control" name="correo" placeholder="Ingresa tu correo">
                            </div>
                           
                        <div class="form-col mb-3">
                            <label class="font-weight-bold">Contraseña <span class="text-danger">*</span></label>
                            <input type="password" required class="form-control" name="contrasenia" placeholder="Ingresa una contraseña">
                        </div>
                        </div> 
                        <button type = "submit" class="btn btn-primary width-100"> Ingresar </button>
                        <a class="btn btn-primary width-100" href="../register.php">Regístrate</a>

                    </form>
                </div>
           </div>
       </div>
   </section>
   <?php include("../templates/footer.php"); ?> 
  