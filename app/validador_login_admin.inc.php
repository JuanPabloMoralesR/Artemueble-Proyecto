<?php 

	
	class ValidadorLogin{

		private $usuario;
		private $error;

		public function __construct($conexion, $correo, $password){
			$this->error = "";

			if(!$this->variable_iniciada($correo) || !$this->variable_iniciada($password)){
				$this->error = "Debes llenar todos los campos";
			}else{
				$this->usuario = RepositorioUsuario::obtener_usuario_por_correo($conexion, $correo);

				if(is_null($this->usuario) || !password_verify($password, $this->usuario->obtener_password_usuario())){
					$this->error = "Datos incorrectos";
				}
			}
		}


		private function variable_iniciada($var){
			if(!empty($var) && isset($var)){
				return true;
			}else{
				return false;
			}
		}

		public function obtener_usuario(){
			return $this->usuario;
		}

		public function obtener_error(){
			return $this->error;
		}

		public function mostrar_error(){
			if($this->error !== ""){
				echo '<div class="alert alert-danger" rol="alert">';
				echo $this->obtener_error();
				echo '</div>';
			}
		}


	}

 ?>