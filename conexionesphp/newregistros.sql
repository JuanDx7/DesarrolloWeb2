-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-05-2025 a las 06:21:59
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
-- Base de datos: `usuarioslogin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `newregistros`
--

CREATE TABLE `newregistros` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `fecha_nac` date NOT NULL,
  `instrumento` varchar(50) NOT NULL,
  `fecha_insc` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `newregistros`
--

INSERT INTO `newregistros` (`id_usuario`, `nombre`, `correo`, `contrasena`, `fecha_nac`, `instrumento`, `fecha_insc`) VALUES
(12, 'dadda', 'qwe@123.com', '$2y$10$j3w697HVxkq4E6jbJj/6dOCH62QpbSyJm/BFOsop4BVKPFNJALO7y', '2021-01-05', 'Piano', '2025-05-17 04:21:10'),
(13, 'ew', 'we@123.com', '$2y$10$fuwmuttyBrwgvKvkloY/wu0.nVJpTHlv79nD2HP0dkwL32rQ2YG4y', '2025-05-09', 'Saxofón', '2025-05-17 04:20:46'),
(14, 'pedro', 'pedro@1548.com', '$2y$10$qzvyUOy8LCwUOMsPB.IY2u3cJ65DX4y/PHz5VwQwImcA1.FNQl26i', '2006-01-12', 'Guitarra', '2025-05-17 04:20:37'),
(15, 'juan', 'juan@789.com', '$2y$10$s1H6MqyCo3CGYasFVaIXjOrp1Rg44dLWqBow2BFjCPv.dl5OwJ6ci', '2003-02-12', 'Batería', '2025-05-17 11:19:36');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `newregistros`
--
ALTER TABLE `newregistros`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `newregistros`
--
ALTER TABLE `newregistros`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
