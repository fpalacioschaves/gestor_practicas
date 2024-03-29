<?php
class conectar_db{    
    private $host   ="localhost";
    private $usuario="root";
    private $clave  ="";
    private $db     ="gestion_practicas";
    public $conexion;
    public function __construct(){
       // El constructor lleva la conexión
        $this->conexion = new mysqli($this->host, $this->usuario, $this->clave,$this->db)
        or die($this->conexion->connect_error);
        $this->conexion->set_charset("utf8");
    }
    
    //CONSULTAR
    public function consultar($consulta){
        $resultado = $this->conexion->query($consulta) or die($this->conexion->error);
        if($resultado)
            return $resultado;
    } 

    //Contar resultados
    public function contar_resultados(){
        $resultado = $this->conexion->affected_rows;
        return $resultado;
    }

    public function ultima_id(){
        $resultado = $this->conexion->insert_id;
        return $resultado;
    }
    
    // CERRAR
    public function cerrar(){
      $this->conexion->close();
    }
}



function check_session(){
    if(!$_SESSION["usuario"]){
        header('Location: index.php');
    }
}

// function that reads all the companies from the database
function leer_empresas($inicio = 0){

    $conexion = new conectar_db();
    $consulta = "SELECT DISTINCT * FROM empresas ORDER BY nombre_empresa";
    $resultado = $conexion->consultar($consulta);
    $conexion->cerrar();
    return $resultado->fetch_all(MYSQLI_ASSOC);
}

// function that reads the company with the id passed as parameter
function leer_empresa($id_empresa){

    $conexion = new conectar_db();
    $consulta = "SELECT * FROM empresas WHERE id_empresa=" . $id_empresa;
    $resultado = $conexion->consultar($consulta);
    $conexion->cerrar();
    return $resultado->fetch_all(MYSQLI_ASSOC);
}

//function that updates the company data in the database
function update_empresa($id, $datos){

    $conexion = new conectar_db();
    $favorita = $datos["favorita"];
    $nombre_empresa = $datos["nombre_empresa"];
    $direccion_empresa = $datos["direccion_empresa"];
    $email_empresa = $datos["email_empresa"];
    $telefono_empresa = $datos["telefono_empresa"];
    $url_empresa = $datos["url_empresa"];
    $responsable_empresa = $datos["responsable_empresa"];
    $estado_empresa = $datos["estado_empresa"];
    $tutor_empresa = $datos["tutor_empresa"];
    $convenio_estado = $datos["convenio_estado"];
    $anexo_1_estado = $datos["anexo_1_estado"];
    $anexo_8_estado = $datos["anexo_8_estado"];
    $rlt_estado = $datos["rlt_estado"];

    $consulta = "UPDATE empresas
    SET favorita= $favorita,
    nombre_empresa= '$nombre_empresa',
    email_empresa = '$email_empresa',
    direccion_empresa = '$direccion_empresa',
    telefono_empresa = $telefono_empresa,
    url_empresa = '$url_empresa',
    responsable_empresa = '$responsable_empresa',
    estado_empresa = '$estado_empresa',
    tutor_empresa = '$tutor_empresa',
    convenio_estado = '$convenio_estado',
    anexo_1_estado = '$anexo_1_estado',
    anexo_8_estado = '$anexo_8_estado',
    rlt_estado = '$rlt_estado' 
    WHERE id_empresa = $id";


    $resultado = $conexion->consultar($consulta);

    header('Location: empresas.php');

}



//function that add the company data in the database
function add_empresa($datos){

    $conexion = new conectar_db();
    $favorita = $datos["favorita"];
    $nombre_empresa = $datos["nombre_empresa"];
    $direccion_empresa = $datos["direccion_empresa"];
    $email_empresa = $datos["email_empresa"];
    $telefono_empresa = $datos["telefono_empresa"];
    $url_empresa = $datos["url_empresa"];
    $responsable_empresa = $datos["responsable_empresa"];
    $estado_empresa = $datos["estado_empresa"];
    $tutor_empresa = $datos["tutor_empresa"];
    $convenio_estado = $datos["convenio_estado"];
    $anexo_1_estado = $datos["anexo_1_estado"];
    $anexo_8_estado = $datos["anexo_8_estado"];
    $rlt_estado = $datos["rlt_estado"];

    $consulta = "INSERT INTO empresas
    (favorita,nombre_empresa, email_empresa,direccion_empresa,
    telefono_empresa,url_empresa,responsable_empresa,
    estado_empresa,tutor_empresa,convenio_estado,
    anexo_1_estado, anexo_8_estado,rlt_estado)
    VALUES ($favorita,'$nombre_empresa', '$email_empresa',
    '$direccion_empresa',$telefono_empresa,
    '$url_empresa','$responsable_empresa', '$estado_empresa',
    '$tutor_empresa','$convenio_estado',
    '$anexo_1_estado','$anexo_8_estado','$rlt_estado')";

    echo $consulta;
   
    $resultado = $conexion->consultar($consulta);

    $conexion->cerrar();

    header('Location: empresas.php');

}

// function that reads all the alumns from the database
function leer_alumnos($inicio = 0){

    $conexion = new conectar_db();
    $consulta = "SELECT * FROM alumnos ORDER BY apellidos";
    $resultado = $conexion->consultar($consulta);
    $conexion->cerrar();
    return $resultado->fetch_all(MYSQLI_ASSOC);
}

// function that reads the company with the id passed as parameter
function leer_alumno($id_alumno){

    $conexion = new conectar_db();
    $consulta = "SELECT * FROM alumnos WHERE id_alumno=" . $id_alumno;
    $resultado = $conexion->consultar($consulta);
    $conexion->cerrar();
    return $resultado->fetch_all(MYSQLI_ASSOC);
}

function update_alumno($id, $datos){

    $conexion = new conectar_db();
    $finalizado = $datos["finalizado"];
    $nombre = $datos["nombre"];
    $apellidos = $datos["apellidos"];
    $dni = $datos["dni"];
    $telefono = $datos["telefono"];
    $email = $datos["email"];
    $empresa_asociada = $datos["empresa_asociada"];
    $fecha_inicio = $datos["fecha_inicio"];
    $fecha_fin = $datos["fecha_fin"];
    
    $consulta = "UPDATE alumnos
    SET nombre= '$nombre',
    finalizado = $finalizado,
    apellidos = '$apellidos',
    dni = '$dni',
    telefono = $telefono,
    email = '$email'
    WHERE id_alumno = $id";

    $resultado = $conexion->consultar($consulta);

    // Miramos si el alumno tiene empresa asociada o no
    if($empresa_asociada != ""){

        $consulta2 = "SELECT * FROM alumno_asignado_empresa WHERE id_alumno = $id";
        $resultado2 = $conexion->consultar($consulta2)->fetch_all(MYSQLI_ASSOC);
        // Si no la tiene la añadimos
        if( count( $resultado2 ) == 0 ){
            $consulta3 = "INSERT INTO alumno_asignado_empresa (id_alumno, id_empresa, fecha_inicio, fecha_fin) 
            VALUES ($id, $empresa_asociada, '$fecha_inicio', '$fecha_fin')";
            $resultado3 = $conexion->consultar($consulta3);
        }
        else{
            // Si la tiene la actualizamos
            $consulta4 = "UPDATE alumno_asignado_empresa SET 
            id_empresa = $empresa_asociada,
            fecha_inicio = '$fecha_inicio',
            fecha_fin = '$fecha_fin'
            WHERE id_alumno = $id"; 
            echo $consulta4;
            $resultado4 = $conexion->consultar($consulta4);
        }
    }
    else{
        // Si no tiene empresa asociada la borramos
        $consulta5 = "DELETE FROM alumno_asignado_empresa WHERE id_alumno = $id";
        $resultado5 = $conexion->consultar($consulta5);
    }
    

    header('Location: alumnos.php');

}
function leer_alumno_empresa($id_empresa){
    $conexion = new conectar_db();
    $consulta = "SELECT * FROM alumno_asignado_empresa, alumnos 
    WHERE id_empresa=" . $id_empresa . " AND alumno_asignado_empresa.id_alumno = alumnos.id_alumno";
    $resultado = $conexion->consultar($consulta);
    $conexion->cerrar();
    return $resultado->fetch_all(MYSQLI_ASSOC);
}

function leer_empresa_alumno($id_alumno){
        $conexion = new conectar_db();
        $consulta = "SELECT * FROM alumno_asignado_empresa, empresas 
        WHERE id_alumno=" . $id_alumno . " AND alumno_asignado_empresa.id_empresa = empresas.id_empresa";
        $resultado = $conexion->consultar($consulta);
        $conexion->cerrar();
        return $resultado->fetch_all(MYSQLI_ASSOC);
}

//function that add the company data in the database
function add_alumno($datos){

    $conexion = new conectar_db();
    $finalizado = $datos["finalizado"];
    $nombre = $datos["nombre"];
    $apellidos = $datos["apellidos"];
    $dni = $datos["dni"];
    $telefono = $datos["telefono"];
    $email = $datos["email"];
    $empresa_asociada = $datos["empresa_asociada"];
    $fecha_inicio = $datos["fecha_inicio"];
    $fecha_fin = $datos["fecha_fin"];
    
    $consulta = "INSERT INTO alumnos
    (nombre, apellidos,dni,
    telefono,email, finalizado)
    VALUES ('$nombre', '$apellidos',
    '$dni',$telefono, '$email', $finalizado)";

   
   
    $resultado = $conexion->consultar($consulta);

    //$last_id = mysqli_insert_id($conexion);
    $last_id = $conexion->ultima_id();


    // Miramos si el alumno tiene empresa asociada o no
    if($empresa_asociada != ""){

        
            $consulta3 = "INSERT INTO alumno_asignado_empresa (id_alumno, id_empresa, fecha_inicio, fecha_fin) 
            VALUES ($last_id, $empresa_asociada, '$fecha_inicio', '$fecha_fin')";
            $resultado3 = $conexion->consultar($consulta3);
        
    }
    
    $conexion->cerrar();
    header('Location: alumnos.php');

}
// Función que lee las incidencias de cada empresa
function leer_incidencias($id_empresa){
    $conexion = new conectar_db();
    $consulta = "SELECT * FROM incidencias WHERE id_empresa=" . $id_empresa . " ORDER BY fecha_incidencia DESC";
    $resultado = $conexion->consultar($consulta);
    $conexion->cerrar();
    return $resultado->fetch_all(MYSQLI_ASSOC);

}

// Función que lee una incidencia en concreto
function leer_incidencia($id_incidencia){
    $conexion = new conectar_db();
    $consulta = "SELECT * FROM incidencias WHERE id_incidencia=" . $id_incidencia;
    $resultado = $conexion->consultar($consulta);
    $conexion->cerrar();
    return $resultado->fetch_all(MYSQLI_ASSOC);

}

//function that updates the incidencia data in the database
function update_incidencia($id, $id_empresa, $datos){

    $conexion = new conectar_db();
    $fecha_incidencia = $datos["fecha_incidencia"];
    $texto_incidencia = $datos["texto_incidencia"];

    $consulta = "UPDATE incidencias
    SET fecha_incidencia= '$fecha_incidencia',
    texto_incidencia = '$texto_incidencia' 
    WHERE id_incidencia = $id";


    $resultado = $conexion->consultar($consulta);
    $conexion->cerrar();

    header('Location: editar_empresa.php?id_empresa=' . $id_empresa);

}

//function that add the incidencia data in the database
function add_incidencia($id_empresa, $datos){

    $conexion = new conectar_db();
    $fecha_incidencia = $datos["fecha_incidencia"];
    $texto_incidencia = $datos["texto_incidencia"];

    $consulta = "INSERT INTO incidencias
    (fecha_incidencia, texto_incidencia, id_empresa)
    VALUES ('$fecha_incidencia','$texto_incidencia', $id_empresa)";

    $resultado = $conexion->consultar($consulta);
    $conexion->cerrar();

    header('Location: editar_empresa.php?id_empresa=' . $id_empresa);

}

function get_title(){
    $url = explode("/",$_SERVER['REQUEST_URI']);
    $file = end($url);
    $file_array = explode(".",$file);
    $title = trim(ucfirst($file_array[0]));
    $title = str_replace("_"," ",$title);
    return $title;
}

function contar_items($tabla){

    $conexion = new conectar_db();
    $consulta = "SELECT DISTINCT COUNT(*) AS numero FROM " . $tabla;
    $resultado = $conexion->consultar($consulta);
    $resultado = $resultado->fetch_all(MYSQLI_ASSOC);
    $conexion->cerrar();
    return $resultado[0]["numero"];
    

}

function contar_items_condicionado($tabla, $condicion){

    $conexion = new conectar_db();
    $consulta = "SELECT COUNT(*) AS numero FROM " . $tabla . " WHERE " . $condicion;
    $resultado = $conexion->consultar($consulta);
    $resultado = $resultado->fetch_all(MYSQLI_ASSOC);
    $conexion->cerrar();
    return $resultado[0]["numero"];


}

// Función que lee las ultimas incidencias
function leer_ultimas_incidencias(){
    $conexion = new conectar_db();
    $consulta = "SELECT * FROM incidencias LEFT JOIN empresas
    ON incidencias.id_empresa = empresas.id_empresa ORDER BY fecha_incidencia DESC LIMIT 4";
    $resultado = $conexion->consultar($consulta);
    $conexion->cerrar();
    return $resultado->fetch_all(MYSQLI_ASSOC);

}
function leer_incidencias_por_empresa(){
    $conexion = new conectar_db();
    $consulta = "SELECT COUNT(*) as numero_incidencias, incidencias.id_empresa, nombre_empresa FROM incidencias LEFT JOIN empresas ON incidencias.id_empresa = empresas.id_empresa GROUP BY incidencias.id_empresa ORDER BY numero_incidencias DESC LIMIT 8";
    $resultado = $conexion->consultar($consulta);
    $conexion->cerrar();
    return $resultado->fetch_all(MYSQLI_ASSOC);
}

// Función que lee las ultimas incidencias
function leer_agenda(){
    $conexion = new conectar_db();
    $consulta = "SELECT * FROM agenda  ORDER BY fecha DESC";
    $resultado = $conexion->consultar($consulta);
    $conexion->cerrar();
    return $resultado->fetch_all(MYSQLI_ASSOC);

}

//function that add the agenda item
function add_evento($datos){

    $conexion = new conectar_db();
    $titulo = $datos["titulo"];
    $descripcion = $datos["descripcion"];
    $fecha = $datos["fecha"];
    $hecho = 0;
    
    $consulta = "INSERT INTO agenda
    (titulo, descripcion,fecha, hecho)
    VALUES ('$titulo', '$descripcion',
    '$fecha', 0)";
    $resultado = $conexion->consultar($consulta);
    $conexion->cerrar();
    header('Location: agenda.php');

}

// function that reads the company with the id passed as parameter
function leer_evento($id_evento){

    $conexion = new conectar_db();
    $consulta = "SELECT * FROM agenda WHERE id_agenda =" . $id_evento;
    $resultado = $conexion->consultar($consulta);
    $conexion->cerrar();
    return $resultado->fetch_all(MYSQLI_ASSOC);
}

//function that updates the incidencia data in the database
function update_evento($id, $datos){

    $conexion = new conectar_db();
    $fecha = $datos["fecha"];
    $descripcion = $datos["descripcion"];
    $titulo = $datos["titulo"];
    $hecho = $datos["hecho"];


    $consulta = "UPDATE agenda
    SET fecha= '$fecha',
    descripcion = '$descripcion' ,
    titulo = '$titulo',
    hecho = $hecho
    WHERE id_agenda = $id";


    $resultado = $conexion->consultar($consulta);
    $conexion->cerrar();

    header('Location: agenda.php');

}

function leer_ultimos_items(){
    $conexion = new conectar_db();
    $consulta = "SELECT * FROM agenda WHERE hecho = 0 AND fecha >= CURDATE() ORDER BY fecha  DESC LIMIT 4";
    $resultado = $conexion->consultar($consulta);
    $conexion->cerrar();
    return $resultado->fetch_all(MYSQLI_ASSOC);
}

function leer_futuros_eventos(){
    $conexion = new conectar_db();
    $consulta = "SELECT COUNT(*) AS numero_futuros_eventos FROM agenda WHERE hecho = 0 AND fecha >= CURDATE()";
    $resultado = $conexion->consultar($consulta);
    $conexion->cerrar();
    return $resultado->fetch_all(MYSQLI_ASSOC);
    //return $resultado["numero_futuros_eventos"];
}
?>