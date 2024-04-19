<?php require '../views/header.php'; ?>


<a href="../" class="btn btn-primary btn-lg mb-4">Volver</a>
<div class="contenedor">
  <h2>Panel de control</h2>
  <h3>Hola <?php print_r($_SESSION['editor']); ?></h3>
  <a href="nuevo.php" class="boton text-decoration-none">Nuevo Post</a>
  <a href="<?php echo RUTA . 'editor/notificaciones.php'; ?>" class="btn btn-lg btn-primary">Notificaciones</a>


<div class="container post">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Titulo</th>

        <th scope="col">Rama</th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>

    <?php   foreach($posts as $post): ?>
        <tr>
          <td class=""><?php echo $post['titulo']; ?></td>
          <td><?php echo$post['tema']; ?></td>
          <td>
            <a href="editar.php?id=<?php echo $post['id']; ?>" class="btn btn-small btn-primary"> <i class="bi bi-pencil-square "></i></a>
          </td>
          <td>
          <button class="btn btn-small btn-light eliminar"><i class="bi bi-trash3"></i></button>

          </td>
          <td>
            <a href="../single.php?id=<?php echo $post['id']; ?>" class="btn btn-small btn-light"><i class="bi bi-eye"></i></a>
        </tr>
        <?php   endforeach; ?>
    </tbody>
  </table>
</div>

        <?php require '../paginacion.php'; ?>



    <div class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- <div id="liveAlertPlaceholder"></div>
<button type="button" class="btn btn-primary" id="liveAlertBtn">Show live alert</button> -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
  // Busca todos los elementos <a> con la clase "eliminar"
  var elementosEliminar = document.querySelectorAll("button.eliminar");

  // Agrega un controlador de eventos clic a cada elemento
  elementosEliminar.forEach(function(elemento) {
    elemento.addEventListener("click", function(event) {
      event.preventDefault(); // Evita el comportamiento predeterminado del enlace

      // Guarda la URL de redirección en una variable
      var urlRedireccion = "<?php echo RUTA . 'editor/borrar.php?id=' . $post['id']; ?>";

      // Muestra el diálogo de confirmación
      Swal.fire({
        title: "¿Estás seguro?",
        text: "¡No podrás revertir esto!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, eliminarlo"
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title: "¡Eliminado!",
            text: "Tu publicación ha sido eliminada.",
            icon: "success"
          }).then(() => {
            // Redirecciona a la URL especificada después de confirmar
            window.location.href = urlRedireccion;
          });
        }
      });
    });
  });
});

</script>
<!-- <script>
  const alertPlaceholder = document.getElementById('liveAlertPlaceholder')

const appendAlert = (message, type) => {
  const wrapper = document.createElement('div')
  wrapper.innerHTML = [
    `<div class="alert alert-${type} alert-dismissible" role="alert">`,
    `   <div>${message}</div>`,
    '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
    '</div>'
  ].join('')

  alertPlaceholder.append(wrapper)

  // Temporizador para eliminar el mensaje después de 5 segundos
  setTimeout(() => {
    wrapper.remove();
  }, 5000);
}

const alertTrigger = document.getElementById('liveAlertBtn')
if (alertTrigger) {
  alertTrigger.addEventListener('click', () => {
    appendAlert('¡Bien hecho, has activado este mensaje de alerta!', 'success')
  })
}

</script> -->

<?php require '../views/footer.php'; ?>
