<?php

    include 'conexion.php';

    $Email = $_POST['Email'];
    $Contrasena = $_POST['Contrasena'];

    $validar_login = mysqli_query($conexion, "SELECT * FROM administradores WHERE Email='$Email' and Contrasena='$Contrasena'");

    if(mysqli_num_rows($validar_login) > 0)
    {
        header("location: http://localhost/proyecto_integrador_2-feature-Eusebio/Interfases.php/interfaceAdmin.php");
        exit;
    }
    else
    {
        echo'
            <script>
                alert("Usuario no existe, por favor verificar datos introducidos");
                window.location = "/inicioSesion.php";
            </script>
        ';
        exit;
    }
    
?>

