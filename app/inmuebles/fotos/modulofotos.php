<?php
	function insertar()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'inmuebles/fotos/insertar.php');
	}
?>
<?php
	function estas_seguro()
	{
		// Comprueba si la fotograf�a est� asociada a alg�n cartel
		include(PATHINCLUDE_FRAMEWORK_MODELOS.'CartelesInmueble.class.php');
		$carteles = new ModelCartelesInmueble();
		$num_carteles_obtenidos=$carteles->FotografiaEstaAsociadaCartel($_GET['fichero'],$_GET['id']);
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'inmuebles/fotos/estas_seguro.php');
	}
?>