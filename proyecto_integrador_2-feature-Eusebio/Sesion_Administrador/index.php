<?php
/*
    session_start();

    if(!isset($_SESSION['usuario']))
    {
        header("location: bienvenida.php");
    }
*/
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Impoportamos la libreria Normalize----------------->
    <link rel="preload" href="styles/normalize.css" as="style">
    <link rel="stylesheet" href="styles/normalize.css">
    <!--Termina normalize---------------------------------->
    <!--Importamos los styles------------------------------>
    <link rel="preload" href="../InicioSesion/assets/css/estilos.css" as="style">
    <link  href="../InicioSesion/assets/css/estilos.css" rel="stylesheet">
    <!----Termina los styles------------------------------->
    <!--Tipografias google fonts--------------------------->
    <!--Primer tipografia-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <!--primera tipografia-->
    <!--Segunda tipografia-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
    <!--Fin de tipografias google fonts------------------->
    <!--Tercera tipografia---------------------------------->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anta&display=swap" rel="stylesheet">
    <!--Fin de tercera tipografia---------------------------->
    <!----------------------------------------------------->

    <title>Document</title>
</head>
<body class="fondo-body">
      <section class="imagen-fondo">
         <!--Inicio de titulo-------------------------->
         <h1 class="titulo">Vital Fit Life</h1>
         <!--fin de titulo----------------------------->
         <!--Inicio de sesion------------------------------------->  
         <section class="cuadro-inicioSesion">
            <!--Incio de form------------------------------------------------------------------------------------------------>
            <div class="wrapper">
               <div class="card-switch">
                  <label class="switch">
                     <!-- <input type="checkbox" class="toggle"> -->
                     <!-- <span class="slider"></span> -->
                     <!-- <span class="card-side"></span> -->
                     <div class="flip-card__inner">
                        <div class="flip-card__front">
                           <div class="title">Inicia Sesion</div>
                           <form class="flip-card__form" action="php/api_login_usuario.php" method="POST">
                              <input class="flip-card__input" name="Email" placeholder="Email" type="Email">
                              <input class="flip-card__input" name="Contrasena" placeholder="contraseña" type="contrasena">
                              <button class="flip-card__btn">Iniciar Sesion</button>
                           </form>
                        </div>
                        <!--
                        <div class="flip-card__back">
                           <div class="title">Crea una cuenta</div>
                           <form class="flip-card__form" action="php/api_registro_usuario.php" method="POST">
                              <input class="flip-card__input" name="Nombre" placeholder="Nombre" type="Nombre">
                              <input class="flip-card__input" name="Email" placeholder="Email" type="Email">
                              <input class="flip-card__input" name="Usuario" placeholder="Usuario" type="Usuario">
                              <input class="flip-card__input" name="Contrasena" placeholder="Contrasena" type="Contrasena">
                              <button class="flip-card__btn">Confirmar!</button>
                           </form>
                        </div>
                        -->  
                     </div>
                  </label>
               </div>   
            </div>
            <!--Fin de form---------------------------------------------------------------------------------------------------->
         </section>
            <!--Fin de inicio de sesion------------------------------>
         </section> 
      </body>
      </html>