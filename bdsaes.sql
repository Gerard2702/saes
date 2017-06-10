-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.19-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table saes.cajas
CREATE TABLE IF NOT EXISTS `cajas` (
  `idcaja` int(11) NOT NULL AUTO_INCREMENT,
  `idfactura` int(11) NOT NULL,
  `caja` int(11) NOT NULL,
  `contrato` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idcaja`),
  KEY `FK1-idfactura` (`idfactura`),
  CONSTRAINT `FK1-idfactura` FOREIGN KEY (`idfactura`) REFERENCES `facturas` (`idfactura`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table saes.cajas: ~2 rows (approximately)
/*!40000 ALTER TABLE `cajas` DISABLE KEYS */;
INSERT INTO `cajas` (`idcaja`, `idfactura`, `caja`, `contrato`, `created_at`, `updated_at`) VALUES
	(1, 5, 0, '1111', '2017-05-24 23:30:16', '2017-05-24 23:30:19'),
	(2, 5, 0, '2222', '2017-05-24 23:34:46', '2017-05-24 23:34:46');
/*!40000 ALTER TABLE `cajas` ENABLE KEYS */;

-- Dumping structure for table saes.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL,
  `fax` int(11) DEFAULT NULL,
  `otro` int(11) DEFAULT NULL,
  `email` int(11) DEFAULT NULL,
  `site` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table saes.clientes: ~15 rows (approximately)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`idcliente`, `cliente`, `direccion`, `telefono`, `fax`, `otro`, `email`, `site`, `created_at`, `updated_at`) VALUES
	(1, 'RAMON POSADA', '', 0, NULL, NULL, NULL, NULL, '2017-05-22 23:05:30', '2017-05-22 23:05:30'),
	(3, 'IDELFONSO', '', 0, NULL, NULL, NULL, NULL, '2017-05-22 23:07:19', '2017-05-22 23:07:19'),
	(4, 'IDELFONSO', '', 0, NULL, NULL, NULL, NULL, '2017-05-24 01:08:36', '2017-05-24 01:08:36'),
	(5, 'IDELFONSO', '', 0, NULL, NULL, NULL, NULL, '2017-05-24 01:08:36', '2017-05-24 01:08:36'),
	(6, 'IDELFONSO', '', 0, NULL, NULL, NULL, NULL, '2017-05-24 01:08:36', '2017-05-24 01:08:36'),
	(7, 'IDELFONSO', '', 0, NULL, NULL, NULL, NULL, '2017-05-22 23:07:19', '2017-05-22 23:07:19'),
	(8, 'IDELFONSO', '', 0, NULL, NULL, NULL, NULL, '2017-05-24 01:08:36', '2017-05-24 01:08:36'),
	(9, 'IDELFONSO', '', 0, NULL, NULL, NULL, NULL, '2017-05-24 01:08:36', '2017-05-24 01:08:36'),
	(10, 'IDELFONSO', '', 0, NULL, NULL, NULL, NULL, '2017-05-24 01:08:36', '2017-05-24 01:08:36'),
	(11, 'IDELFONSO', '', 0, NULL, NULL, NULL, NULL, '2017-05-24 01:08:36', '2017-05-24 01:08:36'),
	(12, 'IDELFONSO', '', 0, NULL, NULL, NULL, NULL, '2017-05-24 01:08:36', '2017-05-24 01:08:36'),
	(13, 'IDELFONSO', '', 0, NULL, NULL, NULL, NULL, '2017-05-24 01:08:36', '2017-05-24 01:08:36'),
	(14, 'IDELFONSO', '', 0, NULL, NULL, NULL, NULL, '2017-05-24 01:08:36', '2017-05-24 01:08:36'),
	(15, 'IDELFONSO', '', 0, NULL, NULL, NULL, NULL, '2017-05-24 01:08:36', '2017-05-24 01:08:36'),
	(16, 'IDELFONSO', '', 0, NULL, NULL, NULL, NULL, '2017-05-24 01:08:36', '2017-05-24 01:08:36');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Dumping structure for table saes.detalle_caja
CREATE TABLE IF NOT EXISTS `detalle_caja` (
  `iddetalle` int(11) NOT NULL AUTO_INCREMENT,
  `idcaja` int(11) DEFAULT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `peso` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  PRIMARY KEY (`iddetalle`),
  KEY `FK1-caja` (`idcaja`),
  KEY `FK2-producto` (`idproducto`),
  CONSTRAINT `FK1-caja` FOREIGN KEY (`idcaja`) REFERENCES `cajas` (`idcaja`),
  CONSTRAINT `FK2-producto` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table saes.detalle_caja: ~2 rows (approximately)
/*!40000 ALTER TABLE `detalle_caja` DISABLE KEYS */;
INSERT INTO `detalle_caja` (`iddetalle`, `idcaja`, `idproducto`, `cantidad`, `peso`, `total`) VALUES
	(1, 1, 1, 2, 3.4, 5),
	(2, 1, 2, 2, 1, 1.55),
	(3, 2, 2, 4, 5, 22);
/*!40000 ALTER TABLE `detalle_caja` ENABLE KEYS */;

-- Dumping structure for table saes.facturas
CREATE TABLE IF NOT EXISTS `facturas` (
  `idfactura` int(11) NOT NULL AUTO_INCREMENT,
  `idcliente` int(11) NOT NULL DEFAULT '0',
  `fecha` date NOT NULL,
  `iduser` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idfactura`),
  KEY `FK1-idcliente` (`idcliente`),
  KEY `FK2-iduser` (`iduser`),
  CONSTRAINT `FK1-idcliente` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`idcliente`),
  CONSTRAINT `FK2-iduser` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table saes.facturas: ~7 rows (approximately)
/*!40000 ALTER TABLE `facturas` DISABLE KEYS */;
INSERT INTO `facturas` (`idfactura`, `idcliente`, `fecha`, `iduser`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 1, '2017-05-24', 1, 1, '2017-05-24 09:22:19', '2017-05-24 09:22:19'),
	(2, 14, '2017-05-24', 1, 1, '2017-05-24 10:27:10', '2017-05-24 10:27:10'),
	(3, 1, '2017-05-24', 1, 1, '2017-05-24 12:45:25', '2017-05-24 12:45:25'),
	(4, 1, '2017-05-24', 1, 1, '2017-05-24 13:32:47', '2017-05-24 13:32:47'),
	(5, 1, '2017-05-24', 1, 1, '2017-05-24 22:47:19', '2017-05-24 22:47:19'),
	(6, 1, '2017-05-24', 1, 1, '2017-05-24 23:54:55', '2017-05-24 23:54:55'),
	(7, 1, '2017-05-25', 1, 1, '2017-05-25 02:30:55', '2017-05-25 02:30:55'),
	(8, 15, '2017-05-11', 1, 1, '2017-05-25 07:33:48', '2017-05-25 07:33:48');
/*!40000 ALTER TABLE `facturas` ENABLE KEYS */;

-- Dumping structure for table saes.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `idproducto` int(11) NOT NULL AUTO_INCREMENT,
  `producto` varchar(50) NOT NULL,
  `partida` varchar(50) NOT NULL,
  `precio` float NOT NULL,
  `estado` varchar(25) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idproducto`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table saes.productos: ~2 rows (approximately)
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`idproducto`, `producto`, `partida`, `precio`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 'pan', '11', 1.5, 'nuevo', '2017-05-24 23:31:05', '2017-05-24 23:31:05'),
	(2, 'galleta', '12', 2, 'nuevo', '2017-05-24 23:31:46', '2017-05-24 23:31:46');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Dumping structure for table saes.users
CREATE TABLE IF NOT EXISTS `users` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `lastname` varchar(50) NOT NULL DEFAULT '0',
  `user_type` int(11) NOT NULL DEFAULT '0',
  `user` varchar(50) NOT NULL DEFAULT '0',
  `pass` varchar(50) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`iduser`),
  KEY `FK1-usertype` (`user_type`),
  CONSTRAINT `FK1-usertype` FOREIGN KEY (`user_type`) REFERENCES `users_type` (`iduser_type`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table saes.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`iduser`, `name`, `lastname`, `user_type`, `user`, `pass`, `created_at`, `updated_at`) VALUES
	(1, 'Gerardo', 'Orellana', 1, 'gera', '202cb962ac59075b964b07152d234b70', '2017-05-21 21:56:10', '2017-05-21 21:56:13');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table saes.users_type
CREATE TABLE IF NOT EXISTS `users_type` (
  `iduser_type` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '0',
  `descripcion` varchar(100) DEFAULT '0',
  PRIMARY KEY (`iduser_type`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table saes.users_type: ~0 rows (approximately)
/*!40000 ALTER TABLE `users_type` DISABLE KEYS */;
INSERT INTO `users_type` (`iduser_type`, `nombre`, `descripcion`) VALUES
	(1, 'admin', 'administrador');
/*!40000 ALTER TABLE `users_type` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
