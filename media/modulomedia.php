<?php
	function mostrar_errores($hay_errores=NULL,$errores=NULL)
	{
		if(is_null($hay_errores))
			$hay_errores=$_SESSION['hay_errores_general'];
		if(is_null($errores))
			$errores=$_SESSION['errores_general'];
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'_template/errores.php');
	}
?>