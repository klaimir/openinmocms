<?php
	function ver_ficheros_adjuntos($id)
	{
		// Si no existe el directorio de adjuntos, se crea
		if(!is_dir(PATHINCLUDE_FRAMEWORK_DOC . "inmuebles/inmueble_".$id."/adjuntos/"))
		{
			mkdir(PATHINCLUDE_FRAMEWORK_DOC . "inmuebles/inmueble_".$id."/adjuntos/");
		}
		
		$dir= PATHINCLUDE_FRAMEWORK_DOC . "inmuebles/inmueble_".$id."/adjuntos/";
		$directorio = opendir($dir);
		$directorio_vacio=true;
		// Directorio externo para el enlace
		$dir_enlace=$_SESSION['rutadocs'].  "inmuebles/inmueble_".$id."/adjuntos/";
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'inmuebles/adjuntos/ver_ficheros_adjuntos.php');
		// Cierre del directorio
		closedir($directorio);
	}
?>
<?php
	function adjuntos()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'inmuebles/adjuntos/index.php');
	}
?>
<?php
	function insertar()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'inmuebles/adjuntos/insertar.php');
	}
?>
<?php
	function estas_seguro()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'inmuebles/adjuntos/estas_seguro.php');
	}
?>