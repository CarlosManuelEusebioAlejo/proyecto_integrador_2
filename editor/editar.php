<?php session_start();

require '../admin/config.php';
require '../functions.php';

# Verificar si la sesión de editor está activa
comprobarSessioneditor();

#se comprueba si la conexion no se ha podido realizar
$conexion = conexion($bd_config);
if (!$conexion) {
    header('Location: ../error.php');
    exit;
}

#si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
        $archivo_subido = '../' . $blog_config['carpeta_imagenes'] . $thumb_guardada; // Se usa el nombre de la imagen guardada
        move_uploaded_file($thumb['tmp_name'], $archivo_subido);
        $thumb = $thumb_guardada; // Se mantiene el nombre de la imagen guardada
    }

    #se prepara la consulta para actualizar la publicacion
    $statement = $conexion->prepare(
        'UPDATE publicaciones SET titulo = :titulo, tema = :tema, extracto = :extracto, texto = :texto, thumb = :thumb, status = "pendiente" WHERE id = :id'
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
    header('Location: ' . RUTA . '/views/editor_panel_publicaciones.php');
} else {
    #si no se ha enviado el formulario, se obtiene el id del articulo a editar
    $id_articulo = id_articulo($_GET['id']);

    #si no se ha recibido un id, se redirige al editor
    if (empty($id_articulo)) {
        header('Location: ' . RUTA . '/editor');
        exit;
    }

    #se obtiene la publicacion a editar
    $posts = obtener_post_por_id($conexion, $id_articulo);

    #si no se ha encontrado la publicacion, se redirige al editor
    if (!$posts) {
        header('Location: ' . RUTA . '/editor');
        exit;
    }

    #se obtiene la publicacion
    $posts = $posts[0];

    # Verificar si el editor es el creador del posts
    if ($_SESSION['id'] !== $posts['id_usuario']) {
        header('Location: ' . RUTA . '/editor');
        exit;
    }
}

require '../views/editar.view.php';
?>
