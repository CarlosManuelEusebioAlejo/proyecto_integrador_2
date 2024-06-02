<div class="container">
    <footer class="py-5">

      <div class="col-md-5 offset-md-1 mb-3 float-end">
      <?php if(!isset($_SESSION['admin']) || isset($_SESSION['editor'])): ?>
        <div class="d-block">
          <h5 class="text-white">Quiero ser editor</h5>
          <p class="text-white">para aplicar a ser editor registrese aqui</p>
          <div class="d-flex flex-column flex-sm-row w-100 gap-2">
            <a href="<?php echo RUTA . 'registrar.php';?>"><button class="btn btn-outline-warning" type="button">Registrarme</button></a>
          </div>
        </div>
        <?php endif;?>
      </div>

      <div class="mb-5">
        <div class="mb-3 py-4 my-4">
          <p class="text-white">© 2024 blog Web, FITLIFE.</p>
        </div>
      </div>

    </footer>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>