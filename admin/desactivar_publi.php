<?php 
session_start();

#se mandan a llamar los archivos de configuracion y funciones
require '../admin/config.php';
require '../functions.php';

#se comprueba si la sesion de admin esta activa
comprobarSessionadmin();

#se comprueba si la conexion no se ha podido realizar
$conexion = conexion($bd_config);
if (!$conexion) {
    header('Location: ../error.php');
}

//se obtiene el id del articulo a aprobar
$id = limpiarDatos($_GET['id']);

//si no se ha recibido un id, se redirige al admin
if (!$id) {
    header('Location: ' . RUTA . '/editor');
}

//se prepara la consulta para aprobar el artículo y actualizar la fecha
$statement = $conexion->prepare('UPDATE publicaciones SET status = "inactivo" WHERE id = :id');

//se ejecuta la consulta con el id del articulo a aprobar y la fecha actual
$statement->execute(array('id' => $id));


//se redirige al admin
header('Location: ' . RUTA . '/views/admin_panel_publicaciones.php');
?>
