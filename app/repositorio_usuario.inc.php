<?php 
	
	class RepositorioUsuario{


		public static function insertar_usuario($conexion, $usuario){
			$usuario_insertado = false;

			if(isset($conexion)){
				$sql = "INSERT INTO usuario(nombre_usuario, telefono_usuario, email_usuario, password_usuario, fecha_registro_usuario, rol_usuario, imagen_usuario) VALUES(:nombre, :telefono, :email, :password, NOW(), :rol, :imagen_usuario)";

				$sentencia = $conexion->prepare($sql);
				$sentencia->bindParam(":nombre",$usuario->obtener_nombre_usuario(),PDO::PARAM_STR);
				$sentencia->bindParam(":telefono",$usuario->obtener_telefono_usuario(),PDO::PARAM_STR);
				$sentencia->bindParam(":email",$usuario->obtener_email_usuario(),PDO::PARAM_STR);
				$sentencia->bindParam(":password",$usuario->obtener_password_usuario(),PDO::PARAM_STR);
				$sentencia->bindParam(":rol",$usuario->obtener_rol_usuario(),PDO::PARAM_STR);
				$sentencia->bindParam(":imagen_usuario", $usuario->obtener_imagen_usuario(), PDO::PARAM_STR);
				$usuario_insertado = $sentencia->execute();
			}

			return $usuario_insertado;
		}

		public static function correo_existe($conexion, $correo){

			$correo_existe = true;
			if(isset($conexion)){
				try {
					
					$sql = "SELECT * FROM usuario WHERE email_usuario = :correo";
					$sentencia = $conexion->prepare($sql);
					$sentencia -> bindParam(':correo', $correo, PDO::PARAM_STR);
					$sentencia -> execute();
					$resultado = $sentencia->fetchAll();

					if(count($resultado)){
						return true;
					}else{
						return false;
					}

				} catch (Exception $e) {
					print $e->getMessage();
				}
			}

			return $correo_existe;
		}

		public static function obtener_usuario_por_id($conexion, $id_usuario){
			$usuario = null;

			if(isset($conexion)){
				try {
					
					$sql = "SELECT * FROM usuario WHERE id_usuario = :id_usuario";
					$sentencia = $conexion->prepare($sql);
					$sentencia->bindParam(':id_usuario', $id_usuario, PDO::PARAM_STR);
					$sentencia->execute();
					$resultado = $sentencia->fetch();

					if(!empty($resultado)){
						$usuario = new Usuario($resultado['id_usuario'], $resultado['nombre_usuario'], $resultado['telefono_usuario'], $resultado['email_usuario'], $resultado['password_usuario'], $resultado['fecha_registro_usuario'], $resultado['rol_usuario'], $resultado['imagen_usuario']);
					}

				} catch (Exception $e) {
					print "ERROR: ".$e->getMessage();
				}
			}
			return $usuario;
		}

		public static function obtener_usuario_por_correo($conexion, $correo){
			$usuario = null;

			if(isset($conexion)){
				try {
					
					$sql = "SELECT * FROM usuario WHERE email_usuario = :correo";
					$sentencia = $conexion->prepare($sql);
					$sentencia->bindParam(':correo', $correo, PDO::PARAM_STR);
					$sentencia->execute();

					$resultado = $sentencia->fetch();

					if(!empty($resultado)){
						$usuario = new Usuario($resultado['id_usuario'], $resultado['nombre_usuario'], $resultado['telefono_usuario'], $resultado['email_usuario'], $resultado['password_usuario'], $resultado['fecha_registro_usuario'], $resultado['rol_usuario'], $resultado['imagen_usuario']);
					}

				} catch (Exception $e) {
					print "ERROR: ". $e->getMessage();
				}
			}

			return $usuario;
		}

		public static function obtener_usuario_segun_rol($conexion, $rol){
			$usuarios = [];

			if(isset($conexion)){
				try {
					
					$sql = "SELECT * FROM usuario WHERE rol_usuario = :rol";
					$sentencia = $conexion->prepare($sql);
					$sentencia->bindParam(':rol', $rol, PDO::PARAM_STR);
					$sentencia->execute();

					$resultado = $sentencia->fetchAll();

					if($resultado){
						foreach ($resultado as $fila) {
							$usuarios[] = new Usuario($fila['id_usuario'], $fila['nombre_usuario'], $fila['telefono_usuario'], $fila['email_usuario'], $fila['password_usuario'],$fila['fecha_registro_usuario'], $fila['rol_usuario'], $fila['imagen_usuario']);
						}
					}

				} catch (Exception $e) {
					print "ERROR: " . $e->getMessage();
				}
			}

			return $usuarios;
		}

		public static function actualizar_datos($conexion, $usuario){
			$datos_actualizados = false;

			if(isset($conexion)){
				try {
					
					$sql = "UPDATE usuario SET nombre_usuario = :nombre, telefono_usuario = :telefono, email_usuario = :email, imagen_usuario = :imagen WHERE id_usuario = :id";
					$sentencia = $conexion->prepare($sql);
					$sentencia->bindParam(':nombre', $usuario->obtener_nombre_usuario(), PDO::PARAM_STR);
					$sentencia->bindParam(':telefono', $usuario->obtener_telefono_usuario(), PDO::PARAM_STR);
					$sentencia->bindParam(':email', $usuario->obtener_email_usuario(), PDO::PARAM_STR);
					$sentencia->bindParam(':imagen', $usuario->obtener_imagen_usuario(), PDO::PARAM_STR);
					$sentencia->bindParam(':id', $usuario->obtener_id_usuario(), PDO::PARAM_STR);
					$datos_actualizados = $sentencia->execute();
				} catch (Exception $e) {
					print "ERROR: " . $e->getMessage();
				}
			}

			return $datos_actualizados;
		}

	}

 ?>