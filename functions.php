<?php

//conexion a base de datos
// Function to establish a database connection
function conexion($bd_config){
    try {
        // Creating a new PDO object to connect to the database
        $conexion = new PDO('mysql:host=localhost;dbname='.$bd_config['basedatos'], $bd_config['usuario'], $bd_config['pass']);
        return $conexion;
    }catch (PDOExeption $e) {
        return false;
    }
}

//limpiar datos
// Function to clean input data
function limpiarDatos($datos){
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}

// Function to get the current page number
function pagina_actual(){
    return isset($_GET['p']) ? (int)$_GET['p'] : 1;
}

// Function to retrieve posts from the database

function obtener_post($post_por_pagina, $conexion) {
    $inicio = (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina : 0;
    // Modificar la consulta SQL para seleccionar solo las publicaciones aprobadas
    $sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM publicaciones WHERE status = 'activo' ORDER BY fecha DESC LIMIT $inicio, $post_por_pagina");
    $sentencia->execute();
    return $sentencia->fetchAll();
}
function obtener_post_filtro($conexion) {
    $sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM publicaciones ORDER BY fecha DESC");
    $sentencia->execute();
    return $sentencia->fetchAll();
}

function obtener_notificaciones($conexion, $usuario){
    $sentencia = $conexion->prepare("SELECT * FROM publicaciones WHERE id_usuario = '$usuario'");
    $sentencia->execute();
    return $sentencia->fetchAll();
}


// En tu archivo functions.php

// function obtener_post_index($cantidad, $conexion) {
//     // Modificar la consulta SQL para seleccionar solo las publicaciones aprobadas
//     $statement = $conexion->prepare(
//         "SELECT * FROM publicaciones WHERE status = 'aprobado' ORDER BY fecha DESC LIMIT :cantidad"
//     );
//     // Vincular el parámetro :cantidad
//     $statement->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
//     // Ejecutar la consulta
//     $statement->execute();
//     // Obtener y devolver los resultados
//     return $statement->fetchAll(PDO::FETCH_ASSOC);
// }

function obtener_post_pendientes($conexion) {
    // $inicio = (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina : 0;
    // Modificar la consulta SQL para seleccionar solo las publicaciones aprobadas
    $sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM publicaciones WHERE status = 'pendiente' ORDER BY fecha DESC");
    $sentencia->execute();
    return $sentencia->fetchAll();
}


//funcion para obtener publicaciones de un editor en particular
function obtener_post_editor($conexion, $editor){
    $sentencia = $conexion ->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM publicaciones WHERE id_usuario = '$editor' ORDER BY fecha DESC");
    $sentencia -> execute();
    return $sentencia->fetchAll();
}

//funcion para mostrar los editores en la misma pagina
function obtener_usuarios($conexion){
    $sentencia = $conexion ->prepare("SELECT * FROM usuarios WHERE tipo = 'editor' || tipo = 'admin'");
    $sentencia -> execute();
    return $sentencia->fetchAll();
}
function obtener_postulantes($conexion){
    $sentencia = $conexion ->prepare("SELECT * FROM postulantes");
    $sentencia -> execute();
    return $sentencia->fetchAll();
}

// Function to sanitize article ID
function id_articulo($id){
    return (int)limpiarDatos($id);
}

function user_usuario($usuario){
    return (string)limpiarDatos($usuario);
}

// Function to retrieve a post by its ID
function obtener_post_por_id($conexion, $id){
    $resultado = $conexion->query("SELECT * FROM publicaciones WHERE id = $id LIMIT 1");
    $resultado = $resultado->fetchAll();
    return ($resultado) ? $resultado : false;
}



// Function to retrieve a user by their username
// function obtener_usuario_por_id($conexion, $usuario){
//     $statement = $conexion->prepare("SELECT * FROM usuarios WHERE id = :id LIMIT 1");
//     $statement->execute(array(':id' => $usuario));
//     return $statement->fetch();
// }

// Function to retrieve a user by their ID or username
function obtener_usuario_por_id($conexion, $id_usuario){
    // Check if the provided input is numeric (indicating ID) or string (indicating username)
    if (is_numeric($id_usuario)) {
        // If the input is numeric, assume it's an ID and search by ID
        $statement = $conexion->prepare("SELECT * FROM usuarios WHERE id = :id LIMIT 1");
        $statement->execute(array(':id' => $id_usuario));
    } else {
        // If the input is not numeric, assume it's a username and search by username
        $statement = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1");
        $statement->execute(array(':usuario' => $id_usuario));
    }
    return $statement->fetch();
}

function obtener_postulante_por_id($conexion, $id_postulante){
    $statement = $conexion->prepare("SELECT * FROM postulantes WHERE id = :id LIMIT 1");
    $statement->execute(array(':id' => $id_postulante));
    return $statement->fetch();
}





// Function to format a date
function fecha($fecha){
    $timestamp = strtotime($fecha);
    $meses = ['Enero', 'Febrero', 'Marzo', 'Abril',
            'Mayo', 'Junio', 'Julio', 'Agosto',
            'Septiembre', 'Octubre', 'Noviembre',
            'Diciembre'];

    $dia = date('d', $timestamp);
    $mes = date('m', $timestamp) -1;
    $year = date('Y', $timestamp);

    $fecha = "$dia de " . $meses[$mes] . " del $year";
    return $fecha;
}

// Function to calculate the total number of pages
function numero_paginas($post_por_pagina, $conexion){
    $total_post = $conexion->prepare('SELECT FOUND_ROWS() as total');
    $total_post->execute();
    $total_post = $total_post->fetch()['total'];

    $numero_paginas = ceil($total_post / $post_por_pagina);
    return $numero_paginas;
}

// Function to check if the admin session is active
function comprobarSessionadmin(){
    // Check if the admin session is not set
    if (!isset($_SESSION['admin'])) {
        // Redirect to the login page
        header('Location: ' . RUTA . '/login.php');
        exit(); // It is recommended to add exit() after the redirection to ensure that the script stops
    }
}

// Function to check if the editor session is active
function comprobarSessioneditor(){
    if (!isset($_SESSION['editor'])){
        header('Location: ' . RUTA . '/login.php');
        exit();
    }
}




//status de la publicacion, se comprueba si el estatus es pendiente de aceptar por el administrador o si ya fue aceptado


?>

