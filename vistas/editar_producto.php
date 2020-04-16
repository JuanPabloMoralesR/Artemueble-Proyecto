<?php 



if($_SERVER['REQUEST_METHOD'] == 'POST'){
	Conexion::abrir_conexion();
	$imagen_actual = $_POST['imagen_actual'];
	$img_producto = $_FILES['img_producto'];

	if(empty($img_producto['name'])){
		$img_producto = $imagen_actual;
	}else{
		$ruta_archivo = './img_productos/';
		$archivo_subido = $ruta_archivo . $img_producto['name'];
		move_uploaded_file($img_producto['tmp_name'], $archivo_subido);
		$img_producto = $_FILES['img_producto']['name'];
		echo $img_producto;
	}


	$producto_actualizado = new Producto($producto->obtener_id_producto(), $_POST['nombre_producto'], $_POST['descripcion_producto'], $_POST['categoria_producto'], '', '', $img_producto);				
	RepositorioProducto::actualizar_producto(Conexion::obtener_conexion(), $producto_actualizado);
	 Redireccion::redirigir(RUTA_GALERIA_ADMIN);		
	Conexion::cerrar_conexion();
}


include_once 'plantillas/documento_declaracion_admin.inc.php'; 
include_once 'plantillas/barra_navegacion_admin.inc.php';

?>


<main class="col editar-producto">
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">Editar Producto</h1>
			<p class="lead">Edita el contenido del producto, estos cambios se mostraran en la galería</p>
		</div>
	</div>
	<div class="card bg-light">
		<div class="card-header">
			<h4>Editar contenido del producto</h4>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-4">
					<img src="<?php echo RUTA_IMG_PRODUCTOS . "/" . $producto->obtener_imagen_producto();?>" class="img-fluid">
				</div>
				<div class="col-md-8">
					<form method="POST" action="<?php echo RUTA_EDITAR_PRODUCTO . '/' .str_replace(" ", "-", $producto->obtener_nombre_producto())?>" enctype="multipart/form-data">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="nombre_producto">Nombre</label>
								<input type="text" class="form-control" name="nombre_producto" id="nombre_producto" autocomplete="off" value="<?php echo $producto->obtener_nombre_producto();?>" required>
							</div>
							<div class="form-group col-md-6">
								<label for="categoria_producto">Categoria</label>
								<select class="form-control" name="categoria_producto" id="categoria_producto">
										<option value="comedores" <?php echo $selected = ($producto->obtener_categoria_producto() == 'comedores') ? 'selected' : ''; ?>>Comedores</option>
										<option value="mesas" <?php echo $selected = ($producto->obtener_categoria_producto() == 'mesas') ? 'selected' : ''; ?>>Mesas</option>
										<option value="sillas" <?php echo $selected = ($producto->obtener_categoria_producto() == 'sillas') ? 'selected' : ''; ?>>Sillas</option>
										<option value="espejos" <?php echo $selected = ($producto->obtener_categoria_producto() == 'espejos') ? 'selected' : ''; ?>>Espejos</option>
										<option value="consolas" <?php echo $selected = ($producto->obtener_categoria_producto() == '') ? 'selected' : ''; ?>>Consolas</option>
										<option value="camas" <?php echo $selected = ($producto->obtener_categoria_producto() == 'camas') ? 'selected' : ''; ?>>Camas</option>
										<option value="sofas" <?php echo $selected = ($producto->obtener_categoria_producto() == 'sofas') ? 'selected' : ''; ?>>Sofas</option>
										<option value="salas" <?php echo $selected = ($producto->obtener_categoria_producto() == 'salas') ? 'selected' : ''; ?>>Salas</option>
										<option value="habitaciones" <?php echo $selected = ($producto->obtener_categoria_producto() == 'habitaciones') ? 'selected' : ''; ?>>Habitaciones</option>
										<option value="otro" <?php echo $selected = ($producto->obtener_categoria_producto() == 'otro') ? 'selected' : ''; ?>>Otro</option>
								</select>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="descripcion_producto">Descripcion</label>
								<textarea class="form-control"  name="descripcion_producto" id="descripcion_producto" required><?php echo $producto->obtener_descripcion_producto();?></textarea>
							</div>
						</div>	
						<div class="form-row">
							<label for="img_producto">Seleccionar una foto</label>
							<input type="file" class="form-control-file" name="img_producto" id="img_producto">
							<input type="hidden" name="imagen_actual" value="<?php echo $producto->obtener_imagen_producto();?>">
						</div><br>
						<div class="d-flex justify-content-center">
							<button type="submit" class="btn btn-outline-dark btn-block" name="enviar">Editar produto</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>	

<?php include_once 'plantillas/documento_cierre_admin.inc.php'; ?>