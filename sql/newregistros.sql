-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2025 a las 14:47:10
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
  `fecha_insc` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `newregistros`
--

INSERT INTO `newregistros` (`id_usuario`, `nombre`, `correo`, `contrasena`, `fecha_nac`, `fecha_insc`) VALUES
(26, 'juan andres', 'juanandres@123.com', '$2y$10$jOCykIGv3E.vuqPYWoxZMOMk4jXtCtXNK553ULIBU87Kv30BK5lzq', '2013-12-31', '2025-05-23 19:44:30'),
(27, 'maría garcia', 'marig@123.com', '$2y$10$l2MFhqPCs2tqFB7EzJCGe.0MlqqJAvX9KUg6OmhJVN3m2LyvaKEe.', '2005-01-04', '2025-05-23 19:46:40');

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
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
