<?php

    include_once('conexion.php');
    $sql = "select * from publicaciones";

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VitalLife</title>
    <link rel="stylesheet" href="csspublicaciones/style.css">
    <link rel="stylesheet" href="csspublicaciones/fontello.css">
</head>
<body>
    <header class="header">
        <div class="container">
        <div class="btn-menu">
            <!-- <label for="btn-menu" class="icon-menu"></label> -->
        </div>
            <div class="logo">
                <h1>VitalFitLife</h1>
            </div>
            <nav class="menu">
                <!-- <input type="text" class="search-box" placeholder="Buscar..."> -->
                <!-- <a href="#" class="icon-bell"></a> -->
                <a href="#">Inicio</a>
                <a href="#" class="icon-user"></a>
            </nav>

        </div>
    </header>
    <div class="menu-principal">
        <!--Navegar con el scroll------------->
        <script src="resorces/scroll.js"></script>
        <!--Termina el navegar con el scroll-->
        <!-------------------------------------------------------------------------------------------->


        <!-- PANTALLA PARA AGREGAR PUBLICACION -->
        <!-- -------------------------------------------------------------->
        
        <!-- FIN PANTALLA PARA AGREGAR PUBLICACION -->
        <!-- -------------------------------------------------------------->


        <!---Fin de Datos del bloggero----------------------------------------------------------------->
        <!-------------------------------------------------------------------------------->

        <!--Publicaciones----------------------------------------------------------------->
        <!-------------------------------------------------------------------------------->
        <form class="sub-menu2">
        <?php
            $resulset = mysqli_query($conexion, $sql) or die("database error:" . mysqli_error($conexion));

            // Almacena los registros en un array
            $registros = [];
            while ($record = mysqli_fetch_assoc($resulset)) {
                $registros[] = $record;
            }

            // Itera sobre los registros en orden inverso
            for ($i = count($registros) - 1; $i >= 0; $i--) {
                $record = $registros[$i];
            ?>
                <div class="publicacion">
                    <div class="encabezados">
                        <section class="fecha">Fecha publicación: <?php echo $record['FechaRegistro'] ?></section>
                        <section class="nombre">bloguero : <?php echo $record['Autor'] ?></section>
                        <section class="tituloPublicacion"><?php echo $record['Titulo'] ?></section>
                        <section class="tituloSubtitulo"><?php echo $record['Rama'] ?></section>
                    </div>
                    <div class="imagenPublicacion"><img src="img/<?= $record['Imagen'] ?>"></div>


                    <div class="textoP">
                        <div class="textoPublicacion">
                            <p><?php echo $record['Descripcion'] ?></p>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
                </section><!--menu-publicaciones-->
        </form><!--sub-menu2-->
        <!--Publicaciones----------------------------------------------------------------->
        <!-------------------------------------------------------------------------------->
    </div><!--menu-principal-->

<input type="checkbox" name="" id="btn-menu">
<div class="container-menu">
    <div class="cont-menu">
        <nav class="actions">
            <a href="index.html">Inicio</a>
            <a href="#">Acerca de</a>
            <a href="#">Servicios</a>
            <a href="#">Contacto</a>
        </nav>
        <label for="btn-menu" class="icon-cancel"></label>
        <div>
            <nav class="social">
                <a href="#" class="icon-thumbs-up-alt"></a>
                <a href="#" class="icon-share"></a>
            </nav>
        </div>
    </div>
</body>
</html>