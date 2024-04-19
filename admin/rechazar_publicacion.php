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



//se prepara la consulta para aprobar el artículo
$statement = $conexion->prepare('UPDATE publicaciones SET status = "rechazado", notificacion = "Tu publicacion fue rechazada" WHERE id = :id');
$noti = $conexion -> prepare("INSERT INTO notificaciones (id_editor, mensaje, titulo, status) VALUES (:id_editor, :mensaje, :titulo, :status)");

//se ejecuta la consulta con el id del articulo a aprobar y la fecha actual
$statement->execute(array('id' => $id));
// $noti->execute(array('id_editor' => $id, 'mensaje' => 'Su publicacion ha sido rechazada', 'titulo' => 'Publicacion rechazada', 'status' => 'no visto'));

//se redirige al admin
header('Location: ' . RUTA . '/admin/solicitudes.php');
?>
