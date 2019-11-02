-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2019 a las 22:01:26
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectotdg`
--
CREATE DATABASE IF NOT EXISTS `proyectotdg` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `proyectotdg`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesorias`
--

CREATE TABLE `asesorias` (
  `id` varchar(20) NOT NULL,
  `idProyecto` varchar(20) NOT NULL,
  `idPersona` varchar(20) DEFAULT NULL,
  `fecha` date NOT NULL,
  `asesoria` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cofinanciador`
--

CREATE TABLE `cofinanciador` (
  `id` varchar(20) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos_proyecto`
--

CREATE TABLE `documentos_proyecto` (
  `idDocumento` varchar(20) NOT NULL,
  `idProyecto` varchar(20) NOT NULL,
  `fecha` date DEFAULT NULL,
  `enlace` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id_persona` varchar(20) NOT NULL,
  `id_estudiante` varchar(20) NOT NULL,
  `promedio` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` varchar(20) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tipo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` varchar(20) NOT NULL,
  `idProyecto` varchar(20) NOT NULL,
  `fecha` date DEFAULT NULL,
  `categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `idProyecto`, `fecha`, `categoria`) VALUES
('123', '3244', '2019-09-17', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `fechaInsc` datetime NOT NULL,
  `fechaIni` date DEFAULT NULL,
  `fechaFin` date DEFAULT NULL,
  `cofinanciado` int(3) NOT NULL,
  `presupuesto` float DEFAULT NULL,
  `porcCofinanciado` float DEFAULT NULL,
  `estado` varchar(20) NOT NULL,
  `observaciones` text DEFAULT NULL,
  `tipoProyecto` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id`, `titulo`, `fechaInsc`, `fechaIni`, `fechaFin`, `cofinanciado`, `presupuesto`, `porcCofinanciado`, `estado`, `observaciones`, `tipoProyecto`) VALUES
(12345, 'Residencia Horizontal', '2019-10-06 19:00:17', '2019-10-06', '2019-10-07', 444, 12000400, 34, 'Aval', 'sdasd', 'uni'),
(10000222, 'press f to pay respects', '2020-02-06 23:00:17', '0000-00-00', '0000-00-00', 444, 12000400, 34, 'Aval', 'sdasd', 'uni');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto_financiado`
--

CREATE TABLE `proyecto_financiado` (
  `idProyecto` varchar(20) NOT NULL,
  `idFinanciador` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `porcentaje` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto_persona`
--

CREATE TABLE `proyecto_persona` (
  `idPersona` varchar(20) NOT NULL,
  `idProyecto` int(11) NOT NULL,
  `rol` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_sesion`
--

CREATE TABLE `usuario_sesion` (
  `id_persona` varchar(20) NOT NULL,
  `privilegios` varchar(20) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asesorias`
--
ALTER TABLE `asesorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cofinanciador`
--
ALTER TABLE `cofinanciador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `documentos_proyecto`
--
ALTER TABLE `documentos_proyecto`
  ADD PRIMARY KEY (`idDocumento`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id_persona`,`id_estudiante`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proyecto_persona`
--
ALTER TABLE `proyecto_persona`
  ADD PRIMARY KEY (`idPersona`,`idProyecto`);

--
-- Indices de la tabla `usuario_sesion`
--
ALTER TABLE `usuario_sesion`
  ADD PRIMARY KEY (`id_persona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
