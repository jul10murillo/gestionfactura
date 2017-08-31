-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-08-2017 a las 23:12:49
-- Versión del servidor: 10.1.22-MariaDB
-- Versión de PHP: 7.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `compras`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicion_pago`
--

CREATE TABLE `condicion_pago` (
  `id_cuota` int(11) NOT NULL,
  `id_factura` int(11) NOT NULL,
  `monto_estimado_pago` decimal(10,2) NOT NULL,
  `fecha_estimada_pago` date NOT NULL,
  `porcentaje` int(11) NOT NULL,
  `dias_credito` int(11) NOT NULL,
  `fecha_pago` date NOT NULL,
  `id_estatus_pago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `condicion_pago`
--

INSERT INTO `condicion_pago` (`id_cuota`, `id_factura`, `monto_estimado_pago`, `fecha_estimada_pago`, `porcentaje`, `dias_credito`, `fecha_pago`, `id_estatus_pago`) VALUES
(1, 1, '1220.37', '2017-07-07', 30, 120, '2017-03-09', 1),
(2, 1, '2847.54', '2017-08-12', 70, 120, '2017-04-14', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus_factura`
--

CREATE TABLE `estatus_factura` (
  `id_estatus` int(11) NOT NULL,
  `cod_estatus` varchar(20) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estatus_factura`
--

INSERT INTO `estatus_factura` (`id_estatus`, `cod_estatus`, `descripcion`) VALUES
(1, 'P', 'Pendiente'),
(2, 'PC', 'Parcialmente Cancelada'),
(3, 'C', 'Cancelada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus_pago`
--

CREATE TABLE `estatus_pago` (
  `id_estatus_pago` int(11) NOT NULL,
  `cod_estatus_pago` varchar(20) NOT NULL,
  `descripcion_pago` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estatus_pago`
--

INSERT INTO `estatus_pago` (`id_estatus_pago`, `cod_estatus_pago`, `descripcion_pago`) VALUES
(1, 'P', 'Pendiente'),
(2, 'PC', 'Parcialmente Cancelada'),
(3, 'C', 'Cancelada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `id_temporada` int(11) NOT NULL,
  `id_mes` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `id_tipo_producto` int(11) NOT NULL,
  `nro_factura` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `monto_factura_inicial` decimal(10,2) NOT NULL,
  `unidades_factura_inicial` int(11) NOT NULL,
  `monto_factura_final` decimal(10,2) DEFAULT NULL,
  `unidades_factura_final` int(11) DEFAULT NULL,
  `fecha_proforma` date NOT NULL,
  `fecha_produccion` date DEFAULT NULL,
  `fecha_despacho` date DEFAULT NULL,
  `fecha_llegada` date DEFAULT NULL,
  `fecha_almacen` date DEFAULT NULL,
  `fecha_factura_inicial` date NOT NULL,
  `fecha_factura_final` date NOT NULL,
  `id_estatus` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_factura`, `id_marca`, `id_temporada`, `id_mes`, `ano`, `id_proveedor`, `id_tipo_producto`, `nro_factura`, `monto_factura_inicial`, `unidades_factura_inicial`, `monto_factura_final`, `unidades_factura_final`, `fecha_proforma`, `fecha_produccion`, `fecha_despacho`, `fecha_llegada`, `fecha_almacen`, `fecha_factura_inicial`, `fecha_factura_final`, `id_estatus`, `id_usuario`) VALUES
(1, 2, 1, 7, 2017, 1, 1, 'PHX1214T093-2July', '4854.96', 1152, NULL, NULL, '2017-08-20', NULL, NULL, NULL, NULL, '2017-08-24', '0000-00-00', 1, 231),
(2, 1, 2, 8, 2018, 2, 2, 'PHX1214T059-2JULY', '5132.16', 972, '5464.80', 1035, '2017-08-21', NULL, NULL, NULL, NULL, '2017-08-25', '0000-00-00', 3, 231),
(11, 1, 2, 8, 2017, 3, 1, 'yyyyy555ll', '5000.00', 100, NULL, NULL, '2017-08-22', NULL, NULL, NULL, NULL, '2017-08-29', '0000-00-00', 1, 231),
(12, 1, 1, 8, 2017, 2, 1, 'zzzz5552z', '5000.00', 500, NULL, NULL, '2017-08-23', NULL, NULL, NULL, NULL, '2017-08-29', '0000-00-00', 1, 231),
(13, 2, 1, 7, 2017, 1, 1, 'PHX1214T056-2JUL', '24936.12', 4410, NULL, NULL, '2017-08-25', NULL, NULL, NULL, NULL, '2017-08-29', '0000-00-00', 1, 231),
(14, 2, 1, 7, 2017, 4, 1, 'PHX1116O09-2 E', '13698.20', 2556, NULL, NULL, '2017-08-24', NULL, NULL, NULL, NULL, '2017-08-30', '0000-00-00', 1, 231),
(15, 2, 1, 7, 2017, 3, 1, 'PHX1116O15-2 E', '1046232.00', 1764, NULL, NULL, '2017-08-23', NULL, NULL, NULL, NULL, '2017-08-30', '0000-00-00', 1, 231);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `descripcion`) VALUES
(1, 'Aishop'),
(2, 'Exotik'),
(3, 'Shushop'),
(4, 'Vestimenta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mes`
--

CREATE TABLE `mes` (
  `id_mes` int(11) NOT NULL,
  `cod_mes` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mes`
--

INSERT INTO `mes` (`id_mes`, `cod_mes`, `descripcion`) VALUES
(1, '1', 'Enero'),
(2, '2', 'Febrero'),
(3, '3', 'Marzo'),
(4, '4', 'Abril'),
(5, '5', 'Mayo'),
(6, '6', 'Junio'),
(7, '7', 'Julio'),
(8, '8', 'Agosto'),
(9, '9', 'Septiembre'),
(10, '10', 'Octubre'),
(11, '11', 'Noviembre'),
(12, '12', 'Diciembre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1503063344),
('m140506_102106_rbac_init', 1503063354);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id_pago` int(11) NOT NULL,
  `id_cuota` int(11) NOT NULL,
  `monto_pago` decimal(10,2) NOT NULL,
  `fecha_pago` date NOT NULL,
  `fecha_creacion` date NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_proveedor`
--

CREATE TABLE `producto_proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `id_tipo_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto_proveedor`
--

INSERT INTO `producto_proveedor` (`id_proveedor`, `id_tipo_producto`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 4),
(23, 4),
(24, 2),
(25, 2),
(26, 2),
(27, 3),
(28, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nombre`) VALUES
(1, 'BAINI'),
(2, 'ZTM '),
(3, 'ELF'),
(4, 'HONGX'),
(5, 'WH'),
(6, 'HY'),
(7, 'HF'),
(8, 'MANNI'),
(9, 'TR'),
(10, 'ECKO'),
(11, 'MR HU'),
(12, 'MR HUANG'),
(13, 'MR ZHANG'),
(14, 'MS OUYANG'),
(15, 'SHADOW'),
(16, 'PT'),
(17, 'SD'),
(18, 'YY'),
(19, 'BDA'),
(20, 'DRXD'),
(21, 'YF'),
(22, 'YS'),
(23, 'MJ'),
(24, 'YES'),
(25, 'KITTY'),
(26, 'CRYSTAL'),
(27, 'TAO TAO'),
(28, 'ZE FENG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporada`
--

CREATE TABLE `temporada` (
  `id_temporada` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `temporada`
--

INSERT INTO `temporada` (`id_temporada`, `descripcion`) VALUES
(1, 'Fall'),
(2, 'Winter');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `id_tipo_producto` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`id_tipo_producto`, `descripcion`) VALUES
(1, 'Textil'),
(2, 'Calzado'),
(3, 'Bisutería'),
(4, 'Accesorios'),
(5, 'Artículos varios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `status`, `created_at`, `updated_at`) VALUES
(231, 'ylopez', 'SbGMbvl5OUhwyFaklbtmmyRajcsN9uW2', 1, 1503082969, 1503082969),
(232, 'jmurillo', 'RoKgHmK1e-JOa-CFkdxAuwoKVVwDfmHl', 1, 1503083023, 1503083023),
(233, 'hmoreno', 'IoSopOHHF8q3e3Uovw6YFUW_mmNmvPml', 1, 1503085902, 1503085902),
(234, 'imarquez', 'vl72aC6lXHQ2d-SvWLYk0KVSvk0jfDAF', 1, 1503090231, 1503090231),
(235, 'eperalta', 'gJ1VqyLt9qXq8syOpAiVAXs17oDyNN-5', 1, 1503339790, 1503339790);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indices de la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indices de la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indices de la tabla `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indices de la tabla `condicion_pago`
--
ALTER TABLE `condicion_pago`
  ADD PRIMARY KEY (`id_cuota`),
  ADD KEY `id_factura` (`id_factura`),
  ADD KEY `id_estatus_pago` (`id_estatus_pago`);

--
-- Indices de la tabla `estatus_factura`
--
ALTER TABLE `estatus_factura`
  ADD PRIMARY KEY (`id_estatus`);

--
-- Indices de la tabla `estatus_pago`
--
ALTER TABLE `estatus_pago`
  ADD PRIMARY KEY (`id_estatus_pago`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `id_marca` (`id_marca`),
  ADD KEY `id_temporada` (`id_temporada`),
  ADD KEY `id_mes` (`id_mes`),
  ADD KEY `id_proveedor` (`id_proveedor`),
  ADD KEY `id_tipo_producto` (`id_tipo_producto`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_estatus` (`id_estatus`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `mes`
--
ALTER TABLE `mes`
  ADD PRIMARY KEY (`id_mes`);

--
-- Indices de la tabla `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `id_cuota` (`id_cuota`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `producto_proveedor`
--
ALTER TABLE `producto_proveedor`
  ADD PRIMARY KEY (`id_proveedor`,`id_tipo_producto`),
  ADD KEY `id_proveedor` (`id_proveedor`),
  ADD KEY `id_tipo_producto` (`id_tipo_producto`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `temporada`
--
ALTER TABLE `temporada`
  ADD PRIMARY KEY (`id_temporada`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`id_tipo_producto`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `auth_key` (`auth_key`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `condicion_pago`
--
ALTER TABLE `condicion_pago`
  MODIFY `id_cuota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `estatus_factura`
--
ALTER TABLE `estatus_factura`
  MODIFY `id_estatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `estatus_pago`
--
ALTER TABLE `estatus_pago`
  MODIFY `id_estatus_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `mes`
--
ALTER TABLE `mes`
  MODIFY `id_mes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `temporada`
--
ALTER TABLE `temporada`
  MODIFY `id_temporada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `id_tipo_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `condicion_pago`
--
ALTER TABLE `condicion_pago`
  ADD CONSTRAINT `condicion_pago_ibfk_1` FOREIGN KEY (`id_factura`) REFERENCES `factura` (`id_factura`),
  ADD CONSTRAINT `condicion_pago_ibfk_2` FOREIGN KEY (`id_estatus_pago`) REFERENCES `estatus_pago` (`id_estatus_pago`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`),
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`id_temporada`) REFERENCES `temporada` (`id_temporada`),
  ADD CONSTRAINT `factura_ibfk_3` FOREIGN KEY (`id_mes`) REFERENCES `mes` (`id_mes`),
  ADD CONSTRAINT `factura_ibfk_4` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`),
  ADD CONSTRAINT `factura_ibfk_5` FOREIGN KEY (`id_tipo_producto`) REFERENCES `tipo_producto` (`id_tipo_producto`),
  ADD CONSTRAINT `factura_ibfk_6` FOREIGN KEY (`id_estatus`) REFERENCES `estatus_factura` (`id_estatus`),
  ADD CONSTRAINT `factura_ibfk_7` FOREIGN KEY (`id_usuario`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`id_cuota`) REFERENCES `condicion_pago` (`id_cuota`),
  ADD CONSTRAINT `pago_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `producto_proveedor`
--
ALTER TABLE `producto_proveedor`
  ADD CONSTRAINT `producto_proveedor_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`),
  ADD CONSTRAINT `producto_proveedor_ibfk_2` FOREIGN KEY (`id_tipo_producto`) REFERENCES `tipo_producto` (`id_tipo_producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
