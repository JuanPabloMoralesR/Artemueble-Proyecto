<?php 
if(!ControlSesion::sesion_iniciada()){
	Redireccion::redirigir(SERVIDOR);
}
Conexion::abrir_conexion();
$productos_destacados = RepositorioProducto::obtener_por_lugar(Conexion::obtener_conexion(), 'en-destacados');
if(isset($_POST['enviar'])){
	
	$validador = new ValidadorProducto(Conexion::obtener_conexion(), $_POST['nombre_producto'], $_POST['categoria_producto'], $_POST['descripcion_producto'], $_FILES['img_producto']['tmp_name']);

	if($validador->ingreso_producto_validado()){
		$producto = new Producto('', $validador->obtener_nombre_producto(), $validador->obtener_descripcion_producto(), $validador->obtener_categoria_producto(),'', 'en-destacados', $_FILES['img_producto']['name']);
		$ruta_imagen = './img_productos/';
		$archivo_subido = $ruta_imagen . $_FILES['img_producto']['name'];
		move_uploaded_file($_FILES['img_producto']['tmp_name'], $archivo_subido);
		RepositorioProducto::ingresar_producto(Conexion::obtener_conexion(), $producto);
		//Ruta de la original
		$rtOriginal = $archivo_subido;
		//Crear variable de imagen a partir de la original
		$original = imagecreatefromjpeg($rtOriginal);
		//Definir tamaño máximo y mínimo
		$ancho_final = 800;
		$alto_final = 533;
		//Recoger ancho y alto de la original
		list($ancho,$alto)=getimagesize($rtOriginal);
		$lienzo=imagecreatetruecolor($ancho_final,$alto_final); 
		//Copiar $original sobre la imagen que acabamos de crear en blanco ($tmp)
		imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
		//Limpiar memoria
		imagedestroy($original);
		//Definimos la calidad de la imagen final
		$cal=90;
		//Se crea la imagen final en el directorio indicado
		// imagejpeg($lienzo,"./img_productos/thumb.jpg",$cal);
		imagejpeg($lienzo,$ruta_imagen.$_FILES['img_producto']['name'],$cal);
		Redireccion::redirigir(RUTA_DESTACADOS_ADMIN);
	}

	

}
Conexion::cerrar_conexion();
$titulo = 'Destacados';
include_once 'plantillas/documento_declaracion_admin.inc.php';
include_once 'plantillas/barra_navegacion_admin.inc.php';
?>

<main class="col">
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1>Administrar destacados</h1>
			<p class="lead">Administrar las imágenes del slider principal así como también los destacados de esta semana</p>
		</div>
	</div>
	<div class="carousel slide" data-ride="carousel" id="carousel_destacados">
		<ol class="carousel-indicators">
			<li data-target="#carousel_destacados" data-slide-top="0" class="active"></li>
			<li data-target="#carousel_destacados" data-slide-top="1"></li>
			<li data-target="#carousel_destacados" data-slide-top="2"></li>
		</ol>

		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100" src="<?php echo RUTA_IMG?>slidem1.jpg" alt="First slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="<?php echo RUTA_IMG?>slidem2.jpg" alt="Second slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="<?php echo RUTA_IMG?>slidem3.jpg" alt="Third slide">
			</div>
			<a class="carousel-control-prev" href="#carousel_destacados" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carousel_destacados" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>		
	<section class="gallery-block compact-gallery">
		<div class="container">
			<div class="heading">
				<h2>Galeria de destacados semanal</h2>
			</div>
			<div class="row no-gutters">
				<?php foreach($productos_destacados as $producto): ?>
					<div class="col-md-6 col-lg-4 item zoom-on-hover">
						<a class="lightbox" href="<?php echo RUTA_IMG_PRODUCTOS . "/" . $producto->obtener_imagen_producto();?>">
							<img class="img-fluid image" src="<?php echo RUTA_IMG_PRODUCTOS . "/" . $producto->obtener_imagen_producto();?>">
							<span class="description">
								<span class="description-heading"><?php echo $producto->obtener_nombre_producto();?></span> <p class="text-muted"><?php echo $producto->obtener_categoria_producto();?></p>
								<span class="description-body text-justify"><?php echo $producto->obtener_descripcion_producto();?></span>
							</span>
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>		
	<?php if (count($productos_destacados) >= 9): ?>
		<div class="alert alert-info" rol="alert">Atualmente hay <?php echo count($productos_destacados)?> productos destacados, puedes editar o borrar en la galeria</div>
		<?php else: ?>
			<div class="container">
				<div class="row">
					<div class="card col-md-6 border-dark">
						<div class="card-header text-dark">
							<h3>Ingresar nuevo producto destacado</h3>
						</div>
						<div class="card-body">
							<form action="<?php echo RUTA_DESTACADOS_ADMIN?>" method="POST" enctype="multipart/form-data">
								<?php 
								if(isset($_POST['enviar'])){
									include_once 'plantillas/registro_producto_validado.inc.php';
								}else{
									include_once 'plantillas/registro_producto_vacio.inc.php';
								}
								?>
							</form>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card bg-light text-black border-secondary">
							<div class="card-header">
								<h3>¡Bienvenido a los destcados!</h3>
							</div>
							<div class="card-body">
								<p>En esta pestaña de destacados podrás elegir los mejores productos de esta semana/mes para mostrarlos al cliente en la ventana principal. Pero recuerda, hay un límite de 9 productos en la galería de destacados. Estos productos también se mostraran en la galería general.</p>
							</div>
						</div>
					</div>
				</div>
			</div>		
		<?php endif ?>
	</main>
	<?php include_once 'plantillas/documento_cierre_admin.inc.php'; ?>