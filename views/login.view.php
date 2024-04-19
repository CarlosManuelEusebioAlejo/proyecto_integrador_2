<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    
<div class="container">
        <div class="signin-signup">
            <form class="sign-in-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" >
                <h2 class="title"><b>INICIO DE SESIÓN</b></h2>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="text" name="usuario" placeholder="usuario">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="contraseña">
                </div>
                <input type="submit" value="INGRESAR" class="btn">
            </form>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>