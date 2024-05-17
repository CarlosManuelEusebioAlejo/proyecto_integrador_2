<?php 
session_start(); // Iniciar la sesión

require '../admin/config.php'; // Incluir el archivo de configuración
require '../functions.php'; // Incluir el archivo de funciones

comprobarSessioneditor(); // Verificar si la sesión del editor es válida

$conexion = conexion($bd_config); // Conectar a la base de datos
if (!$conexion) {
    header('Location: ../error.php'); // Redirigir a la página de error si la conexión falla
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){ // Verificar si el método de solicitud es POST
    $titulo = limpiarDatos($_POST['titulo']); // Limpiar y almacenar el valor de 'titulo'
    $tema = $_POST['tema']; // Almacenar el valor de 'tema'
    $extracto = limpiarDatos($_POST['extracto']); // Limpiar y almacenar el valor de 'extracto'
    $texto = $_POST['texto']; // Almacenar el valor de 'texto'
    $autor = $_SESSION['editor'];

    if (empty($texto)) {
        echo "El campo de texto no puede estar vacío. Por favor, ingrese contenido.";
    }
    
    // Verificar si se está subiendo un archivo de imagen
    if(isset($_FILES['thumb']) && $_FILES['thumb']['error'] === UPLOAD_ERR_OK) {
        $tipo_imagen = exif_imagetype($_FILES['thumb']['tmp_name']); // Obtener el tipo de imagen

        // Comprobar si el archivo subido es una imagen
        if($tipo_imagen === IMAGETYPE_JPEG || $tipo_imagen === IMAGETYPE_PNG || $tipo_imagen === IMAGETYPE_GIF) {
            $thumb = $_FILES['thumb']['tmp_name']; // Almacenar el nombre temporal del archivo subido

            $archivo_subido = '../' . $blog_config['carpeta_imagenes'] . $_FILES['thumb']['name']; // Establecer la ruta para el archivo subido

            move_uploaded_file($thumb, $archivo_subido); // Mover el archivo subido a la ruta especificada

            $statement = $conexion->prepare(
                'INSERT INTO publicaciones (id, titulo, extracto, texto, thumb, tema, creador, status, id_usuario)
                VALUES (null, :titulo, :extracto, :texto, :thumb, :tema, :autor, "pendiente", :id_usuario)'
            ); // Preparar la instrucción SQL para insertar datos en la tabla 'publicaciones'

            $statement->execute(array(
                ':titulo' => $titulo,
                ':extracto' => $extracto,
                ':texto' => $texto,
                ':thumb' => $_FILES['thumb']['name'],
                ':tema' => $tema,
                ':autor' => $autor,
                ':id_usuario' => $_SESSION['id']
            )); // Ejecutar la instrucción SQL con los valores proporcionados

            header('Location: ' . RUTA . '/editor'); // Redirigir a la página del editor
        } else {
            echo '<script>
                alert("Formato de imagen no válido. Solo se permiten archivos JPEG y PNG.");
                window.location = "../editor/nuevo.php";
              </script>';
        }
    } else {
        echo '<script>
                alert("Ocurrió un error al subir el archivo.");
                window.location = "../editor/nuevo.php";
              </script>';
    }
}

require '../views/nuevo.view.php'; // Incluir el
