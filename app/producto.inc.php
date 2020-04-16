<?php 
	
	class Producto{

		private $id_producto;
		private $nombre_producto;
		private $descripcion_producto;
		private $categoria_producto;
		private $fecha_registro_producto;
		private $lugar_producto;
		private $imagen_producto;

		public function __construct($id_producto, $nombre_producto, $descripcion_producto, $categoria_producto, $fecha_registro_producto, $lugar_producto, $imagen_producto){

			$this->id_producto = $id_producto;
			$this->nombre_producto = $nombre_producto;
			$this->descripcion_producto = $descripcion_producto;
			$this->categoria_producto = $categoria_producto;
			$this->fecha_registro_producto = $fecha_registro_producto;
			$this->lugar_producto = $lugar_producto;
			$this->imagen_producto = $imagen_producto;

		}

		// Getters 

		public function obtener_id_producto(){
			return $this->id_producto;
		}

		public function obtener_nombre_producto(){
			return $this->nombre_producto;
		}

		public function obtener_descripcion_producto(){
			return $this->descripcion_producto;
		}

		public function obtener_categoria_producto(){
			return $this->categoria_producto;
		}

		public function obtener_fecha_registro_producto(){
			return $this->fecha_registro_producto;
		}

		public function obtener_lugar_producto(){
			return $this->lugar_producto;
		}

		public function obtener_imagen_producto(){
			return $this->imagen_producto;
		}

	}


 ?>