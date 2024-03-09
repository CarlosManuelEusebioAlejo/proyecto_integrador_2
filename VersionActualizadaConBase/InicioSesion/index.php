<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/styles.css">
    <title>signin-signup</title>
</head>
<body>
    <div class="container">
        <div class="signin-signup">
            <form class="sign-in-form" action="php/inicioSesion.php" method="POST" >
                <h2 class="title">INICIO DE SESIÓN</h2>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="Email" name="Email" placeholder="Email">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="Contrasena" name="Contrasena" placeholder="Contraseña">
                </div>
                <input type="submit" value="INGRESAR" class="btn">
                <!-- <p class="account-text">¿Eres profecional y queres crear blog? <a href="#" id="sign-up-btn2">INGRESAR</a></p> -->
            </form>
            <form class="sign-up-form" action="php/Registro.php" method="POST" >
                <h2 class="title">REGISTRARSE</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="Nombre" name="Nombre" placeholder="Ingresa tu nombre">
                </div>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="Usuario" name="Usuario" placeholder="Ingresa un nombre de usuario">
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="Email" name="Email" placeholder="Email">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="Contrasena" name="Contrasena" placeholder="Contraseña">
                </div>
                <input type="submit" value="REGISTRARSE" class="btn">
                <!-- <p class="account-text">Already have an account? <a href="#" id="sign-in-btn2">Sign in</a></p> -->
            </form>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h2>Ya ingresaste tus datos</h2>
                    <br>
                    <p>Espera a que el administrador te acepte, te llegara un correo Electronico al correo que ingresaste, 
                     una vez aceptado podras ingresar con tu correo y contraseña en inicio de sesión</p>
                    <br>
                     <button class="btn" id="sign-in-btn">INCIO DE SESIÓN</button>
                </div>
                <!-- <img src="/imagenes/sab.jpg" alt="" class="image"> -->
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h2>Eres profecional y quires hacer publicaciones</h2>
                    <p>Ingresa a registarse y resgistrate y ingresa lo que se te pide</p>
                    <button class="btn" id="sign-up-btn">REGISTRARSE</button>
                </div>
                <!-- <img src="assets/imagenes/sab2.jpg" alt="" class="image"> -->
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>