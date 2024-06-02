<?php 

session_start();

require '../admin/config.php';

require '../views/header.php';  
// include './partials/modal_publicacion.php';
// include './partials/modal_opciones_publi.php';
require '../functions.php';

comprobarSessionadmin();

$conexion = conexion($bd_config);

$posts = obtener_post_filtro( $conexion);
?>

    <section class="container mt-5 w-75">

        <h4 class="migajas-pan">Panel de Control > Administrar Publicaciones</h4>
        <h2 class="panel">Administrar Publicaciones</h2>

        <form class="container m-5 p-3 border">
            <div class="container text-center">
                <div class="container border-1">
                    <div>
                        <div class="container mb-3 text-center">
                            <h4 class="fs-5 Texto">Selecciona una opcion para listar</h4>
                        </div>
                        <!-- Filtros -->
                        <div class="btn-group btn-group-toggle border p-2 align-items-center" data-toggle="buttons">

                                <div class="d-flex flex-row gap-3">

                                    <div class="text-center">
                                        <div class="Fila-Filtros-ActInac">
                                            <label class="Labels">
                                                <input type="checkbox" class="Inputs"
                                                        name="Publicaciones-Activas" id="Publicaciones-Activas">
                                                    Activas
                                            </label>
                                        </div>

                                        <div class="Fila-Filtros-ActInac">
                                            <label class="Labels">
                                                <input type="checkbox" class="Inputs"
                                                        name="Publicaciones-Inactivas" id="Publicaciones-Inactivas">
                                                    Inactivas
                                            </label>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="Fila-Filtros-ActInac">
                                            <label class="Labels">
                                                <input type="checkbox" class="Inputs"
                                                        name="Solicitudes-Publicaciones" id="Solicitudes-Publicaciones">
                                                    Solicitudes
                                            </label>
                                        </div>
    
                                        <div class="Fila-Filtros-ActInac">
                                            <label class="Labels">
                                                <input type="checkbox" class="Inputs"
                                                        name="Publicaciones-Rechazadas" id="Publicaciones-Rechazadas">
                                                    Rechazadas
                                            </label>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TABLA -->
            <div class="container mt-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Nombre Usuario</th>
                        <th class="d-flex justify-content-center" scope="col"> <i class="bi bi-gear"></i> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Asi quedara los filotros -->
                            <!-- Para los activos -->
                            <?php foreach ($posts as $post): ?>
                                <?php if ($post['status'] == 'activo'): ?>
                                    <tr class="activas table-success border-success">
                                        <th scope="row"><?php echo $post['id']; ?></th>
                                        <td><?php echo $post['titulo']; ?></td>
                                        <td><?php echo $post['creador']; ?></td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-3">
                                                <a class="btn btn-outline-primary" href="../single.php?id=<?php echo $post['id']; ?>">
                                                    <abbr title="Ver publicacion">
                                                        <i class="bi bi-eye"></i>
                                                    </abbr>
                                                </a>
                                                <a href="#" class="btn btn-outline-warning" id="desactivar" data-id="<?php echo $post['id']; ?>">
                                                    <abbr title="Desactivar publicacion">
                                                        Desactivar
                                                    </abbr>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                
                            <?php endforeach; ?>

                            <!-- Para los inactivos -->
                            <?php foreach ($posts as $post): ?>
                                <?php if ($post['status'] == 'inactivo'): ?>
                                        <tr class="inactivas table-secondary border-secondary">
                                        <th scope="row"><?php echo $post['id'];?></th>
                                        <td><?php echo $post['titulo'] ;?></td>
                                        <td><?php echo $post['creador'];?></td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-3">
                                                <a type="button" class="btn btn-outline-primary" href="../single.php?id=<?php echo $post['id']; ?>">
                                                        <abbr title="Ver publicacion">
                                                            <i class="bi bi-eye"></i>
                                                        </abbr>
                                                </a>
                                                <a href="#" class="btn btn-outline-success"
                                                data-bs-toggle="modal" data-bs-target="#activar-publi" id="aprobar" data-id="<?php echo $post['id']; ?>">
                                                    <abbr title="Activar publicacion">Activar</abbr>
                                                </a>
                                                <!-- <a href="#" class="btn btn-outline-secondary"><i class="bi bi-trash"></i></a> -->
                                            </div>
                                        </td>
                                        </tr>
                                        <tr>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <!-- Solicitudes Pendientes -->
                            <?php foreach ($posts as $post): ?>
                                <?php if ($post['status'] == 'pendiente'): ?>
                                    <tr class="pendientes table-warning border-warning">
                                        <th scope="row"><?php echo $post['id'];?></th>
                                        <td><?php echo $post['titulo'];?></td>
                                        <td><?php echo $post['creador'];?></td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-3">
                                                <a type="button" class="btn btn-outline-primary" href="../single.php?id=<?php echo $post['id']; ?>">
                                                    <abbr title="Ver publicacion">
                                                        <i class="bi bi-eye"></i>
                                                    </abbr>
                                                </a>
                                                <a href="#" class="btn btn-outline-success" id="aprobar" data-id="<?php echo $post['id']; ?>">
                                                    <abbr title="Aceptar solicitud">
                                                        <i class="bi bi-check-circle"></i>
                                                    </abbr>
                                                </a>
                                                <a href="#" class="btn btn-outline-danger" id="rechazar" data-id="<?php echo $post['id'];?>">
                                                    <abbr title="Rechazar solicitud">
                                                        <i class="bi bi-x-circle"></i>
                                                    </abbr>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>

                                <!-- Solicitudes Rechazadas -->
                                <?php foreach ($posts as $post): ?>
                                <?php if ($post['status'] == 'rechazado'): ?>
                                    <tr class="rechazadas table-danger border-danger">
                                    <th scope="row"><?php echo $post['id'];?></th>
                                    <td><?php echo $post['titulo'];?></td>
                                    <td><?php echo $post['creador'];?></td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-3">
                                            <a type="button" class="btn btn-outline-primary" href="../single.php?id=<?php echo $post['id']; ?>">
                                                    <abbr title="Ver publicacion">
                                                        <i class="bi bi-eye"></i>
                                                    </abbr>
                                            </a>
                                            <a href="#" class="btn btn-outline-success" id="aprobar" data-id="<?php echo $post['id']; ?>">
                                                <abbr title="Aceptar y activar esta publicaion"><i class="bi bi-check-circle"></i></abbr>
                                            </a>
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                                <!-- Solicitudes Pendientes -->
                        </tbody>
                    </table>
                </div>
                <!-- TABLA -->
            <!-- BOTON VOLVER -->
            <div>
                <!-- nomas darle la accion a donde volver -->
                <a href="../" class="btn btn-primary">
                    Volver
                </a>
            </div>
        </form>
        <!-- <a href="admin_index.view.php" class="btn btn-primary btn-lg mb-4">Volver</a> -->
</section>


<!-- marca todas las casillas -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Obtener los checkboxes
        var activasCheckbox = document.getElementById('Publicaciones-Activas');
        var inactivasCheckbox = document.getElementById('Publicaciones-Inactivas');
        var solicitudesCheckbox = document.getElementById('Solicitudes-Publicaciones');
        var rechazadasCheckbox = document.getElementById('Publicaciones-Rechazadas');

        // Establecer las opciones predeterminadas
        activasCheckbox.checked = true;
        inactivasCheckbox.checked = true;
        solicitudesCheckbox.checked = true;
        rechazadasCheckbox.checked = true;
        // Por ejemplo, activas se selecciona por defecto

        // Llamar a la función para filtrar las publicaciones
        filtrarPublicaciones();
    });
</script>


<!-- Muestra solo las casillas que esten seleccionadas -->
<script>
    // Función para manejar el cambio en los checkboxes
    function filtrarPublicaciones() {
        // Obtener los checkboxes
        var activas = document.getElementById('Publicaciones-Activas');
        var inactivas = document.getElementById('Publicaciones-Inactivas');
        var solicitudes = document.getElementById('Solicitudes-Publicaciones');
        var rechazadas = document.getElementById('Publicaciones-Rechazadas');

        // Obtener todas las filas de la tabla
        var filas = document.querySelectorAll('.activas, .inactivas, .pendientes, .rechazadas');

        // Mostrar u ocultar filas según los checkboxes seleccionados
        filas.forEach(function(fila) {
            if ((activas.checked && fila.classList.contains('activas')) ||
                (inactivas.checked && fila.classList.contains('inactivas')) ||
                (solicitudes.checked && fila.classList.contains('pendientes')) ||
                (rechazadas.checked && fila.classList.contains('rechazadas'))) {
                fila.style.display = 'table-row'; // Mostrar fila
            } else {
                fila.style.display = 'none'; // Ocultar fila
            }
        });
    }

    // Agregar event listener a los checkboxes
    document.querySelectorAll('.Inputs').forEach(function(checkbox) {
        checkbox.addEventListener('change', filtrarPublicaciones);
    });

    // Filtrar publicaciones al cargar la página
    filtrarPublicaciones();
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Pregunta si quieres aprobar la publicacion -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Busca todos los elementos <a> con la clase "aprobar"
    var elementosAprobar = document.querySelectorAll("#aprobar");

    // Agrega un controlador de eventos clic a cada elemento
    elementosAprobar.forEach(function(elemento) {
        elemento.addEventListener("click", function(event) {
            event.preventDefault(); // Evita el comportamiento predeterminado del enlace

            // Obtiene el ID de la publicación del atributo data-id
            var postId = elemento.getAttribute("data-id");

            // Construye la URL de redirección con el ID de la publicación
            var urlRedireccion = "<?php echo RUTA . 'admin/aprobar.php?id=' ?>" + postId;

            // Muestra el diálogo de confirmación
            Swal.fire({
                title: "¿Seguro de que quieres aceptar esta publicación?",
                text: "Al aceptar esta publicación será visible para cualquier usuario dentro del blog",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, aceptarla"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "¡Aceptada!",
                        text: "La publicación ahora es visible para todos.",
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


<!-- Pregunta si quires rechazar la publicacion -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Busca todos los elementos <a> con la clase "aprobar"
    var elementosAprobar = document.querySelectorAll("#rechazar");

    // Agrega un controlador de eventos clic a cada elemento
    elementosAprobar.forEach(function(elemento) {
        elemento.addEventListener("click", function(event) {
            event.preventDefault(); // Evita el comportamiento predeterminado del enlace

            // Obtiene el ID de la publicación del atributo data-id
            var postId = elemento.getAttribute("data-id");

            // Construye la URL de redirección con el ID de la publicación
            var urlRedireccion = "<?php echo RUTA . 'admin/rechazar_publicacion.php?id=' ?>" + postId;

            // Muestra el diálogo de confirmación
            Swal.fire({
                title: "¿Seguro de que quieres rechazar esta publicación?",
                text: "Al aceptar esta publicación se regresara al usuario para que la modifique",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, rechazar"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "¡Aceptada!",
                        text: "La publicación ahora es visible para todos.",
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

<!-- Pregunta si quirres desactivar una publicacion -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Busca todos los elementos <a> con la clase "aprobar"
    var elementosAprobar = document.querySelectorAll("#desactivar");

    // Agrega un controlador de eventos clic a cada elemento
    elementosAprobar.forEach(function(elemento) {
        elemento.addEventListener("click", function(event) {
            event.preventDefault(); // Evita el comportamiento predeterminado del enlace

            // Obtiene el ID de la publicación del atributo data-id
            var postId = elemento.getAttribute("data-id");

            // Construye la URL de redirección con el ID de la publicación
            var urlRedireccion = "<?php echo RUTA . 'admin/desactivar_publi.php?id=' ?>" + postId;

            // Muestra el diálogo de confirmación
            Swal.fire({
                title: "¿Seguro de que quieres desactivar esta publicación?",
                text: "Al desactivar esta publicación se regresara al usuario para que la modifique",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, desactivar"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "¡Aceptada!",
                        text: "Ahora la publicaciíon esta desactivada.",
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

<?php require '../views/footer.php'; ?>