-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.30-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para ferreteria1
CREATE DATABASE IF NOT EXISTS `ferreteria1` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ferreteria1`;

-- Volcando estructura para tabla ferreteria1.producto
CREATE TABLE IF NOT EXISTS `producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `referencia` varchar(100) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `cantidadStock` int(11) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla ferreteria1.producto: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` (`id`, `referencia`, `nombre`, `marca`, `valor`, `cantidadStock`, `estado`) VALUES
	(2, '123ja', 'Sprite', 'Coca Cola', 5000, 1, '1'),
	(3, '123j1', 'Agua en botella', 'Brisa', 2000, 1, '1'),
	(4, '123j4', 'Pan', 'Bimbo', 2000, 9, '1'),
	(5, '123j2', 'Crispetas', 'Tutrigo', 1000, 10, '1');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;

-- Volcando estructura para tabla ferreteria1.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(200) DEFAULT NULL,
  `contrasenia` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla ferreteria1.usuario: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `usuario`, `contrasenia`) VALUES
	(1, 'admin@admin.com', '12345');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

-- Volcando estructura para tabla ferreteria1.venta
CREATE TABLE IF NOT EXISTS `venta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cantidadSolicitada` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `producto_id` (`producto_id`),
  CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla ferreteria1.venta: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
INSERT INTO `venta` (`id`, `cantidadSolicitada`, `fecha`, `producto_id`, `estado`) VALUES
	(17, 4, '2018-11-29', 2, 1),
	(18, 2, '2018-11-29', 3, 1),
	(19, 1, '2018-11-29', 3, 1),
	(20, 2, '2018-11-29', 5, 1),
	(21, 3, '2018-11-29', 5, 1),
	(22, 2, '2018-11-29', 5, 1),
	(23, 8, '2018-11-29', 5, 1);
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
