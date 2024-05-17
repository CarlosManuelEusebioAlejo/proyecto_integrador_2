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

<header class="p-3 mb-3 border-bottom" data-bs-theme="dark">
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
                        <img src="<?php echo RUTA; ?>/fotos_usuarios/default.jpg" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small">
                        <li><a class="dropdown-item" href="<?php echo isset($_SESSION['admin']) ? RUTA . 'admin/nuevo.php' : RUTA . 'editor/nuevo.php'; ?>">New post</a></li>
                        <li><a class="dropdown-item" href="<?php echo RUTA . 'login.php'; ?>">Panel</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="<?php echo RUTA . 'admin/cerrar.php'; ?>">Cerrar Sesion</a></li>
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