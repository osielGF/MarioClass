-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2018 a las 17:34:51
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
-- Base de datos: `practica_12_inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(4) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `tienda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `tienda`) VALUES
(7, 'HIELOS frios', 2),
(9, 'bebidas energetizantes', 3),
(11, 'LACTEOS', 2),
(12, 'cacahuates', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id_historial` int(4) NOT NULL,
  `id_producto` int(4) NOT NULL,
  `id_usuario` int(4) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `nota` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `referencia` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tienda` int(11) NOT NULL,
  `tipo` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id_historial`, `id_producto`, `id_usuario`, `cantidad`, `fecha`, `nota`, `referencia`, `tienda`, `tipo`) VALUES
(18, 46, 4, 1, '2018-06-13', 'lÃ±skbmlÃ±', '097', 3, 'AUMENTÃ“ STOCK'),
(20, 45, 4, 9, '2018-06-13', 'asfkbnkl', 'jkhvk', 3, 'DISMINUYÃ“ STOCK'),
(21, 46, 4, 149, '2018-06-13', 'valis', 'sdv23', 3, 'DISMINUYÃ“ STOCK'),
(22, 46, 4, 2, '2018-06-13', 'echando  a perder se aprende', '098765', 3, 'DISMINUYÃ“ STOCK'),
(23, 46, 4, 2, '2018-06-13', 'lÃ±kjhb', '90876', 3, 'AUMENTÃ“ STOCK'),
(24, 42, 10, 2, '2018-06-13', 'hacia falta asi que se pidieron mas', '09876', 2, 'AUMENTÃ“ STOCK'),
(25, 42, 10, 5, '2018-06-13', 'sn', 'sdb', 2, 'DISMINUYÃ“ STOCK');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(4) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `stock` int(4) NOT NULL,
  `categoria` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `tienda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio_compra`, `precio_venta`, `stock`, `categoria`, `tienda`) VALUES
(30, 'snikers', 2, 4, 25, 'dulces', 0),
(33, 'azucares', 15, 18, 43, 'dulces', 0),
(39, 'pan blanco', 28, 31.5, 55, 'dulces', 0),
(40, 'pelon pelo rico', 5, 8.5, 195, 'dulces', 0),
(41, 'ojarascas', 2, 40, 40, 'dulces', 0),
(42, 'agua 2 litros', 34, 59, 65, 'HIELOS frios', 2),
(43, 'bubulubus', 3, 9, 20, 'detergentes', 0),
(45, 'poweade', 28, 40, 70, 'bebidas energetizantes', 3),
(46, 'red bull', 28, 35, 1, 'bebidas energetizantes', 3),
(47, 'vive 100', 25, 40, 800, 'bebidas energetizantes', 3),
(48, 'Monster', 24, 34, 50, 'bebidas energetizantes', 3),
(50, 'hielos el perico', 15, 18, 500, 'HIELOS frios', 2),
(51, 'katos', 4, 8, 600, 'cacahuates', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendas`
--

CREATE TABLE `tiendas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tiendas`
--

INSERT INTO `tiendas` (`id`, `nombre`, `direccion`, `status`) VALUES
(1, 'Pajaro Loco', 'Calle lopez portillo', 0),
(2, 'Walmart', 'adelitas', 1),
(3, 'burguer king', 'col faraway', 1),
(4, 'waldo\'s', 'calle venemerito americano', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(4) NOT NULL,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `tienda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `email`, `tienda`) VALUES
(4, 'magdalena', 'magda', 'magda@gmail.com', 3),
(5, 'admin', 'admin', 'admin@gmail.com', 2),
(10, 'mariano', 'mariano', 'mariano@mariano.com', 2),
(11, 'root', 'root', 'root@com', 1),
(12, 'marco', 'marco', 'marco@hotmail.com', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_producto` int(11) NOT NULL,
  `descripcion_producto` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` float NOT NULL,
  `tienda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `fecha`, `id_producto`, `descripcion_producto`, `cantidad`, `total`, `tienda`) VALUES
(1, '2018-06-13', 44, 'bubulubus', 1, 8, 2),
(2, '2018-06-13', 50, 'hielos el perico', 1, 18, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id_historial`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tiendas`
--
ALTER TABLE `tiendas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id_historial` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT de la tabla `tiendas`
--
ALTER TABLE `tiendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
