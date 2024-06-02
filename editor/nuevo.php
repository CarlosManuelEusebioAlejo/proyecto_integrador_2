<?php 
session_start(); // Iniciar sesión

require '../admin/config.php'; // Incluir el archivo de configuración
require '../functions.php'; // Incluir el archivo de funciones

comprobarSessioneditor(); // Verificar si la sesión de admin es válida

$conexion = conexion($bd_config); // Conectar a la base de datos
if (!$conexion) {
    header('Location: ../error.php'); // Redirigir a la página de error si la conexión falla
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){ // Verificar si el método de la solicitud es POST
    $titulo = limpiarDatos($_POST['titulo']); // Limpiar y almacenar el valor de 'titulo'
    $tema = $_POST['tema']; // Almacenar el valor de 'tema'
    $extracto = limpiarDatos($_POST['extracto']); // Limpiar y almacenar el valor de 'extracto'
    $texto = $_POST['texto']; // Almacenar el valor de 'texto'
    $thumb = $_FILES['thumb']['tmp_name']; // Almacenar el nombre temporal del archivo subido
    $autor = $_SESSION['editor'];

    // Obtener el último número consecutivo desde la base de datos
    $result = $conexion->query("SELECT MAX(id) as max_id FROM publicaciones");
    $row = $result->fetch();
    $nuevo_nombre = $row['max_id'] + 1; // Incrementar el número para el nuevo nombre de la imagen

    // Obtener la extensión del archivo
    $extension = pathinfo($_FILES['thumb']['name'], PATHINFO_EXTENSION);

    // Crear el nuevo nombre del archivo con el número consecutivo y la extensión
    $nuevo_nombre_archivo = $nuevo_nombre . '.' . $extension;

    // Establecer la ruta para el archivo subido con el nuevo nombre
    $archivo_subido = '../' . $blog_config['carpeta_imagenes'] . $nuevo_nombre_archivo;

    // Mover el archivo subido a la ruta especificada
    move_uploaded_file($thumb, $archivo_subido);

    // Preparar la declaración SQL para insertar datos en la tabla 'publicaciones'
    $statement = $conexion->prepare(
        'INSERT INTO publicaciones (id, titulo, extracto, texto, thumb, tema, status, creador, id_usuario)
        VALUES (null, :titulo, :extracto, :texto, :thumb, :tema, "pendiente", :creador, :id_usuario)'
    );

    // Ejecutar la declaración SQL con los valores proporcionados
    $statement->execute(array(
        ':titulo' => $titulo,
        ':extracto' => $extracto,
        ':texto' => $texto,
        ':thumb' => $nuevo_nombre_archivo,
        ':tema' => $tema,
        ':creador' => $autor,
        ':id_usuario' => $_SESSION['id']
    ));

    // Redirigir a la página de admin
    header('Location: ' . RUTA . '/editor');
}

require '../views/nuevo.view.php'; // Incluir el archivo 'nuevo.view.php'
?>
