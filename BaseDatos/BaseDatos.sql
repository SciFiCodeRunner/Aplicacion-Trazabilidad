-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 04-06-2017 a las 20:44:51
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `trazabilidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abscisas`
--

CREATE TABLE `abscisas` (
  `descripcion` varchar(45) DEFAULT 'sin descripción',
  `idAbscisa` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `volumen_llenado_teorico` decimal(10,2) NOT NULL DEFAULT '0.00',
  `volumen_excavado_teorico` decimal(10,2) NOT NULL DEFAULT '0.00',
  `estadoAbscisa` tinyint(1) NOT NULL DEFAULT '1',
  `volumen_excavado_obra` decimal(10,2) NOT NULL DEFAULT '0.00',
  `volumen_llenado_obra` decimal(10,2) NOT NULL DEFAULT '0.00',
  `coef_real_excavado` decimal(10,2) NOT NULL DEFAULT '0.00',
  `coef_real_llenado` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `abscisas`
--

INSERT INTO `abscisas` (`descripcion`, `idAbscisa`, `nombre`, `volumen_llenado_teorico`, `volumen_excavado_teorico`, `estadoAbscisa`, `volumen_excavado_obra`, `volumen_llenado_obra`, `coef_real_excavado`, `coef_real_llenado`) VALUES
('E', 21, 'K0+100', '4.00', '1.00', 1, '2.00', '1.00', '3.00', '6.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `choferes`
--

CREATE TABLE `choferes` (
  `cedula` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `idChofer` int(11) NOT NULL,
  `estadoChofer` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `choferes`
--

INSERT INTO `choferes` (`cedula`, `nombre`, `telefono`, `idChofer`, `estadoChofer`) VALUES
(16721731, 'Juan Carlos Vargas', '3004231410', 20, 1),
(7415310, 'Sebastian Salazar', '3204161514', 21, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `idEmpresa` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `estadoEmpresa` int(11) NOT NULL DEFAULT '1',
  `direccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`idEmpresa`, `nombre`, `estadoEmpresa`, `direccion`) VALUES
(1, 'Camu', 0, 'wd233'),
(2, 'Argos', 0, ''),
(3, 'constructora occidente', 0, ''),
(8, 'Sin empresa', 0, 'no aplica'),
(9, 'Latin Transportes', 1, 'Bogota Dc'),
(10, 'Ceron Ingenieria', 1, 'Bogota Dc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE `materiales` (
  `idMaterial` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(80) NOT NULL,
  `compactacion` decimal(10,0) NOT NULL DEFAULT '0',
  `precio` decimal(10,0) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materiales`
--

INSERT INTO `materiales` (`idMaterial`, `nombre`, `descripcion`, `compactacion`, `precio`) VALUES
(1, 'Sub-Rasante', 'estable', '1', '4500'),
(2, 'base', 'material en buen estado', '2', '70000'),
(3, 'Sub-base', 'excelente', '2', '6855'),
(4, 'filtrante', 'bien', '2', '89000'),
(5, 'terraplen', 'material', '2', '450000'),
(6, 'materialComun', 'material', '2', '20000'),
(7, 'pedraplen', 'material', '1', '87000'),
(8, 'MaterialNuevo', 'buen estado', '2', '30000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obra`
--

CREATE TABLE `obra` (
  `nombreObra` varchar(40) NOT NULL,
  `Responsable` varchar(40) NOT NULL,
  `idObra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `name` int(11) NOT NULL,
  `code` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos_transporte`
--

CREATE TABLE `vehiculos_transporte` (
  `placa` varchar(6) NOT NULL,
  `cantidad_viajes` int(11) DEFAULT NULL,
  `volumen_carga` decimal(15,0) DEFAULT NULL,
  `volumen_transportado` decimal(15,0) DEFAULT NULL,
  `costo_acarreo` decimal(15,0) DEFAULT NULL,
  `Empresa_idEmpresa` int(11) DEFAULT NULL,
  `idVehiculo` int(11) NOT NULL,
  `Choferes_idChofer` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vehiculos_transporte`
--

INSERT INTO `vehiculos_transporte` (`placa`, `cantidad_viajes`, `volumen_carga`, `volumen_transportado`, `costo_acarreo`, `Empresa_idEmpresa`, `idVehiculo`, `Choferes_idChofer`, `estado`) VALUES
('SQT825', 6, '15', NULL, '60000', 10, 19, 21, 1),
('92928', NULL, '333', NULL, '33', 8, 22, 20, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo_transporte_material`
--

CREATE TABLE `vehiculo_transporte_material` (
  `fecha` date NOT NULL,
  `numeroRecibo` varchar(10) NOT NULL,
  `observaciones` varchar(45) DEFAULT NULL,
  `idVehiculo` int(11) NOT NULL,
  `idMaterial` int(11) NOT NULL,
  `id_abscisa_cargue` int(11) NOT NULL,
  `id_abscisa_descargue` int(11) NOT NULL,
  `cantidadMaterial` decimal(10,0) NOT NULL,
  `estadoTrans` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vehiculo_transporte_material`
--

INSERT INTO `vehiculo_transporte_material` (`fecha`, `numeroRecibo`, `observaciones`, `idVehiculo`, `idMaterial`, `id_abscisa_cargue`, `id_abscisa_descargue`, `cantidadMaterial`, `estadoTrans`) VALUES
('2017-06-22', 'Nº23', '32', 19, 3, 21, 21, '23', 1),
('2017-06-22', 'Nº33', 'sdsd', 19, 6, 21, 21, '12', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abscisas`
--
ALTER TABLE `abscisas`
  ADD PRIMARY KEY (`idAbscisa`);

--
-- Indices de la tabla `choferes`
--
ALTER TABLE `choferes`
  ADD PRIMARY KEY (`idChofer`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`idEmpresa`);

--
-- Indices de la tabla `materiales`
--
ALTER TABLE `materiales`
  ADD PRIMARY KEY (`idMaterial`);

--
-- Indices de la tabla `obra`
--
ALTER TABLE `obra`
  ADD PRIMARY KEY (`idObra`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`name`);

--
-- Indices de la tabla `vehiculos_transporte`
--
ALTER TABLE `vehiculos_transporte`
  ADD PRIMARY KEY (`idVehiculo`),
  ADD UNIQUE KEY `Choferes_idChofer` (`Choferes_idChofer`),
  ADD UNIQUE KEY `Choferes_idChofer_4` (`Choferes_idChofer`),
  ADD KEY `fk_Vehiculos_Transporte_Empresa1_idx` (`Empresa_idEmpresa`),
  ADD KEY `fk_Vehiculos_Transporte_Choferes1_idx` (`Choferes_idChofer`),
  ADD KEY `Choferes_idChofer_2` (`Choferes_idChofer`),
  ADD KEY `Choferes_idChofer_3` (`Choferes_idChofer`),
  ADD KEY `Choferes_idChofer_5` (`Choferes_idChofer`);

--
-- Indices de la tabla `vehiculo_transporte_material`
--
ALTER TABLE `vehiculo_transporte_material`
  ADD PRIMARY KEY (`numeroRecibo`),
  ADD KEY `fk_Vehiculo_Transporte_Material_Vehiculos_Transporte1_idx` (`idVehiculo`),
  ADD KEY `fk_Vehiculo_Transporte_Material_Materiales1_idx` (`idMaterial`),
  ADD KEY `fk_vehiculo_transporte_material_abscisas1_idx` (`id_abscisa_cargue`),
  ADD KEY `fk_vehiculo_transporte_material_abscisas2_idx` (`id_abscisa_descargue`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abscisas`
--
ALTER TABLE `abscisas`
  MODIFY `idAbscisa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `choferes`
--
ALTER TABLE `choferes`
  MODIFY `idChofer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `materiales`
--
ALTER TABLE `materiales`
  MODIFY `idMaterial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `obra`
--
ALTER TABLE `obra`
  MODIFY `idObra` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `vehiculos_transporte`
--
ALTER TABLE `vehiculos_transporte`
  MODIFY `idVehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `vehiculos_transporte`
--
ALTER TABLE `vehiculos_transporte`
  ADD CONSTRAINT `fk_Vehiculos_Transporte_Choferes1` FOREIGN KEY (`Choferes_idChofer`) REFERENCES `choferes` (`idChofer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Vehiculos_Transporte_Empresa1` FOREIGN KEY (`Empresa_idEmpresa`) REFERENCES `empresas` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vehiculo_transporte_material`
--
ALTER TABLE `vehiculo_transporte_material`
  ADD CONSTRAINT `fk_Vehiculo_Transporte_Material_Materiales1` FOREIGN KEY (`idMaterial`) REFERENCES `materiales` (`idMaterial`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Vehiculo_Transporte_Material_Vehiculos_Transporte1` FOREIGN KEY (`idVehiculo`) REFERENCES `vehiculos_transporte` (`idVehiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vehiculo_transporte_material_abscisas1` FOREIGN KEY (`id_abscisa_cargue`) REFERENCES `abscisas` (`idAbscisa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vehiculo_transporte_material_abscisas2` FOREIGN KEY (`id_abscisa_descargue`) REFERENCES `abscisas` (`idAbscisa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
