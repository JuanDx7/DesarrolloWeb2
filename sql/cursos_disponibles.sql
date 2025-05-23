-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2025 a las 10:53:25
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
-- Estructura de tabla para la tabla `cursos_disponibles`
--

CREATE TABLE `cursos_disponibles` (
  `id_curso` int(50) NOT NULL,
  `instrumento_curso` varchar(50) NOT NULL,
  `horas_diarias` int(50) NOT NULL,
  `precio_hora` int(5) NOT NULL,
  `duracion_semanas` int(50) NOT NULL,
  `estado_curso` varchar(50) NOT NULL,
  `cupo_max` int(50) NOT NULL,
  `nivel_dif` varchar(50) NOT NULL,
  `dias_curso` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos_disponibles`
--

INSERT INTO `cursos_disponibles` (`id_curso`, `instrumento_curso`, `horas_diarias`, `precio_hora`, `duracion_semanas`, `estado_curso`, `cupo_max`, `nivel_dif`, `dias_curso`) VALUES
(1, 'guitarra', 3, 3, 5, 'activo', 10, 'básico', 'martes'),
(2, 'piano', 3, 3, 5, 'activo', 8, 'básico', 'jueves'),
(3, 'batería ', 3, 3, 5, 'activo', 6, 'básico', 'lunes'),
(4, 'saxofón', 3, 3, 5, 'activo', 10, 'básico', 'miércoles'),
(5, 'violín', 3, 3, 5, 'activo', 8, 'básico', 'viernes');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cursos_disponibles`
--
ALTER TABLE `cursos_disponibles`
  ADD PRIMARY KEY (`id_curso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cursos_disponibles`
--
ALTER TABLE `cursos_disponibles`
  MODIFY `id_curso` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
