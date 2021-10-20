-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2021 a las 06:45:50
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crowncoffe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja_gasto`
--

CREATE TABLE `caja_gasto` (
  `id` int(11) NOT NULL,
  `id_caja` int(11) NOT NULL,
  `id_gasto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `caja_gasto`
--

INSERT INTO `caja_gasto` (`id`, `id_caja`, `id_gasto`) VALUES
(80, 42, 86),
(81, 44, 87),
(82, 47, 88),
(83, 47, 89);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_prod_menu`
--

CREATE TABLE `categoria_prod_menu` (
  `id_cat_prod_menu` int(11) NOT NULL,
  `nombre_cat` varchar(100) NOT NULL,
  `descripcion_cat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria_prod_menu`
--

INSERT INTO `categoria_prod_menu` (`id_cat_prod_menu`, `nombre_cat`, `descripcion_cat`) VALUES
(66, 'agua salada de cocos', 'sodas y refrescos io'),
(68, 'admin2', 'sodas y refrescos io'),
(69, 'papa', 'con sal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_producto`
--

CREATE TABLE `compra_producto` (
  `id_compra_prod` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `id_producto_inv` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compra_producto`
--

INSERT INTO `compra_producto` (`id_compra_prod`, `cantidad`, `precio`, `id_producto_inv`, `id_compra`) VALUES
(1, 98, 0, 8, 31),
(2, 22, 0, 7, 32),
(3, 77, 0, 6, 33),
(4, 65, 0, 8, 34),
(5, 50, 0, 8, 35),
(6, 25, 0, 8, 36),
(7, 15, 0, 8, 37),
(8, 25, 0, 5, 38),
(9, 35, 0, 5, 39),
(10, 78, 0, 5, 40),
(11, 11, 0, 5, 41),
(12, 99, 0, 5, 42),
(13, 2, 5, 6, 43),
(14, 77, 5, 6, 44);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id_compra` int(11) NOT NULL,
  `proveedor` varchar(255) DEFAULT 'sin proveedor',
  `codigo` varchar(100) DEFAULT 'sin codigo',
  `descripcion` varchar(255) DEFAULT NULL,
  `origen_dinero` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_usuario` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`id_compra`, `proveedor`, `codigo`, `descripcion`, `origen_dinero`, `fecha`, `id_usuario`) VALUES
(3, 'coca', '102', NULL, 1, '2021-09-16 04:04:28', 1),
(4, 'sin proveedor', 'sin codigo', NULL, 1, '2021-09-16 04:05:08', 1),
(5, 'tienda', '2', 'compra de papas', 1, '2021-09-21 00:17:11', 1),
(29, 'carniceria', '777', 'dulces', 0, '2021-09-21 00:54:37', 1),
(30, 'tienda', '2525', 'dulces', 1, '2021-09-21 00:59:08', 1),
(31, 'tienda', '777', 'sodas y refrescos io', 1, '2021-09-21 01:01:07', 1),
(32, 'tienda', 'aaa', 'con sal', 1, '2021-09-21 01:06:38', 1),
(33, 'carniceria', '777', 'compra de carne de res', 1, '2021-09-21 01:09:33', 1),
(34, 'tienda', '9999', 'dulces', 1, '2021-09-21 01:11:58', 1),
(35, 'tienda', '2525', 'dulces', 1, '2021-09-21 01:13:51', 1),
(36, 'tienda', '2525', 'sodas y refrescos io', 1, '2021-09-21 01:14:54', 1),
(37, 'tienda', 'aaa', 'sodas y refrescos io', 1, '2021-09-21 02:54:47', 1),
(38, 'tienda', '777', 'vvvvv', 1, '2021-09-21 03:28:42', 1),
(39, 'tienda', '25256', 'con sal', 0, '2021-09-21 03:31:44', 1),
(40, 'tienda', '2525', 'sodas y refrescos io', 1, '2021-09-21 04:37:33', 1),
(41, 'tienda', '2525', 'sodas y refrescos io', 1, '2021-09-21 04:39:34', 1),
(42, '', '', '', 1, '2021-09-21 04:42:12', 1),
(43, '', '', '', 1, '2021-09-21 04:42:59', 1),
(44, '', '', '', 1, '2021-09-21 04:45:13', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_orden`
--

CREATE TABLE `detalle_orden` (
  `id_det_orden` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `observacion` varchar(255) DEFAULT NULL,
  `id_mesa` int(11) NOT NULL,
  `estado_orden` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_orden`
--

INSERT INTO `detalle_orden` (`id_det_orden`, `fecha`, `observacion`, `id_mesa`, `estado_orden`) VALUES
(4, '2021-10-06 19:57:49', NULL, 13, 1),
(22, '2021-10-06 20:57:52', NULL, 2, 1),
(25, '2021-10-06 23:08:22', NULL, 5, 0),
(26, '2021-10-06 23:49:38', NULL, 5, 0),
(31, '2021-10-07 18:31:35', NULL, 5, 1),
(35, '2021-10-08 22:20:39', NULL, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extra_prod_menu`
--

CREATE TABLE `extra_prod_menu` (
  `id_extra_prod_m` int(11) NOT NULL,
  `nombre_extra` varchar(255) NOT NULL,
  `costo` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `unidad_mediada` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `extra_prod_menu`
--

INSERT INTO `extra_prod_menu` (`id_extra_prod_m`, `nombre_extra`, `costo`, `precio`, `unidad_mediada`, `descripcion`) VALUES
(1, 'papas', 20, 25, 1, 'papas saladas'),
(4, 'colas', 1, 2, 3, 'd44444'),
(7, 'papa', 34, 8, 2, 'con sal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `id_detalle_orden` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `fecha` date NOT NULL,
  `observaciones` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_factura`, `id_detalle_orden`, `nombre`, `fecha`, `observaciones`) VALUES
(1, 0, 'Zuly', '2021-09-01', 'Café sin azucar'),
(2, 0, 'Zuly', '2021-09-01', 'Café sin leche '),
(11, 3, 'Nancy', '2021-09-08', ' Café sin leche'),
(155, 55, 'Juan', '2021-09-17', 'Leche');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa`
--

CREATE TABLE `mesa` (
  `id_mesa` int(11) NOT NULL,
  `nombre_mesa` varchar(10) NOT NULL DEFAULT 'Mesa',
  `numero` int(11) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mesa`
--

INSERT INTO `mesa` (`id_mesa`, `nombre_mesa`, `numero`, `estado`) VALUES
(2, 'Mesa', 2, 0),
(4, 'Mesa', 4, 1),
(5, 'Mesa', 5, 0),
(6, 'Mesa', 3, 0),
(11, 'Mesa', 1, 1),
(12, 'Mesa', 6, 1),
(13, 'Mesa', 7, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `Id_orden` int(11) NOT NULL,
  `mesa` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `producto` varchar(90) NOT NULL,
  `total` int(11) NOT NULL,
  `anexo` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`Id_orden`, `mesa`, `cantidad`, `producto`, `total`, `anexo`) VALUES
(12, 1, 20, 'papas', 40, 'sdfsdfsd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_ingrediente`
--

CREATE TABLE `producto_ingrediente` (
  `id_pro_ing` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_ingrediente` int(11) NOT NULL,
  `id_uni_m` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `exclusion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_inventario`
--

CREATE TABLE `producto_inventario` (
  `id_producto_inv` int(11) NOT NULL,
  `nombre_prod_inv` varchar(255) NOT NULL,
  `costo_prod_inv` int(11) NOT NULL,
  `precio_prod_inv` int(11) NOT NULL,
  `u_medida_prod_inv` int(11) NOT NULL,
  `u_disp_prod_inv` int(11) DEFAULT 0,
  `u_vend_prod_inv` int(11) DEFAULT 0,
  `u_comp_prod_inv` int(11) DEFAULT 0,
  `u_elim_prod_inv` int(11) DEFAULT 0,
  `descrip_prod_inv` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto_inventario`
--

INSERT INTO `producto_inventario` (`id_producto_inv`, `nombre_prod_inv`, `costo_prod_inv`, `precio_prod_inv`, `u_medida_prod_inv`, `u_disp_prod_inv`, `u_vend_prod_inv`, `u_comp_prod_inv`, `u_elim_prod_inv`, `descrip_prod_inv`) VALUES
(5, 'papas', 123, 123, 1, 248, 0, 248, 0, 'verduea'),
(6, 'carne', 4, 5, 2, 79, 0, 79, 0, 'wwwe'),
(7, 'azucar', 99, 999, 1, 89, 0, 0, 10, '99'),
(8, 'papas', 25, 296, 3, 90, 0, 90, 0, 'vvvvv');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_menu`
--

CREATE TABLE `producto_menu` (
  `id_producto_m` int(11) NOT NULL,
  `nombre_prod_m` varchar(255) NOT NULL,
  `costo_prod_m` int(11) NOT NULL,
  `precio_prod_m` int(11) NOT NULL,
  `id_uni_m` int(11) NOT NULL,
  `estado_prod_m` int(11) DEFAULT 1,
  `visible_prod_m` int(11) DEFAULT 1,
  `tmprepa_prod_m` varchar(255) DEFAULT NULL,
  `descrip_prod_m` varchar(255) NOT NULL,
  `id_cat_prod_menu` int(11) NOT NULL,
  `img` mediumblob DEFAULT NULL,
  `nombre_img` varchar(100) DEFAULT NULL,
  `tipo_img` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto_menu`
--

INSERT INTO `producto_menu` (`id_producto_m`, `nombre_prod_m`, `costo_prod_m`, `precio_prod_m`, `id_uni_m`, `estado_prod_m`, `visible_prod_m`, `tmprepa_prod_m`, `descrip_prod_m`, `id_cat_prod_menu`, `img`, `nombre_img`, `tipo_img`) VALUES
(21, 'hamburguesa', 15, 20, 1, 1, 1, '25 mins', 'Hmburguesa de carne con mucha salsa y sal', 69, 0x496d6167656e65735f4e75657661732f323366366433376634392e6a7067, 'Imagenes_Nuevas/23f6d37f49.jpg', 'image/jpeg'),
(22, 'Desayuno', 23, 33, 5, 1, 1, '20 mins', 'Desayuno con huevos y ensalada con un pan tostado', 66, 0x496d6167656e65735f4e75657661732f646430386538666331372e6a7067, 'Imagenes_Nuevas/dd08e8fc17.jpg', 'image/jpeg'),
(23, 'pastel falso', 25, 30, 1, 1, 1, '25 mins', 'Pastel de dibujo que no sirve para nada', 66, 0x496d6167656e65735f4e75657661732f333732326466663637632e706e67, 'Imagenes_Nuevas/3722dff67c.png', 'image/png'),
(24, 'hamburguesa de pollo', 33, 44, 5, 1, 1, '25 mins', 'Hmburguesa de carne con mucha salsa y sal pero es de pollo', 66, 0x496d6167656e65735f4e75657661732f656232396433656237382e6a7067, 'Imagenes_Nuevas/eb29d3eb78.jpg', 'image/jpeg'),
(25, 'cafe', 10, 20, 2, 1, 1, '15 mins', 'Cafe con sal', 66, 0x496d6167656e65735f4e75657661732f333861303434643832302e6a7067, 'Imagenes_Nuevas/38a044d820.jpg', 'image/jpeg'),
(26, 'Soda', 33, 44, 1, 1, 1, '20 mins', 'Soda de limon y mucho hielo con sal y chile', 68, 0x496d6167656e65735f4e75657661732f366238633062343031372e706e67, 'Imagenes_Nuevas/6b8c0b4017.png', 'image/png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcajaefectivo`
--

CREATE TABLE `tbcajaefectivo` (
  `id` int(11) NOT NULL,
  `efectivo` int(11) NOT NULL,
  `usuarioinicio` varchar(250) DEFAULT NULL,
  `hora_apertura` time NOT NULL,
  `usuariofin` varchar(250) DEFAULT NULL,
  `hora_cierre` time DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbcajaefectivo`
--

INSERT INTO `tbcajaefectivo` (`id`, `efectivo`, `usuarioinicio`, `hora_apertura`, `usuariofin`, `hora_cierre`, `fecha`, `estado`) VALUES
(41, 100, 'aux', '04:06:46', 'admin', '04:07:49', '2021-10-09', 0),
(42, 5, 'admin', '04:11:20', 'admin', '04:46:07', '2021-10-07', 0),
(43, 100, 'aux', '04:16:21', 'admin', '04:28:39', '2021-10-09', 0),
(44, 25, 'admin', '04:44:46', 'admin', '04:52:57', '2021-10-07', 0),
(45, 1, 'aux', '04:53:12', 'admin', '04:09:09', '2021-10-09', 0),
(46, 1999, 'aux', '04:54:30', 'admin', '04:27:57', '2021-10-09', 0),
(47, 400, 'admin', '04:08:05', 'aux', '04:27:43', '2021-10-09', 0),
(48, 200, 'admin', '06:39:33', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbgastos`
--

CREATE TABLE `tbgastos` (
  `id` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Descripcion` varchar(300) NOT NULL,
  `Tipo_Transaccion` varchar(300) NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbgastos`
--

INSERT INTO `tbgastos` (`id`, `Cantidad`, `Descripcion`, `Tipo_Transaccion`, `Total`) VALUES
(86, 5, 'pago de empleados', 'egreso', 500),
(87, 2, 'pagos de  basura', 'egreso', 10),
(88, 1, 'coca', 'egreso', 5),
(89, 2, 'pepsi', 'egreso', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `toma_orden`
--

CREATE TABLE `toma_orden` (
  `id_orden` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) DEFAULT NULL,
  `id_producto_m` int(11) NOT NULL,
  `id_det_orden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `toma_orden`
--

INSERT INTO `toma_orden` (`id_orden`, `cantidad`, `precio`, `id_producto_m`, `id_det_orden`) VALUES
(21, 25, 1, 21, 22),
(22, 3, 1, 25, 22),
(31, 5, 20, 21, 25),
(32, 2, 30, 23, 26),
(33, 3, 44, 26, 26),
(34, 1, 44, 24, 26),
(41, 1, 33, 22, 22),
(45, 3, 33, 22, 4),
(46, 2, 44, 24, 4),
(50, 5, 20, 25, 4),
(55, 3, 44, 24, 22),
(56, 3, 20, 25, 31),
(69, 2, 20, 21, 35);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_medida`
--

CREATE TABLE `unidad_medida` (
  `id_uni_m` int(11) NOT NULL,
  `nombre_uni` varchar(100) NOT NULL,
  `simbolo_uni` varchar(50) NOT NULL,
  `valor_uni` int(50) NOT NULL,
  `simbolo_valor_uni` varchar(50) NOT NULL,
  `tipo_uni` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `unidad_medida`
--

INSERT INTO `unidad_medida` (`id_uni_m`, `nombre_uni`, `simbolo_uni`, `valor_uni`, `simbolo_valor_uni`, `tipo_uni`) VALUES
(1, 'Kilogramo', 'kg', 1000, 'gr', 'masa'),
(2, 'gramo', 'gr', 1, 'gr', 'masa'),
(3, 'miligramo', 'mg', 0, 'gr', 'masa'),
(4, 'onza', 'oz', 28, 'gr', 'masa'),
(5, 'libra', 'lb', 454, 'gr', 'masa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `permiso` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `contraseña`, `permiso`) VALUES
(1, 'admin', '123', 'Administrador'),
(3, 'aux', '123', 'Auxiliar');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caja_gasto`
--
ALTER TABLE `caja_gasto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_caja` (`id_caja`),
  ADD KEY `id_gasto` (`id_gasto`);

--
-- Indices de la tabla `categoria_prod_menu`
--
ALTER TABLE `categoria_prod_menu`
  ADD PRIMARY KEY (`id_cat_prod_menu`);

--
-- Indices de la tabla `compra_producto`
--
ALTER TABLE `compra_producto`
  ADD PRIMARY KEY (`id_compra_prod`),
  ADD KEY `id_compra` (`id_compra`),
  ADD KEY `id_producto_inv` (`id_producto_inv`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD PRIMARY KEY (`id_det_orden`),
  ADD KEY `id_mesa` (`id_mesa`);

--
-- Indices de la tabla `extra_prod_menu`
--
ALTER TABLE `extra_prod_menu`
  ADD PRIMARY KEY (`id_extra_prod_m`),
  ADD KEY `unidad_mediada` (`unidad_mediada`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`);

--
-- Indices de la tabla `mesa`
--
ALTER TABLE `mesa`
  ADD PRIMARY KEY (`id_mesa`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`Id_orden`);

--
-- Indices de la tabla `producto_ingrediente`
--
ALTER TABLE `producto_ingrediente`
  ADD PRIMARY KEY (`id_pro_ing`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_ingrediente` (`id_ingrediente`),
  ADD KEY `id_uni_m` (`id_uni_m`);

--
-- Indices de la tabla `producto_inventario`
--
ALTER TABLE `producto_inventario`
  ADD PRIMARY KEY (`id_producto_inv`),
  ADD KEY `u_medida_prod_inv` (`u_medida_prod_inv`);

--
-- Indices de la tabla `producto_menu`
--
ALTER TABLE `producto_menu`
  ADD PRIMARY KEY (`id_producto_m`),
  ADD KEY `id_uni_m` (`id_uni_m`),
  ADD KEY `id_cat_prod_menu` (`id_cat_prod_menu`);

--
-- Indices de la tabla `tbcajaefectivo`
--
ALTER TABLE `tbcajaefectivo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbgastos`
--
ALTER TABLE `tbgastos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `toma_orden`
--
ALTER TABLE `toma_orden`
  ADD PRIMARY KEY (`id_orden`),
  ADD KEY `id_producto_m` (`id_producto_m`,`id_det_orden`),
  ADD KEY `id_det_orden` (`id_det_orden`);

--
-- Indices de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  ADD PRIMARY KEY (`id_uni_m`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caja_gasto`
--
ALTER TABLE `caja_gasto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `categoria_prod_menu`
--
ALTER TABLE `categoria_prod_menu`
  MODIFY `id_cat_prod_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `compra_producto`
--
ALTER TABLE `compra_producto`
  MODIFY `id_compra_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  MODIFY `id_det_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `extra_prod_menu`
--
ALTER TABLE `extra_prod_menu`
  MODIFY `id_extra_prod_m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT de la tabla `mesa`
--
ALTER TABLE `mesa`
  MODIFY `id_mesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `Id_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `producto_ingrediente`
--
ALTER TABLE `producto_ingrediente`
  MODIFY `id_pro_ing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `producto_inventario`
--
ALTER TABLE `producto_inventario`
  MODIFY `id_producto_inv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `producto_menu`
--
ALTER TABLE `producto_menu`
  MODIFY `id_producto_m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `tbcajaefectivo`
--
ALTER TABLE `tbcajaefectivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `tbgastos`
--
ALTER TABLE `tbgastos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de la tabla `toma_orden`
--
ALTER TABLE `toma_orden`
  MODIFY `id_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  MODIFY `id_uni_m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `caja_gasto`
--
ALTER TABLE `caja_gasto`
  ADD CONSTRAINT `caja_gasto_ibfk_1` FOREIGN KEY (`id_caja`) REFERENCES `tbcajaefectivo` (`id`),
  ADD CONSTRAINT `caja_gasto_ibfk_2` FOREIGN KEY (`id_gasto`) REFERENCES `tbgastos` (`id`);

--
-- Filtros para la tabla `compra_producto`
--
ALTER TABLE `compra_producto`
  ADD CONSTRAINT `compra_producto_ibfk_1` FOREIGN KEY (`id_compra`) REFERENCES `detalle_compra` (`id_compra`),
  ADD CONSTRAINT `compra_producto_ibfk_2` FOREIGN KEY (`id_producto_inv`) REFERENCES `producto_inventario` (`id_producto_inv`);

--
-- Filtros para la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `detalle_compra_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD CONSTRAINT `detalle_orden_ibfk_1` FOREIGN KEY (`id_mesa`) REFERENCES `mesa` (`id_mesa`);

--
-- Filtros para la tabla `extra_prod_menu`
--
ALTER TABLE `extra_prod_menu`
  ADD CONSTRAINT `extra_prod_menu_ibfk_1` FOREIGN KEY (`unidad_mediada`) REFERENCES `unidad_medida` (`id_uni_m`);

--
-- Filtros para la tabla `producto_ingrediente`
--
ALTER TABLE `producto_ingrediente`
  ADD CONSTRAINT `producto_ingrediente_ibfk_1` FOREIGN KEY (`id_ingrediente`) REFERENCES `producto_inventario` (`id_producto_inv`),
  ADD CONSTRAINT `producto_ingrediente_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto_menu` (`id_producto_m`),
  ADD CONSTRAINT `producto_ingrediente_ibfk_3` FOREIGN KEY (`id_uni_m`) REFERENCES `unidad_medida` (`id_uni_m`);

--
-- Filtros para la tabla `producto_inventario`
--
ALTER TABLE `producto_inventario`
  ADD CONSTRAINT `producto_inventario_ibfk_1` FOREIGN KEY (`u_medida_prod_inv`) REFERENCES `unidad_medida` (`id_uni_m`);

--
-- Filtros para la tabla `producto_menu`
--
ALTER TABLE `producto_menu`
  ADD CONSTRAINT `producto_menu_ibfk_1` FOREIGN KEY (`id_uni_m`) REFERENCES `unidad_medida` (`id_uni_m`),
  ADD CONSTRAINT `producto_menu_ibfk_2` FOREIGN KEY (`id_cat_prod_menu`) REFERENCES `categoria_prod_menu` (`id_cat_prod_menu`);

--
-- Filtros para la tabla `toma_orden`
--
ALTER TABLE `toma_orden`
  ADD CONSTRAINT `toma_orden_ibfk_2` FOREIGN KEY (`id_producto_m`) REFERENCES `producto_menu` (`id_producto_m`),
  ADD CONSTRAINT `toma_orden_ibfk_3` FOREIGN KEY (`id_det_orden`) REFERENCES `detalle_orden` (`id_det_orden`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
