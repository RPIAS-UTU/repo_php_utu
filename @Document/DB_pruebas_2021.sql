-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-07-2021 a las 20:50:24
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebas_2021`
--
DROP DATABASE IF EXISTS `pruebas_2021`;
CREATE DATABASE IF NOT EXISTS `pruebas_2021` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pruebas_2021`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `sp_agregar_persona`$$
CREATE PROCEDURE `sp_agregar_persona` 
(
  IN `ci` INT, 
  IN `n1` VARCHAR(50), 
IN `n2` VARCHAR(50), IN `a1` VARCHAR(50), 
IN `a2` VARCHAR(50), IN `fnac` 
VARCHAR(10), 

INOUT `id_ingresado` INT

)  

BEGIN 

INSERT INTO persona (
    cedula, 
    primer_nombre, 
    segundo_nombre, 
    primer_apellido, 
    segundo_apellido, 
    fecha_nac
) VALUES (
    ci, 
    n1, 
    n2, 
    a1, 
    a2, 
    fnac
);

SELECT @@identity INTO id_ingresado;
END$$

DROP PROCEDURE IF EXISTS `sp_obtener_personas`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_obtener_personas` ()  BEGIN 
-- Dentro del SP el Delimitador sguirá siendo (;) 
 SELECT 
 P.cedula 
,CONCAT(P.primer_nombre, " ", P.primer_apellido ) AS nombre
FROM persona AS P;

END$$

DROP PROCEDURE IF EXISTS `sp_obtener_persona_por_cedula`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_obtener_persona_por_cedula` (`ci` INT)  BEGIN 
-- Dentro del SP el Delimitador sguirá siendo (;) 
 SELECT 
 P.cedula 
,CONCAT(P.primer_nombre, " ", P.primer_apellido ) AS nombre
FROM persona AS P
WHERE cedula = ci;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

DROP TABLE IF EXISTS `empleado`;
CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `sueldo_base` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `id_persona`, `sueldo_base`) VALUES
(1, 1, '53548.54'),
(2, 2, '53548.54'),
(3, 3, '53548.54'),
(4, 4, '53548.54'),
(5, 5, '53548.54'),
(6, 6, '53548.54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornalero`
--

DROP TABLE IF EXISTS `jornalero`;
CREATE TABLE `jornalero` (
  `id_jornalero` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `especialidad` varchar(50) DEFAULT NULL,
  `horas_extras` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jornalero`
--

INSERT INTO `jornalero` (`id_jornalero`, `id_empleado`, `especialidad`, `horas_extras`) VALUES
(1, 1, 'Cañero', 20),
(2, 2, 'Tratorista', 22),
(3, 3, 'Monteador', 25),
(4, 4, 'Peon', 36),
(5, 5, 'Barrendero', 27),
(6, 6, 'Chofer', 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL,
  `cedula` int(11) NOT NULL,
  `primer_nombre` varchar(120) NOT NULL,
  `segundo_nombre` varchar(120) DEFAULT NULL,
  `primer_apellido` varchar(120) NOT NULL,
  `segundo_apellido` varchar(120) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `cedula`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `fecha_nac`) VALUES
(1, 5422312, 'Pedro', 'Jose', 'Pedrosa', 'Joseosa', '1975-11-03'),
(2, 4212312, 'Maria', 'Jose', 'Gonzales', 'Pedrosa', '1990-01-12'),
(3, 1233421, 'Mario', 'Alvaro', 'Lopes', 'Martinez', '1999-02-15'),
(4, 1123223, 'Hector', 'Mateo', 'Gonzalez', '', '2002-01-03'),
(5, 1124567, 'Richard', 'Jose', 'Perez', 'Galeano', '1993-11-04'),
(6, 2342345, 'Nubel', 'Mario', 'Sisneros', 'Ramirez', '1977-08-03'),
(7, 19259122, 'Franco', 'Joaquín', 'Machado', 'Rosales', '2000-04-24'),
(8, 19245911, 'R2', 'E2', 'P2', 'R2', '1975-11-03'),
(9, 19245911, 'R2', 'E2', 'P2', 'R2', '1975-11-03'),
(10, 19245911, 'R2', 'E2', 'P2', 'R2', '1975-11-03'),
(11, 19245911, 'R2', 'E2', 'P2', 'R2', '1975-11-03'),
(12, 19245911, 'R2', 'E2', 'P2', 'R2', '1975-11-03'),
(13, 19245911, 'R2', 'E2', 'P2', 'R2', '1975-11-03'),
(14, 19245911, 'R2', 'E2', 'P2', 'R2', '1975-11-03'),
(15, 19245911, 'R2', 'E2', 'P2', 'R2', '1975-11-03'),
(16, 19245911, 'R2', 'E2', 'P2', 'R2', '1975-11-03'),
(17, 19245911, 'R2', 'E2', 'P2', 'R2', '1975-11-03'),
(18, 19245911, 'R2', 'E2', 'P2', 'R2', '1975-11-03'),
(19, 19245911, 'R2', 'E2', 'P2', 'R2', '1975-11-03'),
(20, 19259122, 'Juan', 'Manuel', 'Perez', 'Rodriguez', '2006-05-02'),
(21, 19259122, 'Juan', 'Manuel', 'Perez', 'Rodriguez', '2006-05-02'),
(22, 19245911, 'R2', 'E2', 'P2', 'R2', '1975-11-03'),
(23, 19245911, 'R2', 'E2', 'P2', 'R2', '1975-11-03'),
(24, 19245911, 'R2', 'E2', 'P2', 'R2', '1975-11-03'),
(25, 19245911, 'R2', 'E2', 'P2', 'R2', '1975-11-03'),
(26, 19245911, 'R2', 'E2', 'P2', 'R2', '1975-11-03'),
(27, 19245911, 'R', 'E', 'P', 'R', '1975-11-03'),
(28, 19245911, 'R', 'E', 'P', 'R', '1975-11-03'),
(29, 19245911, 'R', 'E', 'P', 'R', '1975-11-03'),
(30, 19245911, 'R', 'E', 'P', 'R', '1975-11-03'),
(31, 19245911, 'R', 'E', 'P', 'R', '1975-11-03');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `FK_persona_empleados` (`id_persona`);

--
-- Indices de la tabla `jornalero`
--
ALTER TABLE `jornalero`
  ADD PRIMARY KEY (`id_jornalero`),
  ADD KEY `FK_empleados_jornalero` (`id_empleado`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `jornalero`
--
ALTER TABLE `jornalero`
  MODIFY `id_jornalero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `FK_persona_empleados` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`);

--
-- Filtros para la tabla `jornalero`
--
ALTER TABLE `jornalero`
  ADD CONSTRAINT `FK_empleados_jornalero` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
