DROP DATABASE IF EXISTS `pruebas_2021`;
CREATE DATABASE IF NOT EXISTS `pruebas_2021` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pruebas_2021`;

CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT primary key,
  `cedula` int(11) NOT NULL,
  `primer_nombre` varchar(120) NOT NULL,
  `segundo_nombre` varchar(120),
  `primer_apellido` varchar(120) NOT NULL,
  `segundo_apellido` varchar(120),
  `fecha_nac` date
);

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT primary key,
  `id_persona` int(11) NOT NULL,
  `sueldo_base` decimal(10,2) NOT NULL
 );

CREATE TABLE `jornalero` (
  `id_jornalero` int(11) NOT NULL AUTO_INCREMENT primary key,
  `id_empleado` int(11) NOT NULL,
  `especialidad` varchar(50) DEFAULT NULL,
  `horas_extras` int(11) NOT NULL
 );

ALTER TABLE `empleado`
    ADD CONSTRAINT `FK_persona_empleados` FOREIGN KEY (`id_persona`) 
    REFERENCES `persona` (`id_persona`);

ALTER TABLE `jornalero`
    ADD CONSTRAINT `FK_empleados_jornalero` FOREIGN KEY (`id_empleado`) 
    REFERENCES `empleado` (`id_empleado`);
	   
ALTER TABLE `empleado` AUTO_INCREMENT = 1;
       
INSERT INTO `persona` (cedula, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, fecha_nac) VALUES
(5422312, 'Pedro', 'Jose', 'Pedrosa', 'Joseosa', '19751103'),
(4212312, 'Maria', 'Jose', 'Gonzales', 'Pedrosa',  '19900112'),
(1233421, 'Mario', 'Alvaro', 'Lopes', 'Martinez',  '19990215'),
(1123223, 'Hector', 'Mateo', 'Gonzalez', '',  '20020103'),
(1124567, 'Richard', 'Jose', 'Perez', 'Galeano',  '19931104'),
(2342345, 'Nubel', 'Mario', 'Sisneros', 'Ramirez',  '19770803');

INSERT INTO `empleado` (`id_persona`,  `sueldo_base`) VALUES 
(1, 53548.54),
(2, 53548.54),
(3, 53548.54),
(4, 53548.54),
(5, 53548.54),
(6, 53548.54);

ALTER TABLE `jornalero` AUTO_INCREMENT = 1;

INSERT INTO `jornalero` ( `id_empleado`, `especialidad`, `horas_extras`) VALUES
(1, 'Cañero', 20),
(2, 'Tratorista', 22),
(3, 'Monteador', 25),
(4, 'Peon', 36),
(5, 'Barrendero', 27),
(6, 'Chofer', 32);