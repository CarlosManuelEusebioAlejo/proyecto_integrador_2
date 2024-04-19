<?php 
// Start the session
session_start();

// Include the configuration file
require '../admin/config.php';

// Include the functions file
require '../functions.php';

// Establish a database connection
$conexion = conexion($bd_config);

// Check if the editor session is valid
comprobarSessioneditor();

// Redirect to error page if there is no database connection
if (!$conexion){
    header('Location: ../error.php');
}

// Get the posts from the database
$notificaciones = obtener_notificaciones($conexion, $_SESSION['id']);

// Include the editor index view
require '../views/notificaciones.view.php';
?>