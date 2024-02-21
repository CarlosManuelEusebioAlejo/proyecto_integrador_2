-- Creación de la base de datos
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
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabla de registros de los usuarios';


-- Administradores --
DROP TABLE IF EXISTS `blog_web`.`administradores`;
CREATE TABLE IF NOT EXISTS `blog_web`.`administradores` (
    `IdAdministrador`   SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id del administrador',
    `Nombre`            VARCHAR(60)      NOT NULL COMMENT 'Nombre del administrador',
    `Email`             VARCHAR(50)      NOT NULL COMMENT 'Email del administrador',
    `administrador`     VARCHAR(30)      NOT NULL COMMENT 'administrador', 
    `Contrasena`        VARCHAR(15)      NOT NULL COMMENT 'Contrasena de los Administradores',
    PRIMARY KEY (`IdAdministrador`)
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabla de registros de los administradores';


-- imagenes --
DROP TABLE IF EXISTS `blog_web`.`imagenes`;
CREATE TABLE IF NOT EXISTS `blog_web`.`imagenes` (
    `id`            SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'Id de la imagen',
    `titulo`        VARCHAR(100)      NOT NULL                            COMMENT 'Titulo de la imagen',
    `descripcion`   TEXT                                                  COMMENT 'Descripcion de la imagen',
    `imagen`        MEDIUMBLOB NOT NULL                                   COMMENT 'imagen',
    `FechaRegistro` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha y hora de creación del registro'
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8mb4 COLLATE=utf8mb4_unicode_ci  COMMENT='Tabla de registros de las imagenes';



