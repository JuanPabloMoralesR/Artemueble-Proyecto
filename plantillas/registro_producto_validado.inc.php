						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="nombre_producto">Nombre</label>
								<?php if($validador->obtener_error_nombre_producto() == ""): ?>
									<input type="text" class="form-control is-valid" name="nombre_producto" id="nombre_producto" autocomplete="off" value="<?php echo $validador->obtener_nombre_producto();?>">
								<?php else: ?>
									<input type="text" class="form-control is-invalid" name = "nombre_producto"id="nombre_producto" autocomplete="off" value="<?php echo $validador->obtener_nombre_producto();?>">
									<div class="invalid-feedback">
										<?php echo $validador->obtener_error_nombre_producto(); ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form-group col-md-6">
								<label for="categoria_producto">Categoria</label>
								<?php if($validador->obtener_error_categoria_producto() === ""): ?>
									<select class="form-control is-valid" name="categoria_producto" id="categoria_producto">
										<option value="escoger">Elegir categoria</option>
										<option value="comedores" <?php echo $selected = ($validador->obtener_categoria_producto() == 'comedores') ? 'selected' : ''; ?>>Comedores</option>
										<option value="mesas" <?php echo $selected = ($validador->obtener_categoria_producto() == 'mesas') ? 'selected' : ''; ?>>Mesas</option>
										<option value="sillas" <?php echo $selected = ($validador->obtener_categoria_producto() == 'sillas') ? 'selected' : ''; ?>>Sillas</option>
										<option value="espejos" <?php echo $selected = ($validador->obtener_categoria_producto() == 'espejos') ? 'selected' : ''; ?>>Espejos</option>
										<option value="consolas" <?php echo $selected = ($validador->obtener_categoria_producto() == '') ? 'selected' : ''; ?>>Consolas</option>
										<option value="camas" <?php echo $selected = ($validador->obtener_categoria_producto() == 'camas') ? 'selected' : ''; ?>>Camas</option>
										<option value="sofas" <?php echo $selected = ($validador->obtener_categoria_producto() == 'sofas') ? 'selected' : ''; ?>>Sofas</option>
										<option value="salas" <?php echo $selected = ($validador->obtener_categoria_producto() == 'salas') ? 'selected' : ''; ?>>Salas</option>
										<option value="habitaciones" <?php echo $selected = ($validador->obtener_categoria_producto() == 'habitaciones') ? 'selected' : ''; ?>>Habitaciones</option>
										<option value="otro" <?php echo $selected = ($validador->obtener_categoria_producto() == 'otro') ? 'selected' : ''; ?>>Otro</option>
									</select>
								<?php else: ?>
									<select class="form-control is-invalid" name="categoria_producto" id="categoria_producto">
										<option value="escoger">Elegir categoria</option>
										<option value="comedores">Comedores</option>
										<option value="mesas">Mesas</option>
										<option value="sillas">Sillas</option>
										<option value="espejos">Espejos</option>
										<option value="consolas">Consolas</option>
										<option value="camas">Camas</option>
										<option value="sofas">Sofas</option>
										<option value="salas">Salas</option>
										<option value="habitaciones">Habitaciones</option>
										<option value="otro">Otro</option>
									</select>
									<div class="invalid-feedback">
										<?php echo $validador->obtener_error_categoria_producto(); ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="descripcion_producto">Descripcion</label>
								<?php if($validador->obtener_error_descripcion_producto() === ""): ?>
									<textarea class="form-control is-valid" name="descripcion_producto"id="descripcion_producto"><?php echo $validador->obtener_descripcion_producto();?></textarea>
								<?php else: ?>
									<textarea class="form-control is-invalid" name="descripcion_producto"id="descripcion_producto"><?php echo $validador->obtener_descripcion_producto();?></textarea>
									<div class="invalid-feedback">
										<?php echo $validador->obtener_error_descripcion_producto() ?>
									</div>
								<?php endif; ?>
							</div>
						</div>	
						<div class="form-row">
							<label for="img_producto">Seleccionar una foto</label>
							<?php if($validador->obtener_error_img_producto() === ""): ?>
    							<input type="file" class="form-control-file is-valid" name="img_producto" id="img_producto"  value="<?php echo $validador->obtener_img_producto()?>">
    						<?php else: ?>
    							<input type="file" class="form-control-file is-invalid" name="img_producto" id="img_producto">
    							<div class="invalid-feedback">
    								<?php echo $validador->obtener_error_img_producto(); ?>
    							</div>
    						<?php endif; ?>
						</div><br>
						<div class="d-flex justify-content-center">
							<button type="submit" class="btn btn-outline-dark btn-block" name="enviar">Ingresar produto</button>
						</div>