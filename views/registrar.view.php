<?php require 'views/header.php'; ?>

<div class="container">
    <?php if(!empty($mensaje)): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $mensaje; ?>
        </div>
    <?php endif; ?>
    <?php if(!empty($mensaje1)): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $mensaje1; ?>
        </div>
    <?php endif; ?>
    
    <h2 class="text-center py-3 text-white"><b>Registro de usuario</b></h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="form-group">
            <label for="nombre" class="text-white">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Ingresa tu nombre">
        </div>
        <div class="form-group">
            <label for="apellido" class="pt-2 text-white">Apellido:</label>
            <input type="text" class="form-control" id="apellido" name="apellido" required placeholder="Ingresa tu apellido">
        </div>
        <div class="form-group">
            <label for="Usuario" class="pt-2 text-white">Usuario: <i class="bi bi-question-circle hover:bg-blue-200 rounded-full" title="Este usuario se mostrará como autor en las publicaciones"></i></label>
            <input type="text" class="form-control" id="Usuario" name="Usuario" required placeholder="Ingresa tu nombre de usuario">
        </div>
        <div class="form-group">
            <label for="email" class="pt-2 text-white">Correo Electrónico: <i class="bi bi-question-circle hover:bg-blue-200 rounded-full" title="Este correo será parte del autor en las publicaciones"></i></label>
            <input type="email" class="form-control" id="email" name="email" required placeholder="Ej..[fitlife@gmail.com]">
        </div>
        <div class="form-group">
            <label for="" class="form-label pt-x2">Selección de Registro</label>
            <select name="tipo_registro" id="tipo_registro" required class="form-select">
                <option value="" selected disabled>--</option>
                <!-- <option value="1">Usuario</option> -->
                <option value="2">Editor</option>
            </select>
        </div>
        <div class="form-group">
            <label for="number" class="pt-2 text-white">Número de teléfono</label>
            <input type="number" class="form-control" id="telefono" name="telefono" required placeholder="Digite su número telefónico">
        </div>
        <div class="d-flex">
            <div class="form-group w-full mr-1">
                <label for="contrasena" class="pt-2 text-white">Contraseña: <i class="bi bi-question-circle hover:bg-blue-200 rounded-full" title="Esta contraseña será necesaria para iniciar sesión"></i></label>
                <input type="password" class="form-control" id="contrasena" name="contrasena" required placeholder="Crea una contraseña">
            </div>
            <div class="form-group w-full ml-1">
                <label for="confirmar" class="pt-2 text-white">Confirmar Contraseña: <i class="bi bi-question-circle hover:bg-blue-200 rounded-full" title="Esta contraseña será necesaria para iniciar sesión"></i></label>
                <input type="password" class="form-control" id="confirmar" name="confirmar" required placeholder="Confirma tu contraseña">
            </div>
        </div>
        <div class="form-group">
            <label for="experiencia" class="pt-2 text-white">Experiencia: <i class="bi bi-question-circle hover:bg-blue-200 rounded-full" title="Háblanos un poco más sobre ti"></i></label>
            <textarea class="form-control pb-5" id="experiencia" name="experiencia" required placeholder="¿Por qué deberías ser usuario/editor?"></textarea>
        </div>
        <div id="archivoPDF" style="display: none;" class="form-group">
            <label for="pdf" class="pt-2">Archivo PDF:</label>
            <input type="file" class="form-control" id="pdf" name="pdf">
        </div>
        <br>
        <button type="submit" class="btn btn-outline-warning float-end" mt-2">Registrarse</button>
        <br><br>
    </form>
</div>
<div class="container">
    <footer class="py-5">
      <div class="mb-5">
        <div class="mb-3 py-4 my-4">
          <p class="text-white">© 2024 blog Web, FITLIFE.</p>
        </div>
      </div>
    </footer>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


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
    
    document.addEventListener('DOMContentLoaded', () => {
        const tipo_registro = document.getElementById('tipo_registro');
        const archivoPDF = document.getElementById('archivoPDF');

        tipo_registro.addEventListener('change', () => {
            if (tipo_registro.value === '2') { // Si se elige la opción de "Editor"
                archivoPDF.style.display = 'block'; // Mostrar el campo de archivo PDF
            } else {
                archivoPDF.style.display = 'none'; // Ocultar el campo de archivo PDF
            }
        });
    });
</script>