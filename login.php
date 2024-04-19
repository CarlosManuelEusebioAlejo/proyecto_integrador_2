<?php 
session_start();
require 'admin/config.php';
require 'functions.php';

if (isset($_SESSION['admin'])) {
    header('Location: ' . RUTA . '/admin'); // Redirigir al panel de administrador
    exit();
} elseif (isset($_SESSION['editor'])) {
    header('Location: ' . RUTA . '/editor'); // Redirigir al panel de editor
    exit();
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = limpiarDatos($_POST['usuario']);
    $password = limpiarDatos($_POST['password']);

    $conexion = conexion($bd_config);
    if ($conexion) {
        $statement = $conexion->prepare("SELECT id, usuario, tipo FROM usuarios WHERE usuario = :usuario AND password = :password");
        $statement->execute(array(':usuario' => $usuario, ':password' => $password));
        $resultado = $statement->fetch();

        if ($resultado !== false) {
            $_SESSION['id'] = $resultado['id']; // Añadir el id del usuario a la sesión
            if ($resultado['tipo'] == 'admin') {
                $_SESSION['admin'] = $resultado['usuario'];
                header('Location: '. RUTA . '/admin');
            } elseif ($resultado['tipo'] == 'editor') {
                $_SESSION['editor'] = $resultado['usuario'];
                header('Location: '. RUTA . '/editor');
            }
        } else {
            // Credenciales incorrectas
            echo "Usuario o contraseña incorrectos";
        }
    } else {
        // Error de conexión a la base de datos
        echo "Error de conexión a la base de datos";
    }
}

require 'views/login.view.php';
?>
