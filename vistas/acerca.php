<?php 


$titulo = "Acerca de nosotros";
include_once 'plantillas/documento_declaracion.inc.php';
include_once 'plantillas/barra_navegacion.inc.php';
Conexion::abrir_conexion();
$admins = RepositorioUsuario::obtener_usuario_segun_rol(Conexion::obtener_conexion(), 'admin');
Conexion::cerrar_conexion();
?>

<div class="jumbotron text-center">
	<h1 class="display-4">¡Bienvenido a artemueble!</h1>
	<p class="lead">Conoce un poco mas sobre nosotros...</p>
	<hr class="my-4">
</div>

<div class="container-fluid admins-acerca">
	<div class="row d-flex justify-content-between">
		<?php foreach ($admins as $admin): ?>
			<div class="col-lg-3">
				<div class="cont-img text-center">
					<img class="rounded-circle" src="<?php echo RUTA_IMG_USUARIOS . "/" . $admin->obtener_imagen_usuario();?>" alt="Generic placeholder image" width="180" height="180">
				</div>
				<h4 class="text-center"><?php echo $admin->obtener_nombre_usuario();?></h4>
				<p class="text-muted text-center"><?php echo $admin->obtener_email_usuario();?><p>
				</div><!-- /.col-lg-4 -->
			<?php endforeach ?>
		</div><!-- /.row -->
		<hr>
		<div class="row d-flex justify-content-end">
			<h3>Administradores de la página</h3>
		</div>
		<hr>
	</div>

	<div class="container">
		<div class="row contenido-bienvenida">
			<div class="col-lg-4">
				<h3>Una bienvenida a la web...</h3>
				<p class="text-justify">Bienvenidos a nuestro sitio web, aquí  podrá encontrar toda nuestra información , datos de contacto y nuestra vision, no olvide manifestarnos sus dudas, en caso de que así las tenga  con gusto responderemos ,deja tus  datos  en nuestra sección de contactos.

				Constantemente estaremos actualizando nuestros contenidos, sobre todo nuestras galerías de productos, por lo que lo invitamos a visitarnos constantemente para que de esta manera puedas disfrutar y conocer las nuevas tendencias en diseño de interiores.</p>
			</div>
			<div class="col-lg-8">
				<img src="<?php echo RUTA_IMG?>/fav6.jpg" class="img-fluid">
			</div>
		</div>
		<hr>

		<div class="row contenido-enmundo">
			<div class="col-md-4 img-enmundo">
				<img src="<?php echo RUTA_IMG?>/fav5.jpg" class="img-fluid">
			</div>
			<div class="col-md-8 ">
				<h3>En un mundo muy lejano...</h3>
				<p class="text-justify">Hace 25 años nacio la empresa con el objetivo de llevar nuestro arte hasta cada hogar , hasta cada empresa , para que cada ambiente  decorado se convierta  en un espacio   de confort  y calidez, entregamos  “el arte hecho mueble “, brindando nuestra experiencia  a nuestros clientes, quienes son ellos nuestra carta de presentación , cada diseño  es pensado exclusivamente de acuerdo a sus necesidades y gustos ,con los estándares de la más alta calidad ,basados en las últimas tendencias , que nos mantiene a la vanguardia.

				Queremos llevar nuestra empresa  al reconocimiento nacional, por nuestro sello de calidad, entregando una asesoría integral en decoración de interiores y nuestra línea corporativa.</p>
			</div>
		</div>
		<hr>
	</div>
	<?php 
	include_once 'plantillas/footer.inc.php'; 
	include_once 'plantillas/documento_cierre.inc.php'; ?>