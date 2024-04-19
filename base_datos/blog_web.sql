-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-04-2024 a las 00:39:17
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blog_web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulantes`
--

CREATE TABLE `postulantes` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `experiencia` text DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `postulantes`
--

INSERT INTO `postulantes` (`id`, `usuario`, `nombre`, `apellido`, `correo`, `telefono`, `experiencia`, `fecha_registro`, `password`) VALUES
(3, 'angle', 'lol', 'dsad', 'qdqe@ndsjwn2', '3141189354', 'soy un', '2024-04-14 20:52:46', ''),
(4, 'angeldew', 'angel', 'ewasa', 'joseangelalvarezx@gmail.com', '3141609870', 'cdwcr', '2024-04-14 20:53:34', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id` int(11) NOT NULL COMMENT 'id de la publicación',
  `titulo` varchar(200) NOT NULL COMMENT 'titulo de la publicación',
  `extracto` varchar(200) NOT NULL COMMENT 'extracto de la publicación',
  `texto` text NOT NULL COMMENT 'texto de la publicación',
  `thumb` varchar(70) NOT NULL COMMENT 'imagen de la publicación',
  `tema` varchar(50) NOT NULL COMMENT 'tema de la publicación',
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'fecha de la publicación',
  `creador` varchar(100) NOT NULL COMMENT 'creador de la publicacion',
  `status` varchar(30) NOT NULL,
  `id_usuario` int(11) NOT NULL COMMENT 'id del creador'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id`, `titulo`, `extracto`, `texto`, `thumb`, `tema`, `fecha`, `creador`, `status`, `id_usuario`) VALUES
(48, 'waza', 'faedfaenfkaem', 'fefnklanmfñak', 'R (2).jpg', 'Nutrición', '2024-04-15 00:18:25', 'mane', 'aprobado', 6),
(49, 'asnjlkdnslfcaslf', 'dfjlnaslkjfdnas', 'hola mi gente', 'R.jpg', 'Salud', '2024-04-14 01:47:27', 'angel', 'aprobado', 4),
(50, 'fdsbjfnslefh', 'bkjbjbjbljnolnjipfvv', 'snabkfjbjkfezbnjsn', 'R (2).jpg', 'Salud', '2024-04-15 00:27:47', 'mane', 'aprobado', 6),
(51, 'Hola este es un post de karla :D', 'Este es un ejemplo del extracto de Karla', 'Holaaaaaap\r\n\r\n\r\n\r\n\r\n', 'WhatsApp Image 2024-03-29 at 11.51.38 AM.jpeg', 'Nutrición', '2024-04-15 00:24:05', 'karla', 'aprobado', 0),
(53, 'cndlkjfcslkjd', 'gif', 'dsad', 'giphy.gif', 'Nutrición', '2024-04-15 00:27:47', 'angel', 'aprobado', 4),
(54, 'Kaksjskd', 'Jaksjs', 'Holaaaa', '20240309_184233.jpg', 'Salud', '2024-04-15 00:27:46', 'mane', 'aprobado', 6),
(55, '14', '14', '14', 'giphy.gif', 'Salud', '2024-04-15 00:27:46', 'angel', 'aprobado', 4),
(56, 'publi del admin', 'holaaaaaaaaaaaaaaaaaaaaaaa', 'ladmakjed', 'OIP (1).jpg', 'Nutrición', '2024-04-15 00:27:45', 'angel', 'aprobado', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tipo` enum('admin','editor','pendiente') NOT NULL,
  `nombre` varchar(60) NOT NULL COMMENT 'Nombre del usuario',
  `apellido` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL COMMENT 'Email del usuario',
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha y hora de registro',
  `telefono` bigint(10) NOT NULL,
  `experiencia` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `tipo`, `nombre`, `apellido`, `email`, `fecha_registro`, `telefono`, `experiencia`) VALUES
(4, 'angel', '123', 'admin', 'Jose Angel', 'Alvarez Carranza', 'joseangelalvarezx@gmail.com', '2024-04-12 21:09:01', 3141609870, ''),
(5, 'eusebio', '123', 'admin', 'Carlos Manuel Eusebio Alejo', '', 'eusebio@gmail.com', '2024-04-12 21:09:30', 0, ''),
(6, 'mane', '123', 'editor', 'mane', '', 'mane@gmail.com', '2024-04-12 21:10:07', 0, ''),
(9, 'karla', '123', 'editor', 'Karla Alejandra', '', 'karla@karla.com', '2024-04-13 21:24:40', 0, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `postulantes`
--
ALTER TABLE `postulantes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `usuario_2` (`usuario`),
  ADD UNIQUE KEY `usuario_3` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `postulantes`
--
ALTER TABLE `postulantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de la publicación', AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
