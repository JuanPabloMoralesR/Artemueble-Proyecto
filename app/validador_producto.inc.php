<?php 


class ValidadorProducto{

	private $nombre_producto;
	private $categoria_producto;
	private $descripcion_producto;
	private $img_producto;

	private $error_nombre_producto;
	private $error_categoria_producto;
	private $error_descripcion_producto;
	private $error_img_producto;


	public function __construct($conexion, $nombre_producto, $categoria_producto, $descripcion_producto, $img_producto){

		$this->nombre_producto = "";
		$this->categoria_producto = $categoria_producto;
		$this->descripcion_producto = "";
		$this->img_producto = "";

		$this->error_nombre_producto = $this->validar_nombre_producto($conexion, $nombre_producto);
		$this->error_categoria_producto = $this->validar_categoria_producto($categoria_producto);
		$this->error_descripcion_producto = $this->validar_descripcion_producto($descripcion_producto);
		$this->error_img_producto = $this->validar_img_producto($img_producto);
	}


	private function variable_iniciada($var){
		if(isset($var) && !empty($var)){
			return true;
		}else{
			return false;
		}
	}

	private function validar_nombre_producto($conexion, $nombre_producto){
		if($this->variable_iniciada($nombre_producto)){
			$this->nombre_producto = $nombre_producto;
		}else{
			return "Ingresa el nombre del producto";
		}

		if(RepositorioProducto::nombre_existe($conexion, $nombre_producto)){
			return "Ya hay un producto registrado con este nombre.";
		}

		return "";
	}

	private function validar_categoria_producto($categoria_producto){
		if($this->categoria_producto == 'escoger'){
			return 'Debes ingresar una categoria';
		}
			
		return "";
	}

	private function validar_descripcion_producto($descripcion_producto){
		if($this->variable_iniciada($descripcion_producto)){
			$this->descripcion_producto = $descripcion_producto;
		}else{
			return "Debes ingresar una descripcion";
		}

		return "";
	}

	private function validar_img_producto($img_produto){
		if($this->variable_iniciada($img_produto)){
			$this->img_produto = $img_produto;
		}else{
			return "Debes ingresar una foto del producto";
		}

		$check = @getimagesize($img_produto);

		if(!$check){
			return "El archivo no es una imagen o es demasiado pesada";
		}

		return "";
	}

		// Getters
	public function obtener_nombre_producto(){
		return $this->nombre_producto;
	}

	public function obtener_categoria_producto(){
		return $this->categoria_producto;
	}

	public function obtener_descripcion_producto(){
		return $this->descripcion_producto;
	}

	public function obtener_img_producto(){
		return $this->img_producto;
	}

	public function obtener_error_nombre_producto(){
		return $this->error_nombre_producto;
	}

	public function obtener_error_categoria_producto(){
		return $this->error_categoria_producto;
	}

	public function obtener_error_descripcion_producto(){
		return $this->error_descripcion_producto;
	}

	public function obtener_error_img_producto(){
		return $this->error_img_producto;
	}


	public function ingreso_producto_validado(){
		if($this->obtener_error_img_producto() === "" && $this->obtener_error_nombre_producto() === "" && $this->obtener_error_categoria_producto() === "" && $this->obtener_error_descripcion_producto() === ""){
			return true;
		}else{
			return false;
		}
	}
}

?>

