-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-03-2022 a las 21:29:58
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilios`
--

CREATE TABLE `domicilios` (
  `id_domicilio` int(15) NOT NULL,
  `fk_persona` int(15) NOT NULL,
  `localidad` varchar(50) NOT NULL,
  `colonia` varchar(50) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `numInterior` int(20) DEFAULT NULL,
  `numExterior` int(20) NOT NULL,
  `codigoPostal` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `domicilios`
--

INSERT INTO `domicilios` (`id_domicilio`, `fk_persona`, `localidad`, `colonia`, `calle`, `numInterior`, `numExterior`, `codigoPostal`) VALUES
(2, 28, 'Centro', 'La pedregoza', 'Joel Montes Camarena', 660, 665, '287000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id_estado` int(15) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id_estado`, `nombre`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id_horario` int(11) NOT NULL,
  `fk_persona` int(11) NOT NULL,
  `entrada` time NOT NULL,
  `salida` time NOT NULL,
  `diaDescanso` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id_horario`, `fk_persona`, `entrada`, `salida`, `diaDescanso`) VALUES
(11, 28, '02:45:00', '02:45:00', 'Martes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(12) NOT NULL,
  `fk_tipoUsuario` int(12) NOT NULL,
  `fk_estado` int(12) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `apellidoPaterno` varchar(20) NOT NULL,
  `apellidoMaterno` varchar(20) NOT NULL,
  `genero` varchar(35) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telefono1` varchar(50) NOT NULL,
  `telefono2` varchar(50) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `CURP` varchar(20) DEFAULT NULL,
  `RFC` varchar(20) DEFAULT NULL,
  `numSeguro` int(20) DEFAULT NULL,
  `salario` int(20) DEFAULT NULL,
  `estadoCivil` varchar(25) DEFAULT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  `tipoSangre` varchar(15) DEFAULT NULL,
  `areaTrabajo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `fk_tipoUsuario`, `fk_estado`, `nombres`, `apellidoPaterno`, `apellidoMaterno`, `genero`, `fechaNacimiento`, `email`, `usuario`, `password`, `telefono1`, `telefono2`, `foto`, `CURP`, `RFC`, `numSeguro`, `salario`, `estadoCivil`, `fechaRegistro`, `tipoSangre`, `areaTrabajo`) VALUES
(6, 1, 1, 'Salvador', 'Morfín', 'García', 'Masculino', '2000-02-08', 'salvador@gmail.com', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '3142167898', '13', 'foto.png', 'SAVL10034567', 'SMG1005678', 104567, 1000, 'Soltero', '2022-03-28 07:20:38', 'B+', 'Gerencia'),
(8, 1, 2, 'Luz ', 'Campo', 'Fajard', 'Masculino', '2022-03-04', 'luzcamposs@gmail.com', 'luzcams', 'f4e6bd295c831f2c7540d12cbf6f6ccd5906b948', '314218469', '314218469', '', 'CAFL20260', 'CAFJ20260', 10260, 2500, 'Soltera', '2022-03-28 08:34:41', 'A-', 'Cocina'),
(28, 1, 1, 'Jesús Ezequiel', 'Contreras', 'Ochoa', 'Indefinido', '1998-11-14', 'ezequielco@gmail.com', 'eze', 'eb6a2f962bb597f98b2c2b9c4698da19710ddfa3', '3142187878', '345676545', '55 Cortes de Cabelo Curto para Homens.png', 'EZECON06109', 'EZECON06109', 12345, 1500, 'Soltero', '2022-03-28 09:33:04', 'O+', 'Gerencia'),
(30, 2, 1, 'Nadya Laura', 'Campos', 'Fajardo', 'Femenino', '2022-03-02', 'nadya@gmail.com', 'nadya', '05cfb17b1fdd9c04f1d259eacec250a63b211222', '31421789898', '3142224567', 'nadya.jpg', NULL, NULL, NULL, NULL, NULL, '2022-03-29 10:27:32', NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservaciones`
--

CREATE TABLE `reservaciones` (
  `id_reservacion` int(20) NOT NULL,
  `fk_persona` int(20) NOT NULL,
  `nombreCliente` varchar(50) NOT NULL,
  `numPersonas` int(20) NOT NULL,
  `dia` date NOT NULL,
  `hora` time NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservaciones`
--

INSERT INTO `reservaciones` (`id_reservacion`, `fk_persona`, `nombreCliente`, `numPersonas`, `dia`, `hora`, `telefono`, `fechaRegistro`) VALUES
(4, 6, 'Génesis Jocelyn Álvarez Campos', 3, '2022-03-30', '15:30:00', '3141318609', '2022-03-29 19:27:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE `sesiones` (
  `id_sesion` int(14) NOT NULL,
  `fk_persona` int(14) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `motivo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sesiones`
--

INSERT INTO `sesiones` (`id_sesion`, `fk_persona`, `fecha`, `motivo`) VALUES
(16, 6, '2022-03-28 07:20:46', 'Entrada'),
(17, 6, '2022-03-28 22:44:47', 'Entrada'),
(18, 6, '2022-03-28 23:30:14', 'Salida'),
(19, 6, '2022-03-28 23:30:36', 'Entrada'),
(20, 6, '2022-03-29 01:21:42', 'Salida'),
(21, 6, '2022-03-29 01:21:51', 'Entrada'),
(22, 6, '2022-03-29 07:56:31', 'Entrada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuarios`
--

CREATE TABLE `tipousuarios` (
  `id_tipoUsuario` int(15) NOT NULL,
  `tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipousuarios`
--

INSERT INTO `tipousuarios` (`id_tipoUsuario`, `tipo`) VALUES
(1, 'Administrador'),
(2, 'Cliente'),
(3, 'Mesero'),
(4, 'Capitán de meseros'),
(5, 'Cajero');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `domicilios`
--
ALTER TABLE `domicilios`
  ADD PRIMARY KEY (`id_domicilio`),
  ADD KEY `fk_persona` (`fk_persona`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id_horario`),
  ADD KEY `fk_persona` (`fk_persona`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `fk_tipoUsuario` (`fk_tipoUsuario`),
  ADD KEY `fk_estado` (`fk_estado`);

--
-- Indices de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD PRIMARY KEY (`id_reservacion`),
  ADD KEY `fk_persona` (`fk_persona`);

--
-- Indices de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD PRIMARY KEY (`id_sesion`),
  ADD KEY `fk_persona` (`fk_persona`);

--
-- Indices de la tabla `tipousuarios`
--
ALTER TABLE `tipousuarios`
  ADD PRIMARY KEY (`id_tipoUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `domicilios`
--
ALTER TABLE `domicilios`
  MODIFY `id_domicilio` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id_estado` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  MODIFY `id_reservacion` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  MODIFY `id_sesion` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `tipousuarios`
--
ALTER TABLE `tipousuarios`
  MODIFY `id_tipoUsuario` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `domicilios`
--
ALTER TABLE `domicilios`
  ADD CONSTRAINT `domicilios_ibfk_1` FOREIGN KEY (`fk_persona`) REFERENCES `personas` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_ibfk_1` FOREIGN KEY (`fk_persona`) REFERENCES `personas` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_ibfk_1` FOREIGN KEY (`fk_tipoUsuario`) REFERENCES `tipousuarios` (`id_tipoUsuario`),
  ADD CONSTRAINT `personas_ibfk_2` FOREIGN KEY (`fk_estado`) REFERENCES `estados` (`id_estado`);

--
-- Filtros para la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD CONSTRAINT `reservaciones_ibfk_1` FOREIGN KEY (`fk_persona`) REFERENCES `personas` (`id_persona`);

--
-- Filtros para la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD CONSTRAINT `sesiones_ibfk_1` FOREIGN KEY (`fk_persona`) REFERENCES `personas` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
