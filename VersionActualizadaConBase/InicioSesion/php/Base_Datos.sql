-- Creación de la base de datos
SHOW DATABASE;
DROP DATABASE IF EXISTS `blog_web`;
CREATE DATABASE IF NOT EXISTS `blog_web` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `blog_web`;

-- Administradores --
DROP TABLE IF EXISTS `blog_web`.`administradores`;
CREATE TABLE IF NOT EXISTS `blog_web`.`administradores` (
    `IdAdministrador`   SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id del administrador',
    `Nombre`            VARCHAR(60)      NOT NULL COMMENT 'Nombre del administrador',
    `Email`             VARCHAR(50)      NOT NULL COMMENT 'Email del administrador',
    `Usuario`           VARCHAR(30)      NOT NULL COMMENT 'administrador', 
    `Contrasena`        VARCHAR(15)      NOT NULL COMMENT 'Contrasena de los Administradores',
    `FechaRegistro`     datetime         NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha y hora de creación del registro',
    PRIMARY KEY (`IdAdministrador`)
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabla de registros de los administradores';

--Insertar base de datos administradores--
INSERT INTO `administradores` (`Nombre`                     , `Email`            , `Usuario      `, `Contrasena`) VALUES
                              ('Carlos Manuel Eusebio Alejo', 'ceusebio0@ucol.mx', 'ManuelEusebio', 123456789   ); 