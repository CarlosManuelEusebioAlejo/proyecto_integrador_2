<?php
$bd_cnfig = array(
    'basedatos' => 'blog_web',
    'usuario' => 'root',
    'pass' => ''
);



function coexion($bd_config){
    try {
        // Creating a new PDO object to connect to the database
        $conexion = new PDO('mysql:host=localhost;dbname='.$bd_config['basedatos'], $bd_config['usuario'], $bd_config['pass']);
        return $conexion;
    }catch (PDOExeption $e) {
        return false;
    }
}

function obtener_usuaro_por_id($conexion, $id_usuario){
    // Check if the provided input is numeric (indicating ID) or string (indicating username)
    if (is_numeric($id_usuario)) {
        // If the input is numeric, assume it's an ID and search by ID
        $statement = $conexion->prepare("SELECT * FROM usuarios WHERE id = :id LIMIT 1");
        $statement->execute(array(':id' => $id_usuario));
    } else {
        // If the input is not numeric, assume it's a username and search by username
        $statement = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1");
        $statement->execute(array(':usuario' => $id_usuario));
    }
    return $statement->fetch();
}



$coexion = coexion($bd_cnfig);
// Get the post data from the database based on the article ID
if(isset($_SESSION['id'])){
    $photo = obtener_usuaro_por_id($coexion, $_SESSION['id']);
}
// $post = obtener_usuario_por_id($conexion, $_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo RUTA;?>/css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="<?php echo RUTA . 'css/boostrap.css'; ?>"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?php echo RUTA;?>/css/IndexAdmin/PanelControl.css">
    <!-- FONTS -->
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo RUTA;?>/css/IndexAdmin/info_usuario.css">
    <link href="css/styleTime.css" rel="stylesheet"/>
</head>
<body>
<style>
  .dropdown-menu {
    background-color: #040432; /* Color de fondo */
    color: #ffffff; /* Color del texto */
    border: 1px solid #454d55; /* Color del borde */
  }

  .dropdown-item {
    color: #ffffff; /* Color del texto de los items */
  }

  .dropdown-item:hover {
    background-color: #495057; /* Color de fondo al pasar el mouse */
    color: #ffffff; /* Color del texto al pasar el mouse */
  }

  .dropdown-divider {
    border-color: #6c757d; /* Color del divisor */
  }
</style>

<header class="p-3" data-bs-theme="dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="#" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                <img src="<?php echo RUTA; ?>/imagenes/FITLIFE.png" alt="FITLIFE" width="115" height="45">
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li class="nav-item">
                    <a class="nav-link px-2 link-body-emphasis text-decoration-none ml-5" href="<?php echo RUTA; ?>"><i class="bi bi-house-door-fill"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo RUTA . 'deporte.php'; ?>" class="nav-link px-2 link-body-emphasis text-decoration-none"><i class="bi bi-person-walking"></i> Deporte</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2 link-body-emphasis text-decoration-none" href="<?php echo RUTA . 'nutricion.php'; ?>"><i class="bi bi-apple"></i> Nutrición</a>
                </li>

            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" name="busqueda" action="<?php echo RUTA; ?>/buscar.php" method="get">
                <input type="search" class="form-control" placeholder="Buscar..." aria-label="Search" name="busqueda">
            </form>

            <?php if(isset($_SESSION['admin']) || isset($_SESSION['editor'])): ?>
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://prospectdirect.com/wp-content/uploads/2017/05/generic-profile-photo-2.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small">
                        <li><a class="dropdown-item" href="<?php echo isset($_SESSION['admin']) ? RUTA . 'admin/nuevo.php' : RUTA . 'editor/nuevo.php'; ?>"><i class="bi bi-plus-circle"></i> Nueva publicación</a></li>
                        <li><a class="dropdown-item" href="<?php echo RUTA . 'login.php'; ?>"><i class="bi bi-toggles"></i> Panel</a></li>
                        <li><a class="dropdown-item" href="<?php echo RUTA ?>perfil.php?usuario=<?php echo $photo['id']; ?>"><i class="bi bi-person-fill"></i> Perfil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="<?php echo RUTA . 'admin/cerrar.php'; ?>"><i class="bi bi-box-arrow-left"></i> Cerrar Sesion</a></li>
                    </ul>
                </div>
            <?php else: ?>
                <div class="text-center text-md-end">
                    <button class="btn btn-lg"><a href="<?php echo RUTA . 'login.php'; ?>" class="text-decoration-none link-body-emphasis text-light"><i class="bi bi-person-circle"></i> Cuenta</a></button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</header>