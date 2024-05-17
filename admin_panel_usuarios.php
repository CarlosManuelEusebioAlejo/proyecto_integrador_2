<?php 
require '../admin/config.php';

require '../views/header.php';  
// include './partials/modal_publicacion.php';
// include './partials/modal_info_usuario.php';
// include './partials/modal_opciones_usuarios.php';
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
                        <th scope="col">Titulo</th>
                        <th scope="col">Nombre Usuario</th>
                        <th class="d-flex justify-content-center" scope="col"> <i class="bi bi-gear"></i> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Asi quedara los filotros -->
                            <!-- Para los activos -->
                        <tr>
                        <th scope="row">1</th>
                        <td>Activos</td>
                        <td>Otto</td>
                        <td>
                            <div class="d-flex justify-content-center gap-3">
                                <a type="button" class="btn btn-outline-primary" href="<?php echo RUTA ?>perfil.php?usuario=<?php echo $post['id_usuario']; ?>">
                                         <abbr title="Informacion del usuario">
                                             <i class="bi bi-info-circle"></i>
                                         </abbr>
                                </a>
                                <!-- Este boton lo vincularan como si estuvieran en el 
                                search al ver sus publicaciones, osea por su nombre -->
                                <a href="#" class="btn btn-outline-info">
                                    <abbr title="Ver publicaciones">Ver Publicaciones</abbr>
                                </a>

                                <a href="#" class="btn btn-outline-warning"
                                data-bs-toggle="modal" data-bs-target="#desactivar-usuario">
                                    <abbr title="Desactivar esta publicacion">Desactivar</abbr>
                                </a>
                            </div>
                        </td>
                        </tr>
                        <tr>
                            <!-- Para los activos -->

                            <!-- Para los inactivos -->
                        <tr>
                        <th scope="row">1</th>
                        <td>Inactivos</td>
                        <td>Otto</td>
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
                            <!-- Para los inactivos -->

                            <!-- Solicitudes Pendientes -->
                        <tr>
                        <th scope="row">1</th>
                        <td>Solicitudes Pendientes</td>
                        <td>Otto</td>
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
                            <!-- Solicitudes Pendientes -->

                            <!-- Solicitudes Rechazadas -->
                        <tr>
                        <th scope="row">1</th>
                        <td>Solicitudes Rechazadas</td>
                        <td>Otto</td>
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
                            <!-- Solicitudes Rechazadas -->
                    </tbody>
                </table>
            </div>
            <!-- TABLA -->
            <div class="d-flex justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <!-- Item para atras -->
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>

                        <!-- Numeracion de paginas -->
                        <li class="page-item"><a class="page-link" href="#">1</a></li>

                        <!-- Item para adelante -->
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div>
                <!-- nomas darle la accion a donde volver -->
                <a href="" class="btn btn-primary">
                    Volver
                </a>
            </div>
        </form>

        <!-- <a href="admin_index.view.php" class="btn btn-primary btn-lg mb-4">Volver</a> -->
    </section>



<?php require '../views/footer.php'; ?>

