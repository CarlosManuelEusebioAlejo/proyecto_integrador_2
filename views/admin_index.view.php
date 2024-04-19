<?php require '../views/header.php'; ?>

<a href="../" class="btn btn-primary btn-lg mb-4">Volver</a>
<div class="contenedor">
    <h2>Panel de control</h2>
    <h3>Hola <?php echo $_SESSION['admin']; ?></h3>
    <a href="nuevo.php" class="btn btn-danger btn-lg mb-4 text-decoration-none">Nuevo Post</a>
    <a href="<?php echo RUTA . 'admin/solicitudes.php';?>" class="btn btn-primary btn-lg mb-4 text-decoration-none">Solicitudes</a>
    <a href="editores.php" class="btn btn-primary btn-lg mb-4 text-decoration-none">Editores</a>

    <div class="container card">
        <div class="table-responsive"> <!-- Agregamos este div para hacer la tabla responsive -->
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Titulo</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Rama</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                        <th scope="col">Ver</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($posts as $post): ?>
                        <tr>
                            <td class="text-wrap"><?php echo $post['titulo']; ?></td>
                            <td class="text-truncate"><?php echo $post['creador']; ?></td>
                            <td class="text-truncate"><?php echo $post['tema']; ?></td>
                            <td>
                                <a href="editar.php?id=<?php echo $post['id']; ?>" class="btn btn-small btn-primary"> <i class="bi bi-pencil-square"></i></a>
                            </td>
                            <td>
                                <a href="<?php echo RUTA . 'admin/borrar.php?id=' . $post['id']; ?>" class="btn btn-small btn-light"><i class="bi bi-trash3"></i></a>
                            </td>
                            <td>
                                <a href="../single.php?id=<?php echo $post['id']; ?>" class="btn btn-small btn-light"><i class="bi bi-eye"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
<?php require '../paginacion.php'; ?>

<?php require '../views/footer.php'; ?>
