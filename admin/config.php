<?php

#se define la ruta del proyecto
define('RUTA', 'http://localhost/blog1-feature-isa/');

#se definen los datos de la base de datos
$bd_config = array(
    'basedatos' => 'blog_web',
    'usuario' => 'root',
    'pass' => ''
);

#se definen los datos del blog
$blog_config = array(
    'post_por_pagina' => '4',
    'carpeta_imagenes' => 'imagenes/'
);

#se definen los datos del administrador
// $blog_admin = array(
//     'usuario' => 'angel',
//     'password' => '123'
// );

// #se definen los datos del editor
// $blog_editores = array(
//     'usuario' => 'editor',
//     'password' => '123'
// );


?>