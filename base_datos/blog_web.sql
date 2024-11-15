-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-08-2024 a las 18:29:09
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
-- Estructura de tabla para la tabla `ediciones`
--

CREATE TABLE `ediciones` (
  `id` int(11) NOT NULL COMMENT 'id de la publicacion editada',
  `titulo` varchar(200) NOT NULL COMMENT 'titulo de la publicacion editada',
  `extracto` varchar(200) NOT NULL COMMENT 'extracto de la publicacion editada',
  `texto` text NOT NULL COMMENT 'texto de la publicacion editada',
  `thumb` varchar(200) NOT NULL COMMENT 'imagen de la publicacion editada',
  `tema` varchar(70) NOT NULL COMMENT 'tema de la publicacion editada',
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'fecha en la que se modifico la publicacion',
  `creador` varchar(100) NOT NULL COMMENT 'creador de la publicacion a editar',
  `id_usuario` int(11) NOT NULL COMMENT 'id del usuario que edita'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(10) NOT NULL COMMENT 'Id de la notificación',
  `id_editor` int(10) NOT NULL COMMENT 'id del usuario',
  `id_publicacion` int(10) NOT NULL COMMENT 'id de la publicacion',
  `mensaje` varchar(200) NOT NULL COMMENT 'se añade el mensaje que indica si esta aceptada o no',
  `status` varchar(100) NOT NULL DEFAULT '''aceptado'', ''rechazado''' COMMENT 'status de la publicacion',
  `titulo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `id_editor`, `id_publicacion`, `mensaje`, `status`, `titulo`) VALUES
(1, 34, 65, 'qwertty', 'rechazado', 'publicacion de prueba'),
(2, 65, 0, 'Su publicacion ha sido rechazada', 'no visto', 'Publicacion rechazada'),
(3, 67, 0, 'Su publicacion ha sido rechazada', 'no visto', 'Publicacion rechazada');

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
  `password` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `postulantes`
--

INSERT INTO `postulantes` (`id`, `usuario`, `nombre`, `apellido`, `correo`, `telefono`, `experiencia`, `fecha_registro`, `password`, `status`) VALUES
(27, 'angel vm,ae fm', 'ven, mf ba', 'n sm,b dg', 'carranzaavelinodianakarina@gmail.com', '3142132510', 'mv a,mf v', '2024-05-20 03:55:29', '123', 'rechazado'),
(33, 'David', 'David', 'Anguiano', 'david@g.com', '0000000000', 'Editor', '2024-05-20 14:35:06', '123', 'pendiente');

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
  `id_usuario` int(11) NOT NULL COMMENT 'id del creador',
  `notificacion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id`, `titulo`, `extracto`, `texto`, `thumb`, `tema`, `fecha`, `creador`, `status`, `id_usuario`, `notificacion`) VALUES
(86, 'Los Beneficios de una Dieta Equilibrada: Guía Completa para una Alimentación Saludable', 'Descubre cómo una dieta equilibrada puede transformar tu salud y bienestar. En esta guía, te ofrecemos consejos prácticos y fáciles de seguir para mejorar tu alimentación diaria, asegurando que obteng', 'Mantener una dieta equilibrada es fundamental para asegurar el correcto funcionamiento de nuestro cuerpo y mente. Una alimentación adecuada no solo nos proporciona la energía necesaria para enfrentar nuestras actividades diarias, sino que también fortalece nuestro sistema inmunológico, mejora nuestra concentración y estado de ánimo, y reduce el riesgo de enfermedades crónicas como la diabetes, la hipertensión y las enfermedades del corazón.\n\nPara lograr una dieta equilibrada, es crucial incluir una variedad de alimentos de todos los grupos principales: frutas, verduras, proteínas, granos integrales y grasas saludables. Cada grupo de alimentos aporta nutrientes específicos que son esenciales para nuestra salud. Por ejemplo, las frutas y verduras son ricas en vitaminas, minerales y fibra; las proteínas ayudan a construir y reparar tejidos; los granos integrales proporcionan energía sostenible; y las grasas saludables son vitales para el funcionamiento del cerebro y la absorción de vitaminas.\n\nAdemás de elegir los alimentos correctos, es importante considerar la calidad y la cantidad de lo que consumimos. Optar por productos frescos y mínimamente procesados, controlar las porciones y evitar el exceso de azúcares y grasas saturadas son pasos clave para una dieta saludable.\n\nEn esta guía, te proporcionamos consejos prácticos para mejorar tu dieta diaria, incluyendo recetas fáciles, sugerencias de snacks saludables y estrategias para hacer elecciones inteligentes al comer fuera de casa. También abordamos la importancia de la hidratación y cómo mantener un equilibrio adecuado entre la ingesta de calorías y la actividad física.\n\nIncorporar estos hábitos alimenticios no solo te ayudará a sentirte mejor en el día a día, sino que también tendrá un impacto positivo a largo plazo en tu salud y bienestar. ¡Empieza hoy mismo a transformar tu alimentación y disfruta de los numerosos beneficios que una dieta equilibrada puede ofrecer!', '86.jpg', 'Nutrición', '2024-05-17 20:39:25', 'angel', 'inactivo', 4, NULL),
(87, 'HOLAAA', '1234567', 'qwerty', '87.png', 'Deporte', '2024-05-20 02:49:39', 'lol', 'pendiente', 45, NULL),
(91, 'kakakkaka', 'La nutrición es el proceso biológico que ocurre en un ser vivo cuando su organismo absor...', 'jwndqjend', '88.jpg', 'Deporte', '2024-05-20 06:36:06', 'angel123456787uyg', 'inactivo', 49, NULL),
(92, 'Reducción de trigliceridos', 'La suplementación con omega 3 es un tratamiento eficaz para reducir los niveles de triglicéridos en sangre', 'La suplementación con omega 3 es un tratamiento eficaz para reducir los niveles de triglicéridos en sangre 👨🏻‍⚕️\r\n¿Cuánto debemos de consumir al día ?🤔\r\n4 gr al día ( al menos 3gr al día de EPA+DHA)\r\n¿Como lo consigo?\r\n🐠Pescados,mariscos , nueces, semillas y aceites de plantas son alimentos ricos en omega 3.\r\n💊 Suplementación.\r\n\r\nRecuerda que la suplementación siempre debe estar acompañada de cambios en la alimentación y por supuesto, el tratamiento farmacológico brindado por tu médico.', '92.jpg', 'Nutrición', '2024-05-20 14:06:03', 'angel', 'activo', 4, NULL),
(93, 'Reducción de trigliceridos', 'La suplementación con omega 3 es un tratamiento eficaz para reducir los niveles de triglicéridos en sangre', 'Hooaaaaaa', '93.jpg', 'Deporte', '2024-05-20 14:29:47', 'lol', 'pendiente', 45, NULL),
(94, 'Sports betting', 'Nansnxjsjanajzjdnd', 'Jajsjdjckjwabaioekfnxnsns', '94.jpg', 'Deporte', '2024-05-20 14:30:53', 'Anna', 'activo', 54, 'Tu publicacion fue rechazada'),
(95, 'Pruneba de pentest', 'Esuna pueba', '<script> alert(\'No pasó l prueba\') </script>', '95.', 'Nutrición', '2024-05-20 14:32:50', 'Enrique', 'rechazado', 51, 'Tu publicacion fue rechazada'),
(96, '&lt;h1&gt;hola&lt;/h1&gt;', 'qwertyui', 'qwertyu', '96.jpeg', 'Nutrición', '2024-05-20 14:34:17', 'angel', 'activo', 4, NULL),
(97, '&lt;script&gt; alert(&#039;No pasó l prueba&#039;) &lt;/script&gt;', 'we3ed', 'dqedcac', '97.png', 'Nutrición', '2024-05-20 18:12:14', 'angel', 'activo', 4, NULL),
(98, '1', 'ewa2', '<script> alert(\'No pasó l prueba\') </script>', '98.png', 'Nutrición', '2024-05-20 18:13:22', 'angel', 'activo', 4, NULL);

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
  `experiencia` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `thumb` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `tipo`, `nombre`, `apellido`, `email`, `fecha_registro`, `telefono`, `experiencia`, `status`, `thumb`) VALUES
(4, 'angel', '123', 'admin', 'Jose Angel', 'Alvarez Carranza', 'joseangelalvarezx@gmail.com', '2024-04-12 21:09:01', 3141609870, 'Soy un reconocido doctor ', 'activo', 'default.jpg'),
(25, 'JadeMajesty', '123', 'editor', 'Jose Angel', 'Alvarez Carranza', 'joseangelalvarezx@gmail.com', '2024-04-14 19:36:20', 3141609870, 'Soy un doctor que quiere compartir sus conocimientos', 'rechazado', ''),
(27, 'ximena', '123', 'editor', 'Ximena', 'Alcaraz', 'ximena@ximena', '2024-04-14 21:50:47', 3148924589, 'sadad', 'inactivo', ''),
(28, 'angelfds', '123', 'admin', 'dnkjfn', 'fdsd', 'fsdfs@dss', '2024-04-14 21:51:13', 323122432, 'qwer', 'inactivo', ''),
(29, 'Eusebio', '123', 'editor', 'Carlos Manuel', 'Eusebio Alejo', 'ceuseio0@ucol.mx', '2024-04-15 09:24:07', 3142174550, 'todo', 'inactivo', ''),
(30, '123', '123', 'editor', 'jojoajo', 'aaaaa', 'fsdfs@dss', '2024-04-15 09:27:44', 3148924589, '-', 'inactivo', ''),
(31, 'angel1', '123', 'admin', 'qer', 'sdfg', 'sqs@xsxcs', '2024-04-15 09:28:12', 23243535, '1', 'activo', ''),
(32, 'Lolita', 'qwerty', 'editor', 'Canita', 'López perez', 'lolita@gmail.com', '2024-04-15 09:47:21', 123456678, 'Comer mucho', 'inactivo', ''),
(33, 'angeldew', '', 'editor', 'angel', 'ewasa', 'joseangelalvarezx@gmail.com', '2024-04-15 12:08:16', 3141609870, 'cdwcr', 'inactivo', ''),
(34, 'wilber', '123', 'editor', '23', 'dedea', 'cdadvd@dsafa', '2024-04-15 12:10:52', 31341421121, 'd', 'inactivo', ''),
(35, 'Fercho', '123', 'editor', 'Fercho', '..', 'vdaij@nsdjkcnva', '2024-04-17 08:24:36', 34135671289, 'hola', 'inactivo', ''),
(36, 'Derick', '1234', 'editor', 'Carlos Derick', 'López perez', 'derick@gmail.com', '2024-04-17 09:28:38', 1234123412, 'Porque quiero y puedo', 'inactivo', ''),
(37, 'kali', '123', 'editor', 'john', 'kalimán', 'j@hotmail.com', '2024-04-17 11:00:21', 1234566789900, 'profe', 'inactivo', ''),
(38, 'Wilful', '123', 'editor', 'Dariana', 'Lopéz', 'vdaij@nsdjkcnva', '2024-04-19 07:15:25', 34135671289, 'qwerty', 'inactivo', ''),
(39, 'poo', '123', 'editor', 'POo', 'hola', 'hola@hola', '2024-04-19 07:15:27', 21232413241, '.', '', ''),
(40, 'pilin', '123', 'editor', 'eso', 'pilin', 'pilin@q.com', '2024-05-14 15:42:25', 1234567896, 'pq si bot', 'inactivo', ''),
(41, 'pppp', '123', 'editor', 'Jose Angel', 'Alvarez Carranza', 'alvarezcarranzajoseangelx@gmail.com', '2024-05-14 16:31:00', 3141609870, 'qwertyu', 'inactivo', ''),
(42, 'angelfsdfr', '123', 'editor', 'dcnsjnvafkj', 'vsnrn agj', 'alvarezcarranzajoseangelx@gmail.com', '2024-05-14 16:40:38', 3141609870, 'dfwg', 'inactivo', ''),
(43, 'angeldeaesfvs', '123', 'editor', 'dsknfsaef', 'dsva snf', 'vsdd@snjdvnc', '2024-05-14 16:41:37', 123456, 'pq si', 'inactivo', ''),
(44, 'fercho123', '123', 'editor', 'Fercho', 'Lopez', 'fercho@ucol.mx', '2024-05-14 11:37:12', 3142671536, 'pq si', 'activo', ''),
(45, 'lol', '123', 'editor', 'Jose Angel', 'Alvarez Carranza', 'joseangelalvarezx@gmail.com', '2024-05-19 20:51:33', 3141609870, 'pq si', 'activo', ''),
(46, 'wazin', '123', 'editor', 'cjdncsij', 'nsjdnf', 'kjdnfkjs@kdnlda.csdo', '2024-05-19 21:39:46', 1234567, '12345678', 'activo', ''),
(47, 'JuanXX', '123', 'editor', 'Juan Carlos', 'Alvarado', 'juan@q.com', '2024-05-19 21:40:34', 1234567890, 'qwerty', 'activo', ''),
(48, 'pwpw', '123', 'editor', 'mkcmldsmd', '&lt;?php  session_start();  #se mandan a llamar los archivos de configuracion y funciones require &#', '3s73b4n1.tur@gmail.com', '2024-05-19 21:51:53', 3141609870, '234567', 'activo', ''),
(49, 'angel123456787uyg', '123', 'admin', 'Jose Angel', 'Alvarez Carranza', 'joseangelalvarezx@gmail.com', '2024-05-19 22:16:10', 3141609870, 'ksanvfj', 'activo', ''),
(50, 'angelcnsam f,', '123', 'editor', 'mc,sa dvm,', 'ns avn', 'carranzaavelinodianakarina@gmail.com', '2024-05-20 00:33:12', 3142132510, 'qwert', 'activo', ''),
(51, 'Enrique', '123456', 'editor', 'Enrique', 'Rosales', 'enrique@ucol.mx', '2024-05-20 08:25:19', 1233451234, 'Paprobar', 'activo', ''),
(52, 'Enavarro', '12345', 'editor', 'Ernesto', 'Navarro', 'ernie@hotmail.cpm', '2024-05-20 08:25:35', 33333333, 'Prueba', 'activo', ''),
(53, 'DAN', 'Green', 'editor', 'Daniel  Alfonso', 'Verde Romero', 'dagamzo@gmail.com', '2024-05-20 08:25:41', 3143311207, 'Testeo', 'activo', ''),
(54, 'Anna', 'qwert', 'editor', 'Anabel', 'Castillo', 'ana.cllamas@gmail.com', '2024-05-20 08:25:45', 3124567890, 'Porque si!', 'activo', ''),
(55, 'pedrito1', '123', 'editor', 'Jose Angel', 'Alvarez Carranza', 'joseangelalvarezx@gmail.com', '2024-05-20 08:26:57', 3141609870, 'Soy un nutriologo', 'activo', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Id de la notificación', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `postulantes`
--
ALTER TABLE `postulantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de la publicación', AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
