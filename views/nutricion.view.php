<?php 

session_start();

require 'views/header.php'; ?>

    <div class="contenedor">
    <h2 class="text-center">Nutrición</h2>
    
    <?php   foreach($salud as $post): ?>
        <div class="post">
            <article>
                <h2 class="titulo"><a href="single.php?id=<?php echo $post['id']; ?>" class="text-decoration-none"><?php echo $post['titulo']; ?></a></h2>
                <p class="fecha"><?php echo fecha($post['fecha']); ?></p>
                <p class="tema"><?php echo $post['tema'];?></p>
                <div class="thumb">
                    <a href="single.php?id=<?php echo $post['id']; ?>">
                        <img src="<?php echo RUTA; ?>/imagenes/<?php echo $post['thumb']; ?>" alt="">
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