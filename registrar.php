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

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nombre = limpiarDatos($_POST['nombre']);
    $apellido = limpiarDatos($_POST['apellido']);
    $usuario = limpiarDatos($_POST['Usuario']);
    $correo = $_POST['email'];
    $telefono = $_POST['telefono'];
    $experiencia = limpiarDatos($_POST['experiencia']);
    $password = $_POST['contrasena'];

    // Check if the username already exists in the usuarios table
    $statement = $conexion->prepare('SELECT COUNT(*) AS total FROM usuarios WHERE usuario = :usuario');
    $statement->execute(array(':usuario' => $usuario));
    $resultado = $statement->fetch();

    // If the username already exists, display an error message
    if ($resultado['total'] > 0) {
        $mensaje = "El nombre de usuario ya está en uso. Por favor, elija otro.";
    } else {
        // Insert the postulante data into the postulantes table
        $statement = $conexion->prepare('INSERT INTO postulantes (usuario, nombre, apellido, correo, telefono, experiencia, password) VALUES (:usuario, :nombre, :apellido, :correo, :telefono, :experiencia, :password)');
        $statement->execute(array(
            ':usuario' => $usuario,
            ':nombre' => $nombre,
            ':apellido' => $apellido,
            ':correo' => $correo,
            ':telefono' => $telefono,
            ':experiencia' => $experiencia,
            ':password' => $password
        ));

        // Success message
        $mensaje = "¡Registro como postulante exitoso! Gracias por postularte.";

        // Redirect to success page or show success message here
    }
}

require 'views/registrar.view.php';
?>
