<?php session_start();

include("./funciones.php");
check_session();

$numero_empresas = contar_items("empresas");
$numero_empresas_por_contactar = contar_items_condicionado("empresas", "estado_empresa = 'Por contactar'");
$numero_empresas_contactado = contar_items_condicionado("empresas", "estado_empresa = 'Contactado'");
$numero_empresas_no_interesado = contar_items_condicionado("empresas", "estado_empresa = 'No interesado'");
$numero_empresas_interesado = contar_items_condicionado("empresas", "estado_empresa = 'Interesado'");
$numero_empresas_favorita = contar_items_condicionado("empresas", "favorita = 1");


$numero_alumnos = contar_items("alumnos");
$numero_alumnos_asignados = contar_items("alumno_asignado_empresa");
$numero_alumnos_no_asignados = $numero_alumnos - $numero_alumnos_asignados;

$ultimas_incidencias = leer_ultimas_incidencias();
$numero_incidencias = contar_items("incidencias");
?>
<!DOCTYPE html>
<html lang="en">
<?php include("./head.php"); ?>
<style>

</style>

<body>

    <?php include("./header.php"); ?>

    <section class="container">
        <h1 class="title">Panel de Administración</h1>
        <div class="container_info">
            <h1>Resumen</h1>
            <div class="row">
            <div class="col-lg-4">
                    <div class="card bg-c-blue order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Número de empresas</h6>
                            <h2 class="text-right"><i class="fa fa-building f-left"></i><span><?php echo $numero_empresas;?></span></h2>
                            <!--<p class="m-b-0">Empresas totales en la base de datos.<span class="f-right"></span></p>-->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card bg-c-green order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Número de alumnos</h6>
                            <h2 class="text-right"><i class="fa-solid fa-graduation-cap"></i><span><?php echo $numero_alumnos;?></span></h2>
                            <!--<p class="m-b-0">Empresas totales en la base de datos.<span class="f-right"></span></p>-->
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card bg-c-pink order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Número de incidencias</h6>
                            <h2 class="text-right"><i class="fa-solid fa-message"></i><span><?php echo $numero_incidencias;?></span></h2>
                            <!--<p class="m-b-0">Empresas totales en la base de datos.<span class="f-right"></span></p>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Empresas  -->
        <div class="container_info">
            <h1>Empresas</h1>
            <div class="row">
                

                <div class="col-lg-4">
                    <div class="card bg-primary order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Empresas por contactar</h6>
                            <h2 class="text-right"><i class="fa fa-times-circle f-left"></i><span><?php echo $numero_empresas_por_contactar;?></span></h2>
                            <!--<p class="m-b-0">Empresas que aún no se ha contactado.<span class="f-right"></span></p>-->
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card bg-warning order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Empresas Contactadas</h6>
                            <h2 class="text-right"><i class="fa fa-volume-control-phone f-left"></i><span><?php echo $numero_empresas_contactado;?></span></h2>
                            <!--<p class="m-b-0">Empresas contactadas, a la espera de respuesta<span class="f-right"></span></p>-->
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card bg-success order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Empresas interesadas</h6>
                            <h2 class="text-right"><i class="fa fa-check f-left"></i><span><?php echo $numero_empresas_interesado;?></span></h2>
                            <!--<p class="m-b-0">Completed Orders<span class="f-right">351</span></p>-->
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card bg-danger order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Empresas no interesadas</h6>
                            <h2 class="text-right"><i class="fa fa-minus-circle f-left"></i><span><?php echo $numero_empresas_no_interesado;?></span></h2>
                            <!--<p class="m-b-0">Completed Orders<span class="f-right">351</span></p>-->
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card bg-info order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Empresas favoritas</h6>
                            <h2 class="text-right"><i class="fa fa-star f-left"></i><span><?php echo $numero_empresas_favorita;?></span></h2>
                            <!--<p class="m-b-0">Completed Orders<span class="f-right">351</span></p>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alumnos -->
        <div class="container_info">
            <h1>Alumnos</h1>
            <div class="row">
                

                <div class="col-lg-4">
                    <div class="card bg-primary order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Alumnos asignados</h6>
                            <h2 class="text-right"><i class="fa-solid fa-person-digging"></i><span><?php echo $numero_alumnos_asignados ;?></span></h2>
                            <!--<p class="m-b-0">Empresas que aún no se ha contactado.<span class="f-right"></span></p>-->
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card bg-warning order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Alumnos por asignar</h6>
                            <h2 class="text-right"><i class="fa-solid fa-hourglass"></i><span><?php echo $numero_alumnos_no_asignados;?></span></h2>
                            <!--<p class="m-b-0">Empresas contactadas, a la espera de respuesta<span class="f-right"></span></p>-->
                        </div>
                    </div>
                </div>

               

             

              
            </div>
        </div>

        <div class="container_info">
            <h1>Últimas incidencias</h1>
            <div class="row">
  
                <?php foreach($ultimas_incidencias as $incidencia){ 
                    $fecha = strtotime($incidencia["fecha_incidencia"]);
                    $dia = date("d", $fecha);
                    $mes = date("M", $fecha);
                    $id_empresa = $incidencia["id_empresa"];
                    $nombre_empresa = $incidencia["nombre_empresa"];
                    $texto_incidencia = substr($incidencia["texto_incidencia"],0,150);
                    ?>
                <div class="col-lg-4">
                    <div class="card card-margin">
                        <div class="card-header no-border">
                            <!--<h5 class="card-title">MOM</h5>-->
                        </div>
                        <div class="card-body pt-0">
                            <div class="widget-49">
                                <div class="widget-49-title-wrapper">
                                    <div class="widget-49-date-primary">
                                        <span class="widget-49-date-day"><?php echo $dia;?></span>
                                        <span class="widget-49-date-month"><?php echo $mes;?></span>
                                    </div>
                                    <div class="widget-49-meeting-info">
                                        <span class="widget-49-pro-title"><?php echo $nombre_empresa;?></span>
                                        <!--<span class="widget-49-meeting-time">12:00 to 13.30 Hrs</span>-->
                                    </div>
                                </div>
                                <ol class="widget-49-meeting-points" style="list-style: none;">
                                    <li class="widget-49-meeting-item"><span><?php echo $texto_incidencia;?></span></li>
                                    
                                </ol>
                                <div class="widget-49-meeting-action">
                                    <a href="./editar_empresa.php?id_empresa=<?php echo $id_empresa;?>" class="btn btn-sm btn-flash-border-primary">Ir a la empresa</a>
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