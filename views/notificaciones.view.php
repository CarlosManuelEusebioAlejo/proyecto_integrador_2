<?php


require 'header.php';
?>


<a href="../admin" class="btn btn-primary btn-lg mb-4">Volver</a>
<div class="contenedor">


        <a href="aceptar_editores.php" class="btn btn-danger btn-lg mb-4">Nuevo Editor</a>

        <div class="container post">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Nombre de la publicacion</th>
        <th scope="col">Mensaje</th>
        <th scope="col">status</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
    <?php   foreach($notificaciones as $noti): ?>
        <tr>
          <td><?php echo $noti['titulo']; ?></td>
          <td class=""><?php echo $noti['notificacion']; ?></td>
          <td><?php echo $noti['status']; ?></td>


          <td>
            <a href="<?php echo RUTA ;?>editor/editar.php?id=<?php echo $noti['id']; ?>" class="btn btn-small btn-primary"> <i class="bi bi-pencil-square "></i></a>
          </td>
          <td>
          <a href="" class="btn btn-small btn-light"><i class="bi bi-trash3"></i></a>

          </td>
        </tr>
        <?php   endforeach; ?>
    </tbody>
  </table>
</div>


<?php require '../views/footer.php'; ?>