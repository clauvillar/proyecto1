<?php include("../templates/header.php"); ?>
<?php

    $textID = (isset($_POST['textID']))?$_POST['textID']:"";
    $textNombre = (isset($_POST['textNombre']))?$_POST['textNombre']:"";
    $textProve = (isset($_POST['textProve']))?$_POST['textProve']:"";
    $textComp = (isset($_POST['textComp']))?$_POST['textComp']:"";
    $textFicha = (isset($_FILES['textFicha'] ["name"]))?$_FILES['textFicha'] ["name"]:"";
    $textHoja = (isset($_FILES['textHoja'] ["name"]))?$_FILES['textHoja'] ["name"]:"";
    $accion = (isset($_POST['accion']))?$_POST['accion']:"";

    include("../config/bd.php");

    switch($accion){
        case "Agregar":
            //INSERT INTO `productos` (`id`, `nombre`, `proveedor`, `componentes`, `ficha_tecnica`, `hoja_seguridad`) VALUES (NULL, 'detergente', 'lima', 'cloro', 'ficha.pdf', 'hoja.png');
            $sentenciaSQL = $conexion -> prepare("INSERT INTO productos (nombre,proveedor,componentes,ficha_tecnica,hoja_seguridad) VALUES (:nombre,:prov,:comp,:ficha,:hoja);");
            $sentenciaSQL -> bindParam(':nombre',$textNombre);
            $sentenciaSQL -> bindParam(':prov',$textProve);
            $sentenciaSQL -> bindParam(':comp',$textComp);

            ////////////////// guardar imagen o archivo en una carpeta 
            $fecha = new DateTime();
            $nombreFicha = ($textFicha != "")?$fecha -> getTimestamp()."_".$_FILES["textFicha"]["name"]:"ficha.pdf";
            $tmpficha = $_FILES["textFicha"]["tmp_name"];

            if($tmpficha != ""){
                move_uploaded_file($tmpficha,"../../ficha_hoja/".$nombreFicha);
            }

            $nombreHoja = ($textHoja != "")?$fecha -> getTimestamp()."_".$_FILES["textHoja"]["name"]:"hoja.pdf";
            $tmphoja = $_FILES["textHoja"]["tmp_name"];

            if($tmphoja != ""){
                move_uploaded_file($tmphoja,"../../ficha_hoja/".$nombreHoja);
            }
            
            /////////////////// fin guardar igm o pdf

            $sentenciaSQL -> bindParam(':ficha',$nombreFicha);
            $sentenciaSQL -> bindParam(':hoja',$nombreHoja);
            $sentenciaSQL -> execute();
            header("Location:inventario.php");
            break;
        case "Modificar":
            $sentenciaSQL = $conexion -> prepare("UPDATE productos SET nombre =:nombre WHERE id=:id");
            $sentenciaSQL -> bindParam(':nombre',$textNombre);
            $sentenciaSQL -> bindParam(':id',$textID);
            $sentenciaSQL -> execute();

            $sentenciaSQL = $conexion -> prepare("UPDATE productos SET proveedor =:prov WHERE id=:id");
            $sentenciaSQL -> bindParam(':prov',$textProve);
            $sentenciaSQL -> bindParam(':id',$textID);
            $sentenciaSQL -> execute();

            $sentenciaSQL = $conexion -> prepare("UPDATE productos SET componentes =:comp WHERE id=:id");
            $sentenciaSQL -> bindParam(':comp',$textComp);
            $sentenciaSQL -> bindParam(':id',$textID);
            $sentenciaSQL -> execute();

            if($textFicha != ""){

                $fecha = new DateTime();
                $nombreFicha = ($textFicha != "")?$fecha -> getTimestamp()."_".$_FILES["textFicha"]["name"]:"ficha.pdf";
                $tmpficha = $_FILES["textFicha"]["tmp_name"];
                move_uploaded_file($tmpficha,"../../ficha_hoja/".$nombreFicha);

                $sentenciaSQL = $conexion -> prepare("SELECT ficha_tecnica FROM productos WHERE id=:id");
                $sentenciaSQL -> bindParam(':id',$textID);
                $sentenciaSQL -> execute();
                $inventarios = $sentenciaSQL -> fetch(PDO::FETCH_LAZY);
    
                if(isset($inventarios["ficha_tecnica"]) && ($inventarios["ficha_tecnica"] != "ficha.pdf")){
                    if(file_exists("../../ficha_hoja/".$inventarios["ficha_tecnica"])){
                        unlink("../../ficha_hoja/".$inventarios["ficha_tecnica"]);
                    }
                }

                $sentenciaSQL = $conexion -> prepare("UPDATE productos SET ficha_tecnica =:ficha WHERE id=:id");
                $sentenciaSQL -> bindParam(':ficha',$nombreFicha);
                $sentenciaSQL -> bindParam(':id',$textID);
                $sentenciaSQL -> execute();
            }

            if($textHoja != ""){

                $fecha = new DateTime();
                $nombreHoja = ($textHoja != "")?$fecha -> getTimestamp()."_".$_FILES["textHoja"]["name"]:"hoja.pdf";

                $tmphoja = $_FILES["textHoja"]["tmp_name"];
                move_uploaded_file($tmphoja,"../../ficha_hoja/".$nombreHoja);

                $sentenciaSQL = $conexion -> prepare("SELECT hoja_seguridad FROM productos WHERE id=:id");
                $sentenciaSQL -> bindParam(':id',$textID);
                $sentenciaSQL -> execute();
                $inventarios = $sentenciaSQL -> fetch(PDO::FETCH_LAZY);

                if(isset($inventarios["hoja_seguridad"]) && ($inventarios["hoja_seguridad"] != "hoja.pdf")){
                    if(file_exists("../../ficha_hoja/".$inventarios["hoja_seguridad"])){
                        unlink("../../ficha_hoja/".$inventarios["hoja_seguridad"]);
                    }
                }


                $sentenciaSQL = $conexion -> prepare("UPDATE productos SET hoja_seguridad =:hoja WHERE id=:id");
                $sentenciaSQL -> bindParam(':hoja',$nombreHoja);
                $sentenciaSQL -> bindParam(':id',$textID);
                $sentenciaSQL -> execute();
            }
            header("Location:inventario.php");
            break;
        case "Cancelar":
            header("Location:inventario.php");
            break;
        case "Seleccionar":
            $sentenciaSQL = $conexion -> prepare("SELECT * FROM productos WHERE id=:id");
            $sentenciaSQL -> bindParam(':id',$textID);
            $sentenciaSQL -> execute();
            $inventarios = $sentenciaSQL -> fetch(PDO::FETCH_LAZY);

            $textNombre=$inventarios['nombre'];
            $textProve=$inventarios['proveedor'];
            $textComp=$inventarios['componentes'];
            $textFicha=$inventarios['ficha_tecnica'];
            $textHoja=$inventarios['hoja_seguridad'];
            break;
        case "Borrar":
             ////////////////// borrar img o pdf de la carpeta
             $sentenciaSQL = $conexion -> prepare("SELECT ficha_tecnica FROM productos WHERE id=:id");
             $sentenciaSQL -> bindParam(':id',$textID);
             $sentenciaSQL -> execute();
             $inventarios = $sentenciaSQL -> fetch(PDO::FETCH_LAZY);
 
             if(isset($inventarios["ficha_tecnica"]) && ($inventarios["ficha_tecnica"] != "ficha.pdf")){
                 if(file_exists("../../ficha_hoja/".$inventarios["ficha_tecnica"])){
                     unlink("../../ficha_hoja/".$inventarios["ficha_tecnica"]);
                 }
             }
 
             $sentenciaSQL = $conexion -> prepare("SELECT hoja_seguridad FROM productos WHERE id=:id");
             $sentenciaSQL -> bindParam(':id',$textID);
             $sentenciaSQL -> execute();
             $inventarios = $sentenciaSQL -> fetch(PDO::FETCH_LAZY);
 
             if(isset($inventarios["hoja_seguridad"]) && ($inventarios["hoja_seguridad"] != "hoja.pdf")){
                 if(file_exists("../../ficha_hoja/".$inventarios["hoja_seguridad"])){
                     unlink("../../ficha_hoja/".$inventarios["hoja_seguridad"]);
                 }
             }
 
             $sentenciaSQL = $conexion -> prepare("DELETE FROM productos WHERE id=:id");
             $sentenciaSQL -> bindParam(':id',$textID);
             $sentenciaSQL -> execute();
             header("Location:inventario.php");
             break;
    }
    $sentenciaSQL = $conexion -> prepare("SELECT * FROM productos");
    $sentenciaSQL -> execute();
    $listaInventario = $sentenciaSQL -> fetchAll(PDO::FETCH_ASSOC);

?>

<div class="col-md-4">
    <br>
    <div class="card">
        <div class="card-header">
            inventario
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="textID">ID</label>
                    <input type="text" required readonly class="form-control" value = "<?php echo $textID ?>"  id="textID" name="textID" placeholder="ID">
                </div>
                <div class="form-group">
                    <label for="textNombre">Nombre</label>
                    <input type="text" required class="form-control" value = "<?php echo $textNombre ?>" id="textNombre" name="textNombre" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label for="textProve">Proveeder</label>
                    <input type="text" required class="form-control" value = "<?php echo $textProve ?>" id="textProve" name="textProve" placeholder="Proveedor">
                </div>
                <div class="form-group">
                    <label for="textComp">Componentes</label>
                    <input type="text" required class="form-control" value = "<?php echo $textComp ?>" id="textComp" name="textComp" placeholder="Componentes">
                </div>
                <div class="form-group">
                    <label for="textFicha">Ficha tecnica</label>
                    <?php echo $textFicha ?>
                    <input type="file" class="form-control"  id="textFicha" name="textFicha" placeholder="Ficha tecnica">
                </div>
                <div class="form-group">
                    <label for="textHoja">Hoja de seguridad</label>
                    <?php echo $textHoja ?>
                    <input type="file" class="form-control"  id="textHoja" name="textHoja"
                        placeholder="Hoja de seguridad">
                </div>
                <!-- inhabilitar botones segun la accion que se este realizando "agregar" -->
                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" <?php echo($accion=="Seleccionar")?"disabled":""; ?> value="Agregar" class="btn btn-primary">Agregar</button>
                    <button type="submit" name="accion" <?php echo($accion!="Seleccionar")?"disabled":""; ?> value="Modificar" class="btn btn-primary">Modificar</button>
                    <button type="submit" name="accion" <?php echo($accion!="Seleccionar")?"disabled":""; ?> value="Cancelar" class="btn btn-primary">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-md-8">
    <br>
    
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Proveeder</th>
                    <th>Componentes</th>
                    <th>Ficha tecnica</th>
                    <th>Hoja de seguridad</th>
                    <th>Accion</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach($listaInventario as $inventario){ ?>
                <tr>
                    <td><?php echo $inventario['id']; ?></td>
                    <td><?php echo $inventario['nombre']; ?></td>
                    <td><?php echo $inventario['proveedor']; ?></td>
                    <td><?php echo $inventario['componentes']; ?></td>
                    <td><?php echo $inventario['ficha_tecnica']; ?></td>
                    <td><?php echo $inventario['hoja_seguridad']; ?></td>
                    <td> 
                        <form method="POST">
                            <input type="hidden" name = "textID" id="textID" value = "<?php echo $inventario['id']; ?>"/>
                            <input type="submit" name = "accion" value="Seleccionar" class = "btn btn-primary"/>
                            <input type="submit" name = "accion" value="Borrar" class = "btn btn-danger"/>  
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    
</div>




<?php include("../templates/footer.php"); ?>