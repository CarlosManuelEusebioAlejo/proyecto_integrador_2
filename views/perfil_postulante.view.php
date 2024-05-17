
<?php require '../views/header.php'; ?>


<div class="container">
    <h2>Datos del Postulante</h2>
    <h4>Status: <?php echo $postulante['status'];?></h4>
    <br>
    <ul>
        <!-- <li><strong>ID:</strong> <?php echo $postulante['id']; ?></li> -->
        <li><strong>Usuario:</strong> <?php echo $postulante['usuario']; ?></li>
        <li><strong>Nombre:</strong> <?php echo $postulante['nombre']; ?></li>
        <li><strong>Apellido:</strong> <?php echo $postulante['apellido']; ?></li>
        <li><strong>Correo Electrónico:</strong> <?php echo $postulante['correo']; ?></li>
        <li><strong>Teléfono:</strong> <?php echo $postulante['telefono']; ?></li>
        <li><strong>Fecha de Registro:</strong> <?php echo $postulante['fecha_registro']; ?></li>
        <li><strong>Experiencia: </strong><?php echo $postulante['experiencia']; ?></li>        

    </ul>
</div>

<?php
// Incluir el archivo de pie de página
require '../views/footer.php';
?>
