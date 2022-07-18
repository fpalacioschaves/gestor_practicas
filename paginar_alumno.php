<?php
include("./funciones.php");
$tabla= $_GET["tabla"];
$inicio = $_GET["valor"];
$limite= $_GET["limite"];


$conexion = new conectar_db();
$consulta = "SELECT * FROM $tabla LIMIT $inicio,10";
$resultados = $conexion->consultar($consulta);
$resultados = $resultados->fetch_all(MYSQLI_ASSOC);

foreach($resultados as $alumno){
    $id_alumno = $alumno["id_alumno"];


    // Checkeamos si tiene empresa asociada
    if(count(leer_empresa_alumno($id_alumno)) > 0){
    $empresa_asociada = leer_empresa_alumno($id_alumno)[0]["nombre_empresa"];
    $id_empresa_asociada = leer_empresa_alumno($id_alumno)[0]["id_empresa"];
    $tr_class = "success";
    }
    else{
        $empresa_asociada = "No asociado";
        $id_empresa_asociada = "";
        $tr_class = "dark";
    }
    
    echo '
    <tr class="table-'.$tr_class.'">
        <td>
            <a href="editar_alumno.php?id_alumno='.$alumno["id_alumno"].'">
                '.$alumno["nombre"].'
            </a>
        </td>
        <td>'.$alumno["apellidos"].'</td>
        <td>'.$alumno["dni"].'</td>
        <td>'.$alumno["telefono"].'</td>';
 
        if($id_empresa_asociada == ""){
            echo '<td>'.$empresa_asociada.'</td>';
        }else{
        echo '<td><a href="editar_empresa.php?id_empresa'.$id_empresa_asociada.'">
                '.$empresa_asociada.'</a></td>';
        }
        echo '<td>
            <a href="editar_alumno.php?id_alumno='.$alumno["id_alumno"].'">
                <i class="bi bi-pencil-fill" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"></i>
            </a>';  
            
            $_GET["id_alumno"] = $alumno["id_alumno"];
            include("./modal_alumno.php");
            echo '<a  data-toggle="modal" data-target="#delete_modal_'.$alumno["id_alumno"].'" data-id="'.$alumno["id_alumno"].'">
                <i class="bi bi-trash3-fill" data-bs-toggle="tooltip" data-bs-placement="top" title="Borrar"></i>
            </a>             
        </td>
    </tr>';
    
}




?>