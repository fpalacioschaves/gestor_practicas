<?php session_start();

include("./funciones.php");
check_session();
$id_evento = $_GET["id_evento"];
$evento = leer_evento($id_evento)[0];



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