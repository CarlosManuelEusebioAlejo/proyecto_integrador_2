<?php
include "conexion.php";

$Titulo = $_POST["Titulo"];
$Rama = $_POST["Rama"];
$Autor = $_POST["Autor"];
$Descripcion = $_POST["Descripcion"];


$verificar_descripcion = mysqli_query($conexion, "SELECT * FROM publicaciones WHERE Descripcion='$Descripcion' ");

if(mysqli_num_rows($verificar_descripcion) > 0) {
    echo '
        <script>
            alert("Esta informacion ya Existe, intente nuevamente");
            window.location = "nuevaPubli.php";
        </script>
    ';
    exit();
}

// Verificar si el título ya existe en la base de datos
$verificar_titulo = mysqli_query($conexion, "SELECT * FROM publicaciones WHERE Titulo='$Titulo' ");

if(mysqli_num_rows($verificar_titulo) > 0) {
    echo '
        <script>
            alert("Este Titulo ya Existe, intente nuevamente");
            window.location = "nuevaPubli.php";
        </script>
    ';
    exit();
}



$Archivo = $_FILES["Imagen"];
$extension = strtolower(pathinfo($Archivo['name'], PATHINFO_EXTENSION));

// Verificar si la extensión es JPEG o PNG
if ($extension === 'jpeg' || $extension === 'jpg' || $extension === 'png') {
    $Imagen = preg_replace("/[^a-zA-Z0-9.]/", "", $Titulo) . "." . $extension;

    if (move_uploaded_file($Archivo["tmp_name"], "img/" . $Imagen)) {
        $query = $conexion->prepare("INSERT INTO publicaciones(Autor, Titulo, Rama, Imagen, Descripcion) VALUES (?, ?, ?, ?, ?)");
        $query->bind_param("sssss", $Autor, $Titulo, $Rama, $Imagen, $Descripcion);

        if ($query->execute()) {
            echo '
            <script>
                alert("Publicación registrada exitosamente");
                window.location = "interfaceAdmin.php";
            </script>
            ';
            exit();
        } else {
            echo '
            <script>
                alert("Ocurrió un fallo al crear la publicación");
                window.location = "nuevaPubli.php";
            </script>
            ';
            exit();
        }
    } else {
        echo '
            <script>
                alert("Error al mover el archivo subido");
                window.location = "nuevaPubli.php";
            </script>
            ';
        exit();
    }
} else {
    echo '
        <script>
            alert("Formato de imagen no válido. Solo se permiten archivos JPEG y PNG.");
            window.location = "nuevaPubli.php";
        </script>
        ';
    exit();
}
?>

