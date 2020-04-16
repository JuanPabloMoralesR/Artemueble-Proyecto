<?php 

$titulo = "Inicio";
include_once 'plantillas/documento_declaracion.inc.php';
include_once 'plantillas/barra_navegacion.inc.php';
 Conexion::abrir_conexion();
 $productos_destacados = RepositorioProducto::obtener_por_lugar(Conexion::obtener_conexion(), 'en-destacados');
 Conexion::cerrar_conexion();
 ?>


 <section class="contenedor-slider">
	<div class="container-fluid">
		<div class="row slider">
			<!-- Slider -->
			<div class="col">
				<div class="carousel slide" id="slider" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider" data-slide-to="0" class="active"></li>
							<li data-target="#slider" data-slide-to="1"></li>
							<li data-target="#slider" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img src="<?php echo RUTA_IMG?>slidem1.jpg" alt="Slide#1" class="d-block img-fluid img-cont">
							</div>
							<div class="carousel-item">
								<img src="<?php echo RUTA_IMG?>slidem2.jpg" alt="Slide#2" class="d-block img-fluid img-cont">
							</div>
							<div class="carousel-item">
								<img src="<?php echo RUTA_IMG?>slidem3.jpg" alt="Slide#3" class="d-block img-fluid img-cont">
							</div>
						</div>
						<a href="#slider" class="carousel-control-prev" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Anterior</span>
						</a>
						<a href="#slider" class="carousel-control-next" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Siguiente</span>
						</a>
					</div>
			</div>
		</div>
	</div> 	
 </section>

<main class="galeria_destacados_principal">
	<div class="container">
		<!-- Galeria productos destacados -->
		<div class="row portafolio">
			<section class="gallery-block compact-gallery">
			<div class="container">
				<div class="heading">
					<h2>Trabajos destacados del mes</h2>
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
		</div>

		<!-- Redes sociales -->
		<div class="row redes-sociales">
			<div class="col">
				<div class="redes-container d-flex justify-content-center">
					<i class="fab fa-instagram instagram"></i>	
					<i class="fab fa-facebook facebook"></i>
					<i class="fab fa-whatsapp whatsapp" data-container="body" data-placement="top" data-toggle="popover" title="Contacto whatsapp" data-content="Si tienes alguna duda contacta con nosotros al numero: +57 315 6765456. -click de nuevo en el ícono para cerrar ventana-"></i>
				</div>
			</div>
		</div>
	</div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
<script>
        baguetteBox.run('.compact-gallery', { animation: 'slideIn'});
    </script>

 <?php
 include_once 'plantillas/footer.inc.php'; 
 include_once 'plantillas/documento_cierre.inc.php'; 
 ?>

