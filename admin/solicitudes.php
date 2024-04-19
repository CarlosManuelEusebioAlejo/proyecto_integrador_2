<?php 
// Start the session
session_start();

// Include the configuration file
require 'config.php';

// Include the functions file
require '../functions.php';

// Establish a database connection
$conexion = conexion($bd_config);

// Check if the admin session is valid
comprobarSessionadmin();

// Redirect to an error page if the database connection fails
if (!$conexion){
    header('Location: ../error.php');
}

// Retrieve posts from the database
$posts = obtener_post_pendientes( $conexion);

// Include the admin index view file
require '../views/solicitudes.view.php';
?>