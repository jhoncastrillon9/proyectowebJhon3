-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2018 at 01:02 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyectoweb32018`
--

-- --------------------------------------------------------

--
-- Table structure for table `perfiles`
--

CREATE TABLE `perfiles` (
  `pkid` int(9) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `fechaderegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechademodificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perfiles`
--

INSERT INTO `perfiles` (`pkid`, `nombre`, `fechaderegistro`, `fechademodificacion`) VALUES
(5, 'Administrador', '2018-08-31 01:46:38', '2018-08-31 01:46:38'),
(6, 'Usuario', '2018-08-31 01:46:38', '2018-08-31 01:46:38'),
(7, 'Cliente', '2018-08-31 01:47:00', '2018-08-31 01:47:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblclientes`
--

CREATE TABLE `tblclientes` (
  `pkid` bigint(18) NOT NULL,
  `identificacion` bigint(20) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `nombrecomercial` varchar(50) NOT NULL,
  `razonsocial` varchar(50) NOT NULL,
  `tipocliente` int(8) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `copiarut` varchar(50) NOT NULL,
  `cedulareplegal` varchar(50) NOT NULL,
  `replegal` varchar(50) NOT NULL,
  `fechaderegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechademodificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabla central de clientes';

-- --------------------------------------------------------

--
-- Table structure for table `tblpedidos_detalle`
--

CREATE TABLE `tblpedidos_detalle` (
  `pkid` bigint(20) NOT NULL,
  `referencia` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cantidad` int(4) NOT NULL,
  `valor` float NOT NULL,
  `impuestos` bigint(20) NOT NULL,
  `subtotal` bigint(20) NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='almacena el detalle del pedido';

-- --------------------------------------------------------

--
-- Table structure for table `tblpedidos_encabezado`
--

CREATE TABLE `tblpedidos_encabezado` (
  `pkid` bigint(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `nit` varchar(15) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `subtotal` bigint(20) NOT NULL,
  `impuestos` bigint(20) NOT NULL,
  `total` bigint(20) NOT NULL,
  `unidades` int(4) NOT NULL,
  `estado` int(1) NOT NULL,
  `token` varchar(100) NOT NULL,
  `nombreusuario` varchar(100) NOT NULL,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamodificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='almacena el encabezado de los pedidos';

-- --------------------------------------------------------

--
-- Table structure for table `tblproductos`
--

CREATE TABLE `tblproductos` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `proveedor` int(11) NOT NULL,
  `precio` float NOT NULL,
  `impuestos` int(11) NOT NULL,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechademodificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tipocategoria` int(11) NOT NULL,
  `referencia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproductos`
--

INSERT INTO `tblproductos` (`id`, `nombre`, `descripcion`, `imagen`, `proveedor`, `precio`, `impuestos`, `fecharegistro`, `fechademodificacion`, `tipocategoria`, `referencia`) VALUES
(1, 'IEM RIVAL', '\r\n	Operating System:&nbsp;Windows 10 Home (64-bit Edition) Perfect for most people with all the core features of Windows 10 including: automatic updates, Cortana and DirectX 12 graphics support (No Recovery Media) Today&#39;s Special Offers:&nbsp;Bullguard Internet Security 2018 for Windows PC with Game Booster! - 1 year - 3 User Licence Certificate:&nbsp;INTEL EXTREME MASTERS STICKER 2018 Case:&nbsp;Thermaltake Core G21 Black Mid-Tower Gaming Case w/ Tempered Glass Side Panels Case LED Lighting:&nbsp;None Selected Extra Case Fans (Standard, LED, RGB &amp; Corsair iCue):&nbsp;Default Case Fan Cyberpower Noise Reduction Technology:&nbsp;None Selected\r\n', '7e51d-01_win10v2_400.png', 1, 1250000, 19, '2018-09-28 01:47:23', '2018-09-28 01:51:52', 3, 'ref002331'),
(2, 'pc4 121212', '\r\n	saasas\r\n', 'de9a5-c05520071.png', 3, 225000, 19, '2018-09-28 01:50:51', '2018-09-28 01:50:51', 2, 'ref00233312'),
(3, 'IEM RIVAL IBM', '\r\n	Operating System:&nbsp;Windows 10 Home (64-bit Edition) Perfect for most people with all the core features of Windows 10 including: automatic updates, Cortana and DirectX 12 graphics support (No Recovery Media) Today&#39;s Special Offers:&nbsp;Bullguard Internet Security 2018 for Windows PC with Game Booster! - 1 year - 3 User Licence Certificate:&nbsp;INTEL EXTREME MASTERS STICKER 2018 Case:&nbsp;Thermaltake Core G21 Black Mid-Tower Gaming Case w/ Tempered Glass Side Panels Case LED Lighting:&nbsp;None Selected Extra Case Fans (Standard, LED, RGB &amp; Corsair iCue):&nbsp;Default Case Fan Cyberpower Noise Reduction Technology:&nbsp;None Selected\r\n', '2855d-275px-ibm_pc_5150.jpg', 1, 1250000, 19, '2018-09-28 01:51:38', '2018-09-28 01:53:05', 3, 'ref00233663'),
(4, 'TABLET 1', '\r\n	Operating System:&nbsp;Windows 10 Home (64-bit Edition) Perfect for most people with all the core features of Windows 10 including: automatic updates, Cortana and DirectX 12 graphics support (No Recovery Media) Today&#39;s Special Offers:&nbsp;Bullguard Internet Security 2018 for Windows PC with Game Booster! - 1 year - 3 User Licence Certificate:&nbsp;INTEL EXTREME MASTERS STICKER 2018 Case:&nbsp;Thermaltake Core G21 Black Mid-Tower Gaming Case w/ Tempered Glass Side Panels Case LED Lighting:&nbsp;None Selected Extra Case Fans (Standard, LED, RGB &amp; Corsair iCue):&nbsp;Default Case Fan Cyberpower Noise Reduction Technology:&nbsp;None Selected\r\n', 'c60d3-descarga.jpg', 1, 125000, 19, '2018-09-28 01:52:49', '2018-09-28 01:52:49', 4, 'ref00233666696'),
(5, 'iphone', '\r\n	Para saber si merece la pena comprar un iPhone 6s en 2018, debemos empezar por entender&nbsp;qu&eacute; se est&aacute; comprando&nbsp;con este modelo. El hardware del iPhone es tan s&oacute;lo una parte de la experiencia, formada tambi&eacute;n por el software y los servicios, pero s&iacute; que determinar&aacute; algunos aspectos de la longevidad de este dispositivo.\r\n\r\n	&nbsp;\r\n', 'a096f-images.jpg', 3, 2650000, 21, '2018-09-28 01:54:22', '2018-09-28 01:54:22', 4, 'ref00233212222'),
(6, 'IPHONE 7', '\r\n	Apple kicked off its annual Worldwide Developers Conference on Monday and as it does each and every year, it started off the big event with a keynote presentation. There are always tons of big announcements made during Apple&rsquo;s keynotes, which is obvious since software is such a huge and important part of Apple&rsquo;s products. At WWDC 2018, Apple took the wraps off of new versions of tvOS, watchOS, and macOS, showing off the latest and greatest features set to come to Apple&rsquo;s various product lines in 2018. Of course, the most popular products in Apple&rsquo;s portfolio are the iPhone and iPad, so iOS 12 was obviously the star of the show at WWDC 2018. Want to check out all of the best new iPhone and iPad features Apple showed off during its big WWDC 2018 keynote presentation? Don&rsquo;t worry because we&rsquo;ve got you covered right here.\r\n\r\n	&nbsp;\r\n', '91e47-images-1-.jpg', 3, 3652000, 21, '2018-09-28 01:58:04', '2018-09-28 01:58:04', 1, 'refo909090909');

-- --------------------------------------------------------

--
-- Table structure for table `tblproveedores`
--

CREATE TABLE `tblproveedores` (
  `pkid` bigint(18) NOT NULL,
  `identificacion` bigint(20) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `nombrecomercial` varchar(50) NOT NULL,
  `razonsocial` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `copiarut` varchar(50) NOT NULL,
  `cedulareplegal` varchar(50) NOT NULL,
  `replegal` varchar(50) NOT NULL,
  `fechaderegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechademodificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabla central de proveedores';

--
-- Dumping data for table `tblproveedores`
--

INSERT INTO `tblproveedores` (`pkid`, `identificacion`, `correo`, `nombrecomercial`, `razonsocial`, `telefono`, `direccion`, `copiarut`, `cedulareplegal`, `replegal`, `fechaderegistro`, `fechademodificacion`) VALUES
(1, 1711111, 'proveedor1@proveedor1.com', 'proveedor 2', 'proveedor 1', '2546336', 'calle 55 n 77 c 100, ap 604', '73b3b-firmaux.jpeg', '', '', '2018-09-28 01:22:17', '2018-09-28 01:22:17'),
(2, 21212121212, 'proveedor2@proveedor2.cpom', 'proveedor 2', 'proveedor 2', '5810522', 'calle 55 n 77 c 100, ap 604', '8c87a-firmaux.jpeg', '', '', '2018-09-28 01:23:00', '2018-09-28 01:23:00'),
(3, 5698966, 'proveedor3@proveedor3.com', 'proveedor 3', 'proveedor 3', '666333', '333113213212121', 'e59c7-firmaux.jpeg', '', '', '2018-09-28 01:23:41', '2018-09-28 01:23:41');

-- --------------------------------------------------------

--
-- Table structure for table `tblusuarios`
--

CREATE TABLE `tblusuarios` (
  `pkid` bigint(18) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `perfil` int(8) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `skype` varchar(20) NOT NULL,
  `whatsapp` varchar(15) NOT NULL,
  `fechaderegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechademodificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabla central de usuarios';

--
-- Dumping data for table `tblusuarios`
--

INSERT INTO `tblusuarios` (`pkid`, `correo`, `clave`, `nombre`, `perfil`, `telefono`, `direccion`, `foto`, `skype`, `whatsapp`, `fechaderegistro`, `fechademodificacion`) VALUES
(1, 'juanff@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'JUAN FERNANDO FERNANDEZ', 7, '58555222', '', '4a8d8-firmaux.jpeg', '', '', '2018-08-31 01:40:09', '2018-09-13 23:22:06'),
(2, 'user@correo.com', '348162101fc6f7e624681b7400b085eeac6df7bd', 'USUARIO 2', 6, '252000003', '', '', '', '', '2018-09-07 00:26:09', '2018-09-07 01:11:28');

-- --------------------------------------------------------

--
-- Table structure for table `tiposdeclientes`
--

CREATE TABLE `tiposdeclientes` (
  `pkid` int(9) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `fechaderegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechademodificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tiposdeclientes`
--

INSERT INTO `tiposdeclientes` (`pkid`, `nombre`, `fechaderegistro`, `fechademodificacion`) VALUES
(1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'ESPORADICO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'ESENCIAL Q', '2018-08-31 01:23:10', '2018-08-31 01:23:50');

-- --------------------------------------------------------

--
-- Table structure for table `tiposdeidentificacion`
--

CREATE TABLE `tiposdeidentificacion` (
  `pkid` int(9) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `fechaderegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechademodificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tiposdeidentificacion`
--

INSERT INTO `tiposdeidentificacion` (`pkid`, `nombre`, `fechaderegistro`, `fechademodificacion`) VALUES
(1, 'Cedula', '2018-09-07 01:20:46', '2018-09-07 01:20:46'),
(2, 'NIT', '2018-09-07 01:20:48', '2018-09-07 01:20:48'),
(3, 'Cedula de extranjería', '2018-09-07 01:20:54', '2018-09-07 01:20:54'),
(4, 'Pasaporte', '2018-09-07 01:20:57', '2018-09-07 01:20:57');

-- --------------------------------------------------------

--
-- Table structure for table `tiposdeproductos`
--

CREATE TABLE `tiposdeproductos` (
  `id` int(9) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `fechaderegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechademodificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tiposdeproductos`
--

INSERT INTO `tiposdeproductos` (`id`, `nombre`, `fechaderegistro`, `fechademodificacion`) VALUES
(1, 'Hogar', '2018-09-07 01:24:27', '2018-09-07 01:24:27'),
(2, 'Tecnología', '2018-09-07 01:24:36', '2018-09-07 01:24:36'),
(3, 'Mercado', '2018-09-07 01:24:44', '2018-09-07 01:24:44'),
(4, 'Varios', '2018-09-07 01:24:47', '2018-09-07 01:24:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`pkid`);

--
-- Indexes for table `tblclientes`
--
ALTER TABLE `tblclientes`
  ADD PRIMARY KEY (`pkid`);

--
-- Indexes for table `tblpedidos_detalle`
--
ALTER TABLE `tblpedidos_detalle`
  ADD PRIMARY KEY (`pkid`),
  ADD UNIQUE KEY `tokenxreferencia` (`referencia`,`token`);

--
-- Indexes for table `tblpedidos_encabezado`
--
ALTER TABLE `tblpedidos_encabezado`
  ADD PRIMARY KEY (`pkid`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `tblproductos`
--
ALTER TABLE `tblproductos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `referencia` (`referencia`);

--
-- Indexes for table `tblproveedores`
--
ALTER TABLE `tblproveedores`
  ADD PRIMARY KEY (`pkid`);

--
-- Indexes for table `tblusuarios`
--
ALTER TABLE `tblusuarios`
  ADD PRIMARY KEY (`pkid`);

--
-- Indexes for table `tiposdeclientes`
--
ALTER TABLE `tiposdeclientes`
  ADD PRIMARY KEY (`pkid`);

--
-- Indexes for table `tiposdeidentificacion`
--
ALTER TABLE `tiposdeidentificacion`
  ADD PRIMARY KEY (`pkid`);

--
-- Indexes for table `tiposdeproductos`
--
ALTER TABLE `tiposdeproductos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `pkid` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblclientes`
--
ALTER TABLE `tblclientes`
  MODIFY `pkid` bigint(18) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblpedidos_detalle`
--
ALTER TABLE `tblpedidos_detalle`
  MODIFY `pkid` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblpedidos_encabezado`
--
ALTER TABLE `tblpedidos_encabezado`
  MODIFY `pkid` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblproductos`
--
ALTER TABLE `tblproductos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblproveedores`
--
ALTER TABLE `tblproveedores`
  MODIFY `pkid` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblusuarios`
--
ALTER TABLE `tblusuarios`
  MODIFY `pkid` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tiposdeclientes`
--
ALTER TABLE `tiposdeclientes`
  MODIFY `pkid` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tiposdeidentificacion`
--
ALTER TABLE `tiposdeidentificacion`
  MODIFY `pkid` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tiposdeproductos`
--
ALTER TABLE `tiposdeproductos`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
