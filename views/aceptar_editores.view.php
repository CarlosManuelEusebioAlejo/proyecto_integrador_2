<?php 
require '../admin/config.php';
require '../views/header.php'; 
?>

<a href="../admin/editores.php" class="btn btn-primary btn-lg mb-4">Volver</a>
<div class="contenedor">
    <h2>Postulantes</h2>
    <!-- boton para volver a la pagina anterior -->


        <a href="añadir.php" class="btn btn-danger btn-lg mb-4">Nuevo socio</a>

        <div class="container post">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Usuario</th>
        <th scope="col">Correo</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
    <?php   foreach($posts as $post): ?>
        <tr>
          <td class=""><?php echo $post['nombre'] .' ' .  $post['apellido']; ?></td>
          <td><?php echo $post['correo']; ?></td>


          <td>
            <a href="perfil_postulante.php?id=<?php echo $post['id']; ?>" class="btn btn-small btn-primary"> <i class="bi bi-eye"></i></a>
          </td>
          <td>
          <a href="" class="btn btn-small btn-light"><i class="bi bi-trash3"></i></a>

          </td>
          <td>
          <a href="aceptado.php?id=<?php echo $post['id']; ?>" class="btn btn-small btn-success"><i class="bi bi-check2"></i></a>
        </tr>
        <?php   endforeach; ?>
    </tbody>
  </table>
</div>


<?php require '../views/footer.php'; ?>