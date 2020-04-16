<?php 

// Información de la base de datos
DEFINE('NOMBRE_SERVIDOR', 'localhost');
DEFINE('NOMBRE_USUARIO', 'root');
DEFINE('PASSWORD', '');
DEFINE('NOMBRE_BD', 'artemueble');

// Rutas de la web
DEFINE('SERVIDOR', 'http://localhost/Artemueble');
DEFINE('RUTA_GALERIA', SERVIDOR."/galeria");
DEFINE('RUTA_ACERCA', SERVIDOR."/acerca");
DEFINE('RUTA_CONTACTO', SERVIDOR."/contacto");

// Rutas administrador
DEFINE('RUTA_ADMIN', SERVIDOR."/admin");
DEFINE('RUTA_LOGIN_ADMIN', RUTA_ADMIN."/login");
DEFINE('RUTA_AGREGAR_ADMIN', RUTA_ADMIN."/agregar-admin");
DEFINE('RUTA_GALERIA_ADMIN', RUTA_ADMIN."/galeria-admin");
DEFINE('RUTA_LOGOUT_ADMIN', RUTA_ADMIN."/logout");
DEFINE('RUTA_ELIMINAR_PRODUCTO', RUTA_GALERIA_ADMIN."/eliminar");
DEFINE('RUTA_EDITAR_PRODUCTO', RUTA_GALERIA_ADMIN."/editar");
DEFINE('RUTA_DESTACADOS_ADMIN', RUTA_ADMIN."/destacados");

// Ruta recursos
DEFINE('RUTA_CSS', SERVIDOR."/css/");
DEFINE('RUTA_JS', SERVIDOR."/js/");
DEFINE('RUTA_IMG', SERVIDOR."/img/");
DEFINE('RUTA_IMG_PRODUCTOS', SERVIDOR."/img_productos");
DEFINE('RUTA_IMG_USUARIOS', SERVIDOR."/img_usuarios");
 ?>