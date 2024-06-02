<?php 
session_start();
require '../admin/config.php';
require '../views/header.php';  
include './partials/modal_publicacion.php';
include './partials/modal_info_usuario.php';
include './partials/modal_opciones_usuarios.php';
require '../functions.php';

comprobarSessionadmin();

$conexion = conexion($bd_config);
$activos = obtener_usuarios($conexion);
?>

<section class="container mt-5 w-75">
    <h4 class="migajas-pan">Panel de Control > Administrar Administradores</h4>
    <h2 class="panel">Administrar Administradores</h2>

    <form class="container m-5 p-3 border">
        <div class="container text-center">
            <div class="container mb-3 text-center">
                <h4 class="fs-5 Texto">Selecciona una opción</h4>
            </div>
            <div class="row">
                <div class="border-1 col">
                    <div>
                        <!-- Filtros -->
                        <div class="btn-group btn-group-toggle border p-2 align-items-center" data-toggle="buttons">
                            <div class="d-flex flex-row gap-3">
                                <div class="Fila-Filtros-ActInac">
                                    <label class="Labels">
                                        <input type="checkbox" class="Inputs" name="Usuarios-Activos" id="Usuarios-Activos">
                                        Activos
                                    </label>
                                </div>
                                <div class="Fila-Filtros-ActInac">
                                    <label class="Labels">
                                        <input type="checkbox" class="Inputs" name="Usuarios-Inactivos" id="Usuarios-Inactivos">
                                        Inactivos
                                    </label>
                                </div>
                                <div class="container text-center">
                                    <a href="<?php echo RUTA . '/admin/añadir.php';?>" class="btn btn-outline-primary">
                                        Nuevo Administrador
                                    </a>
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
                        <th scope="col">Nombre Usuario</th>
                        <th class="d-flex justify-content-center" scope="col"> <i class="bi bi-gear"></i> </th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Ejemplo de filas -->

                    <?php foreach($activos as $activo): ?>
                        <?php if ($activo['tipo'] == 'admin' && $activo['status'] == 'activo'): ?>
                    <tr class="activo table-success border-success">
                        <th scope="row"><?php echo $activo['id'];?></th>
                        <td><?php echo $activo['usuario'];?></td>
                        <td>
                            <div class="d-flex justify-content-center gap-3">
                                <a class="btn btn-outline-primary" href="<?php echo RUTA ?>perfil.php?usuario=<?php echo $activo['id']; ?>">
                                    <abbr title="Informacion del usuario">
                                        <i class="bi bi-info-circle"></i>
                                    </abbr>
                                </a>
                                <a href="#" class="btn btn-outline-warning" id="desactivar" data-id="<?php echo $activo['id']; ?>">
                                    <abbr title="Desactivar esta publicacion">Desactivar</abbr>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php endforeach; ?>

                    <?php foreach($activos as $activo): ?>
                        <?php if ($activo['tipo'] == 'admin' && $activo['status'] == 'inactivo'): ?>
                    <tr class="inactivo table-secondary border-secondary">
                        <th scope="row"><?php echo $activo['id'];?></th>
                        <td><?php echo $activo['usuario'];?></td>
                        <td>
                            <div class="d-flex justify-content-center gap-3">
                                <a class="btn btn-outline-primary" href="<?php echo RUTA ?>perfil.php?usuario=<?php echo $activo['id']; ?>">
                                    <abbr title="Informacion del usuario">
                                        <i class="bi bi-info-circle"></i>
                                    </abbr>
                                </a>
                                <a href="#" class="btn btn-outline-success" id="activar" data-id="<?php echo $activo['id']; ?>">
                                    <abbr title="Activar usuario">Activar</abbr>
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

    
    </form>
</section>

<script>
    // Función para manejar el cambio en los checkboxes
    function filtrarPublicaciones() {
        // Obtener los checkboxes
        var activos = document.getElementById('Usuarios-Activos');
        var inactivos = document.getElementById('Usuarios-Inactivos');

        // Obtener todas las filas de la tabla
        var filas = document.querySelectorAll('tbody tr');

        // Mostrar u ocultar filas según los checkboxes seleccionados
        filas.forEach(function(fila) {
            if ((activos.checked && fila.classList.contains('activo')) ||
                (inactivos.checked && fila.classList.contains('inactivo'))) {
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

    // Preseleccionar las casillas de verificación y filtrar al cargar la página
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('Usuarios-Activos').checked = true;
        document.getElementById('Usuarios-Inactivos').checked = true;
        filtrarPublicaciones();
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Busca todos los elementos <a> con la clase "aprobar"
    var elementosdesactivar = document.querySelectorAll("#activar");

    // Agrega un controlador de eventos clic a cada elemento
    elementosdesactivar.forEach(function(elemento) {
        elemento.addEventListener("click", function(event) {
            event.preventDefault(); // Evita el comportamiento predeterminado del enlace

            // Obtiene el ID de la publicación del atributo data-id
            var postId = elemento.getAttribute("data-id");

            // Construye la URL de redirección con el ID de la publicación
            var urlRedireccion = "<?php echo RUTA . 'admin/activar_admin.php?id=' ?>" + postId;

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
    var elementosdesactivar = document.querySelectorAll("#desactivar");

    // Agrega un controlador de eventos clic a cada elemento
    elementosdesactivar.forEach(function(elemento) {
        elemento.addEventListener("click", function(event) {
            event.preventDefault(); // Evita el comportamiento predeterminado del enlace

            // Obtiene el ID de la publicación del atributo data-id
            var postId = elemento.getAttribute("data-id");

            // Construye la URL de redirección con el ID de la publicación
            var urlRedireccion = "<?php echo RUTA . 'admin/desactivar_admin.php?id=' ?>" + postId;

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

<?php require '../views/footer.php'; ?>
