-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-05-2017 a las 05:41:30
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30
create database juego;
use juego;
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
  `descripcion` varchar(45) NOT NULL,
  `idAbscisa` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `volumen_llenado_teorico` decimal(10,0) NOT NULL DEFAULT '0',
  `volumen_excavado_teorico` decimal(10,0) NOT NULL DEFAULT '0',
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
('500m al lado del rio', 1, 'k0+100', '20', '10', 1, '22.00', '15.00', '0.00', '0.00'),
('presenta mucha piedra caliza', 2, 'k0+200', '35', '40', 1, '37.00', '42.00', '0.00', '0.00'),
('no presenta inconvenientes', 3, 'k0+300', '35', '40', 1, '0.00', '0.00', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `choferes`
--

CREATE TABLE `choferes` (
  `cedula` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `idChofer` int(11) NOT NULL,
  `estadoChofer` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `choferes`
--

INSERT INTO `choferes` (`cedula`, `nombre`, `telefono`, `direccion`, `idChofer`, `estadoChofer`) VALUES
(45632, 'seebas cam', '35553', '123', 1, 0),
(417932233, 'carlos andres', '736892', 'ciudadela moca', 2, 0),
(873398289, 'alfonso lopez', '7936922', 'caminos campo', 3, 1),
(939702739, 'andres prado', '73682833', 'caminos campo', 4, 1),
(7937903, 'camilo triana', '94720823', 'mocawa 4 #6 esquina', 5, 1),
(93792083, 'arnulfo pardo', '9289773', 'barrio 7 agosto mz 16 #16', 6, 1),
(82698223, 'carlos enrique', '927923', 'colinitas 5#5', 7, 1),
(9279232, 'armando casas', '765934', 'valles comfandi', 8, 1),
(82693422, 'johany rivera', '09372932', 'corralitos campos km2', 9, 1),
(83729823, 'juan carlos robledo', '97293023', 'barrio nuevo bolivar mz4 #29', 10, 1),
(97233442, 'mike steven pulgarin', '31387634', 'barrio la selva mz 1#7', 11, 1),
(1838932, 'cristian camilo', '87389322', 'barrio acacias mz 5 casa 5', 12, 1),
(109308232, 'sebastian robledo', '87392323', 'barrio la selva 6# 7', 13, 1),
(1039038023, 'j mario', '315689772', 'barrio simon bolivar carrera 34 #89', 14, 1),
(198912312, 'elmo', '2920292', 'barrio militar', 15, 1),
(9731233, 'andres verdana', '1980222', 'barrio jardin #6casa 7', 16, 1),
(0, 'a', 'a', 'a', 17, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `idEmpresa` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`idEmpresa`, `nombre`) VALUES
(1, 'Camu'),
(2, 'Argos'),
(3, 'constructora occidente'),
(4, 'arabia highs');

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
(5, 'dsff', 'fsef', '0', '0'),
(6, 'sub', 'piedra caliza', '10', '10');

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
('LYJ98A', 0, '2', '45', '78500', 1, 1, 13, 1),
('kmx834', 0, '5', '0', '0', 1, 3, 1, 1),
('mnu988', 0, '55', '58', '900000', 1, 5, 7, 0),
('juy809', 0, '0', '0', '0', 1, 6, 12, 0),
('mnr903', 0, '0', '0', '0', 1, 7, 10, 0),
('ujh89', 0, '0', '0', '0', 1, 9, 15, 0),
('klg423', 0, '0', '0', '0', 1, 10, 10, 1),
('jhd884', 0, '0', '0', '0', 1, 11, 9, 0),
('vrt654', 0, '0', '0', '0', 1, 12, 2, 1),
('hiw777', 0, '0', '0', '0', 1, 13, 15, 1),
('5432er', 0, '0', '0', '0', 1, 20, 2, 1),
('aba987', 0, '0', '0', '0', 1, 21, 16, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo_transporte_material`
--

CREATE TABLE `vehiculo_transporte_material` (
  `fecha` date NOT NULL,
  `numeroRecibo` int(11) NOT NULL,
  `observaciones` varchar(45) DEFAULT NULL,
  `idVehiculo` int(11) NOT NULL,
  `idMaterial` int(11) NOT NULL,
  `id_abscisa_cargue` int(11) NOT NULL,
  `id_abscisa_descargue` int(11) NOT NULL,
  `cantidadMaterial` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vehiculo_transporte_material`
--

INSERT INTO `vehiculo_transporte_material` (`fecha`, `numeroRecibo`, `observaciones`, `idVehiculo`, `idMaterial`, `id_abscisa_cargue`, `id_abscisa_descargue`, `cantidadMaterial`) VALUES
('2017-05-12', 4, '2', 7, 4, 2, 1, '20'),
('2017-05-12', 6, 'eeee', 1, 3, 2, 1, '10'),
('2017-05-12', 44, 'bueno', 3, 1, 2, 1, '100'),
('2017-05-12', 67, 'a', 1, 3, 1, 1, '13'),
('2017-05-13', 77, 'maamsita me la como', 1, 6, 2, 3, '100');

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
  ADD KEY `fk_Vehiculos_Transporte_Empresa1_idx` (`Empresa_idEmpresa`),
  ADD KEY `fk_Vehiculos_Transporte_Choferes1_idx` (`Choferes_idChofer`);

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
  MODIFY `idAbscisa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `choferes`
--
ALTER TABLE `choferes`
  MODIFY `idChofer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `materiales`
--
ALTER TABLE `materiales`
  MODIFY `idMaterial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `obra`
--
ALTER TABLE `obra`
  MODIFY `idObra` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `vehiculos_transporte`
--
ALTER TABLE `vehiculos_transporte`
  MODIFY `idVehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
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
