<?php session_start();

include("./funciones.php");
check_session();
?>
<!DOCTYPE html>
<html lang="en">
<?php include("./head.php"); ?>

<body>

    <?php include("./header.php"); ?>

    <section class="container">
        <?php
        if ($_POST) {

            add_evento($_POST);
        } else {
        ?>

            <form id="editar_alumno" action="" method="POST">
                <div class="row">
                    <div class="col">
                        <label for="titulo">Título*</label>
                        <input class="form-control" type="text" name="titulo" required>
                    </div>
                    <div class="col">
                    <label for="fecha">Fecha*</label>
                        <input class="form-control" type="date" name="fecha" required>
                    </div>

                    
                </div>

                <div class="row">
                    <div class="col">
                    <label for="descripcion">
                            Descripción
                        </label>
                        <textarea class="form-control" name="descripcion"></textarea>
                        
                    </div>

                </div>
                <input type="submit" value="Añadir" class="btn btn-primary">

            </form>

        <?php } ?>


    </section>


    <script src="./js/scripts.js" crossorigin="anonymous"></script>
</body>

</html>