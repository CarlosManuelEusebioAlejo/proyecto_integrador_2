<?php require 'header.php'; ?>


<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
            <li class="breadcrumb-item active" aria-current="page">PERFIL</li>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="https://prospectdirect.com/wp-content/uploads/2017/05/generic-profile-photo-2.png" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3"><?php echo $perfil['usuario']; ?></h5>
            <p class="text-muted mb-1">Se unio el : <?php echo fecha($perfil['fecha_registro']); ?></p>
          </div>
        </div>

      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Nombre</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $perfil['nombre'];?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Apellido</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $perfil['apellido'];?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Correo Electronico</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $perfil['email'];?></p>
              </div>
            </div>
            <hr>
            <div class="row">
            </div>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Rol</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-1"><?php echo $perfil['tipo'];?></p>
              </div>
            </div>
            <hr>
          </div>
        </div>
    </div>


    <div class="contenedor">
    <br><br><br>
    
    <?php   foreach($posts as $post): ?>
        <div class="container">
            <div class="container">
        <div class="post">
            <div class="container">

                <article>
                    <h2 class="titulo"><a href="single.php?id=<?php echo $post['id']; ?>" class="text-decoration-none"><?php echo $post['titulo']; ?></a></h2>
                    <p class="fecha"><?php echo fecha($post['fecha']); ?></p>
                    <p class="tema"><?php echo $post['tema'];?></p>
                    <div class="thumb">
                        <a href="single.php?id=<?php echo $post['id']; ?>">
                            <img src="<?php echo RUTA; ?>/imagenes/<?php echo $post['thumb']; ?>" alt="">
                        </a>
                    </div>
                    <p class="extracto"><?php echo $post['extracto']; ?></p>
                    <a href="single.php?id=<?php echo $post['id']; ?>" class="continuar text-decoration-none">Leer más</a>
                </article>
            </div>
        </div>
        </div>
        </div>
    <?php   endforeach; ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>