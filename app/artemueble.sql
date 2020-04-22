CREATE DATABASE artemueble
	DEFAULT CHARACTER SET utf8;

use artemueble;

CREATE TABLE usuario(
	id_usuario INT NOT NULL UNIQUE AUTO_INCREMENT,
	nombre_usuario VARCHAR(255) NOT NULL,
	telefono_usuario VARCHAR(255) NOT NULL,
	email_usuario VARCHAR(255) NOT NULL UNIQUE,
	password_usuario VARCHAR(255) NOT NULL, 
	fecha_registro_usuario DATETIME NOT NULL,
	rol_usuario VARCHAR(255) NOT NULL,
	imagen_usuario VARCHAR(255) NOT NULL,
	PRIMARY KEY(id_usuario)
);

CREATE TABLE producto(
	id_producto INT NOT NULL UNIQUE AUTO_INCREMENT,
	nombre_producto VARCHAR(255) NOT NULL,
	descripcion_producto TEXT CHARACTER SET utf8 NOT NULL,
	categoria_producto VARCHAR(255) NOT NULL,
	fecha_registro_producto DATETIME NOT NULL,
	lugar_producto VARCHAR(255) NOT NULL,
	imagen_producto VARCHAR(255) NOT NULL,
	PRIMARY KEY(id_producto)
);

/* Inserción de un administrador por defecto */

INSERT INTO usuario(nombre_usuario, telefono_usuario, email_usuario, password_usuario, 
	fecha_registro_usuario, rol_usuario, imagen_usuario)
		 VALUES ('Admin', '02041999', 'admin@gmail.com', '$2y$10$WoxtmFdqYF/9K0rVR/VAt.b53zYlyyKPEjbee00DGfST7YNiu9Zfu', NOW(), 'admin', 'default.jpg')

