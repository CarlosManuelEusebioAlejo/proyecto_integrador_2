<?php

    include 'api_conexion.php';

    $Email = $_POST['Email'];
    $Contraseña = $_POST['Contrasena'];

    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE Email='$Email' and Contrasena='$Contrasena'");

    if(mysqli_num_rows($validar_login) > 0)
    {
        header("location: ../interfaceAdmin/interfaceAdmin.html");
        exit;
    }
    else
    {
        echo'
            <script>
                alert("Usuario no existe, por favor verificar datos introducidos");
                window.location = "../index.php";
            </script>
        ';
        exit;
    }
    
?>