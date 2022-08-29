<?php session_start();

include("./funciones.php");
check_session();






$entradas_agenda = leer_agenda();
?>
<!DOCTYPE html>
<html lang="en">
<?php include("./head.php"); ?>
<style>

</style>

<body>

    <?php include("./header.php"); ?>

    <section class="container">
        <h1 class="title">Agenda</h1>
        
      


        <div class="container_info">
            <h1>Últimas incidencias</h1>
            <div class="row">

                <?php foreach ($entradas_agenda as $entrada_agenda) {
                    $fecha = strtotime($entrada_agenda["fecha"]);
                    $dia = date("d", $fecha);
                    $mes = date("M", $fecha);
                    $titulo = $entrada_agenda["titulo"];
                    $descripcion = $entrada_agenda["descripcion"];
                    $texto_descripcion = substr($entrada_agenda["descripcion"], 0, 100);
                ?>
                    <div class="col-lg-3">
                        <div class="card card-margin">
                            <div class="card-header no-border">
                                <!--<h5 class="card-title">MOM</h5>-->
                            </div>
                            <div class="card-body pt-0">
                                <div class="widget-49">
                                    <div class="widget-49-title-wrapper">
                                        <div class="widget-49-date-primary">
                                            <span class="widget-49-date-day"><?php echo $dia; ?></span>
                                            <span class="widget-49-date-month"><?php echo $mes; ?></span>
                                        </div>
                                        <div class="widget-49-meeting-info">
                                            <span class="widget-49-pro-title"><?php echo $titulo; ?></span>
                                            <!--<span class="widget-49-meeting-time">12:00 to 13.30 Hrs</span>-->
                                        </div>
                                    </div>
                                    <ol class="widget-49-meeting-points" style="list-style: none;">
                                        <li class="widget-49-meeting-item"><span><?php echo $descripcion; ?></span></li>

                                    </ol>
                                    <div class="widget-49-meeting-action">
                                        <a href="./editar_empresa.php?id_empresa=<?php echo $id_empresa; ?>" class="btn btn-sm btn-flash-border-primary">Leer más</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="./js/scripts.js" crossorigin="anonymous"></script>
</body>

</html>