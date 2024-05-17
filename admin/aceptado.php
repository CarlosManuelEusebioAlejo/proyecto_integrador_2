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

// Check if a postulante ID is provided in the URL
if(isset($_GET['id'])) {
    // Retrieve the ID of the postulante from the URL
    $id_postulante = $_GET['id'];

    // Obtain postulante details from the database
    $postulante = obtener_postulante_por_id($conexion, $id_postulante);

    // Insert postulante data into the usuarios table
    $statement = $conexion->prepare('INSERT INTO usuarios (usuario, password, tipo , nombre, apellido, email, telefono, experiencia, status) 
    VALUES (:usuario, :password, "editor" , :nombre, :apellido, :correo, :telefono, :experiencia, "activo")');
    $statement->execute(array(
        ':usuario' => $postulante['usuario'],
        ':password' => $postulante['password'],
        ':nombre' => $postulante['nombre'],
        ':apellido' => $postulante['apellido'],
        ':correo' => $postulante['correo'],
        ':telefono' => $postulante['telefono'],
        ':experiencia' => $postulante['experiencia']
    ));

    // Delete postulante data from the postulantes table
    $statement = $conexion->prepare('DELETE FROM postulantes WHERE id = :id');
    $statement->execute(array(':id' => $id_postulante));

    // Redirect to the page showing accepted postulantes
    header('Location: ../views/admin_panel_usuarios.php');
} else {
    // If no postulante ID is provided in the URL, redirect to an error page
    header('Location: ../error.php');
}
?>
