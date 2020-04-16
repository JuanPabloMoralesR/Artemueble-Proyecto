<?php 

if(!ControlSesion::sesion_iniciada()){
	Redireccion::redirigir(SERVIDOR);
}

$titulo = "Agregar Administrador";
include_once 'plantillas/documento_declaracion_admin.inc.php';
include_once 'plantillas/barra_navegacion_admin.inc.php';
Conexion::abrir_conexion();
$admins = RepositorioUsuario::obtener_usuario_segun_rol(Conexion::obtener_conexion(), 'admin');

if(isset($_POST['enviar'])){
	$validador = new ValidadorRegistroAdmin(Conexion::obtener_conexion(), $_POST['nombre_admin'],$_POST['correo_admin'],$_POST['telefono_admin'], $_POST['password_admin'],$_POST['password_admin_confirm'], $_FILES['imagen_usuario']['tmp_name']);

	if($validador -> registro_validado()){
		$usuario = new Usuario('', $validador->obtener_nombre_admin(), $validador->obtener_telefono_admin(), $validador->obtener_correo_admin(), password_hash($validador->obtener_password_admin_con(), PASSWORD_DEFAULT), '', 'admin', $_FILES['imagen_usuario']['name']);

		$ruta_imagen = './img_usuarios/';
		$archivo_subido = $ruta_imagen . $_FILES['imagen_usuario']['name'];
		move_uploaded_file($_FILES['imagen_usuario']['tmp_name'], $archivo_subido);
		$usuario_insertado = RepositorioUsuario::insertar_usuario(Conexion::obtener_conexion(), $usuario);
		if($usuario_insertado){
			Redireccion::redirigir(RUTA_AGREGAR_ADMIN);
		}else{
			echo "Error al insertar usuario";
		}
	}
}
Conexion::cerrar_conexion();
?>


<main class="col main">
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">Administrar ingreso al panel</h1>
			<p class="lead">Aquí podrás ver quienes tienen ingreso al panel de administración, así como también ingresar un nuevo administrador.</p>
		</div>
	</div>
	<div class="row administradores d-flex justify-content-between">
		<?php foreach ($admins as $admin): ?>
			<div class="col-sm-6 col-md-3 text-center">
				<img src="<?php echo RUTA_IMG_USUARIOS . "/" . $admin->obtener_imagen_usuario();?>" class="img-fluid img-admin">
				<br>
				<br>
				<h5><?php echo $admin->obtener_nombre_usuario(); ?></h5>
				<p class="text-muted"><?php echo $admin->obtener_email_usuario(); ?></p>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="row">
		<div class="col-md-8">
			<div class="panel">
				<h2 class="titulo">Agregar nuevo administrador</h2>
				<?php if (count($admins) < 4): ?>
					<form method="POST" action = "<?php echo RUTA_AGREGAR_ADMIN?>" enctype="multipart/form-data">
					<?php 
					if(isset($_POST['enviar'])){
						include_once 'plantillas/registro_validado_admin.inc.php';
					}else{
						include_once 'plantillas/registro_vacio_admin.inc.php';
					}
					?>
				</form>
				<?php else: ?>
					<div class="alert alert-danger" rol="alert">Sólo puede haber un máximo de 4 administradores</div>
					<form>
					<?php 
					if(isset($_POST['enviar'])){
						include_once 'plantillas/registro_validado_admin.inc.php';
					}else{
						include_once 'plantillas/registro_vacio_admin.inc.php';
					}
					?>
				</form>
				<?php endif ?>
				
			</div>
		</div>
		<div class="col-md-4 d-flex justify-content-center mt-3">
			<div class="card text-white bg-secondary mb-3 funciones" style="max-width: 18rem;">
				<div class="card-header">Administrador</div>
				<div class="card-body">
					<h5 class="card-title">Funciones del administrador</h5>
					<p class="card-text text-justify">Un administrador tendrá control de todas las opciones en la página, tales como: editar su información personal, agregar, eliminar y editar elementos de la galería, editar la sección de destacados etc. Habrá un máximo de 4 administradores.</p>
				</div>
			</div>
		</div>
	</div>

</main>


<?php include_once 'plantillas/documento_cierre_admin.inc.php'; ?>