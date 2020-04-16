<?php 

	class Usuario{

		private $id_usuario;
		private $nombre_usuario;
		private $telefono_usuario;
		private $email_usuario;
		private $password_usuario;
		private $fecha_registro_usuario;
		private $rol_usuario;

		public function __construct($id_usuario, $nombre_usuario, $telefono_usuario, $email_usuario, $password_usuario, $fecha_registro_usuario, $rol_usuario, $imagen_usuario){

			$this->id_usuario = $id_usuario;
			$this->nombre_usuario = $nombre_usuario;
			$this->telefono_usuario = $telefono_usuario;
			$this->email_usuario = $email_usuario;
			$this->password_usuario = $password_usuario;
			$this->fecha_registro_usuario = $fecha_registro_usuario;
			$this->rol_usuario = $rol_usuario;
			$this->imagen_usuario = $imagen_usuario;
		}

		// Getters

		public function obtener_nombre_usuario(){
			return $this->nombre_usuario;
		}

		public function obtener_id_usuario(){
			return $this->id_usuario;
		}

		public function obtener_telefono_usuario(){
			return $this->telefono_usuario;
		}

		public function obtener_email_usuario(){
			return $this->email_usuario;
		}

		public function obtener_password_usuario(){
			return $this->password_usuario;
		}

		public function obtener_fecha_registro_usuario(){
			return $this->fecha_registro_usuario;
		}

		public function obtener_rol_usuario(){
			return $this->rol_usuario;
		}

		public function obtener_imagen_usuario(){
			return $this->imagen_usuario;
		}

	}

 ?>