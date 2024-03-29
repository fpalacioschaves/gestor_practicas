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
        <h1 class="title">Listado de empresas</h1>
        <!-- Contenido  
        <div class="filtro">
            <label for="filtro">Filtrar:</label>
            <input type="text" name="filtro" id="filtro" onkeyup="filtrar_empresas();">
            <button class="btn btn-primary" onclick="document.getElementById('filtro').value = ''; filtrar_empresas();">Borrar</button>
        </div>-->

        <div class="add_empresa">
            <a href="empresas.php" class="btn btn-danger"><i class="bi bi-arrow-counterclockwise"></i> Eliminar filtros</a>
            <a href="add_empresa.php" class="btn btn-success"><i class="bi bi-plus-circle"></i> Añadir empresa</a>
        </div>

        <div class="color_code">
            <div class="item">
                <i class="bi bi-star-fill" onclick="filtrar_favoritas();"></i> Empresa favorita
            </div>
            <div class="item">
                Por contactar <div class="cuadrado dark" onclick="filtrar_por_contactar();"></div>
            </div>

            <div class="item">
                Contactado <div class="cuadrado light" onclick="filtrar_contactadas();"></div>
            </div>

            <div class="item">
                No interesado <div class="cuadrado danger" onclick="filtrar_no_interesadas();"></div>
            </div>

            <div class="item">
                Interesado <div class="cuadrado success" onclick="filtrar_interesadas();"></div>
            </div>
        </div>
        <table class="table table-hover" id="tabla_empresas">
            <thead class="thead-dark">
                <tr>
                    <th>Favorita</th>
                    <th>Estado</th>
                    <th id="cabecera_nombre" data-order="ASC">
                        Nombre
                        <!--<i class="bi bi-arrow-down-circle-fill" id="flecha_arriba"></i>
                        <i class="bi bi-arrow-up-circle-fill" id="flecha_abajo"></i>-->
                    </th>
                    <th>Dirección</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody id="tbody_empresas">
                <?php
                $empresas = leer_empresas();
                foreach ($empresas as $empresa) {
                    $estado_empresa = $empresa["estado_empresa"];
                    switch ($estado_empresa) {
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
                ?>
                    <tr class="table-<?php echo $tr_class; ?>">
                        <td class="favorita" id="favorita_<?php echo $empresa["id_empresa"];?>" onclick="favorita(<?php echo $empresa['id_empresa'];?>);">
                            <?php echo $empresa["favorita"] == 1 ? '<i class="bi bi-star-fill"></i>' : '<i class="bi bi-star"></i>'; ?>
                        </td>
                        <td><?php echo $empresa["estado_empresa"];?></td>
                        <td><a href="editar_empresa.php?id_empresa=<?php echo $empresa["id_empresa"]; ?>"><?php echo $empresa["nombre_empresa"]; ?></a></td>
                        <td><?php echo $empresa["direccion_empresa"]; ?></td>
                        <td><?php echo $empresa["email_empresa"]; ?></td>
                        <td><?php echo $empresa["telefono_empresa"]; ?></td>
                        <td>
                            <!-- Editar empresa -->
                            <a href="editar_empresa.php?id_empresa=<?php echo $empresa["id_empresa"]; ?>"><i class="bi bi-pencil-fill" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"></i></a>
                            <!-- Borrar empresa -->
                            <?php
                            $_GET["id_empresa"] = $empresa["id_empresa"];
                            include("./modal.php"); ?>
                            <a data-toggle="modal" data-target="#delete_modal_<?php echo $empresa["id_empresa"]; ?>" data-id="<?php echo $empresa["id_empresa"]; ?>"><i class="bi bi-trash3-fill" data-bs-toggle="tooltip" data-bs-placement="top" title="Borrar"></i></a>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfooter class="thead-dark">
                <tr>
                    <th class="favorita">Favorita</th>
                    <th>Estado</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </tfooter>
        </table>
        <?php
        if (contar_items("empresas") > 10) {
        ?>
           <!-- <div class="paginador">

                <a data-inicio="0" onclick="paginar('empresas','anterior',this.getAttribute('data-inicio'),<?php echo contar_items('empresas'); ?>);" id="anterior" class="btn btn-primary disabled">Anterior </a>
                <a data-inicio="0" id="siguiente" onclick="paginar('empresas','siguiente',this.getAttribute('data-inicio'),<?php echo contar_items('empresas'); ?>);" class="btn btn-primary">Siguiente</a>
            </div>-->
        <?php } ?>
    </section>

<?php include("footer.php");?>