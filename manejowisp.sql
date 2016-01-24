-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-01-2016 a las 21:12:32
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `manejowisp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `dni` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion_ip` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_hot` text COLLATE utf8_spanish_ci NOT NULL,
  `pass_hot` text COLLATE utf8_spanish_ci NOT NULL,
  `frecuencia` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `observacion` text COLLATE utf8_spanish_ci NOT NULL,
  `id_nodo` int(11) NOT NULL,
  `id_plan` int(11) NOT NULL,
  `estado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `dni`, `nombre`, `direccion`, `telefono`, `email`, `direccion_ip`, `usuario_hot`, `pass_hot`, `frecuencia`, `observacion`, `id_nodo`, `id_plan`, `estado`, `fecha_registro`, `id_usuario`) VALUES
(1, 1143347200, 'Arnaldo Rafael Castilla Florez', 'Cra 58a # 6 - 88 Bella vista', '(+57) 5 - 6765877', 'arnaldo.castilla@hotmail.com', '192.168.1.1 - 192.168.1.100', 'acastilla', 'castillafa', '5 GHz', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi itaque, numquam culpa eaque voluptate placeat, repellat adipisci. Maxime consequatur ducimus, voluptatem, nam distinctio, iure officia accusantium cum obcaecati perspiciatis reprehenderit!                  ', 2, 3, 'Activo', '2015-12-21', 1),
(2, 1047464480, 'kat castila', 'cra 59b', '6765877', 'katecastilla99@hotmail.com', '192.168.1.200 - 192.168.1.250', '', '', '5 Ghz', 'N/A', 2, 2, 'No Activo', '2016-01-11', 1),
(3, 1047450824, 'Angelica Martinez', 'La Maria Cra 30 # 98 - 54', '6743223', 'angelicadelcarmen26@hotmail.com', '192.168.10.200 - 192.168.10.246', 'angie', 'angieM16', '2.4 Ghz', 'El Cliente pide que le agilicen el servicio', 7, 3, 'Activo', '2016-01-11', 1),
(4, 45458501, 'Judith Florez', 'Los Calamares Mz 91 L5', '6678270', 'judithm,.florez@gmail.com', '', '', '', '', '', 2, 2, 'Activo', '2016-01-11', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `nit` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_emp` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion_emp` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_emp` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` date NOT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nit`, `nombre_emp`, `direccion_emp`, `telefono_emp`, `email`, `fecha_registro`) VALUES
(3, '804008044-7', 'Mwispi', 'la bananananana', '(+57) (5) 6765877', 'mww@hotmail.com', '2015-12-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE IF NOT EXISTS `equipos` (
  `id_equipos` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_equi` text COLLATE utf8_spanish_ci NOT NULL,
  `tipo` text COLLATE utf8_spanish_ci NOT NULL,
  `marca` text COLLATE utf8_spanish_ci NOT NULL,
  `serie` text COLLATE utf8_spanish_ci NOT NULL,
  `mac` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` date NOT NULL,
  `id_nod_clie` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_equipos`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_equipos`, `nombre_equi`, `tipo`, `marca`, `serie`, `mac`, `fecha_registro`, `id_nod_clie`) VALUES
(1, 'Antena omnidireccional exterior', 'Omnidireccional', 'Tp - link', 'Bo75d5tgga', '13:ws:4e:45:dd:cd', '0000-00-00', 1143347200),
(2, 'Antena zona norte', 'Panel', 'Ubiquiti', 'b87ygghgf - p', '77:00:8u:99:99:JJ', '0000-00-00', 1047464480),
(3, 'El Mirador', 'Bullet m5', 'Ubiquiti', '77yy7y7777', 'ww:ss:ss:ss:2w:99', '0000-00-00', 2),
(4, 'Wlan Wifi', 'Wlan', 'Mikrotik', '6t6tttttttt', 'hg:00:99:00:00:10', '0000-00-00', 2),
(5, 'Demo', 'demo2', 'demo3', 'demo', 'demo4', '0000-00-00', 7),
(6, 'Pruebag', 'Prueba', 'Prueba', 'Prueba', 'Prueba', '0000-00-00', NULL),
(7, 'Nano Loco M5', 'Antena', 'Ubiquiti', 'B075d5', 'dd:44:33:22:dd:de:de', '0000-00-00', NULL),
(8, 'Cataly''s', 'Switch', 'TP -LINK', 'jh:ds:12:11:23:44:33', 'cc:ll:cc:lc:dl:cl', '2016-01-02', NULL),
(9, 'otro ', 'RED', 'PAJARITO', '12wwqw3-7', 'cc:ll:mm:cc:cf:dd', '2016-01-02', NULL),
(10, 'Omni', 'Antena', 'AIR MAX', '3e3e333-0', 'ss:ss:ss:ss:ss:ss', '2016-01-02', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE IF NOT EXISTS `facturas` (
  `id_fact` int(11) NOT NULL AUTO_INCREMENT,
  `cod_fact` int(11) NOT NULL,
  `inicio_fact` date NOT NULL,
  `fin_fact` date NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `estado_fact` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_fact` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_fact`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id_fact`, `cod_fact`, `inicio_fact`, `fin_fact`, `id_empresa`, `id_cliente`, `estado_fact`, `fecha_fact`, `id_usuario`) VALUES
(1, 1601121, '2016-01-01', '2016-01-31', 3, 1, 'No Pago', '2016-01-11', 1),
(2, 1601122, '2016-01-01', '2016-01-31', 3, 3, 'No Pago', '2016-01-11', 1),
(3, 1601123, '2016-01-01', '2016-01-31', 3, 4, 'No Pago', '2016-01-11', 1),
(4, 1601124, '2016-02-01', '2016-02-29', 3, 1, 'No Pago', '2016-01-11', 1),
(5, 1601125, '2016-02-01', '2016-02-29', 3, 3, 'No Pago', '2016-01-11', 1),
(6, 1601126, '2016-02-01', '2016-02-29', 3, 4, 'No Pago', '2016-01-11', 1),
(7, 1601247, '2016-01-23', '2016-02-23', 3, 1, 'No Pago', '2016-01-23', 1),
(8, 1601248, '2016-01-23', '2016-02-23', 3, 3, 'No Pago', '2016-01-23', 1),
(9, 1601249, '2016-01-23', '2016-02-23', 3, 4, 'No Pago', '2016-01-23', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nodos`
--

CREATE TABLE IF NOT EXISTS `nodos` (
  `id_nodo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_nodo` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_nodo` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion_nodo` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_nodo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `nodos`
--

INSERT INTO `nodos` (`id_nodo`, `nombre_nodo`, `descripcion_nodo`, `direccion_nodo`) VALUES
(1, 'Nodo las minas de maajagua', 'act mina tiene diferentes equipos y ubicados en diferentes sectores', 'cra 35 No 21 54 barrio las gavias'),
(2, 'El pital', 'act no se bla bla bal', 'la ramblas km 8'),
(3, 'La Ramblas', 'Punto estrategico', 'cra58a no 6 - 88'),
(4, 'el pital1', 'actualizar', 'actualizar'),
(5, 'La montaÃ±ita', 'los equipos les hace falta aterriaza por tierra Ã±andu', 'cerros de albornoz primera etapa'),
(6, 'Demo', 'demo112', 'demoaaaa'),
(7, 'Mirador de la popa', 'Esta a 1 km de la popa', 'cerro de la popa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE IF NOT EXISTS `planes` (
  `id_plan` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_plan` text COLLATE utf8_spanish_ci NOT NULL,
  `vel_descarga` text COLLATE utf8_spanish_ci NOT NULL,
  `tipo_descarga` text COLLATE utf8_spanish_ci NOT NULL,
  `vel_subida` text COLLATE utf8_spanish_ci NOT NULL,
  `tipo_subida` text COLLATE utf8_spanish_ci NOT NULL,
  `precio_plan` int(11) NOT NULL,
  PRIMARY KEY (`id_plan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `planes`
--

INSERT INTO `planes` (`id_plan`, `nombre_plan`, `vel_descarga`, `tipo_descarga`, `vel_subida`, `tipo_subida`, `precio_plan`) VALUES
(1, 'Plan Seguro', '2', 'MB', '1', 'MB', 25000),
(2, 'facil', '2', 'mb', '2', 'mb', 13500),
(3, 'Demo', '100', 'Kb', '100', 'Kb', 15000),
(4, 'demo1', '250', 'Kb', '250', 'Kb', 52000),
(5, 'Prue', '512', 'Kb', '512', 'Kb', 1200),
(6, 'Den', '1', 'Mb', '1', 'Mb', 65000),
(7, 'Prim', '1', 'Gb', '1', 'Gb', 31500),
(8, 'Prem', '2', 'Mb', '2', 'Mb', 5500),
(9, 'More', '1200', 'Kb', '1200', 'Kb', 1300),
(10, 'mumu', '2', 'Gb', '2', 'Gb', 2500),
(11, 'mimi', '300', 'Kb', '300', 'Kb', 2560),
(12, 'Plan Accesible', '120', 'Kb', '120', 'Kb', 1200),
(13, 'Empresarial', '500', 'Mb', '500', 'Mb', 750000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roll`
--

CREATE TABLE IF NOT EXISTS `roll` (
  `id_roll` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_roll` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_roll`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `roll`
--

INSERT INTO `roll` (`id_roll`, `nombre_roll`) VALUES
(1, 'Admin'),
(2, 'Moderador'),
(3, 'Tecnico'),
(4, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nick` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `pass` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `roll` int(11) NOT NULL,
  `estado` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` date NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nick`, `pass`, `nombre`, `email`, `roll`, `estado`, `fecha_registro`) VALUES
(1, 'Admin', 27, 'Arnaldo Castilla', 'arnaldo.castilla@hotmail.com', 1, 'activo', '2015-12-24'),
(2, 'Ing', 27, 'Dalmaris', 'dalmaris@123.com', 2, 'activo', '2016-01-01'),
(3, 'demo', 0, 'demo demo', 'demo@demo.com', 3, 'activo', '2016-01-02'),
(4, 'demo1', 2147483647, 'arnaldo prueba', 'demo@demo.com1', 2, 'activo', '2016-01-02');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
