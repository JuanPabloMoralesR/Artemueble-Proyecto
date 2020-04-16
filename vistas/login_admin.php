
<?php 
	
	if(isset($_POST['enviar'])){
		Conexion::abrir_conexion();
		$validador = new ValidadorLogin(Conexion::obtener_conexion(), $_POST['correo_admin'], $_POST['password_admin']);

		if($validador->obtener_error() == "" && !is_null($validador->obtener_usuario())){
			if($validador->obtener_usuario()->obtener_rol_usuario() == 'admin'){
				ControlSesion::iniciar_sesion($validador->obtener_usuario()->obtener_nombre_usuario(), $validador->obtener_usuario()->obtener_id_usuario());
				Redireccion::redirigir(RUTA_ADMIN);
			}
		}
		Conexion::cerrar_conexion();
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	/* Fonts */
	@import url(https://fonts.googleapis.com/css?family=Open+Sans:400);

	/* fontawesome */
	@import url(http://weloveiconfonts.com/api/?family=fontawesome);
	[class*="fontawesome-"]:before {
		font-family: 'FontAwesome', sans-serif;
	}

	/* Simple Reset */
	* { margin: 0; padding: 0; box-sizing: border-box; }

	/* body */
	body {
		background: rgba(0,0,0,0.5);
		color: #5e5e5e;
		font: 400 87.5%/1.5em 'Open Sans', sans-serif;
	}

	/* Form Layout */
	.form-wrapper {
		background: #fafafa;
		margin: 3em auto;
		margin-top: 70px;
		padding: 2em 1em;
		max-width: 370px;
		border-radius: 1em;
	}

	h1 {
		text-align: center;
		padding: 1em 0;
	}

	form {
		padding: 0 1.5em;
		padding-bottom: 20px;
	}

	.form-item {
		margin-bottom: 0.75em;
		width: 100%;
	}

	.form-item input {
		background: #fafafa;
		border: none;
		border-bottom: 2px solid #e9e9e9;
		color: #666;
		font-family: 'Open Sans', sans-serif;
		font-size: 1em;
		height: 50px;
		transition: border-color 0.3s;
		width: 100%;
	}

	.form-item input:focus {
		border-bottom: 2px solid #c0c0c0;
		outline: none;
	}

	.button-panel {
		margin: 2em 0 0;
		width: 100%;
	}

	.button-panel .button {
		background: rgba(0,0,0,0.7);
		border: none;
		color: #fff;
		cursor: pointer;
		height: 50px;
		font-family: 'Open Sans', sans-serif;
		font-size: 1.2em;
		letter-spacing: 0.05em;
		text-align: center;
		text-transform: uppercase;
		transition: background 0.3s ease-in-out;
		width: 100%;
	}

	.button:hover {
		background: rgba(0,0,0,0.4);
	}

	.form-footer {
		font-size: 1em;
		padding: 2em 0;
		text-align: center;
	}

	.form-footer a {
		color: #8c8c8c;
		text-decoration: none;
		transition: border-color 0.3s;
	}

	.form-footer a:hover {
		border-bottom: 1px dotted #8c8c8c;
	}
</style>>
</head>
<body>
	<div class="form-wrapper">
		<h1>Iniciar sesion</h1>
		<form method="POST" action="<?php echo RUTA_LOGIN_ADMIN?>">
			<div class="form-item">
				<label for="email"></label>
				<input type="email" name="correo_admin" required="required" placeholder="Correo Electrónico" autocomplete="off"></input>
			</div>
			<div class="form-item">
				<label for="password"></label>
				<input type="password" name="password_admin" required="required" placeholder="Contraseña"></input>
			</div>
			<div class="button-panel">
				<input type="submit" name="enviar" class="button" title="Entrar" value="Entrar al panel"></input>
			</div>
			<?php 
				if(isset($_POST['enviar'])){
					$validador->mostrar_error();
				}
			 ?>
		</form>
	</div>
</body>
</html>