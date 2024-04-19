<?php 
session_start(); // Start the session

require 'config.php'; // Include the config file
require '../functions.php'; // Include the functions file

comprobarSessionadmin(); // Check if the admin session is valid

$conexion = conexion($bd_config); // Connect to the database
if (!$conexion) {
    header('Location: ../error.php'); // Redirect to error page if connection fails
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){ // Check if the request method is POST
    $titulo = limpiarDatos($_POST['titulo']); // Clean and store the 'titulo' value
    $tema = $_POST['tema']; // Store the 'tema' value
    $extracto = limpiarDatos($_POST['extracto']); // Clean and store the 'extracto' value
    $texto = $_POST['texto']; // Store the 'texto' value
    $thumb = $_FILES['thumb']['tmp_name']; // Store the temporary name of the uploaded file
    $autor = $_SESSION['admin'];







    $archivo_subido = '../' . $blog_config['carpeta_imagenes'] . $_FILES['thumb']['name']; // Set the path for the uploaded file

    move_uploaded_file($thumb, $archivo_subido); // Move the uploaded file to the specified path

    $statement = $conexion->prepare(
        'INSERT INTO publicaciones (id, titulo, extracto, texto, thumb, tema, status, creador, id_usuario)
        VALUES (null, :titulo, :extracto, :texto, :thumb, :tema, "aprobado", :creador, :id_usuario)'
    ); // Prepare the SQL statement for inserting data into the 'articulos' table

    $statement->execute(array(
        ':titulo' => $titulo,
        ':extracto' => $extracto,
        ':texto' => $texto,
        ':thumb' => $_FILES['thumb']['name'],
        ':tema' => $tema,
        ':creador' => $autor,
        ':id_usuario' => $_SESSION['id']
    )); // Execute the SQL statement with the provided values

    header('Location: ' . RUTA . '/admin'); // Redirect to the admin page
}

require '../views/nuevo.view.php'; // Include the 'nuevo.view.php' file
