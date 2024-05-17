<?php require '../views/header.php'; ?>

<a href="../admin" class="btn btn-primary btn-lg mb-4">Volver</a>
<div class="contenedor">
    <h2>Solicitudes de publicaciones</h2>
    <h3>Hola <?php echo $_SESSION['admin']; ?></h3>
    <a href="nuevo.php" class="btn btn-danger btn-lg mb-4 text-decoration-none">Nuevo Post</a>
    <!-- <a href="cerrar.php" class="btn btn-primary btn-lg mb-4 text-decoration-none">Cerrar Sesion</a> -->
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
                        <th scope="col">Rechazar</th>
                        <th scope="col">Ver</th>
                        <th scope="col">aprobar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($posts as $post): ?>
                        <tr>
                            <td class="text-wrap"><?php echo $post['titulo']; ?></td>
                            <td class="text-truncate"><?php echo $post['creador']; ?></td>
                            <td class="text-truncate"><?php echo $post['tema']; ?></td>
                            <td>
                                <a href="<?php echo RUTA . 'admin/borrar.php?id=' . $post['id']; ?>" class="btn btn-small btn-light"><i class="bi bi-trash3"></i></a>
                            </td>
                            <td>
                                <a href="../single.php?id=<?php echo $post['id']; ?>" class="btn btn-small btn-light"><i class="bi bi-eye"></i></a>
                            </td>
                            <td>
                                <a href="<?php echo RUTA . 'admin/aprobar.php?id=' . $post['id']; ?>" class="btn btn-small btn-success"><i class="bi bi-check"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>

<?php require '../views/footer.php'; ?>
