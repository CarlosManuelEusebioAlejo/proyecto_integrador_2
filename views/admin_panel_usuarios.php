<?php 
session_start();
require '../admin/config.php';
require '../views/header.php';  
require '../functions.php';

comprobarSessionadmin();

$conexion = conexion($bd_config);
$activos = obtener_usuarios($conexion);
$postulantes= obtener_postulantes($conexion);
?>

<section class="container mt-5 w-75">
    <h4 class="migajas-pan">Panel de Control > Administrar Usuarios</h4>
    <h2 class="panel">Administrar Usuarios</h2>

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
                                        <input type="checkbox" class="Inputs" name="Usuarios-Activos" id="Usuarios-Activos" checked>
                                        Activos
                                    </label>
                                </div>
                                <div class="Fila-Filtros-ActInac">
                                    <label class="Labels">
                                        <input type="checkbox" class="Inputs" name="Usuarios-Inactivos" id="Usuarios-Inactivos" checked>
                                        Inactivos
                                    </label>
                                </div>
                            </div>
                            <div>
                                <div class="Fila-Filtros-ActInac">
                                    <label class="Labels">
                                        <input type="checkbox" class="Inputs" name="Solicitudes-Usuarios" id="Solicitudes-Usuarios" checked>
                                        Solicitudes Pendientes
                                    </label>
                                </div>
                                <div class="Fila-Filtros-ActInac">
                                    <label class="Labels">
                                        <input type="checkbox" class="Inputs" name="Usuarios-Rechazadoss" id="Usuarios-Rechazadoss" checked>
                                        Solicitudes Rechazadas
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
                        <th scope="col">ID</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Nombre</th>
                        <th class="d-flex justify-content-center" scope="col"> <i class="bi bi-gear"></i> </th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Filas dinámicas generadas con PHP -->
                    <?php foreach($activos as $activo): ?>
                        <?php if ($activo['tipo'] == 'editor' && $activo['status'] == 'activo'): ?>
                            <tr class="activos table-success border-success">
                                <th scope="row"><?php echo $activo['id'];?></th>
                                <td><?php echo $activo['usuario'];?></td>
                                <td><?php echo $activo['nombre'];?></td>
                                <td>
                                    <div class="d-flex justify-content-center gap-3">
                                        <a type="button" class="btn btn-outline-primary" href="<?php echo RUTA ?>perfil.php?usuario=<?php echo $activo['id']; ?>">
                                            <abbr title="Informacion del usuario">
                                                <i class="bi bi-info-circle"></i>
                                            </abbr>
                                        </a>
                                        <a href="#" class="btn btn-outline-warning" id="desactivar" data-id="<?php echo $activo['id']; ?>">
                                            <abbr title="Desactivar este usuario">Desactivar</abbr>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>

                    <?php foreach($activos as $activo): ?>
                        <?php if ($activo['tipo'] == 'editor' && $activo['status'] == 'inactivo'): ?>
                            <tr class="inactivos table-secondary border-secondary">
                                <th scope="row"><?php echo $activo['id'];?></th>
                                <td><?php echo $activo['usuario'];?></td>
                                <td><?php echo $activo['nombre'];?></td>
                                <td>
                                    <div class="d-flex justify-content-center gap-3">
                                        <a type="button" class="btn btn-outline-primary" href="<?php echo RUTA ?>perfil.php?usuario=<?php echo $activo['id']; ?>">
                                            <abbr title="Informacion del usuario">
                                                <i class="bi bi-info-circle"></i>
                                            </abbr>
                                        </a>
                                        <a href="#" class="btn btn-outline-success" id="aceptar" data-id="<?php echo $activo['id']; ?>">
                                            <abbr title="Activar usuario">Activar</abbr>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>

                    <?php foreach($postulantes as $postulante): ?>
                        <?php if ($postulante['status'] == 'pendiente'): ?>
                            <tr class="pendientes table-warning border-warning">
                                <th scope="row"><?php echo $postulante['id'];?></th>
                                <td><?php echo $postulante['usuario'];?></td>
                                <td><?php echo $postulante['nombre'];?></td>
                                <td>
                                    <div class="d-flex justify-content-center gap-3">
                                        <a type="button" class="btn btn-outline-primary" href="../admin/perfil_postulante.php?id=<?php echo $postulante['id']; ?>">
                                            <abbr title="Informacion del usuario">
                                                <i class="bi bi-info-circle"></i>
                                            </abbr>
                                        </a>
                                        <a class="btn btn-outline-success" id="aceptar2" data-id="<?php echo $postulante['id']; ?>">
                                            <abbr title="Aceptar solicitud">
                                                <i class="bi bi-check-circle"></i>
                                            </abbr>
                                        </a>
                                        <a href="#" class="btn btn-outline-danger" id="rechazar" data-id="<?php echo $postulante['id']; ?>">
                                            <abbr title="Rechazar solicitud">
                                                <i class="bi bi-x-circle"></i>
                                            </abbr>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>

                    <?php foreach($postulantes as $postulante): ?>
                        <?php if ($postulante['status'] == 'rechazado'): ?>
                            <tr class="rechazadas table-danger border-danger">
                                <th scope="row"><?php echo $postulante['id'];?></th>
                                <td><?php echo $postulante['usuario'];?></td>
                                <td><?php echo $postulante['id'];?></td>
                                <td>
                                    <div class="d-flex justify-content-center gap-3">
                                        <a href="../admin/perfil_postulante.php?id=<?php echo $postulante['id']; ?>" class="btn btn-outline-primary">
                                            <abbr title="Informacion del usuario">
                                                <i class="bi bi-info-circle"></i>
                                            </abbr>
                                        </a>
                                        <a href="#" class="btn btn-outline-success" id="aceptar2" data-id="<?php echo $postulante['id']; ?>">
                                            <abbr title="Aceptar solicitud">
                                                <i class="bi bi-check-circle"></i>
                                            </abbr>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- TABLA -->

        <div>
            <!-- Acción para volver -->
            <a href="" class="btn btn-primary">Volver</a>
        </div>
    </form>
</section>

<script>
    // Función para manejar el cambio en los checkboxes
    function filtrarPublicaciones() {
        // Obtener los checkboxes
        var activos = document.getElementById('Usuarios-Activos');
        var inactivos = document.getElementById('Usuarios-Inactivos');
        var solicitudes = document.getElementById('Solicitudes-Usuarios');
        var rechazadas = document.getElementById('Usuarios-Rechazadoss');

        // Obtener todas las filas de la tabla
        var filas = document.querySelectorAll('.activos, .inactivos, .pendientes, .rechazadas');

        // Mostrar u ocultar filas según los checkboxes seleccionados
        filas.forEach(function(fila) {
            if ((activos.checked && fila.classList.contains('activos')) ||
                (inactivos.checked && fila.classList.contains('inactivos')) ||
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

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Busca todos los elementos <a> con la clase "aprobar"
    var elementosdesactivar = document.querySelectorAll("#desactivar");

    // Agrega un controlador de eventos clic a cada elemento
    elementosdesactivar.forEach(function(elemento) {
        elemento.addEventListener("click", function(event) {
            event.preventDefault(); // Evita el comportamiento predeterminado del enlace

            // Obtiene el ID de la publicación del atributo data-id
            var postId = elemento.getAttribute("data-id");

            // Construye la URL de redirección con el ID de la publicación
            var urlRedireccion = "<?php echo RUTA . 'admin/desactivar.php?id=' ?>" + postId;

            // Muestra el diálogo de confirmación
            Swal.fire({
                title: "¿Seguro de que quieres desactivar este usuario?",
                text: "Al aceptar este usuario no podra iniciar sesion",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, desactivar"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "¡Usuario desactivado!",
                        text: "Ahora el usuario no puede iniciar sesion.",
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

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Busca todos los elementos <a> con la clase "aprobar"
    var elementosdesactivar = document.querySelectorAll("#aceptar2");

    // Agrega un controlador de eventos clic a cada elemento
    elementosdesactivar.forEach(function(elemento) {
        elemento.addEventListener("click", function(event) {
            event.preventDefault(); // Evita el comportamiento predeterminado del enlace

            // Obtiene el ID de la publicación del atributo data-id
            var postId = elemento.getAttribute("data-id");

            // Construye la URL de redirección con el ID de la publicación
            var urlRedireccion = "<?php echo RUTA . 'admin/aceptado.php?id=' ?>" + postId;

            // Muestra el diálogo de confirmación
            Swal.fire({
                title: "¿Seguro de que quieres aceptar este usuario?",
                text: "Al aceptar este usuario podra iniciar sesion y realizar publicaciones",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí,activar"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "¡Usuario activado!",
                        text: "Ahora el usuario puede iniciar sesion.",
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

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Busca todos los elementos <a> con la clase "aprobar"
    var elementosdesactivar = document.querySelectorAll("#aceptar");

    // Agrega un controlador de eventos clic a cada elemento
    elementosdesactivar.forEach(function(elemento) {
        elemento.addEventListener("click", function(event) {
            event.preventDefault(); // Evita el comportamiento predeterminado del enlace

            // Obtiene el ID de la publicación del atributo data-id
            var postId = elemento.getAttribute("data-id");

            // Construye la URL de redirección con el ID de la publicación
            var urlRedireccion = "<?php echo RUTA . 'admin/activar.php?id=' ?>" + postId;

            // Muestra el diálogo de confirmación
            Swal.fire({
                title: "¿Seguro de que quieres aceptar este usuario?",
                text: "Al aceptar este usuario podra iniciar sesion y realizar publicaciones",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí,activar"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "¡Usuario activado!",
                        text: "Ahora el usuario puede iniciar sesion.",
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


<script>
document.addEventListener("DOMContentLoaded", function() {
    // Busca todos los elementos <a> con la clase "aprobar"
    var elementosdesactivar = document.querySelectorAll("#rechazar");

    // Agrega un controlador de eventos clic a cada elemento
    elementosdesactivar.forEach(function(elemento) {
        elemento.addEventListener("click", function(event) {
            event.preventDefault(); // Evita el comportamiento predeterminado del enlace

            // Obtiene el ID de la publicación del atributo data-id
            var postId = elemento.getAttribute("data-id");

            // Construye la URL de redirección con el ID de la publicación
            var urlRedireccion = "<?php echo RUTA . 'admin/rechazar.php?id=' ?>" + postId;

            // Muestra el diálogo de confirmación
            Swal.fire({
                title: "¿Seguro de que quieres rechazar este usuario?",
                text: "Al rechazar este usuario no podra realizar publicaciones",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí,rechazar"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "¡Usuario rechazado!",
                        text: "El usuario fue rechazado.",
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
