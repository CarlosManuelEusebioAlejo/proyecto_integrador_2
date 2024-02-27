-- Creación de la base de datos
SHOW DATABASE;
DROP DATABASE IF EXISTS `blog_web`;
CREATE DATABASE IF NOT EXISTS `blog_web` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `blog_web`;
SET default_storage_engine = INNODB;


-- usuarios --
DROP TABLE IF EXISTS `blog_web`.`usuarios`;
CREATE TABLE IF NOT EXISTS `blog_web`.`usuarios` (
    `IdUsuario`    smallint UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'Id del usuario',
    `Nombre`       varchar(60)       NOT NULL COMMENT 'Nombre del usuario',
    `Email`        varchar(50)       NOT NULL COMMENT 'Email del usuario',
    `Usuario`      varchar(30)       NOT NULL COMMENT 'Usuario',
    `Contrasena`   varchar(15)       NOT NULL COMMENT 'Contrasena de los usuarios'
    `FechaRegistro` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha y hora de creación del registro'
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabla de registros de los usuarios';

--Insertar base de datos usuario--
INSERT INTO `usuarios` (`IdUsuario`, `Nombre`                     , `Email`            , `Usuario`      , `Contrasena`, `FechaRegistro`) VALUES
                       (1          , 'Carlos Manuel Eusebio Alejo', 'ceusebio0@ucol.mx', 'ManuelEusebio', 123456789, '2024-02-22 1:18:10');


-- Administradores --
DROP TABLE IF EXISTS `blog_web`.`administradores`;
CREATE TABLE IF NOT EXISTS `blog_web`.`administradores` (
    `IdAdministrador`   SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id del administrador',
    `Nombre`            VARCHAR(60)      NOT NULL COMMENT 'Nombre del administrador',
    `Email`             VARCHAR(50)      NOT NULL COMMENT 'Email del administrador',
    `administrador`     VARCHAR(30)      NOT NULL COMMENT 'administrador', 
    `Contrasena`        VARCHAR(15)      NOT NULL COMMENT 'Contrasena de los Administradores',
    `FechaRegistro` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha y hora de creación del registro',
    PRIMARY KEY (`IdAdministrador`)
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabla de registros de los administradores';

--Insertar base de datos administradores--
INSERT INTO `administradores` (`IdAdministrador`, `Nombre`                     , `Email`            , `Administrador`, `Contrasena`, `FechaRegistro`) VALUES
                              (1                , 'Carlos Manuel Eusebio Alejo', 'ceusebio0@ucol.mx', 'ManuelEusebio', 123456789   , '2024-02-22 1:18:10');


-- imagenes --
DROP TABLE IF EXISTS `blog_web`.`imagenes`;
CREATE TABLE IF NOT EXISTS `blog_web`.`imagenes` (
    `idImagen`            SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'Id de la imagen',
    `titulo`        VARCHAR(100)      NOT NULL                            COMMENT 'Titulo de la imagen',
    `descripcion`   TEXT                                                  COMMENT 'Descripcion de la imagen',
    `imagen`        MEDIUMBLOB NOT NULL                                   COMMENT 'imagen',
    `FechaRegistro` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha y hora de creación del registro'
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8mb4 COLLATE=utf8mb4_unicode_ci  COMMENT='Tabla de registros de las imagenes';

--Insertar base de datos administradores--
INSERT INTO `imagenes` (`idImagen`, `titulo`                     , `Email`            , `Administrador`, `Contrasena`, `FechaRegistro`) VALUES
                       (1         , 'Fulanito de tal'            , 'ceusebio0@ucol.mx', 'ManuelEusebio', 123456789   , '2024-02-22 1:18:10');


-- publicaciones --
DROP TABLE IF EXISTS `blog_web`.`publicaciones`;
CREATE TABLE IF NOT EXISTS `blog_web`.`publicaciones` (
    `id`            SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'Id de la publicación',
    `publicación`        VARCHAR(100)      NOT NULL                            COMMENT 'publicación'
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8mb4 COLLATE=utf8mb4_unicode_ci  COMMENT='Tabla de registros de las publicaciones';

-- autores --
DROP TABLE IF EXISTS `blog_web`.`autores`;
CREATE TABLE IF NOT EXISTS `blog_web`.`autores` (
    `id`            SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'Id del autor',
    `publicación`        VARCHAR(100)      NOT NULL                            COMMENT 'Nombre del autor',
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8mb4 COLLATE=utf8mb4_unicode_ci  COMMENT='Tabla de registros de los autores';

-- fechas -- 
DROP TABLE IF EXISTS `blog_web`.`fechas`;
CREATE TABLE IF NOT EXISTS `blog_web`.`fechas` (
    `FechaRegistro` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha y hora de creación del registro'
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8mb4 COLLATE=utf8mb4_unicode_ci  COMMENT='Tabla de registros de las fechas';

-- títulos --
DROP TABLE IF EXISTS `blog_web`.`fechas`;
CREATE TABLE IF NOT EXISTS `blog_web`.`fechas` (
    `titulo`        VARCHAR(100)      NOT NULL                            COMMENT 'titulo'
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8mb4 COLLATE=utf8mb4_unicode_ci  COMMENT='Tabla de registros de los titulos';
