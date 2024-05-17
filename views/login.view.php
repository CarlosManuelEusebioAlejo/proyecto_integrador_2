<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" media="screen" href="css/style-particles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>
<body>
<div id="particles-js">
    <div class="container">
            <div class="signin-signup">
                <form class="sign-in-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" >
                    <h2 class="title"><b>INICIO DE SESIÓN</b></h2>
                    <div class="input-field">
                        <i class="bi bi-person-circle"></i>
                        <input type="text" name="usuario" placeholder="usuario">
                    </div>
                    <div class="input-field">
                        <i class="bi bi-lock-fill"></i>
                        <input type="password" name="password" placeholder="contraseña">
                    </div>
                    <input type="submit" value="INGRESAR" class="btn">
                </form>
            </div>
    </div>
</div>

    <!-- scripts -->
    <script src="js/particles.js"></script>
    <script src="js/app.js"></script>
    <script src="js/script.js"></script>
</body>
</html>