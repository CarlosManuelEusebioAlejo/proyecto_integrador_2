<?php 
session_start();

require 'views/header.php'; ?>


    <div class="contenedor">

    <?php   foreach($posts as $post): ?>
        <div class="post">
            <article>
                <h2 class="titulo"><a class="text-decoration-none" href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['titulo']; ?></a></h2>
                <p class="tema">Tema: <?php echo $post['tema'];?></p>
                <p class="autor">Autor: <a class="text-decoration-none text-dark" href="<?php echo RUTA ?>perfil.php?usuario=<?php echo $post['id_usuario']; ?>"><?php echo $post['creador']; ?></a></p>
                <p class="fecha"><?php echo fecha($post['fecha']); ?></p>
                <div class="thumb">
                    <a href="single.php?id=<?php echo $post['id']; ?>">
                        <img src="<?php echo RUTA; ?>/imagenes/<?php echo $post['thumb']; ?>" alt="" loading="lazy">
                    </a>
                </div>
                <p class="extracto"><?php echo $post['extracto']; ?></p>
                <a href="single.php?id=<?php echo $post['id']; ?>" class="continuar text-decoration-none">Leer más</a>
            </article>
        </div>
    <?php   endforeach; ?>

        <?php require 'paginacion.php'; ?>
    </div>

<?php require 'footer.php'; ?>
