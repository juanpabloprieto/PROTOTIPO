-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-08-2014 a las 21:41:54
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_sia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuraciones`
--

CREATE TABLE IF NOT EXISTS `configuraciones` (
  `id_config` int(10) NOT NULL AUTO_INCREMENT,
  `tempmin` int(10) NOT NULL,
  `tempmax` int(10) NOT NULL,
  `humedadmin` int(10) NOT NULL,
  `humedadmax` int(10) NOT NULL,
  `id_users` int(10) NOT NULL,
  PRIMARY KEY (`id_config`),
  KEY `id_users` (`id_users`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `configuraciones`
--

INSERT INTO `configuraciones` (`id_config`, `tempmin`, `tempmax`, `humedadmin`, `humedadmax`, `id_users`) VALUES
(1, 10, 35, 21, 52, 2),
(2, 20, 40, 14, 80, 2),
(3, 90, 99, 2, 15, 2),
(4, 80, 98, 3, 14, 2),
(5, 15, 88, 8, 15, 2),
(6, 80, 99, 5, 16, 2),
(7, 1, 2, 5, 17, 2),
(8, 50, 90, 5, 16, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cultivos`
--

CREATE TABLE IF NOT EXISTS `cultivos` (
  `id_cultivo` int(10) NOT NULL AUTO_INCREMENT,
  `nombrecultivo` varchar(50) NOT NULL,
  `variedad` varchar(50) NOT NULL,
  `cant` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `fechap` varchar(60) NOT NULL,
  `fechac` varchar(60) NOT NULL,
  `tempmin` int(10) NOT NULL,
  `tempmax` int(10) NOT NULL,
  `humedadmin` int(11) NOT NULL,
  `humedadmax` int(11) NOT NULL,
  PRIMARY KEY (`id_cultivo`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cultivos`
--

INSERT INTO `cultivos` (`id_cultivo`, `nombrecultivo`, `variedad`, `cant`, `id_usuario`, `fechap`, `fechac`, `tempmin`, `tempmax`, `humedadmin`, `humedadmax`) VALUES
(1, 'Tomate', 'Perita', 8549384, 2, '17/08/2014', '15/10/2014', 19, 19, 16, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadisticas`
--

CREATE TABLE IF NOT EXISTS `estadisticas` (
  `id_datetime` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` datetime NOT NULL,
  `temp` int(10) NOT NULL,
  `humedad` int(11) NOT NULL,
  PRIMARY KEY (`id_datetime`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=43 ;

--
-- Volcado de datos para la tabla `estadisticas`
--

INSERT INTO `estadisticas` (`id_datetime`, `datetime`, `temp`, `humedad`) VALUES
(1, '2014-07-26 20:13:47', 450, 1023),
(2, '2014-07-26 20:13:59', 450, 1023),
(3, '2014-07-26 20:14:12', 450, 1023),
(4, '2014-07-26 20:14:24', 450, 1023),
(5, '2014-07-26 20:14:37', 450, 1023),
(6, '2014-07-26 20:14:50', 450, 1023),
(7, '2014-07-26 20:15:02', 450, 1023),
(8, '2014-08-17 20:52:47', 450, 546),
(9, '2014-08-17 20:52:57', 449, 476),
(10, '2014-08-17 20:53:00', 450, 256),
(11, '2014-08-17 20:52:49', 450, 259),
(12, '2014-08-17 20:52:58', 450, 721),
(13, '2014-08-17 20:53:01', 450, 871),
(14, '2014-08-17 20:53:03', 450, 921),
(15, '2014-08-17 20:53:02', 450, 870),
(16, '2014-08-17 20:53:08', 450, 748),
(17, '2014-08-17 20:53:08', 450, 315),
(18, '2014-08-17 20:53:09', 450, 803),
(19, '2014-08-17 21:16:38', 156, 422),
(20, '2014-08-17 21:16:49', 158, 424),
(21, '2014-08-17 21:16:52', 156, 423),
(22, '2014-08-17 21:16:55', 40, 153),
(23, '2014-08-17 21:17:04', -32, 36),
(24, '2014-08-17 21:17:07', -32, 36),
(25, '2014-08-17 21:17:14', 114, 336),
(26, '2014-08-17 21:17:21', 115, 335),
(27, '2014-08-17 21:17:32', 116, 338),
(28, '2014-08-17 21:17:34', 116, 336),
(29, '2014-08-17 21:17:38', 116, 338),
(30, '2014-08-17 21:17:39', 116, 338),
(31, '2014-08-17 21:17:48', 115, 337),
(32, '2014-08-17 21:17:50', 115, 337),
(33, '2014-08-17 21:17:59', -32, 36),
(34, '2014-08-17 21:18:04', -32, 36),
(35, '2014-08-17 21:18:11', 244, 612),
(36, '2014-08-17 21:18:12', 195, 583),
(37, '2014-08-17 21:18:13', 245, 602),
(38, '2014-08-17 21:18:17', 266, 649),
(39, '2014-08-17 21:18:18', 266, 650),
(40, '2014-08-17 21:18:23', 266, 645),
(41, '2014-08-17 21:18:24', 265, 646),
(42, '2014-08-17 21:18:28', 266, 647);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `direccion` varchar(70) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nombres`, `apellidos`, `direccion`, `telefono`, `email`) VALUES
(1, 'JUAN PABLO', '7e4b64eb65e34fdfad79e623c44abd94', 'JUAN PABLO', 'PRIETO', 'ENCAR', '0975642695', 'prietojuanpablo763@gmail.com'),
(2, 'ADMIN', '21232f297a57a5a743894a0e4a801fc3', 'ADMIN', 'ADMIN', 'ADMIN', '89898', 'admin@gmail.com');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `configuraciones`
--
ALTER TABLE `configuraciones`
  ADD CONSTRAINT `configuraciones_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cultivos`
--
ALTER TABLE `cultivos`
  ADD CONSTRAINT `cultivos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
