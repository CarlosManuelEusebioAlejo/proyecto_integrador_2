<?php

    include 'api_conexion.php';

    $Nombre = $_POST['Nombre'];
    $Email = $_POST['Email'];
    $Usuario = $_POST['Usuario'];
    $Contrasena = $_POST['Contrasena'];

    //código para incriptar una contraseña
    $Contrasena = hash('sha512', $Contrasena);

    $query = "INSERT INTO usuarios(Nombre, Email, Usuario, Contrasena)
              VALUES('$Nombre', '$Email', '$Usuario', '$Contrasena')";

    //verificar que el correo no se repita en la base de datos 
    $verificar_Email = mysqli_query($conexion, "SELECT * FROM usuarios WHERE Email='$Email' ");

    
    if(mysqli_num_rows($verificar_Email) > 0)
    {
        echo '
            <script>
                alert("Este Email ya esta registrado, intenta con otro diferente");
                window.location = "../index.php";
            </script>
        ';
        exit();
    }


    
    //verificar que el nombre de usuario no se repita en la base de datos 
    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE Usuario='$Usuario' ");

    if(mysqli_num_rows($verificar_usuario) > 0)
    {
        echo '
            <script>
                alert("Este usuario ya esta registrado, intenta con otro diferente");
                window.location = "../index.php";
            </script>
        ';
        exit();
    }


    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar)
    {
        echo '
            <script>
                alert("Usuario registrado exitosamente");
                window.location = "../index.php";
            </script>
        ';
    }
    else
    {
        echo '
        <script>
            alert("Intentar nuevamente, usuario no registrado");
            window.location = "../index.php";
        </script>
    '; 
    }

    mysqli_close($conexion);

?>