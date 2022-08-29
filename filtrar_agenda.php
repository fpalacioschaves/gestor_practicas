<?php
include("./funciones.php");

$filtro = $_GET["filtro"];

$conexion = new conectar_db();
$consulta = "SELECT * FROM agenda WHERE titulo LIKE '".$filtro."%' OR descripcion LIKE '".$filtro."%'";
$resultado = $conexion->consultar($consulta);
$items = $resultado->fetch_all(MYSQLI_ASSOC);
foreach($items as $item){
    // Checkeamos si tiene empresa asociada
    $id_item = $item["id_agenda"];
    $fecha = strtotime($item["fecha"]);
    $dia = date("d", $fecha);
    $mes = date("M", $fecha);
    $titulo = $item["titulo"];
    $descripcion = $item["descripcion"];
    $texto_descripcion = substr( $descripcion, 0, 100);
    
   echo
    '<div class="col-lg-3">
    <div class="card card-margin">
        <div class="card-header no-border">
        </div>
        <div class="card-body pt-0">
            <div class="widget-49">
                <div class="widget-49-title-wrapper">
                    <div class="widget-49-date-primary">
                        <span class="widget-49-date-day">'.$dia.'</span>
                        <span class="widget-49-date-month">'.$mes.'</span>
                    </div>
                    <div class="widget-49-meeting-info">
                        <span class="widget-49-pro-title">'.$titulo.'</span>
                       
                    </div>
                </div>
                <ol class="widget-49-meeting-points" style="list-style: none;">
                    <li class="widget-49-meeting-item"><span>'.$texto_descripcion.'</span></li>

                </ol>
                <div class="widget-49-meeting-action">
                    <a href="./editar_empresa.php?id_empresa=<?php echo $id_empresa; ?>" class="btn btn-sm btn-flash-border-primary">Leer más</a>
                </div>
            </div>
        </div>
    </div>
</div>';
}
      ?>

