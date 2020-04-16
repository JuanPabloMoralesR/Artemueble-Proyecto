<?php 

$titulo = "Galeria";
include_once 'app/config.inc.php';
include_once 'plantillas/documento_declaracion.inc.php';
include_once 'plantillas/barra_navegacion.inc.php';

?>


<div class="jumbotron">
  <h1 class="display-4">¡Bienvenido a la galeria de artemueble!</h1>
  <p class="lead">Aquí podrás ver todos los productos que hemos entregado a nuestros clientes, podrás verlos por categrorás en el panel a la izquierda.</p>
  <hr class="my-4">
  <p>Si te gusta alguno o te sirve de referencia ponte en contacto con nosotros. En la pestaña de contacto encontrarás enlaces y teléfonos.</p>
</div>

<!-- Galeria principal -->
<div class="container-fluid"> 
	<div class="row"> 
		<div class="galeria-principal col-md-9 order-2">
			<section class="gallery-block cards-gallery">
				<div class="container">
					<div class="row">
						<?php if (empty($productos)): ?>
							<div class="alert alert-danger col-12" rol="alert">
								No hay productos
 							</div>
						<?php else: ?>
							<?php foreach ($productos as $producto): ?>
								<div class="col-md-6 col-lg-6 card-group ">
									<div class="card border-0 transform-on-hover">
										<a class="lightbox" href="<?php echo RUTA_IMG_PRODUCTOS . "/" . $producto->obtener_imagen_producto();?>">
											<img src="<?php echo RUTA_IMG_PRODUCTOS . "/" . $producto->obtener_imagen_producto();?>" alt="Card Image" class="card-img-top img-galeria">
										</a>
										<div class="card-body">
											<h6><a href="#"><?php echo $producto->obtener_nombre_producto();?></a></h6>
											<p class="text-muted card-text"><?php echo $producto->obtener_descripcion_producto(); ?></p>
										</div>
										<div class="card-footer">
											<p class="text-muted"><?php echo $producto->obtener_categoria_producto();?></p>
										</div>
									</div>
								</div>	
							<?php endforeach ?>
						<?php endif ?>
					</div>
				</div>
			</section> 		
		</div>
		<div class="col-md-3 order-1"> 
			<div class="list-group sticky-top mb-3">
				<a href="#" class="list-group-item list-group-item-action flex-column align-items-start active bg-dark 	">
					<div class="d-flex w-100 justify-content-between">
						<h5 class="mb-1">Categorias</h5>
					</div>
					<p class="mb-1">Filtra los productos que quieres ver por las siguientes categorias.</p>
				</a>
				<a href="<?php echo RUTA_GALERIA?>" class="list-group-item list-group-item-action flex-column align-items-start">
					<div class="d-flex w-100 justify-content-between">
						<h5 class="mb-1">Ver todos</h5>
					</div>
				</a>
				<a href="<?php echo RUTA_GALERIA . "/"?>comedores" class="list-group-item list-group-item-action flex-column align-items-start  <?php echo $active = (($partes_ruta[2] == 'comedores') ? 'active' : '');?>">
					<div class="d-flex w-100 justify-content-between ">
						<h5 class="mb-1">Comedores</h5>
					</div>
				</a>
				<a href="<?php echo RUTA_GALERIA . "/"?>mesas" class="list-group-item list-group-item-action flex-column align-items-start <?php echo $active = (($partes_ruta[2] == 'mesas') ? 'active' : '');?>">
					<div class="d-flex w-100 justify-content-between">
						<h5 class="mb-1">Mesas</h5>
					</div>
				</a>
				<a href="<?php echo RUTA_GALERIA . "/"?>sillas" class="list-group-item list-group-item-action flex-column align-items-start  <?php echo $active = (($partes_ruta[2] == 'sillas') ? 'active' : '');?>">
					<div class="d-flex w-100 justify-content-between">
						<h5 class="mb-1">Sillas</h5>
					</div>
				</a>
				<a href="<?php echo RUTA_GALERIA . "/"?>consolas" class="list-group-item list-group-item-action flex-column align-items-start  <?php echo $active = (($partes_ruta[2] == 'consolas') ? 'active' : '');?>">
					<div class="d-flex w-100 justify-content-between">
						<h5 class="mb-1">Consolas</h5>
					</div>
				</a>
				<a href="<?php echo RUTA_GALERIA . "/"?>camas" class="list-group-item list-group-item-action flex-column align-items-start  <?php echo $active = (($partes_ruta[2] == 'camas') ? 'active' : '');?>">
					<div class="d-flex w-100 justify-content-between">
						<h5 class="mb-1">Camas</h5>
					</div>
				</a>
				<a href="<?php echo RUTA_GALERIA . "/"?>sofas" class="list-group-item list-group-item-action flex-column align-items-start  <?php echo $active = (($partes_ruta[2] == 'sofas') ? 'active' : '');?>">
					<div class="d-flex w-100 justify-content-between">
						<h5 class="mb-1">Sofas</h5> 
					</div>

				</a>
				<a href="<?php echo RUTA_GALERIA . "/"?>salas" class="list-group-item list-group-item-action flex-column align-items-start  <?php echo $active = (($partes_ruta[2] == 'salas') ? 'active' : '');?>">
					<div class="d-flex w-100 justify-content-between">
						<h5 class="mb-1">Salas</h5>
					</div>
				</a>
				<a href="<?php echo RUTA_GALERIA . "/"?>habitaciones" class="list-group-item list-group-item-action flex-column align-items-start  <?php echo $active = (($partes_ruta[2] == 'habitaciones') ? 'active' : '');?>">
					<div class="d-flex w-100 justify-content-between">
						<h5 class="mb-1">Habitaciones</h5>
					</div>
				</a>
				<a href="<?php echo RUTA_GALERIA . "/"?>otro" class="list-group-item list-group-item-action flex-column align-items-start <?php echo $active = (($partes_ruta[2] == 'otro') ? 'active' : '');?>">
					<div class="d-flex w-100 justify-content-between">
						<h5 class="mb-1">Otro</h5>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>	


<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
<script>
	baguetteBox.run('.cards-gallery', { animation: 'slideIn'});
</script>
<?php
include_once 'plantillas/footer.inc.php'; 
include_once 'plantillas/documento_cierre.inc.php'; 
?>