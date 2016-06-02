CREATE DATABASE IF NOT EXISTS la10uniformes;

USE la10uniformes;

DROP TABLE IF EXISTS calificacion;

CREATE TABLE `calificacion` (
  `idCalificacion` int(11) NOT NULL AUTO_INCREMENT,
  `idUniforme` int(11) NOT NULL,
  `comentario` varchar(70) NOT NULL,
  `rango` varchar(70) NOT NULL,
  PRIMARY KEY (`idCalificacion`),
  KEY `idUniforme` (`idUniforme`),
  CONSTRAINT `calificacion_ibfk_1` FOREIGN KEY (`idUniforme`) REFERENCES `uniformes` (`idUniforme`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO calificacion VALUES("1","12","","4");



DROP TABLE IF EXISTS imagenes;

CREATE TABLE `imagenes` (
  `idImagen` int(11) NOT NULL AUTO_INCREMENT,
  `idProveedor` int(11) NOT NULL,
  `idUniforme` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `imagen` varchar(70) NOT NULL,
  `descripcion` varchar(70) NOT NULL,
  PRIMARY KEY (`idImagen`),
  KEY `idProveedor` (`idProveedor`),
  KEY `idUniforme` (`idUniforme`),
  KEY `idProveedor_2` (`idProveedor`),
  KEY `idProveedor_3` (`idProveedor`),
  CONSTRAINT `imagenes_ibfk_1` FOREIGN KEY (`idUniforme`) REFERENCES `uniformes` (`idUniforme`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `imagenes_ibfk_2` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO imagenes VALUES("2","1","12","0","../../GUI/imagenes/Chrysanthemum.jpg","Escriba sus Comentarios....\n                                ");
INSERT INTO imagenes VALUES("5","1","12","0","../../GUI/imagenes/Chrysanthemum.jpg","Escriba sus Comentarios....\n                                ");
INSERT INTO imagenes VALUES("6","1","12","0","../../GUI/imagenes/Chrysanthemum.jpg","descripcions");
INSERT INTO imagenes VALUES("7","1","12","4","../../GUI/imagenes/Chrysanthemum.jpg","dsu");



DROP TABLE IF EXISTS noticias;

CREATE TABLE `noticias` (
  `idNoticia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(70) NOT NULL,
  `contenido` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idNoticia`),
  KEY `idUsuario` (`idUsuario`),
  CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS password;

CREATE TABLE `password` (
  `usuario` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `rol` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO password VALUES("124114","123","PROVEEDOR");
INSERT INTO password VALUES("test2","1234","ADMINISTRADOR");



DROP TABLE IF EXISTS permisos;

CREATE TABLE `permisos` (
  `idPermiso` int(11) NOT NULL AUTO_INCREMENT,
  `idRol` int(11) NOT NULL,
  `Permiso` varchar(70) NOT NULL,
  PRIMARY KEY (`idPermiso`),
  KEY `idPermiso` (`idPermiso`),
  KEY `idRol` (`idRol`),
  CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS peticion_usuarios;

CREATE TABLE `peticion_usuarios` (
  `idPeticion` int(11) NOT NULL,
  `idUsuarios` int(11) NOT NULL,
  `estado` varchar(70) NOT NULL,
  KEY `idUsuarios` (`idUsuarios`),
  KEY `idPeticion` (`idPeticion`),
  CONSTRAINT `peticion_usuarios_ibfk_1` FOREIGN KEY (`idUsuarios`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `peticion_usuarios_ibfk_2` FOREIGN KEY (`idPeticion`) REFERENCES `peticiones` (`idPeticion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS peticiones;

CREATE TABLE `peticiones` (
  `idPeticion` int(11) NOT NULL AUTO_INCREMENT,
  `idProveedor` int(11) NOT NULL,
  `estadoDePago` varchar(70) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idPeticion`),
  KEY `idProveedor` (`idProveedor`),
  KEY `idProveedor_2` (`idProveedor`),
  KEY `idProveedor_3` (`idProveedor`),
  CONSTRAINT `peticiones_ibfk_1` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO peticiones VALUES("4","4","NO HA PAGADO","2016-05-02");



DROP TABLE IF EXISTS proveedor;

CREATE TABLE `proveedor` (
  `idProveedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(70) NOT NULL,
  `apellido` varchar(70) NOT NULL,
  `documento` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `contrasena` varchar(70) NOT NULL,
  `nroCuentaBancaria` varchar(70) NOT NULL,
  `direccion` varchar(70) NOT NULL,
  `estado` varchar(70) NOT NULL,
  PRIMARY KEY (`idProveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO proveedor VALUES("1","Panterita","Rosa","124114","pantera@rosa","123","435132","cllpantera","SUBSCRITO");
INSERT INTO proveedor VALUES("3","Camilo","Torres","21414","fasf@hg","123","132412341","cll21","SUBSCRITO");
INSERT INTO proveedor VALUES("4","Marta ","Caceres","241341351","dgg@gkj","24344","4652","cll6@ghur","SUBSCRITO");
INSERT INTO proveedor VALUES("5","JAVIER","MARTINEZ","1341","DG@H","311","E41","FA3","SUBSCRITO");



DROP TABLE IF EXISTS publicidad;

CREATE TABLE `publicidad` (
  `idPublicidad` int(11) NOT NULL AUTO_INCREMENT,
  `idProveedor` int(11) NOT NULL,
  `imagen` varchar(70) NOT NULL,
  `titulo` varchar(70) NOT NULL,
  `descripcion` varchar(70) NOT NULL,
  PRIMARY KEY (`idPublicidad`),
  KEY `idProveedor` (`idProveedor`),
  CONSTRAINT `publicidad_ibfk_1` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS reserva;

CREATE TABLE `reserva` (
  `idReserva` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `idProveedor` int(11) NOT NULL,
  `idUniforme` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `precio` double NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`idReserva`),
  KEY `idProveedor` (`idProveedor`),
  KEY `idUniforme` (`idUniforme`),
  KEY `idUsuario` (`idUsuario`),
  CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`idUniforme`) REFERENCES `uniformes` (`idUniforme`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reserva_ibfk_3` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS rol;

CREATE TABLE `rol` (
  `idUsuario` int(11) NOT NULL,
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(70) NOT NULL,
  PRIMARY KEY (`idRol`),
  KEY `idUsuario` (`idUsuario`),
  CONSTRAINT `rol_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS uniformes;

CREATE TABLE `uniformes` (
  `idUniforme` int(11) NOT NULL AUTO_INCREMENT,
  `equipo` varchar(70) NOT NULL,
  `categoria` varchar(70) NOT NULL,
  `tallas` varchar(70) NOT NULL,
  `precio` varchar(70) NOT NULL,
  `tela` varchar(70) NOT NULL,
  `descuento` varchar(70) NOT NULL,
  `replica_original` varchar(70) NOT NULL,
  `clasificacion` varchar(70) NOT NULL,
  `idProveedor` int(70) NOT NULL,
  `descripcion` varchar(70) NOT NULL,
  PRIMARY KEY (`idUniforme`),
  KEY `idProveedor` (`idProveedor`),
  CONSTRAINT `uniformes_ibfk_1` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO uniformes VALUES("12","manchester","a2","xl","870","ba","12","si","si","1","Escriba sus Comentarios....\n                                ");



DROP TABLE IF EXISTS usuarios;

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `documento` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `contraseña` varchar(70) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `imagen` varchar(70) NOT NULL,
  `rol` varchar(70) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO usuarios VALUES("1","Mario","Yepes","12321415","MarioAlberto@hotmail.com","12334","3124112","ene.png","CLIENTE");
INSERT INTO usuarios VALUES("2","GOKU","Ssj4","34141","dragon@jgj","2342","23324","sff,kdg","ADMINISTRADOR");



DROP TABLE IF EXISTS usuarios_calificacion;

CREATE TABLE `usuarios_calificacion` (
  `idUsuario` int(11) NOT NULL,
  `idCalificacion` int(11) NOT NULL,
  KEY `idUsuario` (`idUsuario`),
  KEY `idCalificacion` (`idCalificacion`),
  CONSTRAINT `usuarios_calificacion_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `usuarios_calificacion_ibfk_2` FOREIGN KEY (`idCalificacion`) REFERENCES `calificacion` (`idCalificacion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




