<?php require '../views/header.php';
?>

<a href="../admin/aceptar_editores.php" class="btn btn-primary btn-lg mb-4">Volver</a>
<div class="container">
    <?php if(!empty($mensaje)): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $mensaje; ?>
        </div>
    <?php endif; ?>
    
    <h2>Registro de Usuario</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Nombre">
        </div>
        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" class="form-control" id="apellido" name="apellido" required placeholder="Apellido">
        </div>
        <div class="form-group">
            <label for="Usuario">Usuario: <i class="bi bi-question-circle" title="Este usuario se mostrara como autor en las publicaciones"></i></label>
            <input type="text" class="form-control" id="usuario" name="usuario" required placeholder="Usuario">
        </div>
        <div class="form-group">
            <select name="tipo" id="">
                <option value="editor">Editor</option>
                <option value="admin">admin</option>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input type="email" class="form-control" id="email" name="email" name="email" required placeholder="Fitlife@gmail.com">
        </div>
        <div class="form-group">
            <label for="number">Numero de telefono</label>
            <input type="number" class="form-control" id="telefono" name="telefono" required placeholder="1231231234">
        </div>
        <div class="form-group">
            <label for="contrasena">Contraseña:</label>
            <input type="password" class="form-control" id="contrasena" name="contrasena" required placeholder="contraseña">
        </div>
        <div class="form-group">
            <label for="confirmar">Confirmar Contraseña:</label>
            <input type="password" class="form-control" id="confirmar" name="confirmar" required placeholder="contraseña">
        </div>
        <div class="form-group">
            <label for="experiencia">Experiencia:</label>
            <textarea class="form-control" id="experiencia" name="experiencia" required placeholder="Cuentanos por que deberias ser editor"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Registrar</button>
    </form>
</div>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const contrasena = document.getElementById('contrasena');
        const confirmar = document.getElementById('confirmar');

        confirmar.addEventListener('input', () => {
            if (contrasena.value !== confirmar.value) {
                confirmar.setCustomValidity('Las contraseñas no coinciden');
            } else {
                confirmar.setCustomValidity('');
            }
        });
    });
</script>



<?php require '../views/footer.php'; ?>