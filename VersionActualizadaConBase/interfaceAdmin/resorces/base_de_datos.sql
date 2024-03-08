-- Creación de la base de datos
SHOW DATABASE;
DROP DATABASE IF EXISTS `blog_web`;
CREATE DATABASE IF NOT EXISTS `blog_web` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `blog_web`;
SET default_storage_engine = INNODB;



-- publicaciones --
DROP TABLE IF EXISTS `blog_web`.`publicaciones`;
CREATE TABLE IF NOT EXISTS `blog_web`.`publicaciones` (
    `IdPublicacion`    smallint UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'Id de publicación',
    `Autor`            varchar(50)       NOT NULL COMMENT 'Autor de la publicación',
    `Titulo`           varchar(50)       NOT NULL COMMENT 'titulo de la publicación',
    `Rama`             varchar(50)       NOT NULL COMMENT 'Rama de la publicación',
    `Imagen`           LONGBLOB          NOT NULL COMMENT 'imagen de la publicación',
    `Descripcion`      TEXT              NOT NULL COMMENT 'Descripción de la publicación',
    `FechaRegistro`    date             NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación del registro'
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabla de registros de las publicaciones';







