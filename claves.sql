CREATE DATABASE IF NOT EXISTS `asterisk`;

USE asterisk;

CREATE TABLE IF NOT EXISTS `claves` (
  `id` int(100) NOT NULL auto_increment,
  `anexo` int(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `clave` int(10) NOT NULL,
  `tipo` int(1) NOT NULL default '1',
  `loc` int(1) NOT NULL,
  `cel` int(1) NOT NULL,
  `ldn` int(1) NOT NULL,
  `ldi` int(1) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `anexo` (`anexo`),
  UNIQUE KEY `clave` (`clave`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

CREATE USER 'edita_pin'@'localhost' IDENTIFIED BY 'asinar_claves123';
GRANT ALL PRIVILEGES ON asterisk . claves TO 'edita_pin'@'localhost';
FLUSH PRIVILEGES;