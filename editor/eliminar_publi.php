<?php session_start();

require '../admin/config.php';
require '../functions.php';

// Comprobamos si la session esta iniciada, sino, redirigimos.
comprobarSessioneditor();

// 1.- Conectamos a la base de datos
$conexion = conexion($bd_config);
if(!$conexion){
	header('Location: ../error.php');
}

$id = limpiarDatos($_GET['id']);

// Comprobamos que exista un ID
if (!$id) {
	header('Location:' . RUTA . '/admin');
}

$statement = $conexion->prepare('DELETE FROM publicaciones WHERE id = :id');
$statement->execute(array('id' => $id));

header('Location: ' . RUTA . '/views/editor_panel_publicaciones.php');

?>