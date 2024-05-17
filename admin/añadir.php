<?php 
session_start(); // Start the session

require 'config.php'; // Include the config file
require '../functions.php'; // Include the functions file

comprobarSessionadmin(); // Check if the admin session is valid
$conexion = conexion($bd_config);
if (!$conexion) {
    header('Location: ../error.php');
}


// añadimos nuevos editores o administradores al la base de datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = limpiarDatos($_POST['usuario']);
    $nombre = limpiarDatos($_POST['nombre']);
    $email = limpiarDatos($_POST['email']);
    $password = limpiarDatos($_POST['contrasena']);
    $tipo = ($_POST['tipo']);
    $apellido = limpiarDatos($_POST['apellido']);
    $telefono = limpiarDatos($_POST['telefono']);
    $experiencia = limpiarDatos($_POST['experiencia']);


    $errores = '';

    if (empty($usuario) or empty($nombre) or empty($email) or empty($password) or empty($tipo)) {
        $errores .= '<li>Por favor rellena todos los datos correctamente</li>';
    } else {
        try {
            $conexion = new PDO('mysql:host=localhost;dbname=blog_web', 'angel1', '123');
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $statement = $conexion->prepare('INSERT INTO usuarios (id, usuario, nombre, tipo, email, password, apellido, telefono, experiencia, perfil) VALUES (null, :usuario, :nombre, :tipo, :email, :password, :apellido, :telefono, :experiencia, "default.jpg")');
        $statement->execute(array(
            ':usuario' => $usuario,
            ':nombre' => $nombre,
            ':tipo' => $tipo,
            ':email' => $email,
            ':password' => $password,
            ':apellido' => $apellido,
            ':telefono' => $telefono,
            ':experiencia' => $experiencia
        ));

        header('Location: editores.php');
    }
}

require '../views/añadir.view.php'; // Include the 'nuevo.view.php' file