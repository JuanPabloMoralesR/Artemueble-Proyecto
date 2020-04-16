<?php 

	if(!ControlSesion::sesion_iniciada()){
		Redireccion::redirigir(SERVIDOR);
	}

	ControlSesion::cerrar_sesion();
	Redireccion::redirigir(SERVIDOR);

 ?>