-- ppdominguez2 y vbmejuto- 1/10/2019
-- script de creación de la bd, usuario, asignación de privilegios a ese usuario sobre la bd
-- creación de tabla e insert sobre la misma.
--
-- CREAR LA BD BORRANDOLA SI YA EXISTIESE
--
DROP DATABASE IF EXISTS `DRAIFDB`;
CREATE DATABASE `DRAIFDB` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
--
-- SELECCIONAMOS PARA USAR
--
USE `DRAIFDB`;
--
-- DAMOS PERMISO USO Y BORRAMOS EL USUARIO QUE QUEREMOS CREAR POR SI EXISTE
--
GRANT USAGE ON * . * TO `aidraifuser`@`localhost`;
	DROP USER `aidraifuser`@`localhost`;
--
-- CREAMOS EL USUARIO Y LE DAMOS PASSWORD,DAMOS PERMISO DE USO Y DAMOS PERMISOS SOBRE LA BASE DE DATOS.
--
CREATE USER IF NOT EXISTS `aidraifuser`@`localhost` IDENTIFIED BY 'pass2019';
GRANT USAGE ON *.* TO `aidraifuser`@`localhost` REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
GRANT ALL PRIVILEGES ON `aidraifuser`.* TO `aidraifuser`@`localhost` WITH GRANT OPTION;
--
-- Estructura de tabla para la tabla `datos`
--
CREATE TABLE IF NOT EXISTS `USUARIO` (

`login` varchar(15) NOT NULL,

`password` varchar(128) NOT NULL,

`nombre` varchar(30) NOT NULL,

`apellidos` varchar(50) NOT NULL,

`email` varchar(60) NOT NULL,

`uso` enum('profesional','personal', 'educativo', 'otro') NOT NULL,

PRIMARY KEY (`login`),

UNIQUE KEY `email` (`email`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `FICHERO` (

`id` int(4) NOT NULL AUTO_INCREMENT,

`nombre` varchar(30) NOT NULL,

`mime` enum('image/jpeg','application/pdf', 'video/quicktime', 'text/plain') NOT NULL,

`fecha` date NOT NULL,

`autor` varchar(15) NOT NULL,

PRIMARY KEY (`id`),

FOREIGN KEY (autor) REFERENCES USUARIO(login) ON DELETE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `CARPETA` (

`uid` int(4) NOT NULL AUTO_INCREMENT,

`nombre` varchar(30) NOT NULL,

`padre` int(4) NOT NULL,

`fecha` date NOT NULL,

`autor` varchar(15) NOT NULL,

PRIMARY KEY (`uid`),

FOREIGN KEY (padre) REFERENCES FICHERO(id) ON DELETE CASCADE,

FOREIGN KEY (autor) REFERENCES USUARIO(login) ON DELETE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `USUARIO`(`login`, `password`, `nombre`, `apellidos`, `email`, `uso`) VALUES ("admin","admin","admin","admin", "admin@gmail.com", "profesional");


