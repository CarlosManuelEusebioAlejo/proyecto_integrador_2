<?php session_start();


require 'config.php';
require '../functions.php';

# Verificar si la sesión de admin está activa
comprobarSessionadmin();

#se comprueba si la conexion no se ha podido realizar
$conexion = conexion($bd_config);
if (!$conexion) {
    header('Location: ../error.php');
}

#editar publicacion
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    #se obtienen los datos del formulario
    $titulo = limpiarDatos($_POST['titulo']);
    $tema = $_POST['tema'];
    $extracto = limpiarDatos($_POST['extracto']);
    $texto = $_POST['texto'];
    $thumb_guardada = $_POST['thumb-guardada'];
    $thumb = $_FILES['thumb'];

    #si no se selecciona una nueva imagen, se mantiene la anterior
    if(empty($thumb['name'])){
        $thumb = $thumb_guardada;
    }else{
        $archivo_subido = '../' . $blog_config['carpeta_imagenes'] . $_FILES['thumb']['name'];
        move_uploaded_file($_FILES['thumb'] ['tmp_name'], $archivo_subido);
        $thumb = $_FILES['thumb']['name'];
    }

    #se prepara la consulta para actualizar la publicacion
    $statement = $conexion->prepare(
        'UPDATE publicaciones SET titulo = :titulo, tema = :tema, extracto = :extracto, texto = :texto, thumb = :thumb WHERE id = :id'
    );

    #se actualiza la publicacion
    $statement->execute(array(
        ':titulo' => $titulo,
        ':tema' => $tema, // 'tema' => 'Salud' o 'Bienestar
        ':extracto' => $extracto,
        ':texto' => $texto,
        ':thumb' => $thumb,
        ':id' => $_POST['id']
    ));

    #se redirige al admin
    header('Location: ' . RUTA . '/admin');
}else{
    #si no se ha enviado el formulario, se obtiene el id del articulo a editar
    $id_articulo = id_articulo($_GET['id']);

    #si no se ha recibido un id, se redirige al admin
    if(empty($id_articulo)){
        header('Location: ' . RUTA . '/admin');
    }

    #se obtiene la publicacion a editar
    $post = obtener_post_por_id($conexion, $id_articulo);

    #si no se ha encontrado la publicacion, se redirige al admin
    if(!$post){
        header('Location: ' . RUTA . '/admin');
    }

    #se obtiene la publicacion
    $post = $post[0];
}



require '../views/editar.view.php';




?>