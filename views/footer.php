<div class="container">
    <footer class="py-5">

      <div class="col-md-5 offset-md-1 mb-3 float-end">
        <form class="d-block">
          <?php if(!isset($_SESSION['admin']) || isset($_SESSION['editor'])): ?>
            <h5>Quiero ser editor</h5>
          <p>para aplicar a ser editor registrese aqui</p>
            <div class="d-flex flex-column flex-sm-row w-100 gap-2">
              <a href="<?php echo RUTA . 'registrar.php';?>"><button class="btn btn-primary" type="button">Registrarme</button></a>
            </div>
            <?php endif; ?>
        </form>
      </div>

      <div class="mb-5">
        <div class="mb-3 py-4 my-4">
          <p>© 2024 Company, Inc. All rights reserved.</p>
          <ul class="list-unstyled d-flex">
            <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
            <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
            <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
          </ul>
        </div>
      </div>

    </footer>
  </div>
<script src="js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>