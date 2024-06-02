<?php require 'views/header.php'; 

?>

    <div class="contenedor">
        <div class="post">
            <article>
                <h2 class="titulo"><?php echo $publicacion['titulo']; ?></h2>
                <p class="autor">Autor: <a class="text-decoration-none text-dark" href="<?php echo RUTA ?>perfil.php?usuario=<?php echo $publicacion['creador']; ?>"><?php echo $publicacion['creador']; ?></a></p>
                <p class="tema">Tema: <?php echo $publicacion['tema'];?></p>
                <p class="fecha"><?php echo fecha($publicacion['fecha']); ?></p>
                <div class="thumb">
                        <img src="<?php echo RUTA; ?>/imagenes/<?php echo $publicacion['thumb']; ?>" alt="<?php echo $publicacion['titulo']; ?>">
                </div>
                <p class="extracto"><?php echo nl2br($publicacion['texto']); ?></p>
            </article>
        </div>

    </div>

<?php require 'footer.php'; ?>
