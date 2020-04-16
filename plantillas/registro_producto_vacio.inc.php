						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="nombre_producto">Nombre</label>
								<input type="text" class="form-control" name="nombre_producto" id="nombre_producto" autocomplete="off">
							</div>
							<div class="form-group col-md-6">
								<label for="categoria_producto">Categoria</label>
								<select class="form-control" name="categoria_producto" id="categoria_producto">
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
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="descripcion_producto">Descripcion</label>
								<textarea class="form-control"  name="descripcion_producto" id="descripcion_producto"></textarea>
							</div>
						</div>	
						<div class="form-row">
							<label for="img_producto">Seleccionar una foto</label>
    						<input type="file" class="form-control-file" name="img_producto" id="img_producto">
						</div><br>
						<div class="d-flex justify-content-center">
							<button type="submit" class="btn btn-outline-dark btn-block" name="enviar">Ingresar produto</button>
						</div>