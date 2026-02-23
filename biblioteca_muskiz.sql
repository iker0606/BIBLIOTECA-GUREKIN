-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-02-2026 a las 12:51:23
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
-- Base de datos: `biblioteca_muskiz`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id_libro` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(150) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `url_wiki` varchar(255) DEFAULT NULL,
  `ruta_imagen` varchar(255) DEFAULT NULL,
  `num_votos` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `titulo`, `autor`, `descripcion`, `url_wiki`, `ruta_imagen`, `num_votos`) VALUES
(1, 'Hábitos Atómicos', 'James Clear', 'Un libro práctico que muestra cómo pequeños cambios diarios pueden transformar tu vida.', 'https://en.wikipedia.org/wiki/Atomic_Habits', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUkpzTRkp78btDRZ6JnbgTCLcNiKHBG7WwaA&s', 0),
(2, 'Alas de Ónix', 'Rebecca Yarros', 'La esperada secuela de \"Alas de Fuego\", donde Violet enfrenta nuevas pruebas, traiciones y batallas internas.', 'https://es.wikipedia.org/wiki/Alas_de_%C3%B3nix', 'https://www.jocdeparaules.cat//imagenes_grandes/9788408/978840829731.webp', 1),
(3, 'Viento y Verdad', 'Brandon Sanderson', 'Una épica fantasía ambientada en el Cosmere, donde personajes complejos, intrigas y magia profunda se entrelazan en una historia inolvidable.', 'https://es.coppermind.net/wiki/Viento_y_verdad', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRzcf7ddQWG0Y4_yuOLzAmVaGZhfpk-UYx7mA&s', 2),
(4, 'El Problema de los Tres Cuerpos', 'Liu Cixin', 'Uno de los libros más vendidos y comentados actualmente, impulsado por su adaptación y su mezcla de ciencia, misterio y filosofía.', 'https://es.wikipedia.org/wiki/El_problema_de_los_tres_cuerpos', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJmPLXCQGAdD9fdh2far1TLxJ9CtVZRsrekg&s', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `correo`, `contrasena`) VALUES
(8, 'admin@admin.com', '$2y$10$tH9z3dK.Aou3Z7GQdPoZfuZKiTEEjsww/oP0JVZMWlwrQNt8gA.R2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votos`
--

CREATE TABLE `votos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `libro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libro`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `votos`
--
ALTER TABLE `votos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario_id` (`usuario_id`),
  ADD KEY `libro_id` (`libro_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `votos`
--
ALTER TABLE `votos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `votos`
--
ALTER TABLE `votos`
  ADD CONSTRAINT `votos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `votos_ibfk_2` FOREIGN KEY (`libro_id`) REFERENCES `libros` (`id_libro`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
