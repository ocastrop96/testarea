-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 15-05-2021 a las 05:04:18
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `testarea`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_DATOSGRAFICOBAR` ()  SELECT * FROM producto ORDER BY producto_stock desc LIMIT 8$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_DATOSGRAFICOPARAMETRO` (IN `FECHAINICIO` VARCHAR(100), IN `FECHAFIN` VARCHAR(100))  SELECT
producto.producto_nombre,
SUM( venta.venta_cantidad ) AS CANTIDAD 
FROM
	venta
	INNER JOIN producto ON venta.producto_id = producto.producto_id 
WHERE
YEAR(venta.venta_feregistro) BETWEEN FECHAINICIO AND FECHAFIN
GROUP BY
	producto.producto_id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `producto_id` int(11) NOT NULL,
  `producto_nombre` text CHARACTER SET latin1 NOT NULL,
  `producto_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`producto_id`, `producto_nombre`, `producto_stock`) VALUES
(1, 'GASEOSA', 20),
(2, 'CHOCOLATES', 5),
(3, 'YOGURT', 10),
(4, 'SNACK', 3),
(5, 'ACEITE', 7),
(6, 'LAPIZ', 8),
(7, 'BORRADOR', 4),
(8, 'JUGO', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `venta_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `venta_cantidad` int(11) NOT NULL,
  `venta_feregistro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`venta_id`, `producto_id`, `venta_cantidad`, `venta_feregistro`) VALUES
(1, 1, 10, '2019-05-05'),
(2, 1, 2, '2020-05-11'),
(3, 6, 3, '2020-05-22'),
(4, 8, 5, '2020-05-22'),
(5, 8, 3, '2020-05-22'),
(6, 4, 15, '2021-05-22'),
(7, 5, 15, '2020-05-22'),
(8, 2, 30, '2019-05-22');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`producto_id`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`venta_id`),
  ADD KEY `producto_venta` (`producto_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `venta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
