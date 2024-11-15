<?php

// Include the configuration file and functions
require 'admin/config.php';
require 'functions.php';

session_start();

// Establish a database connection
$conexion = conexion($bd_config);

// Get the article ID from the URL parameter
$id_articulo = id_articulo($_GET['id']);

// Redirect to error page if there is no database connection
if(!$conexion){
    header('Location: error.php');
}

// Redirect to index page if the article ID is empty
if(empty($id_articulo)){
    header('Location: index.php');
}

// Get the post data from the database based on the article ID
$publicacion = obtener_post_por_id($conexion, $id_articulo);


// Redirect to index page if the post does not exist
if (!$publicacion){
    header('Location: index.php');
}

// Get the first post from the array
$publicacion = $publicacion[0];

// Include the single post view
require 'views/single.view.php';

?>