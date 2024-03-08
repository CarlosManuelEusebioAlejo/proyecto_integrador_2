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

--Insertar base de datos usuario--
INSERT INTO `publicaciones` (`IdPublicacion`, `autor`            , `titulo`            , `rama`        , `imagen`                                                               , `Descripcion`                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             ) VALUES
                            (6              , 'Manuel Eusebio'    ,'juan pablo'        , 'matro : mate', 'https://www.gob.mx/cms/uploads/article/main_image/17812/Nutricion.jpg', 'La salud es una condición fundamental para el desarrollo y la vida de los seres humanos. En su definición más sencilla, se puede entender como un estado de completo bienestar físico, mental y social, y no simplemente como la ausencia de enfermedad o afecciones físicas. Este concepto ampliado de salud, fue propuesto por la Organización Mundial de la Salud (OMS) en su constitución de 1948, lo que refleja la comprensión de la salud como un recurso para la vida y no solo como un objetivo de la vida.La salud es una condición fundamental para el desarrollo y la vida de los seres humanos. En su definición más sencilla, se puede entender como un estado de completo bienestar físico, mental y social, y no simplemente como la ausencia de enfermedad o afecciones físicas. Este concepto ampliado de salud, fue propuesto por la Organización Mundial de la Salud (OMS) en su constitución de 1948, lo que refleja la comprensión de la salud como un recurso para la vida y no solo como un objetivo de la vida.');






