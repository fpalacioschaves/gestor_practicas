<?php
include("./funciones.php");
$tabla= $_GET["tabla"];
$inicio = $_GET["valor"];
$limite= $_GET["limite"];

$conexion = new conectar_db();
$consulta = "SELECT * FROM $tabla LIMIT $inicio,10";
$resultados = $conexion->consultar($consulta);
$resultados = $resultados->fetch_all(MYSQLI_ASSOC);

foreach($resultados as $empresa){
    $estado_empresa = $empresa["estado_empresa"];
    switch($estado_empresa){
        case "Por contactar":
            $tr_class = "dark";
            break;
        case "Contactado":
            $tr_class = "warning";
            break;
         case "No interesado":
             $tr_class = "danger";
             break;
         case "Interesado":
             $tr_class = "success";
             break;
    }
    echo '<tr class="table-'.$tr_class.'">
    <td  class="favorita">';
    echo $empresa["favorita"] == 1 ? '<i class="bi bi-star-fill"></i>' : '<i class="bi bi-star"></i>'; 
    echo '</td>
            <td>
                <a href="editar_empresa.php?id_empresa='.$empresa["id_empresa"].'">
                    '.$empresa["nombre_empresa"].'
                </a>
            </td>
            <td>'.$empresa["direccion_empresa"].'</td>
            <td>'.$empresa["email_empresa"].'</td>
            <td>'.$empresa["telefono_empresa"].'</td>
            <td>'.$empresa["responsable_empresa"].'</td>
            <td>
                <a href="editar_empresa.php?id_empresa='.$empresa["id_empresa"].'">
                    <i class="bi bi-pencil-fill" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"></i>
                </a>';
            $_GET["id_empresa"] = $empresa["id_empresa"];
            include("./modal.php");
         echo '<a  data-toggle="modal" data-target="#delete_modal_'.$empresa["id_empresa"].'" data-id="'.$empresa["id_empresa"].'">
                    <i class="bi bi-trash3-fill" data-bs-toggle="tooltip" data-bs-placement="top" title="Borrar"></i>
                </a>
            </td>
        </tr>';
}




?>