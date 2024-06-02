<?php require '../views/header.php'; ?>

<div class="contenedor">
    <div class="post">
        <article>
            <h2 class="titulo">Editar articulo</h2>
            <form class="formulario" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="hidden" name="id" value="<?php echo $posts['id']; ?>">
                <input type="text" name="titulo" value="<?php echo $posts['titulo']; ?>">
                <select name="tema" id="" class="boton">
                    <option value="Nutrición" <?php if ($posts['tema'] == "Nutrición") echo "selected"; ?>>Nutrición</option>
                    <option value="Deporte" <?php if ($posts['tema'] == "Deporte") echo "selected"; ?>>Deporte</option>
                </select>

                <input type="text" name="extracto" value="<?php echo $posts['extracto']; ?>">
                <textarea name="texto"><?php echo $posts['texto']; ?></textarea>
                <input type="file" name="thumb">
                <input type="hidden" name="thumb-guardada" value="<?php echo $posts['thumb']; ?>">

                <input type="submit" value="Modificar Articulo">
            </form>
        </article>
    </div>
</div>






<?php require '../views/footer.php'; ?>