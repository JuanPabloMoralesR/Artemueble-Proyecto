<?php 

include_once 'app/config.inc.php';
include_once 'app/redireccion.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/usuario.inc.php';
include_once 'app/repositorio_usuario.inc.php';
include_once 'app/producto.inc.php';
include_once 'app/control_sesion.inc.php';
include_once 'app/validador_registro_admin.inc.php';	
include_once 'app/validador_login_admin.inc.php';
include_once 'app/repositorio_producto.inc.php';
include_once 'app/validador_producto.inc.php';
$componentes_url = parse_url($_SERVER['REQUEST_URI']);
$ruta = $componentes_url['path'];

$partes_ruta = explode('/', $ruta);
$partes_ruta = array_filter($partes_ruta);
$partes_ruta = array_slice($partes_ruta, 0);

$ruta_elegida = 'vistas/404.php';

if($partes_ruta[0] == 'Artemueble'){
	if(count($partes_ruta) == 1){
		$ruta_elegida = 'vistas/home.php';
	}else if(count($partes_ruta) == 2){
		switch ($partes_ruta[1]) {
			case 'galeria':
			Conexion::abrir_conexion();
			$productos = RepositorioProducto::obtener_todos(Conexion::obtener_conexion());
			Conexion::cerrar_conexion();
			$ruta_elegida = 'vistas/galeria.php';
			break;
			case 'admin':
			$ruta_elegida = 'vistas/home_admin.php';
			break;
			case 'acerca':
			$ruta_elegida = 'vistas/acerca.php';
			break;
			case 'contacto':
			$ruta_elegida = 'vistas/contacto.php';
			break;
			case 'add-administrador':
			Conexion::abrir_conexion();
			$usuario = new Usuario('', 'Claudia Marcela', '32123223', 'claudia@gmail.com', password_hash('123456789', PASSWORD_DEFAULT), '', 'admin', 'foto.jpg');
			RepositorioUsuario::insertar_usuario(Conexion::obtener_conexion(), $usuario);
			echo "hola";
			Conexion::cerrar_conexion();
			break;
		}
	}else if(count($partes_ruta) == 3){
		if($partes_ruta[1] == 'admin'){
			switch ($partes_ruta[2]) {
				case 'login':
				$ruta_elegida = 'vistas/login_admin.php';
				break;

				case 'agregar-admin':
				$ruta_elegida = 'vistas/agregar_administrador.php';
				break;
				case 'galeria-admin':
				$ruta_elegida = 'vistas/galeria_admin.php';
				break;
				case 'logout':
				$ruta_elegida = 'vistas/logout_admin.php';
				break;
				case 'destacados':
				$ruta_elegida = 'vistas/destacados_admin.php';
				default:
				# code...
				break;
			}
		}else if($partes_ruta[1] == 'galeria'){
				Conexion::abrir_conexion();
				$productos = RepositorioProducto::obtener_por_categoria(Conexion::obtener_conexion(), $partes_ruta[2]);
				$ruta_elegida = "vistas/galeria.php";	
				Conexion::cerrar_conexion();
		}
	}else if(count($partes_ruta) == 5){
		Conexion::abrir_conexion();
		if(ControlSesion::sesion_iniciada()){	
			if($partes_ruta[3] == 'editar'){
				$producto = RepositorioProducto::obtener_producto_por_nombre(Conexion::obtener_conexion(), str_replace(" ", "-", $partes_ruta[4]));
				$ruta_elegida = 'vistas/editar_producto.php';	
			}else if($partes_ruta[3] == 'eliminar'){
				$producto = RepositorioProducto::obtener_producto_por_nombre(Conexion::obtener_conexion(), $partes_ruta[4]);
				RepositorioProducto::eliminar_producto(Conexion::obtener_conexion(), $producto->obtener_id_producto());
				Redireccion::redirigir(RUTA_GALERIA_ADMIN);
			}
			
		}else{
			Redireccion::redirigir(SERVIDOR);	
		}
		Conexion::cerrar_conexion();
	}
}

include_once $ruta_elegida;

?>