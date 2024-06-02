<?php require 'views/header.php'; ?>

<a href="../admin" class="btn btn-primary btn-lg mb-4">Volver</a>
<div class="contenedor">


        <a href="aceptar_editores.php" class="btn btn-danger btn-lg mb-4">Nuevo Editor</a>

        <div class="container post">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Nombre</th>
        <th scope="col">Correo</th>
        <th scope="col">Rol</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
    <?php   foreach($posts as $post): ?>
        <tr>
          <td><?php echo $post['id']; ?></td>
          <td class=""><?php echo $post['usuario']; ?></td>
          <td><?php echo $post['email']; ?></td>
          <td><?php echo $post['tipo']; ?></td>


          <td>
            <a href="" class="btn btn-small btn-primary"> <i class="bi bi-pencil-square "></i></a>
          </td>
          <td>
          <a href="" class="btn btn-small btn-light"><i class="bi bi-trash3"></i></a>

          </td>
          <td>
            <a href="../perfil.php?id=<?php echo $post['id']; ?>" class="btn btn-small btn-light"><i class="bi bi-eye"></i></a>
        </tr>
        <?php   endforeach; ?>
    </tbody>
  </table>
</div>


<?php require '../views/footer.php'; ?>