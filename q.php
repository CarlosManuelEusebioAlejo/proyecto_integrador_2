<?php

if ($conexion) {
    $statement = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password");
    $statement->execute(array(':usuario' => $usuario, ':password' => $password));
    $resultado = $statement->fetch();

    if ($resultado !== false) {
        if ($resultado['tipo'] == 'admin') {
            $_SESSION['admin'] = $resultado['usuario'];
            header('Location: '. RUTA . '/admin');
        } elseif ($resultado['tipo'] == 'editor') {
            $_SESSION['editor'] = $resultado['usuario'];
            header('Location: '. RUTA . '/editor');
        }
    }
}

$statement = $conexion->prepare("SELECT * FROM publicaciones WHERE creador = :autor");
$statement->execute(array(':autor' => $_SESSION['editor']));
$posts = $statement->fetchAll();

    if(!($_SESSION['editor'] == $post['creador'])){
        header('Location: ' . RUTA . '/editor');

    }

    
        header('Location: ' . RUTA . '/editor');






?>