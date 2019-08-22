-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.44-0ubuntu0.14.04.1 - (Ubuntu)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             9.1.0.4921
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table gazebo_gestor.cruge_audit
DROP TABLE IF EXISTS `cruge_audit`;
CREATE TABLE IF NOT EXISTS `cruge_audit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `action` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `field` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `ipAddress` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `FK_app_auditoria_cruge_user` FOREIGN KEY (`user_id`) REFERENCES `cruge_user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table gazebo_gestor.cruge_audit: ~85 rows (approximately)
/*!40000 ALTER TABLE `cruge_audit` DISABLE KEYS */;
INSERT INTO `cruge_audit` (`id`, `description`, `action`, `model`, `model_id`, `field`, `time_stamp`, `user_id`, `ipAddress`) VALUES
	(1, 'Usuario ytaborda editó campo \'metatags\' en registro Empresa[1] de  "asd" a "". ', 'EDITAR', 'Empresa', 1, 'metatags', '2015-09-20 17:53:44', 3, '127.0.0.1'),
	(2, 'Usuario ytaborda editó campo \'valor\' en registro Contacto[1] de  "https://instagram.com/gazebococinas" a "gazebococinas". ', 'EDITAR', 'Contacto', 1, 'valor', '2015-09-22 14:15:09', 3, '127.0.0.1'),
	(3, 'Usuario ytaborda editó campo \'valor\' en registro Contacto[2] de  "https://www.facebook.com/pages/Gazebo-cocinas/233756253403160" a "Gazebo-cocinas/233756253403160". ', 'EDITAR', 'Contacto', 2, 'valor', '2015-09-22 14:15:26', 3, '127.0.0.1'),
	(4, 'Usuario ytaborda editó campo \'valor\' en registro Contacto[3] de  "https://twitter.com/gazebococinas" a "gazebococinas". ', 'EDITAR', 'Contacto', 3, 'valor', '2015-09-22 14:15:52', 3, '127.0.0.1'),
	(5, 'Usuario ytaborda editó campo \'horario\' en registro Empresa[1] de  "<p><strong>LUNES - VIERNES</strong></p><p>8AM - 7PM</p><p>&nbsp;</p><p><strong>SABADOS</strong></p><p>8AM - 2PM</p>" a "". ', 'EDITAR', 'Empresa', 1, 'horario', '2015-09-22 14:35:28', 3, '127.0.0.1'),
	(6, 'Usuario ytaborda editó campo \'keywords\' en registro Empresa[1] de  "Gazebo, Casa de Diseño" a "Gazebo, Cocinas, Casa de Diseño". ', 'EDITAR', 'Empresa', 1, 'keywords', '2015-09-22 14:39:20', 3, '127.0.0.1'),
	(7, 'Usuario ytaborda editó campo \'horario\' en registro Empresa[1] de  "<p><strong>LUNES - VIERNES</strong></p><p>8AM - 7PM</p><p>&nbsp;</p><p><strong>SABADOS</strong></p><p>8AM - 2PM</p>" a "". ', 'EDITAR', 'Empresa', 1, 'horario', '2015-09-22 15:01:17', 3, '127.0.0.1'),
	(8, 'Usuario ytaborda editó campo \'horario\' en registro Empresa[1] de  "" a "<p><strong>LUNES - VIERNES</strong></p><p>8AM - 7PM</p><p>&nbsp;</p><p><strong>SABADOS</strong></p><p>8AM - 2PM</p>". ', 'EDITAR', 'Empresa', 1, 'horario', '2015-09-22 15:02:19', 3, '127.0.0.1'),
	(9, 'Usuario ytaborda creó nuevo registro Galeria[1].', 'CREAR', 'Galeria', 1, '', '2015-09-24 21:18:00', 3, '127.0.0.1'),
	(10, 'Usuario ytaborda editó campo \'nombre\' en registro Empresa[1] de  "Gazebo, C. A." a "Gazebo Cocinas, C. A.". ', 'EDITAR', 'Empresa', 1, 'nombre', '2015-09-24 23:30:21', 3, '127.0.0.1'),
	(11, 'Usuario ytaborda editó campo \'rif\' en registro Empresa[1] de  "" a "J-29979430-9". ', 'EDITAR', 'Empresa', 1, 'rif', '2015-09-26 11:47:56', 3, '::1'),
	(12, 'Usuario ytaborda editó campo \'nombre\' en registro Empresa[1] de  "Gazebo Cocinas, C. A." a "Gazebo". ', 'EDITAR', 'Empresa', 1, 'nombre', '2015-09-28 10:24:09', 3, '::1'),
	(13, 'Usuario ytaborda editó campo \'estatus\' en registro Servicio[3] de  "1" a "0". ', 'EDITAR', 'Servicio', 3, 'estatus', '2015-09-28 13:38:11', 3, '127.0.0.1'),
	(14, 'Usuario ytaborda editó campo \'estatus\' en registro Servicio[3] de  "0" a "1". ', 'EDITAR', 'Servicio', 3, 'estatus', '2015-09-28 13:39:29', 3, '127.0.0.1'),
	(15, 'Usuario ytaborda creó nuevo registro Filosofia[3].', 'CREAR', 'Filosofia', 3, '', '2015-09-28 13:40:05', 3, '127.0.0.1'),
	(16, 'Usuario ytaborda editó campo \'estatus\' en registro Filosofia[3] de  "0" a "1". ', 'EDITAR', 'Filosofia', 3, 'estatus', '2015-09-28 13:41:08', 3, '127.0.0.1'),
	(17, 'Usuario ytaborda creó nuevo registro Galeria[2].', 'CREAR', 'Galeria', 2, '', '2015-09-28 13:41:54', 3, '127.0.0.1'),
	(18, 'Usuario ytaborda creó nuevo registro GaleriaImg[14].', 'CREAR', 'GaleriaImg', 14, '', '2015-09-28 13:41:54', 3, '127.0.0.1'),
	(19, 'Usuario ytaborda editó campo \'galeria_id\' en registro GaleriaImg[14] de  "" a "2". ', 'EDITAR', 'GaleriaImg', 14, 'galeria_id', '2015-09-28 13:41:54', 3, '127.0.0.1'),
	(20, 'Usuario ytaborda editó campo \'id\' en registro GaleriaImg[14] de  "" a "14". ', 'EDITAR', 'GaleriaImg', 14, 'id', '2015-09-28 13:41:54', 3, '127.0.0.1'),
	(21, 'Usuario ytaborda editó campo \'file_name\' en registro GaleriaImg[14] de  "" a "galeria-2-14.jpg". ', 'EDITAR', 'GaleriaImg', 14, 'file_name', '2015-09-28 13:41:54', 3, '127.0.0.1'),
	(22, 'Usuario ytaborda creó nuevo registro GaleriaImg[15].', 'CREAR', 'GaleriaImg', 15, '', '2015-09-28 13:41:54', 3, '127.0.0.1'),
	(23, 'Usuario ytaborda editó campo \'galeria_id\' en registro GaleriaImg[15] de  "" a "2". ', 'EDITAR', 'GaleriaImg', 15, 'galeria_id', '2015-09-28 13:41:55', 3, '127.0.0.1'),
	(24, 'Usuario ytaborda editó campo \'id\' en registro GaleriaImg[15] de  "" a "15". ', 'EDITAR', 'GaleriaImg', 15, 'id', '2015-09-28 13:41:55', 3, '127.0.0.1'),
	(25, 'Usuario ytaborda editó campo \'file_name\' en registro GaleriaImg[15] de  "" a "galeria-2-15.jpg". ', 'EDITAR', 'GaleriaImg', 15, 'file_name', '2015-09-28 13:41:55', 3, '127.0.0.1'),
	(26, 'Usuario ytaborda creó nuevo registro GaleriaImg[16].', 'CREAR', 'GaleriaImg', 16, '', '2015-09-28 13:41:55', 3, '127.0.0.1'),
	(27, 'Usuario ytaborda editó campo \'galeria_id\' en registro GaleriaImg[16] de  "" a "2". ', 'EDITAR', 'GaleriaImg', 16, 'galeria_id', '2015-09-28 13:41:55', 3, '127.0.0.1'),
	(28, 'Usuario ytaborda editó campo \'id\' en registro GaleriaImg[16] de  "" a "16". ', 'EDITAR', 'GaleriaImg', 16, 'id', '2015-09-28 13:41:55', 3, '127.0.0.1'),
	(29, 'Usuario ytaborda editó campo \'file_name\' en registro GaleriaImg[16] de  "" a "galeria-2-16.jpg". ', 'EDITAR', 'GaleriaImg', 16, 'file_name', '2015-09-28 13:41:55', 3, '127.0.0.1'),
	(30, 'Usuario ytaborda creó nuevo registro GaleriaImg[17].', 'CREAR', 'GaleriaImg', 17, '', '2015-09-28 13:41:56', 3, '127.0.0.1'),
	(31, 'Usuario ytaborda editó campo \'galeria_id\' en registro GaleriaImg[17] de  "" a "2". ', 'EDITAR', 'GaleriaImg', 17, 'galeria_id', '2015-09-28 13:41:56', 3, '127.0.0.1'),
	(32, 'Usuario ytaborda editó campo \'id\' en registro GaleriaImg[17] de  "" a "17". ', 'EDITAR', 'GaleriaImg', 17, 'id', '2015-09-28 13:41:56', 3, '127.0.0.1'),
	(33, 'Usuario ytaborda editó campo \'file_name\' en registro GaleriaImg[17] de  "" a "galeria-2-17.jpg". ', 'EDITAR', 'GaleriaImg', 17, 'file_name', '2015-09-28 13:41:56', 3, '127.0.0.1'),
	(34, 'Usuario ytaborda creó nuevo registro GaleriaImg[18].', 'CREAR', 'GaleriaImg', 18, '', '2015-09-28 13:41:56', 3, '127.0.0.1'),
	(35, 'Usuario ytaborda editó campo \'galeria_id\' en registro GaleriaImg[18] de  "" a "2". ', 'EDITAR', 'GaleriaImg', 18, 'galeria_id', '2015-09-28 13:41:56', 3, '127.0.0.1'),
	(36, 'Usuario ytaborda editó campo \'id\' en registro GaleriaImg[18] de  "" a "18". ', 'EDITAR', 'GaleriaImg', 18, 'id', '2015-09-28 13:41:56', 3, '127.0.0.1'),
	(37, 'Usuario ytaborda editó campo \'file_name\' en registro GaleriaImg[18] de  "" a "galeria-2-18.jpg". ', 'EDITAR', 'GaleriaImg', 18, 'file_name', '2015-09-28 13:41:56', 3, '127.0.0.1'),
	(38, 'Usuario ytaborda creó nuevo registro Galeria[3].', 'CREAR', 'Galeria', 3, '', '2015-09-28 13:43:07', 3, '127.0.0.1'),
	(39, 'Usuario ytaborda creó nuevo registro GaleriaImg[19].', 'CREAR', 'GaleriaImg', 19, '', '2015-09-28 13:43:07', 3, '127.0.0.1'),
	(40, 'Usuario ytaborda editó campo \'galeria_id\' en registro GaleriaImg[19] de  "" a "3". ', 'EDITAR', 'GaleriaImg', 19, 'galeria_id', '2015-09-28 13:43:07', 3, '127.0.0.1'),
	(41, 'Usuario ytaborda editó campo \'id\' en registro GaleriaImg[19] de  "" a "19". ', 'EDITAR', 'GaleriaImg', 19, 'id', '2015-09-28 13:43:08', 3, '127.0.0.1'),
	(42, 'Usuario ytaborda editó campo \'file_name\' en registro GaleriaImg[19] de  "" a "galeria-3-19.jpg". ', 'EDITAR', 'GaleriaImg', 19, 'file_name', '2015-09-28 13:43:08', 3, '127.0.0.1'),
	(43, 'Usuario ytaborda creó nuevo registro GaleriaImg[20].', 'CREAR', 'GaleriaImg', 20, '', '2015-09-28 13:43:08', 3, '127.0.0.1'),
	(44, 'Usuario ytaborda editó campo \'galeria_id\' en registro GaleriaImg[20] de  "" a "3". ', 'EDITAR', 'GaleriaImg', 20, 'galeria_id', '2015-09-28 13:43:08', 3, '127.0.0.1'),
	(45, 'Usuario ytaborda editó campo \'id\' en registro GaleriaImg[20] de  "" a "20". ', 'EDITAR', 'GaleriaImg', 20, 'id', '2015-09-28 13:43:08', 3, '127.0.0.1'),
	(46, 'Usuario ytaborda editó campo \'file_name\' en registro GaleriaImg[20] de  "" a "galeria-3-20.jpg". ', 'EDITAR', 'GaleriaImg', 20, 'file_name', '2015-09-28 13:43:08', 3, '127.0.0.1'),
	(47, 'Usuario ytaborda creó nuevo registro GaleriaImg[21].', 'CREAR', 'GaleriaImg', 21, '', '2015-09-28 13:43:08', 3, '127.0.0.1'),
	(48, 'Usuario ytaborda editó campo \'galeria_id\' en registro GaleriaImg[21] de  "" a "3". ', 'EDITAR', 'GaleriaImg', 21, 'galeria_id', '2015-09-28 13:43:08', 3, '127.0.0.1'),
	(49, 'Usuario ytaborda editó campo \'id\' en registro GaleriaImg[21] de  "" a "21". ', 'EDITAR', 'GaleriaImg', 21, 'id', '2015-09-28 13:43:09', 3, '127.0.0.1'),
	(50, 'Usuario ytaborda editó campo \'file_name\' en registro GaleriaImg[21] de  "" a "galeria-3-21.jpg". ', 'EDITAR', 'GaleriaImg', 21, 'file_name', '2015-09-28 13:43:09', 3, '127.0.0.1'),
	(51, 'Usuario ytaborda creó nuevo registro GaleriaImg[22].', 'CREAR', 'GaleriaImg', 22, '', '2015-09-28 13:43:09', 3, '127.0.0.1'),
	(52, 'Usuario ytaborda editó campo \'galeria_id\' en registro GaleriaImg[22] de  "" a "3". ', 'EDITAR', 'GaleriaImg', 22, 'galeria_id', '2015-09-28 13:43:09', 3, '127.0.0.1'),
	(53, 'Usuario ytaborda editó campo \'id\' en registro GaleriaImg[22] de  "" a "22". ', 'EDITAR', 'GaleriaImg', 22, 'id', '2015-09-28 13:43:09', 3, '127.0.0.1'),
	(54, 'Usuario ytaborda editó campo \'file_name\' en registro GaleriaImg[22] de  "" a "galeria-3-22.jpg". ', 'EDITAR', 'GaleriaImg', 22, 'file_name', '2015-09-28 13:43:09', 3, '127.0.0.1'),
	(55, 'Usuario ytaborda creó nuevo registro GaleriaImg[23].', 'CREAR', 'GaleriaImg', 23, '', '2015-09-28 13:43:10', 3, '127.0.0.1'),
	(56, 'Usuario ytaborda editó campo \'galeria_id\' en registro GaleriaImg[23] de  "" a "3". ', 'EDITAR', 'GaleriaImg', 23, 'galeria_id', '2015-09-28 13:43:10', 3, '127.0.0.1'),
	(57, 'Usuario ytaborda editó campo \'id\' en registro GaleriaImg[23] de  "" a "23". ', 'EDITAR', 'GaleriaImg', 23, 'id', '2015-09-28 13:43:10', 3, '127.0.0.1'),
	(58, 'Usuario ytaborda editó campo \'file_name\' en registro GaleriaImg[23] de  "" a "galeria-3-23.jpg". ', 'EDITAR', 'GaleriaImg', 23, 'file_name', '2015-09-28 13:43:10', 3, '127.0.0.1'),
	(59, 'Usuario ytaborda creó nuevo registro GaleriaImg[24].', 'CREAR', 'GaleriaImg', 24, '', '2015-09-28 13:43:10', 3, '127.0.0.1'),
	(60, 'Usuario ytaborda editó campo \'galeria_id\' en registro GaleriaImg[24] de  "" a "3". ', 'EDITAR', 'GaleriaImg', 24, 'galeria_id', '2015-09-28 13:43:10', 3, '127.0.0.1'),
	(61, 'Usuario ytaborda editó campo \'id\' en registro GaleriaImg[24] de  "" a "24". ', 'EDITAR', 'GaleriaImg', 24, 'id', '2015-09-28 13:43:10', 3, '127.0.0.1'),
	(62, 'Usuario ytaborda editó campo \'file_name\' en registro GaleriaImg[24] de  "" a "galeria-3-24.jpg". ', 'EDITAR', 'GaleriaImg', 24, 'file_name', '2015-09-28 13:43:11', 3, '127.0.0.1'),
	(63, 'Usuario ytaborda creó nuevo registro GaleriaImg[25].', 'CREAR', 'GaleriaImg', 25, '', '2015-09-28 13:43:11', 3, '127.0.0.1'),
	(64, 'Usuario ytaborda editó campo \'galeria_id\' en registro GaleriaImg[25] de  "" a "3". ', 'EDITAR', 'GaleriaImg', 25, 'galeria_id', '2015-09-28 13:43:11', 3, '127.0.0.1'),
	(65, 'Usuario ytaborda editó campo \'id\' en registro GaleriaImg[25] de  "" a "25". ', 'EDITAR', 'GaleriaImg', 25, 'id', '2015-09-28 13:43:11', 3, '127.0.0.1'),
	(66, 'Usuario ytaborda editó campo \'file_name\' en registro GaleriaImg[25] de  "" a "galeria-3-25.jpg". ', 'EDITAR', 'GaleriaImg', 25, 'file_name', '2015-09-28 13:43:11', 3, '127.0.0.1'),
	(67, 'Usuario ytaborda creó nuevo registro GaleriaImg[26].', 'CREAR', 'GaleriaImg', 26, '', '2015-09-28 13:43:11', 3, '127.0.0.1'),
	(68, 'Usuario ytaborda editó campo \'galeria_id\' en registro GaleriaImg[26] de  "" a "3". ', 'EDITAR', 'GaleriaImg', 26, 'galeria_id', '2015-09-28 13:43:12', 3, '127.0.0.1'),
	(69, 'Usuario ytaborda editó campo \'id\' en registro GaleriaImg[26] de  "" a "26". ', 'EDITAR', 'GaleriaImg', 26, 'id', '2015-09-28 13:43:12', 3, '127.0.0.1'),
	(70, 'Usuario ytaborda editó campo \'file_name\' en registro GaleriaImg[26] de  "" a "galeria-3-26.jpg". ', 'EDITAR', 'GaleriaImg', 26, 'file_name', '2015-09-28 13:43:12', 3, '127.0.0.1'),
	(71, 'Usuario ytaborda creó nuevo registro CrugeFieldValue[93].', 'CREAR', 'CrugeFieldValue', 93, '', '2015-09-28 13:55:10', 3, '127.0.0.1'),
	(72, 'Usuario ytaborda editó campo \'iduser\' en registro CrugeFieldValue[93] de  "" a "5". ', 'EDITAR', 'CrugeFieldValue', 93, 'iduser', '2015-09-28 13:55:10', 3, '127.0.0.1'),
	(73, 'Usuario ytaborda editó campo \'idfield\' en registro CrugeFieldValue[93] de  "" a "4". ', 'EDITAR', 'CrugeFieldValue', 93, 'idfield', '2015-09-28 13:55:11', 3, '127.0.0.1'),
	(74, 'Usuario ytaborda editó campo \'idfieldvalue\' en registro CrugeFieldValue[93] de  "" a "93". ', 'EDITAR', 'CrugeFieldValue', 93, 'idfieldvalue', '2015-09-28 13:55:11', 3, '127.0.0.1'),
	(75, 'Usuario ytaborda creó nuevo registro CrugeFieldValue[94].', 'CREAR', 'CrugeFieldValue', 94, '', '2015-09-28 13:55:11', 3, '127.0.0.1'),
	(76, 'Usuario ytaborda editó campo \'iduser\' en registro CrugeFieldValue[94] de  "" a "5". ', 'EDITAR', 'CrugeFieldValue', 94, 'iduser', '2015-09-28 13:55:11', 3, '127.0.0.1'),
	(77, 'Usuario ytaborda editó campo \'idfield\' en registro CrugeFieldValue[94] de  "" a "5". ', 'EDITAR', 'CrugeFieldValue', 94, 'idfield', '2015-09-28 13:55:11', 3, '127.0.0.1'),
	(78, 'Usuario ytaborda editó campo \'idfieldvalue\' en registro CrugeFieldValue[94] de  "" a "94". ', 'EDITAR', 'CrugeFieldValue', 94, 'idfieldvalue', '2015-09-28 13:55:11', 3, '127.0.0.1'),
	(79, 'Usuario ytaborda creó nuevo registro CrugeFieldValue[95].', 'CREAR', 'CrugeFieldValue', 95, '', '2015-09-28 13:55:11', 3, '127.0.0.1'),
	(80, 'Usuario ytaborda editó campo \'iduser\' en registro CrugeFieldValue[95] de  "" a "5". ', 'EDITAR', 'CrugeFieldValue', 95, 'iduser', '2015-09-28 13:55:11', 3, '127.0.0.1'),
	(81, 'Usuario ytaborda editó campo \'idfield\' en registro CrugeFieldValue[95] de  "" a "3". ', 'EDITAR', 'CrugeFieldValue', 95, 'idfield', '2015-09-28 13:55:11', 3, '127.0.0.1'),
	(82, 'Usuario ytaborda editó campo \'value\' en registro CrugeFieldValue[95] de  "" a ".jpg". ', 'EDITAR', 'CrugeFieldValue', 95, 'value', '2015-09-28 13:55:11', 3, '127.0.0.1'),
	(83, 'Usuario ytaborda editó campo \'idfieldvalue\' en registro CrugeFieldValue[95] de  "" a "95". ', 'EDITAR', 'CrugeFieldValue', 95, 'idfieldvalue', '2015-09-28 13:55:11', 3, '127.0.0.1'),
	(84, 'Usuario ytaborda editó campo \'estatus\' en registro Filosofia[3] de  "1" a "0". ', 'EDITAR', 'Filosofia', 3, 'estatus', '2015-09-28 13:59:14', 3, '127.0.0.1'),
	(85, 'Usuario ytaborda editó campo \'estatus\' en registro Galeria[3] de  "0" a "1". ', 'EDITAR', 'Galeria', 3, 'estatus', '2015-09-28 14:00:22', 3, '127.0.0.1');
/*!40000 ALTER TABLE `cruge_audit` ENABLE KEYS */;


-- Dumping structure for table gazebo_gestor.cruge_authassignment
DROP TABLE IF EXISTS `cruge_authassignment`;
CREATE TABLE IF NOT EXISTS `cruge_authassignment` (
  `userid` int(11) NOT NULL,
  `bizrule` text COLLATE utf8_unicode_ci,
  `data` text COLLATE utf8_unicode_ci,
  `itemname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`userid`,`itemname`),
  KEY `fk_cruge_authassignment_cruge_authitem1` (`itemname`),
  KEY `fk_cruge_authassignment_user` (`userid`),
  CONSTRAINT `fk_cruge_authassignment_cruge_authitem1` FOREIGN KEY (`itemname`) REFERENCES `cruge_authitem` (`name`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_cruge_authassignment_user` FOREIGN KEY (`userid`) REFERENCES `cruge_user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table gazebo_gestor.cruge_authassignment: ~3 rows (approximately)
/*!40000 ALTER TABLE `cruge_authassignment` DISABLE KEYS */;
INSERT INTO `cruge_authassignment` (`userid`, `bizrule`, `data`, `itemname`) VALUES
	(2, NULL, 'N;', 'Invitado'),
	(4, NULL, 'N;', 'Administrador'),
	(5, NULL, 'N;', 'Gestor');
/*!40000 ALTER TABLE `cruge_authassignment` ENABLE KEYS */;


-- Dumping structure for table gazebo_gestor.cruge_authitem
DROP TABLE IF EXISTS `cruge_authitem`;
CREATE TABLE IF NOT EXISTS `cruge_authitem` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `bizrule` text COLLATE utf8_unicode_ci,
  `data` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table gazebo_gestor.cruge_authitem: ~90 rows (approximately)
/*!40000 ALTER TABLE `cruge_authitem` DISABLE KEYS */;
INSERT INTO `cruge_authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
	('action_app_config', 0, 'Configuración', NULL, 'N;'),
	('action_app_cruge', 0, 'Configurar CRUGE', '', 'N;'),
	('action_app_db', 0, 'Base de Datos Interna', '', 'N;'),
	('action_app_error', 0, 'Error', NULL, 'N;'),
	('action_app_estadisticas', 0, 'Estadisticas', NULL, 'N;'),
	('action_app_index', 0, 'Inicio', NULL, 'N;'),
	('action_app_soporte', 0, 'Soporte', NULL, 'N;'),
	('action_app_terms', 0, 'Terminos', NULL, 'N;'),
	('action_auditoria_detalle', 0, 'Detalle', NULL, 'N;'),
	('action_auditoria_lista', 0, 'Lista', NULL, 'N;'),
	('action_contacto_delete', 0, 'Borrar', NULL, 'N;'),
	('action_contacto_detalle', 0, 'Detalle', NULL, 'N;'),
	('action_contacto_editar', 0, 'Editar', NULL, 'N;'),
	('action_contacto_estatus', 0, 'Cambiar estatus', NULL, 'N;'),
	('action_contacto_index', 0, 'Cuadricula', NULL, 'N;'),
	('action_contacto_lista', 0, 'Lista', NULL, 'N;'),
	('action_contacto_nuevo', 0, 'Nuevo', NULL, 'N;'),
	('action_contactotipo_delete', 0, 'Borrar', NULL, 'N;'),
	('action_contactotipo_detalle', 0, 'Detalle', NULL, 'N;'),
	('action_contactotipo_editar', 0, 'Editar', NULL, 'N;'),
	('action_contactotipo_index', 0, 'Cuadricula', NULL, 'N;'),
	('action_contactotipo_lista', 0, 'Lista', NULL, 'N;'),
	('action_contactotipo_nuevo', 0, 'Nuevo', NULL, 'N;'),
	('action_empresa_detalle', 0, 'Detalle', NULL, 'N;'),
	('action_empresa_editar', 0, 'Editar', NULL, 'N;'),
	('action_filosofia_delete', 0, 'Borrar', NULL, 'N;'),
	('action_filosofia_detalle', 0, 'Detalle', NULL, 'N;'),
	('action_filosofia_editar', 0, 'Editar', NULL, 'N;'),
	('action_filosofia_index', 0, 'Cuadricula', NULL, 'N;'),
	('action_filosofia_lista', 0, 'Lista', NULL, 'N;'),
	('action_filosofia_nuevo', 0, 'Nuevo', NULL, 'N;'),
	('action_galeria_borrarimagen', 0, 'Borrar imagen', NULL, 'N;'),
	('action_galeria_delete', 0, 'Borrar', NULL, 'N;'),
	('action_galeria_detalle', 0, 'Detalle', NULL, 'N;'),
	('action_galeria_editar', 0, 'Editar', NULL, 'N;'),
	('action_galeria_index', 0, 'Cuadricula', NULL, 'N;'),
	('action_galeria_lista', 0, 'Lista', NULL, 'N;'),
	('action_galeria_nuevo', 0, 'Nuevo', NULL, 'N;'),
	('action_galeria_renombrarimagen', 0, 'Renombrar imagen', NULL, 'N;'),
	('action_redsocial_delete', 0, 'Borrar', NULL, 'N;'),
	('action_redsocial_detalle', 0, 'Detalle', NULL, 'N;'),
	('action_redsocial_editar', 0, 'Editar', NULL, 'N;'),
	('action_redsocial_index', 0, 'Cuadricula', NULL, 'N;'),
	('action_redsocial_lista', 0, 'Lista', NULL, 'N;'),
	('action_redsocial_nuevo', 0, 'Nuevo', NULL, 'N;'),
	('action_servicios_borrarimagen', 0, 'Borrar imagen', NULL, 'N;'),
	('action_servicios_delete', 0, 'Borrar', NULL, 'N;'),
	('action_servicios_detalle', 0, 'Detalle', NULL, 'N;'),
	('action_servicios_editar', 0, 'Editar', NULL, 'N;'),
	('action_servicios_index', 0, 'Cuadricula', NULL, 'N;'),
	('action_servicios_lista', 0, 'Lista', NULL, 'N;'),
	('action_servicios_nuevo', 0, 'Nuevo', NULL, 'N;'),
	('action_site_header', 0, 'Configurar Metatags y Keywords del header', '', 'N;'),
	('action_site_map', 0, 'Editar URL del Mapa de Google', '', 'N;'),
	('action_ui_editprofile', 0, 'Editar datos del perfil', '', 'N;'),
	('action_ui_fieldsadmincreate', 0, 'Crear campo personalizado del perfil', '', 'N;'),
	('action_ui_fieldsadmindelete', 0, 'Borrar campo personalizado del perfil', NULL, 'N;'),
	('action_ui_fieldsadminlist', 0, 'Lista campo personalizado del perfil', NULL, 'N;'),
	('action_ui_fieldsadminupdate', 0, 'Editar campo personalizado del perfil', NULL, 'N;'),
	('action_ui_rbacajaxassignment', 0, 'Asignar permisos RBAC', NULL, 'N;'),
	('action_ui_rbacajaxgetassignmentbizrule', 0, 'Obtener regla de negocio RBAC', NULL, 'N;'),
	('action_ui_rbacajaxsetchilditem', 0, 'Asignar subitem RBAC', NULL, 'N;'),
	('action_ui_rbacauthitemchilditems', 0, 'Editar permisos RBAC', NULL, 'N;'),
	('action_ui_rbacauthitemcreate', 0, 'Crear item RBAC', NULL, 'N;'),
	('action_ui_rbacauthitemdelete', 0, 'Borrar item RBAC', NULL, 'N;'),
	('action_ui_rbacauthitemupdate', 0, 'Editar item RBAC', NULL, 'N;'),
	('action_ui_rbaclistops', 0, 'Operaciones', NULL, 'N;'),
	('action_ui_rbaclistroles', 0, 'Roles', NULL, 'N;'),
	('action_ui_rbaclisttasks', 0, 'Tareas', NULL, 'N;'),
	('action_ui_rbacusersassignments', 0, 'Asignar roles a usuarios de forma masiva', NULL, 'N;'),
	('action_ui_sessionadmin', 0, 'Sessiones', NULL, 'N;'),
	('action_ui_systemupdate', 0, 'Opciones del sistema', NULL, 'N;'),
	('action_ui_terms', 0, 'Términos y condiciones', '', 'N;'),
	('action_ui_usermanagementadmin', 0, 'Lista de usuarios', NULL, 'N;'),
	('action_ui_usermanagementcreate', 0, 'Crear usuario', NULL, 'N;'),
	('action_ui_usermanagementupdate', 0, 'Editar usuario', NULL, 'N;'),
	('action_ui_usersaved', 0, 'Datos de usuario guardados', NULL, 'N;'),
	('Administrador', 2, 'Administrador del sistema', '', 'N;'),
	('controller_app', 0, 'APLICACION', NULL, 'N;'),
	('controller_auditoria', 0, 'AUDITORIA DEL SISTEMA', NULL, 'N;'),
	('controller_contacto', 0, 'CONTACTO', NULL, 'N;'),
	('controller_contactotipo', 0, 'CONTACTO TIPO', NULL, 'N;'),
	('controller_empresa', 0, 'EMPRESA', NULL, 'N;'),
	('controller_filosofia', 0, 'FILOSOFIA DE LA EMPRESA', NULL, 'N;'),
	('controller_galeria', 0, 'GALERIA', NULL, 'N;'),
	('controller_redsocial', 0, 'RED SOCIAL', NULL, 'N;'),
	('controller_servicios', 0, 'SERVICIOS', NULL, 'N;'),
	('Demo', 2, 'Visualizar data sin editarla', '', 'N;'),
	('Gestor', 2, 'Gestor del sitio web', '', 'N;'),
	('Invitado', 2, 'Usuarios no registrados en el sistema', NULL, 'N;');
/*!40000 ALTER TABLE `cruge_authitem` ENABLE KEYS */;


-- Dumping structure for table gazebo_gestor.cruge_authitemchild
DROP TABLE IF EXISTS `cruge_authitemchild`;
CREATE TABLE IF NOT EXISTS `cruge_authitemchild` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `crugeauthitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `cruge_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `crugeauthitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `cruge_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table gazebo_gestor.cruge_authitemchild: ~142 rows (approximately)
/*!40000 ALTER TABLE `cruge_authitemchild` DISABLE KEYS */;
INSERT INTO `cruge_authitemchild` (`parent`, `child`) VALUES
	('Administrador', 'action_app_config'),
	('Demo', 'action_app_config'),
	('Gestor', 'action_app_config'),
	('Administrador', 'action_app_error'),
	('Demo', 'action_app_error'),
	('Gestor', 'action_app_error'),
	('Invitado', 'action_app_error'),
	('Administrador', 'action_app_estadisticas'),
	('Demo', 'action_app_estadisticas'),
	('Gestor', 'action_app_estadisticas'),
	('Administrador', 'action_app_index'),
	('Demo', 'action_app_index'),
	('Gestor', 'action_app_index'),
	('Administrador', 'action_app_soporte'),
	('Demo', 'action_app_soporte'),
	('Gestor', 'action_app_soporte'),
	('Administrador', 'action_app_terms'),
	('Demo', 'action_app_terms'),
	('Gestor', 'action_app_terms'),
	('Administrador', 'action_auditoria_detalle'),
	('Administrador', 'action_auditoria_lista'),
	('Administrador', 'action_contacto_delete'),
	('Administrador', 'action_contacto_detalle'),
	('Demo', 'action_contacto_detalle'),
	('Gestor', 'action_contacto_detalle'),
	('Administrador', 'action_contacto_editar'),
	('Gestor', 'action_contacto_editar'),
	('Administrador', 'action_contacto_estatus'),
	('Gestor', 'action_contacto_estatus'),
	('Administrador', 'action_contacto_index'),
	('Demo', 'action_contacto_index'),
	('Gestor', 'action_contacto_index'),
	('Administrador', 'action_contacto_lista'),
	('Demo', 'action_contacto_lista'),
	('Gestor', 'action_contacto_lista'),
	('Administrador', 'action_contacto_nuevo'),
	('Gestor', 'action_contacto_nuevo'),
	('Gestor', 'action_contactotipo_detalle'),
	('Gestor', 'action_contactotipo_editar'),
	('Gestor', 'action_contactotipo_index'),
	('Gestor', 'action_contactotipo_lista'),
	('Gestor', 'action_contactotipo_nuevo'),
	('Administrador', 'action_empresa_detalle'),
	('Demo', 'action_empresa_detalle'),
	('Gestor', 'action_empresa_detalle'),
	('Administrador', 'action_empresa_editar'),
	('Gestor', 'action_empresa_editar'),
	('Administrador', 'action_filosofia_delete'),
	('Administrador', 'action_filosofia_detalle'),
	('Demo', 'action_filosofia_detalle'),
	('Gestor', 'action_filosofia_detalle'),
	('Administrador', 'action_filosofia_editar'),
	('Gestor', 'action_filosofia_editar'),
	('Administrador', 'action_filosofia_index'),
	('Demo', 'action_filosofia_index'),
	('Gestor', 'action_filosofia_index'),
	('Administrador', 'action_filosofia_lista'),
	('Demo', 'action_filosofia_lista'),
	('Gestor', 'action_filosofia_lista'),
	('Administrador', 'action_filosofia_nuevo'),
	('Gestor', 'action_filosofia_nuevo'),
	('Administrador', 'action_galeria_borrarimagen'),
	('Administrador', 'action_galeria_delete'),
	('Administrador', 'action_galeria_detalle'),
	('Demo', 'action_galeria_detalle'),
	('Gestor', 'action_galeria_detalle'),
	('Administrador', 'action_galeria_editar'),
	('Gestor', 'action_galeria_editar'),
	('Administrador', 'action_galeria_index'),
	('Demo', 'action_galeria_index'),
	('Gestor', 'action_galeria_index'),
	('Administrador', 'action_galeria_lista'),
	('Demo', 'action_galeria_lista'),
	('Gestor', 'action_galeria_lista'),
	('Administrador', 'action_galeria_nuevo'),
	('Gestor', 'action_galeria_nuevo'),
	('Administrador', 'action_galeria_renombrarimagen'),
	('Gestor', 'action_galeria_renombrarimagen'),
	('Administrador', 'action_redsocial_delete'),
	('Administrador', 'action_redsocial_detalle'),
	('Demo', 'action_redsocial_detalle'),
	('Gestor', 'action_redsocial_detalle'),
	('Administrador', 'action_redsocial_editar'),
	('Gestor', 'action_redsocial_editar'),
	('Administrador', 'action_redsocial_index'),
	('Demo', 'action_redsocial_index'),
	('Gestor', 'action_redsocial_index'),
	('Administrador', 'action_redsocial_lista'),
	('Demo', 'action_redsocial_lista'),
	('Gestor', 'action_redsocial_lista'),
	('Administrador', 'action_redsocial_nuevo'),
	('Gestor', 'action_redsocial_nuevo'),
	('Administrador', 'action_servicios_borrarimagen'),
	('Administrador', 'action_servicios_delete'),
	('Administrador', 'action_servicios_detalle'),
	('Demo', 'action_servicios_detalle'),
	('Gestor', 'action_servicios_detalle'),
	('Administrador', 'action_servicios_editar'),
	('Gestor', 'action_servicios_editar'),
	('Administrador', 'action_servicios_index'),
	('Demo', 'action_servicios_index'),
	('Gestor', 'action_servicios_index'),
	('Administrador', 'action_servicios_lista'),
	('Demo', 'action_servicios_lista'),
	('Gestor', 'action_servicios_lista'),
	('Administrador', 'action_servicios_nuevo'),
	('Gestor', 'action_servicios_nuevo'),
	('Administrador', 'action_ui_editprofile'),
	('Demo', 'action_ui_editprofile'),
	('Gestor', 'action_ui_editprofile'),
	('Administrador', 'action_ui_rbacajaxgetassignmentbizrule'),
	('Administrador', 'action_ui_sessionadmin'),
	('Administrador', 'action_ui_terms'),
	('Demo', 'action_ui_terms'),
	('Gestor', 'action_ui_terms'),
	('Administrador', 'action_ui_usermanagementadmin'),
	('Administrador', 'action_ui_usermanagementcreate'),
	('Administrador', 'action_ui_usermanagementupdate'),
	('Administrador', 'action_ui_usersaved'),
	('Demo', 'action_ui_usersaved'),
	('Gestor', 'action_ui_usersaved'),
	('Administrador', 'controller_app'),
	('Demo', 'controller_app'),
	('Gestor', 'controller_app'),
	('Invitado', 'controller_app'),
	('Administrador', 'controller_auditoria'),
	('Administrador', 'controller_contacto'),
	('Demo', 'controller_contacto'),
	('Gestor', 'controller_contacto'),
	('Administrador', 'controller_empresa'),
	('Demo', 'controller_empresa'),
	('Gestor', 'controller_empresa'),
	('Administrador', 'controller_filosofia'),
	('Demo', 'controller_filosofia'),
	('Gestor', 'controller_filosofia'),
	('Administrador', 'controller_galeria'),
	('Demo', 'controller_galeria'),
	('Gestor', 'controller_galeria'),
	('Administrador', 'controller_redsocial'),
	('Administrador', 'controller_servicios'),
	('Demo', 'controller_servicios'),
	('Gestor', 'controller_servicios');
/*!40000 ALTER TABLE `cruge_authitemchild` ENABLE KEYS */;


-- Dumping structure for table gazebo_gestor.cruge_field
DROP TABLE IF EXISTS `cruge_field`;
CREATE TABLE IF NOT EXISTS `cruge_field` (
  `idfield` int(11) NOT NULL AUTO_INCREMENT,
  `fieldname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `longname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` int(11) DEFAULT '0',
  `required` int(11) DEFAULT '0',
  `fieldtype` int(11) DEFAULT '0',
  `fieldsize` int(11) DEFAULT '20',
  `maxlength` int(11) DEFAULT '45',
  `showinreports` int(11) DEFAULT '0',
  `useregexp` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `useregexpmsg` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `predetvalue` mediumblob,
  PRIMARY KEY (`idfield`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table gazebo_gestor.cruge_field: ~5 rows (approximately)
/*!40000 ALTER TABLE `cruge_field` DISABLE KEYS */;
INSERT INTO `cruge_field` (`idfield`, `fieldname`, `longname`, `position`, `required`, `fieldtype`, `fieldsize`, `maxlength`, `showinreports`, `useregexp`, `useregexpmsg`, `predetvalue`) VALUES
	(1, 'cedula', 'C. I.', 1, 0, 0, 20, 45, 0, '', 'El campo C.I. no puede ser nulo', _binary ''),
	(2, 'nombre', 'Nombre', 2, 1, 0, 45, 45, 1, '', 'HP ingresa el nombre', _binary ''),
	(3, 'pic', 'Avatar', 99, 0, 0, 10, 45, 0, '', '', _binary ''),
	(4, 'telefono', 'Teléfono', 3, 0, 0, 20, 13, 1, '', '', _binary ''),
	(5, 'profesion', 'Profesión', 4, 0, 0, 20, 45, 1, '', '', _binary '');
/*!40000 ALTER TABLE `cruge_field` ENABLE KEYS */;


-- Dumping structure for table gazebo_gestor.cruge_fieldvalue
DROP TABLE IF EXISTS `cruge_fieldvalue`;
CREATE TABLE IF NOT EXISTS `cruge_fieldvalue` (
  `idfieldvalue` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `idfield` int(11) NOT NULL,
  `value` blob,
  PRIMARY KEY (`idfieldvalue`),
  KEY `fk_cruge_fieldvalue_cruge_user1` (`iduser`),
  KEY `fk_cruge_fieldvalue_cruge_field1` (`idfield`),
  CONSTRAINT `fk_cruge_fieldvalue_cruge_field1` FOREIGN KEY (`idfield`) REFERENCES `cruge_field` (`idfield`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_cruge_fieldvalue_cruge_user1` FOREIGN KEY (`iduser`) REFERENCES `cruge_user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table gazebo_gestor.cruge_fieldvalue: ~23 rows (approximately)
/*!40000 ALTER TABLE `cruge_fieldvalue` DISABLE KEYS */;
INSERT INTO `cruge_fieldvalue` (`idfieldvalue`, `iduser`, `idfield`, `value`) VALUES
	(2, 3, 1, _binary 0x3138343935323430),
	(3, 3, 2, _binary 0x59656E69726565205461626F726461),
	(4, 5, 1, _binary 0x313233343536373839),
	(5, 5, 2, _binary 0x313233343536373839),
	(6, 2, 1, _binary 0x30303030303032),
	(7, 2, 2, _binary 0x496E76697461646F),
	(72, 22, 1, _binary 0x70616C613135),
	(73, 22, 2, _binary 0x70616C613135),
	(75, 23, 1, _binary 0x70616C613136),
	(76, 23, 2, _binary 0x70616C613136),
	(78, 4, 1, _binary 0x313233343536),
	(79, 4, 2, _binary 0x4265617472697A204D6F6C65726F),
	(82, 3, 5, _binary 0x4465736172726F6C6C61646F7220576562),
	(83, 3, 4, _binary 0x303431322D3639312D33313132),
	(84, 2, 4, _binary ''),
	(85, 2, 5, _binary ''),
	(88, 3, 3, _binary 0x2E6A7067),
	(90, 4, 4, _binary ''),
	(91, 4, 5, _binary ''),
	(92, 4, 3, _binary 0x2E6A7067),
	(93, 5, 4, _binary ''),
	(94, 5, 5, _binary ''),
	(95, 5, 3, _binary 0x2E6A7067);
/*!40000 ALTER TABLE `cruge_fieldvalue` ENABLE KEYS */;


-- Dumping structure for table gazebo_gestor.cruge_menu
DROP TABLE IF EXISTS `cruge_menu`;
CREATE TABLE IF NOT EXISTS `cruge_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `operation` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` text COLLATE utf8_unicode_ci,
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table gazebo_gestor.cruge_menu: ~27 rows (approximately)
/*!40000 ALTER TABLE `cruge_menu` DISABLE KEYS */;
INSERT INTO `cruge_menu` (`id`, `label`, `class`, `parent`, `status`, `operation`, `url`, `active`, `sort`) VALUES
	(1, 'Estadisticas', 'Stat', 0, 0, 'action_app_estadisticas', '/app/estadisticas', 'app/estadisticas', 0),
	(2, 'Contenido', 'Content', 0, 1, 'action_app_index', '', '', 0),
	(3, 'Mensajes', 'Message', 0, 0, 'action_app_index', '', '', 0),
	(4, 'Tareas', 'Todo', 0, 0, 'action_app_index', '', '', 0),
	(5, 'Empresa', 'Company', 0, 1, 'action_empresa_detalle', '', '', 0),
	(6, 'Usuarios', 'User', 0, 1, 'action_ui_editprofile', '', '', 0),
	(7, 'Usuarios', '', 6, 1, 'action_ui_usermanagementadmin', '/cruge/ui/usermanagementadmin/', 'cruge/ui/usermanagementadmin,cruge/ui/usermanagementupdate,cruge/ui/usersaved', 0),
	(8, 'Mi perfil', NULL, 6, 1, 'action_ui_editprofile', '/cruge/ui/editprofile/', 'cruge/ui/editprofile', 0),
	(9, 'Configuracion', 'Settings', 0, 1, 'action_app_config', '', '', 0),
	(10, 'Super Admin', 'Super', 0, 1, 'action_app_cruge', '', '', 0),
	(12, 'Auditoria', NULL, 10, 1, 'action_auditoria_lista', '/auditoria/lista/', 'auditoria/lista,auditoria/detalle', 0),
	(13, 'Operaciones', NULL, 10, 1, 'action_ui_rbaclistops', '/cruge/ui/rbaclistops/', 'cruge/ui/rbaclistops,cruge/ui/rbacauthitemcreate/type/0,cruge/ui/rbacauthitemchilditems/type/0,cruge/ui/rbacauthitemupdate/type/0', 0),
	(14, 'Tareas', NULL, 10, 0, 'action_ui_rbaclisttasks', '/cruge/ui/rbaclisttasks/', 'cruge/ui/rbaclisttasks,cruge/ui/rbacauthitemcreate/type/1,cruge/ui/rbacauthitemchilditems/type/1,cruge/ui/rbacauthitemupdate/type/1', 0),
	(15, 'Roles', NULL, 10, 1, 'action_ui_rbaclistroles', '/cruge/ui/rbaclistroles/', 'cruge/ui/rbaclistroles,cruge/ui/rbacauthitemcreate/type/2,cruge/ui/rbacauthitemchilditems/type/2,cruge/ui/rbacauthitemupdate/type/2,cruge/ui/rbacauthitemchilditems,cruge/ui/rbacauthitemcreate,cruge/ui/rbacauthitemupdate', 0),
	(16, 'Roles masivos', NULL, 10, 0, 'action_ui_rbacusersassignments', '/cruge/ui/rbacusersassignments/', 'cruge/ui/rbacusersassignments', 0),
	(17, 'Sesiones de usuario', NULL, 9, 1, 'action_ui_sessionadmin', '/cruge/ui/sessionadmin/', 'cruge/ui/sessionadmin', 0),
	(18, 'Opciones del sistema', NULL, 10, 1, 'action_ui_systemupdate', '/cruge/ui/systemupdate/', 'cruge/ui/systemupdate', 0),
	(19, 'Campos personalizados', NULL, 10, 1, 'action_ui_fieldsadminlist', '/cruge/ui/fieldsadminlist/', 'cruge/ui/fieldsadminlist,cruge/ui/fieldsadmincreate,cruge/ui/fieldsadminupdate,cruge/ui/fieldsadmindelete', 0),
	(20, 'Soporte', NULL, 9, 1, 'action_app_soporte', '/soporte/', 'app/soporte', 0),
	(30, 'BD Interna', 'DB', 0, 1, 'action_app_db', NULL, NULL, 0),
	(60, 'Servicios', NULL, 2, 1, 'action_servicios_index', '/servicios/index/', 'servicios/index,servicios/nuevo,servicios/lista,servicios/detalle,servicios/editar', 0),
	(61, 'Datos de contacto', NULL, 5, 1, 'action_contacto_index', '/contacto/index/', 'contacto/index,contacto/nuevo,contacto/lista,contacto/detalle,contacto/editar', 0),
	(62, 'Datos de la empresa', '', 5, 1, 'action_empresa_detalle', '/empresa/detalle/1', 'empresa/nuevo,empresa/lista,empresa/detalle,empresa/editar,empresa/index', 0),
	(63, 'Redes sociales', '', 30, 1, 'action_redsocial_index', '/redSocial/index/', 'redSocial/nuevo,redSocial/lista,redSocial/detalle,redSocial/editar,redSocial/index', 0),
	(64, 'Filosofía de la empresa', NULL, 2, 1, 'action_filosofia_index', '/filosofia/index/', 'filosofia/index,filosofia/nuevo,filosofia/lista,filosofia/detalle,filosofia/editar', 0),
	(65, 'Galería', NULL, 2, 1, 'action_galeria_index', '/galeria/index/', 'galeria/index,galeria/nuevo,galeria/lista,galeria/detalle,galeria/editar', 0),
	(66, 'Tipo de datos de contacto', NULL, 30, 1, 'action_contactotipo_index', '/contactoTipo/index/', 'contactoTipo/index,contactoTipo/nuevo,contactoTipo/lista,contactoTipo/detalle,contactoTipo/editar', 0);
/*!40000 ALTER TABLE `cruge_menu` ENABLE KEYS */;


-- Dumping structure for table gazebo_gestor.cruge_session
DROP TABLE IF EXISTS `cruge_session`;
CREATE TABLE IF NOT EXISTS `cruge_session` (
  `idsession` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `created` bigint(30) DEFAULT NULL,
  `expire` bigint(30) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `ipaddress` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usagecount` int(11) DEFAULT '0',
  `lastusage` bigint(30) DEFAULT NULL,
  `logoutdate` bigint(30) DEFAULT NULL,
  `ipaddressout` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `geoLocStatus` int(11) DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `region` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `countryName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `countryCode` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latitude` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idsession`),
  KEY `crugesession_iduser` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table gazebo_gestor.cruge_session: ~11 rows (approximately)
/*!40000 ALTER TABLE `cruge_session` DISABLE KEYS */;
INSERT INTO `cruge_session` (`idsession`, `iduser`, `created`, `expire`, `status`, `ipaddress`, `usagecount`, `lastusage`, `logoutdate`, `ipaddressout`, `geoLocStatus`, `city`, `region`, `countryName`, `countryCode`, `latitude`, `longitude`) VALUES
	(1, 3, 1442787637, 1442798497, 1, '127.0.0.1', 3, 1442796475, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(2, 3, 1442947165, 1442958025, 1, '127.0.0.1', 1, 1442947165, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 3, 1442966607, 1442977467, 1, '127.0.0.1', 1, 1442966607, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(4, 3, 1443145633, 1443156493, 1, '127.0.0.1', 2, 1443151956, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(5, 3, 1443189730, 1443200590, 1, '127.0.0.1', 1, 1443189730, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(6, 3, 1443223291, 1443234151, 0, '::1', 2, 1443229862, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(7, 3, 1443284263, 1443295123, 1, '::1', 1, 1443284263, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(8, 3, 1443452028, 1443462888, 0, '127.0.0.1', 2, 1443462751, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(9, 3, 1443462910, 1443473770, 1, '127.0.0.1', 2, 1443472276, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(10, 3, 1443540029, 1443550889, 1, '127.0.0.1', 1, 1443540029, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(11, 3, 1443565905, 1443576765, 1, '127.0.0.1', 3, 1443569041, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `cruge_session` ENABLE KEYS */;


-- Dumping structure for table gazebo_gestor.cruge_system
DROP TABLE IF EXISTS `cruge_system`;
CREATE TABLE IF NOT EXISTS `cruge_system` (
  `idsystem` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `largename` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sessionmaxdurationmins` int(11) DEFAULT '30',
  `sessionmaxsameipconnections` int(11) DEFAULT '10',
  `sessionreusesessions` int(11) DEFAULT '1' COMMENT '1yes 0no',
  `sessionmaxsessionsperday` int(11) DEFAULT '-1',
  `sessionmaxsessionsperuser` int(11) DEFAULT '-1',
  `systemnonewsessions` int(11) DEFAULT '0' COMMENT '1yes 0no',
  `systemdown` int(11) DEFAULT '0',
  `registerusingcaptcha` int(11) DEFAULT '0',
  `registerusingterms` int(11) DEFAULT '0',
  `terms` blob,
  `registerusingactivation` int(11) DEFAULT '1',
  `defaultroleforregistration` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `registerusingtermslabel` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `registrationonlogin` int(11) DEFAULT '1',
  PRIMARY KEY (`idsystem`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table gazebo_gestor.cruge_system: ~1 rows (approximately)
/*!40000 ALTER TABLE `cruge_system` DISABLE KEYS */;
INSERT INTO `cruge_system` (`idsystem`, `name`, `largename`, `sessionmaxdurationmins`, `sessionmaxsameipconnections`, `sessionreusesessions`, `sessionmaxsessionsperday`, `sessionmaxsessionsperuser`, `systemnonewsessions`, `systemdown`, `registerusingcaptcha`, `registerusingterms`, `terms`, `registerusingactivation`, `defaultroleforregistration`, `registerusingtermslabel`, `registrationonlogin`) VALUES
	(1, 'default', NULL, 181, 10, 1, -1, -1, 0, 0, 1, 0, _binary '', 2, 'Gestor', 'Terminos y condiciones', 0);
/*!40000 ALTER TABLE `cruge_system` ENABLE KEYS */;


-- Dumping structure for table gazebo_gestor.cruge_user
DROP TABLE IF EXISTS `cruge_user`;
CREATE TABLE IF NOT EXISTS `cruge_user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `regdate` bigint(30) DEFAULT NULL,
  `actdate` bigint(30) DEFAULT NULL,
  `logondate` bigint(30) DEFAULT NULL,
  `username` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Hashed password',
  `authkey` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'llave de autentificacion',
  `state` int(11) DEFAULT '0',
  `totalsessioncounter` int(11) DEFAULT '0',
  `currentsessioncounter` int(11) DEFAULT '0',
  `pic` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table gazebo_gestor.cruge_user: ~4 rows (approximately)
/*!40000 ALTER TABLE `cruge_user` DISABLE KEYS */;
INSERT INTO `cruge_user` (`iduser`, `regdate`, `actdate`, `logondate`, `username`, `email`, `password`, `authkey`, `state`, `totalsessioncounter`, `currentsessioncounter`, `pic`) VALUES
	(2, NULL, NULL, NULL, 'invitado', 'invitado@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 2, 0, 0, '.jpg'),
	(3, NULL, NULL, 1443569041, 'ytaborda', 'web@ytaborda.com', '82d57ec058fe5cbfe8ac9f19009f7f31', NULL, 1, 0, 0, '.jpg'),
	(4, 1435875802, NULL, NULL, 'beatriz', 'beamolero@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'a9ad86609d8bdb5786f136e7412014e5', 1, 0, 0, '.jpg'),
	(5, 1442784637, NULL, NULL, 'genesis', 'gazebocontab@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '6d79eefb755622f2f01eca5b6fbb82e0', 0, 0, 0, '.jpg');
/*!40000 ALTER TABLE `cruge_user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
