-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2018 a las 14:59:46
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `examen_02`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnas`
--

CREATE TABLE `alumnas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nac` date NOT NULL,
  `grupo` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `alumnas`
--

INSERT INTO `alumnas` (`id`, `nombre`, `apellido`, `fecha_nac`, `grupo`) VALUES
(5, 'maria jose', 'del valle', '2018-06-10', '1B'),
(10, 'Jessany Yamileth', 'Garza Soto', '2001-09-11', '1B'),
(11, 'Iliana Arely', 'Moo Jimenez', '2018-06-15', '1A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id`, `nombre`) VALUES
(7, '1A'),
(14, '1B'),
(15, '1C'),
(16, '2Z');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `grupo` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `alumna` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_mama` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `apellido_mama` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_pago` date NOT NULL,
  `fecha_envio` date NOT NULL,
  `imagen_folio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `folio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `grupo`, `alumna`, `nombre_mama`, `apellido_mama`, `fecha_pago`, `fecha_envio`, `imagen_folio`, `folio`) VALUES
(10, '1B', 'Jessany Yamileth', 'Perla', 'jornaa', '2018-06-22', '2018-06-24', 'views/imgs/ili_yo.jpg', 222),
(14, '1A', 'Iliana Arely', 'Francisca', 'Jimenez', '2018-06-03', '2018-06-25', 'views/imgs/Captura4.JPG', 22223),
(15, '1C', 'Iliana Arely', 'Perla', 'del mar rojo', '2018-06-10', '2018-06-25', 'views/imgs/Captura5.JPG', 9909),
(16, '2Z', 'maria jose', 'mariana de la cervanteria', 'del mar rojo 2', '2018-06-13', '2018-06-25', 'views/imgs/Captura4.JPG', 987665),
(17, '1A', 'maria jose', 'Ã±ljkh', 'fcghj nm,', '2018-06-30', '2018-06-25', 'views/imgs/Captura5.JPG', 6666),
(18, '1C', 'Jessany Yamileth', 'alejandrina', 'gomez', '2018-06-12', '2018-06-25', 'views/imgs/ili_yo.jpg', 765),
(19, '1C', 'Jessany Yamileth', 'mariandina', 'berrones', '2018-06-17', '2018-06-25', 'views/imgs/ili_yo.jpg', 777);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin', 'admin@hotmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnas`
--
ALTER TABLE `alumnas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnas`
--
ALTER TABLE `alumnas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
