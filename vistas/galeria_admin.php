<?php 
if(!ControlSesion::sesion_iniciada()){
	Redireccion::redirigir(SERVIDOR);
}

$titulo = "Galeria admin";
include_once 'plantillas/documento_declaracion_admin.inc.php';
include_once 'plantillas/barra_navegacion_admin.inc.php';
Conexion::abrir_conexion();

if(isset($_POST['ordenar_por'])){

	if($_POST['ordenar'] == 'todos'){
		$productos = RepositorioProducto::obtener_todos(Conexion::obtener_conexion());	
	}else{
		if($_POST['ordenar'] == 'destacados'){
			$productos = RepositorioProducto::obtener_por_lugar(Conexion::obtener_conexion(), 'en-destacados');
		}else{
			$productos = RepositorioProducto::obtener_por_categoria(Conexion::obtener_conexion(), $_POST['ordenar']);
		}
	}
	
}else{
	$productos = RepositorioProducto::obtener_todos(Conexion::obtener_conexion());	
}

if(isset($_POST['enviar'])){
	
	$validador = new ValidadorProducto(Conexion::obtener_conexion(), $_POST['nombre_producto'], $_POST['categoria_producto'], $_POST['descripcion_producto'], $_FILES['img_producto']['tmp_name']);

	if($validador->ingreso_producto_validado()){
		$producto = new Producto('', $validador->obtener_nombre_producto(), $validador->obtener_descripcion_producto(), $validador->obtener_categoria_producto(), '','en-galeria', $_FILES['img_producto']['name']);
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
		Redireccion::redirigir(RUTA_GALERIA_ADMIN);	
	}
}
Conexion::cerrar_conexion();


?>

<main class="col galeria-admin">
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">Administrar Galeria</h1>
			<p class="lead">Aquí podrás ingresar nuevos productos así como también gestionar los productos ya existentes</p>
		</div>
	</div>
	<div class="row">
		<div class="col-12 nuevo-producto">
			<div class="row">
				<div class="col-md-5">
					<form method="POST" action="<?php echo RUTA_GALERIA_ADMIN?>" enctype="multipart/form-data">
						<?php 
						if(isset($_POST['enviar'])){
							include_once 'plantillas/registro_producto_validado.inc.php';
						}else{
							include_once 'plantillas/registro_producto_vacio.inc.php';	
						}
						?>
						<br>
					</form>
				</div>
				<div class="col-md-7 justify-content-center">
					<div class="row ">
						<div class="col-md-6">
							<div class="card bg-light mb-3" style="max-width: 18rem;">
								<div class="card-header">Gestionar Productos</div>
								<div class="card-body">
									<h5 class="card-title">Agregar</h5>
									<p class="card-text">Aquí podrás agregar, editar y eliminar todos los productos de la galería. Estos serán vistos por los clientes en la galeria principal</p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card border-info mb-3" style="max-width: 18rem;">
								<div class="card-header">Gestionar Productos</div>
								<div class="card-body text-info">
									<h5 class="card-title">Destacados</h5>
									<p class="card-text">En la pestaña de destacados podrás gestionar los productos que consideres mejor y que se debería ver primero, así como también elegir las imágenes que estarán en el slider.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container mt-3 d-flex justify-content-end">
			<form class="form-inline" method="POST" action="<?php echo RUTA_GALERIA_ADMIN?>">
				<div class="form-group mb-2">
					<label class="form-control-plaintext">Mostrar por</label>
				</div>
				<div class="form-group mx-sm-3 mb-2">
					<label for="ordenar" class="sr-only">Password</label>
					<select class="form-control" name="ordenar" id="ordenar">
						<option value="todos" <?php echo $selected = (isset($_POST['ordenar_por']) && $_POST['ordenar'] == 'todos') ? 'selected': ''?>>Todos</option>
						<option value="comedores" <?php echo $selected = (isset($_POST['ordenar_por']) && $_POST['ordenar'] == 'comedores') ? 'selected': ''?>>Comedores</option>
						<option value="mesas" <?php echo $selected = (isset($_POST['ordenar_por']) && $_POST['ordenar'] == 'mesas') ? 'selected': ''?>>Mesas</option>
						<option value="sillas" <?php echo $selected = (isset($_POST['ordenar_por']) && $_POST['ordenar'] == 'sillas') ? 'selected': ''?>>Sillas</option>
						<option value="espejos" <?php echo $selected = (isset($_POST['ordenar_por']) && $_POST['ordenar'] == 'espejos') ? 'selected': ''?>>Espejos</option>
						<option value="consolas" <?php echo $selected = (isset($_POST['ordenar_por']) && $_POST['ordenar'] == 'consolas') ? 'selected': ''?>>Consolas</option>
						<option value="camas" <?php echo $selected = (isset($_POST['ordenar_por']) && $_POST['ordenar'] == 'camas') ? 'selected': ''?>>Camas</option>
						<option value="sofas" <?php echo $selected = (isset($_POST['ordenar_por']) && $_POST['ordenar'] == 'sofas') ? 'selected': ''?>>Sofas</option>
						<option value="salas" <?php echo $selected = (isset($_POST['ordenar_por']) && $_POST['ordenar'] == 'salas') ? 'selected': ''?>>Salas</option>
						<option value="habitaciones" <?php echo $selected = (isset($_POST['ordenar_por']) && $_POST['ordenar'] == 'habitaciones') ? 'selected': ''?>>Habitaciones</option>
						<option value="otro" <?php echo $selected = (isset($_POST['ordenar_por']) && $_POST['ordenar'] == 'otro') ? 'selected': ''?>>Otro</option>
						<option value="destacados" <?php echo $selected = (isset($_POST['ordenar_por']) && $_POST['ordenar'] == 'comedores') ? 'destacados': ''?>>En destacados</option>
					</select>
				</div>
				<button type="submit" class="btn btn-primary mb-2" name="ordenar_por">Confirmar</button>
			</form>
		</div>
		<div class="col-12 mt-4">
			<?php if (isset($_POST['ordenar_por'])): ?>
				<?php if (!empty($productos)): ?>
					<div class="alert alert-secondary" role="alert">
						<h4 class="alert-heading">Se mostraran los productos por: <?php echo $_POST['ordenar']?></h4>
						<hr>
						<p class="text-muted">Se encontraron <?php echo count($productos)?> resultados</p>
					</div>
				<?php endif ?>
			<?php else:  ?>
				<div class="alert alert-dark" role="alert">
					<h4 class="alert-heading">Todos los productos </h4>
					<p>A continuación verás todos los productos de la galeria, para mostrar por categoría o por destacados elige una opción arriba</p>
					<hr>
				</div>
			<?php endif ?>
			</div>

			<?php if (empty($productos)): ?>
				<div class="col-12 mt-4	">
					<div class="alert alert-info" rol="alert">No hay productos</div>
				</div>
				<?php else: ?>
					<?php foreach($productos as $producto): ?>
						<div class="col-md-6 container-img-galeria card-group">
							<div class="card mb-3">
								<img class="card-img-top imagen-galeria img-fluid" src="<?php echo RUTA_IMG_PRODUCTOS.'/'.$producto->obtener_imagen_producto();?>" alt="Card image cap">
								<div class="card-body">
									<h5 class="card-title"><?php echo $producto->obtener_nombre_producto();?></h5>
									<p class="text-muted"><?php echo $producto->obtener_categoria_producto();?></p>
									<p class="card-text text-justify"><?php echo $producto->obtener_descripcion_producto(); ?></p>
								</div>
								<div class="card-footer">
									<a class="btn btn-outline-secondary" href="<?php echo RUTA_EDITAR_PRODUCTO . "/" . str_replace(" ", "-", $producto->obtener_nombre_producto())?>">Editar</a>  <a class="btn btn-outline-danger" href="<?php echo RUTA_ELIMINAR_PRODUCTO . "/" . str_replace(" ","-",$producto->obtener_nombre_producto());?>">Eliminar</a>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif ?>
			</div>
		</main>


		<?php include_once 'plantillas/documento_cierre_admin.inc.php'; ?>