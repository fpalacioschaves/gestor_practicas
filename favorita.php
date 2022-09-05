<?php
include("./funciones.php");

$id_empresa = $_GET["id_empresa"];

$conexion = new conectar_db();
$consulta = "SELECT favorita FROM empresas WHERE id_empresa = $id_empresa";
$resultado = $conexion->consultar($consulta);
$empresas = $resultado->fetch_all(MYSQLI_ASSOC);
foreach($empresas as $empresa){
   
   $favorita = intval($empresa["favorita"]);
  
   if($favorita == 1){
    $class = "bi bi-star";
    $favorita = 0;
   }
   else{
    $class = "bi bi-star-fill";
    $favorita = 1;
   }
   
}
$consulta = "UPDATE empresas SET favorita = $favorita WHERE id_empresa = $id_empresa";
$resultado = $conexion->consultar($consulta);
echo '<i class="'.$class.'"></i>';
      ?>

