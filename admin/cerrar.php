<?php session_start();

# Destruir la sesión
session_destroy();
$_SESSION = array();

# Redirigir al login
header('Location: ../');
die();

?>