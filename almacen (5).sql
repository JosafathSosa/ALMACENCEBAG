-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 20-01-2023 a las 22:33:52
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `almacen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destino`
--

CREATE TABLE `destino` (
  `id_Destino` int(11) NOT NULL,
  `destino` varchar(25) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `destino`
--

INSERT INTO `destino` (`id_Destino`, `destino`, `direccion`, `telefono`) VALUES
(72, 'Ags', 'España 342', '454-534-4535'),
(77, 'San Luis', 'Del arenal 213', '454-454-4544');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

CREATE TABLE `entrada` (
  `id_entrada` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `entrega` varchar(45) NOT NULL,
  `recibe` varchar(45) NOT NULL,
  `cantidad` varchar(45) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `producto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entrada`
--

INSERT INTO `entrada` (`id_entrada`, `fecha`, `entrega`, `recibe`, `cantidad`, `id_proveedor`, `producto`) VALUES
(45, '2023-01-11', 'Juan Jose', 'Carlos', '7', 6, 'Aceite'),
(48, '2023-01-20', 'Sofia', 'Antonio', '3', 1, 'Aceite');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(30) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `existencias` smallint(5) NOT NULL,
  `fecha` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre_producto`, `descripcion`, `id_proveedor`, `existencias`, `fecha`) VALUES
(40, 'Aceite', 'Botella de litro', 1, 23, '2023-01-11'),
(43, 'Avena', 'Bolsa', 5, 10, '2023-01-11'),
(44, 'Ardore', 'Kilo', 5, 55, '2023-01-11'),
(45, 'Agree 50', 'Apolo', 1, 10, '2023-01-11'),
(46, 'Blut', 'Blut', 3, 50, '2023-01-11'),
(47, 'Ajo', 'Bolsas', 3, 10, '2023-01-11'),
(48, 'Bananas', 'Kg', 6, 10, '2023-01-11'),
(49, 'Leche', 'Leche en bolsa', 6, 50, '2023-01-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `fecha` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nombre`, `telefono`, `direccion`, `fecha`) VALUES
(1, 'Bere', '449-442-2345', 'Maravillas', '2022-12-28'),
(3, 'Carlos', '449-442-2345', 'Barcelona', '2022-12-23'),
(5, 'Josafath', '449-494-1889', 'Andalucia 132 España', '2022-12-25'),
(6, 'Efrain Esau', '449-534-1234', 'Versalles 205', '2022-12-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida`
--

CREATE TABLE `salida` (
  `id_salida` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `entrega` varchar(45) NOT NULL,
  `recibe` varchar(45) NOT NULL,
  `id_destino` int(11) NOT NULL,
  `producto` varchar(25) NOT NULL,
  `cantidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `salida`
--

INSERT INTO `salida` (`id_salida`, `fecha`, `entrega`, `recibe`, `id_destino`, `producto`, `cantidad`) VALUES
(34, '2023-01-11', 'Juan Jose', 'Carlos', 72, 'Aceite', 2),
(39, '2023-01-20', 'Carlos', 'Antonio', 77, 'Leche', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `totales`
--

CREATE TABLE `totales` (
  `id_total` int(15) NOT NULL,
  `producto` varchar(20) NOT NULL,
  `cantidad_inicio` int(15) DEFAULT NULL,
  `cantidad_salida` int(15) DEFAULT NULL,
  `existencia` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `totales`
--

INSERT INTO `totales` (`id_total`, `producto`, `cantidad_inicio`, `cantidad_salida`, `existencia`) VALUES
(24, 'Aceite', 25, 2, 23),
(27, 'Leche', 55, 5, 50);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `destino`
--
ALTER TABLE `destino`
  ADD PRIMARY KEY (`id_Destino`);

--
-- Indices de la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`id_entrada`),
  ADD KEY `id_producto2` (`id_proveedor`),
  ADD KEY `id_producto3` (`producto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `salida`
--
ALTER TABLE `salida`
  ADD PRIMARY KEY (`id_salida`),
  ADD KEY `id_destino` (`id_destino`);

--
-- Indices de la tabla `totales`
--
ALTER TABLE `totales`
  ADD PRIMARY KEY (`id_total`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `destino`
--
ALTER TABLE `destino`
  MODIFY `id_Destino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `entrada`
--
ALTER TABLE `entrada`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `salida`
--
ALTER TABLE `salida`
  MODIFY `id_salida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `totales`
--
ALTER TABLE `totales`
  MODIFY `id_total` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD CONSTRAINT `id_proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `salida`
--
ALTER TABLE `salida`
  ADD CONSTRAINT `id_destino` FOREIGN KEY (`id_destino`) REFERENCES `destino` (`id_Destino`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
