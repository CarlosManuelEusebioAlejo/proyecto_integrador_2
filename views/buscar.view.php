<?php require 'views/header.php'; ?>


    <div class="contenedor">
        <div class="container">
            <h2 class="display-6 text-center"><?php echo $titulo; ?></h2>
            <br>
        </div>
    <?php   foreach($resultados as $post): ?>
        <div class="post">
            <article>
                <h2 class="titulo"><a href="single.php?id=<?php echo $post['id']; ?>" class="text-decoration-none"><?php echo $post['titulo']; ?></a></h2>
                <p class="autor">Autor: <a class="text-decoration-none text-dark" href="<?php echo RUTA ?>perfil.php?usuario=<?php echo $post['creador']; ?>"><?php echo $post['creador']; ?></a></p>
                <p class="fecha"><?php echo fecha($post['fecha']); ?></p>
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
