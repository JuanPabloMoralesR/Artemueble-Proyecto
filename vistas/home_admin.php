<?php 
if(!ControlSesion::sesion_iniciada()){
	Redireccion::redirigir(RUTA_LOGIN_ADMIN);
}


if(isset($_POST['enviar'])){
	Conexion::abrir_conexion();

	$imagen_perfil = $_FILES['imagen_perfil'];
	$imagen_perfil_actual = $_POST['imagen_perfil_actual'];

	if(empty($imagen_perfil['tmp_name'])){
		$imagen_perfil = $imagen_perfil_actual;
	}else{
		$ruta_archivo = './img_usuarios/';
		$archivo_subido = $ruta_archivo . $imagen_perfil['name'];
		move_uploaded_file($imagen_perfil['tmp_name'], $archivo_subido);
		$imagen_perfil = $_FILES['imagen_perfil']['name'];
	}

	$usuario_actualizado = new Usuario($_SESSION['id_usuario'], $_POST['nombre_admin'], $_POST['telefono_admin'], $_POST['correo_admin'], '', '', '', $imagen_perfil);
	RepositorioUsuario::actualizar_datos(Conexion::obtener_conexion(), $usuario_actualizado);
	 $_SESSION['nombre_usuario'] = $usuario_actualizado->obtener_nombre_usuario();
	Redireccion::redirigir(RUTA_ADMIN);

	Conexion::cerrar_conexion();
}

$titulo = "Panel de administracion";
include_once 'plantillas/documento_declaracion_admin.inc.php';
include_once 'plantillas/barra_navegacion_admin.inc.php';
Conexion::abrir_conexion();
$usuario_admin = RepositorioUsuario::obtener_usuario_por_id(Conexion::obtener_conexion(), $_SESSION['id_usuario']);
Conexion::cerrar_conexion();
?>

<main class="col home"> 
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">¡Hola <?php echo $_SESSION['nombre_usuario']?>!</h1>
			<p class="lead">Bienvenida al panel de administración, acá podrás ver información de la página así como también gestionar tus datos personales</p>
		</div>
	</div>	
	<div class="row informacion-admin">
		<div class="col">
			<div class="row">
				<div class="col-sm-4 foto">
					<img src="<?php echo RUTA_IMG_USUARIOS . "/" . $usuario_admin->obtener_imagen_usuario();?>" class="img-fluid w-100">
					<br>
					<br>
					
				</div>
				<div class="col-sm-8 info">
					<form method="POST" action="<?php echo RUTA_ADMIN?>" enctype="multipart/form-data">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="nombre_admin">Nombre</label>
								<input type="text" class="form-control" id="nombre_admin" name="nombre_admin" value="<?php echo $usuario_admin->obtener_nombre_usuario();?>">
							</div>
							<div class="form-group col-md-6">
								<label for="correo_admin">Correo</label>
								<input type="email" class="form-control" name="correo_admin" id="correo_admin" value="<?php echo $usuario_admin->obtener_email_usuario();?>">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="telefono_admin">Teléfono</label>
								<input type="text" class="form-control" name="telefono_admin" id="telefono_admin" value="<?php echo $usuario_admin->obtener_telefono_usuario();?>">
							</div>
							<div class="form-group col-md-6">
								<label for="imagen_perfil">cambiar imagen perfil</label>
								<input type="file" name="imagen_perfil" id="imagen_perfil">
								<input type="hidden" name="imagen_perfil_actual" value="<?php echo $usuario_admin->obtener_imagen_usuario(); ?>">
							</div>
						</div>
						<button type="submit" class="btn btn-outline-secondary" name="enviar">Actualizar datos</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>

<?php include_once 'plantillas/documento_cierre_admin.inc.php'; ?>