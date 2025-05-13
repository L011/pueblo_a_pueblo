-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-05-2025 a las 19:56:33
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pap`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriaalimento`
--

CREATE TABLE `categoriaalimento` (
  `categoria_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalledistribucion`
--

CREATE TABLE `detalledistribucion` (
  `detalle_id` int(11) NOT NULL,
  `distribucion_id` int(11) NOT NULL,
  `escuela_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `cantidad` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleentrega`
--

CREATE TABLE `detalleentrega` (
  `detalle_id` int(11) NOT NULL,
  `entrega_id` int(11) NOT NULL,
  `rubro_id` int(11) NOT NULL,
  `peso` decimal(10,2) NOT NULL,
  `notas` text DEFAULT NULL,
  `estado` tinyint(1) NOT NULL COMMENT 'Disponibilidad para distribución'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribucion`
--

CREATE TABLE `distribucion` (
  `distribucion_id` int(11) NOT NULL,
  `fecha_distribucion` date NOT NULL,
  `responsable` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega`
--

CREATE TABLE `entrega` (
  `entrega_id` int(11) NOT NULL,
  `fecha_entrega` date NOT NULL,
  `proveedor` varchar(100) NOT NULL,
  `recibido_por` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregadistribuidor`
--

CREATE TABLE `entregadistribuidor` (
  `entrega_id` int(11) NOT NULL,
  `fecha_entrega` date NOT NULL,
  `distribuidor` varchar(100) NOT NULL,
  `recibido_por` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escuela`
--

CREATE TABLE `escuela` (
  `escuela_id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `contacto` varchar(100) NOT NULL,
  `circuito` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `escuela`
--

INSERT INTO `escuela` (`escuela_id`, `nombre`, `direccion`, `contacto`, `circuito`, `telefono`) VALUES
(1, 'Carrillo Gonzale', 'Calle 14- YTG', 'njkduu@gmail.com', 'Zonar Sur Juso', '02536565438');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `categoria_id` int(11) NOT NULL,
  `cantidad_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itementrega`
--

CREATE TABLE `itementrega` (
  `item_id` int(11) NOT NULL,
  `entrega_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `peso` decimal(10,2) NOT NULL,
  `notas` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculaescuela`
--

CREATE TABLE `matriculaescuela` (
  `matricula_id` int(11) NOT NULL,
  `escuela_id` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  `cantidad_alumnos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `matriculaescuela`
--

INSERT INTO `matriculaescuela` (`matricula_id`, `escuela_id`, `fecha_registro`, `cantidad_alumnos`) VALUES
(1, 1, '2025-05-13', 435);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubroorganico`
--

CREATE TABLE `rubroorganico` (
  `rubro_id` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL COMMENT 'Ej: Frutas, Verduras, Hortalizas',
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoriaalimento`
--
ALTER TABLE `categoriaalimento`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `detalledistribucion`
--
ALTER TABLE `detalledistribucion`
  ADD PRIMARY KEY (`detalle_id`),
  ADD KEY `distribucion_id` (`distribucion_id`),
  ADD KEY `escuela_id` (`escuela_id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `detalleentrega`
--
ALTER TABLE `detalleentrega`
  ADD PRIMARY KEY (`detalle_id`),
  ADD KEY `entrega_id` (`entrega_id`),
  ADD KEY `rubro_id` (`rubro_id`);

--
-- Indices de la tabla `distribucion`
--
ALTER TABLE `distribucion`
  ADD PRIMARY KEY (`distribucion_id`);

--
-- Indices de la tabla `entrega`
--
ALTER TABLE `entrega`
  ADD PRIMARY KEY (`entrega_id`);

--
-- Indices de la tabla `entregadistribuidor`
--
ALTER TABLE `entregadistribuidor`
  ADD PRIMARY KEY (`entrega_id`);

--
-- Indices de la tabla `escuela`
--
ALTER TABLE `escuela`
  ADD PRIMARY KEY (`escuela_id`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `itementrega`
--
ALTER TABLE `itementrega`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `entrega_id` (`entrega_id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `matriculaescuela`
--
ALTER TABLE `matriculaescuela`
  ADD PRIMARY KEY (`matricula_id`),
  ADD KEY `escuela_id` (`escuela_id`);

--
-- Indices de la tabla `rubroorganico`
--
ALTER TABLE `rubroorganico`
  ADD PRIMARY KEY (`rubro_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoriaalimento`
--
ALTER TABLE `categoriaalimento`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalledistribucion`
--
ALTER TABLE `detalledistribucion`
  MODIFY `detalle_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalleentrega`
--
ALTER TABLE `detalleentrega`
  MODIFY `detalle_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `distribucion`
--
ALTER TABLE `distribucion`
  MODIFY `distribucion_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entrega`
--
ALTER TABLE `entrega`
  MODIFY `entrega_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entregadistribuidor`
--
ALTER TABLE `entregadistribuidor`
  MODIFY `entrega_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `escuela`
--
ALTER TABLE `escuela`
  MODIFY `escuela_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `itementrega`
--
ALTER TABLE `itementrega`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `matriculaescuela`
--
ALTER TABLE `matriculaescuela`
  MODIFY `matricula_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `rubroorganico`
--
ALTER TABLE `rubroorganico`
  MODIFY `rubro_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalledistribucion`
--
ALTER TABLE `detalledistribucion`
  ADD CONSTRAINT `detalledistribucion_ibfk_1` FOREIGN KEY (`distribucion_id`) REFERENCES `distribucion` (`distribucion_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalledistribucion_ibfk_2` FOREIGN KEY (`escuela_id`) REFERENCES `escuela` (`escuela_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalledistribucion_ibfk_3` FOREIGN KEY (`categoria_id`) REFERENCES `categoriaalimento` (`categoria_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalleentrega`
--
ALTER TABLE `detalleentrega`
  ADD CONSTRAINT `detalleentrega_ibfk_1` FOREIGN KEY (`entrega_id`) REFERENCES `entregadistribuidor` (`entrega_id`),
  ADD CONSTRAINT `detalleentrega_ibfk_2` FOREIGN KEY (`rubro_id`) REFERENCES `rubroorganico` (`rubro_id`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoriaalimento` (`categoria_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `itementrega`
--
ALTER TABLE `itementrega`
  ADD CONSTRAINT `itementrega_ibfk_1` FOREIGN KEY (`entrega_id`) REFERENCES `entrega` (`entrega_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `itementrega_ibfk_2` FOREIGN KEY (`categoria_id`) REFERENCES `categoriaalimento` (`categoria_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `matriculaescuela`
--
ALTER TABLE `matriculaescuela`
  ADD CONSTRAINT `matriculaescuela_ibfk_1` FOREIGN KEY (`escuela_id`) REFERENCES `escuela` (`escuela_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
