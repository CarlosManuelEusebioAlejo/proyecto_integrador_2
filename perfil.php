<?php
// Include the configuration file and functions
require 'admin/config.php';
require 'functions.php';

// Establish a database connection
$conexion = conexion($bd_config);

// Redirect to error page if there is no database connection
if(!$conexion){
    header('Location: error.php');
    exit(); // Ensure that the script stops after redirection
}

// Check if a user ID or username is provided in the URL
if(isset($_GET['id']) || isset($_GET['usuario'])) {
    // If ID is provided, search by ID
    if(isset($_GET['id'])) {
        $id_usuario = id_articulo($_GET['id']); // CORRECTED FUNCTION NAME
        $perfil = obtener_usuario_por_id($conexion, $id_usuario);
    }
    // If username is provided, search by username
    else {
        $usuario = limpiarDatos($_GET['usuario']);
        $perfil = obtener_usuario_por_id($conexion, $usuario);
    }

    // Check if the profile exists
    if(!$perfil) {
        // Redirect to error page if the profile doesn't exist
        header('Location: error.php');
        exit(); // Ensure that the script stops after redirection
    }
} else {
    // If neither ID nor username is provided, redirect to index page or any other appropriate page
    header('Location: index.php');
    exit(); // Ensure that the script stops after redirection
}

// Include the profile view
require 'views/perfil.view.php';
?>
