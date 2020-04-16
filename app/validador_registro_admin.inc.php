<?php 

	class ValidadorRegistroAdmin{


		private $nombre_admin;
		private $correo_admin;
		private $telefono_admin;
		private $password_admin;
		private $password_admin_confirm;
		private $imagen_admin;

		private $error_nombre_admin;
		private $error_correo_admin;
		private $error_telefono_admin;
		private $error_password_admin;
		private $error_password_admin_confirm;
		private $error_imagen_admin;

		public function __construct($conexion, $nombre_admin, $correo_admin, $telefono_admin, $password_admin,$password_admin_confirm, $imagen_admin){

			$this->nombre_admin = "";
			$this->correo_admin = "";
			$this->telefono_admin = "";
			$this->password_admin_con = "";
			$this->imagen_admin = "";

			$this->error_nombre_admin = $this->validar_nombre_admin($nombre_admin);
			$this->error_correo_admin = $this->validar_correo_admin($conexion, $correo_admin);
			$this->error_telefono_admin = $this->validar_telefono_admin($telefono_admin);
			$this->error_password_admin = $this->validar_password_admin($password_admin);
			$this->error_password_admin_confirm = $this->validar_password_admin_confirm($password_admin, $password_admin_confirm);
			$this->error_imagen_admin = $this->validar_imagen_admin($imagen_admin);

			if($this->error_password_admin === "" && $this->error_password_admin_confirm === ""){
				$this->password_admin_con = $password_admin;
			}
		}


		private function variable_iniciada($variable){

			if(isset($variable) && !empty($variable)){
				return true;
			}else{
				return false;
			}

		}

		private function validar_nombre_admin($nombre_admin){
			if($this->variable_iniciada($nombre_admin)){
				$this->nombre_admin = $nombre_admin;
			}else{
				return "Ingrese un nombre de usuario";
			}

			if(strlen($nombre_admin) < 4){
				return "El nombre es demasiado corto.";
			}

			return "";
		}

		private function validar_correo_admin($conexion, $correo_admin){
			if($this->variable_iniciada($correo_admin)){
				$this->correo_admin = $correo_admin;
			}else{
				return "Ingrese un correo";
			}

			if(RepositorioUsuario::correo_existe($conexion, $correo_admin)){
				return "Este correo ya está en uso.";
			}

			return "";
		}

		private function validar_telefono_admin($telefono_admin){
			if($this->variable_iniciada($telefono_admin)){
				$this->telefono_admin = $telefono_admin;
			}else{
				return "Ingresa un teléfono";
			}

			if(strlen($telefono_admin) < 5){
				return "El teléfono es demasiado corto";
			}

			return "";
		}

		private function validar_password_admin($password_admin){
			if(!$this->variable_iniciada($password_admin)){
				return "Ingresa una contraseña";
			}

			if(strlen($password_admin) < 4){
				return "La contraseña debe tener al menos 4 caracteres";
			}

			return "";

		}

		private function validar_password_admin_confirm($password_admin, $password_admin_confirm){

			if(!$this->variable_iniciada($password_admin)){
				return "Ingresa una contraseña";
			}

			if(!$this->variable_iniciada($password_admin_confirm)){
				return "Repite la contraseña";
			}

			if($password_admin !== $password_admin_confirm){
				return "Las contraseñas no coinciden";
			}

			return "";
		}

		public function validar_imagen_admin($imagen_admin){
			if($this->variable_iniciada($imagen_admin)){
				$this->imagen_admin = $imagen_admin;
			}else{
				return "Debes ingresar una foto de perfil";
			}

			$check = @getimagesize($imagen_admin);
			if(!$check){
				return "El archivo no es una imagen o es demasiado pesada";
			}

			return "";
		}

		// Getters 

		public function obtener_nombre_admin(){
			return $this->nombre_admin;
		}

		public function obtener_correo_admin(){
			return $this->correo_admin;
		}

		public function obtener_telefono_admin(){
			return $this->telefono_admin;
		}

		public function obtener_password_admin_con(){
			return $this->password_admin_con;
		}

		public function obtener_imagen_admin(){
			return $this->imagen_admin;
		}

		// Obtener errores 

		public function obtener_error_nombre_admin(){
			return $this->error_nombre_admin;
		}

		public function obtener_error_telefono_admin(){
			return $this->error_telefono_admin;
		}

		public function obtener_error_correo_admin(){
			return $this->error_correo_admin;
		}

		public function obtener_error_password_admin(){
			return $this->error_password_admin;
		}

		public function obtener_error_password_admin_confirm(){
			return $this->error_password_admin_confirm;
		}

		public function obtener_error_imagen_admin(){
			return $this->error_imagen_admin;
		}

		public function registro_validado(){
			if($this->error_nombre_admin === "" && $this->error_correo_admin === "" && $this->error_telefono_admin === "" && $this->error_password_admin === "" && $this->error_password_admin_confirm === "" && $this->error_imagen_admin === ""){
				return true;
			}else{
				return false;
			} 
		}
	}


 ?>