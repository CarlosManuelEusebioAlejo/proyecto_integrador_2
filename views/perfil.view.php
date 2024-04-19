<?php 

session_start();

require 'views/header.php'; ?>

<div class="contenedor">    
    <!-- Aquí puedes mostrar la información del perfil del usuario -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Información Personal</h5>
            <p class="card-text">Nombre: <?php echo $perfil['nombre']; ?></p>
            <p class="card-text">Tipo: <?php echo $perfil['tipo']; ?></p>
            <p class="card-text">Email: <?php echo $perfil['email']; ?></p>
            <!-- descripcion del perfil -->
            <p class="card-text">Descripción: <?php echo $perfil['descripcion']; ?></p>
            <!-- Puedes agregar más campos de información del perfil según sea necesario -->
        </div>
    </div>
</div>

<?php require 'views/footer.php'; ?>
