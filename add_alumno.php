<?php session_start();

include("./funciones.php");
check_session();
$empresas = leer_empresas();
$id_empresa_asociada = "";
$tutor = "";


?>
<!DOCTYPE html>
<html lang="en">
<?php include("./head.php"); ?>

<body>

    <?php include("./header.php"); ?>

    <section class="container">
        <?php
        if ($_POST) {

            add_alumno($_POST);
        } else {
        ?>

            <form id="editar_alumno" action="" method="POST">
                <div class="row">
                    <div class="col-2">
                        <label for="favorita">Prácticas</label>
                        <select class="form-select" name="finalizado">
                            <option value=1>
                                Finalizada
                            </option>
                            <option value=0>
                                Por finalizar
                            </option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="nombre">Nombre*</label>
                        <input class="form-control" type="text" name="nombre" required>

                    </div>
                    <div class="col">
                        <label for="direccion_alumno">
                            Apellidos
                        </label>
                        <input class="form-control" type="text" name="apellidos">
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="dni">DNI*</label>
                        <input class="form-control" type="text" name="dni" required>
                    </div>

                    <div class="col">
                        <label for="telefono">Teléfono de la alumno*</label>
                        <input class="form-control" type="text" name="telefono" required>
                    </div>

                    <div class="col">
                        <label for="email">Email del alumno*</label>
                        <input class="form-control" type="text" name="email" required>
                    </div>
                </div>


                <div class="row">

                    <div class="col">
                        <label for="Empresa asociada">Empresa Asociada</label>
                        <select class="form-select" name="empresa_asociada" id="empresa_asociada" onchange="leer_tutor();">
                            <option value="">Selecciona una empresa</option>
                            <?php foreach ($empresas as $empresa) { ?>
                                <option value="<?php echo $empresa["id_empresa"]; ?>">
                                    <?php echo $empresa["nombre_empresa"]; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="tutor_empresa">Tutor de la empresa</label>
                        <input class="form-control" type="text" name="tutor_empresa" id="tutor_empresa" value='<?php echo $tutor; ?>' disabled>
                    </div>

                </div>

                <div class="row" id="fechas_practicas" style="display:none;">
                    <div class="col">
                        <label for="fecha_inicio">Fecha de inicio</label>
                        <input class="form-control" type="date" name="fecha_inicio" id="fecha_inicio">
                    </div>

                    <div class="col">
                        <label for="fecha_fin">Fecha de fin</label>
                        <input class="form-control" type="date" name="fecha_fin" id="fecha_fin">
                    </div>
                </div>


                <input type="submit" value="Añadir" class="btn btn-primary">

            </form>

        <?php } ?>


    </section>


    <script src="./js/scripts.js" crossorigin="anonymous"></script>
</body>

</html>