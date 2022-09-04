<?php session_start();

include("./funciones.php");
check_session();
$id_evento = $_GET["id_evento"];
$evento = leer_evento($id_evento)[0];
var_dump($evento);


?>
<!DOCTYPE html>
<html lang="en">
<?php include("./head.php"); ?>

<body>

    <?php include("./header.php"); ?>

    <section class="container">
        <?php
        if ($_POST) {

            update_evento($id_evento,$_POST);
        } else {
        ?>

<form id="editar_alumno" action="" method="POST">
                <div class="row">
                    <div class="col">
                        <label for="titulo">Título*</label>
                        <input class="form-control" type="text" name="titulo" value='<?php echo $evento["titulo"];?>' required>
                    </div>
                    <div class="col">
                    <label for="fecha">Fecha*</label>
                        <input class="form-control" type="date" name="fecha" required value='<?php echo $evento["fecha"];?>'>
                    </div>

                    <div class="col">
                    <label for="hecho">Hecho?</label>
                    <select class="form-select" name="hecho">
                            
                            <option value=0 <?php if($evento["hecho"] == 0) { echo "selected";}?>>
                                No
                            </option>

                            <option value=1 <?php if($evento["hecho"] == 1) { echo "selected";}?>>
                                Sí
                            </option>
                        </select>
                       
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                    <label for="descripcion">
                            Descripción
                        </label>
                        <textarea class="form-control" name="descripcion"><?php echo $evento["descripcion"];?></textarea>
                        
                    </div>

                </div>
                <input type="submit" value="Editar" class="btn btn-primary">

            </form>
        
        <?php } ?>


    </section>


    <script src="./js/scripts.js" crossorigin="anonymous"></script>
</body>

</html>