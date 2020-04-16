<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Amiri" rel="stylesheet">
	  <?php
     if(!isset($titulo) || empty($titulo)){
         $titulo = "Blog de juan pablo";
     }
       echo "<title>$titulo</title>";
     ?>
     
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA_CSS?>bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA_CSS?>estilos_admin.css">
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA_CSS?>fontello.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />
</head>
<body>
	<div class="container-fluid">
		<div class="row">