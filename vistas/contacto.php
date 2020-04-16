<?php 


$titulo = "Contacto";
include_once 'plantillas/documento_declaracion.inc.php';
include_once 'plantillas/barra_navegacion.inc.php';
?>

<div class="jumbotron text-center">
	<h1 class="display-4">¿Alguna duda o sugerencia? ¡Contáctanos!</h1>
	<p class="lead">Es gratis... por ahora.</p>
</div>
<div class="container">
	<div class="row text-center redes-contacto">
		<div class="col-lg-12">
			<a href="#"><i class="fab fa-facebook facebook"></i></a>
			<a href="#"><i class="fab fa-instagram instagram"></i></a>
			<a href="#"><i class="fab fa-whatsapp whatsapp"></i></a>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-12">
			<div class="card bg-light">
				<div class="card-header d-flex justify-content-end">
					Ubicación y otros contactos
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-4">
						<h4 class="card-title">Ubicación de nuestra empresa</h4>
						<div class="embed-responsive embed-responsive-16by9">
							<iframe marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=es&amp;geocode=&amp;q=calle+36+61-40+itagui&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=46.14027,107.138672&amp;ie=UTF8&amp;hq=&amp;hnear=Calle+36+%23+61-40,+Antioquia,+Colombia&amp;t=m&amp;z=14&amp;ll=6.171668,-75.628154&amp;output=embed" frameborder="0" height="300" scrolling="no"></iframe>
						</div>
					</div>
					<div class="col-md-8">
						<h4 class="card-title text-center">Puedes ubicarnos en los siguientes datos:</h4>

						<p>Calle 36 61-40 Ditaires- itagui - Antioquia</p> 
						<p>tel 371 01 93</p>
						<p>E-mail: </p>
						<p>info@artemueblesas.com </p>
						<p>artemueblesas@hotmail.com</p>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr>
</div>
<?php 
 include_once 'plantillas/footer.inc.php'; 
include_once 'plantillas/documento_cierre.inc.php'; ?>