<?php

// Include the necessary files
require 'admin/config.php';
require 'functions.php';

// Establish a database connection
$conexion = conexion($bd_config);
if(!$conexion){
    header('Location: error.php');
}

// Check if the request method is GET and the 'busqueda' parameter is not empty
if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['busqueda'])){
    // Clean the 'busqueda' parameter
    $busqueda = limpiarDatos($_GET['busqueda']);

    // Prepare and execute the SQL statement to search for articles
    $statment = $conexion->prepare(
        'SELECT * FROM publicaciones WHERE titulo LIKE :busqueda or texto LIKE :busqueda or extracto LIKE :busqueda or tema LIKE :busqueda or creador LIKE :busqueda AND status = "activo"'
    );
    $statment->execute(array(':busqueda' => "%$busqueda%"));

    // Fetch all the search results
    $resultados = $statment->fetchAll();

    // Check if there are no search results
    if (empty($resultados)){
        $titulo = 'No se encontraron artículos con el resultado: ' . $busqueda;
    } else {
        $titulo = 'Resultado de la búsqueda: ' . $busqueda;
    }
} else {
    // Redirect to the home page if the request method is not GET or 'busqueda' parameter is empty
    header('Location: ' . RUTA . '/index.php');
}

// Include the search results view
require 'views/buscar.view.php';

?>