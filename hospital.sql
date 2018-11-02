-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-11-2018 a las 02:52:11
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hospital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedades`
--

CREATE TABLE `enfermedades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `enfermedades`
--

INSERT INTO `enfermedades` (`id`, `nombre`) VALUES
(1, 'VIH'),
(2, 'ALERGIA'),
(3, 'MIGRANA'),
(4, 'Enfermedad General'),
(5, 'enferemdad'),
(6, 'diarrea'),
(7, 'enferemdaddfdfg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listadoeps`
--

CREATE TABLE `listadoeps` (
  `Id` int(11) NOT NULL,
  `Eps` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `listadoeps`
--

INSERT INTO `listadoeps` (`Id`, `Eps`) VALUES
(1, 'SURA'),
(2, 'COOMEVA'),
(3, 'MEDIMAS'),
(4, 'SALUD TOTAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `identificacion` int(11) NOT NULL,
  `tipoidentificacion` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `fechanacimiento` date NOT NULL,
  `eps` int(11) NOT NULL,
  `tiposangre` int(11) NOT NULL,
  `enfermedaprevia1` int(11) NOT NULL,
  `enfermedaprevia2` int(11) NOT NULL,
  `enfermedaprevia3` int(11) NOT NULL,
  `observaciones` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `identificacion`, `tipoidentificacion`, `nombres`, `apellidos`, `telefono`, `fechanacimiento`, `eps`, `tiposangre`, `enfermedaprevia1`, `enfermedaprevia2`, `enfermedaprevia3`, `observaciones`) VALUES
(2, 151515, 2, 'JULIANA', 'MONTOYA', '3016562552', '1987-10-11', 1, 2, 4, 3, 4, 'Ninguna'),
(3, 15151502, 4, 'Andres Julian', 'Pamplona tobon', '15115', '2000-09-06', 3, 2, 3, 4, 4, 'Paciente Remitido'),
(4, 2147483647, 2, 'Juan', 'Castrillon', '31423262', '1987-05-12', 3, 4, 4, 3, 4, ''),
(5, 1251515, 1, 'juan', 'juan', '31254688', '1989-01-01', 3, 1, 5, 5, 5, 'sdfsf'),
(6, 221521051, 2, 'juan', 'juan roemro', '62626262', '1997-06-08', 3, 9, 5, 7, 5, 'sdfsdfsd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposdesangre`
--

CREATE TABLE `tiposdesangre` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tiposdesangre`
--

INSERT INTO `tiposdesangre` (`id`, `nombre`) VALUES
(1, 'B+'),
(2, 'B-'),
(3, 'O+'),
(4, 'O-'),
(5, 'dfsdfsdf'),
(6, 'dsdg'),
(7, 'tttt'),
(8, 'enferemdadyttyt'),
(9, 'cxcxcxcx'),
(10, 'enferemdadyttyt');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposidentificacion`
--

CREATE TABLE `tiposidentificacion` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tiposidentificacion`
--

INSERT INTO `tiposidentificacion` (`id`, `Nombre`) VALUES
(1, 'CC'),
(2, 'CE'),
(3, 'TI'),
(4, 'PA');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `enfermedades`
--
ALTER TABLE `enfermedades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `listadoeps`
--
ALTER TABLE `listadoeps`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tiposdesangre`
--
ALTER TABLE `tiposdesangre`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `tiposidentificacion`
--
ALTER TABLE `tiposidentificacion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `enfermedades`
--
ALTER TABLE `enfermedades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `listadoeps`
--
ALTER TABLE `listadoeps`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tiposdesangre`
--
ALTER TABLE `tiposdesangre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tiposidentificacion`
--
ALTER TABLE `tiposidentificacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
