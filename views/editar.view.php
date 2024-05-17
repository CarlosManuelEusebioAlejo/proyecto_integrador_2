<?php require '../views/header.php'; ?>

<div class="contenedor">
    <div class="post">
        <article>
            <h2 class="titulo">Editar articulo</h2>
            <form class="formulario" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
                <input type="text" name="titulo" value="<?php echo $post['titulo']; ?>">
                <select name="tema" id="" class="boton">
                    <option value="Nutrición" <?php if ($post['tema'] == "Salud") echo "selected"; ?>>Nutrición</option>
                    <option value="Salud" <?php if ($post['tema'] == "Bienestar") echo "selected"; ?>>Salud</option>
                </select>

                <input type="text" name="extracto" value="<?php echo $post['extracto']; ?>">
                <textarea name="texto"><?php echo $post['texto']; ?></textarea>
                <input type="file" name="thumb">
                <input type="hidden" name="thumb-guardada" value="<?php echo $post['thumb']; ?>">

                <input type="submit" value="Modificar Articulo">
            </form>
        </article>
    </div>
</div>






<?php require '../views/footer.php'; ?>