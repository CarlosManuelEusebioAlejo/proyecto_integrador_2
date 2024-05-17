<?php 
require '../views/header.php'; ?>

<!-- <a href="../" class="btn btn-primary btn-lg mb-4">Volver</a> -->
<section class="container mt-5 w-75">
    <h4 class="migajas-pan">Panel de Control></h4>
    <h3 class="Texto bienvenida">Bienvenido <?php print_r($_SESSION['editor']); ?></h3>
    <h2 class="panel">Panel de control</h2>
        <div class="gx-3 text-center mt-5 mb-5 grid-container">
        <!-- OPCIONES -->

            <!-- Administrar .... -->
            <div class="row mb-3">
                <div class="col mb-3">
                    <div class="p-3 border bg-light position-relative">
                        <h4 class="Texto">Administrar mis publicaciones</h4>
                        <div class="m-1">
                            <small>
                             En esta sección podrás ver todas las publicaciones del blog,
                             seccionadas por filtros para que así sea más fácil su visualización, 
                             en la cual podrás aceptar, rechazar, activar y desactivar las publicaciones.  
                            </small>
                        </div>
                        <div class="container d-flex justify-content-center mt-4">
                            <a href=<?php echo RUTA . 'views/admin_panel_publicaciones.php'?> class="btn btn-primary float-end"><i class="bi bi-arrow-right-square"></i> Entar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col mb-3">
                    <div class="p-3 border bg-light position-relative">
                        <h4 class="Texto">Ver mis publicaciones</h4>
                        <div class="m-1">
                            <small>
                             En esta sección podrás ver todas las publicaciones del blog,
                             seccionadas por filtros para que así sea más fácil su visualización, 
                             en la cual podrás aceptar, rechazar, activar y desactivar las publicaciones.  
                            </small>
                        </div>
                        <div class="container d-flex justify-content-center mt-4">
                            <a href=<?php echo RUTA . 'views/admin_panel_publicaciones.php'?> class="btn btn-primary float-end"><i class="bi bi-arrow-right-square"></i> Entar</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Administrar .... -->

            <!-- Administradores ---- nueva publi -->
                <div class="col">
                    <div class="p-3 border bg-light position-relative grid-item">
                        <h4 class="Texto">Nueva publicación</h4>
                        <div class="m-1">
                            <small>
                                ¡Agrega una nueva publicación!, también como administrador 
                                    puedes hacer publicaciones  
                            </small>
                        </div>
                        <div class="container d-flex justify-content-center mt-4 w-50">
                            <a href="nuevo.php">
                                <i class="bi bi-plus-square display-1"></i>
                            </a>
                        </div>
                    </div>
                </div>   
            </div>
            <!-- Administradores ---- nueva publi -->
        <!-- OPCIONES -->
           

            <div class="d-flex mt-1">
                <div class="mt-1">
                    <a href="../admin/cerrar.php" class="btn btn-primary">Cerrar sesion</a>
                </div>
                </div>
        </div>
</section>
<br>

<?php // require '../paginacion.php'; ?>

<?php require '../views/footer.php'; ?>
