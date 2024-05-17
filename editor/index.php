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
$posts = obtener_post_editor($blog_config['post_por_pagina'], $conexion, $_SESSION['editor']);

// Include the editor index view
require '../views/editor_index.view.php';
?>