<?php require '../views/header.php'; ?>

<a href="../admin" class="btn btn-primary btn-lg mb-4">Volver</a>
<div class="contenedor">
    <div class="post">
        <article>
            <h2 class="titulo">Nuevo articulo</h2>
            <br>
            <form class="formulario" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <label for="">Titulo</label>
                <input type="text" name="titulo" placeholder="Titulo de la publicación" require>
                <label for="">Tema de la publicación</label>
                <br>
                    <select class="form-select" name="tema">
                        <option value="" disabled selected>--</option>
                        <option value="Nutrición">Nutrición</option>
                        <option value="Salud">Salud</option>
                    </select>
                    <br>
                <label for="">Ingrese el extracto <i class="bi bi-question-circle-fill" title="Añade una pequeña descripción del tema" alt="hola"></i></label>
                <input type="text" name="extracto" placeholder="Extracto del articulo">
                <label for="">Descripción</label>
                <textarea name="texto" placeholder="texto del articulo"></textarea require>
                <input type="file" name="thumb" accept="image/jpeg, image/png, image/gif">


                <input type="submit" value="Crear Articulo">
            </form>
        </article>
    </div>
</div>



<?php require '../views/footer.php'; ?>