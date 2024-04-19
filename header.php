<?php

// session_start();

// Include the configuration file and functions
require 'admin/config.php';
require 'functions.php';

// Establish a database connection
$conexion = conexion($bd_config);


// Redirect to error page if there is no database connection
if(!$conexion){
    header('Location: error.php');
}

// Get the post data from the database based on the article ID
$post = obtener_usuario_por_id($conexion, $_SESSION['id']);



// Include the single post view
require 'views/header.php';

?>