<?php 

class RepositorioProducto{

	public static function ingresar_producto($conexion, $producto){

		$producto_insertado = false;

		if(isset($conexion)){
			try {
				
				$sql = "INSERT INTO producto (id_producto, nombre_producto, descripcion_producto, categoria_producto, fecha_registro_producto, lugar_producto, imagen_producto) VALUES ('', :nombre, :descripcion, :categoria, NOW(), :lugar, :imagen)";
				$sentencia = $conexion->prepare($sql);
				$sentencia->bindParam(':nombre',$producto->obtener_nombre_producto(), PDO::PARAM_STR);
				$sentencia->bindParam(':descripcion',$producto->obtener_descripcion_producto(), PDO::PARAM_STR);
				$sentencia->bindParam(':categoria',$producto->obtener_categoria_producto(), PDO::PARAM_STR);
				$sentencia->bindParam(':lugar',$producto->obtener_lugar_producto(), PDO::PARAM_STR);
				$sentencia->bindParam(':imagen',$producto->obtener_imagen_producto(), PDO::PARAM_STR);
				$producto_insertado = $sentencia->execute();
			} catch (Exception $e) {
				print "ERROR: " . $e->getMessage();
			}
		}

		return $producto_insertado;
	}


	public static function nombre_existe($conexion, $nombre){
		$nombre_existe = false;

		if(isset($conexion)){
			try {
				
				$sql = "SELECT * FROM producto WHERE nombre_producto = :nombre";
				$sentencia = $conexion->prepare($sql);
				$sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
				$sentencia->execute();
				$resultado = $sentencia->fetch();

				if($resultado){
					return true;
				}else{
					return false;
				}

			} catch (Exception $e) {
				print "Error: " . $e->getMessage();
			}
		}

		return $nombre_existe;
	}

	public static function obtener_todos($conexion){
		$productos = [];

		if(isset($conexion)){
			try {
				
				$sql = "SELECT * FROM producto";
				$sentencia = $conexion->prepare($sql);
				$sentencia->execute();

				$resultado = $sentencia->fetchAll();

				if($resultado){
					foreach ($resultado as $fila) {
						$productos[] = new Producto($fila['id_producto'], $fila['nombre_producto'], $fila['descripcion_producto'], $fila['categoria_producto'], $fila['fecha_registro_producto'], $fila['lugar_producto'], $fila['imagen_producto']);
					}
				}

			} catch (Exception $e) {
				print "ERROR: " . $e->getMessage();
			}
		}

		return $productos;
	}

	public static function obtener_producto_por_nombre($conexion, $nombre_producto){
		$producto = null;

		if(isset($conexion)){
			try {
				$sql = "SELECT * FROM producto WHERE nombre_producto = :nombre_producto";
				$sentencia = $conexion->prepare($sql);
				$sentencia->bindParam(':nombre_producto', str_replace("-", " ", $nombre_producto), PDO::PARAM_STR);
				$sentencia->execute();

				$resultado = $sentencia->fetch();

				if(!empty($resultado)){
					$producto = new Producto($resultado['id_producto'], $resultado['nombre_producto'], $resultado['descripcion_producto'], $resultado['categoria_producto'], $resultado['fecha_registro_producto'], $resultado['lugar_producto'], $resultado['imagen_producto']);
				}
			} catch (Exception $e) {
				print "ERROR: " . $e->getMessage();
			}
		}

		return $producto;
	}

	public static function eliminar_producto($conexion, $id_producto){
		$producto_eliminado = false;

		if(isset($conexion)){
			try {
				$sql = "DELETE FROM producto WHERE id_producto = :id_producto";
				$sentencia = $conexion->prepare($sql);
				$sentencia->bindParam(':id_producto', $id_producto, PDO::PARAM_STR);
				$producto_eliminado = $sentencia->execute();
			} catch (Exception $e) {
				print "ERROR: " . $e->getMessage();
			}
		}

		return $producto_eliminado;
	}

	public static function actualizar_producto($conexion, $producto){
		$producto_editado = false;

		if(isset($conexion)){
			try {
				$sql = "UPDATE producto SET nombre_producto = :nombre_producto, descripcion_producto = :descripcion_producto, categoria_producto = :categoria_producto, imagen_producto = :imagen_producto WHERE id_producto = :id_producto";
				$sentencia = $conexion->prepare($sql);
				$sentencia->bindParam(':nombre_producto', $producto->obtener_nombre_producto(), PDO::PARAM_STR);
				$sentencia->bindParam(':descripcion_producto', $producto->obtener_descripcion_producto(), PDO::PARAM_STR);
				$sentencia->bindParam(':categoria_producto', $producto->obtener_categoria_producto(), PDO::PARAM_STR);
				$sentencia->bindParam(':imagen_producto', $producto->obtener_imagen_producto(), PDO::PARAM_STR);
				$sentencia->bindParam(':id_producto', $producto->obtener_id_producto(), PDO::PARAM_STR);
				$producto_editado = $sentencia->execute();

			} catch (Exception $e) {
				print "ERROR: " . $e->getMessage();
			}
		}else{
			print "NO HAY CONEXION";
		}

		return $producto_editado;
	}

	public static function obtener_por_lugar($conexion, $lugar){
		$productos = [];

		if(isset($conexion)){
			try {
				
				$sql="SELECT * FROM producto WHERE lugar_producto = :lugar";
				$sentencia = $conexion->prepare($sql);
				$sentencia->bindParam(':lugar', $lugar, PDO::PARAM_STR);
				$sentencia->execute();
				$resultado = $sentencia->fetchAll();

				if($resultado){
					foreach ($resultado as $fila) {
						$productos[] = new Producto($fila['id_producto'], $fila['nombre_producto'], $fila['descripcion_producto'], $fila['categoria_producto'], $fila['fecha_registro_producto'], $fila['lugar_producto'], $fila['imagen_producto']);
					}
					
				}

			} catch (Exception $e) {
				print "ERROR: " . $e->getMessage();
			}
		}

		return $productos;
	}

	public static function obtener_por_categoria($conexion, $categoria){

		$productos = [];

		if(isset($conexion)){
			try {
				
				$sql = "SELECT * FROM producto WHERE categoria_producto = :categoria";
				$sentencia = $conexion->prepare($sql);
				$sentencia->bindParam(':categoria', $categoria, PDO::PARAM_STR);
				$sentencia->execute();
				$resultado = $sentencia->fetchAll();

				if($resultado){
					foreach ($resultado as $fila) {
						$productos[]  = new Producto($fila['id_producto'], $fila['nombre_producto'], $fila['descripcion_producto'], $fila['categoria_producto'], $fila['fecha_registro_producto'], $fila['lugar_producto'], $fila['imagen_producto']);
					}
				}

			} catch (Exception $e) {
				print "ERROR: " . $e->getMessage();
			}
		}

		return $productos;

	}
	


}


?>