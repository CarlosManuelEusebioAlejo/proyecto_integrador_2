<?php

// Include the configuration file and functions
require 'admin/config.php';
require 'functions.php';

// Establish a database connection
$conexion = conexion($bd_config);

// If the connection fails, redirect to the error page
if(!$conexion){
    header('Location: error.php');
}

// Uncomment the following lines if you want to use the functions obtener_post() and pagina_actual()
// obtener_post();
// echo pagina_actual();

// Retrieve posts from the database
$posts = obtener_post($blog_config['post_por_pagina'], $conexion);

// If no posts are found, redirect to the error page
if(!$posts){
    header('Location: error.php');
}

// Include the index view file
require 'views/index.view.php';

?>