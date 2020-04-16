	 				<div class="form-row">
	 					<div class="form-group col-md-6">
	 						<label for="nombre_admin">Nombre: </label>
	 						<?php if($validador->obtener_error_nombre_admin() === ""): ?>
	 						<input type="text" name="nombre_admin" id="nombre_admin" class="form-control is-valid" placeholder="Ingresa el nombre" value="<?php echo $validador->obtener_nombre_admin()?>" autocomplete="off">
	 						<div class="valid-feedback">
	 							¡Nombre correcto!
	 						</div>
	 						<?php else: ?>
	 							<input type="text" name="nombre_admin" id="nombre_admin" class="form-control is-invalid" placeholder="Ingresa el nombre" value="<?php echo $validador->obtener_nombre_admin()?>" autocomplete="off">
	 							<div class="invalid-feedback">
	 								<?php echo $validador->obtener_error_nombre_admin(); ?>
	 							</div>
	 						<?php endif; ?>
	 					</div>
	 					<div class="form-group col-md-6">
	 						<label for="telefono_admin">Teléfono: </label>
	 						<?php if($validador->obtener_error_telefono_admin() === ""): ?>
	 							<input type="text" name="telefono_admin" id="telefono_admin" class="form-control is-valid" placeholder="Teléfono" value="<?php echo $validador->obtener_telefono_admin()?>" autocomplete="off">
							<div class="valid-feedback">
	 							¡Teléfono correcto!
	 						</div>
	 						<?php else: ?>
	 							<input type="text" name="telefono_admin" id="telefono_admin" class="form-control is-invalid" placeholder="Teléfono" value="<?php echo $validador->obtener_telefono_admin()?>" autocomplete="off">
	 							<div class="invalid-feedback">
	 								<?php echo $validador->obtener_error_telefono_admin(); ?>
	 							</div>
	 						<?php endif; ?>
	 					</div>
	 				</div>
	 				<div class="form-group">
	 					<label for="correo_admin">Correo: </label>
	 					<?php if($validador->obtener_error_correo_admin() === ""): ?>
	 						<input type="email" name="correo_admin" id="correo_admin" class="form-control is-valid" placeholder="Ingresa el correo" value="<?php echo $validador->obtener_correo_admin()?>" autocomplete="off">
	 						<div class="valid-feedback">
	 							Correo correcto
	 						</div>
	 					<?php else: ?>
	 						<input type="email" name="correo_admin" id="correo_admin" class="form-control is-invalid" placeholder="Ingresa el correo" value="<?php echo $validador->obtener_correo_admin()?>" autocomplete="off">
	 						<div class="invalid-feedback">
	 							<?php echo $validador->obtener_error_correo_admin(); ?>
	 						</div>
	 					<?php endif; ?>
	 				</div>
	 				<div class="form-row">
	 					<div class="form-group col-md-6">
	 						<label for="password_admin">Contraseña: </label>
	 						<?php if($validador->obtener_error_password_admin() === ""): ?>
	 							<input type="password" name="password_admin" id="password_admin" class="form-control is-invalid" placeholder="Contraseña">
	 						
	 						<?php else: ?>
	 							<input type="password" name="password_admin" id="password_admin" class="form-control is-invalid" placeholder="Contraseña">
	 							<div class="invalid-feedback">
	 								<?php echo $validador->obtener_error_password_admin(); ?>
	 							</div>
	 						<?php endif; ?>
	 					</div>
	 					<div class="form-group col-md-6">
	 						<label for="password_admin_confirm">Verificar contraseña: </label>
	 						<?php if($validador->obtener_error_password_admin_confirm() === ""): ?>
	 							<input type="password" name="password_admin_confirm" id="password_admin_confirm" class="form-control is-invalid" placeholder="Repite la Contraseña">
	 							
	 						<?php else: ?>
	 							<input type="password" name="password_admin_confirm" id="password_admin_confirm" class="form-control is-invalid" placeholder="Repite la Contraseña">
	 							<div class="invalid-feedback">
	 								<?php echo $validador->obtener_error_password_admin_confirm(); ?>
	 							</div>
	 						<?php endif; ?>		
	 					</div>
	 				</div>
	 				<div class="form-group">
	 					<label for="imagen_usuario">Seleccionar una foto de perfil</label>
	 					<?php if($validador->obtener_error_imagen_admin() === ""): ?>
	 						<input type="file" name="imagen_usuario" class="form-control is-valid" id="imagen_usuario" value="<?php echo $validador->obtener_imagen_admin();?>">	
	 					<?php else: ?>
	 						<input type="file" name="imagen_usuario" class="form-control is-invalid" id="imagen_usuario" value="<?php echo $validador->obtener_imagen_admin();?>">
	 						<div class="invalid-feedback">
	 							<?php echo $validador->obtener_error_imagen_admin(); ?>
	 						</div>
	 					<?php endif; ?>
	 				</div>
	 				<?php if (count($admins) < 4): ?>
	 					<button type="submit" class="btn btn-outline-dark" name="enviar">Ingresar datos</button>
	 				<?php else: ?>
	 					<a href="#" class="btn btn-outline-dark disabled" tabindex="-1" role="button" aria-disabled="true">Ingresar datos</a>
	 				<?php endif ?>