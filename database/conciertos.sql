-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2025 a las 20:04:00
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
-- Base de datos: `conciertos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banda`
--

CREATE TABLE `banda` (
  `id_banda` int(11) NOT NULL,
  `Nombre` varchar(250) NOT NULL,
  `Pais_origen` varchar(250) NOT NULL,
  `Genero` varchar(250) NOT NULL,
  `Imagen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `banda`
--

INSERT INTO `banda` (`id_banda`, `Nombre`, `Pais_origen`, `Genero`, `Imagen`) VALUES
(1, 'Soda Stereo', 'Argentina', 'Rock', 'https://media.ambito.com/p/8fae45575c46a99064c0e58d9ebf7695/adjuntos/239/imagenes/041/770/0041770468/soda-stereo-1984jpg.jpg'),
(2, 'Enanitos Verdes', 'Argentina', 'Rock', 'https://i.scdn.co/image/0a44319db623b112c3fddca7a1ef88b5756265cd'),
(3, 'Guns N\' Roses', 'Estados Unidos', 'Rock', 'https://diariopublicable.com/wp-content/uploads/2023/11/AROSES.jpg'),
(4, 'Pink Floyd', 'Reino Unido', 'Rock', 'https://indiehoy.com/wp-content/uploads/2025/06/pink-floyd.jpg');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concierto`
--

CREATE TABLE `concierto` (
  `id_concierto` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Horario` time NOT NULL,
  `Lugar` varchar(250) NOT NULL,
  `Ciudad` varchar(250) NOT NULL,
  `id_banda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `concierto`
--

INSERT INTO `concierto` (`id_concierto`, `Fecha`, `Horario`, `Lugar`, `Ciudad`, `id_banda`) VALUES
(1, '2026-02-04', '20:00:00', 'Estadio Monumental, River Plate.', 'Nuñez, Argentina', 3),
(2, '2025-12-12', '21:00:00', 'Movistar Arena', 'Villa Crespo, Argentina', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `Nombre` varchar(250) NOT NULL,
  `Apellido` varchar(250) NOT NULL,
  `DNI` int(11) NOT NULL,
  `Rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banda`
--
ALTER TABLE `banda`
  ADD PRIMARY KEY (`id_banda`);

--
-- Indices de la tabla `concierto`
--
ALTER TABLE `concierto`
  ADD PRIMARY KEY (`id_concierto`),

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `DNI` (`DNI`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banda`
--
ALTER TABLE `banda`
  MODIFY `id_banda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `concierto`
--
ALTER TABLE `concierto`
  MODIFY `id_concierto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `concierto`
--
ALTER TABLE `concierto`
  ADD CONSTRAINT `concierto_ibfk_1` FOREIGN KEY (`id_banda`) REFERENCES `banda` (`id_banda`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
