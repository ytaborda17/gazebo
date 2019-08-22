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

-- Dumping structure for table gazebo_site.contacto
DROP TABLE IF EXISTS `contacto`;
CREATE TABLE IF NOT EXISTS `contacto` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `tipo_id` int(11) NOT NULL COMMENT 'Tipo',
  `valor` varchar(250) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Valor',
  `estatus` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estatus',
  `empresa_id` int(11) NOT NULL DEFAULT '1',
  `red_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `type_id` (`tipo_id`),
  KEY `FK_contacto_empresa` (`empresa_id`),
  KEY `red_id` (`red_id`),
  CONSTRAINT `FK_contacto_contacto_tipo` FOREIGN KEY (`tipo_id`) REFERENCES `contacto_tipo` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_contacto_empresa` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table gazebo_site.contacto: ~5 rows (approximately)
/*!40000 ALTER TABLE `contacto` DISABLE KEYS */;
INSERT INTO `contacto` (`id`, `tipo_id`, `valor`, `estatus`, `empresa_id`, `red_id`) VALUES
	(1, 5, 'gazebococinas', 1, 1, 3),
	(2, 5, 'Gazebo-cocinas/233756253403160', 1, 1, 1),
	(3, 5, 'gazebococinas', 1, 1, 2),
	(4, 1, '0261 4118000', 1, 1, NULL),
	(6, 4, '0416 6670207', 1, 1, NULL);
/*!40000 ALTER TABLE `contacto` ENABLE KEYS */;


-- Dumping structure for table gazebo_site.contacto_tipo
DROP TABLE IF EXISTS `contacto_tipo`;
CREATE TABLE IF NOT EXISTS `contacto_tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `etiqueta` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `estatus` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table gazebo_site.contacto_tipo: ~6 rows (approximately)
/*!40000 ALTER TABLE `contacto_tipo` DISABLE KEYS */;
INSERT INTO `contacto_tipo` (`id`, `nombre`, `etiqueta`, `estatus`) VALUES
	(1, 'Teléfono', 'phone', 1),
	(2, 'Email', 'email', 1),
	(3, 'Dirección', 'address', 1),
	(4, 'Celular', 'phone', 1),
	(5, 'Red social', 'social', 1),
	(7, 'Whats App', 'phone', 1);
/*!40000 ALTER TABLE `contacto_tipo` ENABLE KEYS */;


-- Dumping structure for table gazebo_site.empresa
DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `nombre` varchar(140) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nombre',
  `rif` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'RIF',
  `telefono` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Teléfono',
  `direccion` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Dirección',
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `horario` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Horario de atención',
  `keywords` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `map` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table gazebo_site.empresa: ~1 rows (approximately)
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` (`id`, `nombre`, `rif`, `telefono`, `direccion`, `email`, `horario`, `keywords`, `description`, `map`) VALUES
	(1, 'Gazebo', 'J-29979430-9', '+58 261 7984503', 'Av. 9, Calle 72, CC San Onofre,  Maracaibo, Zulia, Venezuela', 'gazeboadmon@gmail.com', '<p><strong>LUNES - VIERNES</strong></p><p>8AM - 7PM</p><p>&nbsp;</p><p><strong>SABADOS</strong></p><p>8AM - 2PM</p>', 'Gazebo, Cocinas, Casa de Diseño', 'Casa de diseño en Venezuela especialistas en cocinas estilo italiano, muebles a medida e interiorismo.', 'https://www.google.com/maps/embed?pb=!1m21!1m12!1m3!1d3920.836264504481!2d-71.61163693131122!3d10.669814238143191!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m6!3e6!4m0!4m3!3m2!1d10.670016799999999!2d-71.6118578!5e0!3m2!1sen!2sve!4v1435634360932');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;


-- Dumping structure for table gazebo_site.filosofia
DROP TABLE IF EXISTS `filosofia`;
CREATE TABLE IF NOT EXISTS `filosofia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(800) COLLATE utf8_unicode_ci NOT NULL,
  `estatus` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table gazebo_site.filosofia: ~3 rows (approximately)
/*!40000 ALTER TABLE `filosofia` DISABLE KEYS */;
INSERT INTO `filosofia` (`id`, `titulo`, `descripcion`, `estatus`) VALUES
	(1, 'Misión', 'La misión de esta Compañía es proveer a todo tipo de cliente, nuestros productos y servicios para el hogar con la mas alta calidad a nivel nacional, a través de la mejora continua de nuestros procesos y la gestión eficiente de la empresa apoyándonos en nuestra tecnología de información y comunicación a fin de ofrecer los mejores tiempos de entrega y una excelente atención personalizada por cada uno de nuestros profesionales. Posicionando una imagen solida que se fundamenta en nuestros principios y valores de responsabilidad, respeto, calidad de servicio, ética y la dedicación al trabajo en equipo.', 1),
	(2, 'Visión', 'Llegar a ser la empresa líder en todas las fabricaciones e instalación de mobiliarios para el Hogar, transformando espacios en estilo de vida por medio de diseños de vanguardia propuestos por nuestros profesionales, resaltando nuestra calidad de servicio siempre en búsqueda de la excelencia. Desarrollando el mejor ambiente organizacional para nuestro equipo de trabajo, con el fin de alcanzar los objetivos empresariales.', 1),
	(3, 'Historia', 'Hola mundo', 0);
/*!40000 ALTER TABLE `filosofia` ENABLE KEYS */;


-- Dumping structure for table gazebo_site.galeria
DROP TABLE IF EXISTS `galeria`;
CREATE TABLE IF NOT EXISTS `galeria` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `nombre` varchar(140) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nombre',
  `descripcion` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Descripción',
  `prioridad` tinyint(2) NOT NULL DEFAULT '0' COMMENT 'Prioridad',
  `estatus` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estatus',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table gazebo_site.galeria: ~3 rows (approximately)
/*!40000 ALTER TABLE `galeria` DISABLE KEYS */;
INSERT INTO `galeria` (`id`, `nombre`, `descripcion`, `prioridad`, `estatus`) VALUES
	(1, 'Cocinas', '', 5, 1),
	(2, 'Persianas', '', 4, 1),
	(3, 'Pisos', '', 4, 1);
/*!40000 ALTER TABLE `galeria` ENABLE KEYS */;


-- Dumping structure for table gazebo_site.galeria_img
DROP TABLE IF EXISTS `galeria_img`;
CREATE TABLE IF NOT EXISTS `galeria_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `titulo` varchar(140) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Título',
  `file_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Imagen',
  `galeria_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_galeria_img_galeria` (`galeria_id`),
  CONSTRAINT `FK_galeria_img_galeria` FOREIGN KEY (`galeria_id`) REFERENCES `galeria` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table gazebo_site.galeria_img: ~26 rows (approximately)
/*!40000 ALTER TABLE `galeria_img` DISABLE KEYS */;
INSERT INTO `galeria_img` (`id`, `titulo`, `file_name`, `galeria_id`) VALUES
	(1, 'cocina 1', 'galeria-1-1.jpg', 1),
	(2, '', 'galeria-1-2.jpg', 1),
	(3, '', 'galeria-1-3.jpg', 1),
	(4, '', 'galeria-1-4.jpg', 1),
	(5, '', 'galeria-1-5.jpg', 1),
	(6, '', 'galeria-1-6.jpg', 1),
	(7, '', 'galeria-1-7.jpg', 1),
	(8, '', 'galeria-1-8.jpg', 1),
	(9, '', 'galeria-1-9.jpg', 1),
	(10, '', 'galeria-1-10.jpg', 1),
	(11, '', 'galeria-1-11.jpg', 1),
	(12, '', 'galeria-1-12.jpg', 1),
	(13, '', 'galeria-1-13.jpg', 1),
	(14, '', 'galeria-2-14.jpg', 2),
	(15, '', 'galeria-2-15.jpg', 2),
	(16, '', 'galeria-2-16.jpg', 2),
	(17, '', 'galeria-2-17.jpg', 2),
	(18, '', 'galeria-2-18.jpg', 2),
	(19, '', 'galeria-3-19.jpg', 3),
	(20, '', 'galeria-3-20.jpg', 3),
	(21, '', 'galeria-3-21.jpg', 3),
	(22, '', 'galeria-3-22.jpg', 3),
	(23, '', 'galeria-3-23.jpg', 3),
	(24, '', 'galeria-3-24.jpg', 3),
	(25, '', 'galeria-3-25.jpg', 3),
	(26, '', 'galeria-3-26.jpg', 3);
/*!40000 ALTER TABLE `galeria_img` ENABLE KEYS */;


-- Dumping structure for table gazebo_site.menu
DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `operation` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `active` text COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table gazebo_site.menu: ~5 rows (approximately)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id`, `label`, `parent`, `operation`, `url`, `active`, `sort`, `status`) VALUES
	(1, 'Inicio', 0, NULL, '/site/inicio', 'site/index', 1, 1),
	(2, 'Empresa', 0, NULL, '/site/empresa', 'site/empresa', 1, 1),
	(3, 'Servicios', 0, NULL, '/site/servicios', 'site/servicios', 1, 1),
	(4, 'Galeria', 0, NULL, '/site/galeria', 'site/galeria', 1, 1),
	(5, 'Contacto', 0, NULL, '/site/contacto', 'site/contacto', 1, 1);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;


-- Dumping structure for table gazebo_site.red_social
DROP TABLE IF EXISTS `red_social`;
CREATE TABLE IF NOT EXISTS `red_social` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table gazebo_site.red_social: ~3 rows (approximately)
/*!40000 ALTER TABLE `red_social` DISABLE KEYS */;
INSERT INTO `red_social` (`id`, `nombre`, `url`, `class`) VALUES
	(1, 'Facebook', 'https://www.facebook.com/pages/', 'social-fb'),
	(2, 'Twitter', 'https://twitter.com/', 'social-tw'),
	(3, 'Instagram', 'https://instagram.com/', 'social-in');
/*!40000 ALTER TABLE `red_social` ENABLE KEYS */;


-- Dumping structure for table gazebo_site.servicio
DROP TABLE IF EXISTS `servicio`;
CREATE TABLE IF NOT EXISTS `servicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(800) COLLATE utf8_unicode_ci NOT NULL,
  `estatus` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table gazebo_site.servicio: ~3 rows (approximately)
/*!40000 ALTER TABLE `servicio` DISABLE KEYS */;
INSERT INTO `servicio` (`id`, `titulo`, `descripcion`, `estatus`) VALUES
	(1, 'Proyectos arquitectonicos', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1),
	(2, 'Diseño de interiores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1),
	(3, 'Fabricantes y distribuidores', 'Somos fabricantes de cocinas estilo italiano, closets, muebles de TV , mobiliario en general siguiendo nuestra linea minimalista. Además suministramos e instalamos mármoles, granitos, silestone y piedra en general para pisos, topes y paredes.\r\nSomos distribuidores exclusivos Hunter Douglas , nos ocupamos de proyectos de cualquier escala ofreciendo servicio impecable en instalación y mantenimiento de los productos Hunter Douglas.\r\nTambién ofrecemos puertas de baño en vidrio y pisos flotantes Kronopol, asi como su instalación.\r\nContamos con excelente personal calificado y excelente tiempo de respuesta. Nos mantenemos en constante búsqueda de materiales y productos para siempre ofrecerles lo mas innovador en interiorismo y arquitectura.', 1);
/*!40000 ALTER TABLE `servicio` ENABLE KEYS */;


-- Dumping structure for table gazebo_site.visitor
DROP TABLE IF EXISTS `visitor`;
CREATE TABLE IF NOT EXISTS `visitor` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `timeStamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha y hora',
  `ipAddress` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Dirección IP',
  `status` int(11) DEFAULT NULL COMMENT 'Estatus',
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Ciudad',
  `region` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Estado/Región',
  `countryName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'País',
  `countryCode` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Código país',
  `latitude` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Latitud',
  `longitude` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Longitud',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table gazebo_site.visitor: ~7 rows (approximately)
/*!40000 ALTER TABLE `visitor` DISABLE KEYS */;
INSERT INTO `visitor` (`id`, `timeStamp`, `ipAddress`, `status`, `city`, `region`, `countryName`, `countryCode`, `latitude`, `longitude`) VALUES
	(1, '2015-09-24 23:09:13', '127.0.0.1', 404, '', '', '', '', '0', '0'),
	(2, '2015-09-24 23:09:14', '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, '2015-09-26 13:09:30', '127.0.0.1', 404, '', '', '', '', '0', '0'),
	(4, '2015-09-26 13:09:31', '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(5, '2015-09-28 10:09:24', '127.0.0.1', 404, '', '', '', '', '0', '0'),
	(6, '2015-09-28 10:09:25', '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(7, '2015-09-28 16:09:23', '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `visitor` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
