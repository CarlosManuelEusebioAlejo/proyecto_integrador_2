<?php

// Include the necessary files
require 'admin/config.php';
require 'functions.php';

// Establish a database connection
$conexion = conexion($bd_config);
if(!$conexion){
    header('Location: error.php');
}

// Query to search for publications related to the "salud" topic
$statment = $conexion->prepare('SELECT * FROM publicaciones WHERE tema LIKE "salud" AND status = "aprobado" ORDER BY fecha DESC');
$statment->execute();

// Fetch all the search results
$salud = $statment->fetchAll();

// Check if there are no search results

// Include the search results view
require 'views/salud.view.php';

?>
