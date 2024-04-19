<?php

session_start(); // Start the session
// Incluir el archivo de configuración y las funciones
require 'config.php';
require '../functions.php';

// Establecer la conexión a la base de datos
$conexion = conexion($bd_config);

comprobarSessionadmin();


// Si la conexión falla, redirigir a la página de error
if (!$conexion) {
    header('Location: error.php');
}

// Verificar si se ha proporcionado un ID de postulante
if (isset($_GET['id'])) {
    // Obtener el ID del postulante desde la URL
    $id_postulante = $_GET['id'];

    // Consultar la base de datos para obtener los datos del postulante
    $statement = $conexion->prepare('SELECT * FROM postulantes WHERE id = :id');
    $statement->execute(array(':id' => $id_postulante));

    // Obtener los datos del postulante
    $postulante = $statement->fetch();

    // Si no se encuentra el postulante, redirigir a la página de error
    if (!$postulante) {
        header('Location: error.php');
    }
} else {
    // Si no se proporcionó un ID de postulante, redirigir a la página de error
    header('Location: error.php');
}

// Incluir el archivo de encabezado
require '../views/perfil_postulante.view.php';
?>


