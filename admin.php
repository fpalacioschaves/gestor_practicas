<?php session_start();

include("./funciones.php");
check_session();
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
        <!-- Contenido  -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <div class="container">
            <h1>Panel de empresas</h1>
            <div class="row">
                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-blue order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Orders Received</h6>
                            <h2 class="text-right"><i class="fa fa-cart-plus f-left"></i><span>486</span></h2>
                            <p class="m-b-0">Completed Orders<span class="f-right">351</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-green order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Orders Received</h6>
                            <h2 class="text-right"><i class="fa fa-rocket f-left"></i><span>486</span></h2>
                            <p class="m-b-0">Completed Orders<span class="f-right">351</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-yellow order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Orders Received</h6>
                            <h2 class="text-right"><i class="fa fa-refresh f-left"></i><span>486</span></h2>
                            <p class="m-b-0">Completed Orders<span class="f-right">351</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-pink order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Orders Received</h6>
                            <h2 class="text-right"><i class="fa fa-credit-card f-left"></i><span>486</span></h2>
                            <p class="m-b-0">Completed Orders<span class="f-right">351</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>






    </section>


    <div class="container">
        <h1>Últimas incidencias</h1>
        <div class="row">
            <div class="col-lg-4">
                <div class="card card-margin">
                    <div class="card-header no-border">
                        <h5 class="card-title">MOM</h5>
                    </div>
                    <div class="card-body pt-0">
                        <div class="widget-49">
                            <div class="widget-49-title-wrapper">
                                <div class="widget-49-date-primary">
                                    <span class="widget-49-date-day">09</span>
                                    <span class="widget-49-date-month">apr</span>
                                </div>
                                <div class="widget-49-meeting-info">
                                    <span class="widget-49-pro-title">PRO-08235 DeskOpe. Website</span>
                                    <span class="widget-49-meeting-time">12:00 to 13.30 Hrs</span>
                                </div>
                            </div>
                            <ol class="widget-49-meeting-points">
                                <li class="widget-49-meeting-item"><span>Expand module is removed</span></li>
                                <li class="widget-49-meeting-item"><span>Data migration is in scope</span></li>
                                <li class="widget-49-meeting-item"><span>Session timeout increase to 30 minutes</span></li>
                            </ol>
                            <div class="widget-49-meeting-action">
                                <a href="#" class="btn btn-sm btn-flash-border-primary">View All</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-margin">
                    <div class="card-header no-border">
                        <h5 class="card-title">MOM</h5>
                    </div>
                    <div class="card-body pt-0">
                        <div class="widget-49">
                            <div class="widget-49-title-wrapper">
                                <div class="widget-49-date-warning">
                                    <span class="widget-49-date-day">13</span>
                                    <span class="widget-49-date-month">apr</span>
                                </div>
                                <div class="widget-49-meeting-info">
                                    <span class="widget-49-pro-title">PRO-08235 Lexa Corp.</span>
                                    <span class="widget-49-meeting-time">12:00 to 13.30 Hrs</span>
                                </div>
                            </div>
                            <ol class="widget-49-meeting-points">
                                <li class="widget-49-meeting-item"><span>Scheming module is removed</span></li>
                                <li class="widget-49-meeting-item"><span>App design contract confirmed</span></li>
                                <li class="widget-49-meeting-item"><span>Client request to send invoice</span></li>
                            </ol>
                            <div class="widget-49-meeting-action">
                                <a href="#" class="btn btn-sm btn-flash-border-warning">View All</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-margin">
                    <div class="card-header no-border">
                        <h5 class="card-title">MOM</h5>
                    </div>
                    <div class="card-body pt-0">
                        <div class="widget-49">
                            <div class="widget-49-title-wrapper">
                                <div class="widget-49-date-success">
                                    <span class="widget-49-date-day">22</span>
                                    <span class="widget-49-date-month">apr</span>
                                </div>
                                <div class="widget-49-meeting-info">
                                    <span class="widget-49-pro-title">PRO-027865 Opera module</span>
                                    <span class="widget-49-meeting-time">12:00 to 13.30 Hrs</span>
                                </div>
                            </div>
                            <ol class="widget-49-meeting-points">
                                <li class="widget-49-meeting-item"><span>Scope is revised and updated</span></li>
                                <li class="widget-49-meeting-item"><span>Time-line has been changed</span></li>
                                <li class="widget-49-meeting-item"><span>Received approval to start wire-frame</span></li>
                            </ol>
                            <div class="widget-49-meeting-action">
                                <a href="#" class="btn btn-sm btn-flash-border-success">View All</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="./js/scripts.js" crossorigin="anonymous"></script>
</body>

</html>