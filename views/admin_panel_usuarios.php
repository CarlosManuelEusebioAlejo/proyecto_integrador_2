<?php session_start();
require '../admin/config.php';

require '../views/header.php';  
include './partials/modal_publicacion.php';
include './partials/modal_info_usuario.php';
include './partials/modal_opciones_usuarios.php';
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
                                                <input type="checkbox" class="Inputs"
                                                        name="Usuarios-Activos" id="Usuarios-Activos">
                                                    Activos
                                            </label>
                                        </div>
    
                                        <div class="Fila-Filtros-ActInac">
                                            <label class="Labels">
                                                <input type="checkbox" class="Inputs"
                                                        name="Usuarios-Inactivos" id="Usuarios-Inactivos">
                                                    Inactivos
                                            </label>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="Fila-Filtros-ActInac">
                                            <label class="Labels">
                                                <input type="checkbox" class="Inputs"
                                                        name="Solicitudes-Usuarios" id="Solicitudes-Usuarios">
                                                    Solicitudes Pendientes
                                            </label>
                                        </div>
    
                                        <div class="Fila-Filtros-ActInac">
                                            <label class="Labels">
                                                <input type="checkbox" class="Inputs"
                                                        name="Usuarios-Rechazadoss" id="Usuarios-Rechazadoss">
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
                        <!-- Asi quedara los filotros -->
                            <!-- Para los activos -->
                            <?php foreach($activos as $activo): ?>
                                <?php if ($activo['tipo'] == 'editor' && $activo['status'] == 'activo'): ?>
                                    <tr class="activos">
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
                                            <!-- Este boton lo vincularan como si estuvieran en el 
                                            search al ver sus publicaciones, osea por su nombre -->
                                            <a href="#" class="btn btn-outline-info">
                                                <abbr title="Ver publicaciones">Ver Publicaciones</abbr>
                                            </a>

                                            <a class="btn btn-outline-warning" href="../admin/desactivar.php?id= <?php echo $activo['id']; ?>">
                                                <abbr title="Desactivar este usuario">Desactivar</abbr>
                                            </a>
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            
                                <!-- Para los activos -->

                                <!-- Para los inactivos -->
                                <?php foreach($activos as $activo): ?>
                                    <?php if ($activo['tipo'] == 'editor' && $activo['status'] == 'inactivo'): ?>
                                        <tr class="inactivos">
                                        <th scope="row"><?php echo $activo['id'];?></th>
                                        <td><?php echo $activo['usuario'];?></td>
                                        <td><?php echo $activo['nombre'];?></td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-3">
                                                <button type="button" class="btn btn-outline-primary"
                                                        data-bs-toggle="modal" data-bs-target="#modal-info-usuario">
                                                        <abbr title="Informacion del usuario">
                                                            <i class="bi bi-info-circle"></i>
                                                        </abbr>
                                                </button>
                                                <a href="#" class="btn btn-outline-success"
                                                data-bs-toggle="modal" data-bs-target="#activar-usuario">
                                                    <abbr title="Activar usuario">Activar</abbr>
                                                </a>
                                                <!-- <a href="#" class="btn btn-outline-secondary"><i class="bi bi-trash"></i></a> -->
                                            </div>
                                        </td>
                                        </tr>
                                        <tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <!-- Para los inactivos -->

                                <!-- Solicitudes Pendientes -->
                        <?php foreach($postulantes as $postulante): ?>
                            <?php if ($postulante['status'] == 'pendiente'): ?>
                            <tr class="pendientes">
                            <th scope="row"><?php echo $postulante['id'];?></th>
                            <td><?php echo $postulante['usuario'];?></td>
                            <td><?php echo $postulante['nombre'];?></td>
                            <td>
                                <div class="d-flex justify-content-center gap-3">
                                    <a type="button" class="btn btn-outline-primary" href="../admin/perfil_postulante.php?id= <?php echo $postulante['id']; ?>">
                                            <abbr title="Informacion del usuario">
                                                <i class="bi bi-info-circle"></i>
                                            </abbr>
                                    </a>
                                    <a class="btn btn-outline-success" href="../admin/aceptado.php?id=<?php echo $postulante['id']; ?>">
                                        <abbr title="Aceptar solicitud">
                                            <i class="bi bi-check-circle"></i>
                                        </abbr>
                                    </a>
                                    <a href="#" class="btn btn-outline-danger"
                                    data-bs-toggle="modal" data-bs-target="#rechazar-usuario">
                                        <abbr title="Rechazar solicitud">
                                            <i class="bi bi-x-circle"></i>
                                        </abbr>
                                    </a>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <?php endif; ?>
                    <?php endforeach; ?>
                            <!-- Solicitudes Pendientes -->

                            <!-- Solicitudes Rechazadas -->
                            <?php foreach($postulantes as $postulante): ?>
                            <?php if ($postulante['status'] == 'rechazado'): ?>
                        <tr class="rechazadas">
                        <th scope="row"><?php echo $postulante['id'];?></th>
                        <td><?php echo $postulante['usuario'];?></td>
                        <td><?php echo $postulante['id'];?></td>
                        <td>
                            <div class="d-flex justify-content-center gap-3">
                                <button type="button" class="btn btn-outline-primary"
                                         data-bs-toggle="modal" data-bs-target="#modal-info-usuario">
                                         <abbr title="Informacion del usuario">
                                             <i class="bi bi-info-circle"></i>
                                         </abbr>
                                </button>
                                <a href="#" class="btn btn-outline-success"
                                data-bs-toggle="modal" data-bs-target="#aceptar-usuario">
                                    <abbr title="Aceptar solicitud">
                                        <i class="bi bi-check-circle"></i>
                                    </abbr>
                                </a>
                            </div>
                        </td>
                        </tr>
                        <tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                            <!-- Solicitudes Rechazadas -->
                    </tbody>
                </table>
            </div>
            <!-- TABLA -->


            <div>
                <!-- nomas darle la accion a donde volver -->
                <a href="" class="btn btn-primary">
                    Volver
                </a>
            </div>
        </form>

        <!-- <a href="admin_index.view.php" class="btn btn-primary btn-lg mb-4">Volver</a> -->
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

<?php require '../views/footer.php'; ?>

