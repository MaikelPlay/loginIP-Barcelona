-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2024 a las 19:59:37
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `penas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conteo_errores`
--

CREATE TABLE `conteo_errores` (
  `id` int(11) NOT NULL,
  `ip` varchar(45) NOT NULL,
  `intentos` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `conteo_errores`
--

INSERT INTO `conteo_errores` (`id`, `ip`, `intentos`) VALUES
(1, '::1', 13),
(2, '127.0.0.1', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `errores`
--

CREATE TABLE `errores` (
  `id` int(11) NOT NULL,
  `ip` varchar(45) NOT NULL,
  `fecha` datetime NOT NULL,
  `loc` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `errores`
--

INSERT INTO `errores` (`id`, `ip`, `fecha`, `loc`) VALUES
(1, '::1', '2024-11-26 19:02:04', 'Desconocida'),
(2, '::1', '2024-11-26 19:02:29', 'Desconocida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ippenas`
--

CREATE TABLE `ippenas` (
  `IP` varchar(10) NOT NULL,
  `LOC` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ippenas`
--

INSERT INTO `ippenas` (`IP`, `LOC`) VALUES
('127.0.0.1', 'Localhost');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `conteo_errores`
--
ALTER TABLE `conteo_errores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `errores`
--
ALTER TABLE `errores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ippenas`
--
ALTER TABLE `ippenas`
  ADD PRIMARY KEY (`IP`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `conteo_errores`
--
ALTER TABLE `conteo_errores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `errores`
--
ALTER TABLE `errores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
