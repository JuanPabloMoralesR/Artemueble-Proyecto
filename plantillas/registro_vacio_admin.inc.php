	 				<div class="form-row">
		 				<div class="form-group col-md-6">
		 					<label for="nombre_admin">Nombre: </label>
		 					<input type="text" name="nombre_admin" id="nombre_admin" class="form-control" placeholder="Ingresa el nombre" autocomplete="off">
		 				</div>
						<div class="form-group col-md-6">
	 					<label for="telefono_admin">Teléfono: </label>
	 					<input type="text" name="telefono_admin" id="telefono_admin" class="form-control" placeholder="Teléfono" autocomplete="off">
	 					</div>
	 				</div>
	 				<div class="form-group">
		 				<label for="correo_admin">Correo: </label>
		 				<input type="email" name="correo_admin" id="correo_admin" class="form-control" placeholder="Ingresa el correo" autocomplete="off">
		 			</div>
		 			<div class="form-row">
		 				<div class="form-group col-md-6">
	 						<label for="password_admin">Contraseña: </label>
	 						<input type="password" name="password_admin" id="password_admin" class="form-control" placeholder="Contraseña">
	 					</div>
	 					<div class="form-group col-md-6">
	 						<label for="password_admin_confirm">Verificar contraseña: </label>
	 						<input type="password" name="password_admin_confirm" id="password_admin_confirm" class="form-control" placeholder="Repite la Contraseña">
	 					</div>	
		 			</div>
	 				<div class="form-group">
	 					<label for="imagen_usuario">Seleccionar una foto de perfil</label>
	 					<input type="file" name="imagen_usuario" class="form-control" id="imagen_usuario">
	 				</div>
	 				<?php if (count($admins) < 4): ?>
	 					<button type="submit" class="btn btn-outline-dark" name="enviar">Ingresar datos</button>
	 				<?php else: ?>
	 					<a href="#" class="btn btn-outline-dark disabled" tabindex="-1" role="button" aria-disabled="true">Ingresar datos</a>
	 				<?php endif ?>
	 				