<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<title>Modal Example</title>
<link rel="stylesheet" href="css_nuevaPubli/styles-nuevaPubli.css">
</head>
<body>
<header class="header">
    <div class="container">
    <div class="btn-menu">
        <!-- <label for="btn-menu" class="icon-menu"></label> -->
    </div>
        <div class="logo">
            <h1>VitalFitLife</h1>
        </div>
        <nav class="menu">
            <!-- <input type="text" class="search-box" placeholder="Buscar..."> -->
            <!-- <a hrefy="#" class="icon-bell"></a> -->
            <a href="#">Inicio</a>
            <a href="#" class="icon-user"></a>
        </nav>

    </div>
</header>

  <div class="menu-publi">
    <form class="Sub-menu2" action="publicar.php" method="POST" enctype="multipart/form-data" onsubmit="return validar();">
      <section class="menu-publicaciones">
        <div class="Publicacion">
          <div class="Encabezados">
            <center>
              <h1>Crear publicación</h1>
              <br>
              <br>
            </center>
            <section class="TituloPublicacion">
              <textarea class="LetrasInput IntTitulo" placeholder="Ingresa un titulo..." name="Titulo" id="Titulo" rows="1"></textarea>
            </section>
            <section class="TituloPublicacion">
              <textarea class="LetrasInput IntTitulo" placeholder="Ingresa tu nombre de usuario..." name="Autor" id="Autor" rows="1"></textarea>
            </section>
            <!-- Opcion de tema -------------------------------------------------- -->
            <!-------------------------------------------------------------------- -->
            <section class="SeleccionarTema">
              <label for="exampleDataList" class="form-label">Elige la rama a la que pertenece tu informacion:</label>
              <input class="form-control" list="datalistOptions" name="Rama" id="Rama" placeholder="Ingresa una opcion">
              <datalist id="datalistOptions">
                <option value="Nutricion">
                <option value="Salud">
              </datalist>
            </section>
            <!-- fin Opcion de tema -------------------------------------------------- -->
            <!-------------------------------------------------------------------- -->
          </div>
          <div class="ImagenPublicacion">
            <div id="imagenContainer">
              <!-- <img src="img/background.jpg" alt=""> -->
              <label for="imagenInput" class="label">Ingresa una imagen...</label>
              <input class="form-control"  name="Imagen" id="Imagen" type="file" accept="image/*" value="insetar_archivo">
            </div>
          </div>
          <div class="TextoP">
            <div class="TextoPublicacion">
              <textarea class="LetrasInput Descripcion" placeholder="Ingresa una descripcion..." name="Descripcion" id="Descripcion" cols="30" rows="10" id="CuadroTextosAjustables"></textarea>
            </div>
          </div>
        </div>
        <!--Publicaciones----------------------------------------------------------------->
        <!-------------------------------------------------------------------------------->
        <div class="bottonConfirmar">
            <button class="btn btn-success" id="btnEliminar">Publicar</button>
            <button id="regresar" type="button" class="btn btn-secondary"><a href="interfaceAdmin.php" class="btn-a">Cancelar</a></button>
        </div>
      </section><!--menu-publicaciones-->
    </form><!--sub-menu2-->
  </div><!--menu-principal-->
<script src="resorces/ajustarRows.js"></script>
<script src="resorces/imagenInput.js"></script>
<script src="resorces/eliminarImagen.js"></script>
</body>
</html>
