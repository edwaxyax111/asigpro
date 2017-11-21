/*
Created: 16/11/2017
Modified: 16/11/2017
Model: MySQL 5.6
Database: MySQL 5.6
*/


-- Create tables section -------------------------------------------------

-- Table empleado

CREATE DATABASE IF NOT EXISTS dbasigpro COLLATE utf8_spanish_ci;
use dbasigpro;


CREATE TABLE `empleado`
(
  `id_empleado` Int NOT NULL AUTO_INCREMENT,
  `nombre` Varchar(60) NOT NULL,
  `fecha_nacimiento` Date NOT NULL,
  `profesion` Varchar(60) NOT NULL,
  `direccion` Varchar(120) NOT NULL,
  `telefono` Varchar(20) NOT NULL,
  `user_name` Varchar(30) NOT NULL,
  `pass` Varchar(30) NOT NULL,
  PRIMARY KEY (`id_empleado`)
)ENGINE=Innodb;

-- Table proyecto

CREATE TABLE `proyecto`
(
  `id_proyecto` Int NOT NULL AUTO_INCREMENT,
  `nombre_proyecto` Varchar(60) NOT NULL,
  `descripcion` Varchar(120) NOT NULL,
  `presupuesto` Varchar(60) NOT NULL,
  `encargado` Varchar(60) NOT NULL,
  PRIMARY KEY (`id_proyecto`)
)ENGINE=Innodb;

-- Table asignacion

CREATE TABLE `asignacion`
(
  `id_asignacion` Int NOT NULL AUTO_INCREMENT,
  `id_empleado` Int NOT NULL,
  `id_proyecto` Int NOT NULL,
  PRIMARY KEY (`id_asignacion`)
)ENGINE=Innodb;

CREATE INDEX `IX_Relationship1` ON `asignacion` (`id_empleado`)
;

CREATE INDEX `IX_Relationship2` ON `asignacion` (`id_proyecto`)
;

-- Create relationships section ------------------------------------------------- 

ALTER TABLE `asignacion` ADD CONSTRAINT `Relationship1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `asignacion` ADD CONSTRAINT `Relationship2` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

